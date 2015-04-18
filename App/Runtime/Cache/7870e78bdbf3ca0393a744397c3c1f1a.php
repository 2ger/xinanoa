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

<?php if(!empty($widget["date"])): ?><script src="__PUBLIC__/js/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="__PUBLIC__/js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/js/datetimepicker/css/bootstrap-datetimepicker.min.css" type="text/css" media="screen" title="no title" charset="utf-8"><?php endif; ?>

<?php if(!empty($widget["uploader"])): ?><script type="text/javascript" src="__PUBLIC__/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/plupload/plupload.setting.js"></script><?php endif; ?>

<?php if(!empty($widget["editor"])): ?><script type="text/javascript" src="__PUBLIC__/editor/kindeditor.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/lang/zh_CN.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/kindeditor.setting.js"></script><?php endif; ?>
<script src="__PUBLIC__/js/jquery.gritter.min.js"></script>
<script src="__PUBLIC__/js/bootbox.min.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			<?php if(!empty($widget["date"])): ?>$('.input-date').datetimepicker({
      format: "yyyy-m-d hh:ii",
      showMeridian: true,
      language: 'zh-CN',
      weekStart: 1,
      pickerPosition:'bottom-right',
        autoclose: true,
        todayBtn: "linked"
    });<?php endif; ?>

			<?php if(!empty($widget["editor"])): ?>editor_init();<?php endif; ?>
	});
</script>
<script type="text/javascript">
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
	function edit() {
		parent.window.location.href = '<?php echo U("edit","id=".$vo["id"]);?>';
		myclose();
	}

	function del() {
		parent.window.location.href = '<?php echo U("del","id=".$vo["id"]);?>';
		myclose();
	}

	function next() {
		<?php if(empty($next)): ?>alert('没有下一个');
		<?php else: ?>
		window.location.href = "<?php echo U('read','id='.$next.'&list='.$list);?>";<?php endif; ?>
	}

	function prev() {
		<?php if(empty($prev)): ?>alert('没有上一个');
		<?php else: ?>
		window.location.href = "<?php echo U('read','id='.$prev.'&list='.$list);?>";<?php endif; ?>
	}

	$(function() {
		$("#slider-range-priority").slider({
			range : "min",
			min : 1,
			max : 5,
			value : "<?php echo ($vo["priority"]); ?>",
			slide : function(event, ui) {
				$("#priority").val(ui.value);
				$("div.slider_box div.ui-slider").css("background-color", schedule_bg(ui.value));
				$("div.slider_box div.ui-widget-header").css("background-color", schedule_bg(ui.value));
			}
		});
		$("div.slider_box div.ui-slider").css("background-color", schedule_bg("<?php echo ($vo["priority"]); ?>"));
		$("div.slider_box div.ui-widget-header").css("background-color", schedule_bg("<?php echo ($vo["priority"]); ?>"));
	});

	$(document).ready(function() {
		fill_time("start_time");
		fill_time("end_time");
		show_content();
	}); 
</script>

	</head>
	<body>
		<div class="swiper-container">
			<div class="swiper-scrollbar"></div>
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="container popup">
						
<?php echo W('PageHeader',array('name'=>$vo['name'],'search'=>'N'));?>
<div class="operate panel panel-default">
	<div class="panel-body">
		<div class="pull-left">
			<a onclick="prev();" class="btn btn-sm btn-primary">上一个</a>
			<a onclick="next();" class="btn btn-sm btn-primary">下一个</a>
		</div>
		<div class="pull-right">
			<a onclick="del();" class="btn btn-sm btn-danger">删除</a>
			<a onclick="edit();" class="btn btn-sm btn-primary">编辑</a>
			<a onclick="myclose();" class="btn btn-sm btn-primary">关闭</a>
		</div>
	</div>
</div>
<form class="form-horizontal well" method='post' id="form_data" name="form_data" enctype="multipart/form-data">
	<input type="hidden" id="ajax" name="ajax" value="0">
	<input type="hidden" id="add_file" name="add_file">
	<div class="form-group col-xs-6">
		<label class="col-xs-4 control-label" >开始:</label>
		<div class="col-xs-8">
			<p class="form-control-static">
				<?php echo ($vo["start_date"]); ?>&nbsp;<?php echo (fix_time($vo["start_time"])); ?>
			</p>
		</div>
	</div>
	<div class="form-group col-xs-6">
		<label class="col-xs-4 control-label" for="name">结束:</label>
		<div class="col-xs-8">
			<p class="form-control-static">
				<?php echo ($vo["end_date"]); ?>&nbsp;<?php echo (fix_time($vo["end_time"])); ?>
			</p>
		</div>
	</div>
	<div class="form-group col-xs-6">
		<label class="col-xs-4 control-label" for="name">地点:</label>
		<div class="col-xs-8">
			<p class="form-control-static">
				<?php echo ($vo["location"]); ?>
			</p>
		</div>
	</div>
	<div class="form-group col-xs-6">
		<label class="col-xs-4 control-label" for="name">优先级:</label>
		<div class="col-xs-8">
			<div class="form-control-static" >
				<input type="hidden" id="priority" name="priority"/>
				<div  class="slider_box" >
					<div class="left" >
						低
					</div>
					<div id="slider-range-priority"></div>
					<div class="right" >
						高
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="name">参与人员:</label>
		<div class="col-xs-10">
			<p class="form-control-static">
				<?php echo (show_contact($vo["actor"])); ?>
			</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="name">附件:</label>
		<div class="col-xs-10">
			<?php echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'show'));?>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-group">
		<div class="col-xs-12">
			<div class="content_wrap" >
				<iframe class="content_iframe"></iframe>
				<textarea  class="content" name="content" style="display:none;"><?php echo ($vo["content"]); ?></textarea>
			</div>
		</div>

	</div>
</form>


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