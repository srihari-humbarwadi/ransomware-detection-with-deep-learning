<?php
    $con = mysqli_connect('localhost', 'root', '', 'project');
    if($con->connect_error)
        die('Connection error');
            
    $query = "SELECT * from clients";
    $result = mysqli_query($con, $query);
    $clients = mysqli_fetch_all($result);

    if(isset($_GET["hibernate"])){
        foreach($clients as $row){
            foreach($row as $ip){
                ${"curl_s".$ip} =  curl_init();
                curl_setopt_array(${"curl_s".$ip}, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT=> 5,
                CURLOPT_URL => $ip . ':5000/command?cmd=hibernate',
                CURLOPT_USERAGENT => 'User Agent X' ));
                $resp = curl_exec(${"curl_s".$ip});
                curl_close(${"curl_s".$ip});
                unset(${"curl_s".$ip});
            }
        }      
        
    }

    elseif(isset($_GET["shut"])){
        foreach($clients as $row){
            foreach($row as $ip){
                ${"curl_s".$ip} = curl_init();
                curl_setopt_array(${"curl_s".$ip}, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT=> 5,
                CURLOPT_URL => $ip . ':5000/command?cmd=shutdown',
                CURLOPT_USERAGENT => 'User Agent X' ));
                $resp = curl_exec(${"curl_s".$ip});
                curl_close(${"curl_s".$ip});
                unset(${"curl_s".$ip});
            }
        }
    }
header("location:action.php")
?>