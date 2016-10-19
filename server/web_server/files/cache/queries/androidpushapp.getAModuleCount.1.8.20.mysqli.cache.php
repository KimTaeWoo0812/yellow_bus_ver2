<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAModuleCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module)) {
${'module24_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module24_argument'}->createConditionValue();
if(!${'module24_argument'}->isValid()) return ${'module24_argument'}->getErrorMessage();
} else
${'module24_argument'} = NULL;if(${'module24_argument'} !== null) ${'module24_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module24_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>