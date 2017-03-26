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
    <h2><?php echo lang("SIGN_UP_FORM_TITLE"); ?></h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="<?php echo lang("SIGN_UP_FORM_NAME"); ?>" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="<?php echo lang("SIGN_UP_FORM_EMAIL"); ?>" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="<?php echo lang("SIGN_UP_FORM_PHONE"); ?>" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="<?php echo lang("SIGN_UP_FORM_PASSWORD"); ?>" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="<?php echo lang("SIGN_UP_FORM_PASSWORD_AGAIN"); ?>" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = 'checked="checked"';
                $fcheck = '';
            }
            ?>
            <div class="radio">
                <label>
                <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
                <?php echo lang("SIGN_UP_FORM_SEX_MALE"); ?>
                </label>
            </div>
            <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                  <?php echo lang("SIGN_UP_FORM_SEX_FEMALE"); ?>
                </label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn btn-primary" value="<?php echo lang("SIGN_UP_FORM_SUBMIT"); ?>"/>
        </div>
    </form>
    <p class="footInfo"><?php echo lang("SIGN_UP_FORM_IF_USER_QUESTION"); ?> <a href="<?php echo base_url(); ?>users/login"><?php echo lang("MENU_LOG_IN"); ?></a></p>              
</div>
</body>
</html>