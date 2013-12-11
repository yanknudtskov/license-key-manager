<?php

    require_once("settings.inc");    
    
    if (file_exists($config_file_path)) {        
		header("location: ".$application_start_file);
        exit;
	}
    
	$completed = false;
	$error_mg  = array();	
	
	if ($_POST['submit'] == "step2") {

		$database_host		= isset($_POST['database_host'])?$_POST['database_host']:"";
		$database_name		= isset($_POST['database_name'])?$_POST['database_name']:"";
		$database_username	= isset($_POST['database_username'])?$_POST['database_username']:"";
		$database_password	= isset($_POST['database_password'])?$_POST['database_password']:"";
		$admin_username 	= isset($_POST['admin_username'])?$_POST['admin_username']:"";
		$admin_password 	= isset($_POST['admin_password'])?$_POST['admin_password']:"";

		if (empty($database_host)){
			$error_mg[] = "Database host can not be empty! Please re-enter.";	
		}
		
		if (empty($database_name)){
			$error_mg[] = "Database name can not be empty! Please re-enter.";	
		}
		
		if (empty($database_username)){
			$error_mg[] = "Database username can not be empty! Please re-enter.";	
		}
		
		if (empty($database_password)){
			$error_mg[] = "Database password can not be empty! Please re-enter.";	
		}

		if (empty($admin_username)){
			$error_mg[] = "Admin username can not be empty! Please re-enter.";	
		}

		if (empty($admin_password)){
			$error_mg[] = "Admin password can not be empty! Please re-enter.";	
		}
		
		if(empty($error_mg)){
		
			$config_file = file_get_contents($config_file_default);
			$config_file = str_replace("_DB_HOST_", $database_host, $config_file);
			$config_file = str_replace("_DB_NAME_", $database_name, $config_file);
			$config_file = str_replace("_DB_USER_", $database_username, $config_file);
			$config_file = str_replace("_DB_PASSWORD_", $database_password, $config_file);
			$config_file = str_replace("_ADMIN_USER_", $admin_username, $config_file);
			$config_file = str_replace("_ADMIN_PASSWORD_", $admin_password, $config_file);
			
			$f = @fopen($config_file_path, "w+");
			if (@fwrite($f, $config_file) > 0){
                $link = @mysql_connect($database_host, $database_username, $database_password);
				if($link){

                        if (@mysql_select_db($database_name)) {
                        if(false == ($db_error = apphp_db_install($database_name, $sql_dump))){
                            $error_mg[] = "Could not read file ".$sql_dump."! Please check if the file exists.";                            
                            @unlink($config_file_path);
                        }else{

                            // additional operations, like setting up admin passwords etc.
							// ...
                            $completed = true;                            
                        }
					} else {
						$error_mg[] = "Database connecting error! Check your database exists.</span><br/>";
                        @unlink($config_file_path);
					}
				} else {
					$error_mg[] = "Database connecting error! Check your connection parameters.</span><br/>";
                    @unlink($config_file_path);
				}
			} else {				
				$error_mg[] = "Can not open configuration file ".$config_file_directory.$config_file_name;				
			}
			@fclose($f);			
		}
	}
        
$con = mysql_connect($database_host, $database_username, $database_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create table
mysql_select_db($database_host);
$sql = "$sql_import";

// Execute query
mysql_query($sql,$con);

mysql_close($con);
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
						<? if(!$completed){
							
							foreach($error_mg as $msg){
								echo "<tr><td class=text align=left><span style='color:#bb5500;'>&#8226; ".$msg."</span></td></tr>";
							}
						?>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class=text align=left>	
									<input type="button" class="form_button2" value="Back" name="submit" onclick="javascript: history.go(-1);">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="button" class="form_button" value="Retry" name="submit" onclick="javascript: location.reload();">
								</td>
							</tr>
							
						<? } else {?>
							<tr><td>&nbsp;</td></tr>
							<TR>
								<TD class=text align=left>
									<b>Step 2. Installation Completed</b>
								</td>
							</tr>
							<tr><td>&nbsp;</td></tr>	
							<tr>
								<TD class=text align=left>
									The <?=$config_file_path;?> file was sucessfully created.
									<br />
									<span style='color:#bb5500;'>
										<b>!!! For security reasons, please remove install/ folder from your server.</b>
									</span>
									<br /><br />
									<? if($application_start_file != ""){ ?><A href="<?=$application_start_file;?>">Proceed to login page</A><? } ?>
								</td>
							</tr>
						
						<? } ?>
                        </tbody>
                        </table>
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

<? 

  function apphp_db_install($database, $sql_file) {
    $db_error = false;

    if (!@apphp_db_select_db($database)) {
      if (@apphp_db_query('create database ' . $database)) {
        apphp_db_select_db($database);
      } else {
        $db_error = mysql_error();
        return false;           
      }
    }

    if (!$db_error) {
      if (file_exists($sql_file)) {
        $fd = fopen($sql_file, 'rb');
        $restore_query = fread($fd, filesize($sql_file));
         fclose($fd);
      } else {
          $db_error = 'SQL file does not exist: ' . $sql_file;
          return false;
      }
                
      $sql_array = array();
      $sql_length = strlen($restore_query);
      $pos = strpos($restore_query, ';');
      for ($i=$pos; $i<$sql_length; $i++) {
        if ($restore_query[0] == '#') {
          $restore_query = ltrim(substr($restore_query, strpos($restore_query, "\n")));
          $sql_length = strlen($restore_query);
          $i = strpos($restore_query, ';')-1;
          continue;
        }
        if ($restore_query[($i+1)] == "\n") {
          for ($j=($i+2); $j<$sql_length; $j++) {
            if (trim($restore_query[$j]) != '') {
              $next = substr($restore_query, $j, 6);
              if ($next[0] == '#') {
                // find out where the break position is so we can remove this line (#comment line)
                for ($k=$j; $k<$sql_length; $k++) {
                  if ($restore_query[$k] == "\n") break;
                }
                $query = substr($restore_query, 0, $i+1);
                $restore_query = substr($restore_query, $k);
                // join the query before the comment appeared, with the rest of the dump
                $restore_query = $query . $restore_query;
                $sql_length = strlen($restore_query);
                $i = strpos($restore_query, ';')-1;
                continue 2;
              }
              break;
            }
          }
          if ($next == '') { // get the last insert query
            $next = 'insert';
          }
          if ( (eregi('create', $next)) || (eregi('insert', $next)) || (eregi('drop t', $next)) ) {
            $next = '';
            $sql_array[] = substr($restore_query, 0, $i);
            $restore_query = ltrim(substr($restore_query, $i+1));
            $sql_length = strlen($restore_query);
            $i = strpos($restore_query, ';')-1;
          }
        }
      }

      for ($i=0; $i<sizeof($sql_array); $i++) {
                apphp_db_query($sql_array[$i]);
      }
      return true;
    } else {
      return false;
    }
  }

  function apphp_db_select_db($database) {
    return mysql_select_db($database);
  }

  function apphp_db_query($query) {
    global $link;
    $res=mysql_query($query, $link);
    return $res;
  }

?>