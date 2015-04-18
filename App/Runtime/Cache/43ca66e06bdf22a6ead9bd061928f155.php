<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="__PUBLIC__/css/jquery.gritter.css" />
<?php if(!empty($widget["jquery-ui"])): ?><link rel="stylesheet" href="__PUBLIC__/css/jquery-ui-1.10.3.full.min.css" /><?php endif; ?>
<?php if(!empty($widget["date"])): ?><link rel="stylesheet" href="__PUBLIC__/css/datepicker.css" /><?php endif; ?>


		<!-- fonts -->

		<!-- ace styles -->
		<link rel="stylesheet" href="__PUBLIC__/css/ace.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-skins.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/idangerous.swiper.css">
		<link rel="stylesheet" href="__PUBLIC__/css/idangerous.swiper.scrollbar.css">

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="__PUBLIC__/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="__PUBLIC__/css/style.css" />
		<!-- ace settings handler -->
		<style>
			.swiper-container{
				overflow-y: auto;				
			}
			.swiper-slide {
				padding: 0px;
				background: #fff;
			}
			.red-slide {
				background: #ca4040;
			}
			.blue-slide {
				background: #4390ee;
			}
			.orange-slide {
				background: #ff8604;
			}
			.green-slide {
				background: #49a430;
			}
			.pink-slide {
				background: #973e76;
			}
			.swiper-scrollbar {
				width: 100%;
				height: 4px;
				position: relative;
				left: 0;
				bottom: 5px;
				z-index: 1;
			}
		</style>
		<script src="__PUBLIC__/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="__PUBLIC__/js/html5shiv.js"></script>
		<script src="__PUBLIC__/js/respond.min.js"></script>
		<![endif]-->
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-2.1.0.min.js'>" + "<" + "/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.11.0.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script src="__PUBLIC__/js/bootstrap.min.js"></script>

		<script src="__PUBLIC__/js/idangerous.swiper-2.1.min.js"></script>
		<script src="__PUBLIC__/js/idangerous.swiper.scrollbar-2.1.js"></script>
		
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
		<!-- inline scripts related to this page -->
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
		<script type="text/javascript">
	function check_password(s) {
		if (s.length < 4) {
			return 0;
		}
		var ls = 0;
		if (s.match(/[a-z]/ig)) {
			ls++;
		}
		if (s.match(/[0-9]/ig)) {
			ls++;
		}
		if (s.match(/(.[^a-z0-9])/ig)) {
			ls++;
		}
		if (s.length < 6 && ls > 0) {
			ls--;
		}
		return ls
	}

	function save() {
		var msg = "";
		var vars = $("#form_password").serialize();
		sendAjax("<?php echo U('reset_pwd');?>", vars, function(data) {
			ui_info(data.info);
			setTimeout("myclose()", 200);
		});
	}


	$(document).ready(function(){
		$("#password").keydown(function() {
			s = $(this).val();
			t = check_password(s);
			if (t == 0) {
				$("#msg").html("密码过短");
				$("#msg").css("color", "red");
			}
			if (t == 1) {
				$("#msg").html("密码强度差");
				$("#msg").css("color", "red");
			}
			if (t == 2) {
				$("#msg").html("密码强度良好");
				$("#msg").css("color", "blue");
			}
			if (t == 3) {
				$("#msg").html("密码强度高");
				$("#msg").css("color", "blue");
			}
		});

		$("#confirm_password").keyup(function() {
			new_pwd = $("#password").val();
			confirm_pwd = $(this).val();
			if (new_pwd != confirm_pwd) {
				$("#msg").html("密码不一致");
				$("#msg").css("color", "red");
			} else {
				$("#msg").html("密码一致");
				$("#msg").css("color", "blue");
				$("#status").val("true");
			}
		});
	});
</script>
	</head>
	<body>
		<div class="swiper-container">
			<div class="swiper-scrollbar"></div>
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="container popup">
						
<script type="text/javascript">
	function check_password(s) {
		if (s.length < 4) {
			return 0;
		}
		var ls = 0;
		if (s.match(/[a-z]/ig)) {
			ls++;
		}
		if (s.match(/[0-9]/ig)) {
			ls++;
		}
		if (s.match(/(.[^a-z0-9])/ig)) {
			ls++;
		}
		if (s.length < 6 && ls > 0) {
			ls--;
		}
		return ls
	}

	function save() {
		var msg = "";
		var vars = $("#form_password").serialize();
		new_pwd = $("#password").val();
		confirm_pwd =$("#confirm_password").val();
		if(new_pwd==confirm_pwd){
			sendAjax("<?php echo U('reset_pwd');?>", vars, function(data) {
				ui_info(data.info);
				setTimeout("myclose()", 200);
			});
		}else{
			ui_error("密码不一致");			
		}
	}


	$(document).ready(function() {
		$("#password").keydown(function() {
			s = $(this).val();
			t = check_password(s);
			if (t == 0) {
				$("#msg").html("密码过短");
				$("#msg").css("color", "red");
			}
			if (t == 1) {
				$("#msg").html("密码强度差");
				$("#msg").css("color", "red");
			}
			if (t == 2) {
				$("#msg").html("密码强度良好");
				$("#msg").css("color", "blue");
			}
			if (t == 3) {
				$("#msg").html("密码强度高");
				$("#msg").css("color", "blue");
			}
		})
		$("#confirm_password").keyup(function() {
			new_pwd = $("#password").val();
			confirm_pwd = $(this).val();
			if (new_pwd != confirm_pwd) {
				$("#msg").html("密码不一致");
				$("#msg").css("color", "red");
			} else {
				$("#msg").html("密码一致");
				$("#msg").css("color", "blue");
			}
		})
	})
</script>
<form id="form_password" method="post" action="">
	<input type="hidden" name="ajax" id="ajax" value="1">
	<input type="hidden" name="user_id" id="user_id" value="<?php echo ($id); ?>">
	<?php echo W('PageHeader',array('name'=>'修改密码','search'=>'N'));?>
	<table class="table">
		<tr>
			<th ><label for="password">新密码</label></th>
			<td>
			<input type="password" name="password" id="password" value=""  >
			</td>
		</tr>
		<tr>
			<th><label for="password">确认密码</label></th>
			<td>
			<input type="password" name="confirm_password" id="confirm_password" value=""  />
			</td>
		</tr>
	</table>
	<div class="action">
		<input class="btn btn-sm btn-primary" type="button" value="保存" onclick="save();">
		<input  class="btn btn-sm btn-primary" type="button" value="取消" onclick="myclose();">
	</div>
</form>
<span id="msg"></span>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				if(is_mobile()){
					$(".swiper-container").width($("#dialog",parent.document).width());
					$(".swiper-container").height(window.screen.height-40);													
					var mySwiper = new Swiper('.swiper-container', {
						scrollContainer : true,
						scrollbar : {
							container : '.swiper-scrollbar'
						}
					});						
				}else{
					$(".swiper-container").width(700);
				}				
			});
		</script>
	</body>
</html>