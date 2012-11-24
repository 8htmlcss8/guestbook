<?php  

/**
* 数据库操作对象
*/
class DB {

	private $dbuser;
	private $dbpassword;
	private $dbname;
	private $dbhost;
	private $charset;

	private $conn;
	
	function __construct($dbuser, $dbpassword, $dbname, $dbhost) {
		if(isset($dbuser)) {
			$this->dbuser = $dbuser;
			$this->dbpassword = $dbpassword;
			$this->dbname = $dbname;
			$this->dbhost = $dbhost;
		} else {
			$this->_init_from_config();
		}

		if(defined('DB_CHARSET')) 
			$this->charset = DB_CHARSET;

		$this->db_connect();
	}

	private function _init_from_config() {
		if(defined('DB_NAME')) {
			$this->dbuser = DB_USER;
			$this->dbpassword = DB_PASSWORD;
			$this->dbname = DB_NAME;
			$this->dbhost = DB_HOST;
		}
	}

	function db_connect() {
		$this->conn = @mysql_connect($this->dbhost, $this->dbuser, $this->dbpassword);
		if(!$this->conn) {
			throw new Exception("连接数据库失败,请检查你的主机地址,用户名,密码是否正确." . mysql_error());
		}
		$this->set_charset($this->conn);
		$this->select($this->dbname);
	}

	function set_charset($conn, $charset = null) {
		if(function_exists("mysql_set_charset")) {
			mysql_set_charset($charset, $conn);
		} else {
			$sql = "SET NAMES " . $charset;
			mysql_query($sql, $conn);
		}
	}

	function select($db, $conn = null) {
		if(is_null($conn)) {
			$conn = $this->conn;
		}
		if(!@mysql_select_db($this->dbname, $conn)) {
			throw new Exception("选择数据库失败,请检查您提供的数据库: " 
				. $this->dbname . " 是否存在." . mysql_error());
		}
	}

	/**
	 * 执行一个SQL语句
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	function execute($sql) {
		$result = @mysql_query($sql, $this->conn);
		if(!$result) {
			throw new Exception("执行sql语句( $sql )出错. " . mysql_error());
		}
		if(preg_match('/^\s*(create|alter|truncate|drop) /i', $sql)) {
			$return_val = $result;
		} 
		elseif(preg_match('/^\s*(insert|delete|update|replace) /i', $sql)) {
			$return_val = mysql_affected_rows( $this->conn );
		}
		else {
			$return_val = $this->query($sql);
		}
		return $return_val;
	}

	/**
	 * 查询一个列表
	 * @param  [type] $sql [description]
	 * @return Array      [description]
	 */
	function query($sql) {
		$result = @mysql_query($sql, $this->conn);

		$num = @mysql_num_rows($result);
		$return_val = array();
		for ($i=0; $i < $num; $i++) { 
			$return_val[$i] = @mysql_fetch_array($result);
		}
		@mysql_free_result($result);

		return $return_val;
	}

	/**
	 * 获取一个查询结果
	 * @param  [type] $sql [description]
	 * @return [type]      返回一个关联数组和数字索引的数组
	 */
	function get($sql) {
		$result = @mysql_query($sql, $this->conn);
		$return_val = @mysql_fetch_array($result);
		@mysql_free_result($result);

		if(count($return_val) === 2) 
			$return_val = $return_val[0];
		return $return_val;
	}
}

?>