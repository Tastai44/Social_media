<?php
session_start();
include('database.php');

    function setComments($conn) {
        if (isset($_POST['commentSubmit'])) {
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $messages = $_POST['messages'];
            $errors = array();

            $messages_check_query = "SELECT * FROM comments WHERE messages = '$messages' LIMIT 1";
            $query = mysqli_query($conn, $messages_check_query);
            $result = mysqli_fetch_assoc($query);

            if ($result) { // if messages exists
                if ($result['messages'] === $messages) {
                    array_push($errors, "Username already exists");
                    
                }
            }
            if (count($errors) == 0) {
                $sql = "INSERT INTO comments (uid, date, messages) VALUE ('$uid', '$date', '$messages')";
                $resultt = $conn->query($sql);
            }
            
        }
    }

    function getComments($conn) {
        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            echo "<div class='comments-box'><p class='name'>";
            echo $row['uid']." ".$row['hashtag']."<br>";
            echo $row['date']."<br>";
            echo "</p> <p class = 'c'>";
            echo $row['messages']."<br>";
            echo "</p></div>";
        } 
    }

    
?>