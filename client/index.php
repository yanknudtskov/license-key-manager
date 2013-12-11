<?php

/*
Checks to ensure key.php hasn't been removed or renamed.
*/
$filename = 'key.php';
if (file_exists($filename)) { } 
else {
    exit("<h4>LICENSE ERROR: </h4><font color=black>The file at http://yourdomain.com/<b>$filename</b> either has been removed or renamed.
<ul>
<font color=red><li>$filename must be left as-is (not modified, removed, renamed) or this script will not function.</li></font>
</ul>
</font>");
}

require( "key.php" );

/*
Checks license server to see if the license key is valid for this script.
*/
error_reporting(0);
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