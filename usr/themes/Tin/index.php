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

<?php 
/** 文章置顶 */
$sticky = $this->options->sticky;; //置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔
if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
    $sticky_html = "<span style='color:red'>[置顶] </span>"; //置顶标题的 html
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }
$uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}
?>




<!--上面的左侧栏结束啦-->
<div class="col-md-9 main-right">
        	<div class="tin-item-tite">
            	<div class="SoulSoother">
                	<i class="icon-volume-up"></i>
                    <span><?php mainTop() ?></span>
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
                	<h3><a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h3>
                    <p><?php $this->excerpt(70, ' ...');?></p>
                </div>
                <div class="tin-list-time">
                	<p><i class="icon-calendar"></i><span><?php $this->date(); ?></span></p>
                    <p><i class="icon-eye-open"></i><span><?php get_post_view($this) ?></span>人围观</p>
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
