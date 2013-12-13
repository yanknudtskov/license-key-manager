<?php ?>
<div class="wrap about-wrap" id="pbody">
 <h1><?php bloginfo('name'); ?></h1><br />
   <h2 class="nav-tab-wrapper">
      <a href="#" class="nav-tab nav-tab-active"><?php _e( 'General' ); ?></a>
      <a href="edit.php?post_type=key" class="nav-tab"><?php _e( 'All Keys' ); ?></a>
      <a href="post-new.php?post_type=key" class="nav-tab"><?php _e( 'Add Key' ); ?></a>
      <a href="import.php" class="nav-tab"><?php _e( 'Import' ); ?></a>
      <a href="export.php" class="nav-tab"><?php _e( 'Export' ); ?></a>
      <a href="themes.php" class="nav-tab"><?php _e( 'Themes' ); ?></a>
      <a href="users.php" class="nav-tab"><?php _e( 'Users' ); ?></a>
      <a href="options-general.php" class="nav-tab"><?php _e( 'Settings' ); ?></a>
   </h2>
    <div style="margin-top: 30px">
<h4>Documentation: Client Node</h4>
<pre>//Your users unique license key
define('KEY_CODE', '0000-0000-0000-0000');

//Callback license key server
$LICENSE_KEY = KEY_CODE;
$keydata = file_get_contents("<?php echo get_bloginfo('wpurl'); ?>/?key=$LICENSE_KEY");

if(strpos($keydata, 'GOOD') !== FALSE){ }else{ exit("INVALID LICENSE KEY"); }</pre>
    </div>
</div>
