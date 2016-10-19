<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocuments");
$query->setAction("select");
$query->setPriority("");

${'document_srls16_argument'} = new ConditionArgument('document_srls', $args->document_srls, 'in');
${'document_srls16_argument'}->checkNotNull();
${'document_srls16_argument'}->createConditionValue();
if(!${'document_srls16_argument'}->isValid()) return ${'document_srls16_argument'}->getErrorMessage();
if(${'document_srls16_argument'} !== null) ${'document_srls16_argument'}->setColumnType('number');

${'page19_argument'} = new Argument('page', $args->{'page'});
${'page19_argument'}->ensureDefaultValue('1');
if(!${'page19_argument'}->isValid()) return ${'page19_argument'}->getErrorMessage();

${'page_count20_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count20_argument'}->ensureDefaultValue('10');
if(!${'page_count20_argument'}->isValid()) return ${'page_count20_argument'}->getErrorMessage();

${'list_count21_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count21_argument'}->ensureDefaultValue('20');
if(!${'list_count21_argument'}->isValid()) return ${'list_count21_argument'}->getErrorMessage();

${'list_order17_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order17_argument'}->ensureDefaultValue('list_order');
if(!${'list_order17_argument'}->isValid()) return ${'list_order17_argument'}->getErrorMessage();

${'order_type18_argument'} = new SortArgument('order_type18', $args->order_type);
${'order_type18_argument'}->ensureDefaultValue('asc');
if(!${'order_type18_argument'}->isValid()) return ${'order_type18_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srls16_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order17_argument'}, $order_type18_argument)
));
$query->setLimit(new Limit(${'list_count21_argument'}, ${'page19_argument'}, ${'page_count20_argument'}));
return $query; ?>