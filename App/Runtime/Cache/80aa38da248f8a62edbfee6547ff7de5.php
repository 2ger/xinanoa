<?php if (!defined('THINK_PATH')) exit();?><div class="page-header clearfix">
	<h1 class="col-sm-8"><?php echo ($name); ?></h1>
	<div class="col-sm-4 pull-right">
		<form name="form_search" id="form_search" method="post">
			<div class="input-group">
				<input  class="form-control" type="text" name="keyword" id="keyword"/>
				<div class="input-group-btn">
					<a class="btn btn-sm btn-warning" onclick="submit_search();"><i class="fa fa-search" ></i></a>
				</div>
			</div>
		</form>
	</div>
</div>