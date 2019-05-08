<?php
require 'vendor/autoload.php'; // include Composer's autoloader
try{
    $m = new MongoDB\Client();
    //echo "Connection to database Successfull!";echo"<br />";

    $db = $m->questionnaire;
    //echo "Databse loginreg selected";
    $collection = $db->user;
    //echo "Collection userdata Selected Successfully";
}
catch (Exception $e){
    die("Error. Couldn't connect to the server. Please Check");
}
session_start();

?>