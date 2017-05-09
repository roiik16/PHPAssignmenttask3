<?php
    include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Companion</title>
    <link rel="icon" href="images/logo.png">
    <script src="js/functions.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/ea811db0f0.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
    <body>
        <div id="top-menu">
            <a href="index.php">
                <img class="logo" src="images/logo.png" alt="logo">
            </a>
         <div class="flex-space"></div>
        <!-- PROFILE IMAGE AND NAME -->
        <a id="profileimage" href="profile.php">
            <img src="images/googleplusprofilephoto.png">
          <span><?="{$_COOKIE['user_fname']} {$_COOKIE['user_lname']}"?></span> 
            <a id="signout" href="logout.php">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </a>
        </div>
<!-- Below the header code -->
<div id="sidebar">
    <nav>
        <ul>
                <li>
                    <a href="index-loggedin.php"><i id="homeicon" class="fa fa-home fa-3x" style="color:white" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="newsfeed.php"> <i id="newspapericon" class="fa fa-newspaper-o fa-3x"  style="color:white" aria-hidden="true"></i></a>
                </li>
                 <li>
                     <a href="notes.php"> <i id="newfile" class="fa fa-file-text fa-3x active" style="color:white" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="newsfeed.php"><i id="calendaricon" class="fa fa-calendar fa-3x" style="color:white" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="active" href="contact.php"><i id="envelopeicon" class="fa fa-envelope fa-3x" style="color:white" aria-hidden="true"></i></a>
                </li>
        </ul>
    </nav>  
</div>
        
<!-- Contact page starts here -->
<div id="contact-page">
    <div id="border-bar">
        <div id="header-bar">
        </div>
        <div id="sendto">
            <p>Send to</p>
                <select>
                  <option value="phpuser">phpuser</option>
                </select>
        </div>
        <div id="contact-text-box">
            <textarea placeholder="Write your message here..."></textarea>
            <button id="sendmessage">Send</button>
        </div>
    </div>
    <div id="right-side">
        <div id="top-bar">
        </div>
    <h1>Messages</h1>
    <div id="message">
        <span>Hello this is a message test</span>
    </div>
        <i class="fa fa-reply" aria-hidden="true"></i>
        <i class="fa fa-trash" aria-hidden="true"></i>
    </div>

</div>
    </body>
</html>