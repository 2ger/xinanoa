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
													
<style type="text/css" media="screen">
.sidebar{display:none;}
.col-xs-12 .pull-left .tigang{
	font-size: 20px;
  line-height: 42px;}
</style>

<div class="col-sm-12  hidden-print">
    <h1 style="color:green"><i class="fa fa-group"></i> <?php echo get_system_config("SYSTEM_NAME");?></h1>
  
</div>
<div class="page-header">
  <h1> <!-- <?php echo ($CompanyName['name']); ?>  -->
      <div class="text-center">
            <b> 贷款流程审批</b>
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
		<label class="col-sm-4 control-label" for=""><i class="fa fa-calendar-o"></i> 受理时间</label>
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
客户申请															
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
 <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step21);?> tigang" panel="step21" data-toggle="modal" data-target="#myModal">
 
 受理	 															
</a>
<br/>
2
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>

<div class="pull-left text-center">

<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step21);?>" panel="step21" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step21);?> bigger-100"></i>
    面谈																
</a>

<br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step21');?>  

</div> 

<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step22);?>"  panel="step22" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step22);?> bigger-100"></i>
    材料收集																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step22');?>  
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step23);?>"  panel="step23" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step23);?> bigger-100"></i>
    分析																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step23');?>  
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step24);?>"  panel="step24" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step24);?> bigger-100"></i>
    风控审批																
</a><br/>
 <?php echo get_step_done_man($id,'step24','风控经理');?><br/>
<?php echo get_step_done_time($id,'step24');?>  
</div> 

</div> 

     
<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center">
    <a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step3);?> tigang" panel="step3" data-toggle="modal" data-target="#myModal">

  实地考察																
</a><br/>
3
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step3);?>" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step3);?> bigger-100"></i>
    双人双岗																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step3');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step3);?>" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step3);?> bigger-100"></i>
    调查提纲																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step3');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step3);?>" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step3);?> bigger-100"></i>
    调查底稿																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step3');?>  
</div> 


</div>      
<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step411);?>  tigang" panel="step411" data-toggle="modal" data-target="#myModal">

  评估																
</a><br/>
4
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>

<div class="well text-center pull-left" style="max-width: 400px; margin: 0 auto 10px;margin-top: -30px;">
    <a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step411);?>"  panel="step411" data-toggle="modal" data-target="#myModal">
       信贷经理 <?php echo get_step_done_man($id,'step411','');?>																
    </a><br/>
<?php echo get_step_done_time($id,'step411');?> 
<br/>
    <a class="btn btn-app liu-nav btn-block btn-xs <?php echo get_dai_step(step412);?>" panel="step412" data-toggle="modal" data-target="#myModal">
        风控经理	 <?php echo get_step_done_man($id,'step412','');?>																
    </a><br/>
<?php echo get_step_done_time($id,'step412');?> 
    </div>
    
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step42);?>" panel="step42" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step42);?> bigger-100"></i>
  	 执行董事																
</a><br/>
 <?php echo get_step_done_man($id,'step42','执行董事');?><br/>
<?php echo get_step_done_time($id,'step42');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs  <?php echo get_dai_step(step43);?>" panel="step43" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step43);?> bigger-100"></i>
    总经理																
</a><br/>
 <?php echo get_step_done_man($id,'step43','总经理');?><br/>
<?php echo get_step_done_time($id,'step43');?>  
</div> 
</div>   


<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step51);?>  tigang" panel="step51" data-toggle="modal" data-target="#myModal">

 审贷会																
</a><br/>
5
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step51);?>" panel="step51" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step51);?> bigger-100"></i>
    审贷会资料																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step51');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step52);?>" panel="step52" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step52);?> bigger-100"></i>
    质询															
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step52');?>  
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step53);?>" panel="step53" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step53);?> bigger-100"></i>
    表决															
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step53');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step54);?>" panel="step54" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step54);?> bigger-100"></i>
    反馈客户																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step54');?> 
</div> 

</div> 



<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step6);?>  tigang" panel="step6" data-toggle="modal" data-target="#myModal">
   
 签约																
</a><br/>
6
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step6);?>" panel="step6" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step6);?> bigger-100"></i>
    客户签合同																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step6');?> 
</div> 
</div>  




<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step7);?>  tigang" panel="step7" data-toggle="modal" data-target="#myModal">

  担保/抵押																
</a><br/>
7
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step7);?>" panel="step7" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step7);?> bigger-100"></i>
    担保/抵押手续																
</a><br/>
<?php echo ($DaiInfo['user_name']); ?><br/>
<?php echo get_step_done_time($id,'step7');?> 
</div> 
</div>  


<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step81);?>  tigang" panel="step81" data-toggle="modal" data-target="#myModal">
   
 放款																
</a><br/>
8
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step81);?>" panel="step81" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step81);?> bigger-100"></i>
    信贷经理																
</a><br/>
 <?php echo get_step_done_man($id,'step81','信贷经理');?><br/>
<?php echo get_step_done_time($id,'step81');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step82);?>" panel="step82" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step82);?> bigger-100"></i>
    风控经理																
</a><br/>
 <?php echo get_step_done_man($id,'step82','风控经理');?><br/>
<?php echo get_step_done_time($id,'step82');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step83);?>" panel="step83" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step83);?> bigger-100"></i>
    执行董事																
</a><br/>
 <?php echo get_step_done_man($id,'step83','执行董事');?><br/>
<?php echo get_step_done_time($id,'step83');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step84);?>" panel="step84" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step84);?> bigger-100"></i>
    总经理																
</a><br/>
 <?php echo get_step_done_man($id,'step84','总经理');?><br/>
<?php echo get_step_done_time($id,'step84');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step85);?>" panel="step85" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step85);?> bigger-100"></i>
    财务																
</a><br/>
 <?php echo get_step_done_man($id,'step85','财务');?><br/>
<?php echo get_step_done_time($id,'step85');?> 
</div> 
</div> 


<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step91);?>  tigang" panel="step91" data-toggle="modal" data-target="#myModal">
   
  归档																
</a><br/>
9
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step91);?>" panel="step91" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step91);?> bigger-100"></i>
    整理资料																
</a><br/>
<?php echo get_step_done_man($id,'step91','龙玉轩');?><br/>
<?php echo get_step_done_time($id,'step91');?> 
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs <?php echo get_dai_step(step92);?>" panel="step92" data-toggle="modal" data-target="#myModal">
    <i class="fa <?php echo get_dai_step_icon(step92);?> bigger-100"></i>
    录入系统																
</a><br/>
 <?php echo get_step_done_man($id,'step92','龙玉轩');?><br/>
<?php echo get_step_done_time($id,'step92');?> 
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
            
   
                 <div class="panel steps panel-default step11">
                   <div class="panel-heading" role="tab" id="headingTwo">
                     <h4 class="panel-title">
                       <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step11" aria-expanded="false" aria-controls="collapseTwo">
                        1-1  客户申请资料
                       </a>
                     </h4>
                   </div>
                   <div id="step11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
      <?php echo get_dai_log($id,'step11');?> 
	  
   <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=45&step=step11" allowtransparency="true" style="background-color=transparent" id="step11iframe" name="step11iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
	 
	  

       
                     </div>
                   </div>
                 </div>
                 
                 
                <div class="panel steps panel-default step21">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step21" aria-expanded="false" aria-controls="collapseTwo">
                       2-1  面谈客户
                      </a>
                    </h4>
                  </div>
                  <div id="step21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
      
<?php echo get_dai_log($id,'step21');?> 

	  <?php if(($isxin) == "1"): ?>添加抵压物：<a href="#" class="btn btn-info btn-xs dyw-btn1"><i class="fa fa-plus-square"></i> 土地</a>
 <a href="#" class="btn btn-success btn-xs dyw-btn2"><i class="fa fa-plus-square"></i> 汽车</a>
 <a href="#" class="btn btn-danger btn-xs dyw-btn3"><i class="fa fa-plus-square"></i> 房产</a><?php endif; ?>
	  



<div class="dwylist">
	<?php if(is_array($dyw)): $i = 0; $__LIST__ = $dyw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["content"]); ?><hr/><?php endforeach; endif; else: echo "" ;endif; ?>
</div><!-- .dwylist -->

<div class="alert alert-info dyw dyw1 hidden">
	 <iframe src="index.php?m=flow&a=adddyw&dai=<?php echo ($id); ?>&type=52&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
	                              
</div><!-- .alert alert-info -->

<div class="alert alert-success dyw  dyw2 hidden">
	 <iframe src="index.php?m=flow&a=adddyw&dai=<?php echo ($id); ?>&type=53&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
	                              
</div><!-- .alert alert-info -->

<div class="alert alert-danger dyw dyw3 hidden">
	 <iframe src="index.php?m=flow&a=adddyw&dai=<?php echo ($id); ?>&type=54&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
	                              
</div><!-- .alert alert-info -->


			  
				   <?php if(($DaiInfo["type"]) == "2"): ?><iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=55&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
					   <?php else: ?>
			     <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=44&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe><?php endif; ?>
       

                    </div>
                  </div>
                </div>
                <div class="panel steps step22 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#step22" href="#step22" aria-expanded="false" aria-controls="collapseThree">
                       2-2 客户资料信息收集
                      </a>
                    </h4>
                  </div>
                  <div id="step22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
       
        <?php echo get_dai_log($id,'step22');?>                    
   
  <style type="text/css" media="screen">
  iframe{height:350px;overflow-y:auto;overflow-x:hidden;}
  </style>    
  

  <?php if(($DaiInfo["type"]) == "2"): ?><iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=49&step=step22" allowtransparency="true" style="background-color=transparent" id="step22iframe" name="step22iframe" frameBorder=0 scrolling=auto width="100%"></iframe>    
   <?php else: ?>
     <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=56&step=step22" allowtransparency="true" style="background-color=transparent" id="step22iframe" name="step22iframe" frameBorder=0 scrolling=auto width="100%"></iframe><?php endif; ?>
		  

  
   
       
       
 
       
                    </div>
                  </div>
                </div>
  
             <div class="panel steps step23 panel-default">
               <div class="panel-heading" role="tab" id="headingThree">
                 <h4 class="panel-title">
                   <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step23" aria-expanded="false" aria-controls="collapseThree">
                    2-3 分析
                   </a>
                 </h4>
               </div>
               <div id="step23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                 <div class="panel-body">
         <?php echo get_dai_log($id,'step23');?> 
		 
	 <?php if(($DaiInfo["type"]) == "2"): ?><iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=57&step=step23" allowtransparency="true" style="background-color=transparent" id="step23iframe" name="step23iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
      <?php else: ?>
       <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=46&step=step23" allowtransparency="true" style="background-color=transparent" id="step23iframe" name="step23iframe" frameBorder=0 scrolling=auto width="100%"></iframe><?php endif; ?>
  
			  
		 
       
       
       
                 </div>
               </div>
             </div>
   
                <div class="panel steps step24 panel-default">
                  <div class="panel-heading" role="tab" id="headingfksp">
                    <h4 class="panel-title">
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step24" aria-expanded="true" aria-controls="collapseOne">
                        2-4 风控审批
                      </a>
                    </h4>
                  </div>
                  <div id="step24" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step24');?> 
	
<?php if(($isfengj) == "1"): ?><!-- 审批开始 -->
    <div class="row">
        <div class="col-sm-6 ">
           <div class="cozxdjlpg  alert well">
               <form role="form" method='post' id="form_data_step24" class=" form-horizontal">
                   <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                   <input type="hidden" name="id" value="<?php echo ($id); ?>">
                   <input type="hidden" name="step" id='step' value="step24">
                   <input type="hidden" name="dostep" id='dostep' value="step24">
                   <input type="hidden" name="done" id="done" value="1">
                   <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step24">
                   <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                 <fieldset >
                   <div class="form-group">
                     <label for="disabledTextInput">请选择步骤</label>
                    <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                        <option value="">请选择步骤</option>
                       <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                    </select>
                   </div>
                   <div class="form-group">
                     <label for="disabledSelect">审核意见</label>
                     <textarea class="form-control" id="coz_step24" name="comment" rows="3"></textarea>
                   </div>
                   <a class="btn btn-default nextstep hidden" step="step24">提交</a>
                 </fieldset>
               </form>
           </div>
       
        </div><!-- col-sm-6  -->
        <div class="col-sm-6">
            <div class="well " style="">
              <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step24')">不通过 </a>
              <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step24')" step="step24">通过   </a>
            </div>
        </div><!-- col-sm-6  -->
    </div> <!-- row -->
    
    <!-- 审批结束 --><?php endif; ?>                  
    
                
                    </div>
                  </div>
                </div><!-- panel -->
 
                <div class="panel steps step3 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdkc"><!-- id="headingfksp" -->
                    <h4 class="panel-title"><!-- href="#fksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step3" aria-expanded="true" aria-controls="collapseOne">
                      3  实地考察
                      </a>
                    </h4>
                  </div>
                  <!-- id="fksp" -->
                  <div id="step3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step3');?> 
	
 
              <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=48&step=step3" allowtransparency="true" style="background-color=transparent" id="step3iframe" name="step3iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
  
 	   	   
			  
                  
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step411 panel-default">
                  <div class="panel-heading" role="tab" id="headingxdjlpg"><!-- id="xdjlpg" -->
                    <h4 class="panel-title"><!-- href="#xdjlpg" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step411" aria-expanded="true" aria-controls="collapseOne">
                      4-1-1信贷经理评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="xdjlpg" -->
                  <div id="step411" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step411');?> 
     
	 	<?php if(($isxinj) == "1"): ?><!-- 审批开始 -->
     
     <div class="row">
         <div class="col-sm-6 ">
            <div class="cozxdjlpg  alert well">
                <form role="form" method='post' id="form_data_step411" class=" form-horizontal">
                    <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
                    <input type="hidden" name="step" id='step' value="step411">
                    <input type="hidden" name="dostep" id='dostep' value="step411">
                    <input type="hidden" name="done" id="done" value="1">
                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step411">
                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                  <fieldset >
                    <div class="form-group">
                      <label for="disabledTextInput">请选择步骤</label>
                     <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                         <option value="">请选择步骤</option>
                        <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect">审核意见</label>
                      <textarea class="form-control" id="coz_step411" name="comment" rows="3"></textarea>
                    </div>
                    <a class="btn btn-default nextstep hidden" step="step411">提交</a>
                  </fieldset>
                </form>
            </div>
        
         </div><!-- col-sm-6  -->
         <div class="col-sm-6">
             <div class="well " style="">
               <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step411')">不通过 </a>
               <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step411')" step="step411">通过   </a>
             </div>
         </div><!-- col-sm-6  -->
     </div> <!-- row -->
     
     <!-- 审批结束 --><?php endif; ?>  
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step412 panel-default">
                  <div class="panel-heading" role="tab" id="headingfkjlpg"><!-- id="fkjlpg" -->
                    <h4 class="panel-title"><!-- href="#fkjlpg" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step412" aria-expanded="true" aria-controls="collapseOne">
                      4-1-2 风控经理评估
                      </a>
                    </h4>
                  </div>
                  <div id="step412" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
    <?php echo get_dai_log($id,'step412');?> 
	<?php if(($isfengj) == "1"): ?><!-- 审批开始 -->
                  <div class="row">
                      <div class="col-sm-6 ">
                         <div class="cozxdjlpg  alert well">
                             <form role="form" method='post' id="form_data_step412" class=" form-horizontal">
                                 <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                                 <input type="hidden" name="id" value="<?php echo ($id); ?>">
                                 <input type="hidden" name="step" id='step' value="step412">
                                 <input type="hidden" name="dostep" id='dostep' value="step412">
                                 <input type="hidden" name="done" id="done" value="1">
                                 <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step412">
                                 <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                               <fieldset >
                                 <div class="form-group">
                                   <label for="disabledTextInput">请选择步骤</label>
                                  <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                                      <option value="">请选择步骤</option>
                                     <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                                  </select>
                                 </div>
                                 <div class="form-group">
                                   <label for="disabledSelect">审核意见</label>
                                   <textarea class="form-control" id="coz_step412" name="comment" rows="3"></textarea>
                                 </div>
                                 <a class="btn btn-default nextstep hidden" step="step412">提交</a>
                               </fieldset>
                             </form>
                         </div>
        
                      </div><!-- col-sm-6  -->
                      <div class="col-sm-6">
                          <div class="well " style="">
                            <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step412')">不通过 </a>
                            <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step412')" step="step412">通过   </a>
                          </div>
                      </div><!-- col-sm-6  -->
                  </div> <!-- row -->
     
                  <!-- 审批结束 --><?php endif; ?>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step42 panel-default">
                  <div class="panel-heading" role="tab" id="headingzxdspg"><!-- id="zxdspg" -->
                    <h4 class="panel-title"><!-- href="#zxdspg" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step42" aria-expanded="true" aria-controls="collapseOne">
                      4-2 执行董事评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="zxdspg" -->
                  <div id="step42" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                 <?php echo get_dai_log($id,'step42');?> 
          <!-- 审批开始 -->
     <?php if(($iszhi) == "1"): ?><div class="row">
              <div class="col-sm-6 ">
                 <div class="cozxdjlpg  alert well">
                     <form role="form" method='post' id="form_data_step42" class=" form-horizontal">
                         <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                         <input type="hidden" name="id" value="<?php echo ($id); ?>">
                         <input type="hidden" name="step" id='step' value="step42">
                         <input type="hidden" name="dostep" id='dostep' value="step42">
                         <input type="hidden" name="done" id="done" value="1">
                         <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step42">
                         <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                       <fieldset >
                         <div class="form-group">
                           <label for="disabledTextInput">请选择步骤</label>
                          <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                              <option value="">请选择步骤</option>
                             <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                          </select>
                         </div>
                         <div class="form-group">
                           <label for="disabledSelect">审核意见</label>
                           <textarea class="form-control" id="coz_step42" name="comment" rows="3"></textarea>
                         </div>
                         <a class="btn btn-default nextstep hidden" step="step42">提交</a>
                       </fieldset>
                     </form>
                 </div>
        
              </div><!-- col-sm-6  -->
              <div class="col-sm-6">
                  <div class="well " style="">
                    <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step42')">不通过 </a>
                    <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step42')" step="step42">通过   </a>
                  </div>
              </div><!-- col-sm-6  -->
          </div> <!-- row -->
     
          <!-- 审批结束 --><?php endif; ?>     
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step43 panel-default">
                  <div class="panel-heading" role="tab" id="headingjzlpg"><!-- id="jzlpg" -->
                    <h4 class="panel-title"><!-- href="#jzlpg" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step43" aria-expanded="true" aria-controls="collapseOne">
                      4-3 总经理评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="jzlpg" -->
                  <div id="step43" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step43');?> 
              
     <!-- 审批开始 -->
     <?php if(($iszong) == "1"): ?><div class="row">
         <div class="col-sm-6 ">
            <div class="cozxdjlpg  alert well">
                <form role="form" method='post' id="form_data_step43" class=" form-horizontal">
                    <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
                    <input type="hidden" name="step" id='step' value="step43">
                    <input type="hidden" name="dostep" id='dostep' value="step43">
                    <input type="hidden" name="done" id="done" value="1">
                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step43">
                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                  <fieldset >
                    <div class="form-group">
                      <label for="disabledTextInput">请选择步骤</label>
                     <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                         <option value="">请选择步骤</option>
                        <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect">审核意见</label>
                      <textarea class="form-control" id="coz_step43" name="comment" rows="3"></textarea>
                    </div>
                    <a class="btn btn-default nextstep hidden" step="step43">提交</a>
                  </fieldset>
                </form>
            </div>
        
         </div><!-- col-sm-6  -->
         <div class="col-sm-6">
             <div class="well " style="">
               <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step43')">不通过 </a>
               <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step43')" step="step43">通过   </a>
             </div>
         </div><!-- col-sm-6  -->
     </div> <!-- row -->
     
     <!-- 审批结束 --><?php endif; ?>
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
              
          
		  
	                  <div class="panel steps step51 panel-default">
	                    <div class="panel-heading" role="tab" id="headingsdh"><!-- id="sdh" -->
	                      <h4 class="panel-title"><!-- href="#sdh" -->
	                        <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step51" aria-expanded="true" aria-controls="collapseOne">
	                        51 审贷会
	                        </a>
	                      </h4>
	                    </div>
	                    <!-- id="sdh" -->
	                    <div id="step51" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
	                      <div class="panel-body">
	      <?php echo get_dai_log($id,'step51');?> 
    
	<?php if(($isxin) == "1"): ?><!-- 完成开始 -->
	                <form role="form" method='post' id="form_data_step51" class=" form-horizontal">
	                    <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
	                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
	                    <input type="hidden" name="step" id='step' value="step51">
	                    <input type="hidden" name="dostep" id='dostep' value="step51">
	                    <input type="hidden" name="done" id="done" value="1">
	                    <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step51">
	                    <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
	                    <input type="hidden" name="comment" value="完成">
	                </form>
	               <div class="well spxdjlpg" style="max-width:400px;margin:auto">
	                 <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step51')" step="step51">已完成</button>
	               </div>
	               <!-- 完成结果 --><?php endif; ?>
	                      </div> <!-- panel-body -->
	                    </div>
	                  </div><!-- panel -->
					  
	
                <div class="panel steps step52 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdh"><!-- id="sdh" -->
                    <h4 class="panel-title"><!-- href="#sdh" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step52" aria-expanded="true" aria-controls="collapseOne">
                      52 质询
                      </a>
                    </h4>
                  </div>
                  <!-- id="sdh" -->
                  <div id="step52" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step52');?> 
   <?php if(($isxin) == "1"): endif; ?>
                 <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=51&step=step52" allowtransparency="true" style="background-color=transparent" id="step52iframe" name="step52iframe" frameBorder=0 scrolling=auto width="100%"></iframe>   
              
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
			
	                  <div class="panel steps step53 panel-default">
	                    <div class="panel-heading" role="tab" id="headingsdh"><!-- id="sdh" -->
	                      <h4 class="panel-title"><!-- href="#sdh" -->
	                        <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step53" aria-expanded="true" aria-controls="collapseOne">
	                        5－3 表决
	                        </a>
	                      </h4>
	                    </div>
	                    <!-- id="sdh" -->
	                    <div id="step53" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
	                      <div class="panel-body">
	      <?php echo get_dai_log($id,'step53');?> 
   
	                <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=60&step=step53" allowtransparency="true" style="background-color=transparent" id="step53iframe" name="step53iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
    
	                      </div> <!-- panel-body -->
	                    </div>
	                  </div><!-- panel -->
					  								  
					  
                <div class="panel steps step54 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdhfk"><!-- id="sdh" -->
                    <h4 class="panel-title"><!-- href="#sdh" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step54" aria-expanded="true" aria-controls="collapseOne">
                      54 反馈客户
                      </a>
                    </h4>
                  </div>
                  <!-- id="sdhfk" -->
                  <div id="step54" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
      <?php if(($isxin) == "1"): ?><!-- 完成开始 -->
                   <form role="form" method='post' id="form_data_step54" class=" form-horizontal">
                       <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                       <input type="hidden" name="id" value="<?php echo ($id); ?>">
                       <input type="hidden" name="step" id='step' value="step54">
                       <input type="hidden" name="dostep" id='dostep' value="step54">
                       <input type="hidden" name="done" id="done" value="1">
                       <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step54">
                       <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                       <input type="hidden" name="comment" value="完成">
                   </form>
                  <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                    <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step54')" step="step54">已完成</button>
                  </div>
                  <!-- 完成结果 --><?php endif; ?>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
          
  
                <div class="panel steps step6 panel-default">
                  <div class="panel-heading" role="tab" id="headingqy"><!-- id="qy" -->
                    <h4 class="panel-title"><!-- href="#qy" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step6" aria-expanded="true" aria-controls="collapseOne">
                      6 签约
                      </a>
                    </h4>
                  </div>
                  <!-- id="qy" -->
                  <div id="step6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step6');?> 
	<?php if(($isxin) == "1"): ?><!-- 完成开始 -->
                    <form role="form" method='post' id="form_data_step6" class=" form-horizontal">
                        <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                        <input type="hidden" name="id" value="<?php echo ($id); ?>">
                        <input type="hidden" name="step" id='step' value="step6">
                        <input type="hidden" name="dostep" id='dostep' value="step6">
                        <input type="hidden" name="done" id="done" value="1">
                        <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step6">
                        <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                        <input type="hidden" name="comment" value="完成">
                    </form>
                   <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                     <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step6')" step="step6">已完成</button>
                   </div>
                   <!-- 完成结果 --><?php endif; ?>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step7 panel-default">
                  <div class="panel-heading" role="tab" id="headingdbsx"><!-- id="dbsx" -->
                    <h4 class="panel-title"><!-- href="#dbsx" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step7" aria-expanded="true" aria-controls="collapseOne">
                      7 办理担保/抵押手续
                      </a>
                    </h4>
                  </div>
                  <!-- id="dbsx" -->
                  <div id="step7" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step7');?> 
	<iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=67&step=step7" allowtransparency="true" style="background-color=transparent" id="step7iframe" name="step7iframe" frameBorder=0 scrolling=auto width="100%"></iframe> 
		  
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step81 panel-default">
                  <div class="panel-heading" role="tab" id="headingxdjlfksp"><!-- id="xdjlfksp" -->
                    <h4 class="panel-title"><!-- href="#xdjlfksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step81" aria-expanded="true" aria-controls="collapseOne">
                      8-1 信贷经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="xdjlfksp" -->
                  <div id="step81" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step81');?> 
                <!-- 审批开始 -->
     <?php if(($isxinj) == "1"): ?><div class="row">
                    <div class="col-sm-6 ">
                       <div class="cozxdjlpg  alert well">
                           <form role="form" method='post' id="form_data_step81" class=" form-horizontal">
                               <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                               <input type="hidden" name="id" value="<?php echo ($id); ?>">
                               <input type="hidden" name="step" id='step' value="step81">
                               <input type="hidden" name="dostep" id='dostep' value="step81">
                               <input type="hidden" name="done" id="done" value="1">
                               <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step81">
                               <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                             <fieldset >
                               <div class="form-group">
                                 <label for="disabledTextInput">请选择步骤</label>
                                <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                                    <option value="">请选择步骤</option>
                                   <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                                </select>
                               </div>
                               <div class="form-group">
                                 <label for="disabledSelect">审核意见</label>
                                 <textarea class="form-control" id="coz_step81" name="comment" rows="3"></textarea>
                               </div>
                               <a class="btn btn-default nextstep hidden" step="step81">提交</a>
                             </fieldset>
                           </form>
                       </div>
        
                    </div><!-- col-sm-6  -->
                    <div class="col-sm-6">
                        <div class="well " style="">
                          <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step81')">不通过 </a>
                          <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step81')" step="step81">通过   </a>
                        </div>
                    </div><!-- col-sm-6  -->
                </div> <!-- row --><?php endif; ?>
                <!-- 审批结束 -->
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step82 panel-default">
                  <div class="panel-heading" role="tab" id="headingfkjlfksp"><!-- id="fkjlfksp" -->
                    <h4 class="panel-title"><!-- href="#fkjlfksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step82" aria-expanded="true" aria-controls="collapseOne">
                      8-2 风控经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="fkjlfksp" -->
                  <div id="step82" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step82');?> 
          <!-- 审批开始 -->
     <?php if(($isfengj) == "1"): ?><div class="row">
              <div class="col-sm-6 ">
                 <div class="cozxdjlpg  alert well">
                     <form role="form" method='post' id="form_data_step82" class=" form-horizontal">
                         <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                         <input type="hidden" name="id" value="<?php echo ($id); ?>">
                         <input type="hidden" name="step" id='step' value="step82">
                         <input type="hidden" name="dostep" id='dostep' value="step82">
                         <input type="hidden" name="done" id="done" value="1">
                         <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step82">
                         <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                       <fieldset >
                         <div class="form-group">
                           <label for="disabledTextInput">请选择步骤</label>
                          <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                              <option value="">请选择步骤</option>
                             <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                          </select>
                         </div>
                         <div class="form-group">
                           <label for="disabledSelect">审核意见</label>
                           <textarea class="form-control" id="coz_step82" name="comment" rows="3"></textarea>
                         </div>
                         <a class="btn btn-default nextstep hidden" step="step82">提交</a>
                       </fieldset>
                     </form>
                 </div>
        
              </div><!-- col-sm-6  -->
              <div class="col-sm-6">
                  <div class="well " style="">
                    <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step82')">不通过 </a>
                    <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step82')" step="step82">通过   </a>
                  </div>
              </div><!-- col-sm-6  -->
          </div> <!-- row --><?php endif; ?>
          <!-- 审批结束 -->
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step83 panel-default">
                  <div class="panel-heading" role="tab" id="headingzxdsfksp"><!-- id="zxdsfksp" -->
                    <h4 class="panel-title"><!-- href="#zxdsfksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step83" aria-expanded="true" aria-controls="collapseOne">
                      8-3 执行董事放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="zxdsfksp" -->
                  <div id="step83" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step83');?> 
                
            <!-- 审批开始 -->
     <?php if(($iszhi) == "1"): ?><div class="row">
                <div class="col-sm-6 ">
                   <div class="cozxdjlpg  alert well">
                       <form role="form" method='post' id="form_data_step83" class=" form-horizontal">
                           <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                           <input type="hidden" name="id" value="<?php echo ($id); ?>">
                           <input type="hidden" name="step" id='step' value="step83">
                           <input type="hidden" name="dostep" id='dostep' value="step83">
                           <input type="hidden" name="done" id="done" value="1">
                           <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step83">
                           <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                         <fieldset >
                           <div class="form-group">
                             <label for="disabledTextInput">请选择步骤</label>
                            <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                                <option value="">请选择步骤</option>
                               <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                            </select>
                           </div>
                           <div class="form-group">
                             <label for="disabledSelect">审核意见</label>
                             <textarea class="form-control" id="coz_step83" name="comment" rows="3"></textarea>
                           </div>
                           <a class="btn btn-default nextstep hidden" step="step83">提交</a>
                         </fieldset>
                       </form>
                   </div>
        
                </div><!-- col-sm-6  -->
                <div class="col-sm-6">
                    <div class="well " style="">
                      <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step83')">不通过 </a>
                      <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step83')" step="step83">通过   </a>
                    </div>
                </div><!-- col-sm-6  -->
            </div> <!-- row --><?php endif; ?>
            <!-- 审批结束 -->
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step84 panel-default">
                  <div class="panel-heading" role="tab" id="headingzjlfksp"><!-- id="zjlfksp" -->
                    <h4 class="panel-title"><!-- href="#zjlfksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step84" aria-expanded="true" aria-controls="collapseOne">
                      8-4 总经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="zjlfksp" -->
                  <div id="step84" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step84');?> 
            <!-- 审批开始 -->
     <?php if(($iszong) == "1"): ?><div class="row">
                <div class="col-sm-6 ">
                   <div class="cozxdjlpg  alert well">
                       <form role="form" method='post' id="form_data_step84" class=" form-horizontal">
                           <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                           <input type="hidden" name="id" value="<?php echo ($id); ?>">
                           <input type="hidden" name="step" id='step' value="step84">
                           <input type="hidden" name="dostep" id='dostep' value="step84">
                           <input type="hidden" name="done" id="done" value="1">
                           <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step84">
                           <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                         <fieldset >
                           <div class="form-group">
                             <label for="disabledTextInput">请选择步骤</label>
                            <select class="form-control " id="bad_step" check="require" msg="请选择不通过的步骤！">
                                <option value="">请选择步骤</option>
                               <?php if(is_array($allsteps)): foreach($allsteps as $key=>$vo): ?><option value="<?php echo ($vo["step"]); ?>"><?php echo ($vo["id"]); ?> - <?php echo ($vo["name"]); endforeach; endif; ?>
                            </select>
                           </div>
                           <div class="form-group">
                             <label for="disabledSelect">审核意见</label>
                             <textarea class="form-control" id="coz_step84" name="comment" rows="3"></textarea>
                           </div>
                           <a class="btn btn-default nextstep hidden" step="step84">提交</a>
                         </fieldset>
                       </form>
                   </div>
        
                </div><!-- col-sm-6  -->
                <div class="col-sm-6">
                    <div class="well " style="">
                      <a  class="btn btn-danger btn-lg btn-block notdone" onclick="notdone('form_data_step84')">不通过 </a>
                      <a  class="btn btn-success btn-lg btn-block stepdone " onclick="stepdone('form_data_step84')" step="step84">通过   </a>
                    </div>
                </div><!-- col-sm-6  -->
            </div> <!-- row --><?php endif; ?>
            <!-- 审批结束 -->
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step85 panel-default">
                  <div class="panel-heading" role="tab" id="headingcwfksp"><!-- id="cwfksp" -->
                    <h4 class="panel-title"><!-- href="#cwfksp" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step85" aria-expanded="true" aria-controls="collapseOne">
                      8-5 财务放款
                      </a>
                    </h4>
                  </div>
                  <!-- id="cwfksp" -->
                  <div id="step85" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step85');?> 
	 <?php if(($iscai) == "1"): ?><!-- 完成开始 -->
                 <form role="form" method='post' id="form_data_step85" class=" form-horizontal">
                     <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                     <input type="hidden" name="id" value="<?php echo ($id); ?>">
                     <input type="hidden" name="step" id='step' value="step85">
                     <input type="hidden" name="dostep" id='dostep' value="step85">
                     <input type="hidden" name="done" id="done" value="1">
                     <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step85">
                     <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                     <input type="hidden" name="comment" value="完成">
                 </form>
                <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                  <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step85')" step="step85">已完成</button>
                </div>
                <!-- 完成结果 --><?php endif; ?>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step91 panel-default">
                  <div class="panel-heading" role="tab" id="headingzlzl"><!-- id="zlzl" -->
                    <h4 class="panel-title"><!-- href="#zlzl" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step91" aria-expanded="true" aria-controls="collapseOne">
                     9-1 整理资料
                      </a>
                    </h4>
                  </div>
                  <!-- id="zlzl" -->
                  <div id="step91" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
     <?php echo get_dai_log($id,'step91');?> 

     <?php if(($iszheng) == "1"): ?><!-- 完成开始 -->
                   <form role="form" method='post' id="form_data_step91" class=" form-horizontal">
                       <!-- <input type="hidden" name="ajax" id='ajax' value="1"> -->
                       <input type="hidden" name="id" value="<?php echo ($id); ?>">
                       <input type="hidden" name="step" id='step' value="step91">
                       <input type="hidden" name="dostep" id='dostep' value="step91">
                       <input type="hidden" name="done" id="done" value="1">
                       <input type="hidden" name="user_name" value="<?php echo get_user_name();?>" id="username_step91">
                       <input type="hidden" name="create_time" value="<?php echo ($now); ?>" id="time">
                       <input type="hidden" name="comment" value="完成">
                   </form>
                  <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                    <button type="button" class="btn btn-success btn-lg btn-block nextstep"  onclick="stepdone2('form_data_step91')" step="step91">已完成</button>
                  </div>
                  <!-- 完成结果 --><?php endif; ?>
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step92 panel-default">
                  <div class="panel-heading" role="tab" id="headinglrxt"><!-- id="lrxt" -->
                    <h4 class="panel-title"><!-- href="#lrxt" -->
                      <a class="block" data-toggle="collapse" data-parent="#accordion" href="#step92" aria-expanded="true" aria-controls="collapseOne">
                      9-2 录入系统
                      </a>
                    </h4>
                  </div>
                  <!-- id="lrxt" -->
                  <div id="step92" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    <?php echo get_dai_log($id,'step92');?> 
      <?php if(($iszheng) == "1"): ?><!-- <iframe src="index.php?m=customer&a=edit&dai=<?php echo ($id); ?>&step=step92" allowtransparency="true" style="background-color=transparent" id="step11iframe" name="step11iframe" frameBorder=0 scrolling=auto width="100%"></iframe> -->
		  	     <?php if(($DaiInfo["type"]) == "2"): ?><iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=58&step=step92" allowtransparency="true" style="background-color=transparent" id="step92iframe" name="step92iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
		  	      <?php else: ?>
		  	       <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($id); ?>&type=65&step=step92" allowtransparency="true" style="background-color=transparent" id="step92iframe" name="step92iframe" frameBorder=0 scrolling=auto width="100%"></iframe><?php endif; endif; ?>
                    </div> <!-- panel-body -->
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
 
	function stepdone2(form_data) {
     sendForm(form_data,"", "__SELF__");
      $('#myModal').modal('hide');
	};
    
  	function stepdone(form_data) {
        var badstep =$("#"+form_data+" #bad_step").val();
        if(badstep !==""){
            $("#"+form_data+" #step").val(badstep);
        }
        // alert("#step").val());
       sendForm(form_data,"", "__SELF__");
        $('#myModal').modal('hide');
  	};
    //不同意 1) step 变为 select的step 2）done改为2
  	function notdone(form_data) {
        var badstep =$("#"+form_data+" #bad_step").val();
         $("#"+form_data+" #step").val(badstep);
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