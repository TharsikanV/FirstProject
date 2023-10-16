<?php
    session_start();
    include "header.html";
    include "process/p-Login.php"
?>
<body>
    <div class="login-form">
        <div class="login-title">
            <h1>Login Page</h1>
            <br>
        </div>
        <form action="" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label">Email</label>
                <div>
                    <input type="text" class="form-control" name="email">
                    <?php //$h->keepValues($email, 'textbox'); ?>
                </div>

            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <div>
                    <input type="password" class="form-control" name="password">
                    <?php //$h->keepValues($email, 'textbox'); ?>
                </div>

            </div>
            <div class="error"><?php echo $msg?></div>
            <div class="register-buttons">
                <button type="submit" name = "login">Login</button>
                <input type="reset" value="Clear">
                </div>
        </form>
    </div>
<?php
        include "footer.html";
?>
</body>