<?php
    require('./database.php');
    session_start();

    $data = array();
    $username = $_POST['username'];
    $first = $_POST['first'];
    $surname = $_POST['surname'];

    $password = $_POST['password'];
    $email    = $_POST['email'];
    $confirmPassword = $_POST['confirmPassword'];
    
     /// SECURITY: CHECK FOR SQL INJECTION ? up to u
    /// https://www.w3schools.com/sql/sql_injection.asp

    if(strpos("{$username}${first}${surname}${password}${confirmPassword}${$email}", " ") !== false){
        $data['error'][] = "Error";
    }

    if($username == "" || $first == "" || $surname == "" || $password == "" || $confirmPassword == "" || $email == ""){
        $data['error'][] = "Error";
    }
    
    if($password !== $confirmPassword){
        $data['error'][] = "Error";
    }

    /// No error, insert data to database
    if(empty($data['error'])){
        
        $result = $conn->query("select * from user where username = '{$username}'");
        if($result->num_rows == 0){
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "insert into user (username, firstName, surname, password,email) values ('{$username}', '$first', '$surname' , '{$hashPassword}','{$email}')";

            if($conn->query($sql) === true){
                $_SESSION['username'] = $username;
                $_SESSION['first'] = $first;
                $_SESSION['surname'] = $surname;
                $_SESSION['email'] = $email;
                
                $_SESSION['success'] = "success";
                $data['success'] = "Successfully register user: ${username}";
            }else{
                $data['error'][] = "Fail creating user: ${username} {$conn->error}";
            }
        }else{
            $data['error'][] = "Username already exists";
        }
    }

    echo json_encode($data);
?>
