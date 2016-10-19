<?php if(!defined("__XE__"))exit;
if($__Context->widgetstyle_extra_var->ws_colorset == "black"){ ?>
    <?php  $__Context->_wsClassName = "black" ?>
<?php }elseif($__Context->widgetstyle_extra_var->ws_colorset == "white"){ ?>
    <?php  $__Context->_wsClassName = "white" ?>
<?php }else{ ?>
    <?php  $__Context->_wsClassName = $__Context->layout_info->colorset ?>
<?php } ?>
<!--#Meta:widgetstyles/simple/style.css--><?php $__tmp=array('widgetstyles/simple/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php  $__Context->ws_more_url = trim($__Context->widgetstyle_extra_var->ws_more_url);  ?>
<div class="simpleWidgetStyle <?php echo $__Context->_wsClassName ?>">
    <h2><?php echo $__Context->widgetstyle_extra_var->ws_title ?></h2>
        <?php if($__Context->ws_more_url){ ?>
            <?php if(strtolower(substr($__Context->ws_more_url,0,4))=='http'){ ?>
                <a href="<?php echo $__Context->ws_more_url ?>" class="widgetMoreLink">
            <?php }else{ ?>
                <a href="http://<?php echo $__Context->ws_more_url ?>" class="widgetMoreLink">
            <?php } ?>
            <?php echo $__Context->widgetstyle_extra_var->ws_more_text ?></a>
        <?php } ?>
    <?php echo $__Context->widget_content ?>
</div>
