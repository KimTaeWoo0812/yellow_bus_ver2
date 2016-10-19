<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/spamfilter/tpl','header.html') ?>
<section>
	<ul class="x_nav x_nav-tabs">
		<li class="x_active"><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminDeniedIPList') ?>"><?php echo $__Context->lang->cmd_denied_ip ?></a></li>
		<li><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminDeniedWordList') ?>"><?php echo $__Context->lang->cmd_denied_word ?></a></li>
		<li><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminConfigBlock') ?>"><?php echo $__Context->lang->cmd_config_block ?></a></li>
	</ul>
	<form action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="act" value="procSpamfilterAdminDeleteDeniedIP" />
		<input type="hidden" name="module" value="spamfilter" />
		<input type="hidden" name="xe_validator_id" value="modules/spamfilter/tpl/1" />
		<table class="x_table x_table-striped x_table-hover">
			<caption>
				<strong><?php echo $__Context->lang->cmd_denied_ip ?></strong>
				<button type="submit" class="x_btn x_pull-right"><?php echo $__Context->lang->cmd_delete ?></button>
			</caption>
			<thead>
				<tr>
					<th scope="col">IP</th>
					<th scope="col"><?php echo $__Context->lang->description ?></th>
					<th scope="col"><?php echo $__Context->lang->regdate ?></th>
					<th scope="col"><input type="checkbox" name="ipaddress" title="Check All" /></th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->ip_list&&count($__Context->ip_list))foreach($__Context->ip_list as $__Context->ip_info){ ?><tr>
					<td><?php echo $__Context->ip_info->ipaddress ?></td>
					<td><?php echo $__Context->ip_info->description ?></td>
					<td><?php echo zdate($__Context->ip_info->regdate,'Y-m-d') ?></td>
					<td><input type="checkbox" name="ipaddress[]" value="<?php echo $__Context->ip_info->ipaddress ?>" /></td>
				</tr><?php } ?>
				<?php if(!$__Context->ip_list){ ?><tr>
					<td colspan="4" style="text-align:center"><?php echo $__Context->lang->no_data ?></td>
				</tr><?php } ?>
			</tbody>
		</table>
	</form>
	<form action="./" style="margin-right:14px" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="act" value="procSpamfilterAdminInsertDeniedIP" />
		<input type="hidden" name="module" value="spamfilter" />
		<input type="hidden" name="xe_validator_id" value="modules/spamfilter/tpl/1" />
		<input type="hidden" name="active" value="ip" />
		<textarea name="ipaddress_list" title="<?php echo $__Context->lang->add_denied_ip ?>: <?php echo $__Context->lang->about_denied_ip ?>" rows="4" cols="42" style="width:100%" placeholder="<?php echo $__Context->lang->about_denied_ip ?>"></textarea>
		<span class="x_pull-right" style="margin-right:-14px">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->add_denied_ip ?></button>
		</span>
	</form>
</section>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/spamfilter/tpl','footer.html') ?>
