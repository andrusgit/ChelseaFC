
<div class="container">
    <h2><?php echo lang("LOG_IN_FORM_TITLE"); ?></h2>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form method="post">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="<?php echo lang("LOG_IN_FORM_EMAIL"); ?>" required="" value="">
            <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="<?php echo lang("LOG_IN_FORM_PASSWORD"); ?>" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="loginSubmit" class="btn btn-primary" value="<?php echo lang("LOG_IN_FORM_ENTER"); ?>"/>
        </div>
    </form>
    <p class="footInfo"><?php echo lang("LOG_IN_FORM_NOT_USER_QUESTION"); ?> <a href="<?php echo base_url(); ?>users/registration"><?php echo lang("MENU_SIGN_UP"); ?></a></p>
</div>
