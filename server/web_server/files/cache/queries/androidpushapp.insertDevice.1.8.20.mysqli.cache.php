<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertDevice");
$query->setAction("insert");
$query->setPriority("");

${'reg_id1_argument'} = new Argument('reg_id', $args->{'reg_id'});
${'reg_id1_argument'}->checkNotNull();
if(!${'reg_id1_argument'}->isValid()) return ${'reg_id1_argument'}->getErrorMessage();
if(${'reg_id1_argument'} !== null) ${'reg_id1_argument'}->setColumnType('varchar');

${'sort2_argument'} = new Argument('sort', $args->{'sort'});
${'sort2_argument'}->checkNotNull();
if(!${'sort2_argument'}->isValid()) return ${'sort2_argument'}->getErrorMessage();
if(${'sort2_argument'} !== null) ${'sort2_argument'}->setColumnType('char');

${'sync3_argument'} = new Argument('sync', $args->{'sync'});
${'sync3_argument'}->checkNotNull();
if(!${'sync3_argument'}->isValid()) return ${'sync3_argument'}->getErrorMessage();
if(${'sync3_argument'} !== null) ${'sync3_argument'}->setColumnType('char');

${'deviceId4_argument'} = new Argument('deviceId', $args->{'deviceId'});
${'deviceId4_argument'}->checkNotNull();
if(!${'deviceId4_argument'}->isValid()) return ${'deviceId4_argument'}->getErrorMessage();
if(${'deviceId4_argument'} !== null) ${'deviceId4_argument'}->setColumnType('varchar');

${'setting5_argument'} = new Argument('setting', $args->{'setting'});
${'setting5_argument'}->checkNotNull();
if(!${'setting5_argument'}->isValid()) return ${'setting5_argument'}->getErrorMessage();
if(${'setting5_argument'} !== null) ${'setting5_argument'}->setColumnType('text');

${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate6_argument'}->checkNotNull();
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`reg_id`', ${'reg_id1_argument'})
,new InsertExpression('`sort`', ${'sort2_argument'})
,new InsertExpression('`sync`', ${'sync3_argument'})
,new InsertExpression('`deviceId`', ${'deviceId4_argument'})
,new InsertExpression('`setting`', ${'setting5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
));
$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>