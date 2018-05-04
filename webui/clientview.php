<?php
    require_once('session_check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Clients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
    <link rel="stylesheet" href="notyf.min.css" />
    
</head>
    <?php
        require_once('header.php');
        $con = mysqli_connect('localhost', 'root', '', 'project');
        if($con->connect_error)
            die('Connection error');
                
        $query = "SELECT * from clients";
        $result = mysqli_query($con, $query);
        $tmp = mysqli_fetch_all($result);
        $clients = array();
        foreach($tmp as $row){
            foreach($row as $ip){
                array_push($clients, $ip);
            }
        }
    ?>
    <div style="padding: 4%;overflow: auto; height: 42rem;">
    <?php
        if(sizeof($clients)){
        for($i=0; $i<sizeof($clients);$i=$i+2){
        echo 
            "<div class='uk-child-width-1-2@l uk-child-width-1-2@s
             uk-child-width-1-2@m uk-text-center' style='padding-left: 12% 'uk-grid >
            <div>
            <div class='uk-card uk-card-default uk-card-body'><span uk-icon='icon: laptop; ratio: 2'></span><p>".$clients[$i]."</p></div>
            </div>";
            if($i+1 < sizeof($clients)){
                echo 
                    "<div>
                        <div class='uk-card uk-card-default uk-card-body'><span uk-icon='icon: laptop; ratio: 2'></span><p>".$clients[$i+1]."</p></div>
                    </div>
                    </div>";
            }
            else {
                echo "</div>";
            }
        }
    }
    else{
        echo 
            "<div class='uk-position-center uk-text-center' style='padding-bottom: 10%'>
                <h1> Oops! you forgot to add clients 
                </h1>
                <button class='uk-button-large uk-button uk-button-primary uk-margin-small-right uk-width-1-1' type='button' onclick='window.location=\"clientadd.php\"'>Add Clients 
                </button>
            </div>
        ";
    }
?>
    </div>
<?php
        require_once('footer.php');
?>