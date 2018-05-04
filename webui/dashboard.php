<?php
    require_once('session_check.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
    <link rel="stylesheet" href="notyf.min.css" />
    
</head>

    <?php
        require_once('header.php');
    ?>
    
    <div class="uk-vertical-align">
    <div id="chartContainer" style="height: 70%; width: 60%;" class="uk-position-center uk-vertical-align-middle"></div>
    <p id="prediction" style="font-size: 20px;" class="uk-position-bottom-right uk-padding-large uk-vertical-align-middle"></p>
    </div>
    <script src="./doughnut/notyf.min.js"></script>
    <script src="./doughnut/notify.js"></script>   
    <script src="./doughnut/script.js"></script>
    <script type="text/javascript" src="./doughnut/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./doughnut/canvasjs.min.js"></script>



    <?php
        require_once('footer.php');
    ?>
