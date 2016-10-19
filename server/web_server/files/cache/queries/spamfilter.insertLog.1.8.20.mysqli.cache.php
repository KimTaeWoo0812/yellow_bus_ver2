<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLog");
$query->setAction("insert");
$query->setPriority("");

${'spamfilter_log_srl4_argument'} = new Argument('spamfilter_log_srl', $args->{'spamfilter_log_srl'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'spamfilter_log_srl4_argument'}->ensureDefaultValue($sequence);
if(!${'spamfilter_log_srl4_argument'}->isValid()) return ${'spamfilter_log_srl4_argument'}->getErrorMessage();
if(${'spamfilter_log_srl4_argument'} !== null) ${'spamfilter_log_srl4_argument'}->setColumnType('number');

${'ipaddress5_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress5_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress5_argument'}->isValid()) return ${'ipaddress5_argument'}->getErrorMessage();
if(${'ipaddress5_argument'} !== null) ${'ipaddress5_argument'}->setColumnType('varchar');

${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate6_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`spamfilter_log_srl`', ${'spamfilter_log_srl4_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
));
$query->setTables(array(
new Table('`xe_spamfilter_log`', '`spamfilter_log`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>