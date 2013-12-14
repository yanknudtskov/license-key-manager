<?php

//icryptic version
function icryptic_version() {
    echo '1.1.0';
}

// Register New Dashboard
include_once('dashboard_func.php');

// Register Custom Post Type
function license_key() {

	$labels = array(
		'name'                => _x( 'Keys', 'Post Type General Name', 'wp_license_key' ),
		'singular_name'       => _x( 'Key', 'Post Type Singular Name', 'wp_license_key' ),
		'menu_name'           => __( 'Manage Keys', 'wp_license_key' ),
		'parent_item_colon'   => __( 'Parent Key:', 'wp_license_key' ),
		'all_items'           => __( 'All Keys', 'wp_license_key' ),
		'view_item'           => __( 'View Key', 'wp_license_key' ),
		'add_new_item'        => __( 'Add New Key', 'wp_license_key' ),
		'add_new'             => __( 'New Key', 'wp_license_key' ),
		'edit_item'           => __( 'Edit Key', 'wp_license_key' ),
		'update_item'         => __( 'Update Key', 'wp_license_key' ),
		'search_items'        => __( 'Search keys', 'wp_license_key' ),
		'not_found'           => __( 'No keys found', 'wp_license_key' ),
		'not_found_in_trash'  => __( 'No keys found in Trash', 'wp_license_key' ),
	);
	$rewrite = array(
		'slug'                => 'license-key',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'key', 'wp_license_key' ),
		'description'         => __( 'License Key', 'wp_license_key' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => false,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => false,
		'menu_position'       => 10,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'query_var'           => 'key',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'key', $args );

}

// Hook into the 'init' action
add_action( 'init', 'license_key', 0 );

// Change license post_type title
function change_license_key_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'key' == $screen->post_type ) {
          $title = '0000-0000-0000-0000';
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'change_license_key_title' );

// Remove default wp admin menus
function remove_menus(){
  
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );

// Remove default wp admin submenus
function adjust_the_wp_menu() {
  remove_submenu_page( 'themes.php', 'customize.php' );
  //remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_submenu_page( 'options-general.php', 'options-reading.php' );
  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
  remove_submenu_page( 'options-general.php', 'options-media.php' );
  remove_submenu_page( 'options-general.php', 'options-permalink.php' );
  remove_submenu_page( 'options-general.php', 'options-writing.php' );
}
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );

// Custom adminbar
function lkm_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    echo '<style>#wp-admin-bar-site-name, #wp-admin-bar-new-content, #wp-admin-bar-search {display:none}#collapse-menu{display:none}pre{font-size:12px;background:#F7F7F7;border: 1px dashed #ccc;padding: 10px}#screen-meta-links{display:none}#titlediv div.inside, #preview-action{display:none}span.inline.hide-if-no-js, span.view{display:none}#minor-publishing-actions{display:none}</style>';
}
add_action( 'wp_before_admin_bar_render', 'lkm_admin_bar_render' );

// Remove the WordPress Logo from the Toolbar
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

// remove some more from adminbar
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
function remove_wp_nodes() 
{
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-page' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
    $wp_admin_bar->remove_node('feedback');
    $wp_admin_bar->remove_node('view-site');
}

// customize left wp-admin footer text
function lkm_admin_footer() {
    echo '&copy ';
    echo date('Y');
    echo ' Jason Jersey | GNU GPL 3.0+';
} 
add_filter('admin_footer_text', 'lkm_admin_footer');

// remove wp version from admin footer
function lkm_version() {
    echo 'License Key Manager (Server Node) v';
    echo icryptic_version();
}
add_filter( 'update_footer', 'lkm_version', '1234');
 
//hide nag updates
function wphidenag_updates(){
    remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','wphidenag_updates');

//get ready to change backend text
add_filter('gettext', 'change_howdy', 10, 3);

//start changing backend text
function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Yeehaw', $translated);

    if (false !== strpos($translated, 'My Sites'))
        return str_replace('My Sites', 'My Nodes', $translated);
 
    if (false !== strpos($translated, 'Public'))
        return str_replace('Public', 'Active', $translated);

    if (false !== strpos($translated, 'Password protected'))
        return str_replace('Password protected', 'Safe mode', $translated);

    //if (false !== strpos($translated, 'Private'))
        //return str_replace('Private', 'Disabled', $translated);

    if (false !== strpos($translated, 'Password Protected'))
        return str_replace('Password Protected', 'Safe Mode', $translated);

    if (false !== strpos($translated, 'Post updated'))
        return str_replace('Post updated', 'Key updated', $translated);

    if (false !== strpos($translated, 'Post published'))
        return str_replace('Post published', 'Key created', $translated);

    if (false !== strpos($translated, 'Site Title'))
        return str_replace('Site Title', 'Node Name', $translated);

    if (false !== strpos($translated, 'Tagline'))
        return str_replace('Tagline', 'Description', $translated);

    if (false !== strpos($translated, 'site is about'))
        return str_replace('site is about', 'node is for', $translated);

    if (false !== strpos($translated, 'General Settings'))
        return str_replace('General Settings', 'Node Settings', $translated);

    if (false !== strpos($translated, 'Site Address'))
        return str_replace('Site Address', 'Node Address', $translated);

    if (false !== strpos($translated, 'Add New Site'))
        return str_replace('Add New Site', 'Add New Node', $translated);

    if (false !== strpos($translated, 'Site added'))
        return str_replace('Site added', 'Node added', $translated);

    if (false !== strpos($translated, 'Edit Site'))
        return str_replace('Edit Site', 'Update Node', $translated);

    if (false !== strpos($translated, 'Create a New Site'))
        return str_replace('Create a New Site', 'Create New Node', $translated);

    if (false !== strpos($translated, 'Primary Site'))
        return str_replace('Primary Site', 'Primary Node', $translated);

    if (false !== strpos($translated, 'Draft'))
        return str_replace('Draft', 'Preparing', $translated);

    if (false !== strpos($translated, 'Publish'))
        return str_replace('Publish', 'Start', $translated);

    if (false !== strpos($translated, 'Visibility'))
        return str_replace('Visibility', 'License', $translated);

    if (false !== strpos($translated, 'Visibility'))
        return str_replace('Visibility', 'License', $translated);

    if (false !== strpos($translated, 'Private'))
        return str_replace('Private', 'Inactive', $translated);

    return $translated;
}

//disable theme updates
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
