<?php 
require 'inc.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>登陆</title>
		<link rel="stylesheet" href=" <?php echo WEB_ROOT; ?>/assert/css/bootstrap.min.css">
		<link rel="stylesheet" href=" <?php echo WEB_ROOT; ?>/assert/css/guestbook.css">
		<style type="text/css">
			body {
				padding: 40px 0px;
				background-color: #f5f5f5;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form action="loginAction.php" method="post" class="form-sign" >
				<h2>请登陆</h2>
				<input type="text" name="username" class="input-block-level" placeholder="用户名" >
				<input type="password" name="password" class="input-block-level" placeholder="密码" >
				<div class="form-btn-wrap ">
					<input type="submit" class="btn btn-primary" value="登陆">
					<a href="" class="form-regist" >注册新帐号</a>
				</div>
			</form>
		</div>
		<script type="text/javascript"></script>
	</body>
</html>