<?php
if ( ! defined( 'ABSPATH' ) ){ echo 'Sorry... :D';exit;}
?>
<div class="wrap">
	<h2>vBulletin User Transfer</h2>
	<form name="vb_transfer_form" method="post" action="<?php print wp_nonce_url(admin_url('options-general.php?page=vb4userimport'), 'doing_something', 'my_nonce');?>">
		<input type="hidden" name="vb_transfer_options">
		<h4>Dear Freind!.</br>This Plugin does not transfer dublicate user.! :D </br> Keep Calm and Enjoy :) </br></h4>
		<div class="error"><p><strong>NOTICE!!</br> After user transfered. you're user must click on <a href="<?php echo get_site_url(); ?>/wp-login.php?action=lostpassword">FORGET PASSWORD</a> and select a new password :D</br></strong></p></div>
		
		<h4>VBulletin Database Settings</h4>
		<p>Database host:<input type="text" name="vb_transfer_dbhost" value="<?php echo $vb_dbhost; ?>" size="20">Defualt localhost</br> if it's Don't WORKING Contact host administrator :D and get this from his.</p>
		<p>Database name:<input type="text" name="vb_transfer_dbname" value="<?php echo $vb_dbname; ?>" size="20"></br>The Database Name of VBulletin datebase You can find this on config.php in includes folder on vbulletin directory</p>
		<p>Database user:<input type="text" name="vb_transfer_dbuser" value="<?php echo $vb_dbuser; ?>" size="20"></br>The Username of VBulletin datebase You can find this on config.php in includes folder on vbulletin directory</p>
		<p>Database password:<input type="text" name="vb_transfer_dbpwd" value="<?php echo $vb_dbpwd; ?>" size="20"></br>The Password of VBulletin datebase You can find this on config.php in includes folder on vbulletin directory</p>
		<p>vBulletin Prefix:<input type="text" name="vb_transfer_dbprfx" value="<?php echo $vb_dbprfx; ?>" size="20">Defualt:EMPTY</p>
		
		<div class="submit">
		<input type="submit" name="Submit" value="Save" />
		</div>
	</form>
	<hr>
	<form name="vb_transfer_users" method="post" action="<?php print wp_nonce_url(admin_url('options-general.php?page=vb4userimport'), 'doing_something', 'my_nonce');?>">
		<input type="hidden" name="vb_user_import">
		<div class="submit">
		<input type="submit" name="Submit" value="Import Users" />
		</div>
	</form>
</div>