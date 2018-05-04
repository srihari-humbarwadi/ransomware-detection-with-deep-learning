<?php
    session_start();
    $error = false;
    if(isset($_POST['submit'])) {

        $con = mysqli_connect('localhost', 'root', '', 'project');
        if($con->connect_error)
            die('Connection error');

        $user = trim($_POST['id']);
        $pass = trim($_POST['pass']);

        $user = mysqli_real_escape_string($con , $user);
        $pass = mysqli_real_escape_string($con , $pass);
        
        $pass = sha1($pass);
        $query = "SELECT * FROM users WHERE userid='$user' and userpass='$pass'";

        $sql = mysqli_query($con, $query);

        $count=mysqli_num_rows($sql);

        if($count==1) {
            $_SESSION['name'] = $user;
            header("location:dashboard.php");
        }
        else {
            echo "<script type='text/javascript'>alert('Wrong username or password. Please retry!!'); window.history.back();</script>";            
        }
    }

?>
