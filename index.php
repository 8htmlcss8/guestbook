<?php  
require 'inc.php';
require 'action.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>欢迎光临留言本主页</title>
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
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a href="#" class="brand">留言本</a>
					<ul class="nav">
						<!-- <li class="active"><a href="#">留言本</a></li> -->
						<li><a href="#">关于</a></li>
					</ul>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">登陆</a>
							<div class="dropdown-menu">
								<form action="loginAction.php" method="post" class="form-login" >
									<input type="text" name="username" class="input-block-level" placeholder="用户名" >
									<input type="password" name="password" class="input-block-level" placeholder="密码" >
									<div class="form-btn-wrap ">
										<input type="submit" class="btn btn-primary" value="登陆">
										<a href="" class="form-regist" >注册新帐号</a>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<ul class="post-list">
				<!-- <li>
					<div class="row">
						<div class="span1">
							<img src="<?php echo WEB_ROOT; ?>/assert/img/qq.png" alt="">
							<p>张三</p>
						</div>
						<div class="span11">
							<p>今天我上淘宝买了件衣服相当给力. 聚划算买的,超值,很喜欢这种风格的裙子,兔毛的手感很好,尺码也很合适.穿上显得很高档,有种奢华的感觉,虽然出了一点问题但是很快解决了，售后很认真，全五星！</p>
							<p class="muted pull-right" >2012-11-02 20:00</p>
						</div>
					</div>
				</li> -->

				<?php  $list = get_page_list($_GET["p"]);
					$i = 0;
					foreach ($list as $vo) { 
						++$i;
				?> 
				<li>
					<div class="row">
						<div class="span1">
							<img src="<?php echo WEB_ROOT; ?>/assert/img/qq.png" alt="">
							<p> <?php echo $vo['nickname']; ?> </p>
						</div>
						<div class="span11">
							<p> <?php echo $vo['content']; ?> </p>
							<p class="muted pull-right" > <?php echo date("Y-m-d H:i", $vo['createtime']) . "&nbsp;&nbsp;&nbsp; - $i 楼 -"; ?></p>
						</div>
					</div>
				</li>
				<?php } ?>

			</ul><!--/ post-list -->

			<!-- <div class="pagination pagination-right">
				<ul>
					<li><a href="#" class="page-prev">Prev</a></li>
					<li><a href="#" class="page-num">1</a></li>
					<li><a href="#" class="page-num">2</a></li>
					<li><a href="#" class="page-num">3</a></li>
					<li><a href="#" class="page-num">4</a></li>
					<li><a href="#" class="page-num">5</a></li>
					<li><a href="#" class="page-next">Next</a></li>
				</ul>
			</div> -->
			<div id="page"></div>
		</div>

		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/jquery-1.8.0.js"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/jquery.pagination.js"></script>
		<script type="text/javascript">

			jQuery(function ($) {

				$("#page").pagination({
					class: "pagination-right", 
					// num: 3, 
					page: '<?php echo is_null($_GET["p"]) ? 1 : $_GET["p"]; ?>', 
					count: <?php echo get_page_count(); ?>, 
					callback: function (current_page, new_page) {
						if(current_page === new_page) return;
						window.location = "index.php?p=" + new_page;
					}
				});

				/*$("#page").pagination({
					class: "pagination-right", 
					refresh: false, 
					num: 5, 
					count: 20
				});*/

			});

		</script>
	</body>
</html>