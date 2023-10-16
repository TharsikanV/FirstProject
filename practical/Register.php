<?php
    include "header.html";
    include "process/p-Register.php";
?>
<body>
    <div class="container">
    <div class="form">
            <div class="title">
                <h1>Registration Page</h1>
                <br>
            </div>
        <form action="" method="post" class="form-horizontal">
           
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div>
                        <input type="text" class="form-control" name="email"<?php $h->keepValues($email, 'textbox'); ?>>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label">Profile Name</label>
                    <div>
                        <input type="text" class="form-control" name="Profile-name">
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
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <div>
                        <input type="password" class="form-control" name="confirm-password">
                        <?php //$h->keepValues($email, 'textbox'); ?>
                    </div>

                </div>
                <div class="error"><?php echo $msg;?>
                </div>
                <div class="register-buttons">
                <button type="submit" name = "register">Register</button>
                <input type="reset" value="Clear">
                </div>
        </form>
    </div>
    </div>
    <?php
        include "footer.html";
    ?>
</body>
