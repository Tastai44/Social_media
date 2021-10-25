<?php

    require('./database.php');
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    /// SECURITY: CHECK FOR SQL INJECTION ? up to u
    /// https://www.w3schools.com/sql/sql_injection.asp

    $result = $conn->query("select * from user where username = '{$username}'");
    $data = array();
    if($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "success";
            $data['success'] = true;
        }else{
            $data['success'] = false;
        }
    }else{
        $data['success'] = false;
    }

    echo json_encode($data);
?>
