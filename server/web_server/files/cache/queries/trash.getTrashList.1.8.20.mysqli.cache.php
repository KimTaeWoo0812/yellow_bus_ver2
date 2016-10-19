<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTrashList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->trashSrl)) {
${'trashSrl1_argument'} = new ConditionArgument('trashSrl', $args->trashSrl, 'in');
${'trashSrl1_argument'}->checkFilter('number');
${'trashSrl1_argument'}->createConditionValue();
if(!${'trashSrl1_argument'}->isValid()) return ${'trashSrl1_argument'}->getErrorMessage();
} else
${'trashSrl1_argument'} = NULL;if(${'trashSrl1_argument'} !== null) ${'trashSrl1_argument'}->setColumnType('number');
if(isset($args->originModule)) {
${'originModule2_argument'} = new ConditionArgument('originModule', $args->originModule, 'in');
${'originModule2_argument'}->createConditionValue();
if(!${'originModule2_argument'}->isValid()) return ${'originModule2_argument'}->getErrorMessage();
} else
${'originModule2_argument'} = NULL;if(${'originModule2_argument'} !== null) ${'originModule2_argument'}->setColumnType('varchar');

${'page4_argument'} = new Argument('page', $args->{'page'});
${'page4_argument'}->ensureDefaultValue('1');
if(!${'page4_argument'}->isValid()) return ${'page4_argument'}->getErrorMessage();

${'page_count5_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count5_argument'}->ensureDefaultValue('10');
if(!${'page_count5_argument'}->isValid()) return ${'page_count5_argument'}->getErrorMessage();

${'list_count6_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count6_argument'}->ensureDefaultValue('20');
if(!${'list_count6_argument'}->isValid()) return ${'list_count6_argument'}->getErrorMessage();

${'sort_index3_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index3_argument'}->ensureDefaultValue('trash_srl');
if(!${'sort_index3_argument'}->isValid()) return ${'sort_index3_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`T`.*')
,new SelectExpression('`M`.`user_id`')
,new SelectExpression('`M`.`nick_name`')
));
$query->setTables(array(
new Table('`xe_trash`', '`T`')
,new Table('`xe_member`', '`M`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`T`.`remover_srl`','`M`.`member_srl`',"equal")
,new ConditionWithArgument('`trash_srl`',$trashSrl1_argument,"in", 'and')
,new ConditionWithArgument('`origin_module`',$originModule2_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index3_argument'}, "desc")
));
$query->setLimit(new Limit(${'list_count6_argument'}, ${'page4_argument'}, ${'page_count5_argument'}));
return $query; ?>