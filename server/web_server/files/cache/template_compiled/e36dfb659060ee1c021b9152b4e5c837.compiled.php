<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/css/smbStyle.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/smbStyle.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/css/xeicon/xeicon.min.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/xeicon/xeicon.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/js/script.js--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="sweetMobileBoard">
	
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_setting.html') ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_header.html') ?>
	<div class="smbWrap">
		<?php if($__Context->oDocument->isExists()){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','read.html') ?>
		</div>
		<?php }else{ ?>
			<?php if(!$__Context->listStyle){ ?>
				<?php if($__Context->module_info->list_style == 'list' || !$__Context->module_info->list_style){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_list.html') ?>
				<?php }elseif($__Context->module_info->list_style == 'card'){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_card.html') ?>
				<?php } ?>
			<?php }else{ ?>
				<?php if($__Context->listStyle == 'list'){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_list.html') ?>
				<?php }elseif($__Context->listStyle == 'card'){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_card.html') ?>
				<?php } ?>
			<?php } ?>
		</div>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_footer.html') ?>
	<?php } ?>
</div>
