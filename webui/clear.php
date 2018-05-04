<?php
    session_start();
    if(isset($_POST['submit'])) {

        $con = mysqli_connect('localhost', 'root', '', 'project');
        if($con->connect_error)
            die('Connection error');
                
         $query = "TRUNCATE TABLE clients";

         if(mysqli_query($con, $query)){
            echo "<script type='text/javascript'>alert('Cleared clients successfully');window.location = 'clientadd.php';</script>";
         }
         else{
            echo "<script type='text/javascript'>alert('Something went wrong, try again after few minutes'); window.history.back();</script>";
         }
        
    }

?>
