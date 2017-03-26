<div class="container">
    <h2><?php echo lang("ACCOUNT_TITLE"); ?></h2>
    <h3><?php echo lang("ACCOUNT_WELCOME"); ?>, <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><em><?php echo lang("ACCOUNT_NAME"); ?>: </em><?php echo $user['name']; ?></p>
        <p><em><?php echo lang("ACCOUNT_EMAIL"); ?>: </em><?php echo $user['email']; ?></p>
        <p><em><?php echo lang("ACCOUNT_PHONE"); ?>: </em><?php echo $user['phone']; ?></p>
        <p><em><?php echo lang("ACCOUNT_SEX"); ?>: </em><?php echo $user['gender']; ?></p>
		<p><em><?php echo lang("ACCOUNT_ADS"); ?>: </em><?php echo $offers; ?></p>
    </div>
</div>