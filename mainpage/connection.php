<?php
require 'vendor/autoload.php'; // include Composer's autoloader
try {
    $m = new MongoDB\Client();
    //echo "Connection to database Successfull!";echo"<br />";

    $db = $m->questionnaire;
    //echo "Databse loginreg selected";
    $collection = $db->user;

    if (isset($_POST['login-form'])) {
        $uname = $_POST['username'];
        $upass = $_POST['password'];
        $collection->findOne($_POST['username']);
    }
    if (empty($query)) {
        echo "Email ID is not registered.";
        echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
    } else {
        $pass = $query["Password"];
        if (password_verify($upass, $pass)) {
            $var = setsession($uname);
        }
    }
    if (isset($Post['register-form'])) {
        $collection->insert($_POST);
    }
} catch (Exception $e) {
    die("Error. Couldn't connect to the server. Please Check");
}
session_start();

?>