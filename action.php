<?php  

require_once 'config.php';
require_once 'DB.php';

define('PAGE_SIZE', 5);


/**
 * 获取留言列表
 * @return [type] [description]
 */
function get_page_list($page) {
	if(!isset($page) || is_null($page)) $page = 1;
	return _get_for_page("select * from ex_guestbook", $page);
}

/**
 * 获取分页数据
 * @param  [type] $sql  [description]
 * @param  [type] $page [description]
 * @return [type]       [description]
 */
function _get_for_page($sql, $page = 1) {
	$offset = ($page - 1) * PAGE_SIZE;
	$db = new DB();
	return $db->query($sql . " limit $offset, ".PAGE_SIZE);
}

/**
 * 获取留言总数
 * @return [type] [description]
 */
function get_page_count() {
	$db = new DB();
	$count = $db->get("select count(0) from ex_guestbook");
	return ceil($count / PAGE_SIZE);
}


?>


