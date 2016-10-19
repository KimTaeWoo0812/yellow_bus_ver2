<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteTag");
$query->setAction("delete");
$query->setPriority("");

${'document_srl40_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl40_argument'}->checkFilter('number');
${'document_srl40_argument'}->checkNotNull();
${'document_srl40_argument'}->createConditionValue();
if(!${'document_srl40_argument'}->isValid()) return ${'document_srl40_argument'}->getErrorMessage();
if(${'document_srl40_argument'} !== null) ${'document_srl40_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_tags`', '`tags`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl40_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>