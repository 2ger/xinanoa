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
									
<?php echo W('PageHeader',array('name'=>array('编辑VIP：',$vo['name']),'search'=>'N'));?>
<form method='post' id="form_data" class="well form-horizontal">
	<input type="hidden" name="opmode" value="edit">
	<input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>">
	<input type="hidden" name="ajax" id="ajax" value="0">
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="vip_type">VIP类别*：</label>
		<div class="col-sm-8">
			<select id="vip_type" name="vip_type">
				<option value="金卡" > 金卡</option>
				<option value="白金卡">白金卡</option>
				<option value="黑金卡">黑金卡</option>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="vip_no">VIP卡号：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="vip_no" name="vip_no" value="<?php echo ($vo["vip_no"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="wechat_vip_no">微信VIP卡号：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="wechat_vip_no" name="wechat_vip_no"  value="<?php echo ($vo["wechat_vip_no"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="area">地区：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="area" id="area" value="<?php echo ($vo["area"]); ?>">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="active_shop">开卡店铺：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="active_shop" name="active_shop"  value="<?php echo ($vo["active_shop"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="active_date">开卡日期：</label>
		<div class="col-sm-8">
			<input class="form-control input-date" type="text" id="active_date" name="active_date"  data-date-format="yyyy-mm-dd" value="<?php echo ($vo["active_date"]); ?>">
		</div>
	</div>
	<div class="clearfix"></div>
	<hr>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="name">姓名*：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="name" name="name" check="require" msg="请输入姓名"  value="<?php echo ($vo["name"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="english_name">英文名：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="english_name" name="english_name" value="<?php echo ($vo["english_name"]); ?>">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="birthday">出生日期：</label>
		<div class="col-sm-8">
			<input class="form-control input-date" type="text" id="birthday" name="birthday"  data-date-format="yyyy-mm-dd"  value="<?php echo ($vo["birthday"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="sex">性别：</label>
		<div class="col-sm-8">
			<select name="sex" id="sex">
				<option value="male">男</option>
				<option value="female">女</option>
			</select>
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="paper_type">证件类型：</label>
		<div class="col-sm-8">
			<select name="paper_type" id="paper_type">
				<option value="身份证">身份证</option>
				<option value="护照">护照</option>
				<option value="军官证">军官证</option>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="paper_no">证件号：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="paper_no" name="paper_no"  value="<?php echo ($vo["paper_no"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="office_tel">固定电话：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="office_tel" name="office_tel"  value="<?php echo ($vo["office_tel"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="mobile_tel">手机号：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="mobile_tel" name="mobile_tel"  value="<?php echo ($vo["mobile_tel"]); ?>"  check="require" msg="请输入手机号">
		</div>
	</div>

	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="address">邮寄地址：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="address" name="address"  value="<?php echo ($vo["address"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" for="wechat_no">微信号：</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="wechat_no" name="wechat_no"  value="<?php echo ($vo["wechat_no"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" >消费金额：</label>
		<div class="col-sm-8">
			<p class="form-control-static" >
				<span id="total_amount" class="pull-right"><?php echo ($total_amount); ?></span>
				<a  onclick="add_sales(<?php echo ($vo["id"]); ?>)">填加消费</a>
			</p>
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label class="col-sm-4 control-label" >消费积分：</label>
		<div class="col-sm-8">
			<p class="form-control-static text-right">
				<?php echo ($total_point); ?>
			</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<hr>
	<div class="form-group">
		<label class="col-sm-2 control-label">喜好信息：</label>
		<div class="col-sm-9" >
			<p class="form-control-static"></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" >穿衣风格</label>
		<div class="col-sm-9" >
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="时尚">
					<span class="lbl"> 时尚</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="休闲">
					<span class="lbl"> 休闲</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="商务"> 
					<span class="lbl"> 商务</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="优雅">
					<span class="lbl"> 优雅</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="甜美">
					<span class="lbl"> 甜美</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="简约">
					<span class="lbl"> 简约</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="职业">
					<span class="lbl"> 职业</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="性感">
					<span class="lbl"> 性感</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="华丽">
					<span class="lbl"> 华丽</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="高贵">
					<span class="lbl"> 高贵</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="dressing_style[]" class="ace dressing_style" type="checkbox" value="前卫">
					<span class="lbl"> 前卫</span>
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"  >上衣尺寸</label>
		<div class="col-sm-9" >
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox" value="XXL">
					<span class="lbl"> XXL</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox"  value="XL">
					<span class="lbl"> XL</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox"  value="L">
					<span class="lbl"> L</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox"  value="M">
					<span class="lbl"> M</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox" value="XS">
					<span class="lbl"> XS</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="top_size[]" class="ace top_size" type="checkbox"  value="S">
					<span class="lbl"> S</span>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">下衣尺寸</label>
		<div class="col-sm-9" >
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox" value="XXL">
					<span class="lbl"> XXL</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox"  value="XL">
					<span class="lbl"> XL</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox"  value="L">
					<span class="lbl"> L</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox"  value="M">
					<span class="lbl"> M</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox" value="XS">
					<span class="lbl"> XS</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="bottom_size[]" class="ace bottom_size" type="checkbox"  value="S">
					<span class="lbl"> S</span>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" >喜好颜色</label>
		<div class="col-sm-9" >
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="红色系">
					<span class="lbl"> 红色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="蓝色系">
					<span class="lbl"> 蓝色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="橙色系">
					<span class="lbl"> 橙色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="绿色系">
					<span class="lbl"> 绿色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="黄色系">
					<span class="lbl"> 黄色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="黑白色系">
					<span class="lbl"> 黑白色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value=" 灰卡其系">
					<span class="lbl"> 灰卡其系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox"  value="豹纹系">
					<span class="lbl"> 豹纹系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox"  value="桔色系">
					<span class="lbl"> 桔色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox"  value="咖啡色系">
					<span class="lbl"> 咖啡色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox"  value="酒红色系">
					<span class="lbl"> 酒红色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="粉色系">
					<span class="lbl"> 粉色系</span>
				</label>
			</div>
			<div class="checkbox col-sm-2">
				<label>
					<input name="like_color[]" class="ace like_color" type="checkbox" value="米色系">
					<span class="lbl"> 米色系</span>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label" for="like_shop">常逛商场</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" id="like_shop" name="like_shop" value="<?php echo ($vo["like_shop"]); ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label" for="like_brand">喜欢品牌</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" id="like_brand" name="like_brand" value="<?php echo ($vo["like_brand"]); ?>" >
		</div>
	</div>
<div class="clearfix"></div>
<hr >
	<div class="form-group">
		<label class="col-sm-2 control-label" for="remark" >顾客说明：</label>
		<div class="col-sm-9" >
			<textarea class="form-control" name="remark" rows="5" class="col-xs-12" ></textarea>
		</div>
	</div>
	<div class="action">
		<input class="btn btn-sm btn-primary" type="button" value="保存" onclick="save();">
		<input  class="btn btn-sm btn-default" type="button" value="取消" onclick="go_return_url();">
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
<script type="text/javascript">
	function save() {
		if (check_form("form_data")) {
			sendForm("form_data", "<?php echo U('save');?>");
		}
	}

	function add_sales($vip_id) {
		window.open(fix_url("<?php echo U('add_sales');?>?vip_id="+$vip_id), "_self");
		return false;
	}

	function formatMoney(numStr) {
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

	$(document).ready(function() {
		set_val('dressing_style',"<?php echo ($vo["dressing_style"]); ?>");
		set_val('top_size',"<?php echo ($vo["top_size"]); ?>");
		set_val('paper_type',"<?php echo ($vo["paper_type"]); ?>");
		set_val('bottom_size',"<?php echo ($vo["bottom_size"]); ?>");
		set_val('like_color',"<?php echo ($vo["like_color"]); ?>");
		set_val('vip_type',"<?php echo ($vo["vip_type"]); ?>");	
		set_val('sex',"<?php echo ($vo["sex"]); ?>");

		$("#total_amount").html(formatMoney(trim($("#total_amount").html())));
	});
</script>
<!-- inline scripts related to this page -->
</body>
</html>