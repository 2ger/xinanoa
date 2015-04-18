<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<title><?php echo (($title)?($title):"流程管理"); ?></title>
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

	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-rtl.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-skins.css" />

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-ie.css" />
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
<style type="text/css" media="screen">
body{overflow-x:hidden;}
</style>
<?php if(($isxin) != "1"): ?><style type="text/css" media="screen">
.submitform,#pickfiles{display:none;}
.form-group select, .form-group textarea, .form-group input[type="text"], .form-group input[type="password"], .form-group input[type="datetime"], .form-group input[type="datetime-local"], .form-group input[type="date"], .form-group input[type="month"], .form-group input[type="time"], .form-group input[type="week"], .form-group input[type="number"], .form-group input[type="email"], .form-group input[type="url"], .form-group input[type="search"], .form-group input[type="tel"], .form-group input[type="color"]{border:none !important}
</style><?php endif; ?>
<div id="<?php echo ($step); ?>iframe">


<div class="operate panel panel-default hidden">
	<div class="panel-body">
		<div class="pull-left ">
			<?php if(($flow_type["type"]) != "1"): ?><a onclick="popup_confirm();"  class="btn btn-sm btn-primary">选择审批流程</a><?php endif; ?>
		</div>
	
	</div>
</div>

                                    <div class="col-sm-12 text-center ">
                                       <?php echo W('PageHeader',array('name'=>array('',$flow_type['short']),'search'=>'N'));?>
                                       <!-- <?php echo W('PageHeader',array('name'=>array('',$flow_type['short']),'search'=>'N'));?> -->
                                    </div>
								
                                    	<?php if(($flow_type["is_edit"]) != "2"): ?><div class="alert alert-danger  hidden-print clearfix" role="alert">
                                    				<?php echo ($flow_type["content"]); ?>
                                    	</div><?php endif; ?>	
<form method='post' id="form_data" name="form_data" enctype="multipart/form-data" class=" form-horizontal">
	<input type="hidden" id="id" name="id" value="<?php echo ($vo["id"]); ?>">
	<input type="hidden" id="ajax" name="ajax" value="1">
	<input type="hidden" id="add_file" name="add_file" >
	<input type="hidden" id="type" name="type" value="<?php echo ($flow_type["id"]); ?>">
	<input type="hidden" id="opmode" name="opmode" value="edit">
	<input type="hidden" id="confirm" name="confirm" value="">
	<input type="hidden" id="confirm_name" name="confirm_name" value="">
	<input type="hidden" id="consult" name="consult" value="">
	<input type="hidden" id="consult_name" name="consult_name" value="">
	<input type="hidden" id="refer" name="refer" value="">
	<input type="hidden" id="refer_name" name="refer_name" value="">
	<input type="hidden" id="step" name="step" value="">
	<input type="hidden" id="steps" name="steps" value="<?php echo ($step); ?>">
	<input type="hidden" id="steps" name="dai" value="<?php echo ($daiid); ?>">
	<input type="hidden" id="content" name="content" value="已完成">
    
<div class="hidden">
    
	<div class="form-group ">
		<label class="col-sm-2 control-label" >审批：</label>
		<div class="col-sm-10">
			<p id="confirm_wrap" class="form-control-static address_list">
				<?php echo ($flow_type["confirm_name"]); ?>
			</p>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" >协商：</label>
		<div class="col-sm-10">
			<p id="consult_wrap" class="form-control-static address_list">
				<?php echo ($flow_type["consult_name"]); ?>
			</p>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" >抄送：</label>
		<div class="col-sm-10">
			<p id="refer_wrap" class="form-control-static address_list">
				<?php echo ($flow_type["consult_name"]); ?>
			</p>
		</div>
	</div>
    
</div><!-- #hidden -->
	<div class="form-group hidden">
		<label class="col-sm-2 control-label" for="name">标题*：</label>
		<div class="col-sm-10">
			<input value="标题<?php echo ($vo["name"]); ?>" class="form-control" type="text" id="name" name="name" >
		</div>
	</div>

	<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field_vo): $mod = ($i % 2 );++$i; echo W('FlowField',$field_vo); endforeach; endif; else: echo "" ;endif; ?>
	<?php if(($flow_type["is_edit"]) != "2"): ?><div class="form-group hidden">
			<div class="col-xs-12">
				<textarea class="editor" id="content" name="content" style="width:100%;height:200px;"><?php echo ($vo["content"]); ?></textarea>
			</div>
		</div><?php endif; ?>
	<div class="form-group clearfix" >
		<label class="col-sm-2 control-label" ></label>
		<div class="col-sm-10">
			<?php echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'edit'));?>
		</div>
	</div>
</form>

		<div class="alert alert-danger text-center submitform" style="margin-top:20px">
    		<a onclick="save(10);"  class="btn  btn-primary"><i class="fa fa-save"></i> 保存 </a>
    		<a onclick="save(20);"  class="btn  btn-success tijiao"><i class="fa fa-arrow-circle-up"></i>完成</a>
		</div>
    
    </div><!-- #iframe -->    
        
	<!-- basic scripts -->

	<!--[if !IE]>
	-->
	<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-2.1.0.min.js'>" + "<" + "/script>");</script>
<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
		window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.11.0.min.js'>"+"<"+"/script>");</script>
<![endif]-->
<script type="text/javascript">
			if ("ontouchend" in document)
				document.write("<script src='__PUBLIC__/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");</script>
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
<script src="__PUBLIC__/js/uncompressed/ace.js"></script>
<script src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript">

	function save(step) {
		window.onbeforeunload=null;
		$("#confirm").val("");
		$("#confirm_wrap  span").each(function() {
			$("#confirm").val($("#confirm").val() + $(this).attr("data") + '|');
		});
		$("#confirm_name").val($("#confirm_wrap").html());
		$("#consult").val("");
		$("#consult_wrap  span").each(function() {
			$("#consult").val($("#consult").val() + $(this).attr("data") + '|');
		});
		$("#consult_name").val($("#consult_wrap").html());

		$("#refer").val("");
		$("#refer_wrap  span").each(function() {
			$("#refer").val($("#refer").val() + $(this).attr("data") + '|');
		});
		$("#refer_name").val($("#refer_wrap").html());

		if ($("#confirm").val().length < 2) {
			ui_error('请选择审批流程');
			return false;
		}
		$("#step").val(step);
		if (check_form("form_data")) {
			sendForm("form_data", "<?php echo U('save');?>");
		}
	}

	function popup_confirm() {
		winopen("<?php echo U('popup/confirm');?>", 730, 574);
	}


	$(document).ready(function() {
		$("#confirm span").on("dblclick", function() {
			$("#confirm span").last().find("b").remove();
		});
		$("#consult span").on("dblclick", function() {
			$("#consult span").last().find("b").remove();
		});
       
      
	}); 
	

	var nowstep = "<?php echo ($step); ?>";
	var neststep = "<?php echo ($nextstep); ?>";               
	var isnextdone ="<?php echo ($nextis); ?>";
	$('.tijiao').click(function(event) {
	    $("body",parent.document).find('.close').click(); // ok  关闭弹窗

	    $("body",parent.document).find("[panel='"+nowstep+"']").removeClass("btn-danger").addClass("btn-success");//当前步变绿

		// 如果下一步为0，变红/2
		if (isnextdone == "0") {
			  $("body",parent.document).find("[panel='"+neststep+"']").addClass("btn-danger");
		}


	    //IFRAME 自动高度  1》取得body 高度  2》设置父层高度
	    // var height = $("#<?php echo ($step); ?>iframe").css("height");
	    // //var height = $("#step21iframe").css("height");
	    // //alert(height)
	    // $("body",parent.document).find("#<?php echo ($step); ?>iframe").css("height",height);

	});

	//权限操作  表单不可填，提交不可见
	// $('input,select,button,textarea').attr("disabled","disabled").addClass('disabled');
	// 

</script>

<!-- inline scripts related to this page -->



<style type="text/css" media="screen">
.form-group input.disabled,.form-group select.disabled,.form-group textarea.disabled{color: #000 !important;
background: #fff !important;
border: none;}
</style>

</body>
</html>