<?php
    $host = 'localhost';
    $user = 'Tastai';
    $password = '253741Thai';
    $database = 'Social_medaia';

    $conn = new mysqli(
        $host,
        $user,
        $password
    );

    if($conn->connect_error){
        die("Connection error: " . $conn->connect_error);
    }

    //// DATABASE NOT FOUND, create one
    if(!$conn->select_db("{$database}")){
        if($conn->query("create database {$database}") === TRUE){
            echo "Successfully create database: {$database}";
            $conn->select_db("{$database}");
        }else{
            echo "Error creating database {$conn->error}";
        }
        echo "<br>";
    }
    //// USER TABLE NOT FOUND, create one
    if(!$conn->query("select * from user")){
        $sql = "
            create table user(
                id int not null auto_increment primary key,
                username varchar(30) not null,
                password varchar(255) not null,
                email    varchar(50) not null
            );
        ";
        if($conn->query($sql) === true){
            echo "Successfully create user table";
        }else{
            echo "Error creating user table {$conn->error}";
        }
        echo "<br>";
    }

    //// EVENT TABLE NOT FOUND, create one
    if(!$conn->query("select * from comments")){
        $sql = "
            create table comments(
                id int not null auto_increment primary key,
                uid varchar(128) not null,
                date datetime not null,
                messages TEXT not null
            );
        ";
        if($conn->query($sql) === true){
            echo "Successfully create event table";
        }else{
            echo "Error creating event table {$conn->error}";
        }
        echo "<br>";
    }

    // Get data to display on index page
    $sql = "SELECT * FROM blog_data";
    $query = mysqli_query($conn, $sql);
    

    // Create a new post
    if(isset($_REQUEST['new_post'])){

        $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
        $content = mysqli_real_escape_string($conn, $_REQUEST['content']);
        $username = mysqli_real_escape_string($conn, $_REQUEST['name']);
        $Hashtag = $_REQUEST['Hashtag'];
        $Image = $_REQUEST['fileToUpload'];
        $errors = array();
        if($Image == "" || $Hashtag  == "" || $content == "" || $title == ""){
            $errors['error'][] = "Error";
        }
        
        if(empty($errors['error'])){
            $sql = "INSERT INTO blog_data(title, content, hashtag, image, name) VALUES('$title', '$content', '$Hashtag', '$Image', '$username')";
            mysqli_query($conn, $sql);
            header("Location: Home.php?info=added");
        }
    }

    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog_data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        $username = $_REQUEST['name'];

        $sql = "DELETE FROM blog_data WHERE id = $id AND name = '$username'";
        mysqli_query($conn, $sql);

        header("Location: Home.php");
        exit();
    }

    // Update a post
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $topic = $_REQUEST['topic'];
        $username = $_REQUEST['name'];
        $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
        $content = mysqli_real_escape_string($conn, $_REQUEST['content']);

        $sql = "UPDATE blog_data SET `title` = '$title', `content` = '$content', `hashtag` = '$topic' WHERE `id` = '$id' AND name = '$username'";
        mysqli_query($conn, $sql);

        header("Location: view.php?id=".$id);
        exit();
    }


    // Get Keyword to display on post
    if(isset($_REQUEST['hashtag'])){
        $hashtag = $_REQUEST['hashtag'];

        $sql = "SELECT * FROM blog_data WHERE `title` LIKE '%{$hashtag}%' OR `content` LIKE '%{$hashtag}%' OR `hashtag` LIKE '%{$hashtag}%' ";
        $query_h = mysqli_query($conn, $sql);
    }
    // End Keyword to display on post
    

    // Create a comment
    if(isset($_REQUEST['commentSubmit'])){
    $uid = $_REQUEST['uid'];
    $date = $_REQUEST['date'];
    $id_post = $_REQUEST['id_post'];

    $topic = $_REQUEST['topic'];
    
    $messages = mysqli_real_escape_string($conn, $_REQUEST['messages']);
    $errors = array();
    
    $messages_check_query = "SELECT * FROM comments WHERE messages = '$messages' LIMIT 1";
    $query = mysqli_query($conn, $messages_check_query);
    $result = mysqli_fetch_assoc($query);

        
        if($messages == ""){
            $errors['error'][] = "Error";
        }
        if(empty($errors['error'])){
            $sql = "INSERT INTO comments (uid, date, messages, id_post, topic) VALUE ('$uid', '$date', '$messages', '$id_post', '$topic')";
            $resultt = $conn->query($sql);
        }
        header("Location: view.php?id=".$id_post);
    }


    // Get data to display on comments
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sqll = "SELECT * FROM comments WHERE id_post = '$id' ";
        $queryy = mysqli_query($conn, $sqll);
    }
    // Delete a comments
    if(isset($_REQUEST['delete_com'])){
        $id = $_REQUEST['id'];
        $id_post = $_REQUEST['id_post'];
        $username = $_REQUEST['name'];

        $sql = "DELETE FROM comments WHERE id = $id AND uid = '$username' ";
        mysqli_query($conn, $sql);

        header("Location: view.php?id=".$id_post);
        exit();
    }
    // Update a comments
    if(isset($_REQUEST['update-com'])){
        $id = $_REQUEST['id'];
        $id_post = $_REQUEST['id_post'];
        $messages = mysqli_real_escape_string($conn, $_REQUEST['messages']);
        
        $sql = "UPDATE blog_data SET messages = '$messages' WHERE id = '$id'";
        mysqli_query($conn, $sql);

        header("Location: view.php?id=".$id_post);
        exit();
    }

    // function getComments($conn) {
    //     $sql = "SELECT * FROM comments";
    //     $result = $conn->query($sql);
    //     while ($row = $result->fetch_assoc()){
    //         echo "<div class='comments-box'><div class='name'>";
    //         echo "Username: ".$row['uid']." ".$row['hashtag']."<br>";
    //         echo "Date: ".$row['date'];
    //         echo "</div> <p class = 'c'>";
    //         echo "Messages: ".$row['messages']."<br>";
    //         echo "</p></div>";
    //     } 
    // }
    // if(isset($_REQUEST['commentSubmit'])){
    //     $hashtag = $_REQUEST['Hashtag'];
        // $sql = "SELECT * FROM comments";
        // $query = mysqli_query($conn, $sql);
    //} WHERE hashtag = '$hashtag'


    //Cancle edit
    if(isset($_REQUEST['cancle'])){
        // header("Location: view.php?id="$_SESSION['id']);
        $id = $_REQUEST['id'];
        header("Location: view.php?id=".$id);
        exit();
    }

    //Search hashtag
    if(isset($_REQUEST['search'])){
        $hashtag = $_REQUEST['search'];
        $sql = "SELECT * FROM blog_data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }
    //End search
  
    // Get data to display on Topic
    $sqlll = "SELECT * FROM topic";
    $queryyy = mysqli_query($conn, $sqlll);

    // Insert a topic
    if(isset($_REQUEST['new_topic'])){
        $Topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
        $Image = $_REQUEST['fileToUpload'];
        $username = $_REQUEST['name'];
        $errors = array();
        
        if($Topic == "" || $Image == ""){
            $errors['error'][] = "Error";
        }
        if(empty($errors['error'])){
            $sql = "INSERT INTO topic(topic, image, username) VALUES('$Topic', '$Image', '$username')";
            mysqli_query($conn, $sql);
            header("Location: Home.php?info=added");
        }
        
    }

    if(isset($_REQUEST['hashtag'])){
        $hashtag = $_REQUEST['hashtag'];
        $sql = "SELECT * FROM topic WHERE `topic` = '$hashtag' ";
        $query_t = mysqli_query($conn, $sql);
    }

    // Delete a Topic
    if(isset($_REQUEST['delete_topic'])){
        $topic = $_REQUEST['topic'];
        $username = $_REQUEST['name'];

        $sql = "DELETE FROM topic WHERE topic = '$topic' AND username = '$username' ";
        mysqli_query($conn, $sql);

        header("Location: Home.php");
        exit();
    }

    // Post of each username
    if(isset($_REQUEST['name'])){
        $username = $_REQUEST['name'];
        // mysqli_real_escape_string($conn, $_REQUEST['name']);
        
        $sql = "SELECT * FROM blog_data WHERE `name` = '$username' ";
        $query_pu = mysqli_query($conn, $sql);
    }
    // end Post of each username

    // Get data to display on comments on profile
    if(isset($_REQUEST['name'])){
        $username = $_REQUEST['name'];

        $sqll = "SELECT * FROM comments WHERE uid = '$username' ";
        $query_com = mysqli_query($conn, $sqll);
    }

    // Profile
    if(isset($_REQUEST['name'])){
        $username = $_REQUEST['name'];

        $sqll = "SELECT * FROM user WHERE username = '$username' ";
        $query_proflie = mysqli_query($conn, $sqll);
    }

?>
