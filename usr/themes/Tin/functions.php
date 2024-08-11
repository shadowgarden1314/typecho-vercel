<?php

/*这里是调用文章浏览次数用的*/
//get_post_view($this)
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
    }
    echo $row['views'];
}
/*结束*/

if (!defined('__TYPECHO_ROOT_DIR__')) exit;


require_once("setting.php");

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/



//up主格言
function userMotto(){
 $userMotto = Helper::options()->userMotto;
  if(empty($userMotto)){
    echo '今天又是美好的一天！';
  }else{
    echo $userMotto;
  }
}

//up主QQ
function userQQ(){
 $userQQ = Helper::options()->userQQ;
  if(empty($userQQ)){
    echo '410704470';
  }else{
    echo $userQQ;
  }
}
//up主微信
function userWX(){
 $userWX = Helper::options()->userWX;
  if(empty($userWX)){
    echo '不对外公开';
  }else{
    echo $userWX;
  }
}
//up主邮箱
function userEmail(){
 $userEmail = Helper::options()->userEmail;
  if(empty($userEmail)){
    echo '不对外公开';
  }else{
    echo $userEmail;
  }
}
//up主QQ交流群
function userQun(){
 $userQun = Helper::options()->userQun;
  if(empty($userQun)){
    echo '暂时没有创建';
  }else{
    echo $userQun;
  }
}
//up主微博
function userWb(){
 $userWb = Helper::options()->userWb;
  if(empty($userWb)){
    echo '没有开通';
  }else{
    echo $userWb;
  }
}
//up主Github
function userGit(){
 $userGit = Helper::options()->userGit;
  if(empty($userGi)){
    echo '没有开通';
  }else{
    echo $userGi;
  }
}

//首页毒鸡汤/公告
function mainTop(){
 $mainTop = Helper::options()->mainTop;
  if(empty($mainTop)){
    echo '(๑′ᴗ‵๑)Ｉ Lᵒᵛᵉᵧₒᵤ❤毒鸡汤!';
  }else{
    echo $mainTop;
  }
}




//友情链接
function Friendship(){
 $Friendship = Helper::options()->Friendship;
  if(empty($Friendship)){
    echo '<a href="https://e123e.cn" target="_blank">听风博客</a>';
  }else{
    echo $Friendship;
  }
}




/*有图无图调用*/
function themeFields($layout) {
?>
<style>#custom-field input{ width:100%; }textarea{ height: 180px; width: 100%;}</style>
<?php
 $wzimg = new Typecho_Widget_Helper_Form_Element_Text('wzimg', NULL, NULL, _t('文章/独立页面封面图'), _t('如果不填将显示随机封面图'));
 $layout->addItem($wzimg);
}


















/*文章略缩图  <?php showThumbnail($this); ?>调用*/
function showThumbnail($widget)
{ 
    $mr = 'https://t.alcy.cc/moe';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
         echo $thumbUrl[1][0];
    } elseif ($attach->isImage) {
      echo $attach->url; 
    } else {
      echo $mr;
    }
}
//结束



