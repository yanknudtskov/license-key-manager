<?php

    require_once("settings.inc");    
    
    if (file_exists($config_file_path)) {        
		header("location: ".$application_start_file);
        exit;
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
    
<TABLE align="center" width="640px" style="background:#ffffff;padding-left:20px;padding-top:20px;margin-top:20px;margin-bottom:20px;margin-left:auto;margin-right:auto;-webkit-box-shadow:0 6px 9px #999;box-shadow:0 6px 9px #999;border-radius:6px 6px 6px 6px">
<TBODY style="background:#ffffff">
<TR>
    <TD class=text vAlign=top>
        <div style="float:right;margin-top:-20px"><img style="width:40px;height:40px" src="<?=$logo;?>" width="40" height="40" /></div>
        <h1>New Installation of <b><?=$application_name;?></b></h1>
        
        Fill in the form below to configure the software to work with your MySQL database.<BR><BR>
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
								<b>Step 1. Configure Software</b>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                        <br />
                        
                        <form method="post" action="install2.php">
                        <input type="hidden" name="submit" value="step2" />  
                        <table class=text width="100%" border="0" cellspacing="0" cellpadding="2" class="main_text">
                        <tr>
                            <tr>
                                <td>&nbsp;DB Host</td>
                                <td>
                                    <input type="text" class="form_text" name="database_host" value='<?= $database_host ?>' size="30">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;DB Name</td>
                                <td>
                                    <input type="text" class="form_text" name="database_name" size="30" value="<?= $database_name ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;DB Username</td>
                                <td>
                                    <input type="text" class="form_text" name="database_username" size="30" value="<?= $database_username ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;DB Password</td>
                                <td>
                                    <input type="text" class="form_text" name="database_password" size="30" value="<?= $database_password ?>">
                                </td>
                            <tr>
                                <td>&nbsp;Admin Username</td>
                                <td>
                                    <input type="text" class="form_text" name="admin_username" size="30" value="<?= $admin_username ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;Admin Password</td>
                                <td>
                                    <input type="text" class="form_text" name="admin_password" size="30" value="<?= $admin_password ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan=2 align='left'>
				    <input type="button" class="form_button2" name="btn_cancel" value="Cancel" onclick="document.location.href='index.php'">
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="submit" class="form_button" name="btn_submit" value="Continue">
                                </td>
                            </tr>
                        
                        </table>
                        </form>                        
						<br />						

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
