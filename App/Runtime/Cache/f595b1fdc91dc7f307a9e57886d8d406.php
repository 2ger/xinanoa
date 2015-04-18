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
		
	</head>
	<body>
		<div class="swiper-container">
			<div class="swiper-scrollbar"></div>
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="container popup">
						
<script type="text/javascript">
	function save() {
		$("#confirm_wrap,#consult_wrap,#refer_wrap", parent.document).hide();
		$("#confirm_wrap .address_list,#consult_wrap .address_list,#refer_wrap .address_list", parent.document).html("");

		$("#rc select option").each(function(i) {
			emp_no = $(this).val();
			name = jQuery.trim($(this).text());
			html_string = conv_inputbox_item(emp_no, name, name, emp_no);
			$("#confirm_wrap .address_list", parent.document).append(html_string);
		});
		$("#cc select option").each(function(i) {
			emp_no = $(this).val();
			name = jQuery.trim($(this).text());
			html_string = conv_inputbox_item(emp_no, name, name, emp_no);
			$("#consult_wrap .address_list", parent.document).append(html_string);
		});
		$("#bcc select option").each(function(i) {
			emp_no = $(this).val();
			name = jQuery.trim($(this).text());
			html_string = conv_inputbox_item(emp_no, name, name, emp_no);
			$("#refer_wrap .address_list", parent.document).append(html_string);
		});

		$("#confirm_wrap span a", parent.document).remove();
		$("#confirm_wrap .address_list span", parent.document).append("<b><i class=\"fa fa-arrow-right\"></i></b>");
		$("#confirm_wrap .address_list span b:last", parent.document).remove();

		$("#consult_wrap span a", parent.document).remove();
		$("#consult_wrap .address_list span", parent.document).append("<b><i class=\"fa fa-arrow-right\"></i></b>");
		$("#consult_wrap .address_list span b:last", parent.document).remove();

		$("#confirm_wrap,#consult_wrap,#refer_wrap", parent.document).show();
		myclose();
	}

	// 显示AJAX 读取的数据
	function showdata(result) {

		$("#addr_list").html("");
		for (s in result.data) {
			var id = result.data[s].id;
			var position_name = result.data[s].position_name;
			var emp_no = result.data[s].emp_no;
			var email = result.data[s].email;
			var name = result.data[s].name;
			var name = name + "/" + position_name + "&lt;" + email + "&gt;";
			var html_string = conv_address_item(emp_no, name);
			$("#addr_list").append(html_string);
		}
	}


	$(document).ready(function() {
		$("#rb_<?php echo ($type); ?>").prop('checked', true);
		// 选择用户默认选择的类型

		$(".<?php echo ($type); ?>").removeClass("display-none");

		$("input[name='type']").on('click', function() {
			$("input[name='type']").each(function() {
				$("." + $(this).val()).addClass("display-none");
			});
			$("." + $(this).val()).removeClass("display-none");
		})

		$("#emp .tree_menu  a").click(function() {
			$(".emp .tree_menu a").attr("class", "");
			var type = $("input[name='type']:checked").val();
			$(this).addClass("active");
			sendAjax("<?php echo U('read');?>", "type=" + type + "&id=" + $(this).attr("node"), function(data) {
				showdata(data);
			})
			return false;
			//禁止连接生效
		});

		$("#dept .tree_menu  a").click(function() {
			$("#dept .tree_menu a").each(function() {
				$(this).attr("class", "");
			});
			$(this).addClass("active");

			var type = $("input[name='type']:checked").val();

			return false;
			//禁止连接生效
		});

		$("#dept_grade .tree_menu a").click(function() {
			$("#dept_grade .tree_menu a").each(function() {
				$(this).attr("class", "");
			});
			$(this).addClass("active");

			var type = $("input[name='type']:checked").val();

			return false;
			//禁止连接生效
		});

		$("#position .tree_menu a").click(function() {
			$("#position .tree_menu a").each(function() {
				$(this).attr("class", "");
			});
			$(this).addClass("active");

			var type = $("input[name='type']:checked").val();

			return false;
			//禁止连接生效
		});

		$("#addr_list a").on("dblclick", function() {
			$text = $(this).text();
			$val = $(this).parents("label").find("input").val();
			if ($("#rc select option[value='" + $val + "']").val() == undefined) {
				$("<option></option>").val($val).text($text).appendTo("#rc select");
				$("#rc_count").text("(" + $("#rc select option").length + ")");
			};
		});

		$("#rc  select").on("dblclick", function() {
			$(this).find("option:selected").remove();
			$("#rc_count").text("(" + $("#rc select option").length + ")");
		});

		$("#cc  select").on("dblclick", function() {
			$(this).find("option:selected").remove();
			$("#cc_count").text("(" + $("#cc select option").length + ")");
		});
		$("#addr_list").on("mouseover", function() {
			$("#addr_list label").draggable({
				appendTo : "body",
				helper : "clone"
			});
		});
		$("#rc select").droppable({
			activeClass : "ui-state-default",
			hoverClass : "ui-state-hover",
			accept : ":not(.ui-sortable-helper)",
			drop : function(event, ui) {
				$text = ui.draggable.text();
				$val = ui.draggable.find("input").val();
				if ($("#rc select option[value='" + $val + "']").val() == undefined) {
					$("<option></option>").val($val).text($text).appendTo(this);
					$("#rc_count").text("(" + $("#rc select option").length + ")");
				};
			},
		}).sortable({
			items : "option:not(.placeholder)",
			sort : function() {
				// gets added unintentionally by droppable interacting with sortable
				// using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
				$(this).removeClass("ui-state-default");
			}
		});
		$("#cc select").droppable({
			activeClass : "ui-state-default",
			hoverClass : "ui-state-hover",
			accept : ":not(.ui-sortable-helper)",
			drop : function(event, ui) {
				$text = ui.draggable.text();
				$val = ui.draggable.find("input").val();
				if ($("#cc select option[value='" + $val + "']").val() == undefined) {
					$("<option></option>").val($val).text($text).appendTo(this);
					$("#cc_count").text("(" + $("#cc select option").length + ")");
				};
			},
		}).sortable({
			items : "li:not(.placeholder)",
			sort : function() {
				// gets added unintentionally by droppable interacting with sortable
				// using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
				$(this).removeClass("ui-state-default");
			}
		});

	})
	//最终确认

	function add_address(name) {
		var type = $("input[name='type']:checked").val();
		switch(type) {
			case "dgp":
				$dept_grade_id = $("#dept_grade a.active").attr("node");
				$dept_grade_name = $("#dept_grade a.active span").text();

				if ($dept_grade_id == undefined) {
					ui_error("请选择部门级别");
					return false;
				}
				$position_id = $("#position a.active").attr("node");
				$position_name = $("#position a.active span").text();

				if ($position_id == undefined) {
					ui_error("请选择职位");
					return false;
				}
				$text = $dept_grade_name + "-" + $position_name;
				$val = "dgp_" + $dept_grade_id + "_" + $position_id;
				$("<option></option>").val($val).text($text).appendTo("#" + name + " select");
				$("#" + name + "_count").text("(" + $("#" + name + " select option").length + ")");
				break;
			case "dp":
				$dept_id = $("#dept a.active").attr("node");
				$dept_name = $("#dept a.active span").text();

				if ($dept_id == undefined) {
					ui_error("请选择部门");
					return false;
				}
				$position_id = $("#position a.active").attr("node");
				$position_name = $("#position a.active span").text();

				if ($position_id == undefined) {
					ui_error("请选择职位");
					return false;
				}
				$text = $dept_name + "-" + $position_name;
				$val = "dp_" + $dept_id + "_" + $position_id;
				$("<option></option>").val($val).text($text).appendTo("#" + name + " select");
				$("#" + name + "_count").text("(" + $("#" + name + " select option").length + ")");
				break;
			case "dept":
				$dept_id = $("#dept a.active").attr("node");
				$dept_name = $("#dept a.active span").text();

				if ($dept_id == undefined) {
					ui_error("请选择部门");
					return false;
				}
				$text = $dept_name;
				$val = "dept_" + $dept_id;
				$("<option></option>").val($val).text($text).appendTo("#" + name + " select");
				$("#" + name + "_count").text("(" + $("#" + name + " select option").length + ")");
				break;

			case "emp":
				$("input:checked[name='addr_id']").each(function() {
					$text = $(this).parents("label").text();
					$val = "emp_" + $(this).val();
					if ($("#" + name + " select option[value='" + $val + "']").val() == undefined) {
						$("<option></option>").val($val).text($text).appendTo("#" + name + " select");
						$("#" + name + "_count").text("(" + $("#" + name + " select option").length + ")");
					};
				})
				break
		}
	}
</script>
<div class="panel panel-default ">
	<div class="panel-heading clearfix">
		<div class="pull-left">
			<label>
				<input class="ace" type="radio" id="rb_dgp" name="type" value="dgp" >
				<span class="lbl">部门级别-职位</span> </label>

			<label>
				<input class="ace" type="radio" id="rb_dp" name="type" value="dp" >
				<span class="lbl">部门-职位</span> </label>

			<label>
				<input class="ace" type="radio" id="rb_dept" name="type" value="dept"  >
				<span class="lbl">部门</span> </label>

			<label>
				<input class="ace" type="radio" id="rb_emp" name="type" value="emp"  >
				<span class="lbl">人员</span> </label>
		</div>
		<div class="pull-right">
			<a  onclick="save();" class="btn btn-sm btn-primary">确定</a>
			<a  onclick="myclose();" class="btn btn-sm btn-primary">关闭</a>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-28 pull-left">
			<div class="">
				<b class="display-none dgp">部门级别</b><b class="display-none dp dept emp">部门</b>
			</div>
			<div class="popup_tree_menu">
				<div id="dept_grade" style="width:100%;height:190px;" class="dgp display-none">
					<?php echo ($list_dept_grade); ?>
				</div>
				<div id="dept" style="width:100%;height:190px;" class="dp display-none dept">
					<?php echo ($list_dept); ?>
				</div>
				<div id="emp" style="width:100%;height:190px;" class="emp display-none">
					<?php echo ($list_dept); ?>
				</div>
			</div>
			<div>
				<b class="display-none dgp dp ">职位</b>
				<b class="display-none emp">人员</b>
			</div>
			<div id="position" class="display-none dgp dp " style="width:100%;height:198px;">
				<?php echo ($list_position); ?>
			</div>
			<div id="addr_list" class="display-none  emp" style="width:100%;height:198px;"></div>
		</div>
		<div class="col-34 pull-right">
			<div>
				<b style="padding-left: 60px;">审批</b><span id="rc_count"></span>
			</div>
			<div class="clearfix" style="margin-bottom: 15px;">
				<label class="col-4 pull-left text-right" ><a onclick="add_address('rc');" class="btn btn-sm btn-primary"> <i class="fa fa-angle-double-right"></i> </a> </label>
				<div class="col-28 pull-right">
					<div id="rc" style="width:100%;height:130px;overflow:hidden">
						<select size="6" style="height:100%;width:100%;"></select>
					</div>
				</div>
			</div>
			<div>
				<b  style="padding-left: 60px;">协商</b><span id="cc_count"></span>
			</div>
			<div class="clearfix" style="margin-bottom: 15px;">
				<label class="col-4 pull-left text-right" ><a onclick="add_address('cc');" class="btn btn-sm btn-primary"> <i class="fa fa-angle-double-right"></i></a></label>
				<div class="col-28 pull-right">
					<div id="cc" style="width:100%;height:130px;overflow:hidden">
						<select size="6" style="height:100%;width:100%;"></select>
					</div>
				</div>
			</div>
			<div>
				<b  style="padding-left: 60px;">抄送</b><span id="cc_count"></span>
			</div>
			<div class="clearfix">
				<label class="col-4 pull-left text-right" ><a onclick="add_address('bcc');" class="btn btn-sm btn-primary"> <i class="fa fa-angle-double-right"></i></a></label>
				<div class="col-28 pull-right">
					<div id="bcc" style="width:100%;height:95px;overflow:hidden">
						<select size="6" style="height:100%;width:100%;"></select>
					</div>
				</div>
			</div>
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