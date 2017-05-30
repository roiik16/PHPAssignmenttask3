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

<?=form_open ('notes/do_add_notes'); ?>
        <div id="titleoptions">


            <label>Title : </label>

            <?=form_input ($form['n_title']); ?>
        <br>
        </div>

        <?=form_input ($form['n_content']); ?>
        <!-- <textarea  rows="10" cols="50" name="content"> </textarea> -->
        <br>
        <?=form_submit (null, 'Submit');?>
    </div>
    </div>
