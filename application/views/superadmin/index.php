<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FlightBooking :: Adminpanel</title>
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL?>public/css/super_admin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL?>public/css/fontface.css" />
<script type="text/javascript" src="<?php echo BASEURL?>public/js/jquery.min.js"></script>
</head>
<body>
<div class="main">
  <div class="login_wrapp">
    <script language="javascript" type="text/javascript">

	jQuery(document).ready(function(){

		jQuery('#SuperAdminLoginForm').submit(function(){

		  if(jQuery.trim(jQuery('#SuperAdminUsername').val()).length==0){

				alert('Please enter your username');

				jQuery('#SuperAdminUsername').val('');

				jQuery('#SuperAdminUsername').focus();

				return false;

			}else if(jQuery.trim(jQuery('#SuperAdminPassword').val()).length==0){

				alert('Please enter your password');

				jQuery('#SuperAdminPassword').val('');

				jQuery('#SuperAdminPassword').focus();

			}else{

				return true;

			}

		});

	});

</script>
    <div class="login"> <span style="float:left;padding:10px 0 0 20px;font-size:16px;color:#2EAE01;padding-left: 300px;padding-top: 9px;padding-bottom: 25px;"><img src="/subhamoy/flightbooking/public/images/redtag-logo-worldcup.jpg" class="logo" alt="" /> </span>
      <div class="login1" style="margin-top:50px;">
        <div style="float:left; margin-right:8px;">
          <h2 style="color:#2EAE01;">Login Area</h2>
        </div>
        <div style="float:left;"></div>
        <form action="/subhamoy/flightbooking/superadmin/login" id="SuperAdminLoginForm" method="post" accept-charset="utf-8">
          <div style="display:none;">
            <input type="hidden" name="_method" value="POST"/>
          </div>
          <div style="width:294px;float:left;position:relative;">
            <input name="data[SuperAdmin][username]" placeholder="Enter your username" maxlength="255" type="text" id="SuperAdminUsername"/>
            <input name="data[SuperAdmin][password]" placeholder="Enter password" type="password" id="SuperAdminPassword"/>
          </div>
          <div style="width:100%;">
            <div class="submit" style="float:left;">
              <input  type="submit" value="Login"/>
            </div>
			<div style="float:right;"><a href="/subhamoy/bookinginbit/superadmin/forgot_password"><span style="color:#2EAE01;">Forgot Password</span></a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="clear30"></div>
</div>
<div style="width: 100%;text-align: center;">Copyright 2013 @ easykunde.de. All right reserve.</div>
</body>
</html>
