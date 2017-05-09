<?php
    include 'functions.php';
    
    $note_id = $_GET['n'];
    $note = null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $note_id = $_POST['note_id'];
        
        if ($note_id == NULL) {
            $note_id = create_note ($_COOKIE['user_id'], $title);
        } else {
            update_note ($_COOKIE['user_id'], $note_id, $title);
        }
        save_note_to_disk ($note_id, $content);
        
        redirect ("notes.php?n={$note_id}");   
    }
    else 
    {
        $note = load_note ($_COOKIE['user_id'], $note_id);
        $note['content'] = load_note_from_disk ($note_id);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Companion</title>
    <link rel="icon" href="images/logo.png">
    <script src="js/functions.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css"><script src="https://use.fontawesome.com/ea811db0f0.js"></script>
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
                     <a class="active" href="notes.php"> <i id="newfile" class="fa fa-file-text fa-3x active" style="color:white" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="newsfeed.php"><i id="calendaricon" class="fa fa-calendar fa-3x" style="color:white" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="contact.php"><i id="envelopeicon" class="fa fa-envelope fa-3x" style="color:white" aria-hidden="true"></i></a>
                </li>
        </ul>
    </nav>  
</div>
<div id="notes-takingpage">
<!-- Note taking show/hide bar -->
<input type="checkbox" id="toggle-app-sidebar" class="site-control">
<header id="app-header" >
    <label for="toggle-app-sidebar" class="fa fa-arrow-circle-right"></label>
</header>
<aside id="app-sidebar">
    <header id="app-sidebar-header">
        <div class="flex-space"></div>
        <label for="toggle-app-sidebar" class="fa fa-close"></label>
    </header>
</aside>
<main id="app-content"></main>

<script type="text/javascript" src="js/app.js"></script>
    <!-- note taking area -->
<div id="notes-bottomcontainer">

    <form action="notes.php" method="post">
        <div id="titleoptions">
            <label>Title : </label>
        <input type="text" name="title" value="<?php if ($note != NULL) echo $note['note_title']?>">
        <br>
        </div>
        
        <textarea rows="10" cols="50" name="content"><?php if ($note != NULL) echo $note['content']?></textarea>
        <br>
        
        <button class="buttonsave" type="submit">Save</button>
<?php if ($note != NULL): ?>
        <input type="hidden" name="note_id" value="<?=$note_id?>">
<?php endif; ?>
    </form>
    </div> 
    </div>
</body>
</html>