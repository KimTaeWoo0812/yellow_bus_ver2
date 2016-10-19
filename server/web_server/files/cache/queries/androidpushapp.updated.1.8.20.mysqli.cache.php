<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updated");
$query->setAction("update");
$query->setPriority("");

${'last_login2_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login2_argument'}->checkNotNull();
if(!${'last_login2_argument'}->isValid()) return ${'last_login2_argument'}->getErrorMessage();
if(${'last_login2_argument'} !== null) ${'last_login2_argument'}->setColumnType('date');

${'deviceId3_argument'} = new Argument('deviceId', $args->{'deviceId'});
${'deviceId3_argument'}->checkNotNull();
if(!${'deviceId3_argument'}->isValid()) return ${'deviceId3_argument'}->getErrorMessage();
if(${'deviceId3_argument'} !== null) ${'deviceId3_argument'}->setColumnType('varchar');

${'reg_id4_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id4_argument'}->checkNotNull();
${'reg_id4_argument'}->createConditionValue();
if(!${'reg_id4_argument'}->isValid()) return ${'reg_id4_argument'}->getErrorMessage();
if(${'reg_id4_argument'} !== null) ${'reg_id4_argument'}->setColumnType('varchar');

${'sort5_argument'} = new ConditionArgument('sort', $args->sort, 'equal');
${'sort5_argument'}->checkNotNull();
${'sort5_argument'}->createConditionValue();
if(!${'sort5_argument'}->isValid()) return ${'sort5_argument'}->getErrorMessage();
if(${'sort5_argument'} !== null) ${'sort5_argument'}->setColumnType('char');

$query->setColumns(array(
new UpdateExpression('`last_login`', ${'last_login2_argument'})
,new UpdateExpression('`deviceId`', ${'deviceId3_argument'})
));
$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id4_argument,"equal")
,new ConditionWithArgument('`sort`',$sort5_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>