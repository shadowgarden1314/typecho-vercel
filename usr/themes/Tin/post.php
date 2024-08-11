<?php include('header.php'); ?>
<?php include('left.php'); ?>



<!--上面的左侧栏结束啦-->
        <div class="col-md-9 main-right">
        	<div class="tin-item-tite">
            	<div class="SoulSoother">
                    <span>当前位置：<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
	<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
		Latest Post
	<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		<?php $this->category(); ?> &raquo; <?php $this->title() ?>
	<?php else: ?><!-- 页面为其他页时 -->
		<?php $this->archiveTitle(' &raquo; ','',''); ?>
	<?php endif; ?></span>
                </div>
            </div>
            
            <div class="tin-item-tite-b">
            	<div class="tin-list-img"></div>
                <div class="tin-list-tite">
                	<h3><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
                </div>
                <div class="tin-list-time">
                	<p><i class="icon-calendar"></i><span><?php $this->date(); ?></span></p>
                    <p><i class="icon-eye-open"></i><span><?php get_post_view($this) ?></span>人围观</p>
                    <p><i class="icon-list-alt"></i><span><?php _e('分类: '); ?></span><?php $this->category(','); ?></p>
                    <p><i class="icon-paper-clip"></i><span><?php _e('标签: '); ?></span><?php $this->tags(', ', true, '无'); ?></p>
                    <hr />
                </div>
                <div class="tin-bok-time">
                	<?php $this->content(); ?>
                </div>
                <hr />
                 <div class="go-lu">
                 	<img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php userQQ() ?>&spec=100" class="login_img_to byrang">
                    <p><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></p>
                    <p>丨随风飘着，不也挺好。</p>
                 </div>
                
            </div>
            <div class="tin-item-tite tin-dobos">
            	<div>
                	<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_blank">知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</a>
                </div>
            </div>
            
            
            
            <?php include('comments.php'); ?>
            
            <div class="col-md-9" style="float: right">
                <ul class="post-near">
                    <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
                    <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
                </ul>
            </div>
            
            
            
            
            
            
            
        </div>
  </div>
</section>

<?php include('footer.php'); ?>
