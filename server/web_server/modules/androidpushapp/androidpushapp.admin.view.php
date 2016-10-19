<?php
class androidpushappAdminView extends androidpushapp
{
	function init()
	{
		$this->setTemplatePath($this->module_path.'tpl');
		$this->setTemplateFile(str_replace('dispAndroidpushappAdmin', '', $this->act));
	}

	function dispAndroidpushappAdminConfig()
	{
		$oModuleModel = getModel('module');
		$oAndroidpushappModel = getModel('androidpushapp');		

		$config = $oAndroidpushappModel->getConfig();
		Context::set('config', $config);		

		$security = new Security();
		$security->encodeHTML('config..');			
		
		$androidpushapp_module_info = $oModuleModel->getModuleInfoXml('androidpushapp');
		Context::set('androidpushapp_module_info', $androidpushapp_module_info);


		$mid_list = $oModuleModel->getMidList(null, array('module_srl', 'mid', 'browser_title', 'module'));

		Context::set('mid_list', $mid_list);

		$this->setTemplateFile('Config');
		
	}

	function dispAndroidpushappAdminList()
	{

		$args->page = Context::get('page'); ///< 페이지
		$args->list_count = 20; ///< 한페이지에 보여줄 기록 수
		$args->page_count = 10; ///< 페이지 네비게이션에 나타날 페이지의 수
		$args->sort_index = 'push_date';
		$args->order_type = 'desc';

		$output = executeQueryArray('androidpushapp.getAdminPushList', $args);


		Context::set('total_count', $output->page_navigation->total_count);
		Context::set('total_page', $output->page_navigation->total_page);
		Context::set('page', $output->page);
		Context::set('androidpushapp_list', $output->data);
		Context::set('page_navigation', $output->page_navigation);

		$this->setTemplateFile('Androidpushapp_list');
	}

	function dispAndroidpushappAdminRegId()
	{

		$filter = Context::get('filter_type');
		$g_srl = Context::get('g_srl');

		$output_groups = executeQueryArray('androidpushapp.getMGroup');

		$args->page = Context::get('page'); ///< 페이지
		$args->list_count = 50; ///< 한페이지에 보여줄 기록 수
		$args->page_count = 10; ///< 페이지 네비게이션에 나타날 페이지의 수
		$args->sort_index = 'regdate';
		$args->order_type = 'desc';			

		$search_target = Context::get('search_target');
		$search_keyword = Context::get('search_keyword');

		if($search_keyword){
			switch ($search_target){
				case 'user_id':
					$args->user_id = $search_keyword;
					break;
				case 'user_name':
					$args->user_name = $search_keyword;
					break;
				case 'email_address':
					$args->email_address = $search_keyword;
					break;
					
				case 'nick_name':
					$args->nick_name = $search_keyword;
					break;
			}
		
			$output = executeQueryArray('androidpushapp.getSearchReg', $args);
		}else{		

			switch($filter){				
				case 'sync_member' :
					$args->sync = "Y";
					Context::set('filter_type_title', "동기화된 기기");
					$output = executeQueryArray('androidpushapp.getAdminPushRegId2', $args);
					
				break;

				case 'not_sync_member' : 
					$args->sync = "N";
					Context::set('filter_type_title', "동기화 되지 않은 기기");
					$output = executeQueryArray('androidpushapp.getAdminPushRegId2', $args);
					
				break;
				

				case 'member_group' :
					$argds = new stdClass;
					$argds->group_srl = $g_srl;
					$output_ddd = executeQueryArray('member.getGroup', $argds);
					foreach($output_ddd->data as $data_ddd){
						$G_title=$data_ddd->title;
					}					
					
					Context::set('filter_type_title', $G_title);					

					$args->group_srl=$g_srl;
					$output = executeQueryArray('androidpushapp.getVGroup', $args);
					
				break;
				

				default : 
					Context::set('filter_type_title', "전체");
					$output = executeQueryArray('androidpushapp.getAdminPushRegId', $args);		
				break;			
			}	
		}

		Context::set('total_count', $output->page_navigation->total_count);
		Context::set('total_page', $output->page_navigation->total_page);
		Context::set('page', $output->page);
		Context::set('androidpushapp_regid', $output->data);		
		Context::set('total_count_list', $output->total_count);
		Context::set('page_navigation', $output->page_navigation);
		Context::set('group_list', $output_groups->data);
		

		$this->setTemplateFile('Androidpushapp_regid');
	}

}
