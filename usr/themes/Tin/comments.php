<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<script>
    $(function(){
        $("#tin-hh").children("a").click(function(){
          return TypechoComment.reply('comment-17868', 17868);
       }) ;
        
    });
</script>


<!--咕咕评论-->
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-use';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>" class="tin-top-comment tin-comment-container">
        <div class="comment-author">
            <span itemprop="image"><!--<?php $number=$comments->mail; echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="46px" height="46px" style="border-radius: 50%;">'; ?>  //如果想主题直接QQ头像就改这里-->
            <?php $comments->gravatar('100', ''); ?>
            </span>
            <span class="fn"><?php $comments->author(); ?>
                <?php if ($comments->authorId == $comments->ownerId) {echo "<span class='tin-bz'>博主</span>";}else{echo "<span class='tin-fk'>大佬</span>";}
                    ?>
            </span>
        </div>
        <div class="comment-meta">
            <span href="<?php $comments->permalink(); ?>" style="color:#b1bfb9"><?php $comments->date('Y-m-d H:i'); ?></span>
            <span class="comment-reply">
                
            </span>
        </div>
        
        <?php $comments->content(); ?>
            <div id="tin-hh">
                <?php $comments->reply('<i class="icon-reply"></i>回复'); ?>
            </div>
    </div>
    <div style="clear:both; margin-bottom: 15px;"></div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<!--咕咕完成评论-->

<div id="comments" class="tin-item-tite">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <div class="tin-item-tite-t">  <!--板子-->
        
    <div class="col-sm-12">
	    <span class="tin-item-tite-h3"><?php $this->commentsNum(_t('荒无人烟'), _t('发现一枚大佬'), _t('一共有 %d 位大佬占座')); ?></span>
    </div>
         

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
        <div style="clear:both; margin-bottom: 15px;"></div>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p class="tin-admin-dl"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
        <div class="col-sm-4 tin-item-tite-input">
    		<p>
    			<input type="text" name="author" id="author" placeholder="昵称" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    	</div>
    	
    	<div class="col-sm-4 tin-item-tite-input">
    		<p>
    			<input type="email" name="mail" id="mail" placeholder="Email" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    	</div>
    	<div class="col-sm-4 tin-item-tite-input">
    		<p>
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
    	</div>
            <?php endif; ?>
        <div class="col-sm-12">
    		<p>
                <textarea rows="5" cols="50" name="text" id="textarea" placeholder="欢迎大佬评论吖？" class=" tin-textarea OwO-textarea" required  style="resize: vertical; margin-bottom: 8px;"><?php $this->remember('text'); ?></textarea>
                <span class="OwO"></span>
            </p>
            
        </div>
    		<p>
                <button type="submit" class="submit tin-btn-primary"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    
    <div class="col-sm-12 tin-comment-list-pl">
        <?php $comments->listComments(); ?>  <!--评论的内容-->
        
    </div>
    
    </div><!--板子结束-->
    <div class="clear"></div>
</div>



