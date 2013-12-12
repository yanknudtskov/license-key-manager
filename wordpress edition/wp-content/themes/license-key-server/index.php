<!DOCTYPE html>
	<!--[if IE 8]>
		<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="en-US">
	<![endif]-->
	<!--[if !(IE 8) ]><!-->
		<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	<!--<![endif]-->
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Weblog title &rsaquo; Log In</title>
	<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=3.8-RC2' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='wp-includes/css/dashicons.min.css?ver=3.8-RC2' type='text/css' media='all' />
<link rel='stylesheet' id='wp-admin-css'  href='wp-admin/css/wp-admin.min.css?ver=3.8-RC2' type='text/css' media='all' />
<link rel='stylesheet' id='buttons-css'  href='wp-includes/css/buttons.min.css?ver=3.8-RC2' type='text/css' media='all' />
<link rel='stylesheet' id='colors-fresh-css'  href='wp-admin/css/colors.min.css?ver=3.8-RC2' type='text/css' media='all' />
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='wp-admin/css/ie.min.css?ver=3.8-RC2' type='text/css' media='all' />
<![endif]-->
<meta name='robots' content='noindex,follow' />
	</head>
	<body class="login login-action-login wp-core-ui">
	<div id="login">
	
<form name="loginform" id="loginform" action="wp-login.php" method="post">
	<p>
	<label for="user_login">Username<br />
	<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
	<label for="user_pass">Password<br />
	<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	<p class="forgetmenot"><label for="rememberme">
        <input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> Remember</label>
        <br /><br />
        <a style="font-size:12px" href="wp-login.php?action=lostpassword" rel="nofollow">Forgot password?</a>
        </p>
	<p class="submit">
	<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
	<input type="hidden" name="redirect_to" value="wp-admin/" />
	<input type="hidden" name="testcookie" value="1" />
	</p>
</form>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>
	
</div><!-- #login : end -->
</body>
</html>
