<?php if(!defined("__XE__"))exit;?>
<?php if(Mobile::isMobileCheckByAgent()){ ?>
 <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA','mobile.html') ?>
<?php } ?>
<?php if(!Mobile::isMobileCheckByAgent()){ ?>
  <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA','pc.html') ?>
<?php } ?>
