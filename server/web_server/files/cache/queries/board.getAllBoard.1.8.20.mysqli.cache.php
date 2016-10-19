<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAllBoard");
$query->setAction("select");
$query->setPriority("");

${'sort_index25_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index25_argument'}->ensureDefaultValue('mid');
if(!${'sort_index25_argument'}->isValid()) return ${'sort_index25_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`module`',"'board'","equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index25_argument'}, "asc")
));
$query->setLimit();
return $query; ?>