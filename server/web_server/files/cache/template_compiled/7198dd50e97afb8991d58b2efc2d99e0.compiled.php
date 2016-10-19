<?php if(!defined("__XE__"))exit;?>
<?php if($__Context->widget_info->markup_type=="list"){ ?>
<ul class="widgetGalleryA widgetGalleryA<?php echo $__Context->widget_info->cols_list_count ?>">
<?php $__Context->_idx=0 ?>
    <?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
    <li class="Clayout_Gallery Clayout_Gallery<?php echo $__Context->_idx ?> filter_li">
		<div class="Clayout_Gallery_div">
			<div class="Clayout_Gallery_in">
			<?php if($__Context->widget_info->option_view_arr&&count($__Context->widget_info->option_view_arr))foreach($__Context->widget_info->option_view_arr as $__Context->k => $__Context->v){ ?>
				<?php if($__Context->v=='thumbnail'){ ?>
                <a href="<?php echo $__Context->item->getLink() ?>" class="thumb"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>>
                    <?php if($__Context->item->getThumbnail()){ ?>
                        <img src="<?php echo $__Context->item->getThumbnail() ?>" class="filter_img" />
                    <?php }else{ ?>
                        <span class="imgNone"><?php echo $__Context->lang->none_image ?></span>
                    <?php } ?>
					<div class="count_voted"><span><i class="xi-heart"></i><?php if($__Context->item->getVotedCount()){;
echo $__Context->item->getVotedCount();
};
if(!$__Context->item->getVotedCount()){ ?>0<?php } ?></span><span class="comment"><i class="xi-message"></i><?php if($__Context->item->getCommentCount()){;
echo $__Context->item->getCommentCount();
};
if(!$__Context->item->getCommentCount()){ ?>0<?php } ?></span></div>
                </a>
				<?php }else if($__Context->v=='title'){ ?>
				<a href="<?php echo $__Context->item->getLink() ?>" class="title_Gallery_list"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></a>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
    </li>
    <?php $__Context->_idx++ ?>
    <?php } ?>
</ul>
<?php if($__Context->widget_info->page_count > 1 && $__Context->widget_info->list_count<$__Context->_idx){ ?>
<ul class="widgetNavigator">
    <li><button type="button" class="prev" title="<?php echo $__Context->lang->cmd_prev ?>" onclick="content_widget_prev(jQuery(this).parents('ul.widgetNavigator').prev('ul.widgetGalleryA'),<?php echo $__Context->widget_info->list_count ?>)"><span><?php echo $__Context->lang->cmd_prev ?></span></button></li>
    <li><button type="button" class="next" title="<?php echo $__Context->lang->cmd_next ?>" onclick="content_widget_next(jQuery(this).parents('ul.widgetNavigator').prev('ul.widgetGalleryA'),<?php echo $__Context->widget_info->list_count ?>)"><span><?php echo $__Context->lang->cmd_next ?></span></button></li>
</ul>
<?php } ?>
<?php }else{ ?>
<ul class="widgetGalleryA widgetGalleryA<?php echo $__Context->widget_info->cols_list_count ?>">
<?php $__Context->_idx=0 ?>
    <?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
    <li class="Clayout_Gallery Clayout_Gallery<?php echo $__Context->_idx ?>">
		<div class="Clayout_Gallery_div">
			<div class="Clayout_Gallery_in">
			<?php if($__Context->widget_info->option_view_arr&&count($__Context->widget_info->option_view_arr))foreach($__Context->widget_info->option_view_arr as $__Context->k => $__Context->v){ ?>
				<?php if($__Context->v=='thumbnail'){ ?>
                <a href="<?php echo $__Context->item->getLink() ?>" class="thumb"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>>
                    <?php if($__Context->item->getThumbnail()){ ?>
                        <img src="<?php echo $__Context->item->getThumbnail() ?>"/>
                    <?php }else{ ?>
                        <span class="imgNone"><?php echo $__Context->lang->none_image ?></span>
                    <?php } ?>
                </a>
				<?php }else if($__Context->v=='title'){ ?>
				<div class="Gallery_over">
					<a href="<?php echo $__Context->item->getLink() ?>" class="title"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></a>
					<p class="Clayout_Gallery_p">
						<a href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getContent() ?></a>
					</p>
				</div>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
    </li>
    <?php $__Context->_idx++ ?>
    <?php } ?>
</ul>
<?php if($__Context->widget_info->page_count > 1 && $__Context->widget_info->list_count<$__Context->_idx){ ?>
<ul class="widgetNavigator">
    <li><button type="button" class="prev" title="<?php echo $__Context->lang->cmd_prev ?>" onclick="content_widget_prev(jQuery(this).parents('ul.widgetNavigator').prev('ul.widgetGalleryA'),<?php echo $__Context->widget_info->list_count ?>)"><span><?php echo $__Context->lang->cmd_prev ?></span></button></li>
    <li><button type="button" class="next" title="<?php echo $__Context->lang->cmd_next ?>" onclick="content_widget_next(jQuery(this).parents('ul.widgetNavigator').prev('ul.widgetGalleryA'),<?php echo $__Context->widget_info->list_count ?>)"><span><?php echo $__Context->lang->cmd_next ?></span></button></li>
</ul>
<?php } ?>
<script>
jQuery(function($){
	$('.Clayout_Gallery').hover(
	  function () {
		 
		$(this).find(".Gallery_over").animate({
		height : '100%'
		}, 300);
		$(this).find(".title").animate({
		paddingTop : 15
		}, 300);
	}, 
	  function () {
	 $(this).find(".Gallery_over").animate({
		height : 28
		}, 200);
		$(this).find(".title").animate({
		paddingTop : 5
		}, 200);
	  }
	);
	
});
</script>
 <?php } ?>