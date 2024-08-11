<?php

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔'));
    $form->addInput($sticky);
    
    $userMotto = new Typecho_Widget_Helper_Form_Element_Text('userMotto', NULL, NULL, _t('首页博主格言'), _t('例如：今天又是美好的一天'));
    $form->addInput($userMotto);
    
    $userQQ = new Typecho_Widget_Helper_Form_Element_Text('userQQ', NULL, NULL, _t('QQ'), _t('例如：410704470'));
    $form->addInput($userQQ);
    
    $userWX = new Typecho_Widget_Helper_Form_Element_Text('userWX', NULL, NULL, _t('微信'), _t('默认：不对外公开'));
    $form->addInput($userWX);
    
    $userEmail = new Typecho_Widget_Helper_Form_Element_Text('userEmail', NULL, NULL, _t('邮箱'), _t('默认：不对外公开'));
    $form->addInput($userEmail);
    
    $userQun = new Typecho_Widget_Helper_Form_Element_Text('userQun', NULL, NULL, _t('QQ交流群'), _t('默认：暂时没有创建'));
    $form->addInput($userQun);
    
    $userWb = new Typecho_Widget_Helper_Form_Element_Text('userWb', NULL, NULL, _t('个人微博'), _t('默认：没有开通'));
    $form->addInput($userWb);
    
    $userGit = new Typecho_Widget_Helper_Form_Element_Text('userGit', NULL, NULL, _t('Github'), _t('默认：没有开通'));
    $form->addInput($userGit);
    
    $loveboy = new Typecho_Widget_Helper_Form_Element_Text('loveboy', NULL, NULL, _t('爱情栏头像1URL'), _t('默认：images/2.jpg  //支持填写链接'));
    $form->addInput($loveboy);
    
    $lovegirl = new Typecho_Widget_Helper_Form_Element_Text('lovegirl', NULL, NULL, _t('爱情栏头像2URL'), _t('默认：images/2.jpg  //支持填写链接'));
    $form->addInput($lovegirl);
    
    $mainTop = new Typecho_Widget_Helper_Form_Element_Text('mainTop', NULL, NULL, _t('首页毒鸡汤/公告'), _t('默认：无'));
    $form->addInput($mainTop);
    
    $Friendship = new Typecho_Widget_Helper_Form_Element_Text('Friendship', NULL, NULL, _t('友情链接'), _t('默认：无'));
    $form->addInput($Friendship);
    
    $copyright = new Typecho_Widget_Helper_Form_Element_Text('copyright', NULL, NULL, _t('版权信息'), _t('例如：版权所有 © 2018-2019 听风博客丨粤ICP备19097500号-1'));
    $form->addInput($copyright);
    

    
    
    
    
    
    
    
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}




?>
