<div class="container text-center">
</div>
<?php
if(!empty($authUrl)) {
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'images/flogin.png" alt=""/></a>';
}else{
?>
<div class="wrapper text-center">
    <div class="fb_box">
        <p class="image"><img src="<?php echo $userData['picture_url']; ?>" alt="" width="300" height="220"/></p>
        <p><b>Facebook ID: </b><?php echo $userData['oauth_uid']; ?></p>
        <p><b><?php echo lang("ACCOUNT_NAME"); ?>: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b><?php echo lang("ACCOUNT_EMAIL"); ?>: </b><?php echo $userData['email']; ?></p>
        <p><b><?php echo lang("ACCOUNT_SEX"); ?>: </b><?php echo $userData['gender']; ?></p>
        <p><a href="<?php echo $userData['profile_url']; ?>" target="_blank"><?php echo lang("FB_VISIT"); ?>: </a></p>
        <p><b><a href="<?php echo $logoutUrl; ?>"><?php echo lang("FB_LOGOUT"); ?>: </a></b></p>
    </div>
</div>
<?php } ?>