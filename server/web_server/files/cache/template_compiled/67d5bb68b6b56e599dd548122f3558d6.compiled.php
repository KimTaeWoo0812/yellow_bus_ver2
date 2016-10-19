<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php  Context::loadLang('./modules/board/m.skins/default/lang') ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/js/mboard.js--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/js/mboard.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/css/smbReadStyle.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/smbReadStyle.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_setting.html') ?>
<div class="sweetMobileBoard">
	<div class="smbWhite">
		
		<div class="smbPadding smbArticleHeader <?php echo $__Context->module_info->article_title_align ?>">
			<?php if($__Context->module_info->use_category == 'Y' && $__Context->oDocument->get('category_srl')){ ?><p class="smbArticleCategory">
				[ <?php echo $__Context->category_list[$__Context->oDocument->get('category_srl')]->title ?> ]
			</p><?php } ?>
			<h3 class="smbArticleTitle">
				<?php echo $__Context->oDocument->getTitle() ?>
			</h3>
			<ul class="smbArticleInfo">
				<li><i class="xe-user"></i><?php echo $__Context->oDocument->getNickName() ?></li>
				<li><i class="xe-time-o"></i><?php echo $__Context->oDocument->getRegdate() ?></li>
				<li><i class="xe-comment-list"></i><?php echo $__Context->oDocument->getCommentCount() ?></li>
			</ul>
		</div>
		
		<div class="smbPadding smbArticle">
			<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
			
			<form action="./" method="get" class="smbSecret" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
				<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
				<h3><?php echo $__Context->lang->msg_is_secret ?></h3>
				<div class="smbSecretSubmit">
					<button type="submit"><?php echo $__Context->lang->cmd_input ?></button>
				</div>
				<div class="smbSecretText">
					<input type="password" name="password" id="cpw" />
				</div>
			</form>
			<?php }else{ ?>
			<?php if($__Context->oDocument->isExtraVarsExists()){ ?>
			<table class="smbExtravars">
				<?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key => $__Context->val){ ?>
				<tr>
					<th><?php echo $__Context->val->name ?></th>
					<td><?php echo $__Context->val->getValueHTML() ?></td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
			<div class="ArticleWrap">
				<?php echo $__Context->oDocument->getContent(false) ?>
			</div>
			<?php } ?>
			<?php if($__Context->oDocument->isEditable()){ ?><p class="smbDelete"><a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="bn"><i class="xe-wastebasket"></i><span><?php echo $__Context->lang->cmd_delete ?></span></a></p><?php } ?>
		</div>
		
		<ul class="smbBottomInfo">
			<li class="favorite"><a href="#" onclick="doCallModuleAction('document','procDocumentVoteUp','<?php echo $__Context->document_srl ?>');return false;"><i class="xe-love-o"></i><span><?php echo $__Context->lang->cmd_vote ?> <?php echo $__Context->oDocument->get('voted_count') ?></span></a></li>
			<li class="tag"><i class="xe-bookmark-left"></i></li>
			<li class="files"><i class="xe-download-my"></i></li>
		</ul>
	</div>
	
	
	<div class="smbWhite smbTags">
		<p class="smbTagsTitle"><i class="xe-bookmark-left"></i><?php echo $__Context->lang->tag;
echo $__Context->lang->cmd_list ?></p>
		<ul>
			<?php if(!count($__Context->tag_list)){ ?><li><?php echo $__Context->lang->not_exists ?></li><?php } ?>
			<?php if(count($__Context->tag_list)){ ?>
			<?php for($__Context->i=0;$__Context->i<count($__Context->tag_list);$__Context->i++){ ?>
				<?php  $__Context->tag = $__Context->tag_list[$__Context->i];  ?>
				<li>
					<a href="<?php echo getUrl('search_target','tag','search_keyword',$__Context->tag,'document_srl','') ?>" class="tag" rel="tag">
						<?php echo htmlspecialchars($__Context->tag) ?>
					</a>
				</li>
			<?php } ?>
			<?php } ?>
		</ul>
	</div>
	
	<div class="smbWhite smbFiles">
		<p class="smbFilesTitle"><i class="xe-download-my"></i><?php echo $__Context->lang->uploaded_file;
echo $__Context->lang->filebox_list ?></p>
		<ul class="files">
			<?php if(!$__Context->oDocument->getUploadedFiles()){ ?><li><?php echo $__Context->lang->not_exists ?></li><?php } ?>
			<?php if($__Context->oDocument->getUploadedFiles()&&count($__Context->oDocument->getUploadedFiles()))foreach($__Context->oDocument->getUploadedFiles() as $__Context->key=>$__Context->file){ ?><li>
				<i class="xe-file"></i>
				<a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?></a>
			</li><?php } ?>
		</ul>	
	</div>
	
	<?php if($__Context->module_info->name_card == 'y'){ ?>
		<?php if($__Context->module_info->display_sign!='N'&&($__Context->oDocument->getProfileImage()||$__Context->oDocument->getSignature())){ ?><div class="smbWhite smbProfile">
			<div class="smbPadding">
				<?php if($__Context->module_info->display_sign!='N'&&$__Context->oDocument->getProfileImage()){ ?><div class="profile_image" style="background-image:url(<?php echo $__Context->oDocument->getProfileImage() ?>);"></div><?php } ?>
				<div class="profiles<?php if($__Context->oDocument->getProfileImage()){ ?> floatimg<?php } ?>">
					<p class="author"><?php echo $__Context->oDocument->getNickName() ?></p>
					<?php if($__Context->oDocument->getSignature()){ ?><p class="signature"><?php echo $__Context->oDocument->getSignature() ?></p><?php } ?>
					<?php if(!$__Context->oDocument->getSignature()){ ?><p class="signature"><?php echo $__Context->oDocument->get('email_address') ?></p><?php } ?>
				</div>
			</div>
			<div class="mailto">
				<a href="mailto:<?php echo $__Context->oDocument->get('email_address') ?>"><i class="xe-mail-at"></i></a>
			</div>
		</div><?php } ?>
	<?php } ?>
	
	
	<form action="./" method="post" class="smbCommentAdd" onsubmit="return procFilter(this, insert_comment);"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
		<input type="hidden" name="comment_srl" value="" />
		<div class="smbPadding smbCommentAddTitle">
			<i class="xe-message-bubble"></i><?php echo $__Context->lang->write_comment ?>
		</div>
		<div class="smbCommentAddComment">
			<textarea name="content" rows="4" cols="42" id="rText" placeholder="<?php echo $__Context->lang->comment ?>"></textarea>
		</div>
		<div class="smbElse">
			<input name="" type="submit" value="<?php echo $__Context->lang->cmd_comment_registration ?>"<?php if(!$__Context->is_logged){ ?> class="big"<?php } ?> />
			<?php if(!$__Context->is_logged){ ?><ul class="elseInfo">
				<li>
					<input name="nick_name" type="text" id="uName" placeholder="<?php echo $__Context->lang->writer ?>" />
				</li>
				<li>
					<input name="email_address" type="email" id="uMail" placeholder="<?php echo $__Context->lang->email_address ?>" />
				</li>
				<li>
					<input name="password" type="password" id="uPw" placeholder="<?php echo $__Context->lang->password ?>" />
				</li>
				<li>
					<input name="homepage" type="url" id="uSite" value="http://" placeholder="<?php echo $__Context->lang->homepage ?>" />
				</li>
			</ul><?php } ?>
		</div>
	</form>
	
	<?php if($__Context->oDocument->getComments()){ ?><div class="smbWhite smbComment" id="comment">
		<div class="smbPadding smbCommentTitle">
			<span><i class="xe-comment-list"></i> <?php echo $__Context->lang->comment ?> <?php echo $__Context->lang->cmd_list ?> <em>[<?php echo $__Context->oDocument->getCommentCount() ?>]</em></span>
		</div>
	</div><?php } ?>
	
	<?php if($__Context->oDocument->getComments()){ ?><div class="smbCommentList">
		<?php if($__Context->oDocument->getCommentcount()){ ?><ul class="fbList">
			<?php if($__Context->oDocument->getComments()&&count($__Context->oDocument->getComments()))foreach($__Context->oDocument->getComments() as $__Context->key=>$__Context->comment){ ?><li<?php if(!$__Context->comment->get('depth')){ ?> class="fbItem"<?php };
if($__Context->comment->get('depth')){ ?> class="fbItem indent indent<?php echo ($__Context->comment->get('depth')) ?>"<?php } ?> id="comment_<?php echo $__Context->comment->comment_srl ?>">
				<div class="profile">
					<?php if($__Context->comment->getProfileImage()){ ?><div class="image" style="background-image:url(<?php echo $__Context->comment->getProfileImage() ?>);"></div><?php } ?>
					<?php if(!$__Context->comment->getProfileImage()){ ?><div class="image none"></div><?php } ?>
					<p class="author"><?php echo $__Context->comment->getNickName() ?></p>
				</div>
				<div class="content">
					<?php if(!$__Context->comment->isAccessible()){ ?>
					
					<form action="./" method="get" class="smbSecret" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
						<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
						<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
						<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
						<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
						<p class="smbCommentSecretTitle"><label for="cpw_<?php echo $__Context->comment->comment_srl ?>"><?php echo $__Context->lang->msg_is_secret ?> <?php echo $__Context->lang->msg_input_password ?></label></p>
						<div class="smbCommentSecretSubmit">
							<button type="submit"><?php echo $__Context->lang->cmd_input ?></button>
						</div>
						<div class="smbCommentSecretText">
							<input type="password" name="password" id="cpw_<?php echo $__Context->comment->comment_srl ?>" class="iText" />
						</div>
					</form>
					<?php }else{ ?>
					<?php echo $__Context->comment->getContent(false) ?>
					<?php } ?>
					<p class="action">
						<?php if($__Context->oDocument->allowComment()){ ?><a href="<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>" class="reply"><i class="xe-share-l"></i><span><?php echo $__Context->lang->cmd_reply ?></span></a><?php } ?>
						<?php if($__Context->comment->isGranted()||!$__Context->comment->get('member_srl')){ ?><a href="<?php echo getUrl('act','dispBoardDeleteComment','comment_srl',$__Context->comment->comment_srl) ?>" class="delete"><i class="xe-wastebasket"></i><span><?php echo $__Context->lang->cmd_delete ?></span></a><?php } ?>
					</p>
				</div>
			</li><?php } ?>
		</ul><?php } ?>
	</div><?php } ?>
	
	<?php if($__Context->oDocument->comment_page_navigation){ ?><div class="smbCommentPagination">
		<a class="first" href="<?php echo getUrl('cpage',1) ?>#comment" class="direction prev">
			<i class="xe-angle-double-left"></i>
			<span><?php echo $__Context->lang->first_page ?></span>
		</a> 
		<ul class="paginations">
			<?php while($__Context->page_no=$__Context->oDocument->comment_page_navigation->getNextPage()){ ?><li>
				<?php if($__Context->cpage==$__Context->page_no){ ?><b><?php echo $__Context->page_no ?></b><?php } ?> 
				<?php if($__Context->cpage!=$__Context->page_no){ ?><a href="<?php echo getUrl('cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a><?php } ?>
			</li><?php } ?>
		</ul>
		<a class="last" href="<?php echo getUrl('cpage',$__Context->oDocument->comment_page_navigation->last_page) ?>#comment" class="direction next">
			<i class="xe-angle-double-right"></i>
			<span><?php echo $__Context->lang->last_page ?></span>
		</a>
	</div><?php } ?>
</div>