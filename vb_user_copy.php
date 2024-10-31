<?php
if ( ! defined( 'ABSPATH' ) ){ echo 'Sorry... :D';exit;}
/*
	Plugin Name: PS_VB User Copy 
	Plugin URI: http://pooyasoleimani.ir
	Description: Transfer vBulletin users to Wordpress users.
	Author: Pooya Soleimani
	Version: 1.0
	Author URI: http://pooyasoleimani.ir
	License: GPL2
*/

add_action('admin_menu', 'vb4_user_options');

function vb4_user_options() {

  add_options_page('VB User Copy ', 'VB User Copy ', 'import', 'vb4userimport', 'vb4_options_page');

}

function vb4_options_page() {

  if (!current_user_can('import'))  {
    wp_die('You do not have sufficient permissions to access this page.');
  }

  include('vb_user_copy_options.php');

}
?>