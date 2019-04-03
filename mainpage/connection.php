<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "shop";
$message = "";
try
{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM kunde WHERE username = :username AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"]
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
        {    $query = "INSERT INTO kunde (vname,
											 nname,
											 username,
											 password,
											 ktelnr,
											 skischugr)
											 VALUES
											 (:vorname,
											  :nachname,
											  :username,
											  :password,
											  :telefonnummer,
											  :schuhgr)
											 ";
            $statement = $connect->prepare($query);

            $statement->bindParam(':vorname',$_POST["vorname"],PDO::PARAM_STR);
            $statement->bindParam(':nachname',$_POST["nachname"],PDO::PARAM_STR);
            $statement->bindParam(':username',$_POST["username"],PDO::PARAM_STR);
            $statement->bindParam(':password',$_POST["password"],PDO::PARAM_STR);
            $statement->bindParam(':telefonnummer',$_POST["telefonnummer"],PDO::PARAM_STR);
            $statement->bindParam(':schuhgr',$_POST["schuhgröße"],PDO::PARAM_INT);

            $statement->execute();
            $bablla = $connect->lastInsertId();

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