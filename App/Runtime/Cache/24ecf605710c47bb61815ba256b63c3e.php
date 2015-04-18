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
	function save() {
		if ($("#name").val().length > 0) {
			$("#dept_name", parent.document).val($("#name").val());
			$("#pid", parent.document).val($("#val").val());
		} else {
			ui_error("请选择级部门");
			return false;
		}
		myclose();
	}


	$(document).ready(function() {
		parent_node = $(".sub_left_menu ul.tree_menu a.active", parent.document).attr("node");
		$("ul.tree_menu a[node='" + parent_node + "']").addClass("disabled");
		$(".popup_tree_menu a:not('.disabled')").click(function() {
			$("#val").val($(this).attr("node"));
			$("#name").val($(this).children("span").text());
			$(".tree_menu a.active").removeClass("active");
			$(this).addClass("active");
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
						
<?php echo W('PageHeader',array('name'=>'请选择上级部门','search'=>'N'));?>
<input type="hidden" name="val" id="val">
<input type="hidden" name="name" id="name">
<div class="operate panel panel-default">
	<div class="panel-heading clearfix">
		<div class="pull-left">
			<a  onclick="save();" class="btn btn-sm btn-primary">确定</a>
		</div>
		<div class="pull-right">
			<a  onclick="myclose();" class="btn btn-sm btn-primary">关闭</a>
		</div>
	</div>
	<div class="panel-body">
		<div class="popup_tree_menu">
			<ul class="tree_menu">
				<li>
					<a node="0"><i class="icon"></i> <span>根节点</span> </a>
					<?php echo ($menu); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

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