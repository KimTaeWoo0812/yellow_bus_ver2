<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateDevice");
$query->setAction("update");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl1_argument'} = new Argument('member_srl', $args->{'member_srl'});
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
} else
${'member_srl1_argument'} = NULL;if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');
if(isset($args->setting)) {
${'setting2_argument'} = new Argument('setting', $args->{'setting'});
if(!${'setting2_argument'}->isValid()) return ${'setting2_argument'}->getErrorMessage();
} else
${'setting2_argument'} = NULL;if(${'setting2_argument'} !== null) ${'setting2_argument'}->setColumnType('text');
if(isset($args->sync)) {
${'sync3_argument'} = new Argument('sync', $args->{'sync'});
if(!${'sync3_argument'}->isValid()) return ${'sync3_argument'}->getErrorMessage();
} else
${'sync3_argument'} = NULL;if(${'sync3_argument'} !== null) ${'sync3_argument'}->setColumnType('char');

${'reg_id4_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id4_argument'}->checkNotNull();
${'reg_id4_argument'}->createConditionValue();
if(!${'reg_id4_argument'}->isValid()) return ${'reg_id4_argument'}->getErrorMessage();
if(${'reg_id4_argument'} !== null) ${'reg_id4_argument'}->setColumnType('varchar');

$query->setColumns(array(
new UpdateExpression('`member_srl`', ${'member_srl1_argument'})
,new UpdateExpression('`setting`', ${'setting2_argument'})
,new UpdateExpression('`sync`', ${'sync3_argument'})
));
$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>