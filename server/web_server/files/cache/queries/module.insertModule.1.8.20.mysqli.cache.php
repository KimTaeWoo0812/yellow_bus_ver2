<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModule");
$query->setAction("insert");
$query->setPriority("");

${'site_srl2_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl2_argument'}->ensureDefaultValue('0');
${'site_srl2_argument'}->checkNotNull();
if(!${'site_srl2_argument'}->isValid()) return ${'site_srl2_argument'}->getErrorMessage();
if(${'site_srl2_argument'} !== null) ${'site_srl2_argument'}->setColumnType('number');

${'module_srl3_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl3_argument'}->checkNotNull();
if(!${'module_srl3_argument'}->isValid()) return ${'module_srl3_argument'}->getErrorMessage();
if(${'module_srl3_argument'} !== null) ${'module_srl3_argument'}->setColumnType('number');

${'module_category_srl4_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
${'module_category_srl4_argument'}->ensureDefaultValue('0');
if(!${'module_category_srl4_argument'}->isValid()) return ${'module_category_srl4_argument'}->getErrorMessage();
if(${'module_category_srl4_argument'} !== null) ${'module_category_srl4_argument'}->setColumnType('number');

${'mid5_argument'} = new Argument('mid', $args->{'mid'});
${'mid5_argument'}->checkNotNull();
if(!${'mid5_argument'}->isValid()) return ${'mid5_argument'}->getErrorMessage();
if(${'mid5_argument'} !== null) ${'mid5_argument'}->setColumnType('varchar');
if(isset($args->skin)) {
${'skin6_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin6_argument'}->isValid()) return ${'skin6_argument'}->getErrorMessage();
} else
${'skin6_argument'} = NULL;if(${'skin6_argument'} !== null) ${'skin6_argument'}->setColumnType('varchar');

${'is_skin_fix7_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix7_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix7_argument'}->isValid()) return ${'is_skin_fix7_argument'}->getErrorMessage();
if(${'is_skin_fix7_argument'} !== null) ${'is_skin_fix7_argument'}->setColumnType('char');

${'is_mskin_fix8_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix8_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix8_argument'}->isValid()) return ${'is_mskin_fix8_argument'}->getErrorMessage();
if(${'is_mskin_fix8_argument'} !== null) ${'is_mskin_fix8_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin9_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin9_argument'}->isValid()) return ${'mskin9_argument'}->getErrorMessage();
} else
${'mskin9_argument'} = NULL;if(${'mskin9_argument'} !== null) ${'mskin9_argument'}->setColumnType('varchar');

${'browser_title10_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title10_argument'}->checkNotNull();
if(!${'browser_title10_argument'}->isValid()) return ${'browser_title10_argument'}->getErrorMessage();
if(${'browser_title10_argument'} !== null) ${'browser_title10_argument'}->setColumnType('varchar');
if(isset($args->layout_srl)) {
${'layout_srl11_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl11_argument'}->isValid()) return ${'layout_srl11_argument'}->getErrorMessage();
} else
${'layout_srl11_argument'} = NULL;if(${'layout_srl11_argument'} !== null) ${'layout_srl11_argument'}->setColumnType('number');
if(isset($args->description)) {
${'description12_argument'} = new Argument('description', $args->{'description'});
if(!${'description12_argument'}->isValid()) return ${'description12_argument'}->getErrorMessage();
} else
${'description12_argument'} = NULL;if(${'description12_argument'} !== null) ${'description12_argument'}->setColumnType('text');
if(isset($args->content)) {
${'content13_argument'} = new Argument('content', $args->{'content'});
if(!${'content13_argument'}->isValid()) return ${'content13_argument'}->getErrorMessage();
} else
${'content13_argument'} = NULL;if(${'content13_argument'} !== null) ${'content13_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent14_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent14_argument'}->isValid()) return ${'mcontent14_argument'}->getErrorMessage();
} else
${'mcontent14_argument'} = NULL;if(${'mcontent14_argument'} !== null) ${'mcontent14_argument'}->setColumnType('bigtext');

${'module15_argument'} = new Argument('module', $args->{'module'});
${'module15_argument'}->checkNotNull();
if(!${'module15_argument'}->isValid()) return ${'module15_argument'}->getErrorMessage();
if(${'module15_argument'} !== null) ${'module15_argument'}->setColumnType('varchar');

${'is_default16_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default16_argument'}->ensureDefaultValue('N');
${'is_default16_argument'}->checkNotNull();
if(!${'is_default16_argument'}->isValid()) return ${'is_default16_argument'}->getErrorMessage();
if(${'is_default16_argument'} !== null) ${'is_default16_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl17_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl17_argument'}->checkFilter('number');
if(!${'menu_srl17_argument'}->isValid()) return ${'menu_srl17_argument'}->getErrorMessage();
} else
${'menu_srl17_argument'} = NULL;if(${'menu_srl17_argument'} !== null) ${'menu_srl17_argument'}->setColumnType('number');

${'open_rss18_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss18_argument'}->ensureDefaultValue('Y');
${'open_rss18_argument'}->checkNotNull();
if(!${'open_rss18_argument'}->isValid()) return ${'open_rss18_argument'}->getErrorMessage();
if(${'open_rss18_argument'} !== null) ${'open_rss18_argument'}->setColumnType('char');
if(isset($args->header_text)) {
${'header_text19_argument'} = new Argument('header_text', $args->{'header_text'});
if(!${'header_text19_argument'}->isValid()) return ${'header_text19_argument'}->getErrorMessage();
} else
${'header_text19_argument'} = NULL;if(${'header_text19_argument'} !== null) ${'header_text19_argument'}->setColumnType('text');
if(isset($args->footer_text)) {
${'footer_text20_argument'} = new Argument('footer_text', $args->{'footer_text'});
if(!${'footer_text20_argument'}->isValid()) return ${'footer_text20_argument'}->getErrorMessage();
} else
${'footer_text20_argument'} = NULL;if(${'footer_text20_argument'} !== null) ${'footer_text20_argument'}->setColumnType('text');

${'regdate21_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate21_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate21_argument'}->isValid()) return ${'regdate21_argument'}->getErrorMessage();
if(${'regdate21_argument'} !== null) ${'regdate21_argument'}->setColumnType('date');
if(isset($args->mlayout_srl)) {
${'mlayout_srl22_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl22_argument'}->isValid()) return ${'mlayout_srl22_argument'}->getErrorMessage();
} else
${'mlayout_srl22_argument'} = NULL;if(${'mlayout_srl22_argument'} !== null) ${'mlayout_srl22_argument'}->setColumnType('number');

${'use_mobile23_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile23_argument'}->ensureDefaultValue('N');
if(!${'use_mobile23_argument'}->isValid()) return ${'use_mobile23_argument'}->getErrorMessage();
if(${'use_mobile23_argument'} !== null) ${'use_mobile23_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl2_argument'})
,new InsertExpression('`module_srl`', ${'module_srl3_argument'})
,new InsertExpression('`module_category_srl`', ${'module_category_srl4_argument'})
,new InsertExpression('`mid`', ${'mid5_argument'})
,new InsertExpression('`skin`', ${'skin6_argument'})
,new InsertExpression('`is_skin_fix`', ${'is_skin_fix7_argument'})
,new InsertExpression('`is_mskin_fix`', ${'is_mskin_fix8_argument'})
,new InsertExpression('`mskin`', ${'mskin9_argument'})
,new InsertExpression('`browser_title`', ${'browser_title10_argument'})
,new InsertExpression('`layout_srl`', ${'layout_srl11_argument'})
,new InsertExpression('`description`', ${'description12_argument'})
,new InsertExpression('`content`', ${'content13_argument'})
,new InsertExpression('`mcontent`', ${'mcontent14_argument'})
,new InsertExpression('`module`', ${'module15_argument'})
,new InsertExpression('`is_default`', ${'is_default16_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl17_argument'})
,new InsertExpression('`open_rss`', ${'open_rss18_argument'})
,new InsertExpression('`header_text`', ${'header_text19_argument'})
,new InsertExpression('`footer_text`', ${'footer_text20_argument'})
,new InsertExpression('`regdate`', ${'regdate21_argument'})
,new InsertExpression('`mlayout_srl`', ${'mlayout_srl22_argument'})
,new InsertExpression('`use_mobile`', ${'use_mobile23_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>