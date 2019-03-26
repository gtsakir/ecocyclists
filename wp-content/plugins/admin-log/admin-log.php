<?php
/*
Plugin Name: Admin Log
Plugin URI: http://www.presscoders.com/
Description: Need to see who is accessing what in your admin section? This Plugin logs admin activity, and shows the page, user information, and time of access.
Version: 1.2.1
Author: David Gwyer
Author URI: http://www.presscoders.com/
*/

/*  Copyright 2009 David Gwyer (email : d.v.gwyer(at)gwycon.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

register_activation_hook(__FILE__, 'gc_al_add_defaults');
register_uninstall_hook(__FILE__, 'gc_al_delete_plugin_options');
add_action('admin_init', 'gc_al_init' );
add_action('admin_menu', 'gc_al_add_options_page');
add_action('plugins_loaded', 'gc_al_write_text' );

// Define default option settings
function gc_al_add_defaults() {
	$tmp = get_option('gc_al_options');
    if(($tmp['chk_default_options_db']=='1')||(!is_array($tmp))) {
		delete_option('gc_al_options'); // so we don't have to reset all the 'off' checkboxes too!
		$arr = array("chk_ignore_adminlog" => "0", "txtar_log" => "");
		update_option('gc_al_options', $arr);
	}
}

// Delete options table entries only when plugin deactivated AND deleted
function gc_al_delete_plugin_options() {
	delete_option('gc_al_options');
	delete_option('gc_al_admin_log');
}

// Use the Settings API for our Plugin options
function gc_al_init(){
	register_setting( 'gc_al_plugin_options', 'gc_al_options' );
}

// Add menu page
function gc_al_add_options_page() {
	add_options_page('Admin Log Options Page', 'Admin Log', 'manage_options', __FILE__, 'gc_al_render_form');
}

// Draw the menu page itself
function gc_al_render_form() {
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Admin Log</h2>
		<?php

		// Check to see if user clicked on the clear admin button
		if(isset($_POST['gc_al_clear_log'])) {
			// Clear admin log
			update_option('gc_al_admin_log', null);
			?><div class="error" style="margin-bottom: 0px;"><p>Admin log erased!</p></div><?php
		}
		?>
		<div style="margin-bottom: 30px;">
			<table class="form-table">
				<tr>
					<td colspan="2">
						<textarea name="gc_al_log" rows="15" cols="110" type='textarea' readonly><?php echo get_option('gc_al_admin_log'); ?></textarea>
					</td>
				</tr>
				<tr>
					<td Width="554">
						<div>
							<form action="<?php echo currURL(); // current page url ?>" method="post" id="gc_al_clear_admin_log" style="display:inline;">
								<span class="submit-admin-log">
									<input type="submit" onclick="return confirm('Are you sure? The admin log will be erased!');" class="button submit-button clear-log-button" value="Clear Admin Log" name="admin_log_clear">
									<input type="hidden" name="gc_al_clear_log" value="true">
								</span>
							</form>
						</div>
					</td>
					<td>
						<div>Approx. word count: <?php echo str_word_count(get_option('gc_al_admin_log')); ?> <span style="font-style:italic;color:#666666;margin:0px 0px 30px 2px;">(readonly)</span></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</div>

		<form method="post" action="options.php">
			<?php settings_fields('gc_al_plugin_options'); ?>
			<?php $options = get_option('gc_al_options'); ?>
			<table class="form-table">
				<tr style="border-top:#dddddd 1px solid;">
					<td colspan="2">
						<h2 style="padding-top:0px;">Admin Log Options</h2>
					</td>
				</tr>
				<tr valign="top">
					<td colspan="2">
						<label><input name="gc_al_options[chk_ignore_adminlog]" type="checkbox" value="1" <?php if (isset($options['chk_ignore_adminlog'])) { checked('1', $options['chk_ignore_adminlog']); } ?> /> Ignore Admin Log Page?</label><br />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p>The Admin Log page will be included in the log by default. This can inflate the log which may be undesirable.</p>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>

		<div style="margin:20px 0px 5px 0px;border-top:#dddddd 1px solid;"></div>

		<table width="600">
			<tr>
				<td>
					<p style="margin-top:20px;font-style:italic;">
						<span><a href="http://www.facebook.com/PressCoders" title="Our Facebook page" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/wp-content-filter/images/facebook-icon.png" /></a></span>
						&nbsp;&nbsp;<span><a href="http://www.twitter.com/dgwyer" title="Follow on Twitter" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/wp-content-filter/images/twitter-icon.png" /></a></span>
						&nbsp;&nbsp;<span><a href="http://www.presscoders.com" title="PressCoders.com" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/wp-content-filter/images/pc-icon.png" /></a></span>
					</p>
				</td>
				<td>
					<div style="padding:5px;">
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="4051383">
							<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
							<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
						</form>
					</div>
				</td>
			<tr>
		</table>
	</div>
	<?php
}

function gc_al_write_text() {
	if(is_admin()) {
		$options = get_option('gc_al_options');
		$log = get_option('gc_al_admin_log');
		$user = wp_get_current_user();

		// Is user logged in?
		if ($user) {
			if ( !(isset($options['chk_ignore_adminlog']) && $options['chk_ignore_adminlog']=="1") ) {
				$url = explode("/wp-admin/", $_SERVER["REQUEST_URI"]);
				$txt = date('j/n/y @ G:i:s').', ('.$user->user_login.', '.$user->first_name.' '.$user->last_name.') => '.$url[1]."\r\n";
				$txt = $log.$txt;
				update_option('gc_al_admin_log', $txt);
			}
		}
	}
}

// Get URL of current page
function currURL() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

?>