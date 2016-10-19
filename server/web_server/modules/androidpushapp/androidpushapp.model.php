<?php
class androidpushappModel extends androidpushapp
{
	var $config;

	function getConfig()
	{
		if(!$this->config)
		{
			$oModuleModel = getModel('module');
			$config = $oModuleModel->getModuleConfig('androidpushapp');
			if(!$config->use) $config->use = 'Y';
			
			if(!$config->no_use_module_srls) $config->no_use_module_srls = array();
			if(!is_array($config->no_use_module_srls)) $config->no_use_module_srls = explode('|@|', $config->no_use_module_srls);

			if(!$config->only_admin_push_module_srls) $config->only_admin_push_module_srls = array();
			if(!is_array($config->only_admin_push_module_srls)) $config->only_admin_push_module_srls = explode('|@|', $config->only_admin_push_module_srls);
			
			if(!$config->sort_v) $config->sort_v = 'W';
			if(!$config->change_a) $config->change_a = 'Y';			
			if(!$config->use_d) $config->use_d = 'Y';
			if(!$config->use_c) $config->use_c = 'Y';
			if(!$config->use_m) $config->use_m = 'Y';

			$this->config = $config;
		}

		return $this->config;
	}
	
}
