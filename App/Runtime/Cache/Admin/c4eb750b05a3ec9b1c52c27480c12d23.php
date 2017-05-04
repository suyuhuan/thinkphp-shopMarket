<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>吉首大学二手交易后台管理</title>
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
  <body>  
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
           <img src="/2sjy/Public/admin/images/logo.gif">
          <h1>交易信息管理</h1>
          <p style="color:#fff;float:right;">---吉首大学二手交易管理后台</p>
        </header>
        <div class="profile-photo-container">
          <div class="profile-photo-overlay"></div>
        </div>      
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
         
    <ul>
      <li><a href="/2sjy/admin.php/Academy/Index.html"><i class="fa fa-home fa-fw"></i>院校管理</a></li>
      <li><a href="/2sjy/admin.php/Users/Index.html"><i class="fa fa-bar-chart fa-fw"></i>用户管理</a></li>
      <li><a href="/2sjy/admin.php/Goods/Index.html" class="active"><i class="fa fa-database fa-fw"></i>商品管理</a></li>
      <li><a href="/2sjy/admin.php/Ce/Index.html"><i class="fa fa-map-marker fa-fw"></i>认证管理</a></li>
      <li><a href="/2sjy/admin.php/Login/loginout.html" class="active"><i class="fa fa-users fa-fw"></i>退出登录</a></li>
    </ul> 
    
        </nav>
      </div>
      <!-- 内容 -->
      
   <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-10 col-md-10">
              <ul class="text-uppercase">
                <li><a href="/2sjy/admin.php/Goods/index.html" >最新</a></li>
                <li><a href="/2sjy/admin.php/Goods/add.html" class="active">添加商品</a></li>
                <li><a href="/2sjy/admin.php/Goods/addCat.html" >查看分类</a></li>
                 <li><a href="/2sjy/admin.php/Goods/classAdd.html">添加分类</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="panel-body">
          <div class="col-md-2"></div>
          <div class="col-md-6">
                  <form action="" method="post" enctype="multipart/form-data" class="templatemo-login-form">
                     <div class="form-group">
                      <label for="name">商品图片</label>
                      <input type="file" name="good_imgs" id="name">
                    </div> 
                    <div class="form-group">
                      <label for="name">商品名</label>
                      <input type="text" class="form-control" name="title" id="name" placeholder="输入商品名">
                    </div>
                     <div class="form-group">
                      <label for="name">商品价格</label>
                      <input type="text" class="form-control" name="price" id="name" placeholder="价格">
                    </div>
                    <div class="form-group">
                      <label for="name">商品分类</label>
                      <select class="form-control" name="type_id">
                        <?php if(is_array($type)): foreach($type as $key=>$vol): ?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; ?>                  
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">商品详情</label>
                      <input type="text" class="form-control" name="detail" id="name" placeholder="商品详情">
                    </div>  
                     <div class="form-group">
                      <label for="name">交货地点</label>
                      <input type="text" class="form-control" name="place" id="name" placeholder="交货地点">
                    </div>   
                        
                    <div class="form-group">
                      <button type="submit" name="sub" value="true" class="templatemo-blue-button">添加</button>
                    </div>
                  </form>
          </div> 
        </div>   
      </div>

    </div>
  </body>
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  
</html>