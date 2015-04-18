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
	<nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation" style="background-color: #222;">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><?php echo get_system_config("SYSTEM_NAME");?>流程审批系统</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  
                  <li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 贷款审批 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                         <!-- <li><a href="#" url="<?php echo U('flow/adddai');?>"  node="" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 添加贷款审批</a></li> -->
                         <li><a href="#" url="index.php?m=flow&a=add1&type=45"  node="" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 客户填写贷款申请单</a></li>
                          <li><a href="#" url="<?php echo U('flow/khdai');?>"  node="224" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 信贷员受理贷款</a></li>
                      <li><a href="#" url="<?php echo U('flow/folderdai');?>" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 贷中</a></li>

                      <!-- <li><a href="#" url="http://localhost/liucheng/index.php?m=flow&a=editdai&id=6" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看step</a></li> -->


                      <li><a href="#" url="index.php?m=flow&a=dai&id=6" node="224" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看（测试）</a></li>
                      
                  
                    </ul>
                  </li>
                  
                  
                <li class="active"><a href="#" url="<?php echo U('flow/index');?>" node="87" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 工作流程</a></li>
                <li  class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 客户管理 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">贷中</a></li>
                    <li><a href="#">已贷</a></li>
                    <li><a href="#" url="index.php?m=customer&amp;a=index" node="137" onclick="click_top_menu(this)">客户管理</a></li>
                  
                  </ul>
                </li>
              </ul> 
              
             
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" url="<?php echo U('user/index');?>" node="84" onclick="click_top_menu(this)">
						<?php echo (session('user_name')); ?>													
				</a> </li>
                <li><a href="<?php echo U('login/logout');?>" ><i class="fa fa-sign-out bigger-100"></i>退出</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo U('profile/index');?>">修改基本资料</a></li>
                    <li><a href="<?php echo U('profile/password');?>">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('profile/user_config');?>">设置通知</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        
    
    	<?php if(($showsend) == "1"): ?><a class="btn btn-app app-nav btn-xs nav-app addtj" href="#"  onclick="save(20);">
    	<i class="fa fa-envelope-o bc-mail bigger-100"></i>
        提交																
    				</a>
    <a class="btn btn-app app-nav btn-xs nav-app addtj" href="#"  onclick="popup_confirm();">
    	<i class="fa fa-plus-circle bc-mail bigger-100"></i>
        添加关卡														
    				</a><?php endif; ?>
        
            <!-- 发送，添加关卡，仅发起可见 -->
                
<nav class="navbar navbar-default " role="navigation"  style="display:none !important">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" style="
    width: 200px;
">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-6">
			<span class="sr-only">Toggle navigation</span>
			<i class="fa fa-bars fa-lg"></i>
      </button>
		  <div class="hidden-xs">&nbsp;</div>
          <a  url="/liucheng/index.php?m=flow&amp;a=index" node="87" onclick="click_top_menu(this)"  class="navbar-brand"><?php echo get_system_config("SYSTEM_NAME");?></a>
         	
				<a href="#" url="<?php echo U('user/index');?>" node="84" onclick="click_top_menu(this)">
						<?php echo (session('user_name')); ?>													
				</a>  <a href="<?php echo U('login/logout');?>" ><i class="fa fa-sign-out bigger-100"></i>退出</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        

     
                        
        <div class="collapse navbar-collapse" id="navbar-collapse-6">
          <ul class="nav navbar-nav navbar-right" >
				<?php if(is_array($top_menu)): foreach($top_menu as $key=>$top_menu_vo): ?><a class="btn btn-app app-nav btn-xs nav-app"  href="#" url="<?php echo U($top_menu_vo['url']);?>" node="<?php echo ($top_menu_vo["id"]); ?>" onclick="click_top_menu(this)" >
					<i class="<?php echo ($top_menu_vo["icon"]); ?> bigger-100"></i><?php echo ($top_menu_vo["name"]); ?>
					<?php $bc_class=""; $module_count=0; $icon_class=$top_menu_vo['icon']; if(strpos($icon_class,"bc-")!==false){ $bc_class=get_bc_class($icon_class); $module_count=array_sum($new_count[$bc_class]); if($module_count>99){ $module_count="99+"; } if($module_count==0){ $module_count=null; } } ?>
						<?php if(!empty($module_count)): ?><span class="badge badge-pink"><?php echo ($module_count); ?></span><?php endif; ?>					
				</a>&nbsp;&nbsp;<?php endforeach; endif; ?><a class="btn btn-app btn-xs btn-danger" style="margin-top:15px;margin-bottom:20px;margin-left:7px;margin-right:10px;" href="<?php echo U('login/logout');?>" ><i class="fa fa-sign-out bigger-100"></i>退出</a>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
		<div class="main-container" id="main-container" style="margin-top:60px">
			<div class="main-container-inner">
				<div class="sidebar" id="sidebar">	
					
					<div id="nav_head" class="text-center hidden"  onclick="toggle_left_menu()" style="display:">
						<span class="menu-text"><?php echo ($top_menu_name); ?></span>
						<b id="left_menu_icon" class="fa fa-angle-down pull-right"></b>
					</div>
					<?php echo W('Nav',array('tree'=>$left_menu,'new_count'=>$new_count));?>
				</div>
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs" style="display:none">
						<ul class="breadcrumb">
							<li>
								<i class="fa fa-home home-icon"></i>
								<a href="/"  style="display:none">Home</a>
							</li>

							<li>
								<?php echo ($top_menu_name); ?>
							</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content  <?php echo (MODULE_NAME); ?>">
					<div class="operate panel panel-default" style="max-width:1000px;margin:auto;">
	<div class="panel-body">
	
						<div class="row0">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
<?php echo W('PageHeader',array('name'=>'记账明细','search'=>'M'));?>
<form method="post" name="form_adv_search" id="form_adv_search">
	<div class="adv_search panel panel-default  display-none"  id="adv_search">
		<div class="panel-heading">
			<div class="row">
				<h4 class="col-xs-6">高级搜索</h4>
				<div class="col-xs-6 text-right">
					<a  class="btn btn-sm btn-info" onclick="submit_adv_search();">搜索</a>
					<a  class="btn btn-sm " onclick="close_adv_search();">关闭</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_name">项目名称：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_name" name="li_name" >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_content">项目内容：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_content" name="li_content" >
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_level">项目级别：</label>
				<div class="col-sm-8">
					<select id="eq_level" name="eq_level" class="form-control">
						<option value="">请选择</option>
						<?php echo fill_option(get_system_config("XMK_LEVEL"));?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_status">项目状态：</label>
				<div class="col-sm-8">
					<select id="eq_status" name="eq_status" class="form-control">
						<option value="">请选择</option>
						<?php echo fill_option(get_system_config("XMK_STATUS"));?>
					</select>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="space-8"></div>
<?php if($auth['write']): ?><div class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-right">
				<a class="btn btn-sm btn-primary" onclick="add_income()">记收入</a>
				<a class="btn btn-sm btn-primary" onclick="add_payment()">记支出</a>
				<a class="btn btn-sm btn-primary" onclick="add_transfer()">记转账</a>
			</div>
		</div>
	</div><?php endif; ?>
<div class="ul_table">
	<ul>
		<li class="thead">
			<span class="col-8 text-center">单据编号</span>
			<span class="col-8 text-center">日期</span>
			<div class="pull-right">
				<span class="col-8 text-center">账户</span>
				<span class="col-10 text-center">收入</span>
				<span class="col-10 text-center">支出</span>
				<span class="col-10 text-center">合计</span>
				<span class="col-15 text-center">类别</span>
				<span class="col-15  text-center">客户/供应商</span>
				<span class="col-9  text-center">经办</span>
				<span class="col-9  text-center">录入</span>
			</div>
			<span class="auto autocut">摘要 </span>
		</li>
		<?php if(empty($list)): ?><li class="no-data">
				没找到数据
			</li>
			<?php else: ?>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="tbody data_item">
					<span class="col-8 text-center"><?php echo ($vo["doc_no"]); ?></span>
					<span class="col-8 text-center"><?php echo ($vo["input_date"]); ?></span>
					<div class="pull-right">
						<span class="col-8 text-center"><?php echo ($vo["account_name"]); ?></span>
						<span class="col-10 text-right data data_1"><?php echo (($vo["income"])?($vo["income"]):0); ?></span>
						<span class="col-10 text-right data data_2"><?php echo (($vo["payment"])?($vo["payment"]):0); ?></span>
						<span class="col-10 text-right data data_3"><?php echo (($vo['income']-$vo['payment'])?($vo['income']-$vo['payment']):0); ?></span>
						<span class="col-15 text-center"><?php echo ($vo["type"]); ?>&nbsp;</span>
						<span class="col-15 text-center"><?php echo ($vo["partner"]); ?>&nbsp;</span>
						<span class="col-9 text-center"><?php echo ($vo["actor_user_name"]); ?></span>
						<span class="col-9 text-center"><?php echo ($vo["user_name"]); ?></span>
					</div>
					<span class="auto autocut"><?php echo ($vo["remark"]); ?> </span>
				</li><?php endforeach; endif; ?>
			<li class="tbody data_total">
				<span class="col-8 text-center">合计</span>
				<span class="col-18 text-center">&nbsp;</span>
				<div class="pull-right">
					<span class="col-10 text-right data data_1"></span>
					<span class="col-10 text-right data data_2"></span>
					<span class="col-10 text-right data data_3"></span>
					<span class="col-40 text-center">&nbsp;</span>
					<span class="col-8 text-center">&nbsp;</span>
				</div>
			</li>
			<div class="pagination">
				<?php echo ($page); ?>
			</div><?php endif; ?>
	</ul>
</div>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						</div>
						</div>
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse hidden-print">
				<i class="fa fa-double-angle-up fa-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
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
	$(document).ready(function() {
		set_return_url();
		total_init();
	});

	function total_init() {
		for (var i = 1; i < 11; i++) {
			total = 0;
			item_selecter = ".data_item .data_" + i;

			$(item_selecter).each(function() {
				total = dec_add(total, $(this).text());
			});
			total_selecter = ".data_total .data_" + i;
			$(total_selecter).text(total);
		}
		$(".ul_table .data").each(function() {
			$(this).text(formatMoney($(this).text()));
		});
	}
	
	function dec_add(num1, num2) {
		var reg = /\./i;
		if (!reg.test(num1) && !reg.test(num2)) {
			return parseInt(num1) + parseInt(num2);
		}
		var r1 = 0, r2 = 0, m;
		var str1 = num1.toString(), str2 = num2.toString();
		if (str1.indexOf('.') > -1) {
			r1 = str1.split('.')[1].length;
		}
		if (str2.indexOf('.') > -1) {
			r2 = str2.split('.')[1].length;
		}
		m = Math.pow(10, Math.max(r1, r2));
		return (dec_mul(num1, m) + dec_mul(num2, m)) / m;
	}

	function formatMoney(numStr, separator) {
		s = numStr;
		if (/[^0-9\.\-]/.test(s))
			return "　";
		s = s.replace(/^(-)?(\d*)$/, "$1$2.");
		s = (s + "00").replace(/(-)?(\d*\.\d\d)\d*/, "$1$2");
		s = s.replace(".", ",");
		var re = /(\d)(\d{3},)/;
		while (re.test(s))
		s = s.replace(re, "$1,$2");
		s = s.replace(/,(\d\d)$/, ".$1");
		return s.replace(/^\./, "0.");
	}

	function formatQty(numStr, separator) {
		s = numStr;
		if (/[^0-9\.\-]/.test(s))
			return "　";
		s = s.replace(/^(-)?(\d*)$/, "$1$2.");
		s = (s + "00").replace(/(-)?(\d*\.\d\d)\d*/, "$1$2");
		s = s.replace(".", ",");
		var re = /(\d)(\d{3},)/;
		while (re.test(s))
		s = s.replace(re, "$1,$2");
		s = s.replace(/,(\d\d)$/, ".$1");
		s = s.replace(/^\./, "0.");
		if (s.split(".")[1] == "00")
			s = s.split(".")[0];
		return s;
	}
	
	function add_income() {
		window.open("<?php echo U('add_income');?>", "_self");
	}

	function add_payment() {
		window.open("<?php echo U('add_payment');?>", "_self");
	}

	function add_transfer() {
		window.open("<?php echo U('add_transfer');?>", "_self");
	}
</script>
<!-- inline scripts related to this page -->
</body>
</html>