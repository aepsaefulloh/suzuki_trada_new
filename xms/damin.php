<?php

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';
require_once CMS_PATH.'/lib/navutil.php';
require_once CMS_PATH.'/lib/table.php';
require_once CMS_PATH.'/lib/utils.php';
require_once CMS_PATH.'/lib/auth.php';

if($_SESSION['ISLOGIN']){
	header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>cybex</title>
<link rel="stylesheet" href="css/style.default.css?v=<?php echo rand()?>" type="text/css" />
<link rel="stylesheet" href="css/style.palegreen.css?v=<?php echo rand()?>" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>

<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo.png?v=<?php echo rand()?>" alt="" /></div>
        <form id="login" action="damin.php" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid email or password</div>
            </div>
			
			<input type='hidden' name='act' value='login'>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Enter any username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Enter any password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>
            
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2020. sketsahouse. All Rights Reserved.</p>
</div>

</body>
</html>
