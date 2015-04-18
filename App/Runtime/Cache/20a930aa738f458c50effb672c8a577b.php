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
                <li><a href="#" url="<?php echo U('flow/khdai');?>"  node="224" onclick="click_top_menu(this)"> <i class="fa fa-check-square-o"></i> 贷款审批</a></li>
                <li class="active"><a href="#" url="<?php echo U('flow/index');?>" node="87" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 工作流程</a></li>
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
				<div class="row">
				    <div class="col-sm-2">
				<div class="sidebar" id="sidebar">	
					
					<div id="nav_head" class="text-center"  onclick="toggle_left_menu()">
						<span class="menu-text"><?php echo ($top_menu_name); ?></span>
						<b id="left_menu_icon" class="fa fa-angle-down pull-right"></b>
					</div>
					<?php echo W('Nav',array('tree'=>$left_menu,'new_count'=>$new_count));?>
				</div>
					
				    </div>
				    <div class="col-sm-10">

								<div class="main-content"  style="max-width:1020px;float:left;">
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
													
<style type="text/css" media="screen">
.sidebar{display:none;}
</style>

<div class="col-sm-12  hidden-print">
    <h1 style="color:green"><i class="fa fa-group"></i> <?php echo get_system_config("SYSTEM_NAME");?></h1>
  
</div>
<div class="page-header">
  <h1> <?php echo ($CompanyName['name']); ?> 
      <div class="text-center">
            <b> 贷后流程  </b>
      </div></h1>
</div>

<div class="alert alert-danger" role="alert">
 	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-users"></i> 申请人</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
	   <span id="username"> <?php echo ($DaiInfo['customer']); ?>  </span>	</p>
					</div>
	</div>
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-user"></i> 受理人</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
             	<span  id="username"> <?php echo ($DaiInfo['user_name']); ?> 		</p>
					</div>
	</div>
    
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-money"></i>  贷款金额</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				<?php echo ($DaiInfo['money']); ?> 元	</p>
					</div>
	</div>
	
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-calendar"></i> 申请时间</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				 <?php echo (date("Y-m-d H:i:s",$DaiInfo['aply_time'])); ?> 		</p>
					</div>
	</div>
    
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-automobile"></i> 资金用途</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				   	 <?php echo ($DaiInfo['what_for']); ?> 	</p>
					</div>
	</div>
	
	
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-calendar-o"></i> 放款时间</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				 <?php echo (date("Y-m-d H:i:s",$DaiInfo['create_time'])); ?>   		</p>
					</div>
	</div>
	

	 
    <br style="clear:both;">
</div>
              
<div class="col-xs-12">
    
    <div class="pull-left text-center green">
 <a class="btn btn-app liu-nav btn-xs btn-success" panel="step11" data-toggle="modal" data-target="#myModal">
    <i class="fa fa fa-check-circle bigger-100 bigger-100"></i>
贷款成功															
</a>
<br/>
1
 <!-- <?php echo ($DaiInfo['customer']); ?>    <br/>
<?php echo (date("Y-m-d H:i:s",$DaiInfo['aply_time'])); ?>   -->
</div> 

</div>     
<div class="col-xs-12">
    
<a class="narror down pull-left ">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
    
<div class="pull-left text-center">
 <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1021);?>" panel="step1021" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1021);?> bigger-100"></i>
 付息	 															
</a>
<br/>
2
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>

<div class="pull-left text-center">

<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1021);?>" panel="step1021" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1021);?> bigger-100"></i>
    打印通知单															
</a>

<br/>
<?php echo get_step_done_man($id,'step1021','合同组');?><br/>
<?php echo get_step_done_time($id,'step1021');?>  

</div> 

<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1022);?>"  panel="step1022" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1022);?> bigger-100"></i>
    提前7天通知客户																
</a><br/>
<?php echo get_step_done_man($id,'step1022','行政部');?><br/>
<?php echo get_step_done_time($id,'step1022');?>  
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1023);?>"  panel="step1023" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1023);?> bigger-100"></i>
    提前3天通知客户															
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step1023');?>  
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1024);?>"  panel="step1024" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1024);?> bigger-100"></i>
   客户打息															
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step1024');?>  
</div> 

</div> 

<div class="col-xs-12">
    
<a class="narror down pull-left" style="height:34px">
    <!-- <i class="fa fa-arrow-down  "></i>		 -->													
</a>

</div>  
<div class="col-xs-12">
	<div class="pull-left text-center" style="width:108px;height:90px">
	  
	</div> 
	<a class="narror right pull-left">
	    <i class="fa   fa-arrow-right"></i>															
	</a>
	
<div class="pull-left text-center">
    <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1025);?>" panel="step1025" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1025);?> bigger-100"></i>
  财务确认																
</a><br/>
<?php echo get_step_done_man($id,'step1025','财务部');?><br/>
<?php echo get_step_done_time($id,'step1025');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
    <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1026);?>" panel="step1026" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1026);?> bigger-100"></i>
  信贷员录入																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step1026');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
    <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1027);?>" panel="step1027" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1027);?> bigger-100"></i>
  办公室录入																
</a><br/>
<?php echo get_step_done_man($id,'step1027','行政部');?><br/>
<?php echo get_step_done_time($id,'step1027');?>  
</div> 
<!-- <a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>
</a>

<div class="well text-center pull-left" style="max-width: 400px; margin: -30px auto 10px;">

	<a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step411);?>"  panel="step411" data-toggle="modal" data-target="#myModal">
        信贷员录入 <?php echo get_step_done_man($id,'step411','');?>
    </a>
<br />  <?php echo get_step_done_time($id,'step3');?>  <br />
    <a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step412);?>" panel="step412" data-toggle="modal" data-target="#myModal">
        办公室录入	 <?php echo get_step_done_man($id,'step412','');?>
    </a><br />
	<?php echo get_step_done_time($id,'step3');?>
    </div> -->

</div>      
<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1031);?>" panel="step1031" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1031);?> bigger-100"></i>
  还本																
</a><br/>
3
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step1031);?>" panel="step1031" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1031);?> bigger-100"></i>
  	 打印还本合同																
</a><br/>
 <?php echo get_step_done_man($id,'step1031','合同组');?><br/>
<?php echo get_step_done_time($id,'step1031');?>  
</div> 

<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step1032);?>" panel="step1032" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1032);?> bigger-100"></i>
  	 提前1个月通知																
</a><br/>
 <?php echo get_step_done_man($id,'step1032','行政部');?><br/>
<?php echo get_step_done_time($id,'step1032');?>  
</div> 

<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step1033);?>" panel="step1033" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1033);?> bigger-100"></i>
  	 提前15天通知																	
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step1033');?>  
</div> 

<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step1034);?>" panel="step1034" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1034);?> bigger-100"></i>
  	确认还款情况																	
</a><br/>
 <?php echo get_step_done_man($id,'step1034','财务部');?><br/>
<?php echo get_step_done_time($id,'step1034');?>  
</div> 

<!--
<div class="well text-center pull-left" style="max-width: 400px; margin: 0 auto 10px;margin-top: -30px;">
    <a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step411);?>"  panel="step411" data-toggle="modal" data-target="#myModal">

    </a><br/>
<?php echo get_step_done_man($id,'step411','行政部');?>	 <?php echo get_step_done_time($id,'step411');?>
<br/>
    <a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step412);?>" panel="step412" data-toggle="modal" data-target="#myModal">

    </a><br/>
<?php echo get_step_done_man($id,'step411','信贷员');?> <?php echo get_step_done_time($id,'step412');?>

    </div> -->
    
</div>   


<div class="col-xs-12">
    
<a class="narror down pull-left" style="height:34px">
    <!-- <i class="fa fa-arrow-down  "></i>		 -->													
</a>

</div>  
<div class="col-xs-12">
	<div class="pull-left text-center" style="width:108px;height:90px">
	  
	</div> 	
<a class="narror right pull-left" style="margin-top:30px">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="well text-center pull-left" style="min-width: 400px; margin: 0 auto 10px;margin-top: -30px;">
	<div class="huanben">
		<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1035);?>" panel="step1035" data-toggle="modal" data-target="#myModal">
		    <i class="fa <?php echo get_dai_step_icon(step1035);?> bigger-100"></i>
		      客户还本 															
		</a>
		</div>
	
		<a class="narror right pull-left">
		    <i class="fa   fa-arrow-right"></i>															
		</a>
		<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1036);?>" panel="step1036" data-toggle="modal" data-target="#myModal">
		    <i class="fa <?php echo get_dai_step_icon(step1036);?> bigger-100"></i>
		      信贷员录入 															
		</a>
		</div>
		
		<a class="narror right pull-left">
		    <i class="fa   fa-arrow-right"></i>															
		</a>
		<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1037);?>" panel="step1037" data-toggle="modal" data-target="#myModal">
		    <i class="fa <?php echo get_dai_step_icon(step1037);?> bigger-100"></i>
		      办公室录入 															
		</a>
		</div>
		
		
	</div><!-- .huanben -->
  
<div class="yuqi clearfix clear" >
	  
	<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1038);?>" panel="step1038" data-toggle="modal" data-target="#myModal">
	    <i class="fa <?php echo get_dai_step_icon(step1038);?> bigger-100"></i>
	      客户逾期 															
	</a>
	</div>
	
	<a class="narror right pull-left">
	    <i class="fa   fa-arrow-right"></i>															
	</a>
	  
	<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1039);?>" panel="step1039" data-toggle="modal" data-target="#myModal">
	    <i class="fa <?php echo get_dai_step_icon(step1039);?> bigger-100"></i>
	      信贷员催															
	</a>
	</div>
	
	<a class="narror right pull-left">
	    <i class="fa   fa-arrow-right"></i>															
	</a>
	  
	<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step10310);?>" panel="step10310" data-toggle="modal" data-target="#myModal">
	    <i class="fa <?php echo get_dai_step_icon(step10310);?> bigger-100"></i>
	      信贷经理															
	</a>
	</div>
	<a class="narror right pull-left">
	    <i class="fa   fa-arrow-right"></i>															
	</a>
	<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step10311);?>" panel="step10311" data-toggle="modal" data-target="#myModal">
	    <i class="fa <?php echo get_dai_step_icon(step10311);?> bigger-100"></i>
	      风控部															
	</a>
	</div>
	
	  
	
</div><!-- .yuqi -->
  

    </div>



</div> 


<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1041);?>" panel="step1041" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1041);?> bigger-100"></i>
  归档分类														
</a><br/>
4
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1041);?>" panel="step1041" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1041);?> bigger-100"></i>
    归档																
</a><br/>
 <?php echo get_step_done_man($id,'step1041','合同组');?><br/>
<?php echo get_step_done_time($id,'step1041');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step1041);?>" panel="step1041" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step1041);?> bigger-100"></i>
    形成档案库															
</a>
</div> 
</div>      
				<!-- PAGE CONTENT ENDS -->
				
		<div class="pull-right text-right " style="
	    position: absolute;
    top: 0px;
    right: 20px;">
	<!--	<a onclick="go_return_url();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-list"></span>返回</a> -->
    <div style="margin-right:10px;margin-top:5px" >
         编号：贷-<?php echo (date('ymd',$NowTime)); ?>
		 <br />
		 <a href="index.php?m=flow&a=timeline&id=<?php echo ($DaiInfo['id']); ?>" title="时间轴" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-flag"></i> 查看时间轴</a>
    </div>
			<?php if(($flow_type["is_lock"]) == "0"): ?><a onclick="popup_confirm();"  class="btn btn-sm btn-warning hidden-print hidden"><i class="fa fa-cubes"></i> 选择审批流程</a><?php endif; ?>
          
			<a   onclick="winprint();"  class="btn btn-sm btn-primary hidden-print hidden"><i class="fa fa-print"></i> 打印流程图</a>

    	</div>
	</div>


<!-- 弹窗开始 -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
            <div class="row">
                <div class="col-xs-6">
                <h4 class="modal-title" id="myModalLabel" >客户：<?php echo ($DaiInfo['customer']); ?>	 / 金额：<?php echo ($DaiInfo['money']); ?>.00 元</h4>
                </div>
                <div class="col-xs-4 text-right pull-right">
                <button type="button" class="btn btn-sm btn-default showself" >当前步骤</button>
                <button type="button" class="btn btn-sm btn-success showall" >显示所有</button>
                <button type="button" class="btn btn-sm btn-success openall" >展开所有</button>
                </div>
            </div>
          </div>
                <div class="modal-body">
       

         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
                <div class="panel steps panel-default step1021">
                  <div class="panel-heading" role="tab" >
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1021" aria-expanded="false" aria-controls="collapseTwo">
                    1 -   打印还息通知单
                      </a>
                    </h4>
                  </div>
                  <div id="step1021" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
    
    <!-- 完成开始 -->
<?php echo get_dai_log($id,'step1021');?> 
			<?php if(($ishe) == "1"): ?><form role="form" method='post' id="form_data_step1021" class=" form-horizontal">
                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
                    <input type="hidden" name="step" id='step' value="step1021">
                    <input type="hidden" name="dostep" id='dostep' value="step1021">
                    <input type="hidden" name="done" id="done" value="1">
                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1021">
                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                    <input type="hidden" name="comment" value="完成">
                </form>
               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1021')" step="step1021">已完成</button>
               </div><?php endif; ?>
<!-- 完成结果 -->

  
                    </div>
                  </div>
                </div><!-- panel -->
				
    <div class="panel steps step1022 panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="block" data-toggle="collapse" data-parent="#step1022" href="#step1022" aria-expanded="false" aria-controls="collapseThree">
           提前7天通知客户
          </a>
        </h4>
      </div>
      <div id="step1022" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
		
 <!-- 审批开始 -->
		<?php echo get_dai_log($id,'step1022');?> 
		<?php if(($iszheng) == "1"): ?><div class="well " style="margin:auto;width:400px">
 		               <form role="form" method='post' id="form_data_step1022" class=" form-horizontal">
 		                   <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
 		                   <input type="hidden" name="step" id='step' value="step1022">
 		                   <input type="hidden" name="dostep" id='dostep' value="step1023"> <!-- 下一步 -->
 		                   <input type="hidden" name="done" id="done" value="1">
 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1022">
 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
 		                 <fieldset >
 		                   <div class="form-group">
 		                     <label for="disabledSelect">备注说明：</label>
 		                     <textarea class="form-control" id="coz_step1022" name="comment" rows="3"></textarea>
 		                   </div>
 		                   <a class="btn btn-default nextstep hidden" step="step1022">提交</a>
 		                 </fieldset>
 		               </form>
					   
		              <!-- <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1022')">不通过 </a> -->
		              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1022')" step="step1022">完成   </a>
		            </div><?php endif; ?>
	<!-- 审批结束 -->
		
        </div>
      </div>
    </div><!-- panel -->
	
       <div class="panel steps step1023 panel-default">
         <div class="panel-heading" role="tab" id="headingThree">
           <h4 class="panel-title">
             <a class="block" data-toggle="collapse" data-parent="#step1023" href="#step1023" aria-expanded="false" aria-controls="collapseThree">
              提前7天通知客户
             </a>
           </h4>
         </div>
         <div id="step1023" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
           <div class="panel-body">
		
 <!-- 审批开始 -->
		<?php echo get_dai_log($id,'step1023');?> 
		<?php if(($isxin) == "1"): ?><div class="well " style="margin:auto;width:400px">
 		               <form role="form" method='post' id="form_data_step1023" class=" form-horizontal">
 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
 		                   <input type="hidden" name="step" id='step' value="step1023">
 		                   <input type="hidden" name="dostep" id='dostep' value="step1024"> <!-- 下一步 -->
 		                   <input type="hidden" name="done" id="done" value="1">
 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1023">
 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
 		                 <fieldset >
 		                   <div class="form-group">
 		                     <label for="disabledSelect">备注说明：</label>
 		                     <textarea class="form-control" id="coz_step1023" name="comment" rows="3"></textarea>
 		                   </div>
 		                   <a class="btn btn-default nextstep hidden" step="step1023">提交</a>
 		                 </fieldset>
 		               </form>
		   
		              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1023')">（未完成）提交反馈 </a>
		              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1023')" step="step1023">完成   </a>
		            </div><?php endif; ?>
	<!-- 审批结束 -->
		
           </div>
         </div>
       </div><!-- panel -->
	   
                    <div class="panel steps panel-default step1024">
                      <div class="panel-heading" role="tab" >
                        <h4 class="panel-title">
                          <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1024" aria-expanded="false" aria-controls="collapseTwo">
                           客户打息
                          </a>
                        </h4>
                      </div>
                      <div id="step1024" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
     
        <!-- 完成开始 -->
   	<?php echo get_dai_log($id,'step1024');?> 
   				<?php if(($isxin) == "1"): ?><form role="form" method='post' id="form_data_step1024" class=" form-horizontal">
   	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
   	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
   	                    <input type="hidden" name="step" id='step' value="step1024">
   	                    <input type="hidden" name="dostep" id='dostep' value="step1024">
   	                    <input type="hidden" name="done" id="done" value="1">
   	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1024">
   	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
   	                    <input type="hidden" name="comment" value="完成">
   	                </form>
   	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
   	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1024')" step="step1024">已完成</button>
   	               </div><?php endif; ?>
   	<!-- 完成结果 -->
	
	  
                        </div>
                      </div>
                    </div><!-- panel -->
					
        
           <div class="panel steps step1025 panel-default">
             <div class="panel-heading" role="tab" id="headingThree">
               <h4 class="panel-title">
                 <a class="block" data-toggle="collapse" data-parent="#step1025" href="#step1025" aria-expanded="false" aria-controls="collapseThree">
                  财务确认
                 </a>
               </h4>
             </div>
             <div id="step1025" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
               <div class="panel-body">
			
	 <!-- 审批开始 -->
			<?php echo get_dai_log($id,'step1025');?> 
			<?php if(($iscai) == "1"): ?><div class="well " style="margin:auto;width:400px">
	 		               <form role="form" method='post' id="form_data_step1025" class=" form-horizontal">
	 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
	 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
	 		                   <input type="hidden" name="step" id='step' value="step1025">
	 		                   <input type="hidden" name="dostep" id='dostep' value="step1025"> <!-- 下一步 -->
	 		                   <input type="hidden" name="bad_step" id='bad_step' value="step1024"> <!-- 上一步 -->
	 		                   <input type="hidden" name="done" id="done" value="1">
	 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1025">
	 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	 		                 <fieldset >
	 		                   <div class="form-group">
	 		                     <label for="disabledSelect">备注说明：</label>
	 		                     <textarea class="form-control" id="coz_step1025" name="comment" rows="3"></textarea>
	 		                   </div>
	 		                 </fieldset>
	 		               </form>
			   
			              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1025')">（未打息）提交反馈 </a>
			              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1025')" step="step1025">已打息   </a>
			            </div><?php endif; ?>
		<!-- 审批结束 -->
			
               </div>
             </div>
           </div><!-- panel -->
		   
                  <div class="panel steps panel-default step1026">
                    <div class="panel-heading" role="tab" >
                      <h4 class="panel-title">
                        <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1026" aria-expanded="false" aria-controls="collapseTwo">
                         信贷员录入
                        </a>
                      </h4>
                    </div>
                    <div id="step1026" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
     
      <!-- 完成开始 -->
 	<?php echo get_dai_log($id,'step1026');?> 
 				<?php if(($isxin) == "1"): ?><form role="form" method='post' id="form_data_step1026" class=" form-horizontal">
 	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
 	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
 	                    <input type="hidden" name="step" id='step' value="step1026">
 	                    <input type="hidden" name="dostep" id='dostep' value="step1026">
 	                    <input type="hidden" name="done" id="done" value="1">
 	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1026">
 	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
 	                    <input type="hidden" name="comment" value="完成">
 	                </form>
 	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
 	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1026')" step="step1026">已完成</button>
 	               </div><?php endif; ?>
 	<!-- 完成结果 -->
	
	  
                      </div>
                    </div>
                  </div><!-- panel -->
				  
                 <div class="panel steps panel-default step1027">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1027" aria-expanded="false" aria-controls="collapseTwo">
                        办公室录入
                       </a>
                     </h4>
                   </div>
                   <div id="step1027" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1027');?> 
				<?php if(($iszheng) == "1"): ?><form role="form" method='post' id="form_data_step1027" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1027">
	                    <input type="hidden" name="dostep" id='dostep' value="step1027">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1027">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1027')" step="step1027">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->

                 <div class="panel steps panel-default step1031">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1031" aria-expanded="false" aria-controls="collapseTwo">
                     2 -    打印还本合同
                       </a>
                     </h4>
                   </div>
                   <div id="step1031" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1031');?> 
				<?php if(($ishe) == "1"): ?><form role="form" method='post' id="form_data_step1031" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1031">
	                    <input type="hidden" name="dostep" id='dostep' value="step1031">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1031">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1031')" step="step1031">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->       
  
     <div class="panel steps step1032 panel-default">
       <div class="panel-heading" role="tab" id="headingThree">
         <h4 class="panel-title">
           <a class="block" data-toggle="collapse" data-parent="#step1032" href="#step1032" aria-expanded="false" aria-controls="collapseThree">
            提前1个月通知客户
           </a>
         </h4>
       </div>
       <div id="step1032" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
         <div class="panel-body">
		
 <!-- 审批开始 -->
		<?php echo get_dai_log($id,'step1032');?> 
		<?php if(($iszheng) == "1"): ?><div class="well " style="margin:auto;width:400px">
 		               <form role="form" method='post' id="form_data_step1032" class=" form-horizontal">
 		                   <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
 		                   <input type="hidden" name="step" id='step' value="step1032">
 		                   <input type="hidden" name="dostep" id='dostep' value="step1033"> <!-- 下一步 -->
 		                   <input type="hidden" name="done" id="done" value="1">
 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1032">
 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
 		                 <fieldset >
 		                   <div class="form-group">
 		                     <label for="disabledSelect">备注说明：</label>
 		                     <textarea class="form-control" id="coz_step1032" name="comment" rows="3"></textarea>
 		                   </div>
 		                 </fieldset>
 		               </form>
		   
		              <!-- <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1032')">（未完成）提交反馈 </a> -->
		              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1032')" step="step1032">完成   </a>
		            </div><?php endif; ?>
	<!-- 审批结束 -->
		
         </div>
       </div>
     </div><!-- panel -->
	 

                <div class="panel steps step1033 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step1033" href="#step1033" aria-expanded="false" aria-controls="collapseThree">
                       财务确认
                      </a>
                    </h4>
                  </div>
                  <div id="step1033" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
					
			 <!-- 审批开始 -->
					<?php echo get_dai_log($id,'step1033');?> 
					<?php if(($isxin) == "1"): ?><div class="well " style="margin:auto;width:400px">
			 		               <form role="form" method='post' id="form_data_step1033" class=" form-horizontal">
			 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
			 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
			 		                   <input type="hidden" name="step" id='step' value="step1033">
			 		                   <input type="hidden" name="dostep" id='dostep' value="step1034"> <!-- 下一步 -->
			 		                   <input type="hidden" name="bad_step" id='bad_step' value=""> <!-- 上一步 -->
			 		                   <input type="hidden" name="done" id="done" value="1">
			 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1033">
			 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
			 		                 <fieldset >
			 		                   <div class="form-group">
			 		                     <label for="disabledSelect">备注说明：</label>
			 		                     <textarea class="form-control" id="coz_step1033" name="comment" rows="3"></textarea>
			 		                   </div>
			 		                 </fieldset>
			 		               </form>
					   
					              <!-- <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1033')">（未还款）提交反馈 </a> -->
					              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1033')" step="step1033">完成   </a>
					            </div><?php endif; ?>
				<!-- 审批结束 -->
					
                    </div>
                  </div>
                </div><!-- panel -->
				

                <div class="panel steps step1034 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step1034" href="#step1034" aria-expanded="false" aria-controls="collapseThree">
                       确认还款情况
                      </a>
                    </h4>
                  </div>
                  <div id="step1034" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
					
			 <!-- 审批开始 -->
					<?php echo get_dai_log($id,'step1034');?> 
					<?php if(($iscai) == "1"): ?><div class="well " style="margin:auto;width:400px">
			 		               <form role="form" method='post' id="form_data_step1034" class=" form-horizontal">
			 		                   <input type="hidden" name="ajax" id='ajax' value="1">
			 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
			 		                   <input type="hidden" name="step" id='step' value="step1034">
			 		                   <input type="hidden" name="dostep" id='dostep' value="step1034"> <!-- 下一步 -->
			 		                   <input type="hidden" name="bad_step" id='bad_step' value=""> <!-- 上一步 -->
			 		                   <input type="hidden" name="setstep" id='setstep' value="">
			 		                   <input type="hidden" name="done" id="done" value="1">
			 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1034">
			 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
			 		                 <fieldset >
			 		                   <div class="form-group">
			 		                     <label for="disabledSelect">备注说明：</label>
			 		                     <textarea class="form-control" id="coz_step1034" name="comment" rows="3"></textarea>
			 		                   </div>
			 		                 </fieldset>
			 		               </form>
					   
					              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1034')">（未还款）提交反馈 </a>
								      <a  class="btn btn-warning btn-lg btn-block notdone" onclick="stepdone('form_data_step1034')">客户已逾期 </a>
					              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1034')" step="step1034">客户已还款  </a>
					            </div><?php endif; ?>
				<!-- 审批结束 -->
					
                    </div>
                  </div>
                </div><!-- panel -->
                 <div class="panel steps panel-default step1035">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1035" aria-expanded="false" aria-controls="collapseTwo">
                        客户还本
                       </a>
                     </h4>
                   </div>
                   <div id="step1035" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1035');?> 
				<?php if(($iscai) == "1"): ?><form role="form" method='post' id="form_data_step1035" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1035">
	                    <input type="hidden" name="dostep" id='dostep' value="step1035">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1035">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1035')" step="step1035">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->
				 
                 <div class="panel steps panel-default step1036">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1036" aria-expanded="false" aria-controls="collapseTwo">
                        信贷员录入
                       </a>
                     </h4>
                   </div>
                   <div id="step1036" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1036');?> 
				<?php if(($isxin) == "1"): ?><form role="form" method='post' id="form_data_step1036" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1036">
	                    <input type="hidden" name="dostep" id='dostep' value="step1036">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1036">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1036')" step="step1036">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->

                 <div class="panel steps panel-default step1037">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1037" aria-expanded="false" aria-controls="collapseTwo">
                        办公室录入
                       </a>
                     </h4>
                   </div>
                   <div id="step1037" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1037');?> 
				<?php if(($iszheng) == "1"): ?><form role="form" method='post' id="form_data_step1037" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1037">
	                    <input type="hidden" name="dostep" id='dostep' value="step1037">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1037">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1037')" step="step1037">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->
                 <div class="panel steps panel-default step1038">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1038" aria-expanded="false" aria-controls="collapseTwo">
                        客户逾期
                       </a>
                     </h4>
                   </div>
                   <div id="step1038" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1038');?> 
				<?php if(($iscai) == "1"): ?><form role="form" method='post' id="form_data_step1038" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1038">
	                    <input type="hidden" name="dostep" id='dostep' value="step1038">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1038">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1038')" step="step1038">客户逾期 已确认</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->
				 		 								  
                <div class="panel steps step1039 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step1039" href="#step1039" aria-expanded="false" aria-controls="collapseThree">
                       信贷员催款
                      </a>
                    </h4>
                  </div>
                  <div id="step1039" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
					
			 <!-- 审批开始 -->
					<?php echo get_dai_log($id,'step1039');?> 
					<?php if(($isxin) == "1"): ?><div class="well " style="margin:auto;width:400px">
			 		               <form role="form" method='post' id="form_data_step1039" class=" form-horizontal">
			 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
			 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
			 		                   <input type="hidden" name="step" id='step' value="step1039">
			 		                   <input type="hidden" name="dostep" id='dostep' value="step10310"> <!-- 下一步 -->
			 		                   <input type="hidden" name="bad_step" id='bad_step' value=""> <!-- 上一步 -->
			 		                   <input type="hidden" name="done" id="done" value="1">
			 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1039">
			 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
			 		                 <fieldset >
			 		                   <div class="form-group">
			 		                     <label for="disabledSelect">备注说明：</label>
			 		                     <textarea class="form-control" id="coz_step1039" name="comment" rows="3"></textarea>
			 		                   </div>
			 		                 </fieldset>
			 		               </form>
					   
					              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step1039')">（未还款）提交反馈 </a>
					              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step1039')" step="step1039">（已还款） 完成   </a>
					            </div><?php endif; ?>
				<!-- 审批结束 -->
					
                    </div>
                  </div>
                </div><!-- panel -->

                <div class="panel steps step10310 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step10310" href="#step10310" aria-expanded="false" aria-controls="collapseThree">
                       信贷经理催款
                      </a>
                    </h4>
                  </div>
                  <div id="step10310" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
					
			 <!-- 审批开始 -->
					<?php echo get_dai_log($id,'step10310');?> 
					<?php if(($isxinj) == "1"): ?><div class="well " style="margin:auto;width:400px">
			 		               <form role="form" method='post' id="form_data_step10310" class=" form-horizontal">
			 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
			 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
			 		                   <input type="hidden" name="step" id='step' value="step10310">
			 		                   <input type="hidden" name="dostep" id='dostep' value="step10311"> <!-- 下一步 -->
			 		                   <input type="hidden" name="bad_step" id='bad_step' value=""> <!-- 上一步 -->
			 		                   <input type="hidden" name="done" id="done" value="1">
			 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step10310">
			 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
			 		                 <fieldset >
			 		                   <div class="form-group">
			 		                     <label for="disabledSelect">备注说明：</label>
			 		                     <textarea class="form-control" id="coz_step10310" name="comment" rows="3"></textarea>
			 		                   </div>
			 		                 </fieldset>
			 		               </form>
					   
					              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step10310')">（未还款）提交反馈 </a>
					              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step10310')" step="step10310">（已还款） 完成   </a>
					            </div><?php endif; ?>
				<!-- 审批结束 -->
					
                    </div>
                  </div>
                </div><!-- panel -->

                <div class="panel steps step10311 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step10311" href="#step10311" aria-expanded="false" aria-controls="collapseThree">
                       风控部催款
                      </a>
                    </h4>
                  </div>
                  <div id="step10311" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
					
			 <!-- 审批开始 -->
					<?php echo get_dai_log($id,'step10311');?> 
					<?php if(($isfengj) == "1"): ?><div class="well " style="margin:auto;width:400px">
			 		               <form role="form" method='post' id="form_data_step10311" class=" form-horizontal">
			 		                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
			 		                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
			 		                   <input type="hidden" name="step" id='step' value="step10311">
			 		                   <input type="hidden" name="dostep" id='dostep' value="step10312"> <!-- 下一步 -->
			 		                   <input type="hidden" name="bad_step" id='bad_step' value=""> <!-- 上一步 -->
			 		                   <input type="hidden" name="done" id="done" value="1">
			 		                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step10311">
			 		                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
			 		                 <fieldset >
			 		                   <div class="form-group">
			 		                     <label for="disabledSelect">备注说明：</label>
			 		                     <textarea class="form-control" id="coz_step10311" name="comment" rows="3"></textarea>
			 		                   </div>
			 		                 </fieldset>
			 		               </form>
					   
					              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step10311')">（未还款）提交反馈 </a>
					              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone2('form_data_step10311')" step="step10311">（已还款） 完成   </a>
					            </div><?php endif; ?>
				<!-- 审批结束 -->
					
                    </div>
                  </div>
                </div><!-- panel -->

                 <div class="panel steps panel-default step1041">
                   <div class="panel-heading" role="tab" >
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step1041" aria-expanded="false" aria-controls="collapseTwo">
                      4 -   客户归档
                       </a>
                     </h4>
                   </div>
                   <div id="step1041" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
     
     <!-- 完成开始 -->
	<?php echo get_dai_log($id,'step1041');?> 
				<?php if(($ishe) == "1"): ?><form role="form" method='post' id="form_data_step1041" class=" form-horizontal">
	                    <!--  <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step1041">
	                    <input type="hidden" name="dostep" id='dostep' value="step1041">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step1041">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step1041')" step="step1041">已完成</button>
	               </div><?php endif; ?>
	<!-- 完成结果 -->
	
	  
                     </div>
                   </div>
                 </div><!-- panel -->
				 
  
  
  
          </div> <!-- panel group -->

                
                </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-sm btn-default showself" >当前步骤</button>
            <button type="button" class="btn btn-sm btn-success showall" >显示所有</button>
            <button type="button" class="btn btn-sm btn-success openall" >展开所有</button> -->
           <button type="button" class="btn btn-success" data-dismiss="modal">关闭</button>
          </div>
        </div>
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
        
         // 打开  －－－   显示本部份内容，隐藏其它部份内容
        $(".liu-nav").click(function(){
          //  alert(""+$(this).attr("panel")+"");
             $(".panel-collapse").removeClass("in").css("height","0");
              $(".steps").addClass("hidden").removeClass("panel-danger").addClass("panel-default");

              
               $(".showself").attr("panel",$(this).attr("panel"));
               $(".showall").attr("panel",$(this).attr("panel"));
               $(".openall").attr("panel",$(this).attr("panel"));
  
             $("."+$(this).attr("panel")).removeClass("hidden");
            $("#"+$(this).attr("panel")).addClass("in").css("height","auto");
          
        })
        
        $(".showself").click(function(){
          //  alert(""+$(this).attr("panel")+"");
             $(".panel-collapse").removeClass("in").css("height","0");
              $(".steps").addClass("hidden");
  
             $("."+$(this).attr("panel")).removeClass("hidden");
            $("#"+$(this).attr("panel")).addClass("in").css("height","auto");
        })
    
        $(".showall").click(function(){     //显示所有 panel
             $(".steps").removeClass("hidden");
             $("."+$(this).attr("panel")).removeClass("panel-default");
             $("."+$(this).attr("panel")).addClass("panel-danger");
              $(".panel-collapse").removeClass("in").css("height","0");
             $("#"+$(this).attr("panel")).addClass("in").css("height","auto");
        })
    
        $(".openall").click(function(){     //打开所有 panel
             $(".steps").removeClass("hidden");
            $(".panel-collapse").removeClass("in").css("height","0");
            $(".panel-collapse").addClass("in").css("height","auto");
        })
    
      
        
	}); 
    
  
</script>
  <script type="text/javascript">
 
 // 直接提交
	function stepdone2(form_data) { 
     sendForm(form_data,"", "__SELF__");
      $('#myModal').modal('hide');
	};
    
	// 修改数据后再提交
  	function stepdone(form_data) { 
     	$("#"+form_data+" #setstep").val('step1038');
		alert($("#setstep").val());
       sendForm(form_data,"", "__SELF__");
        $('#myModal').modal('hide');
  	};
	
    //不同意 1) step 变为 select的step 2）done改为2
  	function notdone(form_data) {
        var badstep =$("#"+form_data+" #bad_step").val();
		if (badstep !='') {
			 $("#"+form_data+" #step").val(badstep);
		}
          $("#"+form_data+" #done").val("2");
		  
          // alert($("#step").val());
            if (check_form(form_data)){
               sendForm(form_data,"", "__SELF__");
               $('#myModal').modal('hide');
          }
  	};
	
	
	// 添加抵压物
	$('.dyw-btn1').click(function() {
		$('.dyw1').removeClass('hidden');
		$('.dyw2,.dyw3').addClass('hidden');
	});
	$('.dyw-btn2').click(function() {
		$('.dyw2').removeClass('hidden');
		$('.dyw1,.dyw3').addClass('hidden');
	});
	$('.dyw-btn3').click(function() {
		$('.dyw3').removeClass('hidden');
		$('.dyw1,.dyw2').addClass('hidden');
	});
  </script>
<style type="text/css" media="screen">
.text-center{color: #b4c2cc;}
</style>
<!-- inline scripts related to this page -->
</body>
</html>