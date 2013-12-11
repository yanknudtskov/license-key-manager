<?php

    require_once("settings.inc");    

    if (file_exists($config_file_path)) {        
		header("location: ".$application_start_file);
        exit;
	}
        
    ob_start();
    phpinfo(-1);
    $phpinfo = array('phpinfo' => array());
    if(preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER))
    foreach($matches as $match){
        if(strlen($match[1]))
            $phpinfo[$match[1]] = array();
        elseif(isset($match[3]))
            $phpinfo[end(array_keys($phpinfo))][$match[2]] = isset($match[4]) ? array($match[3], $match[4]) : $match[3];
        else
            $phpinfo[end(array_keys($phpinfo))][] = $match[2];
    }

    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Installation Guide</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<BODY text=#000000 vLink=#2971c1 aLink=#2971c1 link=#2971c1 bgColor=#cccccc>
    
<TABLE align="center" width="640px" style="background:#ffffff;margin-top:20px;padding-left:20px;padding-top:20px;margin-bottom:20px;margin-left:auto;margin-right:auto;-webkit-box-shadow:0 6px 9px #999;box-shadow:0 6px 9px #999;border-radius:6px 6px 6px 6px">
<TBODY style="background:#ffffff">
<TR>
    <TD class=text vAlign=top>
        <div style="float:right;margin-top:-20px"><img style="width:40px;height:40px" src="<?=$logo;?>" width="40" height="40" /></div>
        <h1>New Installation of <b><?=$application_name;?></b></h1>        
                Follow the wizard to setup your database.<BR><BR>
        <TABLE width="100%" cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
            <TD>
                <TABLE width="100%" cellSpacing=0 cellPadding=0 border=0>
                <TBODY>
                <TR>
                    <TD></TD>
                    <TD align=middle>
                        <TABLE width="100%" cellSpacing=0 cellPadding=0 border=0>
                        <TBODY>
                        <TR>
                            <TD class=text align=left>
								<b>Getting System Info</b>
                            </TD>
                        </TR>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <TD class=text align=left>
                                <UL>
									<LI>System: <?=$phpinfo['phpinfo']['System'];?></li>                                    
                                    <LI>PHP version: <?=$phpinfo['phpinfo']['PHP Version'];?></li>
                                    <LI>Server API: <?=$phpinfo['phpinfo']['Server API'];?></li>
                                    <LI>Safe Mode: <?=$phpinfo['PHP Core']['safe_mode'][0];?></li>
								</UL>
							</TD>
                        </TR>
                        <tr><td>&nbsp;</td></tr>
						<TR>
                            <TD class=text align=left>
								Click on Start button to continue.
							</TD>
						</TR>
						</TBODY>
                        </TABLE>
						<br />

						
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" class="main_text">
                        <tr>
                            <td colspan=2 align='left'>
                                <input type="button" class="form_button" value="Start" name="submit" title="Click to start installation" onclick="document.location.href='install.php'">
                            </td>
                        </table>

					</TD>
                    <TD></TD>
                </TR>
                </TBODY>
                </TABLE>

            </TD>
        </TR>
        </TBODY>
        </TABLE>

        <? include_once("footer.php"); ?>        
    </TD>
</TR>
</TBODY>
</TABLE>          
</body>
</html>