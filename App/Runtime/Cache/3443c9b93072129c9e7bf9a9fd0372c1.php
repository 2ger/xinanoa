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
													
<div id="cal">
	<div id="top" class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-left">
				<a id="panel" class="btn btn-sm btn-primary"></a>
				<a onclick="pushBtm('MU');" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
				<a onclick="pushBtm('MD');" class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></a>
				<a onclick="pushBtm('');" class="btn btn-sm btn-primary">今天</a>
				<input type="text" name="start_date" id="start_date" style="display:none">
				<input type="text" name="end_date" id="end_date" style="display:none">
			</div>
			<div class="pull-right">
				<a onclick="month_view();" class="btn btn-sm btn-primary">月视图</a>
				<a onclick="day_view();" class="btn btn-sm btn-primary">日视图</a>
				<a onclick="add();" class="btn btn-sm btn-primary">新建</a>
			</div>
		</div>
	</div>
	<form method="post" action="" name="CLD">
		<div style="display:none">
			<font>公历
				<select id="year" onchange=changeCld() name=SY>
					<script language=JavaScript>
						for ( i = 1900; i < 2050; i++)
							document.write('<option>' + i)
					</script>
				</select>年
				<select id="month" onchange=changeCld() name=SM>
					<script language=JavaScript>
						for ( i = 1; i < 13; i++)
							document.write('<option>' + i)
					</script>
				</select>月</font><font id="GZ"></font>
		</div>
		<div style="height:760px;">
			<div class="mv-container">
				<table class="mv-daynames-table" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<th title="周日" class="mv-dayname">周日</th>
							<th title="周一" class="mv-dayname">周一</th>
							<th title="周二" class="mv-dayname">周二</th>
							<th title="周三" class="mv-dayname">周三</th>
							<th title="周四" class="mv-dayname">周四</th>
							<th title="周五" class="mv-dayname">周五</th>
							<th title="周六" class="mv-dayname">周六</th>
						</tr>
					</tbody>
				</table>
				<div class="mv-event-container" id="mvEventContainer">
					<div class="month-row" style="top: 0%; height: 17.66%;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle   "><span class="left" id="SD0"></span><span class="pull-right hidden-xs" id="LD0"></span></td>
									<td class="st-dtitle  "><span class="left" id="SD1"></span><span class="pull-right hidden-xs" id="LD1"></span></td>
									<td class="st-dtitle  "><span class="left" id="SD2"></span><span class="pull-right hidden-xs" id="LD2"></span></td>
									<td class="st-dtitle  "><span class="left" id="SD3"></span><span class="pull-right hidden-xs" id="LD3"></span></td>
									<td class="st-dtitle "><span class="left" id="SD4"></span><span class="pull-right hidden-xs" id="LD4"></span></td>
									<td class="st-dtitle "><span class="left" id="SD5"></span><span class="pull-right hidden-xs" id="LD5"></span></td>
									<td class="st-dtitle "><span class="left" id="SD6"></span><span class="pull-right hidden-xs" id="LD6"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL0"></ul></td>
									<td class="st-c "><ul id="UL1"></ul></td>
									<td class="st-c "><ul id="UL2"></ul></td>
									<td class="st-c "><ul id="UL3"></ul></td>
									<td class="st-c "><ul id="UL4"></ul></td>
									<td class="st-c "><ul id="UL5"></ul></td>
									<td class="st-c "><ul id="UL6"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="month-row" style="top: 16.6%; height: 17.66%;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle "><span class="left" id="SD7"></span><span class="pull-right hidden-xs" id="LD7"></span></td>
									<td class="st-dtitle"><span class="left" id="SD8"></span><span class="pull-right hidden-xs" id="LD8"></span></td>
									<td class="st-dtitle"><span class="left" id="SD9"></span><span class="pull-right hidden-xs" id="LD9"></span></td>
									<td class="st-dtitle"><span class="left" id="SD10"></span><span class="pull-right hidden-xs" id="LD10"></span></td>
									<td class="st-dtitle"><span class="left" id="SD11"></span><span class="pull-right hidden-xs" id="LD11"></span></td>
									<td class="st-dtitle"><span class="left" id="SD12"></span><span class="pull-right hidden-xs" id="LD12"></span></td>
									<td class="st-dtitle"><span class="left" id="SD13"></span><span class="pull-right hidden-xs" id="LD13"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL7"></ul></td>
									<td class="st-c "><ul id="UL8"></ul></td>
									<td class="st-c "><ul id="UL9"></ul></td>
									<td class="st-c "><ul id="UL10"></ul></td>
									<td class="st-c "><ul id="UL11"></ul></td>
									<td class="st-c "><ul id="UL12"></ul></td>
									<td class="st-c "><ul id="UL13"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="month-row" style="top: 33.33%; height: 17.66%;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle "><span class="left" id="SD14"></span><span class="pull-right hidden-xs" id="LD14"></span></td>
									<td class="st-dtitle"><span class="left" id="SD15"></span><span class="pull-right hidden-xs" id="LD15"></span></td>
									<td class="st-dtitle"><span class="left" id="SD16"></span><span class="pull-right hidden-xs" id="LD16"></span></td>
									<td class="st-dtitle"><span class="left" id="SD17"></span><span class="pull-right hidden-xs" id="LD17"></span></td>
									<td class="st-dtitle"><span class="left" id="SD18"></span><span class="pull-right hidden-xs" id="LD18"></span></td>
									<td class="st-dtitle"><span class="left" id="SD19"></span><span class="pull-right hidden-xs" id="LD19"></span></td>
									<td class="st-dtitle"><span class="left" id="SD20"></span><span class="pull-right hidden-xs" id="LD20"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL14"></ul></td>
									<td class="st-c "><ul id="UL15"></ul></td>
									<td class="st-c "><ul id="UL16"></ul></td>
									<td class="st-c "><ul id="UL17"></ul></td>
									<td class="st-c "><ul id="UL18"></ul></td>
									<td class="st-c "><ul id="UL19"></ul></td>
									<td class="st-c "><ul id="UL20"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="month-row" style="top: 50%; height: 17.66%;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle "><span class="left" id="SD21"></span><span class="pull-right hidden-xs" id="LD21"></span></td>
									<td class="st-dtitle"><span class="left" id="SD22"></span><span class="pull-right hidden-xs" id="LD22"></span></td>
									<td class="st-dtitle"><span class="left" id="SD23"></span><span class="pull-right hidden-xs" id="LD23"></span></td>
									<td class="st-dtitle"><span class="left" id="SD24"></span><span class="pull-right hidden-xs" id="LD24"></span></td>
									<td class="st-dtitle"><span class="left" id="SD25"></span><span class="pull-right hidden-xs" id="LD25"></span></td>
									<td class="st-dtitle"><span class="left" id="SD26"></span><span class="pull-right hidden-xs" id="LD26"></span></td>
									<td class="st-dtitle"><span class="left" id="SD27"></span><span class="pull-right hidden-xs" id="LD27"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL21"></ul></td>
									<td class="st-c "><ul id="UL22"></ul></td>
									<td class="st-c "><ul id="UL23"></ul></td>
									<td class="st-c "><ul id="UL24"></ul></td>
									<td class="st-c "><ul id="UL25"></ul></td>
									<td class="st-c "><ul id="UL26"></ul></td>
									<td class="st-c "><ul id="UL27"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="month-row" style="top: 66.66%;height:17.66%;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle "><span class="left" id="SD28"></span><span class="pull-right hidden-xs" id="LD28"></span></td>
									<td class="st-dtitle"><span class="left" id="SD29"></span><span class="pull-right hidden-xs" id="LD29"></span></td>
									<td class="st-dtitle"><span class="left" id="SD30"></span><span class="pull-right hidden-xs" id="LD30"></span></td>
									<td class="st-dtitle"><span class="left" id="SD31"></span><span class="pull-right hidden-xs" id="LD31"></span></td>
									<td class="st-dtitle"><span class="left" id="SD32"></span><span class="pull-right hidden-xs" id="LD32"></span></td>
									<td class="st-dtitle"><span class="left" id="SD33"></span><span class="pull-right hidden-xs" id="LD33"></span></td>
									<td class="st-dtitle"><span class="left" id="SD34"></span><span class="pull-right hidden-xs" id="LD34"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL28"></ul></td>
									<td class="st-c "><ul id="UL29"></ul></td>
									<td class="st-c "><ul id="UL30"></ul></td>
									<td class="st-c "><ul id="UL31"></ul></td>
									<td class="st-c "><ul id="UL32"></ul></td>
									<td class="st-c "><ul id="UL33"></ul></td>
									<td class="st-c "><ul id="UL34"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="month-row" style="top: 83.33%; bottom: 0px;">
						<table class="st-bg-table" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-bg ">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
									<td class="st-bg">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						<table class="st-grid" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="st-dtitle "><span class="left" id="SD35"></span><span class="pull-right hidden-xs" id="LD35"></span></td>
									<td class="st-dtitle"><span class="left" id="SD36"></span><span class="pull-right hidden-xs" id="LD36"></span></td>
									<td class="st-dtitle"><span class="left" id="SD37"></span><span class="pull-right hidden-xs" id="LD37"></span></td>
									<td class="st-dtitle"><span class="left" id="SD38"></span><span class="pull-right hidden-xs" id="LD38"></span></td>
									<td class="st-dtitle"><span class="left" id="SD39"></span><span class="pull-right hidden-xs" id="LD39"></span></td>
									<td class="st-dtitle"><span class="left" id="SD40"></span><span class="pull-right hidden-xs" id="LD40"></span></td>
									<td class="st-dtitle"><span class="left" id="SD41"></span><span class="pull-right hidden-xs" id="LD41"></span></td>
								</tr>
								<tr>
									<td class="st-c "><ul id="UL35"></ul></td>
									<td class="st-c "><ul id="UL36"></ul></td>
									<td class="st-c "><ul id="UL37"></ul></td>
									<td class="st-c "><ul id="UL38"></ul></td>
									<td class="st-c "><ul id="UL39"></ul></td>
									<td class="st-c "><ul id="UL40"></ul></td>
									<td class="st-c "><ul id="UL41"></ul></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
</div><div id="dialog2"></div>
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
<script type="text/javascript" src="__PUBLIC__/js/calendar.js"></script>
<script type="text/javascript">
	function showdata() {
		y = $("#year").val();
		m = $("#month").val();
		$("#panel").html(y + "年" + m + "月");
		start_date1 = $("#UL0").attr("class").substr(4);
		end_date1 = $("#UL41").attr("class").substr(4);
		$.getJSON("<?php echo U('json');?>", {
			start_date : start_date1,
			end_date : end_date1
		}, function(data) {
			count = 0;
			prev_date = '';
			$(".mv-container ul").html("");
			if (data != null) {
				$.each(data, function(i) {
					html = '<li id=li_' + data[i].id + ' style=background-color:' + schedule_bg(data[i].priority) + ">";
					html += '<a id=' + data[i].id + ' class="event_msg" title="' + data[i].name + '">';
					html += data[i].name;
					html += ' </a>';
					html += "</li>";
					if (prev_date == data[i].start_date) {
						count++;
						if (count == 4) {
							$("ul.div_" + data[i].start_date).append('<li class=\"all\">显示全部...</li>');
						}
					}
					prev_date = data[i].start_date;
					$("ul.div_" + data[i].start_date).append(html);
				});
			}
		});
	}


	$(document).ready(function() {
		initial();
		set_return_url();

		$(document).on("click", "a.event_msg", (function() {
			var msg_list = "";
			current = $(this).attr('id');
			$("a#" + current).parent().parent().find('a.event_msg').each(function() {
				msg_list += $(this).attr("id") + "|";
			});
			winopen("<?php echo U('read');?>?id=" + $(this).attr('id') + "&list=" + msg_list, 730, 490);
		}));
		$("#dialog2").mouseleave(function() {
			$("#dialog2").hide();
		});
		$(document).on("click", "li.all", function() {
			//$("li.all").on("click",function(){
			$(this).parent().find("li.all").hide();
			html = $(this).parent().html();
			$(this).parent().find("li.all").show();
			html = $("<ol></ol>").html(html);
			$("#dialog2").html(html);
			$("#dialog2").show();

			$("#dialog2").css("left", $(this).parents("ul").offset().left - $(".Schedule").offset().left - 8);
			$("#dialog2").css("top", $(this).parents("ul").offset().top - $(".Schedule").offset().top - 8);
		});
	});
	function add() {
		window.open("<?php echo U('add');?>", "_self");
	}

	function month_view() {
		window.open('__URL__', "_self");
	}

	function day_view() {
		window.open("<?php echo U('day_view');?>", "_self");
	}
</script>
<!-- inline scripts related to this page -->
</body>
</html>