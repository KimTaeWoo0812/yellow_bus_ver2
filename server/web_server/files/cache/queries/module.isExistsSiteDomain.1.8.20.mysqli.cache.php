<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsSiteDomain");
$query->setAction("select");
$query->setPriority("");

${'domain1_argument'} = new ConditionArgument('domain', $args->domain, 'equal');
${'domain1_argument'}->checkNotNull();
${'domain1_argument'}->createConditionValue();
if(!${'domain1_argument'}->isValid()) return ${'domain1_argument'}->getErrorMessage();
if(${'domain1_argument'} !== null) ${'domain1_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`domain`',$domain1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>