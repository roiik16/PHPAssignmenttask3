<!DOCTYPE html>
<html>
<head>
    <title>Student Companion</title>
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
    <link rel="icon" href="<?=base_url('images/logo.png')?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <link type="text/css" rel="stylesheet" href="css/style.css"><script src="https://use.fontawesome.com/ea811db0f0.js"></script>
</head>
    <body id="indexpage">
        <div id="top-menu">
            <a href="index-loggedin.php">
              <img class="logo" src="<?=base_url('images/logo.png')?>">
            </a>
        <div class="flex-space"></div>
        <!-- PROFILE IMAGE AND NAME -->

        <?php // TODO: Get the user data and display it here, WHO IS LOGGED IN?? ?>




        <a id="profileimage" href="profile.php">
            <img src="<?=base_url('images/googleplusprofilephoto.png')?>">

        </a>
        <a id="signout" href="logout">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
        </div>
