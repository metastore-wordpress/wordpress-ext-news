<?php
/**
 * Plugin Name:     (WP-EXT) News
 * Plugin URI:      https://metastore.pro/
 *
 * Description:     News post type and more.
 *
 * Author:          Kitsune Solar
 * Author URI:      https://kitsune.solar/
 *
 * Version:         1.0.0
 *
 * Text Domain:     wp-ext-news
 * Domain Path:     /languages
 *
 * License:         GPLv3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Loading `WP_EXT_News`.
 * ------------------------------------------------------------------------------------------------------------------ */

function run_wp_ext_news() {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Post_Type.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Post_Field.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Taxonomy.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_User_Role.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Theme.class.php' );
//	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Template.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_ShortCode.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_News_Widget.class.php' );
}

run_wp_ext_news();
