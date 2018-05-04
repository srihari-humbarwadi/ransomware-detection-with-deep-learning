<?php
    session_start();
    if(isset($_SESSION['name'])){
        header("location:dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
    
    <title>Login</title>
</head>
<body>
        <div class="uk-panel uk-padding-small uk-background-secondary uk-light">
            <span uk-icon="bolt"></span>               
            <a class="uk-logo" href="index.php">THANOS v1.0</a>
        </div>


        <form class="uk-position-center" method="POST" action="login.php">
                <h1 class="uk-text-large uk-text-primary uk-text-center">Sign In</h1>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" placeholder="Username" name="id">
                    </div>
                </div>
            
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" placeholder="Password" name="pass">
                    </div>
                </div>
                
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" type="submit" name="submit" id="submit">Log In</button>              
        </form>


<?php
    require_once('footer.php');
?>