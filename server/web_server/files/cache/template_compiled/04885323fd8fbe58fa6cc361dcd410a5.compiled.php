<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/x.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/js/mboard.js--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/js/mboard.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/css/smbStyle.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/smbStyle.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/css/xeicon/xeicon.min.css--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/css/xeicon/xeicon.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sweetMobileBoard/js/script.js--><?php $__tmp=array('modules/board/skins/sweetMobileBoard/js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_setting.html') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sweetMobileBoard','_header.html') ?>
<div class="sweetMobileBoard">
	<div class="smbWrap">
		<div class="smbWriteHeader">
			<a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid) ?>" class="smbListBtn"><?php echo $__Context->lang->cmd_list ?></a>
			<h3><?php echo $__Context->lang->board ?> <?php echo $__Context->lang->cmd_write ?></h3>
		</div>
		<form action="./" method="post" class="smbForm" onsubmit="return procFilter(this, insert)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
			<ul>
				<?php if($__Context->module_info->use_category == "Y"){ ?>
				<li>
					<select name="category_srl" id="nCategory">
						<option disabled="disabled" selected value=""><?php echo $__Context->lang->board ?> <?php echo $__Context->lang->category ?></option>
						<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>	
						<option <?php if(!$__Context->val->grant){ ?>disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?>selected="selected"<?php } ?>>
						<?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> (<?php echo $__Context->val->document_count ?>)
						</option>
						<?php } ?>
					</select>
				</li>
				<?php } ?>
				<li>
					<input name="title" type="text" id="nTitle" placeholder="<?php echo $__Context->lang->title ?>" />
				</li>
				<?php if(count($__Context->extra_keys)){ ?>
				<?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key=> $__Context->val){ ?>
				<li class="exvar">
					<label for="ex_<?php echo $__Context->val->name ?>"><?php echo $__Context->val->name ?> <?php if($__Context->val->is_required=='Y'){ ?><span>*</span><?php } ?></label>
					<div><?php echo $__Context->val->getFormHTML() ?></div>
				</li>
				<?php } ?>
				<?php } ?>
				<li>
					<textarea name="content" rows="14" cols="42" id="nText" placeholder="<?php echo $__Context->lang->content ?>"></textarea>
				</li>
				<?php if(!$__Context->is_logged){ ?>
				<li><?php echo $__Context->lang->writer ?> <?php echo $__Context->lang->member_default_info ?></li>
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
					<input name="homepage" type="url" id="uSite" value="" placeholder="<?php echo $__Context->lang->homepage ?>" />
				</li>
				<?php } ?>
				<li class="smbAllow">
					<span><?php echo $__Context->lang->allow_comment ?></span>
					<input type="checkbox" name="comment_status" value="ALLOW"<?php if($__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> id="reAllow" />
					<label for="reAllow">
						<ul class="smbCheck">
							<li><?php echo $__Context->lang->approval ?></li>
							<li><?php echo $__Context->lang->denied ?></li>
						</ul>
					</label>
				</li>
				<li class="smbAllow">
					<span><?php echo $__Context->lang->allow_trackback ?></span>
					<input type="checkbox" name="allow_trackback" value="Y"<?php if($__Context->oDocument->allowTrackback()){ ?> checked="checked"<?php } ?> id="trAllow" />
					<label for="trAllow">
						<ul class="smbCheck">
							<li><?php echo $__Context->lang->approval ?></li>
							<li><?php echo $__Context->lang->denied ?></li>
						</ul>
					</label>
				</li>
				<?php if(is_array($__Context->status_list)){ ?><li class="smbAllow">
					<span><?php echo $__Context->lang->status ?></span>
					<ul class="smbRadio">
						<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
						<input type="radio" name="status" value="<?php echo $__Context->key ?>" id="id<?php echo $__Context->key ?>"<?php if($__Context->oDocument->get('status') == $__Context->key){ ?> checked<?php } ?> />
						<li>
							<label for="id<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>
						</li>
						<?php } ?>
					</ul>
				</li><?php } ?>
			</ul>
			<div class="submitBox">
				<button type="submit" class="smbSubmit"><i class="xe-send"></i> <?php echo $__Context->lang->cmd_registration ?></button>
			</div>
		</form>
	</div>
</div>