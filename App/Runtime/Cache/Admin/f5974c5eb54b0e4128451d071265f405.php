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
      <li><a href="/2sjy/admin.php/Login/loginout.html"><i class="fa fa-users fa-fw"></i>退出登录</a></li>
      </ul> 
    
        </nav>
      </div>
      <!-- 内容 -->
      
   <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-10 col-md-10">
              <ul class="text-uppercase">
                <li><a href="/2sjy/admin.php/Goods/index.html" class="active">最新</a></li>
                <li><a href="/2sjy/admin.php/Goods/add.html" >添加商品</a></li>
                <li><a href="/2sjy/admin.php/Goods/addCat.html" >查看分类</a></li>
                <li><a href="/2sjy/admin.php/Goods/classAdd.html">添加分类</a></li>
              </ul>  
            </nav>
          </div>
        </div>
        <div class="panel-body">
              <div class="nav-search" id="nav-search" style="margin-bottom:10px">
              <form class="form-search">
                <span class="input-icon" style="margin-left:630px;">
                  <input type="text" placeholder="搜索" name="name" class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <input type="submit" class="btn btn-primary btn-xs" value="搜索" style="border-radius:3px; height:26px; margin-top:-4px; padding-right:24px;">
                </span>
              </form>
            </div> 
                  <div class="col-md-1"></div>
                  <div class="col-md-9">
                  <table class="table table-striped table-bordered templatemo-user-table">
                  <thead>
                    <tr>
                      <td>ID </td>
                      <td>商品类</td>
                      <td>商品名</td>
                      <td>发布者</td>
                      <td>发布时间</td>
                      <td>交货地点</td>
                      <td>商品详情</td>
                      <td>编辑</td>
                    </tr>
                  </thead>
                  <tbody>
					<?php if(is_array($goods)): foreach($goods as $key=>$vol): ?><tr>
                      <td><?php echo ($vol["id"]); ?></td>
                      <td><?php echo ($vol["name"]); ?></td>
                      <td><?php echo ($vol["title"]); ?></td>
                      <td><?php echo ($vol["nickname"]); ?></td>
                      <td><?php echo date('Y-m-d',$vol['time']);?></td>
                      <td><?php echo ($vol["place"]); ?></td>
                      <td><?php echo ($vol["detail"]); ?></td>
                      <td>
                        <a href="/2sjy/admin.php/Goods/editGoods.html?id=<?php echo ($vol["id"]); ?>">编辑</a>|
                        <a href="/2sjy/admin.php/Goods/del?id=<?php echo ($vol["id"]); ?>">删除</a>
                      </td>
                    </tr><?php endforeach; endif; ?>
           </tbody>
               <tr>
                   <td  align="center" colspan="8"><?php echo ($page); ?></td>
                 </tr> 
              </table> 
              </div> 
        </div>   
      </div>

    </div>
  </body>
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  
</html>