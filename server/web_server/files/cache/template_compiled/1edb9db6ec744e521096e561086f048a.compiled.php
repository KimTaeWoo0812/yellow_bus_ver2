<?php if(!defined("__XE__"))exit;?><ul class="widgetTabA widgetTab">
<?php $__Context->i=0 ?>
<?php if($__Context->widget_info->tab&&count($__Context->widget_info->tab))foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
    <li<?php if($__Context->i==0){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->tab->url ?>" onmouseover="content_widget_tab_show(jQuery(this),jQuery(this).parents('ul.widgetTabA').next('dl.widgetDivider'),<?php echo $__Context->i ?>)"><?php echo $__Context->tab->title ?></a></li>
<?php $__Context->i++ ?>
<?php } ?>
</ul>
<dl class="widgetDivider">
<?php $__Context->i=0 ?>
<?php if($__Context->widget_info->tab&&count($__Context->widget_info->tab))foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
    <dt><?php echo $__Context->tab->title ?></dt>
    <dd<?php if($__Context->i==0){ ?> class="open"<?php } ?>>
        <?php $__Context->widget_info->content_items = $__Context->tab->content_items ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/DWbasic/skins/default','_tab_none.html') ?>
    </dd>
<?php $__Context->i++ ?>
<?php } ?>
</dl>
