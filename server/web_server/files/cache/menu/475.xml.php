<?php define('__XE__', true); require_once('C:/inetpub/wwwroot/xe/config/config.inc.php'); $oContext = Context::getInstance(); $oContext->init(); header("Content-Type: text/xml; charset=UTF-8"); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); header("Cache-Control: no-store, no-cache, must-revalidate"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); $lang_type = Context::getLangType(); $is_logged = Context::get('is_logged'); $logged_info = Context::get('logged_info'); $site_srl = 0;$site_admin = false;if($site_srl) { $oModuleModel = getModel('module');$site_module_info = $oModuleModel->getSiteInfo($site_srl); if($site_module_info) Context::set('site_module_info',$site_module_info);else $site_module_info = Context::get('site_module_info');$grant = $oModuleModel->getGrant($site_module_info, $logged_info); if($grant->manager ==1) $site_admin = true;}if($is_logged) {if($logged_info->is_admin=="Y") $is_admin = true; else $is_admin = false; $group_srls = array_keys($logged_info->group_list); } else { $is_admin = false; $group_srls = array(); } $oContext->close(); ?><root><node node_srl="480" parent_srl="0" menu_name_key='addbeacontable' text="<?php if(($is_admin==true||(is_array($group_srls)&&count(array_intersect($group_srls, array(-3))))||($is_logged&&0))) { $_names = array("en"=>'addbeacontable',"ko"=>'addbeacontable',"jp"=>'addbeacontable',"zh-CN"=>'addbeacontable',"zh-TW"=>'addbeacontable',"fr"=>'addbeacontable',"de"=>'addbeacontable',"ru"=>'addbeacontable',"es"=>'addbeacontable',"tr"=>'addbeacontable',"vi"=>'addbeacontable',"mn"=>'addbeacontable',); print $_names[$lang_type]; }?>" url="<?php print(($is_admin==true||(is_array($group_srls)&&count(array_intersect($group_srls, array(-3))))||($is_logged&&0))?"page_NXcA21":"")?>" href="<?php print(($is_admin==true||(is_array($group_srls)&&count(array_intersect($group_srls, array(-3))))||($is_logged&&0))?getSiteUrl('', '','mid','page_NXcA21'):"")?>" is_shortcut="N" desc="" open_window="N" expand="N" normal_btn="" hover_btn="" active_btn="" link="<?php if(($is_admin==true||(is_array($group_srls)&&count(array_intersect($group_srls, array(-3))))||($is_logged&&0))) {?><?php print $_names[$lang_type]; ?><?php }?>" /></root>