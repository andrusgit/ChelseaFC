$(window).load(function() {
	$('a[data-gravatar-hash]').prepend(function(index){
		var hash = $(this).attr('data-gravatar-hash')
		return '<img class="img" alt="logi1-1.png" src="<?php echo base_url(); ?>/images/logo1-1.png">'
	})
})
