<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateCommentCount");
$query->setAction("update");
$query->setPriority("");

${'comment_count40_argument'} = new Argument('comment_count', $args->{'comment_count'});
${'comment_count40_argument'}->checkNotNull();
if(!${'comment_count40_argument'}->isValid()) return ${'comment_count40_argument'}->getErrorMessage();
if(${'comment_count40_argument'} !== null) ${'comment_count40_argument'}->setColumnType('number');
if(isset($args->update_order)) {
${'update_order41_argument'} = new Argument('update_order', $args->{'update_order'});
if(!${'update_order41_argument'}->isValid()) return ${'update_order41_argument'}->getErrorMessage();
} else
${'update_order41_argument'} = NULL;if(${'update_order41_argument'} !== null) ${'update_order41_argument'}->setColumnType('number');

${'last_update42_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update42_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update42_argument'}->isValid()) return ${'last_update42_argument'}->getErrorMessage();
if(${'last_update42_argument'} !== null) ${'last_update42_argument'}->setColumnType('date');
if(isset($args->last_updater)) {
${'last_updater43_argument'} = new Argument('last_updater', $args->{'last_updater'});
if(!${'last_updater43_argument'}->isValid()) return ${'last_updater43_argument'}->getErrorMessage();
} else
${'last_updater43_argument'} = NULL;if(${'last_updater43_argument'} !== null) ${'last_updater43_argument'}->setColumnType('varchar');

${'document_srl44_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl44_argument'}->checkFilter('number');
${'document_srl44_argument'}->checkNotNull();
${'document_srl44_argument'}->createConditionValue();
if(!${'document_srl44_argument'}->isValid()) return ${'document_srl44_argument'}->getErrorMessage();
if(${'document_srl44_argument'} !== null) ${'document_srl44_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`comment_count`', ${'comment_count40_argument'})
,new UpdateExpression('`update_order`', ${'update_order41_argument'})
,new UpdateExpression('`last_update`', ${'last_update42_argument'})
,new UpdateExpression('`last_updater`', ${'last_updater43_argument'})
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl44_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>