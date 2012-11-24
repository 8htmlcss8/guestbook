<?php  
require 'config.php';

function __autoload($class_name) {
	require_once $class_name. ".php";
}

$db = new DB();
$ret = $db->query("select * from ex_guestbook");
// echo var_dump(mysql_fetch_array($ret)) ;
echo var_dump($ret) . "<br>";

$ret2 = $db->get("select t.content from ex_guestbook t limit 1");
echo $ret2;
?>