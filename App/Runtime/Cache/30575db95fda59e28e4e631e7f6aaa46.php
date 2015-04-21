<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_system_config("SYSTEM_NAME");?></title>

	<link rel="stylesheet" href="__PUBLIC__/weixin/css/themes/default/jquery.mobile-1.4.5.min.css">
	<link rel="shortcut icon" href="__PUBLIC__/weixin/favicon.ico">
	<script src="__PUBLIC__/weixin/js/jquery.js"></script>
	<script src="__PUBLIC__/weixin/js/jquery.mobile-1.4.5.min.js"></script>


	<script src="__PUBLIC__/js/ace-extra.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>
	<script src="__PUBLIC__/js/html5shiv.js"></script>
	<script src="__PUBLIC__/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
	var upload_url = "<?php echo U('upload');?>";
	var del_url = "<?php echo U('del_file');?>";
	var _hmt = _hmt || [];
	var app_path = "__ROOT__";
	(function() {
		var hm = document.createElement("script");
		hm.src = "//hm.baidu.com/hm.js?2a935166b0c9b73fef3c8bae58b95fe4";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
	
</head>
<body>
<div data-role="page" id="testpage">

	<div data-role="header">
		<h1><?php echo get_system_config("SYSTEM_NAME");?></h1>
		<!-- <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left ui-btn-icon-notext">返回</a> -->
		<!-- <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-icon-left ui-icon-gear">设置</a> -->
		<!-- <div data-role="navbar">
			<ul>
				<li><a href="#" class="ui-btn-active ui-state-persist">概览</a></li>
				<li><a href="#">贷款审批</a></li>
				<li><a href="#">工作审批</a></li>
				<li><a href="#">客户管理</a></li>
			</ul>
		</div> -->
	</div><!-- /header -->

	<div class="ui-content" role="main">
		
	
	<form method="post" id="form_login" class="form-horizontal">
				<ul data-role="listview" data-inset="true">
								<li class="ui-field-contain">
									<label for="name3">员工编号:</label>
									<input type="text" id="emp_no" name="emp_no" value="" data-clear-btn="true">
								</li>
								<li class="ui-field-contain">
									<label for="name3">登陆密码:</label>
									<input id="password" type="password" name="password"  value="" data-clear-btn="true">
								</li>
								
							</ul>
				<?php if(!empty($is_verify_code)): ?><div class="form-group">
						<label class="col-sm-3  control-label" for="verify">验证码：</label>
						<div class="col-sm-9 row">
							<div class="col-xs-8">
								<input class="form-control" id="verify" name="verify" />
							</div>
							<div class="col-xs-4">
								<img src='__URL__/verify' / style='cursor:pointer' title='刷新验证码' id='verifyImg' onclick='freshVerify()'>
							</div>
						</div>
					</div><?php endif; ?>
				
				<a href="#" onclick="login();" class="ui-btn ui-corner-all ui-shadow ui-btn-active">登陆</a>
			</form>
			
			
	</div><!-- /content -->



</div><!-- /page -->
<!-- ace scripts -->
<script src="__PUBLIC__/js/uncompressed/ace-elements.js"></script>
<script src="__PUBLIC__/js/uncompressed/ace.js"></script>
<script src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript">
	function login() {
		if (check_form("form_login")) {
			sendForm("form_login", "<?php echo U('login/check_login');?>");
		}
	}
	
	$(document).ready(function() {
		var $dom="#password";
		<?php if(!empty($is_verify_code)): ?>$dom="#verify";<?php endif; ?>

		$($dom).keydown(function(event) {
			if (event.keyCode == 13) {
				if (check_form("form_login")) {
					sendForm("form_login", "<?php echo U('?m=login&a=check_login');?>");
					return false;
				}
			}
		});
	});
</script>
</body>
</html>