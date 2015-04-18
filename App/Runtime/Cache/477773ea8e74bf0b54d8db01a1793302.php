<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 7]><html class="ie7" lang="zh"><![endif]-->
<!--[if gt IE 7]><!-->
<html lang="zh">
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>时间轴</title>
<link href="__PUBLIC__/timeline/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="content">
  <div class="wrapper">
    <div class="light"><i></i></div>
    <hr class="line-left">
    <hr class="line-right">
    <div class="main">
      <h1 class="title"><?php echo ($dai["customer"]); ?> <?php echo ($dai["money"]); ?>元</h1>
      <div class="year">
        <h2><a href="#">2015年<i></i></a></h2>
        <div class="list">
          <ul>
			<?php if(is_array($log)): $id = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($id % 2 );++$id; if(($vo["result"]) == "2"): ?><li class="cls highlight">
							  <?php else: ?>
							  <li class="cls "><?php endif; ?>
							
	              
	                <p class="date"><?php echo (todate($vo["create_time"],"m-d")); ?>  </p>
	                <p class="intro"> <?php echo (dai_step($vo["step"])); ?>  <?php echo ($vo["comment"]); ?> <?php if(($vo["result"]) == "2"): ?>不通过<?php endif; ?> </p>
	                <p class="version">&nbsp;</p>
	                <div class="more">
	                  <p><?php echo ($vo["user_name"]); ?> 于 <?php echo (dai_step($vo["step"])); ?>  <?php echo (todate($vo["create_time"],"Y-m-d h:s")); ?></p>
	                </div>
	              </li><?php endforeach; endif; else: echo "" ;endif; ?>  
          
          </ul>
        </div>
      </div>
      <!-- <div class="year">
        <h2><a href="#">2013年<i></i></a></h2>
        <div class="list">
          <ul>
            <li class="cls">
              <p class="date">12月</p>
              <p class="intro">微俱聚V5.4上线</p>
              <p class="version">&nbsp;</p>
              <div class="more">
                <p>形成完整的基础服务+互动推广+业务管理+行业应用+应用商店的服务架构</p>
                <p>注册用户突破10万，荣获“创业之星”大赛八强</p>
              </div>
            </li>

          </ul>
        </div>
      </div> -->
  
    </div>
  </div>
</div>

<script type="text/javascript" src="__PUBLIC__/timeline/js/jquery.min.js"></script>
<script>
	$(".main .year .list").each(function (e, target) {
	    var $target=  $(target),
	        $ul = $target.find("ul");
	    $target.height($ul.outerHeight()), $ul.css("position", "absolute");
	}); 
	$(".main .year>h2>a").click(function (e) {
	    e.preventDefault();
	    $(this).parents(".year").toggleClass("close");
	});
	</script>
</body>
</html>