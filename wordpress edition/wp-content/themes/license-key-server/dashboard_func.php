<?php

// main class
class edf_dashboard {
	function __construct() { 
		add_action('admin_menu', array( &$this,'p_edf_register_menu') );
		add_action('load-index.php', array( &$this,'p_edf_redirect_dashboard') );
	} 

	function p_edf_redirect_dashboard() {
		if( is_admin() ) {

			$screen = get_current_screen();
			if( $screen->base == 'dashboard' ) {
			wp_redirect( admin_url( 'index.php?page=dashboard_view' ) );	

			}
		}
	}


	function p_edf_register_menu() {
	        add_dashboard_page( 'General', 'General', 'read', 'dashboard_view', array( &$this,'p_edf_create_dashboard') );

	}


	function p_edf_create_dashboard() {
		include_once( 'dashboard.php' );

	}
    }


// instantiate dashboard class
$GLOBALS['plugin_edf_dashboard'] = new edf_dashboard();
