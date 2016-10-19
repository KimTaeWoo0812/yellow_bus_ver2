<?php if(!defined("__XE__"))exit;?><script>
var confirm_restore_msg = '<?php echo $__Context->lang->confirm_restore ?>';
var no_text_comment = '<?php echo $__Context->lang->no_text_comment ?>';
</script>
<!--#Meta:modules/trash/tpl/js/trash_admin.js--><?php $__tmp=array('modules/trash/tpl/js/trash_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->trash ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_content_trash" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/trash/tpl/trash_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/trash/ruleset/emptyTrash.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="emptyTrash" />
	<input type="hidden" name="module" value="trash" />
	<input type="hidden" name="act" value="procTrashAdminEmptyTrash" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="is_all" value="true" />
	<p>
		<button type="submit" class="x_btn x_btn-warning x_btn-primary" name="is_all" value="true"><?php echo $__Context->lang->empty_trash_all ?></button>
		&nbsp;<?php echo $__Context->lang->remove_all_trash_item ?>
	</p>
	<table id="trashListTable" class="x_table x_table-striped x_table-hover">
		<caption>
			<strong><?php echo $__Context->lang->all ?>(<?php echo number_format($__Context->total_count) ?>)</strong>
			<div class="x_pull-right x_btn-group">
				<a href="#fo_list" class="x_btn modalAnchor" data-name="is_all" data-value="false"><?php echo $__Context->lang->delete ?></a>
				<a href="#fo_list" class="x_btn modalAnchor" data-name="act" data-value="procTrashAdminRestore"><?php echo $__Context->lang->restore ?></a>
			</div>
		</caption>
		<thead>
			<tr>
				<th scope="col" class="nowr"><?php echo $__Context->lang->origin_module_type ?></th>
				<th scope="col" class="title"><?php echo $__Context->lang->document ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->author ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->ipaddress ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->trash_nick_name ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->trash_date ?></th>
				<th scope="col" class="title"><?php echo $__Context->lang->trash_description ?></th>
				<th scope="col"><input type="checkbox" title="Check All" data-name="cart" /></th>
			</tr>
		</thead>
		<tbody>
			<?php if($__Context->trash_list&&count($__Context->trash_list))foreach($__Context->trash_list as $__Context->no=>$__Context->oTrashVO){ ?><tr>
				<td class="nowr"><?php if($__Context->oTrashVO->getOriginModule() == 'document'){;
echo $__Context->lang->document;
}else{;
echo $__Context->lang->comment;
} ?></td>
				<td class="title">
					<?php if(!trim($__Context->oTrashVO->getTitle()) && $__Context->oTrashVO->getOriginModule() == 'comment'){ ?><strong><?php echo $__Context->lang->no_text_comment ?></strong><?php } ?>
					<?php if(trim($__Context->oTrashVO->getTitle())){ ?>
						<?php if(isset($__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']])){ ?>
						<a href="<?php echo getUrl('', 'mid', $__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']]->mid) ?>" target="_blank"><?php echo $__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']]->browser_title ?></a> - 
						<?php } ?>
						<a href="<?php echo getUrl('act','dispTrashAdminView','trash_srl',$__Context->oTrashVO->getTrashSrl()) ?>"><?php echo $__Context->oTrashVO->getTitle() ?></a>
					<?php } ?>
				</td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->oTrashVO->unserializedObject['member_srl'] ?>"><?php echo $__Context->oTrashVO->unserializedObject['nick_name'] ?></a></td>
				<td class="nowr"><?php echo $__Context->oTrashVO->unserializedObject['ipaddress'] ?></td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->oTrashVO->getRemoverSrl() ?>"><?php echo $__Context->oTrashVO->getNickName() ?></a></td>
				<td class="nowr"><?php echo zdate($__Context->oTrashVO->getRegdate(), "Y-m-d H:i:s") ?></td>
				<td class="title"><?php echo $__Context->oTrashVO->getDescription() ?></td>
				<td><input type="checkbox" name="cart" value="<?php echo $__Context->oTrashVO->getTrashSrl() ?>" /></td>
			</tr><?php } ?>
			<?php if(!$__Context->trash_list){ ?><tr>
				<td><?php echo $__Context->lang->no_documents ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_pull-right x_btn-group">
		<a href="#fo_list" class="x_btn modalAnchor" data-name="is_all" data-value="false"><?php echo $__Context->lang->delete ?></a>
		<a href="#fo_list" class="x_btn modalAnchor" data-name="act" data-value="procTrashAdminRestore"><?php echo $__Context->lang->restore ?></a>
	</div>
</form>
<form action="" class="x_pagination"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="error_return_url" value="" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
	<?php if($__Context->search_target){ ?><input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" /><?php } ?>
	<ul>
		<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', '') ?>">&laquo; <?php echo $__Context->lang->first_page ?></a></li>
		<?php if($__Context->page_navigation->first_page != 1 && $__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page - 1 && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
		<?php $__Context->isGoTo = true ?>
		<li>
			<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
			<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
				<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
				<button type="submit" class="x_add-on">Go</button>
			</span><?php } ?>
		</li>
		<?php } ?>
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<?php $__Context->last_page = $__Context->page_no ?>
		<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a  href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
		<?php } ?>
		<?php if($__Context->last_page != $__Context->page_navigation->last_page && $__Context->last_page + 1 != $__Context->page_navigation->last_page){ ?>
		<?php $__Context->isGoTo = true ?>
		<li>
			<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
			<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
				<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
				<button type="submit" class="x_add-on">Go</button>
			</span><?php } ?>
		</li>
		<?php } ?>
		<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" title="<?php echo $__Context->page_navigation->last_page ?>"><?php echo $__Context->lang->last_page ?> &raquo;</a></li>
	</ul>
</form>
<?php Context::addJsFile("modules/trash/ruleset/emptyTrash.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_list" action="./" method="post" class="x_modal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="emptyTrash" />
	<input type="hidden" name="module" value="trash" />
	<input type="hidden" name="act" value="procTrashAdminEmptyTrash" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="is_all" value="false" />
	<input type="hidden" name="origin_module" value="<?php echo $__Context->origin_module ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/trash/tpl/trash_list/1" />
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->document_manager ?>: <span class="_sub"></span></h1>
	</div>
	<div class="x_modal-body">
		<table id="trashManageListTable" class="x_table x_table-striped x_table-hover">
			<caption>
				<strong><?php echo $__Context->lang->selected_document ?> <span id="selectedTrashCount"></span></strong>
			</caption>
			<thead>
				<tr>
					<th scope="col" class="title"><?php echo $__Context->lang->document ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->trash_nick_name ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->ipaddress ?></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="x_modal-footer">
		<button type="submit" class="x_btn x_btn-inverse x_pull-right" name="is_all|act" value="false|procTrashAdminRestore"><?php echo $__Context->lang->confirm ?></button>
	</div>
</form>
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#trashListTable');
	$docTable.find(':checkbox').change(function(){
		var $modalAnchor = $('a[data-value]');
		if($docTable.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#fo_list').removeClass('x_disabled');
		}
	}).change();
	// Modal anchor button action
	$('a[data-value]').bind('before-open.mw', function(){
		if($docTable.find('tbody :checked').length == 0){
			$('body').css('overflow','auto');
			alert('<?php echo $__Context->lang->msg_not_selected_document ?>');
			return false;
		} else {
			var $this = $(this);
			var thisName = $this.attr('data-name');
			var thisValue = $this.attr('data-value');
			var thisText = $this.text();
			getTrashList();
			$('#fo_list').find('.x_modal-header ._sub').text(thisText).end().find('[type="submit"]').val(thisValue).attr('name',thisName).text(thisText);
		}
	});
});
</script>
