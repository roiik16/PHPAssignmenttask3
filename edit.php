<?php
    include 'functions.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
        $user_id = $_SESSION['user_id'];
        
        $status = update_user ($user_id, $email, $fname, $lname);
        
        if (is_uploaded_file ($_FILES['image']['tmp_name'])) {
            $status = move_file ($_FILES['image'], "images/profile", $_SESSION['user_id']);
            
            if ($status !== TRUE)
                die ($status);
        }
        
    }
    
    $user = get_user ($_SESSION['user_id']);
?><!DOCTYPE html>

<html>
<head>
    <title>Website!</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        if ($status === FALSE):
?>
    
    <p>Your details were not updated.</p>
    
<?php
        else:
?>
    
    <p>Details updated successfully!</p>
    
<?php
        endif;
    else:
?>
    <form action="<?=site_url ("edit.php?u=" . $user['user_id'])?>" method="post" enctype="multipart/form-data">
        <div class="input-collection">
            <label>Username:</label>
            <span><?=$user['user_username']?></span>
        </div>
        
        <div class="input-collection">
            <label for="input-image">Profile Picture:</label>
            <input type="file" name="image" id="input-image">
        </div>
        
        <div class="input-collection">
            <label for="input-email">Email Address:</label>
            <input type="email" placeholder="me@example.com" name="email" id="input-email" value="<?=$user['user_email']?>">
        </div>
        
        <div class="input-collection">
            <label for="input-fname">Name:</label>
            <input type="text" placeholder="John" name="fname" id="input-fname" value="<?=$user['user_fname']?>">
        </div>
        
        <div class="input-collection">
            <label for="input-lname">Surname:</label>
            <input type="text" placeholder="Borg" name="lname" id="input-lname" value="<?=$user['user_lname']?>">
        </div>
        
        <button type="submit">Update</button>
    </form>
<?php endif; ?>
</body>
</html>