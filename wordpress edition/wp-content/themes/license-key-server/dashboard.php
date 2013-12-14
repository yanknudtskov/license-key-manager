<?php ?>
<div class="wrap about-wrap" id="pbody">
 <h1>Node: <?php bloginfo('name'); ?></h1><br />
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
<div style="font-weight:bold;font-size:14px;margin-bottom:5px">= PHP API =</div>
To get started, first read the <a target="_blank" href="https://docs.google.com/document/d/1mQFf3UhCT42_X_xM_JDCzemN2Py_aJTF-kdRc-lMpho/edit?usp=sharing">documentation</a>.<br />
<pre>//your users unique license key
define('KEY_CODE', '0000-0000-0000-0000');

//callback license key server
$LICENSE_KEY = KEY_CODE;
$keydata = file_get_contents("<?php echo get_bloginfo('wpurl'); ?>/?key=$LICENSE_KEY");

//if license good do noting or else exit
if(strpos($keydata, 'GOOD') !== FALSE){ }else{ exit("TEMPORARILY UNAVAILABLE"); }</pre>
    </div>
</div>
