<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		<title><?php echo ($title); ?></title>
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

		<link rel="stylesheet" href="__PUBLIC__/css/ace.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="__PUBLIC__/css/ace-ie.min.css" />		
		<style>
			html {
				position: static
			}
		</style>
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
		<!-- Wrap all page content here -->
		<div class="container">
			<div class="col-xs-12 <?php echo (MODULE_NAME); ?>">
				
<script src="http://oa.12.ac.cn//oa/App/Tpl/Login/js/jquery-1.4.min.js" type="text/javascript"></script>
	<link href="http://oa.12.ac.cn//oa/App/Tpl/Login/js/common.css" rel="stylesheet" type="text/css">
<div class="container">
	<!-- /container -->
	<div class="row">
		<div class="col-xs-12 hidden-xs" style="margin-top:120px;"> </div>
	</div>
	<style type="text/css" media="screen">
	html,body,.container {
  background: #c4cdd4;
}
.btn,input{border-radius: 5px !important;}
	</style>


	<form method="post" id="form_login" class="form-horizontal">
   <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
              <tr>
        <td height="30" align="left" valign="top"><table width="780" height="541" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_left.jpg" width="18" height="21" alt=""></td>
                <td colspan="4"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_center.jpg" width="744" height="21" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_right.jpg" width="18" height="21" alt=""></td>
              </tr>
              <tr>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_line_1.jpg" width="7" height="133" alt=""></td>
                <td height="133" colspan="2" align="left" valign="top" bgcolor="#FFFFFF">
				<img src="http://oa.12.ac.cn/oa/logo2.jpg" height="" width="100" style="
    margin-left: 15px;
">
			</td>
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_banner.jpg" width="576" height="133" alt=""></td>
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_top_line_2.jpg" width="64" height="133" alt=""></td>
              </tr>
              <tr>

                <td colspan="7"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_line_split.jpg" width="780" height="35" alt=""></td>
              </tr>
              <tr>
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_center_left.jpg" width="18" height="329" alt=""></td>
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_center_pic.jpg" width="499" height="329" alt=""></td>
                <td height="329" colspan="2" align="left" valign="middle" bgcolor="#E2E7FD"><table width="98%" border="0" cellspacing="0" cellpadding="0" class="txt13">
                  
					<tbody>
                      <tr>
                        <td width="45" height="40" align="right" valign="middle"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/icon_user.gif" width="41" height="39"></td>
                        <td width="39"><!-- font style="textfield" --> 
                          <!-- div id="lblUserId" align="center" --> 
                          代号:
                          <input type="hidden" name="hdnLoginIdType" value="systemId" id="hdnLoginIdType">
                          
                          <!-- /div --> 
                          <!-- /font --></td>
                        
                        <!-- 顯示可選擇以何種帳號登入系統的下拉式選單 -->
                        
                        <td width="134" height="40" align="left" valign="middle">
							<input class="form-control" id="emp_no" name="emp_no" />
						</td>
                      </tr>
                      <tr>
                        <td width="45" height="40" align="right" valign="middle"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/icon_password.gif" width="41" height="39"></td>
                        <td align="left" valign="middle" class="txt13" nowrap="nowrap"> 密码: </td>
                        <td height="40" align="left" valign="middle">
						<input class="form-control" id="password" type="password" name="password" /></td>
                      </tr>
                      <tr>
                        <td height="30" colspan="3" align="center" valign="middle"><table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td width="50%" align="center" valign="bottom"><table id="table_btn_login" border="0" cellspacing="0" cellpadding="0" onclick="login()" width="100%">
                                    <tbody>
                                      <tr>
                                        <td class="login_button" nowrap="nowrap" onclick="login();" > 登入 </td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                                <td width="50%" align="center" valign="bottom"><table id="table_btn_reset" border="0" cellspacing="0" cellpadding="0" onclick="resetForm()" width="100%">
                                    <tbody>
                                      <tr>
                                        <td class="login_button" nowrap="nowrap"> 清除 </td>
                                      </tr>
                                    </tbody>
									
                                  </table></td>
                              </tr>
                            </tbody>
                          </table></td>
                      </tr>
					
                    </tbody>
                  </table></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_center_right.jpg" width="18" height="329" alt=""></td>
              </tr>
              <tr>
			 
                <td colspan="2"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_bottom_left.jpg" width="18" height="22" alt=""></td>
                <td colspan="4"><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_bottom_center.jpg" width="744" height="22" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/login_border_bottom_right.jpg" width="18" height="22" alt=""></td>
              </tr>
              <tr>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="7" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="11" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="122" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="377" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="199" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="46" height="1" alt=""></td>
                <td><img src="http://oa.12.ac.cn/oa/App/Tpl/Login/js/spacer.gif" width="18" height="1" alt=""></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
              <tr>
        <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td align="center" valign="middle" class="txt11"> 建議瀏覽器: Google Chrome; 解析度: 1024 x 768以上，以獲得較佳瀏覽效果 </td>
                <td align="center" valign="middle" class="txt11"></td>
              </tr>
              <tr>
                <td align="right" valign="middle" class="txt11"> Copyright © Data Systems All rights reserved. ©微度网络 著作權所有，並保留一切權利 </td>
                <td align="left" valign="middle"></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
            </tbody>
  </table>  </form>
  <script>
  function resetForm() {
				document.forms[0].emp_no.value = '';
				document.forms[0].password.value = '';
			}</script>
			</div>
		</div>
		<!-- basic scripts -->

		<!--[if !IE]>
		-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-2.1.0.min.js'>" + "<" + "/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.11.0.min.js'>"+"<"+"/script>");</script>
		<![endif]-->

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
		<script src="__PUBLIC__/js/ace.min.js"></script>
		<script src="__PUBLIC__/js/common.js"></script>
		<script type="text/javascript">
	function login() {
		if (check_form("form_login")) {
			sendForm("form_login", "<?php echo U('login/check_login');?>");
		}
	}
	
	$(document).ready(function() {
		var $dom="#password";
		<?php if(!empty($is_verify_code)): ?>$dom="#verify";<?php endif; ?>

		$($dom).keydown(function(event) {
			if (event.keyCode == 13) {
				if (check_form("form_login")) {
					sendForm("form_login", "<?php echo U('?m=login&a=check_login');?>");
					return false;
				}
			}
		});
	});
</script>
		<!-- inline scripts related to this page -->
	</body>
</html>