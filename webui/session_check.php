<?php
    session_start();
    if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
        header("location:index.php");
    }

?>