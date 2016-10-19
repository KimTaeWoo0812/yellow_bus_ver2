<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getgcm");
$query->setAction("select");
$query->setPriority("");

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>