<div class="container">
    <h2><?php echo lang("ACCOUNT_TITLE"); ?></h2>
    <h3><?php echo lang("ACCOUNT_WELCOME"); ?>, <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><b><?php echo lang("ACCOUNT_NAME"); ?>: </b><?php echo $user['name']; ?></p>
        <p><b><?php echo lang("ACCOUNT_EMAIL"); ?>: </b><?php echo $user['email']; ?></p>
        <p><b><?php echo lang("ACCOUNT_PHONE"); ?>: </b><?php echo $user['phone']; ?></p>
        <p><b><?php echo lang("ACCOUNT_SEX"); ?>: </b><?php echo $user['gender']; ?></p>
		<p><b><?php echo lang("ACCOUNT_ADS"); ?>: </b><?php echo $offers; ?></p>
    </div>
</div>