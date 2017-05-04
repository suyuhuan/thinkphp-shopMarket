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

<title>逛吉市二手街</title>
<link rel="stylesheet" type="text/css" href="/2sjy/Public/home/css/bootstrap.min.css">
<link href="/2sjy/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/2sjy/Public/home/css/isotope.css" rel="stylesheet" type="text/css" />
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
                            <a class="navbar-brand" href="/2sjy/index.php/Index/index">吉首大学二手交易</a>
                          </div>
                      </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8">
                        <ul class="nav navbar-nav"> 
                          <li class="active"><a href="/2sjy/index.php/Index/index">首页<span class="sr-only">(current)</span></a></li>
                          <li><a href="/2sjy/index.php/Index/index">最新</a></li>
                        </ul> 
                    </div>

                    <div class="col-md-2">
                      <?php if(empty($_SESSION['userid'])): ?><ul class="nav navbar-nav navbar-right">
                          <li><a href="/2sjy/index.php/Index/login.html">登录</a></li>
                          <li><a href="/2sjy/index.php/Index/sign.html">注册</a></li>   
                        </ul>
                      <?php else: ?>
                        <ul class="">
                          <li><a href="/2sjy/index.php/Index/login.html"><?php echo (session('username')); ?></a></li>
                          <li><a href="/2sjy/index.php/Index/loginout.html">退出</a></li>   
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
      <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="200">
             <li class="active" ><a href="/2sjy/index.php/Goods/fabu">发布</a></li>
             <li ><a href="">详情</a></li>
          </ul>
    </div>
    <div class="col-md-8">
      <div id="page-single">        
      <article>
          <h2 class="title_page add_padding">商品发布</h2>
          <div class="article_content seperator add_padding clearfix">
            <div class="container">
               <div class="column one_thirds">
                </div>
               <div class="column one_thirds">
                    <h4><?php echo ($goodsinfo["title"]); ?></h4>
                    <div id="skillgroup">
                           &nbsp;&nbsp;<span></span>
                           <form method="post" action="/2sjy/index.php/Goods/fabu" enctype="multipart/form-data">
                              <div class="skill">
                                  <span class="skill_bar .skill_active">商品图片</span>
                                  <span><input type="file" name="good_imgs"/></span>
                              </div>
                               <div class="skill">
                                  <span class="skill_bar .skill_active">商品名称</span>
                                  <span><input type="text" name="title" placehoder="商品名称"></span>
                              </div>
                              <div class="skill">
                                  <span class="skill_bar .skill_active">商品价格</span>
                                  <span><input type="text"  name="price"></span>
                              </div>
                              <div class="skill">
                                  <span class="skill_bar .skill_active">商品详情</span>
                                  <span><input type="text"  name="detail"></span>
                              </div>
                              <div class="skill">
                                  <span class="skill_bar .skill_active">商品分类</span>
                                  <select name="type_id" id="">
                                    <?php if(is_array($type)): foreach($type as $key=>$vol): ?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; ?>
                                  </select>
                              </div>
                              <div class="skill">
                                  <span class="skill_bar .skill_active">交易地点</span>
                                  <span><input type="text" name="place"></span>
                              </div>
                               <div class="skill">
                                  <span><button type="submit" name="sub" value="true">发布</button></span>
                              </div>
                            </form>
                    </div>
               </div>
               <div class="clear"></div>  
             </div>    
          </div>  
      </article> 
     </div>
     <div id="page-single" style="margin-top:20px;">        
     
     </div>
     <div id="page-single" style="margin-top:15px;">
         
     </div>
    </div> 
    <div class="col-md-2">
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
<script src="/2sjy/Public/home/js/jquery-1.9.1.min.js"></script>
<script src="/2sjy/Public/home/js/bootstrap.min.js"></script>
<script src="/2sjy/Public/home/js/jquery.isotope.min.js"></script>
<script src="/2sjy/Public/home/js/script.js"></script>
</body>
</html>