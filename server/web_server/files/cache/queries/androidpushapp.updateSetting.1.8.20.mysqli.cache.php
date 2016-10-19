<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateSetting");
$query->setAction("update");
$query->setPriority("");
if(isset($args->setting)) {
${'setting1_argument'} = new Argument('setting', $args->{'setting'});
if(!${'setting1_argument'}->isValid()) return ${'setting1_argument'}->getErrorMessage();
} else
${'setting1_argument'} = NULL;if(${'setting1_argument'} !== null) ${'setting1_argument'}->setColumnType('text');
if(isset($args->setting_board)) {
${'setting_board2_argument'} = new Argument('setting_board', $args->{'setting_board'});
if(!${'setting_board2_argument'}->isValid()) return ${'setting_board2_argument'}->getErrorMessage();
} else
${'setting_board2_argument'} = NULL;if(${'setting_board2_argument'} !== null) ${'setting_board2_argument'}->setColumnType('text');

${'reg_id3_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id3_argument'}->checkNotNull();
${'reg_id3_argument'}->createConditionValue();
if(!${'reg_id3_argument'}->isValid()) return ${'reg_id3_argument'}->getErrorMessage();
if(${'reg_id3_argument'} !== null) ${'reg_id3_argument'}->setColumnType('varchar');

$query->setColumns(array(
new UpdateExpression('`setting`', ${'setting1_argument'})
,new UpdateExpression('`setting_board`', ${'setting_board2_argument'})
));
$query->setTables(array(
new Table('`xe_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id3_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>