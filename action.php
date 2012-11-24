<?php  

require_once 'config.php';
require_once 'DB.php';

/**
 * 获取留言列表
 * @return [type] [description]
 */
function get_msg_list() {
	$db = new DB();
	return $db->query("select * from ex_guestbook limit 5");
}

?>