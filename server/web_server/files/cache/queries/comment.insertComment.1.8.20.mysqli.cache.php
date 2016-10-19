<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertComment");
$query->setAction("insert");
$query->setPriority("");

${'comment_srl14_argument'} = new Argument('comment_srl', $args->{'comment_srl'});
${'comment_srl14_argument'}->checkNotNull();
if(!${'comment_srl14_argument'}->isValid()) return ${'comment_srl14_argument'}->getErrorMessage();
if(${'comment_srl14_argument'} !== null) ${'comment_srl14_argument'}->setColumnType('number');

${'module_srl15_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl15_argument'}->checkFilter('number');
${'module_srl15_argument'}->checkNotNull();
if(!${'module_srl15_argument'}->isValid()) return ${'module_srl15_argument'}->getErrorMessage();
if(${'module_srl15_argument'} !== null) ${'module_srl15_argument'}->setColumnType('number');

${'parent_srl16_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl16_argument'}->checkFilter('number');
${'parent_srl16_argument'}->ensureDefaultValue('0');
if(!${'parent_srl16_argument'}->isValid()) return ${'parent_srl16_argument'}->getErrorMessage();
if(${'parent_srl16_argument'} !== null) ${'parent_srl16_argument'}->setColumnType('number');

${'document_srl17_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl17_argument'}->checkFilter('number');
${'document_srl17_argument'}->checkNotNull();
if(!${'document_srl17_argument'}->isValid()) return ${'document_srl17_argument'}->getErrorMessage();
if(${'document_srl17_argument'} !== null) ${'document_srl17_argument'}->setColumnType('number');

${'is_secret18_argument'} = new Argument('is_secret', $args->{'is_secret'});
${'is_secret18_argument'}->ensureDefaultValue('N');
if(!${'is_secret18_argument'}->isValid()) return ${'is_secret18_argument'}->getErrorMessage();
if(${'is_secret18_argument'} !== null) ${'is_secret18_argument'}->setColumnType('char');

${'notify_message19_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message19_argument'}->ensureDefaultValue('N');
if(!${'notify_message19_argument'}->isValid()) return ${'notify_message19_argument'}->getErrorMessage();
if(${'notify_message19_argument'} !== null) ${'notify_message19_argument'}->setColumnType('char');

${'content20_argument'} = new Argument('content', $args->{'content'});
${'content20_argument'}->checkNotNull();
if(!${'content20_argument'}->isValid()) return ${'content20_argument'}->getErrorMessage();
if(${'content20_argument'} !== null) ${'content20_argument'}->setColumnType('bigtext');

${'voted_count21_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count21_argument'}->ensureDefaultValue('0');
if(!${'voted_count21_argument'}->isValid()) return ${'voted_count21_argument'}->getErrorMessage();
if(${'voted_count21_argument'} !== null) ${'voted_count21_argument'}->setColumnType('number');

${'blamed_count22_argument'} = new Argument('blamed_count', $args->{'blamed_count'});
${'blamed_count22_argument'}->ensureDefaultValue('0');
if(!${'blamed_count22_argument'}->isValid()) return ${'blamed_count22_argument'}->getErrorMessage();
if(${'blamed_count22_argument'} !== null) ${'blamed_count22_argument'}->setColumnType('number');
if(isset($args->password)) {
${'password23_argument'} = new Argument('password', $args->{'password'});
if(!${'password23_argument'}->isValid()) return ${'password23_argument'}->getErrorMessage();
} else
${'password23_argument'} = NULL;if(${'password23_argument'} !== null) ${'password23_argument'}->setColumnType('varchar');

${'nick_name24_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name24_argument'}->checkNotNull();
if(!${'nick_name24_argument'}->isValid()) return ${'nick_name24_argument'}->getErrorMessage();
if(${'nick_name24_argument'} !== null) ${'nick_name24_argument'}->setColumnType('varchar');

${'user_id25_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id25_argument'}->ensureDefaultValue('');
if(!${'user_id25_argument'}->isValid()) return ${'user_id25_argument'}->getErrorMessage();
if(${'user_id25_argument'} !== null) ${'user_id25_argument'}->setColumnType('varchar');

${'user_name26_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name26_argument'}->ensureDefaultValue('');
if(!${'user_name26_argument'}->isValid()) return ${'user_name26_argument'}->getErrorMessage();
if(${'user_name26_argument'} !== null) ${'user_name26_argument'}->setColumnType('varchar');

${'member_srl27_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl27_argument'}->checkFilter('number');
${'member_srl27_argument'}->ensureDefaultValue('0');
if(!${'member_srl27_argument'}->isValid()) return ${'member_srl27_argument'}->getErrorMessage();
if(${'member_srl27_argument'} !== null) ${'member_srl27_argument'}->setColumnType('number');

${'email_address28_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address28_argument'}->checkFilter('email');
${'email_address28_argument'}->ensureDefaultValue('');
if(!${'email_address28_argument'}->isValid()) return ${'email_address28_argument'}->getErrorMessage();
if(${'email_address28_argument'} !== null) ${'email_address28_argument'}->setColumnType('varchar');

${'homepage29_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage29_argument'}->checkFilter('homepage');
${'homepage29_argument'}->ensureDefaultValue('');
if(!${'homepage29_argument'}->isValid()) return ${'homepage29_argument'}->getErrorMessage();
if(${'homepage29_argument'} !== null) ${'homepage29_argument'}->setColumnType('varchar');

${'uploaded_count30_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count30_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count30_argument'}->isValid()) return ${'uploaded_count30_argument'}->getErrorMessage();
if(${'uploaded_count30_argument'} !== null) ${'uploaded_count30_argument'}->setColumnType('number');

${'regdate31_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate31_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate31_argument'}->isValid()) return ${'regdate31_argument'}->getErrorMessage();
if(${'regdate31_argument'} !== null) ${'regdate31_argument'}->setColumnType('date');

${'last_update32_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update32_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update32_argument'}->isValid()) return ${'last_update32_argument'}->getErrorMessage();
if(${'last_update32_argument'} !== null) ${'last_update32_argument'}->setColumnType('date');

${'ipaddress33_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress33_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress33_argument'}->isValid()) return ${'ipaddress33_argument'}->getErrorMessage();
if(${'ipaddress33_argument'} !== null) ${'ipaddress33_argument'}->setColumnType('varchar');

${'list_order34_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order34_argument'}->ensureDefaultValue('0');
if(!${'list_order34_argument'}->isValid()) return ${'list_order34_argument'}->getErrorMessage();
if(${'list_order34_argument'} !== null) ${'list_order34_argument'}->setColumnType('number');

${'status35_argument'} = new Argument('status', $args->{'status'});
${'status35_argument'}->checkFilter('number');
${'status35_argument'}->checkNotNull();
if(!${'status35_argument'}->isValid()) return ${'status35_argument'}->getErrorMessage();
if(${'status35_argument'} !== null) ${'status35_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`comment_srl`', ${'comment_srl14_argument'})
,new InsertExpression('`module_srl`', ${'module_srl15_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl16_argument'})
,new InsertExpression('`document_srl`', ${'document_srl17_argument'})
,new InsertExpression('`is_secret`', ${'is_secret18_argument'})
,new InsertExpression('`notify_message`', ${'notify_message19_argument'})
,new InsertExpression('`content`', ${'content20_argument'})
,new InsertExpression('`voted_count`', ${'voted_count21_argument'})
,new InsertExpression('`blamed_count`', ${'blamed_count22_argument'})
,new InsertExpression('`password`', ${'password23_argument'})
,new InsertExpression('`nick_name`', ${'nick_name24_argument'})
,new InsertExpression('`user_id`', ${'user_id25_argument'})
,new InsertExpression('`user_name`', ${'user_name26_argument'})
,new InsertExpression('`member_srl`', ${'member_srl27_argument'})
,new InsertExpression('`email_address`', ${'email_address28_argument'})
,new InsertExpression('`homepage`', ${'homepage29_argument'})
,new InsertExpression('`uploaded_count`', ${'uploaded_count30_argument'})
,new InsertExpression('`regdate`', ${'regdate31_argument'})
,new InsertExpression('`last_update`', ${'last_update32_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress33_argument'})
,new InsertExpression('`list_order`', ${'list_order34_argument'})
,new InsertExpression('`status`', ${'status35_argument'})
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>