<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>Visual Admin - Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        
	    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="/2sjy/Public/home/css/font-awesome.min.css" rel="stylesheet">
	    <link href="/2sjy/Public/home/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/2sjy/Public/home/css/templatemo-style.css" rel="stylesheet">
	    
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
	          <h1>输入用户信息</h1>
	        </header>
	        <form action="/2sjy/index.php/Index/regest.html" method="post" class="templatemo-login-form">
	        	<?php if(is_array($info)): foreach($info as $key=>$val): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($val); ?>"><?php endforeach; endif; ?>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i>邮箱：</div>	        		
		              	<input type="text" name="email" class="form-control" placeholder="请输入邮箱">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i>电话号码：</div>	        		
		              	<input type="text" name="phone" class="form-control" placeholder="请输入电话号码">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i>qq号码：</div>	        		
		              	<input type="text" name="qq" class="form-control" placeholder="请输入qq号码">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<label for="name">院校</label>
                      <select class="form-control" name="school_id">
                      <?php if(is_array($school)): foreach($school as $key=>$sc_vol): ?><option value="<?php echo ($sc_vol["id"]); ?>"><?php echo ($sc_vol["name"]); ?></option><?php endforeach; endif; ?>
                      </select>
                    </div>	          	
	          	<div class="form-group">
				   <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
				    </div>				    
				</div>
				<div class="form-group">
					<button type="submit" name="sub" value="true" class="templatemo-blue-button width-100">注册</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>已注册用户吗? <strong><a href="/2sjy/index.php/Index/login.html" class="blue-text">现在登陆!</a></strong></p>
			<p><a href="/2sjy/index.php/" class="blue-text">返回首页!</a></p>
		</div>
	</body>
</html>