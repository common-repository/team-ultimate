<?php
/*
	Plugin Name: Team Ultimate
	Plugin URI: https://pickelements.com/team-ultimate
	Description: Team Ultimate plugin allows you to create and manage nice team page easily. You can create unlimited teams, members and categories. It is a highly customizable plugin. You can change all colors, font sizes, spacings etc via options page.
	Version: 2.0.5
	Author: Pickelements
	Author URI: https://pickelements.com
	TextDomain: team-ultimate
	License: GPLv2
*/

	if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

	define('TEAM_ULTIMATE_VERSION_WP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('team_ultimate_version_wp_plugin_dir', plugin_dir_path( __FILE__ ) );
	add_filter('widget_text', 'do_shortcode');

	# Team Ultimate enqueue scripts
	function pe_teamultimate_wordpress_post_script(){
		wp_enqueue_style( 'team-ultimate-font', plugins_url( 'public/css/font-awesome.css' , __FILE__ ) );
		wp_enqueue_style( 'team-ultimate-animate', plugins_url( 'public/css/animate.css' , __FILE__ ) );
		wp_enqueue_style( 'team-ultimate-public-css', plugins_url( 'public/css/team-ultimate-public.css' , __FILE__ ) );
		wp_enqueue_style( 'team-ultimate-carousel', plugins_url( 'public/css/owl.carousel.min.css' , __FILE__ ) );
		wp_enqueue_style( 'team-ultimate-carousel-theme', plugins_url( 'public/css/owl.theme.default.css' , __FILE__ ) );
		wp_enqueue_script('jquery');
		wp_enqueue_script('team-ultimate-wow-js', plugins_url('public/js/wow.js', __FILE__), array('jquery'), '3.0.4', true);
		wp_enqueue_script('team-ultimate-isotope-js', plugins_url('public/js/isotope.pkgd.min.js', __FILE__), array('jquery'), '3.0.4', true);
		wp_enqueue_script('team-ultimate-owl-js', plugins_url('public/js/owl.carousel.js', __FILE__), array('jquery'), '3.0.4', true);
		wp_enqueue_script('team-ultimate-public-js', plugins_url('public/js/team-ultimate-public.js', __FILE__), array('jquery'), '1.0.0', true);
	}
	add_action('wp_enqueue_scripts', 'pe_teamultimate_wordpress_post_script');

	# Team Ultimate WordPress Load Translation
	function pe_teamultimate_load_textdomain(){
		load_plugin_textdomain('team-ultimate', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action('plugins_loaded', 'pe_teamultimate_load_textdomain');

	# Team Ultimate Custom Title Hook
	function pe_teamultimate_wordpress_custom_title( $title ){
	  $screen = get_current_screen();
	  if  ( 'teamultimate' == $screen->post_type ) {
		$title = 'Enter Your Full Name';
	  }  
	  return $title;
	}	
	add_filter( 'enter_title_here', 'pe_teamultimate_wordpress_custom_title' );	

	# Team Ultimate Admin enqueue scripts
	function pe_teamultimate_admin_enqueue_scripts(){
		wp_enqueue_style( 'team-ultimatde-font', plugins_url( 'public/css/font-awesome.css' , __FILE__ ) );
		wp_enqueue_style( 'team-ultimate-admin-css', plugins_url( 'admin/css/team-ultimate-admin.css' , __FILE__ ) );
		wp_enqueue_script( 'jquery' );
	    wp_enqueue_script("jquery-ui-sortable");
	    wp_enqueue_script("jquery-ui-draggable");
	    wp_enqueue_script("jquery-ui-droppable");
	    wp_enqueue_script( 'team-ac-admin-js', plugins_url( '/admin/js/accordion.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true  );
	    wp_enqueue_script( 'team-ultimate-admin-js', plugins_url( '/admin/js/team-ultimate-admin.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'team_ultimate_color_picker', plugins_url('admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	add_action('admin_enqueue_scripts', 'pe_teamultimate_admin_enqueue_scripts');

	# Post Type
	require_once( 'libs/post-types/team-ultimate-post-type.php' );

	# Metaboxes
	require_once( 'libs/meta-boxes/team-ultimate-post-metaboxes.php' );

	# Shortcode
	require_once( 'libs/shortcode/team-ultimate-shortcode.php' );

	/**
	* Activate the plugin.
	*/
	function pluginprefix_activate() {
	  // Trigger our function that registers the custom post type plugin.
	  pe_teamultimate_mainpost_register();
	  // Clear the permalinks after the post type has been registered.
	  flush_rewrite_rules();
	}
	register_activation_hook( __FILE__, 'pluginprefix_activate' );

	/**
	 * Deactivation hook.
	 */
	function pluginprefix_deactivate() {
	  // Unregister the post type, so the rules are no longer in memory.
	  unregister_post_type( 'teamultimate' );
	  // Clear the permalinks to remove our post type's rules from the database.
	  flush_rewrite_rules();
	}
	register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );