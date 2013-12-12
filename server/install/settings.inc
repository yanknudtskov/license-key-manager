<?php
    
    //Your config file template
    $config_file_default    = "configuration";
   
    //What directory to save your config file to
    $config_file_directory  = "../";	

    //What should your config file be called
    $config_file_name       = "config.php";
   
    //Leave this alone
    $config_file_path       = $config_file_directory.$config_file_name;

    //Your software name
    $application_name       = "License Key Manager"; 

    //Your software version
    $application_version    = "1.0.0"; 

    //Redirect to after install
    $application_start_file = "../admin.php"; 

    //License file
    $license_agreement_page = "../license.txt"; 

    //Copyright
    $copyright              = "&copy; 2013 Jason Jersey."; 

    //Icon max 40x40
    $logo                   = "images/settings.png"; 

    //Initializes SQL dump. Do-not edit or delete this file
    $sql_dump               = "database.sql";

    //SQL stuff you want imported into the database
    $sql_import             = "CREATE TABLE `keys` ( `id` TINYINT( 10 ) NOT NULL AUTO_INCREMENT, `key` VARCHAR( 50 ) NOT NULL, PRIMARY KEY ( `id` ) )";

?>
