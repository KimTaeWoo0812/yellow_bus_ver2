<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateFileValid");
$query->setAction("update");
$query->setPriority("");

${'isvalid36_argument'} = new Argument('isvalid', $args->{'isvalid'});
${'isvalid36_argument'}->ensureDefaultValue('Y');
${'isvalid36_argument'}->checkNotNull();
if(!${'isvalid36_argument'}->isValid()) return ${'isvalid36_argument'}->getErrorMessage();
if(${'isvalid36_argument'} !== null) ${'isvalid36_argument'}->setColumnType('char');

${'upload_target_srl37_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl37_argument'}->checkFilter('number');
${'upload_target_srl37_argument'}->checkNotNull();
${'upload_target_srl37_argument'}->createConditionValue();
if(!${'upload_target_srl37_argument'}->isValid()) return ${'upload_target_srl37_argument'}->getErrorMessage();
if(${'upload_target_srl37_argument'} !== null) ${'upload_target_srl37_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`isvalid`', ${'isvalid36_argument'})
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl37_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>