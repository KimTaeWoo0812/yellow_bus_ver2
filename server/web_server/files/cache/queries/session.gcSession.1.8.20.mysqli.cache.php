<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("gcSession");
$query->setAction("delete");
$query->setPriority("");

$query->setTables(array(
new Table('`xe_session`', '`session`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`expired`',"'".date("YmdHis")."'","less")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>