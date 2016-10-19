<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/skins/sweetMobileBoard/css/smbListStyle.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/smbListStyle.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="smbListWrap">
	<div class="smbSection">
		<ul class="smbList">
			
			<?php  
				$__Context->_idx = 0;
				$__Context->_count = count($__Context->notice_list) + count($__Context->document_list);
			 ?>
			<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
			<?php $__Context->_idx++ ?>
			<li>
				<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>">
					<?php if($__Context->document->getThumbnail() && $__Context->module_info->thumb == 'y'){ ?>
						<div class="smbThumbnail" style="background-image:url(<?php echo $__Context->document->getThumbnail($__Context->module_info->thumb_x * 2,$__Context->module_info->thumb_y * 2,corp) ?>); width:<?php echo $__Context->module_info->thumb_x ?>px; height:<?php echo $__Context->module_info->thumb_y ?>px;"></div>
						<div class="smbContent" style="margin:0 10px 0 <?php echo $__Context->module_info->thumb_x + 10 ?>px;">
					<?php } ?>
					<?php if(!$__Context->document->getThumbnail() || $__Context->module_info->thumb == 'n'){ ?>
						<div class="smbContentNoThumb">
					<?php } ?>
						<p class="title"><span class="notice"><?php echo $__Context->lang->notice ?></span><?php if($__Context->module_info->view_category == 'Y' && $__Context->document->get('category_srl')){ ?><span class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></span><?php };
echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></p>
						<ul class="info">
							<?php if($__Context->module_info->view_author == 'Y'){ ?><li><i class="xe-user"></i><span class="author"><?php echo $__Context->document->getNickName() ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_regdate == 'Y'){ ?><li><i class="xe-time-o"></i><span><?php echo $__Context->document->getRegDate("Y.m.d") ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_read == 'Y'){ ?><li><i class="xe-eyes"></i><span><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_comment == 'Y'){ ?><li><i class="xe-comment-list"></i><span><?php echo $__Context->document->getCommentCount() ?></span></li><?php } ?>
						</ul>
					</div>
				</a>
			</li>
			<?php } ?>
			<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
			<?php $__Context->_idx++ ?>
			<li>
				<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>">
					<?php if($__Context->document->getThumbnail() && $__Context->module_info->thumb == 'y'){ ?>
						<div class="smbThumbnail" style="background-image:url(<?php echo $__Context->document->getThumbnail($__Context->module_info->thumb_x * 2,$__Context->module_info->thumb_y * 2,corp) ?>); width:<?php echo $__Context->module_info->thumb_x ?>px; height:<?php echo $__Context->module_info->thumb_y ?>px;"></div>
						<div class="smbContent" style="margin:0 10px 0 <?php echo $__Context->module_info->thumb_x + 10 ?>px;">
					<?php } ?>
					<?php if(!$__Context->document->getThumbnail() || $__Context->module_info->thumb == 'n'){ ?>
						<div class="smbContentNoThumb">
					<?php } ?>
						<p class="title"><?php if($__Context->module_info->view_category == 'Y' && $__Context->document->get('category_srl')){ ?><span class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></span><?php };
echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></p>
						<ul class="info">
							<?php if($__Context->module_info->view_author == 'Y'){ ?><li><i class="xe-user"></i><span class="author"><?php echo $__Context->document->getNickName() ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_regdate == 'Y'){ ?><li><i class="xe-time-o"></i><span><?php echo $__Context->document->getRegDate("Y.m.d") ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_read == 'Y'){ ?><li><i class="xe-eyes"></i><span><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></span></li><?php } ?>
							<?php if($__Context->module_info->view_comment == 'Y'){ ?><li><i class="xe-comment-list"></i><span><?php echo $__Context->document->getCommentCount() ?></span></li><?php } ?>
						</ul>
					</div>
				</a>
			</li>
			
			<?php } ?>
		</ul>
	</div>
</div>