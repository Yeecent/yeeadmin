<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
    <meta charset="utf-8">
<title><?php echo ($config["title"]); ?>-单片机开发,单片机定制</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
<meta name="description" content="<?php echo ($config["description"]); ?>" />
<meta name="author" content="" />
<link rel="shortcut icon" href="<?php echo ($config["favicon"]); ?>">
<link href="<?php echo ($theme); ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo ($theme); ?>/css/flexslider.css" rel="stylesheet" />
<link href="<?php echo ($theme); ?>/css/style.css" rel="stylesheet" />

<script src="<?php echo ($theme); ?>/js/jquery.js"></script>
<script src="<?php echo ($theme); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo ($theme); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo ($theme); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo ($theme); ?>/js/jquery.fancybox-media.js"></script> 
<script src="<?php echo ($theme); ?>/js/portfolio/jquery.quicksand.js"></script>
<script src="<?php echo ($theme); ?>/js/portfolio/setting.js"></script>
<script src="<?php echo ($theme); ?>/js/jquery.flexslider.js"></script>
<script src="<?php echo ($theme); ?>/js/animate.js"></script>
<script src="<?php echo ($theme); ?>/js/custom.js"></script>
</head>
<body>
    <div id="wrapper">
        <header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="<?php echo ($theme); ?>/images/logo.png" alt="logo"/></a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">官网首页</a></li>
                    <li><a href="<?php echo U('News/index');?>">新闻资讯</a></li>
                    <li><a href="<?php echo U('Goods/index');?>">产品展示</a></li>
                    <li><a href="<?php echo U('Cases/index');?>">成功案例</a></li>
                    <li><a href="<?php echo U('About/index');?>">关于我们</a></li>
                    <li><a href="/">加入宇脉</a></li>
                    <li><a href="<?php echo U('Contact/index');?>">联系我们</a></li>
                    <li><a href="http://www.gdymdz.com/forum/forum.php">宇脉论坛</a></li>
                    <li><a href="/">宇脉商城</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
        <section id="featured">
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li>
                <a href="javascript:;"><img src="<?php echo ($theme); ?>/images/slides/slider4.jpg" alt="" /></a>
            </li>
            <li>
                <a href="javascript:;"><img src="<?php echo ($theme); ?>/images/slides/slider1.jpg" alt="" /></a>
            </li>
            <li>
                <a href="javascript:;"><img src="<?php echo ($theme); ?>/images/slides/slider2.jpg" alt="" /></a>
            </li>
            <li>
                <a href="javascript:;"><img src="<?php echo ($theme); ?>/images/slides/slider3.jpg" alt="" /></a>
            </li>
        </ul>
    </div>
</section>
        <section class="callaction">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="aligncenter">
                            <h1 class="aligncenter">公司简介</h1>
                            <span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>
                            广州宇脉电子科技有限公司始于2003，是一家专业的单片机开发、电子产品定制开发及生产的企业，本公司单片机产品被认定为广东省高薪技术产品，并拥有多项发明专利、实用新型专利、外观专利、软件著作权。是广东省守合同重信用企业，有着16年深厚的技术沉淀。本公司自主品牌为：宇脉、宇脉单片机。自主研发的产品涉及智能自助产品系列控制系统、汽车维修设备系列控制系统、智能家居系列控制系统、数据采集系列控制系统…………
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <h4 class="heading">技能特色</h4>
                <div class="row">
                    <div class="skill-home"> <div class="skill-home-solid clearfix"> 
                            <div class="col-md-3 text-center">
                                <span class="icons c1"><i class="fa fa-trophy"></i></span> <div class="box-area">
                                    <h3>Web Development</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p></div>
                            </div>
                            <div class="col-md-3 text-center"> 
                                <span class="icons c2"><i class="fa fa-picture-o"></i></span> <div class="box-area">
                                    <h3>UI Design</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p></div>
                            </div>
                            <div class="col-md-3 text-center"> 
                                <span class="icons c3"><i class="fa fa-desktop"></i></span> <div class="box-area">
                                    <h3>Interaction</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p></div>
                            </div>
                            <div class="col-md-3 text-center"> 
                                <span class="icons c4"><i class="fa fa-globe"></i></span> <div class="box-area">
                                    <h3>User Experiance</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                                </div></div>
                        </div></div>
                </div> 
                <!-- Portfolio Projects -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="heading">最新产品</h4>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio"> 
                                    <li class="col-lg-3 design" data-id="id-0" data-type="web">
                                        <div class="item-thumbs">					 
                                            <img src="<?php echo ($theme); ?>/images/works/1.jpg" alt=""><br>
                                            <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
                                        </div>
                                    </li> 
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
                                        <img src="<?php echo ($theme); ?>/images/works/2.jpg" alt=""><br>
                                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
                                    </li> 
                                    <li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
                                        <img src="<?php echo ($theme); ?>/images/works/3.jpg" alt=""><br>
                                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
                                    </li>

                                    <li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">					
                                        <img src="<?php echo ($theme); ?>/images/works/4.jpg" alt=""><br>
                                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
                                    </li>
                                    <!-- End Item Project -->
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="testimonial-area">
            <div class="testimonial-solid">
                <div class="container">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="">
                                <a href="#"></a>
                            </li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                                <a href="#"></a>
                            </li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class="active">
                                <a href="#"></a>
                            </li>
                            <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                                <a href="#"></a>
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                                <p>
                                    <b>- Mark John -</b>
                                </p>
                            </div>
                            <div class="item">
                                <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                                <p>
                                    <b>- Jaison Warner -</b>
                                </p>
                            </div>
                            <div class="item active">
                                <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                                <p>
                                    <b>- Tony Antonio -</b>
                                </p>
                            </div>
                            <div class="item">
                                <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                                <p>
                                    <b>- Leena Doe -</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">联系方式</h5>
                    <address>
                        <strong>Pixelcompany Inc</strong><br>
                        JC Main Road, Near Silnile tower<br>
                        Pin-21542 NewYork US.</address>
                    <p>
                        <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
                        <i class="icon-envelope-alt"></i> email@domainname.com
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a href="#">Latest Events</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Recent News</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <p>
                            Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://ym.xpygz.com">广州宇脉电子科技有限公司</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<?php echo (htmlspecialchars_decode($config["foot"])); ?>
</body>
</html>