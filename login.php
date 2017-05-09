<?php
    
    include 'functions.php';

    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        echo "No form was sent.";
        die;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = login ($username, $password);

    if ($login !== FALSE) {
        $expiration = time () + 60 * 60 * 24 * 30;
        
        foreach ($login as $key => $value) {
            setcookie ($key, $value, $expiration);
        }
        
        redirect ("index-loggedin.php");
    }

?><!DOCTYPE html>

<html>
<head>
    <title>School-app!</title>
</head>
<body>
    We have no records of this data. Please go back and try again. <a href="sign-in.php">Try again.</a>
</body>
</html>