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
              <a class="navbar-brand" href="index.php"><?php echo get_system_config("SYSTEM_NAME");?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  
                  <!-- <li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 贷款审批 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                         <!-- <li><a href="#" url="<?php echo U('flow/adddai');?>"  node="" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 添加贷款审批</a></li>
                         <li><a href="#" url="index.php?m=flow&a=add1&type=45"  node="" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 客户填写贷款申请单</a></li>
                          <li><a href="#" url="<?php echo U('flow/khdai');?>"  node="224" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 信贷员受理贷款</a></li>
                      <li><a href="#" url="<?php echo U('flow/folderdai');?>" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 贷中</a></li>

                     <li><a href="#" url="index.php?m=flow&a=editdai&id=6" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看step</a></li> 
                      <li><a href="#" url="index.php?m=flow&a=dai&id=48" node="224" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看（测试）</a></li>

                    </ul>
                  </li> -->

	                  <li class="active"><a href="#" url="<?php echo U('home/index');?>"  node="224" onclick="click_top_menu(this)"> <i class="fa fa-home"></i> 概览</a></li>
					  
                <li><a href="#" url="<?php echo U('flow/khdai');?>"  node="224" onclick="click_top_menu(this)"> <i class="fa fa-check-square-o"></i> 贷款审批</a></li>
                <li><a href="#" url="<?php echo U('flow/index');?>" node="87" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 工作流程</a></li>
                <li class=""><a href="#" url="<?php echo U('flow/customer');?>" node="137" onclick="click_top_menu(this)"> <i class="fa fa-users"></i> 客户管理</a></li>
                <!-- <li  class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 客户管理 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?m=customer&a=add&dai=48">添加客户</a></li>
                    <li><a href="#" url="index.php?m=customer&amp;a=index" node="137" onclick="click_top_menu(this)">客户管理</a></li>
                  </ul>
                </li> -->
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
                    <li><a href="<?php echo U('user_config/index');?>">设置通知</a></li>
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
				<div class="row">
				    <div class="col-sm-2  hidden-print">
				<div class="sidebar" id="sidebar">	
					
					<div id="nav_head" class="text-center"  onclick="toggle_left_menu()">
						<span class="menu-text"><?php echo ($top_menu_name); ?></span>
						<b id="left_menu_icon" class="fa fa-angle-down pull-right"></b>
					</div>
					<?php echo W('Nav',array('tree'=>$left_menu,'new_count'=>$new_count));?>
				</div>
					
				    </div>
				    <div class="col-sm-10">

								<div class="main-content"  style="min-width:800px;max-width:1020px;float:left;">
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
									<div class="operate panel panel-default">
					<div class="panel-body">
	
										<div class="row0">
											<div class="col-xs-12">
												<!-- PAGE CONTENT BEGINS -->
													
<?php echo W('PageHeader',array('name'=>'权限组管理','search'=>'N'));?>
<form id="form_search" name="form_search" method="post" action="">
	<div class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-left">
				<select name="eq_pid" id="eq_pid" class="form-control col-10" onchange="submit_search();">
					<?php echo fill_option($groupList);?>
				</select>
			</div>
			<div class="pull-right">
				<a onclick="save()" class="btn btn-sm btn-primary">保存</a>
			</div>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-sm-4 role_list">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>名称</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($data["id"]); ?>">
						<td><?php echo ($data["name"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
	<div class="col-sm-8 wrap">
		<form id="form_data" method="post" action="">
			<input type="hidden" name="ajax" id="ajax" value="1">
			<input type="hidden" name="role_id" id="role_id">
			<input type="hidden" name="org_node_list" id="org_node_list">
			<input type="hidden" name="node_list" id="node_list">
			<div class="wrap tree_menu">
				<table class="table table-bordered">
					<tr>
						<th style="width:55%;text-align:center">菜单</th>
						<th style="width:15%;text-align:center">读取</th>
						<th style="width:15%;text-align:center">修改</th>
						<th style="width:15%;text-align:center">管理</th>
					</tr>
					<?php if(is_array($node_list)): $i = 0; $__LIST__ = $node_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
							<td><label>
								<input class="ace" type="checkbox"  name="node_id"  value="<?php echo ($data["id"]); ?>" />
								<span class="lbl level<?php echo ($data["level"]); ?>">&nbsp;<?php echo ($data["name"]); ?></span></label></td>
							<?php if(strpos($data['url'],'/index')||strpos($data['url'],'##')!==false): ?><td class="text-center"><label class="inline">
									<input class="ace" type="checkbox" name="read[]" value="<?php echo ($data["id"]); ?>" />
									<span class="lbl"></span></label></td>
								<td class="text-center"><label class="inline">
									<input class="ace" type="checkbox" name="write[]" value="<?php echo ($data["id"]); ?>"/>
									<span class="lbl"></span></label></td>
								<td class="text-center"><label class="inline">
									<input class="ace" type="checkbox" name="admin[]" value="<?php echo ($data["id"]); ?>"/>
									<span class="lbl"></span></label></td>
								<?php else: ?>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td><?php endif; ?>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
			</div>
		</form>
	</div>
</div>
												<!-- PAGE CONTENT ENDS -->
											</div><!-- /.col -->
										</div><!-- /.row -->
										</div>
										</div>
									</div><!-- /.page-content -->
								</div><!-- /.main-content -->
				    </div>
				</div>
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
	function save() {
		$("#node_list").val('');
		$(".wrap .tree_menu input[name='node_id']:checked").each(function() {
			$("#node_list").val($("#node_list").val() + $(this).val() + ",");
		});
		sendForm("form_data", "<?php echo U('set_node');?>");
	};

	function showdata(result) {
		$(".wrap .tree_menu input").each(function() {
			$(this).prop("checked", false);
			//$(this).parents("td").removeClass("active");
		});
		for (var s in result.data) {
			$(".wrap .tree_menu input[name='node_id'][value=" + result.data[s].node_id + "]").prop("checked", "true");
			//$(".wrap .tree_menu input[name='node_id'][value=" + result.data[s].node_id + "]").parents("td").addClass("active");

			if (result.data[s].admin == 1) {
				$(".wrap .tree_menu input[name='admin[]'][value=" + result.data[s].node_id + "]").prop("checked", "true");
				//$(".wrap .tree_menu input[name='admin[]'][value=" + result.data[s].node_id + "]").parents("td").addClass("active");
			}
			if (result.data[s].write == 1) {
				$(".wrap .tree_menu input[name='write[]'][value=" + result.data[s].node_id + "]").prop("checked", "true");
				//$(".wrap .tree_menu input[name='write[]'][value=" + result.data[s].node_id + "]").parents("td").addClass("active");
			}
			if (result.data[s].read == 1) {
				$(".wrap .tree_menu input[name='read[]'][value=" + result.data[s].node_id + "]").prop("checked", "true");
				//$(".wrap .tree_menu input[name='read[]'][value=" + result.data[s].node_id + "]").parents("td").addClass("active");
			}
		};
		$("#org_node_list").val('');
		$(".wrap .tree_menu input[name='node_id']:checked").each(function() {;
			$("#org_node_list").val($("#org_node_list").val() + $(this).val() + ",");
		});
		$("#opmode").val("edit");
	};

	$(document).ready(function() {
		set_return_url();
		set_val('eq_pid', '<?php echo ($eq_pid); ?>');
		$(".role_list tbody tr").click(function() {
			$(".role_list  tr").removeClass("active");
			$(this).attr("class", "active");
			$("#role_id").val($(this).attr("id"));
			sendAjax("<?php echo U('get_node_list');?>", "role_id=" + $(this).attr("id"), function(data) {
				showdata(data);
			});
			return false;
		});
	}); 
</script>
<!-- inline scripts related to this page -->
</body>
</html>