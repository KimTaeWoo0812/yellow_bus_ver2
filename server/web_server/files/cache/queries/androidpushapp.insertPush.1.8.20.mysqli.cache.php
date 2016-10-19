<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertPush");
$query->setAction("insert");
$query->setPriority("");

${'pushid45_argument'} = new Argument('pushid', $args->{'pushid'});
${'pushid45_argument'}->checkNotNull();
if(!${'pushid45_argument'}->isValid()) return ${'pushid45_argument'}->getErrorMessage();
if(${'pushid45_argument'} !== null) ${'pushid45_argument'}->setColumnType('char');

${'type46_argument'} = new Argument('type', $args->{'type'});
${'type46_argument'}->checkNotNull();
if(!${'type46_argument'}->isValid()) return ${'type46_argument'}->getErrorMessage();
if(${'type46_argument'} !== null) ${'type46_argument'}->setColumnType('varchar');
if(isset($args->target_browser)) {
${'target_browser47_argument'} = new Argument('target_browser', $args->{'target_browser'});
if(!${'target_browser47_argument'}->isValid()) return ${'target_browser47_argument'}->getErrorMessage();
} else
${'target_browser47_argument'} = NULL;if(${'target_browser47_argument'} !== null) ${'target_browser47_argument'}->setColumnType('varchar');

${'target_title48_argument'} = new Argument('target_title', $args->{'target_title'});
${'target_title48_argument'}->checkNotNull();
if(!${'target_title48_argument'}->isValid()) return ${'target_title48_argument'}->getErrorMessage();
if(${'target_title48_argument'} !== null) ${'target_title48_argument'}->setColumnType('varchar');
if(isset($args->text)) {
${'text49_argument'} = new Argument('text', $args->{'text'});
if(!${'text49_argument'}->isValid()) return ${'text49_argument'}->getErrorMessage();
} else
${'text49_argument'} = NULL;if(${'text49_argument'} !== null) ${'text49_argument'}->setColumnType('text');

${'target_url50_argument'} = new Argument('target_url', $args->{'target_url'});
${'target_url50_argument'}->checkNotNull();
if(!${'target_url50_argument'}->isValid()) return ${'target_url50_argument'}->getErrorMessage();
if(${'target_url50_argument'} !== null) ${'target_url50_argument'}->setColumnType('varchar');
if(isset($args->push_date)) {
${'push_date51_argument'} = new Argument('push_date', $args->{'push_date'});
if(!${'push_date51_argument'}->isValid()) return ${'push_date51_argument'}->getErrorMessage();
} else
${'push_date51_argument'} = NULL;if(${'push_date51_argument'} !== null) ${'push_date51_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`pushid`', ${'pushid45_argument'})
,new InsertExpression('`type`', ${'type46_argument'})
,new InsertExpression('`target_browser`', ${'target_browser47_argument'})
,new InsertExpression('`target_title`', ${'target_title48_argument'})
,new InsertExpression('`text`', ${'text49_argument'})
,new InsertExpression('`target_url`', ${'target_url50_argument'})
,new InsertExpression('`push_date`', ${'push_date51_argument'})
));
$query->setTables(array(
new Table('`xe_androidpushapp_push`', '`androidpushapp_push`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>