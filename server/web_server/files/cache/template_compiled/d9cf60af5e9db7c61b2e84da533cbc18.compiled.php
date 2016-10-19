<?php if(!defined("__XE__"))exit;
if(!$__Context->module_info->list_style){ ?>
	<?php  $__Context->module_info->list_style = 'list' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_category){ ?>
	<?php  $__Context->module_info->view_category = 'Y' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_regdate){ ?>
	<?php  $__Context->module_info->view_regdate = 'N' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_author){ ?>
	<?php  $__Context->module_info->view_author = 'Y' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_vote){ ?>
	<?php  $__Context->module_info->view_vote = 'Y' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_comment){ ?>
	<?php  $__Context->module_info->view_comment = 'Y' ?>
<?php } ?>
<?php if(!$__Context->module_info->view_read){ ?>
	<?php  $__Context->module_info->view_read = 'Y' ?>
<?php } ?>
<?php if(!$__Context->module_info->article_title_align){ ?>
	<?php  $__Context->module_info->article_title_align = 'left' ?>
<?php } ?>
<?php if(!$__Context->module_info->name_card){ ?>
	<?php  $__Context->module_info->name_card = 'y' ?>
<?php } ?>
<?php if(!$__Context->module_info->thumb){ ?>
	<?php  $__Context->module_info->thumb = 'n' ?>
<?php } ?>
<?php if(!$__Context->module_info->thumb_x){ ?>
	<?php  $__Context->module_info->thumb = 80 ?>
<?php } ?>
<?php if(!$__Context->module_info->thumb_y){ ?>
	<?php  $__Context->module_info->thumb = 60 ?>
<?php } ?>