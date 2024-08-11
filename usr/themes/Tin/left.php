
<section class="container">
	<div class="main row">
    	<div class="col-md-3 main-left">
        
        	<div class="tin-item">
            	<div class="itme-img">
            	    <!--本头像采用获取方式，如果api掉了，可以自行换地址-->
                	<div class="tin-user"><img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php userQQ() ?>&spec=100" alt="头像"></div>
                </div>
                <div class="user-name">
                	<h3><?php $this->author(); ?></h3>
                    <p><?php userMotto() ?></p>
                    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <div class="about-pn">
                        <table>
                          <tr>
                            <td><?php $stat->publishedPostsNum() ?></td>
                            <td><?php $stat->categoriesNum() ?></td>
                            <td><?php $stat->publishedCommentsNum() ?></td>
                          </tr>
                          <tr>
                            <td>文章</td>
                            <td>分类</td>
                            <td>评论</td>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="tin-item user-info">
            	<p><i class="iconfont icon-qq"></i><?php userQQ() ?></p>
                <p><i class="iconfont icon-weixin"></i><?php userWX() ?></p>
                <p><i class="iconfont icon-youxiang"></i><?php userEmail() ?></p>
                <p><i class="iconfont icon-add-group-chat2"></i><?php userQun() ?></p>
                <p><i class="iconfont icon-qietu10"></i><?php userWb() ?></p>
                <p><i class="iconfont icon-git"></i><?php userGit() ?></p>
            </div>
            
            <div class="tin-item">
            	<div class="user_lovers">
                    <img src="<?php $loveboy = $this->fields->loveboy;
	 if(!empty($loveboy)){
      echo $this->fields->loveboy;
	 }else{
	  $this->options->themeUrl('images/2.jpg');
	 } ?>" class="login_img">
	 
	 <div class="loveri"><i class="icon-heart lover_i" style="margin: 0"></i></div>
	 
	 <img src="<?php $lovegirl = $this->fields->lovegirl;
	 if(!empty($lovegirl)){
      echo $this->fields->lovegirl;
	 }else{
	  $this->options->themeUrl('images/1.jpg');
	 } ?>" class="login_img">
                    <p>
<?php
header("Content-type: text/html; charset=utf-8");

$d1 = strtotime("January 16 2019 00:00:00");//过去的某天，January是月 16是日 2019年份
$d2 = ceil((time()-$d1)/60/60/24);//现在的时间减去过去的时间，ceil()进一函数
echo "相恋距今天已有" . $d2 ." 天。";
?></p>
                </div>
            </div>
            
            <div class="tin-item">
            	<div class="tin-tigs">
                    <p><i class="icon-tags"></i>标签云</p>
                </div>
                <div class="tigsa">
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
                  <?php while($tags->next()): ?>
    <a style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a>
<?php endwhile; ?>
                </div>
            </div>
            
            <div class="tin-item">
                <div class="tin-lemon">
                	<p><i class="icon-lemon"></i>友情链接</p>
                </div>
                <div class="tin-fd">
                  <?php Friendship() ?>
                </div>
            </div>
            
        </div>

            