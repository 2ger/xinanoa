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
													
<?php echo W('PageHeader',array('name'=>array($flow_type['name']),'search'=>'N'));?>
	<style type="text/css" media="screen">
	.submitform,#pickfiles{display:none;}
	.well .form-group select, .well .form-group textarea, .well .form-group input[type="text"], .well .form-group input[type="password"], .well .form-group input[type="datetime"], .well .form-group input[type="datetime-local"], .well .form-group input[type="date"], .well .form-group input[type="month"], .well .form-group input[type="time"], .well .form-group input[type="week"], .well .form-group input[type="number"], .well .form-group input[type="email"], .well .form-group input[type="url"], .well .form-group input[type="search"], .well .form-group input[type="tel"], .well .form-group input[type="color"]{
		border:none !important;
		background: transparent;
		border-bottom:1px solid #ccc !important;}
	</style>
<div class="operate panel panel-default hidden-print">
	<div class="panel-body">
		<div class="pull-left">
			<a onclick="go_return_url();" class="btn btn-sm btn-primary">返回</a>
		<?php if(($c) != "1"): ?><a href="#flow_status"  class="btn btn-sm btn-primary">审批情况</a>
			<?php if(!empty($to_confirm)): ?><a href="#confirm"  class="btn btn-sm btn-primary">办理意见</a><?php endif; endif; ?>
		</div>
		<div class="pull-right">
			<a onclick="winprint();" class="btn btn-sm btn-primary">打印</a>
			<?php if(($is_edit) == "1"): ?><a onclick="save();" class="btn btn-sm btn-primary">保存</a><?php endif; ?>
		</div>
	</div>
</div>
	
<form method='post' id="form_data" name="form_data" enctype="multipart/form-data"  class="well form-horizontal">
	<input type="hidden" id="ajax" name="ajax" value="0">
	<input type="hidden" id="opmode" name="opmode" value="edit">
	<input type="hidden" id="name" name="name" value="<?php echo ($vo["name"]); ?>">
	<input type="hidden" id="id" name="id" value="<?php echo ($vo["id"]); ?>">
	
	<?php if(($c) == "1"): ?><div class="text-center">
		<a href="index.php?m=flow&a=dai&id=<?php echo ($vo["dai"]); ?>" target="_blank"  class="btn btn-success btn-lg">查看贷款流程</a>
		<a href="index.php?m=flow&a=timeline&id=<?php echo ($vo["dai"]); ?>" target="_blank"  class="btn btn-primary btn-lg pul">查看时间轴</a>
			
		</div><!-- .text-center --><?php endif; ?>
	<?php if(($c) != "1"): ?><div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" >文件编号：</label>
		<div class="col-sm-8">
			<p class="form-control-static">
				<?php echo ($vo["doc_no"]); ?>
			</p>
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" >日期：</label>
		<div class="col-sm-8">
			<p class="form-control-static">
				<?php echo (todate($vo["create_time"],'Y-m-d')); ?>
			</p>
		</div>
	</div>

	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" >填写人：</label>
		<div class="col-sm-8">
			<p class="form-control-static">
				<?php echo ($vo["user_name"]); ?>
			</p>
		</div>
	</div>

	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" >部门：</label>
		<div class="col-sm-8">
			<p class="form-control-static">
				<?php echo ($vo["dept_name"]); ?>
			</p>
		</div>
	</div>


		
		
	<div class="form-group  col-xs-12 hidden">
		<label class="col-sm-2 control-label" >审批：</label>
		<div class="col-sm-10">
			<p id="confirm_wrap" class="form-control-static">
				<?php echo ($vo["confirm_name"]); ?>
			</p>
		</div>
	</div>

	<div class="form-group col-xs-12 hidden">
		<label class="col-sm-2 control-label" >协商：</label>
		<div class="col-sm-10">
			<p id="consult_wrap" class="form-control-static address_list">
				<?php echo ($vo["consult_name"]); ?>
			</p>
		</div>
	</div>
	<div class="form-group col-xs-12 hidden">
		<label class="col-sm-2 control-label" >抄送：</label>
		<div class="col-sm-10">
			<p id="refer_wrap" class="form-control-static address_list">
				<?php echo ($vo["refer_name"]); ?>
			</p>
		</div>
	</div>
	
	
	<div class="clearfix">
		
	</div><!-- .clearfix -->
	<div class="alert alert-info alert-dismissable hidden-print">
		    <button type="button" class="close" data-dismiss="alert" 
		       aria-hidden="true">
		       &times;
		    </button>

			<div class="flowto">
				<strong> 流程走向图: </strong>
		<span data="dgp_13_5" id="dgp_13_5"><nobr><b>发起流程</b></nobr><b><i class="fa fa-arrow-right"></i></b></span>
			<?php echo ($vo["confirm_name"]); ?>
			<?php if(($flow_type["refer_name"]) != ""): ?><span data="dgp_13_5" id="dgp_13_5"><b><i class="fa fa-arrow-right"></i></b><nobr><b>抄送</b></nobr><b><i class="fa fa-arrow-right"></i></b></span>
			<?php echo ($vo["refer_name"]); endif; ?>
			<style type="text/css" media="screen">
				.flowto span nobr{padding:5px;
					    border: solid;
				    border-radius: 10px;}
					.flowto span nobr:hover{
					    border: dotted;
					    background: #fff;
					    }
					.flowto .fa-times{display:none;}
					.flowto .fa-arrow-right{margin: 0 10px;font-size: 24px;}
			</style>
			</div><!-- .flowto -->
			</div><?php endif; ?>
	
	
	<?php if(($vo["type"]) == "62"): ?><div class="baoxiao ">
		
			 <div class="clearfix"></div>
			<div class="blocktitle title-primary  flow_field_426">
			  <div style="background:">已核准的出差申请单</div>
			</div>
			<div class="alert alert-info">
		
				<div class="form-group col-sm-6">
	
						<label class="col-sm-4 control-label" for="field_出差类别">出差类别</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php  if(get_flow_field($from,474,550) ==2){ echo "出差"; }else{ echo "外勤"; } ?>
									</p>
								</div>
					</div>	<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label" for="field_交通工具">交通工具</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php  switch (get_flow_field($from,475,551)) { case "2": echo "火车"; break; case "3": echo "高铁"; break; case "4": echo "动车"; break; case "5": echo "汽车"; break; case "6": echo "飞机"; break; case "7": echo "轮船"; break; default: echo "未填写"; } ?>
									</p>
								</div>
					</div>	<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label" for="field_出发地">出发地</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php echo get_flow_field($from,478,554);?>
									</p>
								</div>
					</div>	<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label" for="field_目的地">目的地</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php echo get_flow_field($from,479,555);?>
									</p>
								</div>
					</div>	<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label" for="field_出发时间">出发时间</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php echo get_flow_field($from,476,552);?>
									</p>
								</div>
					</div>	<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label" for="field_至">至</label>
					<div class="col-sm-8">
						<p class="form-control-static address_list">
							<?php echo get_flow_field($from,477,553);?>
								</p>
							</div>
					</div>	<div class="form-group clearfix">
						<label class="col-sm-2 control-label" for="field_事由说明">事由说明</label>
						<div class="col-sm-8">
							<p class="form-control-static address_list">
								<?php echo get_flow_field($from,480,556);?>
									</p>
								</div>
					</div>
			
			</div><!-- .alert alert-info -->
		</div><!-- .baoxiao --><?php endif; ?>
	
	<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field_vo): $mod = ($i % 2 );++$i; echo W('FlowField',$field_vo); endforeach; endif; else: echo "" ;endif; ?>
	
	<?php if(($is_edit) != "2"): ?><div class="form-group"  style="display:none">
			<label class="col-sm-2 control-label" for="is_edit"> </label>
                <div class="col-xs-10">
				<?php if(($is_edit) == "0"): ?><div class="content_wrap">
						<iframe class="content_iframe"></iframe>
						<textarea class="content display-none"  name="content" style="width:100%;height:300px;" ><?php echo ($vo["content"]); ?></textarea>
					</div><?php endif; ?>				
				<?php if(($is_edit) == "1"): ?><textarea class="editor content display-none"  name="content" style="width:100%;height:300px;" ><?php echo ($vo["content"]); ?></textarea>
					<eq>
			</div>
		</div><?php endif; ?>
	<?php if(!empty($vo["add_file"])): ?><div class="form-group">
			<label class="col-sm-2 control-label" >附件：</label>
			<div class="col-sm-10">
				<eq name="is_edit" value="1">
					<?php echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'show')); endif; ?>
				<?php if(($is_edit) == "1"): echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'edit')); endif; ?>
			</div>
		</div><?php endif; ?>
	<div class="clearfix"></div>
</form>

<?php if(($c) != "1"): ?><a id="flow_status"></a>
<?php echo W('PageHeader',array('name'=>'审批情况','search'=>'N'));?>
<div class="ul_table border-bottom">
	<ul>
		<li class="thead">
			<span class="col-9 text-center">类型</span>
			<span class="col-9 text-center">审批人</span>
			<span class="col-9 text-center">日期</span>
			<span class="col-9 text-center">结果</span>
			<span class="auto">意见</span>
		</li>
		<?php if(is_array($flow_log)): $i = 0; $__LIST__ = $flow_log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="tbody">
				<span style="width:90px;" class="text-center"><?php echo (show_step_type($item["step"])); ?></span>
				<span style="width:90px;" class="text-center"><?php echo ($item["user_name"]); ?></span>
				<span style="width:90px;" class="text-center"><?php echo (todate($item["create_time"],'Y-m-d')); ?></span>
				<span style="width:90px;" class="text-center"><?php echo (show_result($item["result"])); ?></span>
				<span class="auto">
					<div style="overflow:hidden">
						<?php echo ($item["comment"]); ?>
					</div> </span>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>

<?php if(!empty($to_confirm)): ?><a id="confirm"></a>
	<?php echo W('PageHeader',array('name'=>'办理意见','search'=>'N'));?>
	<form method="post" action="" name="form_confirm" id="form_confirm">
		<input type="hidden" name="id" value="<?php echo ($to_confirm["id"]); ?>">
		<input type="hidden" name="flow_id" value="<?php echo ($vo["id"]); ?>">
		<input type="hidden" name="step" value="<?php echo ($to_confirm["step"]); ?>">
		<div class="operate panel panel-default">
			<div class="panel-heading clearfix">
				<div class="pull-left">
					<a onclick="go_return_url();" class="btn btn-sm btn-primary">返回</a>
				</div>
				<div class="pull-right">
					<?php if(!empty($is_edit)): ?><div class="btn-group">
							<a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#">退回到<span class="fa fa-caret-down"></span> </a>
							<ul class="dropdown-menu col-5">
								<?php if(is_array($confirmed)): $i = 0; $__LIST__ = $confirmed;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="back_to('<?php echo ($vo["emp_no"]); ?>');">
										<a><?php echo ($vo["user_name"]); ?></a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								<li onclick="back_to('<?php echo ($emp_no); ?>');">
									<a><?php echo ($user_name); ?></a>
								</li>
							</ul>
						</div><?php endif; ?>
					<a onclick="reject();" class="btn btn-sm btn-danger">否决</a>
					|
					<a onclick="approve();" class="btn btn-sm btn-primary">同意</a>
				</div>
			</div>
			<div class="form-group panel-body">
				<label class="col-sm-2 control-label" >办理意见：</label>
				<div class="col-sm-10">
					<textarea name="comment" class="col-xs-12" style="height:120px"></textarea>
				</div>
			</div>
		</div>
	</form><?php endif; endif; ?>
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
	<!-- <div id="push_msg"></div>
	<iframe src="<?php echo U('push/client2');?>" class="push" id="push"></iframe> -->
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
	function approve() {
		sendForm("form_confirm", "<?php echo U('mark','action=approve');?>", "<?php echo U('read','id='.$vo['id']);?>");
	}

	function reject() {
		sendForm("form_confirm", "<?php echo U('mark','action=reject');?>", "<?php echo U('read','id='.$vo['id']);?>");
	}

	function back_to(emp_no) {
		sendForm("form_confirm", fix_url("<?php echo U('mark','action=back');?>?emp_no=" + emp_no), "<?php echo U('read','id='.$vo['id']);?>");
	}

	function save() {
		window.onbeforeunload = null;
		sendForm("form_data", "<?php echo U('save');?>");
	}

	function select_confirm() {
		winopen("<?php echo U('popup/confirm');?>", 730, 750);
	};

	$(document).ready(function(){
		set_return_url(document.location,1);
		$("#confirm span").on("dblclick", function() {
			$("#confirm span").last().find("b").remove();
		});
		$("#consult span").on("dblclick", function() {
			$("#consult span").last().find("b").remove();
		});
		show_content();		
	}); 
</script>
<!-- inline scripts related to this page -->
</body>
</html>