<? var_dump ($form); ?>

<div id="profilepic-bar">
     <img src="images/googleplusprofilephoto.png">
</div>

<div id="left-sectioninfo">
    <h1>Basic Information</h1>
    <!-- Request the data of the current user -->

     <?=form_open ('profile/update_users'); ?>
        <h3><?=$userdata['user_name']; ?></h3>

            <img src="<?=base_url('images/Files-Edit-File-icon.png')?>" width = "20px" height = "20px" >
            <?=form_input ($form['email']); ?>
            
            <?=form_submit (null, 'Change');?>


        <h3><?=$userdata['user_surname']; ?></h3>
        <h3><?=$userdata['user_email']; ?></h3>
        <h3><?=$userdata['user_phone']; ?></h3>

        <?=form_close (); ?>
</div>
