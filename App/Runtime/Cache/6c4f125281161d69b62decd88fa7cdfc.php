<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<title><?php echo (($title)?($title):"smeoa"); ?></title>
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
	<link rel="stylesheet" href="__PUBLIC__/css/idangerous.swiper.css" />

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
		<div class="main-container" id="main-container"  style="margin-top:60px">
			<div class="main-container-inner">
				<div class="main-content" style="margin-left:0px">
					<div class="page-content <?php echo (MODULE_NAME); ?>">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12 col-sm-6 widget-container-span" id="t1">
				<div class="widget-box display-none" ></div>
			
				<!-- 公告开始 -->
				<div class="widget-box " sort="11">
					<div class="widget-header">
						<h5 class="smaller">公司公告 <?php echo ($type_list); ?><a href="index.php?m=notice&a=add" class="btn  btn-xs btn-danger">添加公告</a></h5>
                        
					</div>
					<div class="widget-body">
						
                        <table class="table table-striped ">
                            <tr>
                                <th>＃</th>
                                <th>内容</th>
                                <th>发布人</th>
                                <th>发布时间</th>
                            </tr>
							<?php if(is_array($new_notice_list)): $id = 0; $__LIST__ = $new_notice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
                                <td><?php echo ($id); ?> </td>
                                <td><a href="<?php echo U('notice/read','id='.$vo['id']);?>" ><?php echo ($vo["name"]); ?></a> </td>
                                <td><?php echo ($vo["user_name"]); ?>  </td>
                                <td><?php echo (todate($vo["create_time"],'m-d')); ?> </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          
                        </table>
                        
							
					</div>
				</div>
                
				<!-- 日常工作审批开始 -->
				<div class="widget-box" sort="12">
					<div class="widget-header">
						<h5 class="smaller">日常工作审批</h5>
						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#flow-todo">处理待办事项</a>
								</li>
								<li>
									<a data-toggle="tab" href="#flow-submit">追踪流程</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="tab-content">
								<div id="flow-todo" class="tab-pane in active ">
                                    <table class="table table-striped ">
                                        <tr>
                                            <th>＃</th>
                                            <th>内容</th>
                                            <th>发起人</th>
                                            <th>时间</th>
                                            <th>历时</th>
                                            <th>操作</th>
                                        </tr>
            						<?php if(is_array($todo_flow_list)): $id = 0; $__LIST__ = $todo_flow_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
                                            <td><?php echo ($id); ?> </td>
                                            <td><a href="<?php echo U('flow/read','id='.$vo['id'].'&fid=confirm');?>" ><?php echo (type_name($vo["type"])); ?></a> </td>
                                            <td><?php echo ($vo["user_name"]); ?>  </td>
                                            <td><?php echo (todate($vo["create_time"],'m-d')); ?> </td>
                                            <td><?php echo (get_days($vo["create_time"])); ?> </td>
                                            <td><a href="<?php echo U('flow/read','id='.$vo['id'].'&fid=confirm');?>" class="btn btn-xs btn-danger">去处理</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          
                                    </table>
                                 
								</div>
								<div id="flow-submit" class="tab-pane ">
                                    <table class="table table-striped ">
                                        <tr>
                                            <th>＃</th>
                                            <th>内容</th>
                                            <th>当前处理人</th>
                                            <th>时间</th>
                                        </tr>
            						<?php if(is_array($submit_flow_list)): $id = 0; $__LIST__ = $submit_flow_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
                                            <td><?php echo ($id); ?> </td>
                                            <td><a href="<?php echo U('flow/read','id='.$vo['id'].'&fid=confirm');?>" ><?php echo (type_name($vo["type"])); ?></a> </td>
                                            <td><?php echo ($vo["confirm_name"]); ?>  </td>
                                            <td><?php echo (todate($vo["create_time"],'m-d')); ?> </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
                
                
			</div>
			<div class="col-xs-12 col-sm-6 widget-container-span" id="t2">
				<div class="widget-box display-none" ></div>
				<!-- 贷款开始 -->
				<div class="widget-box" sort="21">
					<div class="widget-header">
						<h5 class="smaller">贷款审批</h5>
						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#dai-todo">我的任务</a>
								</li>
								<li>
									<a data-toggle="tab" href="#dai-submit">我受理的</a>
								</li>
								<li>
									<a data-toggle="tab" href="#dai-ing">贷中</a>
								</li>
								<li>
									<a data-toggle="tab" href="#dai-done">已贷</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="tab-content" >
								<div id="dai-todo" class="tab-pane in active ">
                                    <table class="table table-striped table-condensed">
                                        <tr>
                                            <th>＃</th>
                                            <th>客户</th>
                                            <th>金额（元）</th>
                                            <th>受理人</th>
                                            <th>进度</th>
                                            <th>用时</th>
                                            <th>操作</th>
                                        </tr>
	            						<?php if(is_array($todo_dai_list)): $id = 0; $__LIST__ = $todo_dai_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
	                                            <td><?php echo ($id); ?> </td>
	                                            <td><?php echo ($vo["customer"]); ?> </td>
	                                            <td><?php echo ($vo["money"]); ?> </td>
	                                            <td><?php echo ($vo["user_name"]); ?> </td>
	                                            <td><?php echo (dai_step($vo["nowstep"])); ?>  </td>
	                                            <td><?php echo (get_days($vo["create_time"])); ?> </td>
	                                            <td> <a href="<?php echo U('flow/dai');?>&id=<?php echo ($vo["id"]); ?>" class="btn btn-success btn-xs">去处理</a></td>
	                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
											
                                    </table>
								</div>
								<div id="dai-submit" class="tab-pane ">
                                    <table class="table table-striped table-condensed">
                                        <tr>
                                            <th>＃</th>
                                            <th>客户</th>
                                            <th>金额（元）</th>
                                            <th>受理人</th>
                                            <th>进度</th>
                                            <th>负责人</th>
                                            <th>步骤用时</th>
                                            <th>累计用时</th>
                                            <th>查看</th>
                                        </tr>
	            						<?php if(is_array($my_dai_list)): $id = 0; $__LIST__ = $my_dai_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
	                                            <td><?php echo ($id); ?> </td>
	                                            <td><?php echo ($vo["customer"]); ?> </td>
	                                            <td><?php echo ($vo["money"]); ?> </td>
	                                            <td><?php echo ($vo["user_name"]); ?> </td>
	                                            <td><?php echo (dai_step($vo["nowstep"])); ?>  </td>
	                                            <td><?php echo ($vo["stepman"]); ?> </td>
	                                            <td><?php echo (get_days($vo["update_time"])); ?> </td>
	                                            <td><?php echo (get_days($vo["create_time"])); ?> </td>
	                                            <td> <a href="<?php echo U('flow/dai');?>&id=<?php echo ($vo["id"]); ?>" class="btn btn-success btn-xs">查看</a></td>
	                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
										
                                    </table>
								</div>
								<div id="dai-ing" class="tab-pane ">
                                    <table class="table table-striped table-condensed">
                                        <tr>
                                            <th>＃</th>
                                            <th>客户</th>
                                            <th>金额（元）</th>
                                            <th>受理人</th>
                                            <th>进度</th>
                                            <th>负责人</th>
                                            <th>用时</th>
                                            <th>累计用时</th>
                                            <th>查看</th>
                                        </tr>

	            						<?php if(is_array($daiing_list)): $id = 0; $__LIST__ = $daiing_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
	                                            <td><?php echo ($id); ?> </td>
	                                            <td><?php echo ($vo["customer"]); ?> </td>
	                                            <td><?php echo ($vo["money"]); ?> </td>
	                                            <td><?php echo ($vo["user_name"]); ?> </td>
	                                            <td><?php echo (dai_step($vo["nowstep"])); ?>  </td>
	                                            <td><?php echo ($vo["stepman"]); ?> </td>
	                                            <td><?php echo (get_days($vo["update_time"])); ?> </td>
	                                            <td><?php echo (get_days($vo["create_time"])); ?> </td>
	                                            <td> <a href="<?php echo U('flow/dai');?>&id=<?php echo ($vo["id"]); ?>" class="btn btn-success btn-xs">查看</a></td>
	                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                       
                                    </table>
								</div>
								<div id="dai-done" class="tab-pane ">
                                    <table class="table table-striped table-condensed">
                                        <tr>
                                            <th>＃</th>
                                            <th>客户</th>
                                            <th>金额（元）</th>
                                            <th>受理人</th>
                                            <th>累计用时</th>
                                           <th>查看</th>
                                       </tr>

            						<?php if(is_array($dai_done_list)): $id = 0; $__LIST__ = $dai_done_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr>
                                            <td><?php echo ($id); ?> </td>
                                            <td><?php echo ($vo["customer"]); ?> </td>
                                            <td><?php echo ($vo["money"]); ?> </td>
                                            <td><?php echo ($vo["user_name"]); ?> </td>
                                            <td><?php echo (get_days($vo["create_time"])); ?> </td>
                                            <td> <a href="<?php echo U('flow/dai');?>&id=<?php echo ($vo["id"]); ?>" class="btn btn-success btn-xs">查看</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				<div class="widget-box" sort="23">
					<div class="widget-header">
						<h5 class="smaller">还款提醒</h5>
					
					</div>

					<div class="widget-body">
						<div class="widget-main">
							
                                <table class="table table-striped table-condensed">
                                    <tr>
                                        <th>＃</th>
                                        <th>客户</th>
                                        <th>代款总额（元）</th>
                                        <th>抵压物</th>
                                        <th>本期需还（元）</th>
                                        <th>到期时间</th>
                                        <th>操作</th>
                                    </tr>
            						<?php if(is_array($notice_list)): $id = 0; $__LIST__ = $notice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id;?><tr class="<?php echo (get_pay_danger($vo["id"])); ?>">
                                            <td><?php echo ($id); ?> </td>
                                            <td><?php echo (get_flow_field($vo["id"],358,377)); ?> </td>
                                            <td><?php echo (get_flow_field($vo["id"],366,388)); ?> </td>
                                            <td><?php echo (get_flow_field($vo["id"],398,411)); ?> </td>
	                                        <td><?php echo (get_pay_li(get_flow_field($vo["id"],366,388))); ?>  </td>
	                                        <td><?php echo (todate($now,'Y-m')); ?>-<?php echo ((todate($vo["create_time"],'d'))?(todate($vo["create_time"],'d')):'2'); ?> </td> <!-- OK -->
	                                        <td>
													
	                                            <a href="http://qr.liantu.com/api.php?text=smsto:15555445584:尊敬的<?php echo (get_flow_field($vo["id"],358,377)); ?>您好!%0A 您本期需还款金额为<?php echo (get_pay_li(get_flow_field($vo["id"],366,388))); ?> 元 %0A还款期限为：<?php echo (todate($now,'Y-m')); ?>-<?php echo ((todate($vo["create_time"],'d'))?(todate($vo["create_time"],'d')):'2'); ?> %0A－－西南小贷%0A咨询0772-95545844  %0A%0Alogo.jpg" class="btn btn-xs btn-primary fancybox-c" title="扫描二维码发送短信">短信</a> 
									
	                                            <!-- <a href="#" class="btn btn-xs btn-danger">交转受理人</a> -->
												<a href="<?php echo U('flow/read');?>&customer=1&id=<?php echo ($vo["id"]); ?>" class="btn btn-success btn-xs">查看</a>
	                                        </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
									
                                </table>
						</div>
					</div>
				</div>

				
				<!-- 新闻列表 开始 -->
			</div>
		</div>
	</div>
</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
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

 <script src="__PUBLIC__/js/idangerous.swiper-2.1.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/typeahead-bs2.min.js"></script>


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
<script src="__PUBLIC__/js/uncompressed/ace-elements.js"></script>
<script src="__PUBLIC__/js/uncompressed/ace.js"></script>
<script src="__PUBLIC__/js/common.js"></script>
<script src="__PUBLIC__/js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>

<!--Include flickerplate-->
<link href="__PUBLIC__/css/flickerplate.css"  type="text/css" rel="stylesheet">
<script src="__PUBLIC__/js/min/flickerplate.min.js" type="text/javascript"></script>


<!--Include fancybox-->
<link href="__PUBLIC__/fancyBox/jquery.fancybox.css"  type="text/css" rel="stylesheet">
<script src="__PUBLIC__/fancyBox/jquery.fancybox.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		if (!is_mobile()){
			$('.widget-container-span').sortable({
				connectWith : '.widget-container-span',
				cancel : ".widget-body,.nav-tabs",
				stop : function(event, ui) {
					set_sort();
				},
				items : '> .widget-box',
				opacity : 0.8,
				revert : true,
				forceHelperSize : true,
				placeholder : 'widget-placeholder',
				forcePlaceholderSize : true,
				tolerance : 'pointer'
			});
		}
		init_sort("<?php echo ($home_sort); ?>");
	});

	function init_sort(sort_string) {
		if (sort_string == "") {
			sort_string = "11,12,13|21,22,23";
		}
		array_sort_string = sort_string.split("|");
		sort_string_1 = array_sort_string[0];
		sort_string_2 = array_sort_string[1];

		array_sort = sort_string_1.split(",");

		for (x in array_sort) {
			index = array_sort[x];
			last = $("#t1 .widget-box:last");
			current = $(".widget-box[sort='" + index + "']");
			if (index !== last.attr("sort")) {
				current.insertAfter(last);
			}
		}

		array_sort = sort_string_2.split(",");
		for (x in array_sort) {
			index = array_sort[x];
			last = $("#t2 .widget-box:last");
			current = $(".widget-box[sort='" + index + "']");
			if (index !== last.attr("sort")) {
				current.insertAfter(last);
			}
		}
	};

	function set_sort() {
		var sort_string = "";
		t1_count = $("#t1 .widget-box:not(.display-none)").length;
		t2_count = $("#t2 .widget-box:not(.display-none)").length;

		if ((t1_count == 0) || (t2_count == 0)) {
			ui_error("至少保留一个");
			location.reload();
			return false;
		}
		$("#t1 .widget-box").each(function() {
			sort_string = sort_string + $(this).attr("sort") + ",";
		});
		sort_string = sort_string + "|";
		$("#t2 .widget-box").each(function() {
			sort_string = sort_string + $(this).attr("sort") + ",";
		});
		sendAjax("<?php echo U('set_sort');?>", "val=" + sort_string);
	}

	$(function() {
		$('.flicker-example').flicker({
			auto_flick : true,
			dot_alignment : "right",
			auto_flick_delay : 5,
			flick_animation : "transform-slide",
			theme : "dark"
		});
	});
	
	$(".fancybox-c").fancybox({
				padding: 0,
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				closeClick : true,
				helpers : {
					overlay : null
				}
	});
				
</script>
<!-- inline scripts related to this page -->
</body>
</html>