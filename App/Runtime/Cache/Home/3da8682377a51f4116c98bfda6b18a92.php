<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--> 
<html class="no-js" lang="de">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<title>吉首大学二手街</title>
<link rel="stylesheet" type="text/css" href="/shopMarket/Public/home/css/bootstrap.min.css">
<link href="/shopMarket/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/shopMarket/Public/home/css/isotope.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="top">
    <div class="top_inner wrapper clearfix">
            
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="row">
              <div class="container-fluid">
                   <div class="col-md-2">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">首页</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="/shopMarket/index.php/Index/index">吉首大学二手交易</a>
                        </div>
                    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <div class="col-md-8">
                      <ul class="nav navbar-nav">
                        <li class="<?php echo isset($flash) ?'':'active';?>"><a href="/shopMarket/index.php/Index/index">首页<span class="sr-only">(current)</span></a></li>
                        <li class="<?php echo ($flash == 1 ? 'active':''); ?>"><a href="/shopMarket/index.php/Index/index/flash/1">最新</a></li>
                      </ul>
                        <form action="/shopMarket/index.php/Index/Index" class="navbar-form navbar-right" method="get" role="search">
                          <div class="form-group">
                              <input type="text" style="border:1px solid #ccc;" name="name" value="<?php echo ($name); ?>" placeholder="搜一搜">
                  </div>
                          <button type="submit" class="btn btn-default">搜索</button>
                        </form>  
                    </div>
                  <div class="col-md-2">
                    <?php if(empty($_SESSION['userid'])): ?><ul class="nav navbar-nav navbar-right">
                        <li><a href="/shopMarket/index.php/Index/login.html">登录</a></li>
                        <li><a href="/shopMarket/index.php/Index/sign.html">注册</a></li>   
                      </ul>
                    <?php else: ?>
                      <ul class="">
                        <li><a href="/shopMarket/index.php/User/ziliao.html"><?php echo (session('username')); ?></a></li>
                        <li><a href="/shopMarket/index.php/Index/loginout.html">退出</a></li>   
                      </ul><?php endif; ?>
                 </div>
                </div>
               </div>
            </div>
          </div>
        </nav>
    </header>
        
    </div>
</section>

<div class="row">
    <div class="col-md-2">
      <ul class="nav nav-tabs nav-stacked type" data-spy="affix" data-offset-top="200">
                 <li class="<?php echo isset($type_id)?'':'active';?>"><a href="/shopMarket/index.php/Index/index">菜单</a></li>
                 <?php if(is_array($type)): foreach($type as $key=>$t_vol): ?><li class="<?php echo ($type_id == $t_vol['id']?'active':''); ?>"><a href="/shopMarket/index.php/Index/Index/type_id/<?php echo ($t_vol["id"]); ?>"><?php echo ($t_vol["name"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
          <div class="panel-heading">推荐阅读</div>
          <div class="panel-body">
             <a href="">求购信息</a>
             <a href="">最佳动态</a>
          </div>
      </div>
      <header id="header">
        <div class="header_tagline"> 
            <a href="about.html" class="left_float btn btn-default loadcontent" rel="about">最新发布</a>
            <a href="/shopMarket/index.php/User/fabu.html" class="right_float btn btn-default loadcontent" rel="about">求购专区</a>
        </div>
      </header>
      <section id="main">
      <div class="main_inner  clearfix">
          <div id="masonry" class="entries clearfix">   
               <?php if(is_array($goods)): foreach($goods as $key=>$g_vol): ?><div class="masonry_item entry post">
                    <div class="img_holder">
                            <a href="/shopMarket/index.php/Goods/goodsInfo/id/<?php echo ($g_vol["id"]); ?>" rel="Diam nonumy eirmod" class="loadcontent"><img src="/shopMarket/Public<?php echo ($g_vol["good_imgs"]); ?>" alt="Blog Post 01" style="width:280px;height:135px;"/></a>
                        </div>
                        
                    <div class="entry-headline">
                        <div class="entry-title"><h5><a href="blog-post01.html" rel="Diam nonumy eirmod" class="loadcontent"><?php echo ($g_vol["title"]); ?></a></h5></div>
                        <div class="entry-date">￥<?php echo ($g_vol["price"]); ?></div>
                    </div>
                        
                    <div class="entry-info">
                        <p>
                           <?php echo ($g_vol["detail"]); ?>
                        </p>
                        
                        <div class="entry-meta clearfix">
                            <div class="meta_views right_float">58</div>
                            <div class="meta_likes right_float"><a href="blog-post01.html" rel="Diam nonumy eirmod" class="loadcontent">12</a></div>
                            <div class="meta_comments right_float"><a href="blog-post01.html" rel="Diam nonumy eirmod" class="loadcontent">2</a></div>
                        </div>
                    
                    </div>
                </div><?php endforeach; endif; ?>   
          </div>
            <div style="text-align:center"><?php echo ($page); ?><div>
      </div>      
      </section>
    </div> 
    <div class="col-md-2">
       <a href="/shopMarket/index.php/Goods/fabu.html" class="btn btn-default btn-lg">我要发布</a>
    </div> 
</div>
    
<footer id="footer">
	<div class="footer_inner wrapper clearfix">
        <div class="left_float">作者：苏玉环</div>     
        <div class="right_float">逛吉市二手交易市场</div>  </div>           
</footer>

<section id="bottom">
	<div id="slideup">
    	<a href="" class="">bottom</a>
    </div>
</section>



<!-- jquery -->
<script src="/shopMarket/Public/home/js/jquery-1.9.1.min.js"></script>
<script src="/shopMarket/Public/home/js/bootstrap.min.js"></script>
<script src="/shopMarket/Public/home/js/jquery.isotope.min.js"></script>
<script src="/shopMarket/Public/home/js/script.js"></script>
</body>
</html>