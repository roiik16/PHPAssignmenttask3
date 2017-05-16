<div id="signinpage">
    <div id="sign-inmain">
        <div id="logoimageapp"></div>
        <div id="colorleft">
            <div class="image4app"></div>
            <h1>Sign in</h1>
            <div id = "signinform">


            <?=form_open ('users/do_signin'); ?>


              <div id="emailadd">
                <?=form_input ($form['email']); ?>
              </div>

                <div id="password">
                  <?=form_input ($form['password']); ?>
                </div>


                  <?=form_submit (null, 'Login');?>

                  <?=form_close (); ?>
              </div>
        </div>
        <div id="colorright">
            <span>OR</span>
            <img id="facebooklogin" src="<?=base_url('images/facebooklogin.png')?>">
            <img id="googlelogin" src="<?=base_url('images/google-sign-in.png')?>">
        </div>
    </div>
</div>
</body>
