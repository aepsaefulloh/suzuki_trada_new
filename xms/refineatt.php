<?php
//REFINE ATTACHMENT
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';

$var['LIMIT']='10';
$list=getRefAtt($var);
echo $list['SQL'];
foreach($list['RESULT'] as $list){
	echo $list['CID'].' - '.$list['CONTENT_ID'].' - '.$list['FILES'].'<hr>';
}

?>