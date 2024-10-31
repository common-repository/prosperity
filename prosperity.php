<?php
/**
 * @package Prosperity_Plugin
 * @version 2.1.0
 */
/*
Plugin Name: Prosperity
Description: When activated you will randomly see prosperity scriptures in posts with shortcode and in the upper right of your admin screen on every page. Widget will be available in 'Widgets' menu after activation. See admin panel for shortcode to display scriptures in posts.
Author: HahnCreativeGroup
Version: 2.1.0
Author URI: http://plugingarden.com/
*/
if (!class_exists("Prosperity")) {
	class Prosperity {
		public function __construct() {
			// Now we set that function up to execute when the admin_notices action is called
			require 'classes/verse-selector.php';
			require 'classes/widget.php';
			
			add_shortcode( 'Prosperity', array($this, 'Prosperity_Handler') );
			add_action('widgets_init', array($this, 'RegisterProsperityWidget') );
			
			if (is_admin()) {
				add_action( 'admin_notices', array($this, 'prosperity') );
				add_action( 'admin_head', array($this, 'prosperity_css') );
				add_action( 'admin_menu', array($this, 'add_Prosperity_menu') );
				add_filter('plugin_row_meta', array($this, 'create_prosperity_plugin_links'), 10, 2);	
			}			
		}
		
		// This just echoes the chosen line, we'll position it later
		public function prosperity() {				
			$link = "<br><a href=\"http://lifetoday.org/outreaches/\" target=\"_blank\">Give to an outreach</a>";
			echo $this->displayProsperity($link);
		}
		
		// We need some CSS to position the paragraph
		public function prosperity_css() {
			// This makes sure that the positioning is also good for right-to-left languages
			$x = is_rtl() ? 'left' : 'right';
		
			echo "
			<style type='text/css'>
			#prosper {
				float: $x;
				padding-$x: 15px;
				padding-top: 5px;		
				margin: 0;
				font-size: 11px;
				text-align: $x;
			}
			</style>
			";
		}		
		
		// Taken from Google XML Sitemaps from Arne Brachhold
		public function create_prosperity_plugin_links($links, $file) {
			
			if ( $file == plugin_basename(__FILE__) ) {			
				$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YEM6BT83GHFD4">' . __('Donate', 'prosperity') . '</a>';
				$links[] = '<a href="http://lifetoday.org/outreaches/">' . __('Outreaches', 'prosperity') . '</a>';				
			}
			return $links;
		}		
		
		public function displayProsperity($donationLink = null) {
			$prosperity = new Prosperity_Verses();
			$verse = $prosperity->get_verse();
			$link = ($donationLink == null) ? '' : '<br/>' . $donationLink;
			$display = $verse . $link;
			
			return "<p id='prosper'>$display</p>";
		}
		
		//Add shortcode to display scripture in content
		public function Prosperity_Handler() {
			return $this->displayProsperity();
		}		
		
		// Create Admin Panel
		public function add_Prosperity_menu()
		{
			add_menu_page(__('Prosperity','menu-Prosperity'), __('Prosperity','menu-Prosperity'), 'manage_options', 'Prosperity-admin', array($this, 'showProsperityMenu') );
		}
		
		public function showProsperityMenu()
		{	
			?>
				<div id='wrap'>
					<h2>Prosperity</h2>
					<p><strong>Shortcodes</strong></p>
					<p><code>[Prosperity]</code> - Adding this shortcode to any of your posts will also display random prosperity scriptures to your visitors.</p>
					<br />
					<p><em>Please consider donating to the continued development of this plugin. Thanks.</em></p>
					<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YEM6BT83GHFD4" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></a></p>
					<br />
                    <p><em>Also consider giving to one of these amazing outreaches</em></p>
					<p><a href="http://lifetoday.org/outreaches/" target="_blank">LIFE today Outreaches</a></p>            
					<p><a href="http://www.jentezenfranklin.org/outreach/" target="_blank">Jentzen Franklin Ministries Outreaches</a></p>
                    <p><a href="http://plugingarden.com/wordpress-paypal-plugin/?src=prsp" target="_blank"><img src="http://labs.hahncreativegroup.com/wp-content/uploads/2011/10/CustomPostDonationsPro-Banner.gif" width="374" height="60" border="0" alt="Custom Post Donations Pro" /></a></p>
                    <h2><a href="http://plugingarden.com/wordpress-gallery-plugin/?src=prsp" target="_blank">Try Custom Post Donations Pro</a></h2>
                    <p><em>This WordPress plugin will allow you to create unique customized PayPal donation widgets to insert into your WordPress posts or pages and accept donations.</em></p>
                     <ul>
                        <li>Add customized donation forms to your posts or pages</li>
                        <li>Designate alternate PayPal accounts for donations</li>
                        <li>Add donation form titles</li>
                        <li>Manage multiple donation forms from the easy access admin interface</li>
                        <li>Ability to edit donation widgets</li>
                     </ul>
                     <strong><a href="http://plugingarden.com/wordpress-paypal-plugin/?src=prsp" target="_blank">Custom Post Donations Pro</a></strong>
                     <p><a href="http://plugingarden.com/wordpress-gallery-plugin/?src=prsp" target="_blank"><img title="WP-Easy-Gallery-Pro_468x88" src="http://labs.hahncreativegroup.com/wp-content/uploads/2012/02/WP-Easy-Gallery-Pro_468x88.gif" alt="" width="468" height="88" /></a></p>
                     <p><strong>Try WP Easy Gallery Pro</strong><br /><em>Pro Features include: Multi-image uploader, Enhanced admin section for easier navigation, Image preview pop-up, and more...</em></p>
				</div>    
			<?php
		}		
		
		//Add widget functionality
		public function RegisterProsperityWidget() {		
			//Include Widget	
			register_widget("Prosperity_Widget");
		}		
	}
}

if (class_exists("Prosperity")) {
    global $ob_Prosperity;
	$ob_Prosperity = new Prosperity();
}
?>
