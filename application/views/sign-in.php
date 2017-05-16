<div id="signinpage">
    <div id="sign-inmain">
        <div id="logoimageapp"></div>
        <div id="colorleft">
            <div class="image4app"></div>
            <h1>Sign in</h1>
            <form id="signinform" action="login.php" method="post">

                <input type="text" name="username" id="emailadd" placeholder="Username or E-mail" required>

                <input type="Password" name="password" id="password" placeholder="Password" required>

    <?php if ($_SERVER['REQUEST_METHOD'] === "POST" and $login === FALSE): ?>
                        <span id="testtext">*Wrong username or password! </span>
    <?php endif;?>
                <div id="forgotcreate">
                    <a href="google.co.uk">Forgot password /</a>
                    <a href="register.php">Create new account</a>
                </div>
                <button type="submit" id="sign-in">Sign-in</button>
            </form>
        </div>
        <div id="colorright">
            <span>OR</span>
            <img id="facebooklogin" src="<?=base_url('images/facebooklogin.png')?>">
            <img id="googlelogin" src="<?=base_url('images/google-sign-in.png')?>">
        </div>
    </div>
</div>
</body>
