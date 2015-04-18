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
                          <li><a href="#" url="<?php echo U('flow/khdai');?>"  node="" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 信贷员受理贷款</a></li>
                      <li><a href="#" url="<?php echo U('flow/folderdai');?>" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 贷中</a></li>

                      <!-- <li><a href="#" url="http://localhost/liucheng/index.php?m=flow&a=editdai&id=6" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看step</a></li> -->


                      <li><a href="#" url="index.php?m=flow&a=dai&id=6" node="" onclick="click_top_menu(this)"><i class="fa fa-jpy"></i> 查看（测试）</a></li>
                      
                  
                    </ul>
                  </li>
                  
                  
                <li class="active"><a href="#" url="<?php echo U('flow/index');?>" node="87" onclick="click_top_menu(this)"> <i class="fa fa-pencil"></i> 工作流程</a></li>
                <li  class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 客户档案 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">贷款审批</a></li>
                    <li><a href="#">工作流程</a></li>
                    <li><a href="#" url="index.php?m=customer&amp;a=index" node="157" onclick="click_top_menu(this)">客户档案</a></li>
                  
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
									

<style>
.bianma{width:80px;}
.addtj{display:none;}
.sidebar{display:none;}
</style>


<!-- PAGE CONTENT BEGINS -->
<style type="text/css" media="screen">

</style>						

<div class="col-sm-12  hidden-print">
    <h1 style="color:green"><i class="fa fa-group"></i> <?php echo get_system_config("SYSTEM_NAME");?></h1>
  
</div>
<div class="page-header">
  <h1> <?php echo ($CompanyName['name']); ?> 
      <div class="text-center">
            <b> 贷款流程审批 </b>
      </div></h1>
</div>

<div class="alert alert-danger" role="alert">
 	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-users"></i> 申请人</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
	   <span id="username"> <?php echo (get_customer_name_46($flowid)); ?>  </span>	</p>
					</div>
	</div>
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-user"></i> 受理人</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
             	<span  id="username"> <?php echo get_user_name();?> 		</p>
					</div>
	</div>
    
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-money"></i>  贷款金额</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				<?php echo (get_customer_money_46($flowid)); ?>元	</p>
					</div>
	</div>
	
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-phone"></i> 联系方式</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				  <?php echo ($UserInfo['mobile_tel']); ?> 		</p>
					</div>
	</div>
    
	<div class="form-group  col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-calendar"></i> 申请时间</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				 <?php echo (date("Y-m-d H:i:s",$create_date)); ?> 		</p>
					</div>
	</div>
	
	
	
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for=""><i class="fa fa-calendar"></i> 受理时间</label>
		<div class="col-sm-8">
			<p id="" class="form-control-static address_list">
				  <?php echo (date("Y-m-d H:i:s",$NowTime)); ?>    		</p>
					</div>
	</div>
    <br style="clear:both;">
</div>


                         
<div class="col-xs-12">
    
    <div class="pull-left text-center green">
<a class="btn btn-app liu-nav  btn-xs  btn-success">
    <i class="fa fa-file-o bigger-100"></i>
    申请															
</a>
<br/>
 <?php echo (get_customer_name_46($flowid)); ?><br/>
 <?php echo (date("Y-m-d H:i:s",$create_date)); ?> 	
</div> 

</div>     
<div class="col-xs-12">
    
<a class="narror down pull-left ">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
    
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs btn-danger" panel="step21" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    受理																
</a>
<br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>

<div class="pull-left text-center">

<a class="btn btn-app liu-nav btn-xs " panel="step21" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    面谈																
</a>

<br/>
杨枫<br/>
2014-12-25
</div> 

<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs "  panel="step22" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    材料收集																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs "  panel="step23" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    分析																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left ">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center">
<a class="btn btn-app liu-nav btn-xs "  panel="step24" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    风控审批																
</a><br/>
杨枫<br/>
2014-12-25
</div> 

</div> 

     
<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center">
    <a class="btn btn-app liu-nav btn-xs" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    实地考察																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    双人双岗																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    调查提纲																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step3" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    调查底稿																
</a><br/>
杨枫<br/>
2014-12-25
</div> 


</div>      
<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step411" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    评估																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>

<div class="well  pull-left" style="max-width: 400px; margin: 0 auto 10px;margin-top: -30px;">
    <a class="btn btn-app liu-nav btn-block btn-xs"  panel="step411" data-toggle="modal" data-target="#myModal">
        信贷经理																
    </a><br/>
    <a class="btn btn-app liu-nav btn-block btn-xs" panel="step412" data-toggle="modal" data-target="#myModal">
        风控经理																
    </a>
    </div>
    
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step42" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    执行董事																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step43" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    总经理																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
</div>   


<div class="col-xs-12">
    
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step51" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    审贷会																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step51" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    审贷会资料																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step51" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    质询															
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step51" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    表决															
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step52" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    反馈客户																
</a><br/>
杨枫<br/>
2014-12-25
</div> 

</div> 



<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step6" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    签约																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step6" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    客户签合同																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
</div>  




<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step7" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    担保手续																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step7" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    客户办手续																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
</div>  


<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step81" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    放款																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step81" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    信贷经理																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step82" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    风控经理																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step83" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    执行董事																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step84" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    总经理																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step85" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    财务																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
</div> 


<div class="col-xs-12">
<a class="narror down pull-left">
    <i class="fa fa-arrow-down  "></i>															
</a>

</div>  
<div class="col-xs-12">
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step91" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-file-o bigger-100"></i>
    归档																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step91" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    整理资料																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
<a class="narror right pull-left">
    <i class="fa   fa-arrow-right"></i>															
</a>
<div class="pull-left text-center"><a class="btn btn-app liu-nav btn-xs" panel="step92" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-comments bigger-100"></i>
    录入系统																
</a><br/>
杨枫<br/>
2014-12-25
</div> 
</div>   
                           
        <!-- PAGE CONTENT ENDS -->

		<div class="pull-right text-right " style="
	    position: absolute;
    top: 0px;
    right: 20px;">
	<!--	<a onclick="go_return_url();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-list"></span>返回</a> -->
    <div style="margin-right:10px;margin-top:5px" >
         编号：<a href="index.php?m=flow&a=dai&id=<?php echo ($daiid); ?>">贷-<?php echo (date('ymd',$NowTime)); ?></a>
    </div>
			<?php if(($flow_type["is_lock"]) == "0"): ?><a onclick="popup_confirm();"  class="btn btn-sm btn-warning hidden-print hidden"><i class="fa fa-cubes"></i> 选择审批流程</a><?php endif; ?>
          
			<a   onclick="winprint();"  class="btn btn-sm btn-primary hidden-print hidden"><i class="fa fa-print"></i> 打印流程图</a>

    	</div>
	</div>


<div class="clearfix"></div>
<div class="alert alert-danger text-center  hidden-print" role="alert">
		<a onclick="save(20);"  class="btn btn-sm btn-danger"><i class="fa fa-arrow-circle-up"></i> 储存表单</a>
			<a onclick="save(10);"  class="btn btn-sm btn-primary"><i class="fa fa-save"></i> 储存草稿</a>
</div>




<!-- 弹窗开始 -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
            <h4 class="modal-title" id="myModalLabel">客户：黄元生 / 金额：100000</h4>
          </div>
                <div class="modal-body">
       

              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
   
                <div class="panel steps panel-default step21">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#step21" aria-expanded="false" aria-controls="collapseTwo">
                       2-1  面谈客户
                      </a>
                    </h4>
                  </div>
                  <div id="step21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
      
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="presentation active"><a href="#home" role="tab" data-toggle="tab">线上</a></li>
                      <li role="presentation " class="presentation profile"><a href="#profile" role="tab" data-toggle="tab">线下</a></li>
                    </ul> 
                     <!-- Tab panes -->
                     <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="home">
  
  <iframe src="index.php?m=flow&a=editdai&id=<?php echo ($daiid); ?>&type=44&step=step21" allowtransparency="true" style="background-color=transparent" id="step21iframe" name="step21iframe" frameBorder=0 scrolling=auto width="100%"></iframe>
  
  
                       </div>
                       <div role="tabpanel" class="tab-pane" id="profile">
 
                       <form class="form-horizontal" role="form">
                         <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label"> 第一步:</label>
                           <div class="col-sm-10">
                            <p class="form-control-static"> <a class="btn btn-info btn-xs">点击此打印面谈表格</a></p>
                           </div>
                         </div>
                         <div class="form-group">
                           <label for="inputPassword3" class="col-sm-2 control-label"> 第二步:</label>
                           <div class="col-sm-10">
                           <input type="file" id="exampleInputFile">
                              <p class="help-block">请在此上传面谈记录表格</p>
                           </div>
                         </div>
                         <div class="form-group">
                           <label for="inputPassword3" class="col-sm-2 control-label"> 第三步:</label>
                           <div class="col-sm-10">
                            <textarea class="form-control " id="" name="" rows="3">填写简评</textarea>
                           </div>
                         </div>
 
                       </form>
  
                       </div>
                     </div>
       

                 <a class="btn btn-primary btn-sm">保存</a>
                 <a class="btn btn-success btn-sm step-done" step="step21">完成</a>
       
                    </div>
                  </div>
                </div>
                <div class="panel steps step22 panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#step22" href="#step22" aria-expanded="false" aria-controls="collapseThree">
                       2-2 客户资料信息收集
                      </a>
                    </h4>
                  </div>
                  <div id="step22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
       
             <?php if(is_array($field_list_1_1)): $i = 0; $__LIST__ = $field_list_1_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo W('FlowField',$vo); endforeach; endif; else: echo "" ;endif; ?>
       
       
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label"> ＃1 借款人身份证扫描件:</label>
                          <div class="col-sm-7">
                          <input type="file" id="exampleInputFile">
                             <p class="help-block"></p>
                          </div>
                        </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃2  借款人配偶身份证扫描件:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block"></p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃3  户口本:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block"></p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃4  结婚证:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block"></p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃5  学历证明:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block"></p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃6  收入证明:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block">连续6个月以上的银行流水单或存折复印件</p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃7  公司营业执照副本复印件:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block"></p>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputPassword3" class="col-sm-5 control-label">＃8  验资报告:</label>
                         <div class="col-sm-7">
                         <input type="file" id="exampleInputFile">
                            <p class="help-block">连续6个月以上的公司银行流水，近2年的审计报表</p>
                         </div>
                       </div>
 
       
             <a class="btn btn-primary btn-sm">保存</a>
             <a class="btn btn-success btn-sm step-done" step="step22">完成</a>
       
                    </div>
                  </div>
                </div>
  
             <div class="panel steps step23 panel-default">
               <div class="panel-heading" role="tab" id="headingThree">
                 <h4 class="panel-title">
                   <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#step23" aria-expanded="false" aria-controls="collapseThree">
                    2-3 分析
                   </a>
                 </h4>
               </div>
               <div id="step23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                 <div class="panel-body">
      
       
             <a class="btn btn-primary btn-sm">保存</a>
             <a class="btn btn-success btn-sm step-done" step="step23">完成</a>
       
                 </div>
               </div>
             </div>
   
                <div class="panel steps step24 panel-default">
                  <div class="panel-heading" role="tab" id="headingfksp">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#step24" aria-expanded="true" aria-controls="collapseOne">
                        2-4 风控审批
                      </a>
                    </h4>
                  </div>
                  <div id="step24" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                      <div class="well spfksp"  style="max-width:400px;margin:auto">
                          <button type="button" class="btn btn-danger btn-lg btn-block notdone">不通过</button>
                          <button type="button" class="btn btn-success btn-lg btn-block step-done" step="step24">通过</button>
                        </div>
    
                        <div class="cozfksp hidden" >
              
                            <form role="form">
                                <input type="hidden" name="time" value="2014-12-25 12:35" id="time">
                                <input type="hidden" name="username" value="马建国" id="username">
                              <fieldset >
                                <div class="form-group">
                                  <label for="disabledTextInput">请选择步骤</label>
                                 <select class="form-control bzfksp">
                                   <option vaule="用户基本信息">1 用户基本信息</option>
                                   <option vaule="面淡信息">2 面淡信息</option>
                                   <option vaule="材料收集">3 材料收集</option>
                                   <option vaule="分析">4 分析</option>
                                 </select>
                                </div>
                                <div class="form-group">
                                  <label for="disabledSelect">不通过原因</label>
                                  <textarea class="form-control cozinfofksp" id="" name="" rows="3"></textarea>
                                </div>
                                <a class="btn btn-primary addfksp">添加</a>
                  
                                <table class="table tablefksp table-striped" >
                                    <tr><th>序号</th><th>步骤</th><th>不通过原因</th><th>审批时间</th><th>审批人</th></tr>
                                </table>
                  
                              </fieldset>
                            </form>
              
                           
                        </div>

                        <script type="text/javascript">
                            $(".notdone").click(function(){
                 
                                $(".cozfksp").removeClass("hidden");
                                $(".spfksp").addClass("hidden");
                            });
                            var id =1;
                            $(".addfksp").click(function(){
                                $(".tablefksp").append("<tr class=warning><td>"+id+"</td><td>"+$(".bzfksp").val()+"</td><td>"+$(".cozinfofksp").val()+"</td><td>"+$("#time").val()+"</td><td>"+$("#username").val()+"</td></tr>");
                                id++;
                                $(".zlsj").addClass("btn-danger").removeClass("btn-success");
                            })
                        </script>
                
                    </div>
                  </div>
                </div><!-- panel -->
 
                <div class="panel steps step3 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdkc"><!-- id="headingfksp" -->
                    <h4 class="panel-title"><!-- href="#fksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step3" aria-expanded="true" aria-controls="collapseOne">
                      3  实地考察
                      </a>
                    </h4>
                  </div>
                  <!-- id="fksp" -->
                  <div id="step3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          

                            <a class="btn btn-primary btn-sm">保存</a>
                            <a class="btn btn-success btn-sm step-done" step="step3">完成</a>
                  
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step411 panel-default">
                  <div class="panel-heading" role="tab" id="headingxdjlpg"><!-- id="xdjlpg" -->
                    <h4 class="panel-title"><!-- href="#xdjlpg" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step411" aria-expanded="true" aria-controls="collapseOne">
                      4-1-1信贷经理评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="xdjlpg" -->
                  <div id="step411" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <div class="well spxdjlpg" style="max-width:400px;margin:auto">
                      <button type="button" class="btn btn-danger btn-lg btn-block notdone">不通过</button>
                      <button type="button" class="btn btn-success btn-lg btn-block step-done" step="step411">通过</button>
                    </div>

                    <div class="cozxdjlpg hidden" >
          
                        <form role="form">
                            <input type="hidden" name="time" value="2014-12-25 12:35" id="time">
                            <input type="hidden" name="username" value="马建国" id="username">
                          <fieldset >
                            <div class="form-group">
                              <label for="disabledTextInput">请选择步骤</label>
                             <select class="form-control bzfksp">
                               <option vaule="用户基本信息">1 用户基本信息</option>
                               <option vaule="面淡信息">2 面淡信息</option>
                               <option vaule="材料收集">3 材料收集</option>
                               <option vaule="分析">4 分析</option>
                             </select>
                            </div>
                            <div class="form-group">
                              <label for="disabledSelect">不通过原因</label>
                              <textarea class="form-control cozinfofksp" id="" name="" rows="3"></textarea>
                            </div>
                            <a class="btn btn-primary addfksp">添加</a>
              
                            <table class="table tablefksp table-striped" >
                                <tr><th>序号</th><th>步骤</th><th>不通过原因</th><th>审批时间</th><th>审批人</th></tr>
                            </table>
              
                          </fieldset>
                        </form>
          
                       
                    </div>

                    <script type="text/javascript">
                        $(".notdone").click(function(){
             
                            $(".cozxdjlpg").removeClass("hidden");
                            $(".spxdjlpg").addClass("hidden");
                        });
                        var id =1;
                        $(".addfksp").click(function(){
                            $(".tablefksp").append("<tr class=warning><td>"+id+"</td><td>"+$(".bzfksp").val()+"</td><td>"+$(".cozinfofksp").val()+"</td><td>"+$("#time").val()+"</td><td>"+$("#username").val()+"</td></tr>");
                            id++;
                            $(".zlsj").addClass("btn-danger").removeClass("btn-success");
                        })
                    </script>
              
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step412 panel-default">
                  <div class="panel-heading" role="tab" id="headingfkjlpg"><!-- id="fkjlpg" -->
                    <h4 class="panel-title"><!-- href="#fkjlpg" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step412" aria-expanded="true" aria-controls="collapseOne">
                      4-1-2 风控经理评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="fkjlpg" -->
                  <div id="step412" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step42 panel-default">
                  <div class="panel-heading" role="tab" id="headingzxdspg"><!-- id="zxdspg" -->
                    <h4 class="panel-title"><!-- href="#zxdspg" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step42" aria-expanded="true" aria-controls="collapseOne">
                      4-2 执行董事评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="zxdspg" -->
                  <div id="step42" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step43 panel-default">
                  <div class="panel-heading" role="tab" id="headingjzlpg"><!-- id="jzlpg" -->
                    <h4 class="panel-title"><!-- href="#jzlpg" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step43" aria-expanded="true" aria-controls="collapseOne">
                      4-3 总经理评估
                      </a>
                    </h4>
                  </div>
                  <!-- id="jzlpg" -->
                  <div id="step43" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step51 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdh"><!-- id="sdh" -->
                    <h4 class="panel-title"><!-- href="#sdh" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step51" aria-expanded="true" aria-controls="collapseOne">
                      51 审贷会
                      </a>
                    </h4>
                  </div>
                  <!-- id="sdh" -->
                  <div id="step51" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                    <a class="btn btn-primary btn-sm">保存</a>
                    <a class="btn btn-success btn-sm step-done" step="step51">完成</a>
          
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
          
                <div class="panel steps step52 panel-default">
                  <div class="panel-heading" role="tab" id="headingsdhfk"><!-- id="sdh" -->
                    <h4 class="panel-title"><!-- href="#sdh" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step52" aria-expanded="true" aria-controls="collapseOne">
                      52 反馈客户
                      </a>
                    </h4>
                  </div>
                  <!-- id="sdhfk" -->
                  <div id="step52" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                    <a class="btn btn-primary btn-sm">保存</a>
                    <a class="btn btn-success btn-sm step-done" step="step52">完成</a>
          
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
          
  
                <div class="panel steps step6 panel-default">
                  <div class="panel-heading" role="tab" id="headingqy"><!-- id="qy" -->
                    <h4 class="panel-title"><!-- href="#qy" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step6" aria-expanded="true" aria-controls="collapseOne">
                      6 签约
                      </a>
                    </h4>
                  </div>
                  <!-- id="qy" -->
                  <div id="step6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                 <a class="btn btn-primary btn-sm">保存</a>
                 <a class="btn btn-success btn-sm step-done" step="step6">完成</a>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step7 panel-default">
                  <div class="panel-heading" role="tab" id="headingdbsx"><!-- id="dbsx" -->
                    <h4 class="panel-title"><!-- href="#dbsx" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step7" aria-expanded="true" aria-controls="collapseOne">
                      7 办理担保手续
                      </a>
                    </h4>
                  </div>
                  <!-- id="dbsx" -->
                  <div id="step7" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                    <a class="btn btn-primary btn-sm">保存</a>
                    <a class="btn btn-success btn-sm step-done" step="step7">完成</a>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step81 panel-default">
                  <div class="panel-heading" role="tab" id="headingxdjlfksp"><!-- id="xdjlfksp" -->
                    <h4 class="panel-title"><!-- href="#xdjlfksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step81" aria-expanded="true" aria-controls="collapseOne">
                      8-1 信贷经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="xdjlfksp" -->
                  <div id="step81" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step82 panel-default">
                  <div class="panel-heading" role="tab" id="headingfkjlfksp"><!-- id="fkjlfksp" -->
                    <h4 class="panel-title"><!-- href="#fkjlfksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step82" aria-expanded="true" aria-controls="collapseOne">
                      8-2 风控经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="fkjlfksp" -->
                  <div id="step82" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step83 panel-default">
                  <div class="panel-heading" role="tab" id="headingzxdsfksp"><!-- id="zxdsfksp" -->
                    <h4 class="panel-title"><!-- href="#zxdsfksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step83" aria-expanded="true" aria-controls="collapseOne">
                      8-3 执行董事放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="zxdsfksp" -->
                  <div id="step83" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step84 panel-default">
                  <div class="panel-heading" role="tab" id="headingzjlfksp"><!-- id="zjlfksp" -->
                    <h4 class="panel-title"><!-- href="#zjlfksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step84" aria-expanded="true" aria-controls="collapseOne">
                      8-4 总经理放款审批
                      </a>
                    </h4>
                  </div>
                  <!-- id="zjlfksp" -->
                  <div id="step84" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step85 panel-default">
                  <div class="panel-heading" role="tab" id="headingcwfksp"><!-- id="cwfksp" -->
                    <h4 class="panel-title"><!-- href="#cwfksp" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step85" aria-expanded="true" aria-controls="collapseOne">
                      8-5 财务放款
                      </a>
                    </h4>
                  </div>
                  <!-- id="cwfksp" -->
                  <div id="step85" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step91 panel-default">
                  <div class="panel-heading" role="tab" id="headingzlzl"><!-- id="zlzl" -->
                    <h4 class="panel-title"><!-- href="#zlzl" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step91" aria-expanded="true" aria-controls="collapseOne">
                     9-1 整理资料
                      </a>
                    </h4>
                  </div>
                  <!-- id="zlzl" -->
                  <div id="step91" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                    <a class="btn btn-primary btn-sm">保存</a>
                    <a class="btn btn-success btn-sm step-done" step="step91">完成</a>
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
                <div class="panel steps step92 panel-default">
                  <div class="panel-heading" role="tab" id="headinglrxt"><!-- id="lrxt" -->
                    <h4 class="panel-title"><!-- href="#lrxt" -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#step92" aria-expanded="true" aria-controls="collapseOne">
                      9-2 录入系统
                      </a>
                    </h4>
                  </div>
                  <!-- id="lrxt" -->
                  <div id="step92" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
    
                  <label for="forms">FORMS</label><input type="text" name="forms" value="" id="forms">

                    <a class="btn btn-primary btn-sm">保存</a>
                    <a class="btn btn-success btn-sm step-done" step="step92">完成</a>
          
                    </div> <!-- panel-body -->
                  </div>
                </div><!-- panel -->
  
  
          </div> <!-- panel group -->

                
                </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary showself" >当前步骤</button>
            <button type="button" class="btn btn-success showall" >显示所有</button>
            <button type="button" class="btn btn-danger openall" >展开所有</button>
            <!-- <button type="button" class="btn btn-success" data-dismiss="modal">完成</button> -->
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
            $("#"+$(this).attr("panel")).addClass("in").css("height","auto");
        })
    
        $(".openall").click(function(){     //打开所有 panel
             $(".steps").removeClass("hidden");
            $(".panel-collapse").removeClass("in").css("height","0");
            $(".panel-collapse").addClass("in").css("height","auto");
        })
    
        // 点 完成 变绿，下一个变红
        var steps =new Array("step21","step22","step23","step24","step3","step411","step412","step42","step43","step51","step52","step6","step7","step81","step82","step83","step84","step85","step91","step92");
        // alert(steps[steps.indexOf(aa)+1]); //取得下一个数组
    
        $('.step-done').click(function() {
            // alert($(this).attr("step")); // 取得当前步
            var nowstep = $(this).attr("step");
            var neststep = steps[steps.indexOf(nowstep)+1];
            $("[panel='"+nowstep+"']").removeClass("btn-danger").addClass("btn-success");//当前步变绿
            $("[panel='"+neststep+"']").addClass("btn-danger");//下一步变红
            //打开下一步
            // $(".panel-collapse").removeClass("in").css("height","0");
     //        $("#"+neststep).addClass("in").css("height","auto");
             // 关闭弹窗
             $('#myModal').modal('hide');
        });
        
        
	}); 

	function save(step){
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


       
    
    </script>

<!-- inline scripts related to this page -->
</body>
</html>