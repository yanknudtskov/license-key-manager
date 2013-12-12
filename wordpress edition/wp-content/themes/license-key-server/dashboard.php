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
define( "LICENSE_KEY", "000-0000-0000-0000" );

//Checks license server to see if the license key is valid
if( !( ini_get(allow_url_fopen) ) ) exit('ERROR: allow_url_fopen must be enabled on your server.');
    
    define( "LICENSE_SERV", "<?php echo get_bloginfo('wpurl'); ?>/?key=" );

    $LICENSE_SERV = LICENSE_SERV;
    $LICENSE_KEY = LICENSE_KEY;
    $licserv = "$LICENSE_SERV$LICENSE_KEY";
    $lines = @file($licserv);
    
    foreach ($lines as $line_num => $line) { 
    $license = htmlspecialchars($line); 
    
    if ($license == "VALID") { 
    //Valid License Key
    } else {
    //Invalid License Key
    exit("ERROR: Invalid License Key"); 
   } 
   
}</pre>
    </div>
</div>
