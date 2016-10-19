<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getOneFileInDocument");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl10_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl10_argument'}->createConditionValue();
if(!${'site_srl10_argument'}->isValid()) return ${'site_srl10_argument'}->getErrorMessage();
} else
${'site_srl10_argument'} = NULL;if(${'site_srl10_argument'} !== null) ${'site_srl10_argument'}->setColumnType('number');
if(isset($args->module_srls)) {
${'module_srls11_argument'} = new ConditionArgument('module_srls', $args->module_srls, 'in');
${'module_srls11_argument'}->checkFilter('numbers');
${'module_srls11_argument'}->createConditionValue();
if(!${'module_srls11_argument'}->isValid()) return ${'module_srls11_argument'}->getErrorMessage();
} else
${'module_srls11_argument'} = NULL;if(${'module_srls11_argument'} !== null) ${'module_srls11_argument'}->setColumnType('number');
if(isset($args->direct_download)) {
${'direct_download12_argument'} = new ConditionArgument('direct_download', $args->direct_download, 'equal');
${'direct_download12_argument'}->createConditionValue();
if(!${'direct_download12_argument'}->isValid()) return ${'direct_download12_argument'}->getErrorMessage();
} else
${'direct_download12_argument'} = NULL;if(${'direct_download12_argument'} !== null) ${'direct_download12_argument'}->setColumnType('char');
if(isset($args->isvalid)) {
${'isvalid13_argument'} = new ConditionArgument('isvalid', $args->isvalid, 'equal');
${'isvalid13_argument'}->createConditionValue();
if(!${'isvalid13_argument'}->isValid()) return ${'isvalid13_argument'}->getErrorMessage();
} else
${'isvalid13_argument'} = NULL;if(${'isvalid13_argument'} !== null) ${'isvalid13_argument'}->setColumnType('char');

${'list_count15_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count15_argument'}->ensureDefaultValue('20');
if(!${'list_count15_argument'}->isValid()) return ${'list_count15_argument'}->getErrorMessage();

${'list_order14_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order14_argument'}->ensureDefaultValue('documents.list_order');
if(!${'list_order14_argument'}->isValid()) return ${'list_order14_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`files`.`upload_target_srl`', '`document_srl`')
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
,new Table('`xe_modules`', '`modules`')
,new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`modules`.`site_srl`',$site_srl10_argument,"equal")
,new ConditionWithArgument('`modules`.`module_srl`',$module_srls11_argument,"in", 'and')
,new ConditionWithoutArgument('`files`.`module_srl`','`modules`.`module_srl`',"equal", 'and')
,new ConditionWithArgument('`files`.`direct_download`',$direct_download12_argument,"equal", 'and')
,new ConditionWithArgument('`files`.`isvalid`',$isvalid13_argument,"equal", 'and')
,new ConditionWithoutArgument('`documents`.`document_srl`','`files`.`upload_target_srl`',"equal", 'and')))
));
$query->setGroups(array(
'`files`.`upload_target_srl`' ));
$query->setOrder(array(
new OrderByColumn(${'list_order14_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count15_argument'}));
return $query; ?>