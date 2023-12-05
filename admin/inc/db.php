<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sneat";

$db = mysqli_connect($db_host,$db_user, $db_pass, $db_name);

if($db){
    // echo "connect successful";
}else{
    die(mysqli_error($db));
}
