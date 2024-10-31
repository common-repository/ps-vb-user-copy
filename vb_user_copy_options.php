<?php
if ( ! defined( 'ABSPATH' ) ){ echo 'Sorry... :D';exit;}

	if(isset($_POST['vb_transfer_options'])){
		update_option('vb_dbhost', sanitize_text_field($_POST['vb_transfer_dbhost']));
		update_option('vb_dbname', sanitize_text_field($_POST['vb_transfer_dbname']));
		update_option('vb_dbuser', sanitize_text_field($_POST['vb_transfer_dbuser']));
		update_option('vb_dbpwd', sanitize_text_field($_POST['vb_transfer_dbpwd']));
		update_option('vb_dbprfx', sanitize_text_field($_POST['vb_transfer_dbprfx']));
		echo '<div class="updated"><p><strong>Options saved</strong></p></div>';
	}
	$vb_dbhost = get_option('vb_dbhost');
	$vb_dbname = get_option('vb_dbname');
	$vb_dbuser = get_option('vb_dbuser');
	$vb_dbpwd = get_option('vb_dbpwd');
	$vb_dbprfx = get_option('vb_dbprfx');
if (!isset($_GET['my_nonce']) || !wp_verify_nonce($_GET['my_nonce'], 'doing_something')) {?> <div class="wrap">
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
</div><?php
}else{

	//Start User Import
	if (isset($_POST['vb_user_import'])){
		global $wpdb;
		
			$conn = new mysqli($vb_dbhost, $vb_dbuser, $vb_dbpwd, $vb_dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT username,email,usertitle,joindate FROM ".$vb_dbprfx."user";
$users = $conn->query($sql);
$conn->close();
			if ($users){
				echo '<div class="wrap">';
				while($user = $users->fetch_assoc()) {
					$username =$user["username"];
					$email=$user["email"];
					$joindate= $user["joindate"];
					$name = $wpdb->get_results("SELECT 'user_login' FROM 'wp_users' WHERE 'user_login' =".$username."");
					wp_insert_user(array( 'ID' => '', 'user_login' => $username, 'user_pass' => '', 'user_nicename' => $username, 'user_email' => $email,  'user_url' => '', 'user_registered' => date('Y-m-d H:i:s', $joindate), 'user_activation_key' => '', 'user_status' => '', 'display_name' => $username));
					echo $user["username"].' added successfully.<br>';
					
				
				}
echo '<div class="updated"><p><strong>Users imported successfully. </br> Good LUCK! Coded By <a href="http://pooyasoleimani.ir">Pooya Soleimani</a></strong></p></div>';
			?>
			
<?php
			}
			else{
			echo '<div class="updated"><p><strong>Users imported successfully. </br> Good LUCK! Coded By<a href="pooyasoleimani.ir">Pooya Soleimani</a></strong></p></div>';
			include (plugin_dir_path(__FILE__) . '/vb_user_copy_page.php');
			}
		
		
	}
	//End User Import
	else{
		include (plugin_dir_path(__FILE__) . '/vb_user_copy_page.php');
	}
}
function sanitizeString($var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var, ENT_COMPAT, 'UTF-8');   
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    $var=str_replace("/"," ",$var);
    $var=str_replace("\\"," ",$var);
    $var=str_replace("^"," ",$var);
    $var=str_replace("~"," ",$var);
    $var=str_replace("etc"," ",$var);
    $var=str_replace("passwd"," ",$var);
    return $var; 
  }
?>