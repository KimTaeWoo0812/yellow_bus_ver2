<?php
class androidpushappAdminController extends androidpushapp
{
	function procAndroidpushappAdminInsertConfig()
	{
		$oModuleController = getController('module');

		$config->use = Context::get('use');	
		$config->sort_v = Context::get('sort_v');
		$config->change_a = Context::get('change_a');		
		$config->no_use_module_srls = Context::get('no_use_module_srls');
		$config->only_admin_push_module_srls = Context::get('only_admin_push_module_srls');		
		$config->api_key = Context::get('api_key');
		$config->api_key2 = Context::get('api_key2');
		$config->package = Context::get('package');		
		$config->use_d = Context::get('use_d');
		$config->use_c = Context::get('use_c');
		$config->use_m = Context::get('use_m');		
		
		$this->setMessage('success_updated');

		$oModuleController->updateModuleConfig('androidpushapp', $config);

		if(!in_array(Context::getRequestMethod(),array('XMLRPC','JSON')))
		{
			$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispAndroidpushappAdminConfig');
			header('location: ' . $returnUrl);
			return;
		}
	}
	
	function procAndroidpushappAdminDelete()
	{

		$args = new stdClass;
		
		$output = executeQuery('androidpushapp.deleteAll',$args);
		if(!$output->toBool())
		{
			$oDB->rollback();
			return $output;
		}

		$this->setMessage('모든 정보를 삭제하였습니다.');
		
		
		if(!in_array(Context::getRequestMethod(),array('XMLRPC','JSON')))
		{
			$returnUrl = Context::get('success_return_url') ?  Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispAndroidpushappAdminList');
			header('location: ' .$returnUrl);
			return;
		}
	}
 
	function procAndroidpushappAdminInsertPushData()
	{		

		$oAndroidpushappController = getController('androidpushapp');

		$board_title="테스트";
		$dmember_srl="false";
		$cmember_srl="false";
		$ccmember_srl="false";
		$message_gcm="Test(관리자)";
		$address_gcm="index.php";
		$sort_gcm = 4;
		$type="Test";
		$module="none";
		$func="none";
		$oAndroidpushappController->pushprocessor($type,$board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);

	}
	
}
