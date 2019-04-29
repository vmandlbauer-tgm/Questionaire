<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "shop";
$message = "";
try
{
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

    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "$collection->findOne(array('username'=> $username, 'password'=> $password";
            $statement = $m->prepare($query);
            $statement->execute(
                array(
                    $username     =>     $_POST["username"],
                    $password     =>     $_POST["password"]
                )
            );
            $obj = $statement->fetchObject();
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $obj->nname;
                $_SESSION["kid"] =	$obj->kid;
                header("location:../../LogedUser.php");
            }
            else
            {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
    if(isset($_POST["register"]))
        if(empty($_POST["username"]) && empty($_POST["password"]) &&  empty($_POST["vorname"]) && empty($_POST["nachname"]) && empty($_POST["telefonnummer"]) && empty($_POST["schuhgröße"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {    $query = "db.products.insert( { vorname: :vorname, nachname: :nachname } )";
            $statement = $m->prepare($query);

            $statement->bindParam(':vorname',$_POST["vorname"],PDO::PARAM_STR);
            $statement->bindParam(':nachname',$_POST["nachname"],PDO::PARAM_STR);
            $statement->bindParam(':username',$_POST["username"],PDO::PARAM_STR);
            $statement->bindParam(':password',$_POST["password"],PDO::PARAM_STR);
            $statement->bindParam(':telefonnummer',$_POST["telefonnummer"],PDO::PARAM_STR);
            $statement->bindParam(':schuhgr',$_POST["schuhgröße"],PDO::PARAM_INT);

            $statement->execute();
            $bablla = $m->lastInsertId();

            echo $bablla;
            /*$statement->execute(
                 array(
                      ':vorname'      =>     $_POST["vorname"],
                      ':nachname'     =>     $_POST["nachname"],
                      ':username'     =>     $_POST["username"],
                      ':password'     =>     $_POST["password"],
                      ':telefonnummer'=>     $_POST["telefonnummer"],
                      ':schuhgröße'   =>     $_POST["schuhgröße"]
                      //'gewicht'      =>     $_POST["gewicht"],
                      //'fahrweise'    =>     $_POST["fahrweise"]
                 )
            );*/
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["vorname"];
                $_SESSION["kid"] = $bablla;
                header("location:../../LogedUser.php");
            }
            else
            {
                $message = '<label>Wrong Data</label>';
            }
        }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
?> 