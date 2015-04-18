<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		<title><?php echo ($title); ?></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css"  />
		<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />

		<!--[if IE 7]>
		<link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="__PUBLIC__/css/jquery-ui-1.10.3.full.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/jquery.gritter.css" />
<?php if(!empty($widget["jquery-ui"])): ?><link rel="stylesheet" href="__PUBLIC__/css/jquery-ui-1.10.3.full.min.css" /><?php endif; ?>
<?php if(!empty($widget["date"])): ?><link rel="stylesheet" href="__PUBLIC__/css/datepicker.css" /><?php endif; ?>


		<!-- fonts -->
		<!-- ace styles -->

		<link rel="stylesheet" href="__PUBLIC__/css/ace.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="__PUBLIC__/css/ace-ie.min.css" />		
		<style>
			html {
				position: static
			}
		</style>
		<![endif]-->
		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="__PUBLIC__/css/style.css" />
		<!-- ace settings handler -->

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
		<!-- Wrap all page content here -->
		<div class="container">
			<div class="col-xs-12 <?php echo (MODULE_NAME); ?>">
				
<div class="container">
	<!-- /container -->
	<div class="row">
		<div class="col-xs-12 hidden-xs" style="margin-top:120px;"> </div>
	</div>
	<style type="text/css" media="screen">
	html,body,.container {
  background: #c4cdd4;
}
.btn,input{border-radius: 5px !important;}
	</style>
	<div class="row">
		<div class="col-sm-8 hidden-xs">
			<div class="img"><img src="../login.jpg" alt="../login.jpg" style="height:462px;  width: 727px;  box-shadow: 0 1px 3px rgba(0,0,0,.5);"></div>
		</div>
		<div class="col-sm-4 well" style="background:#fff;  box-shadow: 0 1px 3px rgba(0,0,0,.5);border: none;">
			<div style="margin-bottom:44px;margin-top:20px;text-align:center">
				<img src="../logo2.jpg" alt="logo2.jpg">
			</div>
			<form method="post" id="form_login" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3  control-label" for="emp_no">员工编号</label>
					<div class="col-sm-9">
						<input class="form-control" id="emp_no" name="emp_no" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3  control-label" for="password">登陆密码</label>
					<div class="col-sm-9">
						<input class="form-control" id="password" type="password" name="password" />
					</div>
				</div>
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
				<div class="form-group display-none">
					<span class="col-sm-3  control-label"> </span>
					<div class="col-sm-9">
						<label class="inline pull-left col-3">
							<input class="ace" type="checkbox" name="remember" value="1" />
							<span class="lbl"> </span> </label>
						<label for="remember-me">记住我的登录状态</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="button" value="登录" onclick="login();" class="btn btn-sm btn-block btn-danger col-10">
					</div>
				</div>
			</form>
			<p>
			</p>
			<p>
				&nbsp;
			</p>
			<p>
				&nbsp;
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-right">
			<?php echo get_system_config("SYSTEM_NAME");?><br /> <span>技术支持：<a href="http://www.vlldoo.com" target="_blank">微度网络</a></span>&nbsp;&nbsp;<span></span>
		</div>
	</div>
</div>
			</div>
		</div>
		<!-- basic scripts -->

		<!--[if !IE]>
		-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-2.1.0.min.js'>" + "<" + "/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.11.0.min.js'>"+"<"+"/script>");</script>
		<![endif]-->

		<script src="__PUBLIC__/js/bootstrap.min.js"></script>
		<script src="__PUBLIC__/js/typeahead-bs2.min.js"></script>

		<script src="__PUBLIC__/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="__PUBLIC__/js/jquery.ui.touch-punch.min.js"></script>
		<script src="__PUBLIC__/js/jquery.slimscroll.min.js"></script>

		
<?php if(!empty($widget["jquery-ui"])): ?><script src="__PUBLIC__/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__PUBLIC__/js/jquery.ui.touch-punch.min.js"></script><?php endif; ?>

<?php if(!empty($widget["date"])): ?><script src="__PUBLIC__/js/WdatePicker/WdatePicker.js"></script>
	<!-- <script src="__PUBLIC__/js/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="__PUBLIC__/js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/js/datetimepicker/css/bootstrap-datetimepicker.min.css" type="text/css" media="screen" title="no title" charset="utf-8"> --><?php endif; ?>

<?php if(!empty($widget["uploader"])): ?><script type="text/javascript" src="__PUBLIC__/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/plupload/plupload.setting.js"></script><?php endif; ?>

<?php if(!empty($widget["editor"])): ?><script type="text/javascript" src="__PUBLIC__/editor/kindeditor.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/lang/zh_CN.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/kindeditor.setting.js"></script><?php endif; ?>
<script src="__PUBLIC__/js/jquery.gritter.min.js"></script>
<script src="__PUBLIC__/js/bootbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	<?php if(!empty($widget["date"])): ?>// 			$('.input-date').datetimepicker({
//       format: "yyyy-m-d hh:ii",
//       showMeridian: true,
//       language: 'zh-CN',
//       weekStart: 1,
//       pickerPosition:'bottom-right',
//         autoclose: true,
//         todayBtn: "linked"
//     });
// 	$('.input-datem').datetimepicker({
//   format: "yyyy-m",
//   showMeridian: true,
//   language: 'zh-CN',
//   weekStart: 1,
//  startView: 'decade', //初始页面
// minView: 'year', //精确度
//   pickerPosition:'bottom-right',
//     autoclose: true,
//     todayBtn: "linked"
// });
// 	$('.input-dated').datetimepicker({
//   format: "yyyy-m-d",
//   showMeridian: true,
//   language: 'zh-CN',
//   weekStart: 1,
// minView: 'month', //精确度
//   pickerPosition:'bottom-right',
//     autoclose: true,
//     todayBtn: "linked"
// });
//<?php endif; ?>

			<?php if(!empty($widget["editor"])): ?>editor_init();<?php endif; ?>
	});
</script>
<script type="text/javascript">
    //添加   for  出差
    var id=1;
    var text="";
    var texts="";
    var lb = "外勒";
   
    	$(".newadd").click(function() {
          // alert("hko b ");
          var leibie = $("#flow_field_61").val();
          if(leibie){
              lb="出差"
          }
          
          text =  "<tr><td>"+id+"</td> <td>"+$("#emp_no").text()+"</td> <td>"+$("#username").text()+"</td> <td>"+$("#get_dept_name").text()+"</td> <td>"+lb+"</td> <td>"+$("#flow_field_56").val()+"</td><td>"+$("#flow_field_48").val()+"</td> <td>"+$("#flow_field_49").val()+"</td> <td>"+$("#flow_field_57").val()+"</td> <td>"+$("#flow_field_58").val()+"</td> <td>"+$("#flow_field_59").val()+"</td> </tr>";
          texts = texts + text;
          
            $(".tabledate").append(text);
            $("#flow_field_115").val(texts);
            id= id+1;
    	})
    </script>

		<!-- ace scripts -->
		<script src="__PUBLIC__/js/ace-elements.min.js"></script>
		<script src="__PUBLIC__/js/ace.min.js"></script>
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
		<!-- inline scripts related to this page -->
	</body>
</html>