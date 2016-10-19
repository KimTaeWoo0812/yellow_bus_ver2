<?php if(!defined("__XE__"))exit;?><div class="smbHeader">
	<ul class="smbTools">
		<li class="smbCategoryBtn"><?php if($__Context->module_info->use_category =='Y'){ ?><a href="#"><i class="xe-tag-left"></i><span><?php echo $__Context->lang->category ?></span></a><?php } ?></li>
		<li<?php if($__Context->act == 'dispBoardWrite'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><i class="xe-pencil"></i><span><?php echo $__Context->lang->cmd_write ?></span></a></li>
	</ul>
	<!--타이틀 출력-->
	<h2 class="smbTitle"><a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid) ?>"><?php echo $__Context->module_info->browser_title ?></a></h2>
	<!--레이아웃을 변경합니다. 사용자가 리스트뷰, 겔러리뷰 등을 선택할 수 있습니다.-->
	<?php if(!$__Context->document_srl){ ?><ul class="smbTools right">
		<li<?php if($__Context->listStyle == 'list' || ( $__Context->module_info->list_style == 'list' && !$__Context->listStyle )){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid,'listStyle','list') ?>">
				<i class="xe-align-justify"></i><span>List</span>
			</a>
		</li>
		<li<?php if($__Context->listStyle == 'card' || ( $__Context->module_info->list_style == 'card' && !$__Context->listStyle )){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid,'listStyle','card') ?>">
				<i class="xe-layout-full"></i><span>Blog</span>
			</a>
		</li>
		<!--<li><a href="#"><i class="xe-layout-left-two"></i><span>Card</span></a></li>
		<li><a href="#"><i class="xe-layout-grid"></i><span>Gallery</span></a></li>-->
	</ul><?php } ?>
	<!--카테고리를 출력합니다.-->
	<ul class="smbCategory">
		<li<?php if(!$__Context->category){ ?> class="on"<?php } ?>>
			<a href="<?php echo getUrl('category','','page','') ?>"><?php echo $__Context->lang->total ?></a>
		</li>
		<?php $__Context->_idx = 1; ?>
		<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->key=>$__Context->val){ ?>
		<li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="on"<?php } ?>>
			<a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?></a>
		</li>
		<?php $__Context->_idx++; ?>
		<?php } ?>
		<!--********* 카테고리 리스트를 나열한 후, 2배수가 아닐때 2배수가 되도록 메뉴 항목을 임의로 추가합니다. **********-->
		<?php if($__Context->_idx % 2 != 0){ ?>
			<?php $__Context->dis = $__Context->_idx % 2 ?>
			<?php for($__Context->i = 0; $__Context->i < $__Context->dis; $__Context->i++, $__Context->_idx++){ ?>
			<li><a href="#"></a></li>
			<?php } ?>
		<?php } ?>
		<!--********* 카테고리 리스트를 나열한 후, 4배수가 아닐때 4배수가 되도록 메뉴 항목을 임의로 추가합니다. **********-->
		<?php if($__Context->_idx % 4 != 0){ ?>
			<?php $__Context->dis = $__Context->_idx % 4 ?>
			<?php for($__Context->i = 0; $__Context->i < $__Context->dis; $__Context->i++){ ?>
			<li class="fourdump"><a href="#"></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>