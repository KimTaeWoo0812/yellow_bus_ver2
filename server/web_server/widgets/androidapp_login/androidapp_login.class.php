<?php
/* Copyright (C) NAVER <http://www.navercorp.com> */
/**
 * @class login_info
 * @author NAVER (developers@xpressengine.com)
 * @version 0.1
 * @brief Widget to display log-in form
 *
 * $Pre-configured by using $logged_info
 */
class androidapp_login extends WidgetHandler
{
	/**
	 * @brief Widget execution
	 * Get extra_vars declared in ./widgets/widget/conf/info.xml as arguments
	 * After generating the result, do not print but return it.
	 */
	function proc($args)
	{
		// Set a path of the template skin (values of skin, colorset settings)
		$tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
		Context::set('colorset', $args->colorset);
		// Specify a template file
		if(Context::get('is_logged')) $tpl_file = 'login_info';
		else $tpl_file = 'login_form';

		$oAndroidpushappModel = getModel('androidpushapp');
		$config_push = $oAndroidpushappModel->getConfig();
		Context::set('change_a', $config_push->change_a);

		// Get the member configuration
		$oModuleModel = getModel('module');
		$this->member_config = $oModuleModel->getModuleConfig('member');
		Context::set('member_config', $this->member_config);

		// Set a flag to check if the https connection is made when using SSL and create https url 
		$ssl_mode = false;
		$useSsl = Context::getSslStatus();
		if($useSsl != 'none')
		{
			if(strncasecmp('https://', Context::getRequestUri(), 8) === 0) $ssl_mode = true;
		}
		Context::set('ssl_mode',$ssl_mode);

		Context::set('top_text',$args->top_text);
		Context::set('social_text',$args->social_text);
		Context::set('app_name',$args->app_name);

		// Compile a template
		$oTemplate = &TemplateHandler::getInstance();
		return $oTemplate->compile($tpl_path, $tpl_file);
	}
}
/* End of file androidapp_login.class.php */
/* Location: ./widgets/androidapp_login/androidapp_login.class.php */
