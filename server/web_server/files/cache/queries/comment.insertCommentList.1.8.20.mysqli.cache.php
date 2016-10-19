<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCommentList");
$query->setAction("insert");
$query->setPriority("");

${'comment_srl7_argument'} = new Argument('comment_srl', $args->{'comment_srl'});
${'comment_srl7_argument'}->checkNotNull();
if(!${'comment_srl7_argument'}->isValid()) return ${'comment_srl7_argument'}->getErrorMessage();
if(${'comment_srl7_argument'} !== null) ${'comment_srl7_argument'}->setColumnType('number');

${'document_srl8_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl8_argument'}->checkFilter('number');
${'document_srl8_argument'}->checkNotNull();
if(!${'document_srl8_argument'}->isValid()) return ${'document_srl8_argument'}->getErrorMessage();
if(${'document_srl8_argument'} !== null) ${'document_srl8_argument'}->setColumnType('number');
if(isset($args->head)) {
${'head9_argument'} = new Argument('head', $args->{'head'});
${'head9_argument'}->checkFilter('number');
if(!${'head9_argument'}->isValid()) return ${'head9_argument'}->getErrorMessage();
} else
${'head9_argument'} = NULL;if(${'head9_argument'} !== null) ${'head9_argument'}->setColumnType('number');
if(isset($args->arrange)) {
${'arrange10_argument'} = new Argument('arrange', $args->{'arrange'});
${'arrange10_argument'}->checkFilter('number');
if(!${'arrange10_argument'}->isValid()) return ${'arrange10_argument'}->getErrorMessage();
} else
${'arrange10_argument'} = NULL;if(${'arrange10_argument'} !== null) ${'arrange10_argument'}->setColumnType('number');

${'module_srl11_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl11_argument'}->checkFilter('number');
${'module_srl11_argument'}->checkNotNull();
if(!${'module_srl11_argument'}->isValid()) return ${'module_srl11_argument'}->getErrorMessage();
if(${'module_srl11_argument'} !== null) ${'module_srl11_argument'}->setColumnType('number');
if(isset($args->regdate)) {
${'regdate12_argument'} = new Argument('regdate', $args->{'regdate'});
if(!${'regdate12_argument'}->isValid()) return ${'regdate12_argument'}->getErrorMessage();
} else
${'regdate12_argument'} = NULL;if(${'regdate12_argument'} !== null) ${'regdate12_argument'}->setColumnType('date');
if(isset($args->depth)) {
${'depth13_argument'} = new Argument('depth', $args->{'depth'});
${'depth13_argument'}->checkFilter('number');
if(!${'depth13_argument'}->isValid()) return ${'depth13_argument'}->getErrorMessage();
} else
${'depth13_argument'} = NULL;if(${'depth13_argument'} !== null) ${'depth13_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`comment_srl`', ${'comment_srl7_argument'})
,new InsertExpression('`document_srl`', ${'document_srl8_argument'})
,new InsertExpression('`head`', ${'head9_argument'})
,new InsertExpression('`arrange`', ${'arrange10_argument'})
,new InsertExpression('`module_srl`', ${'module_srl11_argument'})
,new InsertExpression('`regdate`', ${'regdate12_argument'})
,new InsertExpression('`depth`', ${'depth13_argument'})
));
$query->setTables(array(
new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>