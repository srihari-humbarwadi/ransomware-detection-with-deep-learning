<?php
    require_once('session_check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
    <link rel="stylesheet" href="notyf.min.css" />
    
</head>
    <?php
        require_once('header.php');
    ?>
        <ul class="uk-list uk-position-center" style="padding-bottom: 10%">
            <li>
        <form method="POST" action="cadd.php">
                <h1 class="uk-text-large uk-text-primary uk-text-center">Add Client</h1>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: users"></span>
                        <input class="uk-input uk-form-width-large" type="text" placeholder="Client IP" name="ip" id="ip">
                    </div>
                </div>                
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom " type="submit" name="submit" id="submit">Add</button>             
        </form>
        </li>
        <li>  
        <form style="" method="POST" action="clear.php">
        	  <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" type="submit" name="submit" id="submit">Delete all clients</button>              
        </form> 
        </li>
        </ul>







<?php
        require_once('footer.php');
?>