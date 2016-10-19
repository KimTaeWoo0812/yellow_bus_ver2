<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/androidpushapp/tpl/css/ncenter_admin.css--><?php $__tmp=array('modules/androidpushapp/tpl/css/ncenter_admin.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/androidpushapp/tpl','header.html') ?>
<?php Context::addJsFile("modules/androidpushapp/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal" id="fo_androidpushapp"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="module" value="androidpushapp" />
	<input type="hidden" name="act" value="procAndroidpushappAdminInsertConfig" />
		<div class="x_control-group">
			<label class="x_control-label"><span class="x_label x_label-important">주의!</span>푸시 동작여부</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="use_y" name="use" value="Y"<?php if($__Context->config->use == 'Y'){ ?> checked="checked"<?php } ?> /> 동작
				</label>
				<label class="x_inline">
					<input type="radio" id="use_n" name="use" value="N"<?php if($__Context->config->use == 'N'){ ?> checked="checked"<?php } ?> /> 동작 안 함
				</label>				
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">앱 버전</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="sort_v" value="W"<?php if($__Context->config->sort_v == 'W'){ ?> checked="checked"<?php } ?> /> 웹뷰버전
				</label>
				<label class="x_inline">
					<input type="radio" name="sort_v" value="B"<?php if($__Context->config->sort_v == 'B'){ ?> checked="checked"<?php } ?> /> 웹브라우저 호출 버전
				</label>
				
				<label class="x_inline">
					<input type="radio" name="sort_v" value="WB"<?php if($__Context->config->sort_v == 'WB'){ ?> checked="checked"<?php } ?> /> 둘 다 사용
				</label>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label">API_Key(웹뷰버전을 사용할 경우)</label>
			<div class="x_controls">
				<input type="text" name="api_key" value="<?php echo $__Context->config->api_key ?>" />
				<p class="x_help-block">google GCM에서 받은 API KEY를 적습니다.</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">API_Key(웹브라우저호출 버전을 사용할 경우)</label>
			<div class="x_controls">
				<input type="text" name="api_key2" value="<?php echo $__Context->config->api_key2 ?>" />
				<p class="x_help-block">google GCM에서 받은 API KEY를 적습니다.</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">웹브라우저 호출 버전 패키지명</label>
			<div class="x_controls">
				<input type="text" name="package" value="<?php echo $__Context->config->package ?>" />
				<p class="x_help-block">웹브라우저 호출 버전을 사용할 경우 웹브라우저 호출 버전 앱의 패키지명을 적어주세요. 둘 다 사용하는 경우도 웹브라우저 호출 버전 앱의 패키지명을 적어주세요.</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">동기화 시에 모든 새글,새댓글 알림 설정 유지 여부</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="change_a" value="Y"<?php if($__Context->config->change_a == 'Y'){ ?> checked="checked"<?php } ?> /> 유지
				</label>
				<label class="x_inline">
					<input type="radio" name="change_a" value="N"<?php if($__Context->config->change_a == 'N'){ ?> checked="checked"<?php } ?> /> 해제
				</label>
			</div>
		</div>		
		<div class="x_control-group">
			<label class="x_control-label">새글 푸시 동작여부</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="use_d" value="Y"<?php if($__Context->config->use_d == 'Y'){ ?> checked="checked"<?php } ?> /> 동작
				</label>
				<label class="x_inline">
					<input type="radio" name="use_d" value="N"<?php if($__Context->config->use_d == 'N'){ ?> checked="checked"<?php } ?> /> 동작 안 함
				</label>				
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">새 댓글 푸시 동작여부</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="use_c" value="Y"<?php if($__Context->config->use_c == 'Y'){ ?> checked="checked"<?php } ?> /> 동작
				</label>
				<label class="x_inline">
					<input type="radio" name="use_c" value="N"<?php if($__Context->config->use_c == 'N'){ ?> checked="checked"<?php } ?> /> 동작 안 함
				</label>				
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">쪽지 푸시 동작여부</label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="use_m" value="Y"<?php if($__Context->config->use_m == 'Y'){ ?> checked="checked"<?php } ?> /> 동작
				</label>
				<label class="x_inline">
					<input type="radio" name="use_m" value="N"<?php if($__Context->config->use_m == 'N'){ ?> checked="checked"<?php } ?> /> 동작 안 함
				</label>				
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label">푸시 동작을 사용하지 않을 게시판</label>
			<div class="x_controls">
				<p class="x_help-block">선택한 모듈에서는 새글이나 새댓글이 올라와도 푸시기능을 하지 않습니다.</p>
				<?php if($__Context->mid_list&&count($__Context->mid_list))foreach($__Context->mid_list as $__Context->mid=>$__Context->item){ ?><div>
					<?php if($__Context->item->module =='board'||$__Context->item->module =='resource'){ ?><label>
						<input type="checkbox" value="<?php echo $__Context->item->module_srl ?>" name="no_use_module_srls[]"<?php if(in_array($__Context->item->module_srl, $__Context->config->no_use_module_srls)){ ?> checked="checked"<?php } ?>  onClick="aaa(this);"/>
						<strong><?php echo $__Context->item->browser_title ?></strong> (<?php echo $__Context->item->mid ?>)
					</label><?php } ?>
				</div><?php } ?>
			</div>
		</div>	
		
		<br>
		<div class="x_control-group">
			<label class="x_control-label"> 관리회원 또는 관리자에게만 푸시 알림이 되도록 할 게시판</label>
			<div class="x_controls">
				<p class="x_help-block">게시판을 선택하시려면 먼저 위의 "푸시 동작을 사용하지 않을 게시판" 설정의 해당 게시판 체크를 해제해주세요.</p>
				<?php if($__Context->mid_list&&count($__Context->mid_list))foreach($__Context->mid_list as $__Context->mid=>$__Context->item){ ?><div>
					<?php if($__Context->item->module =='board'||$__Context->item->module =='resource'){ ?><label>
						<input type="checkbox" value="<?php echo $__Context->item->module_srl ?>" name="only_admin_push_module_srls[]"<?php if(in_array($__Context->item->module_srl, $__Context->config->only_admin_push_module_srls)){ ?> checked="checked"<?php };
if(in_array($__Context->item->module_srl, $__Context->config->no_use_module_srls)){ ?> disabled="false"<?php } ?>/>
						<strong><?php echo $__Context->item->browser_title ?></strong> (<?php echo $__Context->item->mid ?>)
					</label><?php } ?>
				</div><?php } ?>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button class="x_btn x_btn-primary" type="submit"><?php echo $__Context->lang->cmd_registration ?></button>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">시험용 푸시 알림 생성</label>
			<div class="x_controls">
				<label><input type="button" name="dummy" onClick="doDummyPushDataInsert();" class="x_btn" value="더미 데이터 생성"> <br><br>모듈 및 모바일 테스트를 위한 시험용 알림 생성 / 앱 설치 후 모바일 페이지에서 관리자로 로그인하신 다음 "현재 ID로 동기화" 버튼을 누르신 후에 이 버튼을 눌러주세요. </label>
			</div>
		</div>
</form>
<script type="text/javascript">
function aaa(checkedObj){
	var obj = document.getElementsByName("only_admin_push_module_srls[]");
	if(checkedObj.checked)
	{
		for(var i=0; i< obj.length; i++){
			if(obj[i].value == checkedObj.value){
				obj[i].checked = false;
				obj[i].disabled = true;
			}
		}
	}else{
		for(var i=0; i< obj.length; i++){
			if(obj[i].value == checkedObj.value){				
				obj[i].disabled = false;
			}
		}
	}
}
</script>
<script type="text/javascript">
function doDummyPushDataInsert()
{
	jQuery.exec_json('androidpushapp.procAndroidpushappAdminInsertPushData', {}, function completeGetDummyPushInfo(ret_obj){alert(ret_obj.message)});
}
</script>