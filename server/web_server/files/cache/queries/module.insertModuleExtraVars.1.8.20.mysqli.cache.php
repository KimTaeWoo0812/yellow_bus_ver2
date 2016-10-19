<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleExtraVars");
$query->setAction("insert");
$query->setPriority("");

${'module_srl42_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl42_argument'}->checkFilter('number');
${'module_srl42_argument'}->checkNotNull();
if(!${'module_srl42_argument'}->isValid()) return ${'module_srl42_argument'}->getErrorMessage();
if(${'module_srl42_argument'} !== null) ${'module_srl42_argument'}->setColumnType('number');

${'name43_argument'} = new Argument('name', $args->{'name'});
${'name43_argument'}->checkNotNull();
if(!${'name43_argument'}->isValid()) return ${'name43_argument'}->getErrorMessage();
if(${'name43_argument'} !== null) ${'name43_argument'}->setColumnType('varchar');

${'value44_argument'} = new Argument('value', $args->{'value'});
${'value44_argument'}->checkNotNull();
if(!${'value44_argument'}->isValid()) return ${'value44_argument'}->getErrorMessage();
if(${'value44_argument'} !== null) ${'value44_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl42_argument'})
,new InsertExpression('`name`', ${'name43_argument'})
,new InsertExpression('`value`', ${'value44_argument'})
));
$query->setTables(array(
new Table('`xe_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>