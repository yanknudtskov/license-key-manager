<?php

//Your users unique license key
define( "LICENSE_KEY", "000-0000-0000-0000" );

//Checks license server to see if the license key is valid for this script.
if( !( ini_get(allow_url_fopen) ) ) exit('Configuration Error: allow_url_fopen must be enabled on your server for this script to work');
    
    define( "LICENSE_SERV", "http://example.com/server/check.php?key=" );

    $LICENSE_SERV=LICENSE_SERV;
    $LICENSE_KEY=LICENSE_KEY;
    $licserv = "$LICENSE_SERV$LICENSE_KEY";
    $lines = @file($licserv);
    
    foreach ($lines as $line_num => $line) { 
    $license = htmlspecialchars($line); 
    
    if ($license == "INVALID") { 
   exit("<font color=black><b>Invalid License Key</b></font>"); 
   } 
   
}

?>
