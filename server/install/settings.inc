<?php
    
    $config_file_default    = "configuration"; //Your config file template
   
    $config_file_directory  = "../"; //What directory to save your config file to?	

    $config_file_name       = "config.php"; //What should your config file be called?
   
    $config_file_path       = $config_file_directory.$config_file_name; //Leave this alone

    $application_name       = "License Key Manager"; //Your software name

    $application_version    = "1.0.0"; //Your software version

    $application_start_file = "../admin.php"; //Redirect to after install

    $license_agreement_page = "../license.txt"; //License file

    $copyright              = "&copy; 2013 Jason Jersey."; //Copyright

    $logo                   = "images/settings.png"; //Icon max 40w × 40h

    $sql_dump               = "database.sql"; //Initializes SQL dump. Do-not edit or delete this file.

    $sql_import             = "CREATE TABLE `keys` (
`id` TINYINT( 10 ) NOT NULL AUTO_INCREMENT,
`key` VARCHAR( 50 ) NOT NULL,
PRIMARY KEY ( `id` )
)"; //SQL stuff you want imported into the database.

?>