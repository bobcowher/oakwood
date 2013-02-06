<?php
/*
	The search form
	
*/
?>

<form method="get" class="searchform" action="<?php echo home_url(); ?>/">
	<fieldset>
		<input type="text" value="<?php _e('Search','delia');?>" name="s" class="searchfield" onfocus="if (this.value == '<?php _e('Search','delia');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search','delia');?>';}" />

		<input type="image" class="submit btn" name="submit" src="<?php echo get_template_directory_uri();?>/images/searchbutton.png" alt="Go" />
	</fieldset>
</form>

