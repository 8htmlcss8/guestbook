<?php define('WEB_ROOT', '/t/guestbook'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>分页组件测试页面</title>
		<link rel="stylesheet" href=" <?php echo WEB_ROOT; ?>/assert/css/bootstrap.min.css">
		<style type="text/css">
			body {
				padding: 40px 0px;
				background-color: #f5f5f5;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div id="page"></div>
		</div>

		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/jquery-1.8.0.js"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assert/js/jquery.pagination.js"></script>
		<script type="text/javascript">

			jQuery(function ($) {

				// 结合后台进行跳转的用法
				/* 
				$("#page").pagination({
					class: "pagination-right", 
					page: '<?php // echo is_null($_GET["p"]) ? 1 : $_GET["p"]; ?>', 
					count: <?php // echo get_page_count(); ?>, 
					callback: function (current_page, new_page) {
						if(current_page === new_page) return;
						window.location = "index.php?p=" + new_page;
					}
				});
				*/

				// 测试代码
				$("#page").pagination({
					// class: "pagination-right", 
					refresh: false, 
					num: 5, 
					count: 20, 
					title: {
						prev: "Prev", 
						next: "Next"
					}
				});

			});

		</script>
	</body>
</html>