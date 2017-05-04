<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>大学生二手交易系统后台登录</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
	    <link href="/2sjy/Public/admin/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/2sjy/Public/admin/css/templatemo-style.css" rel="stylesheet">
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <img src="/2sjy/Public/admin/images/logo.gif">
	          <h1>吉大二手交易系统后台登录</h1>
	        </header>
	        <form action="/2sjy/admin.php/Login/login" method="post" class="templatemo-login-form">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i>管理员：</div>	        		
		              	<input type="text" name="nickname" class="form-control" placeholder="管理员账号">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i>密码：</div>	        		
		              	<input type="password" name="passwd" class="form-control" placeholder="管理员密码">           
		          	</div>	
	        	</div>	          	
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>记住我</label>
				    </div>				    
				</div>
				<div class="form-group">
					<button type="submit" name="sub" value="true" class="templatemo-blue-button width-100">登录</button>
				</div>
	        </form>
		</div>
		<!-- <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>忘记密码? <strong><a href="#" class="blue-text">点击我找回!</a></strong></p>
		</div> -->
	</body>
</html>