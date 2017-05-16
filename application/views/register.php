<!-- Below the header code -->
<div id="registerpage">
    <header>
        <h1>Register</h1>
    </header>
  <div id="registerform">
          <?=form_open ('users/do_register'); ?>
            <div class="input-pair">
                <label>Name </label>
                <?=form_input ($form['full_name']); ?>
            </div>
            <div class="input-pair">
                <label>Email </label>
                <?=form_input ($form['email']); ?>
            </div>
            <div class="input-pair">
                <label>Password</label>
                <?=form_input ($form['password']); ?>
            </div>
          <?=form_submit (null, 'Register');?>
      </div>
</div>
