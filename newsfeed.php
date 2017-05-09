<?php
    include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Companion</title>
    <link rel="icon" href="images/logo.png">
    <script src="js/functions.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css"><script src="https://use.fontawesome.com/ea811db0f0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    </a>
    <a id="signout" href="logout.php">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
    </a>
</div>
<!-- Below the header code -->
<!-- Menu -->
<div id="sidebar">
    <nav>
        <ul>
            <li>
                <a href="index-loggedin.php"><i id="homeicon" class="fa fa-home fa-3x" style="color:white" aria-hidden="true"></i></a>
            </li>
            <li>
                <a class="active" href="newsfeed.php"> <i id="newspapericon" class="fa fa-newspaper-o fa-3x" style="color:white"  aria-hidden="true"></i></a>
            </li>
             <li>
                 <a href="notes.php"> <i id="newfile" class="fa fa-file-text fa-3x" style="color:white" aria-hidden="true"></i></a>
            </li>
            <li>
                <a  href="newsfeed.php"><i id="calendaricon" class="fa fa-calendar fa-3x" style="color:white" aria-hidden="true"></i></a>
            </li>

            <li>
                <a href="contact.php"><i id="envelopeicon" class="fa fa-envelope fa-3x " style="color:white" aria-hidden="true"></i></a>
            </li>
        </ul>
    </nav>  
</div>
    
<!-- newsfeed page starts here -->
<div id="allbody">
    <div id="askaquestionarea">
        <p>Ask a question</p>
            <form id="questionform" action="newsfeed.php" method="get">
                <input type="Name" placeholder = "Write your question here" id="input-question" class="flex-space">

                <button type="submit" id="button-post">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </button>
            </form>
        <hr id="question-line">
    </div>
<!-- END OF ASK QUESTION -->       
        
<!-- comments start from below -->
        <!-- SORT BY -->
    <div id="sortbyandpinnedline">
        <div id="dropdown-icon">
                <i class="fa fa-sort-desc" aria-hidden="true"></i>
        <div tabindex="0" class="onclick-menu">
            <ul class="onclick-menu-content">
                <li><button onclick="#">Date</button></li>
                <li><button onclick="">Name</button></li>
            </ul>
        </div>
        </div> 
       <!-- Pinned posts -->
            <div id="pinned-posts">
                <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                    <span>Pinned Posts</span>
            </div>
        </div>
        <div id="comments-page">
            <div id="commentsarea">
                <!-- COMMENT 1 -->
                <div class="post">
                    <a href="index.php">
                        <img class="user-image" src="images/user-image.png" alt="logo"> 
                    </a>
                    <div id="user-comment1">
                        <span id="username">Ludwig Buttigieg </span>
                        <span id="timeago">20 minutes ago</span>
                        <span id="usercomment">Today's lecture has been cancelled. Sorry and meet you next time!</span>  
                        <i class="fa fa-heart-o likesystem" aria-hidden="true">
                        3 people likes this
                        </i>
                        <form id="postmessage" action="newsfeed.php" method="get">
                            <input id="input-question" type="Name" placeholder = "Write a comment">
                            <input type="hidden" name="post_id" value="">

                            <button type="submit">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        
    <!-- Screen splitter -->
            <div id="verticalline"></div> 
    <!-- right sidebar -->            
            <div id="pinnedcommentsuserimage">
                <div class="post">
                    <a href="index.php">
                        <img class="user-image" src="images/user-image.png" alt="logo"> 
                    </a>   
                </div>
                <div id="pinnedcomments">
                    <span id="username">Ludwig Buttigieg</span>
                    <span id="timeago">20 minutes ago</span>
                    <span id="usercomment">Today's lecture has been cancelled. Sorry and meet you next time!</span>
                </div>    

            </div>
        </div>
    </div>

    </body>
</html>