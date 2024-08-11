<?php
class Links_Action extends Typecho_Widget implements Widget_Interface_Do
{
	private $db;
	private $user;
	private $prefix;
	private $options;

	public function __construct() {
     Typecho_Widget::widget('Widget_Init');
     Typecho_Widget::widget('Widget_Options')->to($options);
	 Typecho_Widget::widget('Widget_User')->to($this->user);
     parent::__construct($options->request, $options->response);
    }

	public function hasLogin() {
	 //如果没有登陆
	 if (!$this->user->length) {
	  header('HTTP/1.1 403 Forbidden');
	  echo "请登录后再添加友情链接！";
	  return false;
	 }else{
	  //如果已登陆
	  return true;
	 }
	}
			
	public function insertLink()
	{
	 if (!$this->hasLogin()) { return false; }
		if (Links_Plugin::form('insert')->validate()) {
			$this->response->goBack();
		}
		/** 取出数据 */
		$link = $this->request->from('name', 'url', 'sort', 'image', 'description', 'user');
		$link['order'] = $this->db->fetchObject($this->db->select(array('MAX(order)' => 'maxOrder'))->from($this->prefix.'links'))->maxOrder + 1;

		/** 插入数据 */
		$link['lid'] = $this->db->query($this->db->insert($this->prefix.'links')->rows($link));

		/** 设置高亮 */
		$this->widget('Widget_Notice')->highlight('link-'.$link['lid']);

		/** 提示信息 */
		$this->widget('Widget_Notice')->set(_t('链接 <a href="%s">%s</a> 已经被增加',
		$link['url'], $link['name']), NULL, 'success');

		/** 转向原页 */
		$this->response->redirect(Typecho_Common::url('extending.php?panel=Links%2Fmanage-links.php', $this->options->adminUrl));
	}

	public function updateLink()
	{
	if (!$this->hasLogin()) { return false; }
		if (Links_Plugin::form('update')->validate()) {
			$this->response->goBack();
		}

		/** 取出数据 */
		$link = $this->request->from('lid', 'name', 'sort', 'image', 'url', 'description', 'user');

		/** 更新数据 */
		$this->db->query($this->db->update($this->prefix.'links')->rows($link)->where('lid = ?', $link['lid']));

		/** 设置高亮 */
		$this->widget('Widget_Notice')->highlight('link-'.$link['lid']);

		/** 提示信息 */
		$this->widget('Widget_Notice')->set(_t('链接 <a href="%s">%s</a> 已经被更新',
		$link['url'], $link['name']), NULL, 'success');

		/** 转向原页 */
		$this->response->redirect(Typecho_Common::url('extending.php?panel=Links%2Fmanage-links.php', $this->options->adminUrl));
	}

    public function deleteLink()
    {
	if (!$this->hasLogin()) { return false; }
        $lids = $this->request->filter('int')->getArray('lid');
        $deleteCount = 0;
        if ($lids && is_array($lids)) {
            foreach ($lids as $lid) {
                if ($this->db->query($this->db->delete($this->prefix.'links')->where('lid = ?', $lid))) {
                    $deleteCount ++;
                }
            }
        }
        /** 提示信息 */
        $this->widget('Widget_Notice')->set($deleteCount > 0 ? _t('链接已经删除') : _t('没有链接被删除'), NULL,
        $deleteCount > 0 ? 'success' : 'notice');
        
        /** 转向原页 */
        $this->response->redirect(Typecho_Common::url('extending.php?panel=Links%2Fmanage-links.php', $this->options->adminUrl));
    }

    public function sortLink()
    {
	if (!$this->hasLogin()) { return false; }
        $links = $this->request->filter('int')->getArray('lid');
        if ($links && is_array($links)) {
			foreach ($links as $sort => $lid) {
				$this->db->query($this->db->update($this->prefix.'links')->rows(array('order' => $sort + 1))->where('lid = ?', $lid));
			}
        }
    }

	public function action()
	{
	if (!$this->hasLogin()) { return false; }
		$this->db = Typecho_Db::get();
		$this->prefix = $this->db->getPrefix();
		$this->options = Typecho_Widget::widget('Widget_Options');
		$this->on($this->request->is('do=insert'))->insertLink();
		$this->on($this->request->is('do=addhanny'))->addHannysBlog();
		$this->on($this->request->is('do=update'))->updateLink();
		$this->on($this->request->is('do=delete'))->deleteLink();
		$this->on($this->request->is('do=sort'))->sortLink();
		$this->response->redirect($this->options->adminUrl);
	}
}
