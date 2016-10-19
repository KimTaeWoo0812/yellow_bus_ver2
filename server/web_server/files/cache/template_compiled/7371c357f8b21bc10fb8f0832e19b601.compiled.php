<?php if(!defined("__XE__"))exit;?><div class="smbPag">
	<?php if($__Context->page != 1){ ?>
	<a href="<?php echo getUrl('page',$__Context->page-1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prev">
		<i class="xe-angle-left"></i>
		<span><?php echo $__Context->lang->cmd_prev ?></span>
	</a> 
	<?php }else{ ?>
	<div class="prev">
		<i class="xe-angle-left"></i>
		<span><?php echo $__Context->lang->cmd_prev ?></span>
	</div>
	<?php } ?>
	<strong class="num"><span><?php echo $__Context->page ?></span> / <?php echo $__Context->page_navigation->last_page ?></strong>
	<?php if($__Context->page != $__Context->page_navigation->last_page){ ?>
	<a href="<?php echo getUrl('page',$__Context->page+1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="next">
		<i class="xe-angle-right"></i>
		<span><?php echo $__Context->lang->cmd_next ?></span>
	</a>
	<?php }else{ ?>
	<div class="next">
		<i class="xe-angle-right"></i>
		<span><?php echo $__Context->lang->cmd_prev ?></span>
	</div>
	<?php } ?>
</div>
<div class="smbSearch">
	<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
		<div class="subm">
			<button type="submit" class="shbn" title="<?php echo $__Context->lang->cmd_search ?>"><i class="xe-magnifier"></i></button>
		</div>
		<div class="xdt">
			<select name="search_target">
				<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
				<option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
				<?php } ?>
			</select>
			<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" placeholder="<?php echo $__Context->lang->cmd_search ?>" title="<?php echo $__Context->lang->cmd_search ?>" />
		</div>
	</form>
</div>
