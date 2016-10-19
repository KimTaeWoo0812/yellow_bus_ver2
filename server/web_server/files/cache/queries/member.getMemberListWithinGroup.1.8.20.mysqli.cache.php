<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberListWithinGroup");
$query->setAction("select");
$query->setPriority("");

${'selected_group_srl1_argument'} = new ConditionArgument('selected_group_srl', $args->selected_group_srl, 'in');
${'selected_group_srl1_argument'}->checkNotNull();
${'selected_group_srl1_argument'}->createConditionValue();
if(!${'selected_group_srl1_argument'}->isValid()) return ${'selected_group_srl1_argument'}->getErrorMessage();
if(${'selected_group_srl1_argument'} !== null) ${'selected_group_srl1_argument'}->setColumnType('number');
if(isset($args->is_admin)) {
${'is_admin2_argument'} = new ConditionArgument('is_admin', $args->is_admin, 'equal');
${'is_admin2_argument'}->createConditionValue();
if(!${'is_admin2_argument'}->isValid()) return ${'is_admin2_argument'}->getErrorMessage();
} else
${'is_admin2_argument'} = NULL;if(${'is_admin2_argument'} !== null) ${'is_admin2_argument'}->setColumnType('char');
if(isset($args->is_denied)) {
${'is_denied3_argument'} = new ConditionArgument('is_denied', $args->is_denied, 'equal');
${'is_denied3_argument'}->createConditionValue();
if(!${'is_denied3_argument'}->isValid()) return ${'is_denied3_argument'}->getErrorMessage();
} else
${'is_denied3_argument'} = NULL;if(${'is_denied3_argument'} !== null) ${'is_denied3_argument'}->setColumnType('char');
if(isset($args->member_srls)) {
${'member_srls4_argument'} = new ConditionArgument('member_srls', $args->member_srls, 'in');
${'member_srls4_argument'}->createConditionValue();
if(!${'member_srls4_argument'}->isValid()) return ${'member_srls4_argument'}->getErrorMessage();
} else
${'member_srls4_argument'} = NULL;if(${'member_srls4_argument'} !== null) ${'member_srls4_argument'}->setColumnType('number');
if(isset($args->s_user_id)) {
${'s_user_id5_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id5_argument'}->createConditionValue();
if(!${'s_user_id5_argument'}->isValid()) return ${'s_user_id5_argument'}->getErrorMessage();
} else
${'s_user_id5_argument'} = NULL;if(${'s_user_id5_argument'} !== null) ${'s_user_id5_argument'}->setColumnType('varchar');
if(isset($args->s_user_name)) {
${'s_user_name6_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name6_argument'}->createConditionValue();
if(!${'s_user_name6_argument'}->isValid()) return ${'s_user_name6_argument'}->getErrorMessage();
} else
${'s_user_name6_argument'} = NULL;if(${'s_user_name6_argument'} !== null) ${'s_user_name6_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name7_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name7_argument'}->createConditionValue();
if(!${'s_nick_name7_argument'}->isValid()) return ${'s_nick_name7_argument'}->getErrorMessage();
} else
${'s_nick_name7_argument'} = NULL;if(${'s_nick_name7_argument'} !== null) ${'s_nick_name7_argument'}->setColumnType('varchar');
if(isset($args->html_nick_name)) {
${'html_nick_name8_argument'} = new ConditionArgument('html_nick_name', $args->html_nick_name, 'like');
${'html_nick_name8_argument'}->createConditionValue();
if(!${'html_nick_name8_argument'}->isValid()) return ${'html_nick_name8_argument'}->getErrorMessage();
} else
${'html_nick_name8_argument'} = NULL;if(${'html_nick_name8_argument'} !== null) ${'html_nick_name8_argument'}->setColumnType('varchar');
if(isset($args->s_email_address)) {
${'s_email_address9_argument'} = new ConditionArgument('s_email_address', $args->s_email_address, 'like');
${'s_email_address9_argument'}->createConditionValue();
if(!${'s_email_address9_argument'}->isValid()) return ${'s_email_address9_argument'}->getErrorMessage();
} else
${'s_email_address9_argument'} = NULL;if(${'s_email_address9_argument'} !== null) ${'s_email_address9_argument'}->setColumnType('varchar');
if(isset($args->s_birthday)) {
${'s_birthday10_argument'} = new ConditionArgument('s_birthday', $args->s_birthday, 'like');
${'s_birthday10_argument'}->createConditionValue();
if(!${'s_birthday10_argument'}->isValid()) return ${'s_birthday10_argument'}->getErrorMessage();
} else
${'s_birthday10_argument'} = NULL;if(${'s_birthday10_argument'} !== null) ${'s_birthday10_argument'}->setColumnType('char');
if(isset($args->s_extra_vars)) {
${'s_extra_vars11_argument'} = new ConditionArgument('s_extra_vars', $args->s_extra_vars, 'like');
${'s_extra_vars11_argument'}->createConditionValue();
if(!${'s_extra_vars11_argument'}->isValid()) return ${'s_extra_vars11_argument'}->getErrorMessage();
} else
${'s_extra_vars11_argument'} = NULL;if(${'s_extra_vars11_argument'} !== null) ${'s_extra_vars11_argument'}->setColumnType('text');
if(isset($args->s_regdate)) {
${'s_regdate12_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate12_argument'}->createConditionValue();
if(!${'s_regdate12_argument'}->isValid()) return ${'s_regdate12_argument'}->getErrorMessage();
} else
${'s_regdate12_argument'} = NULL;if(${'s_regdate12_argument'} !== null) ${'s_regdate12_argument'}->setColumnType('date');
if(isset($args->s_last_login)) {
${'s_last_login13_argument'} = new ConditionArgument('s_last_login', $args->s_last_login, 'like_prefix');
${'s_last_login13_argument'}->createConditionValue();
if(!${'s_last_login13_argument'}->isValid()) return ${'s_last_login13_argument'}->getErrorMessage();
} else
${'s_last_login13_argument'} = NULL;if(${'s_last_login13_argument'} !== null) ${'s_last_login13_argument'}->setColumnType('date');
if(isset($args->s_regdate_more)) {
${'s_regdate_more14_argument'} = new ConditionArgument('s_regdate_more', $args->s_regdate_more, 'more');
${'s_regdate_more14_argument'}->createConditionValue();
if(!${'s_regdate_more14_argument'}->isValid()) return ${'s_regdate_more14_argument'}->getErrorMessage();
} else
${'s_regdate_more14_argument'} = NULL;if(${'s_regdate_more14_argument'} !== null) ${'s_regdate_more14_argument'}->setColumnType('date');
if(isset($args->s_regdate_less)) {
${'s_regdate_less15_argument'} = new ConditionArgument('s_regdate_less', $args->s_regdate_less, 'less');
${'s_regdate_less15_argument'}->createConditionValue();
if(!${'s_regdate_less15_argument'}->isValid()) return ${'s_regdate_less15_argument'}->getErrorMessage();
} else
${'s_regdate_less15_argument'} = NULL;if(${'s_regdate_less15_argument'} !== null) ${'s_regdate_less15_argument'}->setColumnType('date');
if(isset($args->s_last_login_more)) {
${'s_last_login_more16_argument'} = new ConditionArgument('s_last_login_more', $args->s_last_login_more, 'more');
${'s_last_login_more16_argument'}->createConditionValue();
if(!${'s_last_login_more16_argument'}->isValid()) return ${'s_last_login_more16_argument'}->getErrorMessage();
} else
${'s_last_login_more16_argument'} = NULL;if(${'s_last_login_more16_argument'} !== null) ${'s_last_login_more16_argument'}->setColumnType('date');
if(isset($args->s_last_login_less)) {
${'s_last_login_less17_argument'} = new ConditionArgument('s_last_login_less', $args->s_last_login_less, 'less');
${'s_last_login_less17_argument'}->createConditionValue();
if(!${'s_last_login_less17_argument'}->isValid()) return ${'s_last_login_less17_argument'}->getErrorMessage();
} else
${'s_last_login_less17_argument'} = NULL;if(${'s_last_login_less17_argument'} !== null) ${'s_last_login_less17_argument'}->setColumnType('date');

${'page20_argument'} = new Argument('page', $args->{'page'});
${'page20_argument'}->ensureDefaultValue('1');
if(!${'page20_argument'}->isValid()) return ${'page20_argument'}->getErrorMessage();

${'page_count21_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count21_argument'}->ensureDefaultValue('10');
if(!${'page_count21_argument'}->isValid()) return ${'page_count21_argument'}->getErrorMessage();

${'list_count22_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count22_argument'}->ensureDefaultValue('20');
if(!${'list_count22_argument'}->isValid()) return ${'list_count22_argument'}->getErrorMessage();

${'sort_index18_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index18_argument'}->ensureDefaultValue('member.list_order');
if(!${'sort_index18_argument'}->isValid()) return ${'sort_index18_argument'}->getErrorMessage();

${'sort_order19_argument'} = new SortArgument('sort_order19', $args->sort_order);
${'sort_order19_argument'}->ensureDefaultValue('asc');
if(!${'sort_order19_argument'}->isValid()) return ${'sort_order19_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`member`.*')
,new SelectExpression('`site_srl`')
,new SelectExpression('`group_srl`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
,new Table('`xe_member_group_member`', '`member_group`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_group`.`group_srl`',$selected_group_srl1_argument,"in")
,new ConditionWithoutArgument('`member`.`member_srl`','`member_group`.`member_srl`',"equal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`member`.`is_admin`',$is_admin2_argument,"equal")
,new ConditionWithArgument('`member`.`denied`',$is_denied3_argument,"equal", 'and')
,new ConditionWithArgument('`member`.`member_srl`',$member_srls4_argument,"in", 'and')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`member`.`user_id`',$s_user_id5_argument,"like")
,new ConditionWithArgument('`member`.`user_name`',$s_user_name6_argument,"like", 'or')
,new ConditionWithArgument('`member`.`nick_name`',$s_nick_name7_argument,"like", 'or')
,new ConditionWithArgument('`member`.`nick_name`',$html_nick_name8_argument,"like", 'or')
,new ConditionWithArgument('`member`.`email_address`',$s_email_address9_argument,"like", 'or')
,new ConditionWithArgument('`member`.`birthday`',$s_birthday10_argument,"like", 'or')
,new ConditionWithArgument('`member`.`extra_vars`',$s_extra_vars11_argument,"like", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate12_argument,"like_prefix", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login13_argument,"like_prefix", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_more14_argument,"more", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_less15_argument,"less", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_more16_argument,"more", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_less17_argument,"less", 'or')),'and')
));
$query->setGroups(array(
'`member`.`member_srl`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index18_argument'}, $sort_order19_argument)
));
$query->setLimit(new Limit(${'list_count22_argument'}, ${'page20_argument'}, ${'page_count21_argument'}));
return $query; ?>