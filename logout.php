<?php
    include 'functions.php';

    foreach ($_COOKIE as $key => $value) {
        setcookie ($key, '', time () - 60);
    }

    redirect ("index.php");
?>