<!DOCTYPE html>
<html lang="en">  
<head>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<?php 
	if(isset($title)){
		echo "<title>" . $title . "</title>";
	} else {
		echo "<title>Tiitel puudub</title>";
	}
?>
</head>
<body>
<div class="container">
    <h2><?php echo lang("LOG_IN_FORM_TITLE"); ?></h2>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form action="" method="post">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="">
            <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Parool" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="loginSubmit" class="btn btn-primary" value="Sisene"/>
        </div>
    </form>
    <p class="footInfo"><?php echo lang("LOG_IN_FORM_NOT_USER_QUESTION"); ?> <a href="<?php echo base_url(); ?>users/registration"><?php echo lang("MENU_SIGN_UP"); ?></a></p>
</div>
</body>
</html>