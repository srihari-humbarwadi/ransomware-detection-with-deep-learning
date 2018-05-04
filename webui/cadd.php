<?php
    session_start();
    if(isset($_POST['submit'])) {

        $con = mysqli_connect('localhost', 'root', '', 'project');
        if($con->connect_error)
            die('Connection error');

        $ip = trim($_POST['ip']);
        $ip = mysqli_real_escape_string($con , $ip);
        //$clientName = gethostbyaddr($ip);
                
         $query = "INSERT INTO `clients`(`ip`) VALUES ('$ip')";

         if(mysqli_query($con, $query)){
            echo "<script type='text/javascript'>alert('Added client successfully');window.location = 'clientadd.php';</script>";
         }
         else{
            echo "<script type='text/javascript'>alert('Failed adding client, try again'); window.history.back();</script>";
         }
        
    }
    else
        header("location:index.php");

?>
