<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deletegcm");
$query->setAction("delete");
$query->setPriority("");

${'reg_id2_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id2_argument'}->checkNotNull();
${'reg_id2_argument'}->createConditionValue();
if(!${'reg_id2_argument'}->isValid()) return ${'reg_id2_argument'}->getErrorMessage();
if(${'reg_id2_argument'} !== null) ${'reg_id2_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>