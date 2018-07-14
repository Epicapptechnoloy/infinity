<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SmartBuy</title>
<style>
	@media screen and (max-width:768px) {
	table{width:98% !important; margin:0px auto;}
	table.nav-link{width:100% !important; text-align:center; margin:0px auto;}
	table.nav-link td {display: inline-block;}
	}
a:link, a:visited {
    background-color: #3097d1;
   
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: red;
    padding: 14px 25px;
}
</style>
</head>
<body>
<body style="background:#ebebeb; border: none !important; font-size:15px; line-height:20px; color:#484848; font-family: arial;padding:0;">
<table width="625" cellpadding="0" align="center" cellspacing="0" border="0" style="background:#fff; padding:42px 32px">
	<tr>
    	<td style="padding:0px 0 0px; margin:0px">
        	<a href="#" target="_blank">
        		<img src="{{ url('/public/assets/image/logo.png') }}" alt="SmartBuy Logo" title="SmartBuy" 
                style="margin:0px; padding:0px; display:block" />
            </a>
        </td>
    </tr>
    <tr>
    	<td style="padding:20px 0 30px; margin:0px"><img src="{{ url('/public/assets/image/border-bg.jpg') }}" alt="" title="" style="margin:0px; padding:0px; display:block" /></td>
    </tr>
    
    <tr>
    	<td style="padding:0px 0 0px; margin:0px">Dear <strong>{{ucfirst($user->fname)}},</strong></td>
    </tr>
    <tr>
    	<td style="padding:28px 0 25px; margin:0px;">Please click the below link to reset password.</td>
    </tr>
     <tr>
    	<td style="padding:28px 0 25px; margin:0px;"><a href="{{$reset_link}}" class="btn btn-primary">Reset Password</a></td>
    </tr>
    
    <tr>
    	<td style="padding:60px 0 0; margin:0px;">
        	<img src="images/border-bg.jpg" alt="" title="" style="margin:0px; padding:0px; display:block" />
        </td>
    </tr>
    <tr>
    	<td align="center" style="font-size:12px; color:#000; margin:0px; padding:0px">Copyrights &copy; {{date('Y')}}, SmartBuy. All rights reserved.</td>
    </tr>
    <tr>
    	<td width="100%" style="padding:15px 0 0">
        	<table cellpadding="0" align="center" cellspacing="0" border="0" class="nav-link">
            	<tr>
                    <td>
                    	<a href="#" target="_blank" style="border:none; outline:none; text-decoration:none">
                        	<img src="{{ url('/public/assets/image/fb.png') }}" alt="Google Plus" title="Google Plus" style="border:none; 
                            outline:none; display:inline-block"/>
                        </a>
                    </td>
                    <td style="padding:0px 0 0 9px">
                    	<a href="#" target="_blank" style="border:none; outline:none; text-decoration:none">
                        	<img src="{{ url('/public/assets/image/twitter.png') }}" alt="Twitter" title="Twitter" style="border:none; 
                            outline:none; display:inline-block"/>
                        </a>
                    </td>
                    <td style="padding:0px 0 0 9px">
                    	<a href="#" target="_blank" style="border:none; outline:none; text-decoration:none">
                        	<img src="{{ url('/public/assets/image/google-plus.png') }}" alt="Google Plus" title="Google Plus" style="border:none; 
                            outline:none; display:inline-block"/>
                        </a>
                    </td>
                </tr>
        	</table>
        </td>
    </tr>
</table>
</body>
</html>
