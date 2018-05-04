<?php
    require_once('session_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />    
    <title>Take Action</title>
</head>

<?php
    require_once('header.php');
?>

<form action="defense.php" method="get">

<ul class="uk-list uk-position-center" style="padding-bottom: 4%">
    <li>
        <button name="hibernate" class="uk-button-large uk-button uk-button-primary uk-margin-small-right uk-width-1-1" type="submit">HIbernate Client Systems</button>
    </li>
    <hr class="uk-divider-icon">
    <li>
        <button name="shut" class="uk-button-large uk-button uk-button-primary uk-margin-small-right uk-width-1-1" type="submit">Shutdown Client Systems</button>
    </li>
    <hr class="uk-divider-icon">    
    <li>
        <button class="uk-button-large uk-button uk-button-primary uk-margin-small-right uk-width-1-1" type="button" onclick="window.open('./doughnut/history.json')">Show history</button>
    </li>
</ul>

</form>



<?php
    require_once('footer.php');
?>