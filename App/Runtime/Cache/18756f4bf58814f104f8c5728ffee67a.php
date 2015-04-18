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
	<div class="shade"></div>

<?php echo W('PageHeader',array('name'=>array('编辑客户：',$vo['name']),'search'=>'N'));?>

<form method='post' id="form_data" class="well form-horizontal">
	<input type="hidden" name="opmode" value="edit">
	<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
	<input type="hidden" name="ajax" id="ajax" value="1">
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="name">公司名称*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="name" name="name" check="require" msg="请输入姓名" value="<?php echo ($vo["name"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="short">公司简称：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="short" name="short" value="<?php echo ($vo["short"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="biz_license">证件号码*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="biz_license" name="biz_license" check="require" msg="请输入证件号码" value="<?php echo ($vo["biz_license"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="payment">付款方式：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="payment" name="payment" value="<?php echo ($vo["payment"]); ?>">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="address">地址：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="address" name="address" value="<?php echo ($vo["address"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="salesman">业务员：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="salesman" name="salesman" value="<?php echo ($vo["salesman"]); ?>">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="contact">联系人*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="contact" name="contact" check="require" msg="请输入联系人" value="<?php echo ($vo["contact"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="email">邮件*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="email" name="email" check="require" msg="请输入邮件地址" value="<?php echo ($vo["email"]); ?>" >
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="office_tel">办公电话*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="office_tel" name="office_tel"  check="require" msg="请输入办公电话" value="<?php echo ($vo["office_tel"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="mobile_tel">手机：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="mobile_tel" name="mobile_tel" value="<?php echo ($vo["mobile_tel"]); ?>">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="fax">传真：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="fax" name="fax" value="<?php echo ($vo["fax"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="im">即时聊天：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="im" name="im" value="<?php echo ($vo["im"]); ?>">
		</div>
	</div>

	<div class="form-group col-xs-12">
		<label class="col-sm-2 control-label" for="remark" >其他：</label>
		<div class="col-sm-9" >
			<textarea class="form-control" name="remark" rows="5" class="col-xs-12" ><?php echo ($vo["remark"]); ?></textarea>
		</div>
	</div>
	<div class="action">
		<input  class="btn btn-lg btn-default" type="button" value="取消" onclick="go_return_url();">
		<input class="btn btn-lg btn-success" type="button" value="保存" onclick="save();">
	</div>
</form>
	<div id="push_msg"></div>
	<iframe src="<?php echo U('push/client2');?>" class="push" id="push"></iframe>
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
    });
	$('.input-datem').datetimepicker({
  format: "yyyy-m",
  showMeridian: true,
  language: 'zh-CN',
  weekStart: 1,
 startView: 'decade', //初始页面
minView: 'year', //精确度
  pickerPosition:'bottom-right',
    autoclose: true,
    todayBtn: "linked"
});
	$('.input-dated').datetimepicker({
  format: "yyyy-m-d",
  showMeridian: true,
  language: 'zh-CN',
  weekStart: 1,
minView: 'month', //精确度
  pickerPosition:'bottom-right',
    autoclose: true,
    todayBtn: "linked"
});<?php endif; ?>

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
	function save() {
		if (check_form("form_data")) {
			sendForm("form_data", "<?php echo U('save');?>");
		}
	}
</script>
<!-- inline scripts related to this page -->
</body>
</html>