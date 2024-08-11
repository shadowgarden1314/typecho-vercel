<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<!--安装这个格式定义样式路径-->
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('iconfont/iconfont.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('js/bootstrap.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/style.js'); ?>"></script>
<!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->


<!--导航栏-->


<header>
	<nav>
    	<div class="nav_pc">
    	    <?php if ($this->options->logoUrl): ?>
    	        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src=".itme-img" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
        	    <div class="logo"><a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></div>
        	<?php endif; ?>
        	<ul>
            	<li><i class="icon-home"></i><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <li><i class="icon-list"></i><a href="#">分类</a>
                	<ul>
                    	<?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                    </ul>
                </li>
                <li><i class="icon-tag"></i><a href="#">归档</a>
                    <ul>
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                    </ul>
                </li>
                <li><i class="icon-leaf"></i><a href="#">页面</a></li>
                
                <li><i class="icon-rss"></i><a href="<?php $this->options->feedUrl(); ?>">RSS订阅</a></li>
            </ul>
            <div class="search">
                <i class="icon-search"></i>
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                        <input type="text" id="s" name="s" class="text" placeholder="<?php _e('按回车搜索'); ?>" />
                </form>
                
            </div>
        </div>
        
        <div class="nav_web">
            <span class="web-left-button"><i class="icon-reorder" id="nav-btn"></i></span>
            
            <?php if ($this->options->logoUrl): ?>
    	        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
        	    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	<?php endif; ?>
        </div>
        
        
<div id="menu">
    
    <!--本头像采用获取方式，如果api掉了，可以自行换地址-->
                	<div class="nav-left-userimg"><img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php userQQ() ?>&spec=100" alt="头像">
                		<h3><?php $this->author(); ?></h3>
                    <p><?php userMotto() ?></p>
                	</div>
        
  <div class="f1">
    <ul>
      <li><a href="<?php $this->options->siteUrl(); ?>"><i class="icon-home"></i>首页</a></li> 
      
      <li class="hasChild"><a href="#"><i class="icon-list"></i>分类</a>
        <div class="f2">
          <ul>
                <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}">{name} ({count})</a></li>'); ?>
          </ul>
        </div>
      </li>
      
      <li class="hasChild"><a href="#"><i class="icon-tag"></i>归档</a>
        <div class="f2">
          <ul>
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
          </ul>
        </div>
      </li>
      <li><a href="#"><i class="icon-leaf"></i>页面</a></li>
      <li><a href="<?php $this->options->feedUrl(); ?>"><i class="icon-rss"></i>RSS订阅</a></li>
    </ul>
  </div>
</div>
        
<script type="text/javascript">
    $(function(){
       $("#nav-btn").click(function(){
          $(".f1 li").css("display","block"); 
       }); 
    });
    $(function ($) {
        $('#menu').leftMenu({
            "triggerBtn":"#nav-btn"
        }).init()
    })
</script>
        
    </nav>
</header>
