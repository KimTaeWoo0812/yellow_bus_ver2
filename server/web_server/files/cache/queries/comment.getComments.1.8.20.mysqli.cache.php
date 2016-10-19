<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getComments");
$query->setAction("select");
$query->setPriority("");

${'comment_srls9_argument'} = new ConditionArgument('comment_srls', $args->comment_srls, 'in');
${'comment_srls9_argument'}->checkNotNull();
${'comment_srls9_argument'}->createConditionValue();
if(!${'comment_srls9_argument'}->isValid()) return ${'comment_srls9_argument'}->getErrorMessage();
if(${'comment_srls9_argument'} !== null) ${'comment_srls9_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srls9_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>