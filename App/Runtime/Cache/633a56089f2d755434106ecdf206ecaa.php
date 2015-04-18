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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-group"></i> 客户档案 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">贷款审批</a></li>
                    <li><a href="#">工作流程</a></li>
                    <li><a href="#" url="index.php?m=customer&amp;a=index" node="235" onclick="click_top_menu(this)">客户档案</a></li>
                  
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
									
<?php echo W('PageHeader',array('name'=>'编辑工作日报','search'=>'N'));?>
<form method='post' id="form_data" name="form_data" enctype="multipart/form-data"   class="well form-horizontal">
	<input type="hidden" id="id" name="id" value="<?php echo ($vo["id"]); ?>">
	<input type="hidden" id="ajax" name="ajax" value="0">
	<input type="hidden" id="add_file" name="add_file">
	<input type="hidden" id="opmode" name="opmode" value="edit">
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td class="col-5 text-center" rowspan="2">
				<br>
				事项
				<br>
				顺序</td>
				<td class="col-5 text-center" rowspan="2">按ABC
				<br>
				分类</td>
				<td class="col-8 text-center" rowspan="2">
				<br>
				<br>
				起止时间</td>
				<td class="text-center" colspan="4">今日事项
				要事第一
				<br>
				（A类最重要 B类重要 C类次重要）</td>
			</tr>
			<tr >
				<td class="text-center">事项</td>
				<td class="text-center">推进目标</td>
				<td class="text-center">实际推进情况详情描述</td>
				<td class="text-center col-8">完成打√</td>
			</tr>
			<tr >
				<td class="text-center" >1</td>
				<td>
				<input class="col-3 text-center" name="row1_1" value="<?php echo ($vo["row1_1"]); ?>"/>
				</td>
				<td class="text-center" >8:00-9:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row1_2"]); ?>" name="row1_2"/>
				</td>
				<td>				<textarea name="row1_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row1_3"]); ?></textarea></td>
				<td>				<textarea name="row1_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row1_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row1_5" class="col-3 text-center" value="<?php echo ($vo["row1_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >2</td>
				<td>
				<input name="row2_1" class="col-3 text-center" value="<?php echo ($vo["row2_1"]); ?>"/>
				</td>
				<td class="text-center" >9:00-10:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row2_2"]); ?>" name="row2_2"/>
				</td>
				<td>				<textarea name="row2_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row2_3"]); ?></textarea></td>
				<td>				<textarea name="row2_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row2_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row2_5" class="col-3 text-center" value="<?php echo ($vo["row2_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >3</td>
				<td>
				<input name="row3_1" class="col-3 text-center" value="<?php echo ($vo["row3_1"]); ?>"/>
				</td>
				<td class="text-center" >10:00-11:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row3_2"]); ?>" name="row3_2"/>
				</td>
				<td>				<textarea name="row3_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row3_3"]); ?></textarea></td>
				<td>				<textarea name="row3_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row3_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row3_5" class="col-3 text-center" value="<?php echo ($vo["row3_5"]); ?>"/>
				</td>
			</tr>

			<tr >
				<td class="text-center" >4</td>
				<td>
				<input name="row4_1" class="col-3 text-center" value="<?php echo ($vo["row4_1"]); ?>"/>
				</td>
				<td class="text-center" >11:00-11:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row4_2"]); ?>" name="row4_2"/>
				</td>
				<td>				<textarea name="row4_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row4_3"]); ?></textarea></td>
				<td>				<textarea name="row4_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row4_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row4_5" class="col-3 text-center" value="<?php echo ($vo["row4_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >5</td>
				<td>
				<input name="row5_1" class="col-3 text-center" value="<?php echo ($vo["row5_1"]); ?>"/>
				</td>
				<td class="text-center" >13:30-14:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row5_2"]); ?>" name="row5_2"/>
				</td>
				<td>				<textarea name="row5_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row5_3"]); ?></textarea></td>
				<td>				<textarea name="row5_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row5_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row5_5" class="col-3 text-center" value="<?php echo ($vo["row5_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >6</td>
				<td>
				<input name="row6_1" class="col-3 text-center" value="<?php echo ($vo["row6_1"]); ?>"/>
				</td>
				<td class="text-center" >14:30-15:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row6_2"]); ?>" name="row6_2"/>
				</td>
				<td>				<textarea name="row6_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row6_3"]); ?></textarea></td>
				<td>				<textarea name="row6_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row6_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row6_5" class="col-3 text-center" value="<?php echo ($vo["row6_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >7</td>
				<td>
				<input name="row7_1" class="col-3 text-center" value="<?php echo ($vo["row7_1"]); ?>"/>
				</td>
				<td class="text-center" >15:30-16:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row7_2"]); ?>" name="row7_2"/>
				</td>
				<td>				<textarea name="row7_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row7_3"]); ?></textarea></td>
				<td>				<textarea name="row7_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row7_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row7_5" class="col-3 text-center" value="<?php echo ($vo["row7_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >8</td>
				<td>
				<input name="row8_1" class="col-3 text-center" value="<?php echo ($vo["row8_1"]); ?>"/>
				</td>
				<td class="text-center" >16:30-17:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row8_2"]); ?>" name="row8_2"/>
				</td>
				<td>				<textarea name="row8_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row8_3"]); ?></textarea></td>
				<td>				<textarea name="row8_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row8_3"]); ?></textarea></td>
				<td class="text-center">
				<input name="row8_5" class="col-3 text-center" value="<?php echo ($vo["row8_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >9</td>
				<td>
				<input name="row9_1" class="col-3 text-center" value="<?php echo ($vo["row9_1"]); ?>"/>
				</td>
				<td class="text-center" >17:30-18:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row9_2"]); ?>" name="row9_2"/>
				</td>
				<td>				<textarea name="row9_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row9_3"]); ?></textarea></td>
				<td>				<textarea name="row9_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row9_3"]); ?></textarea></td>
				<td class="text-center">
				<input name="row9_5" class="col-3 text-center" value="<?php echo ($vo["row9_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >10</td>
				<td>
				<input name="row10_1" class="col-3 text-center" value="<?php echo ($vo["row10_1"]); ?>"/>
				</td>
				<td class="col-10" >18:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row10_2"]); ?>" name="row10_2"/>
				</td>
				<td>				<textarea name="row10_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row10_3"]); ?></textarea></td>
				<td>				<textarea name="row10_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row10_3"]); ?></textarea></td>
				<td class="text-center">
				<input name="row10_5" class="col-3 text-center" value="<?php echo ($vo["row10_5"]); ?>"/>
				</td>
			</tr>
			<tr height="0" style="visibility:hidden;">
				<td width="45" style="width: 34pt;"></td>
				<td width="45" style="width: 34pt;"></td>
				<td width="85" style="width: 64pt;"></td>
				<td width="165" style="width: 124pt;"></td>
				<td width="285" style="width: 214pt;"></td>
				<td width="285" style="width: 214pt;"></td>
				<td width="85" style="width: 64pt;"></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td class="col-5 text-center" rowspan="2">
				<br>
				事项
				<br>
				顺序</td>
				<td class="col-5 text-center" rowspan="2">按ABC
				<br>
				分类</td>
				<td class="col-8 text-center" rowspan="2">
				<br>
				<br>
				起止时间</td>
				<td class="text-center" colspan="4">明日计划
				要事第一
				<br>
				（A类最重要 B类重要 C类次重要）</td>
			</tr>
			<tr >
				<td class="text-center">事项</td>
				<td class="text-center">推进目标</td>
				<td class="text-center">实际推进情况详情描述</td>
				<td class="text-center col-8">完成期限</td>
			</tr>
			<tr >
				<td class="text-center" >1</td>
				<td>
				<input name="row11_1" class="col-3 text-center" value="<?php echo ($vo["row11_1"]); ?>"/>
				</td>
				<td class="text-center" >8:00-9:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row11_2"]); ?>" name="row11_2"/>
				</td>
				<td>				<textarea name="row11_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row11_3"]); ?></textarea></td>
				<td>				<textarea name="row11_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row11_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row11_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row11_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >2</td>
				<td>
				<input name="row12_1" class="col-3 text-center" value="<?php echo ($vo["row12_1"]); ?>"/>
				</td>
				<td class="text-center" >9:00-10:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row12_2"]); ?>" name="row12_2"/>
				</td>
				<td>				<textarea name="row12_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row12_3"]); ?></textarea></td>
				<td>				<textarea name="row12_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row12_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row12_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row12_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >3</td>
				<td>
				<input name="row13_1" class="col-3 text-center" value="<?php echo ($vo["row13_1"]); ?>"/>
				</td>
				<td class="text-center" >10:00-11:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row13_2"]); ?>" name="row13_2"/>
				</td>
				<td>				<textarea name="row13_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row13_3"]); ?></textarea></td>
				<td>				<textarea name="row13_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row13_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row13_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row13_5"]); ?>"/>
				</td>
			</tr>

			<tr >
				<td class="text-center" >4</td>
				<td>
				<input name="row14_1" class="col-3 text-center" value="<?php echo ($vo["row14_1"]); ?>"/>
				</td>
				<td class="text-center" >11:00-11:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row14_2"]); ?>" name="row14_2"/>
				</td>
				<td>				<textarea name="row14_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row14_3"]); ?></textarea></td>
				<td>				<textarea name="row14_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row14_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row14_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row14_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >5</td>
				<td>
				<input name="row15_1" class="col-3 text-center" value="<?php echo ($vo["row15_1"]); ?>"/>
				</td>
				<td class="text-center" >13:30-14:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row15_2"]); ?>" name="row15_2"/>
				</td>
				<td>				<textarea name="row15_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row15_3"]); ?></textarea></td>
				<td>				<textarea name="row15_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row15_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row15_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row15_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >6</td>
				<td>
				<input name="row16_1" class="col-3 text-center" value="<?php echo ($vo["row16_1"]); ?>"/>
				</td>
				<td class="text-center" >14:30-15:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row16_2"]); ?>" name="row16_2"/>
				</td>
				<td>				<textarea name="row16_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row16_3"]); ?></textarea></td>
				<td>				<textarea name="row16_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row16_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row16_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row16_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >7</td>
				<td>
				<input name="row17_1" class="col-3 text-center" value="<?php echo ($vo["row17_1"]); ?>"/>
				</td>
				<td class="text-center" >15:30-16:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row17_2"]); ?>" name="row17_2"/>
				</td>
				<td>				<textarea name="row17_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row17_3"]); ?></textarea></td>
				<td>				<textarea name="row17_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row17_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row17_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row17_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >8</td>
				<td>
				<input name="row18_1" class="col-3 text-center" value="<?php echo ($vo["row18_1"]); ?>"/>
				</td>
				<td class="text-center" >16:30-17:30</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row18_2"]); ?>" name="row18_2"/>
				</td>
				<td>				<textarea name="row18_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row18_3"]); ?></textarea></td>
				<td>				<textarea name="row18_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row18_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row18_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row18_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >9</td>
				<td>
				<input name="row19_1" class="col-3 text-center" value="<?php echo ($vo["row19_1"]); ?>"/>
				</td>
				<td class="text-center" >17:30-18:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row19_2"]); ?>" name="row19_2"/>
				</td>
				<td>				<textarea name="row19_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row19_3"]); ?></textarea></td>
				<td>				<textarea name="row19_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row19_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row19_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row19_5"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center" >10</td>
				<td>
				<input name="row20_1" class="col-3 text-center" value="<?php echo ($vo["row20_1"]); ?>"/>
				</td>
				<td class="col-10" >18:00</td>
				<td>
				<input style="width:100%;" value="<?php echo ($vo["row20_2"]); ?>" name="row20_2"/>
				</td>
				<td>				<textarea name="row20_3" rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row20_3"]); ?></textarea></td>
				<td>				<textarea name="row20_4"rows="1" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row20_4"]); ?></textarea></td>
				<td class="text-center">
				<input name="row20_5" data-date-format="yyyy-mm-dd" class="input-date" value="<?php echo ($vo["row20_5"]); ?>"/>
				</td>
			</tr>
			<tr height="0" style="visibility:hidden;">
				<td width="45" style="width: 34pt;"></td>
				<td width="45" style="width: 34pt;"></td>
				<td width="85" style="width: 64pt;"></td>
				<td width="165" style="width: 124pt;"></td>
				<td width="285" style="width: 214pt;"></td>
				<td width="285" style="width: 214pt;"></td>
				<td width="85" style="width: 64pt;"></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<tbody>
			<tr >
				<td  class="text-center">今日得失</td>
				<td colspan="8">				<textarea name="row21_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row21_1"]); ?></textarea></td>
			</tr>
			<tr >
				<td  class="text-center">早会内容</td>
				<td colspan="8">				<textarea name="row22_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row22_1"]); ?></textarea></td>
			</tr>
			<tr >
				<td  class="text-center" >晚会内容</td>
				<td colspan="8">				<textarea name="row23_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row23_1"]); ?></textarea></td>
			</tr>
			<tr >
				<td  colspan="9">每日心态管理：以下每项做到评10分，未做到评0分（没有中间得分）</td>
			</tr>
			<tr>
				<td class="text-center">认真</td>
				<td class="text-center">效率</td>
				<td class="text-center">坚守承诺</td>
				<td class="text-center">保证完成任务</td>
				<td class="text-center">乐观</td>
				<td class="text-center">自信</td>
				<td class="text-center">爱与奉献</td>
				<td class="text-center">绝不找借口</td>
				<td class="text-center">合计</td>
			</tr>
			<tr>
				<td class="text-center">
				<input name="row24_1" class="col-3 text-center" value="<?php echo ($vo["row24_1"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_2" class="col-3 text-center" value="<?php echo ($vo["row24_2"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_3" class="col-3 text-center" value="<?php echo ($vo["row24_3"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_4" class="col-3 text-center" value="<?php echo ($vo["row24_4"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_5" class="col-3 text-center" value="<?php echo ($vo["row24_5"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_6" class="col-3 text-center" value="<?php echo ($vo["row24_6"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_7" class="col-3 text-center" value="<?php echo ($vo["row24_7"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_8" class="col-3 text-center" value="<?php echo ($vo["row24_8"]); ?>"/>
				</td>
				<td class="text-center">
				<input name="row24_9" class="col-3 text-center" value="<?php echo ($vo["row24_9"]); ?>"/>
				</td>
			</tr>
			<tr >
				<td class="text-center">明日学习</td>
				<td colspan="8">				<textarea name="row25_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row25_1"]); ?></textarea></td>
			</tr>
			<tr >
				<td class="text-center">明日目标</td>
				<td colspan="8">				<textarea name="row26_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row26_1"]); ?></textarea></td>
			</tr>
			<tr >
				<td class="text-center">今日事项推进过程中遇到的问题和困难</td>
				<td colspan="8">				<textarea name="row27_1" rows="2" class="autosize-transition" style="width: 100%;"><?php echo ($vo["row27_1"]); ?></textarea></td>
			</tr>
			<!--[if supportMisalignedColumns]-->
			<tr height="0" style="visibility:hidden;">
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
				<td width="93" style="width: 70pt;"></td>
			</tr>
			<!--[endif]-->
		</tbody>
	</table>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">附件：</label>
		<div class="col-sm-10">
			<?php echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'add'));?>
		</div>
	</div>
	<div class="action">
		<input class="btn btn-sm btn-primary" type="button" value="保存" onclick="save();">
		<input class="btn btn-sm btn-default" type="button" value="取消" onclick="go_return_url();">
	</div>
</form>
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
<script>
	function save() {
		window.onbeforeunload=null;
		if (check_form("form_data")) {
			sendForm("form_data", "<?php echo U('save');?>");
		}
	}
</script>

<!-- inline scripts related to this page -->
</body>
</html>