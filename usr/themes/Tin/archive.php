<?php
/**
 * Tin主题1.0.1
 * 本次更新：修复分类等打开错误bug
 * 本主题为免费主题，会玩的可以随意修改，但是请留版权。<br>
 * 
 * @package Tin 主题
 * @author <a href="https://e123e.cn" target="_blank">by听风 </a>
 * @version 1.0.1
 * @link https://e123e.cn
 */
include('header.php');
?>


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
            
            <?php if ($this->have()): ?>
            <?php while($this->next()): ?>
            <div class="tin-item-tite-b">
            	<a href="<?php $this->permalink() ?>" class="tin-list-img" style="background:url('<?php $wzimg = $this->fields->wzimg;
	 if(!empty($wzimg)){
      echo $this->fields->wzimg;
	 }else{
	  showThumbnail($this);
	 }?>') center center no-repeat"></a>
                <div class="tin-list-tite">
                	<h3><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
                    <p><?php $this->excerpt(70, ' ...');?></p>
                </div>
                <div class="tin-list-time">
                	<p><i class="icon-calendar"></i><span><?php $this->date(); ?></span></p>
                    <p><i class="icon-list-alt"></i><span><?php _e('分类: '); ?></span><?php $this->category(','); ?></p>
                    <span><a href="<?php $this->permalink() ?>">前去围观</a></span>
                </div>
            </div>
            <?php endwhile; ?>
            
            <div class="tin-list-nav">
                <?php $this->pageLink('上一页'); ?>
                <?php $this->pageLink('下一页','next'); ?>
            </div>
            
            
            
            <?php else: ?><p class="main-kk">找不到文章呀，是没发布吗？</p><?php endif; ?>
            
            
           <!-- <p class="main-kk">都被你看光啦！害羞⁄(⁄ ⁄•⁄ω⁄•⁄ ⁄)⁄！</p>-->
            
            
        </div>
  </div>
</section>

<?php include('footer.php'); ?>
