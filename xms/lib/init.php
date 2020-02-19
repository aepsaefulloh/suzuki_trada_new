<?php
$objConf=array();
$varConf['LIMIT']='0,50';
$varConf['CATEGORY']='conf';
$siteconf=getRecord('tbl_config',$varConf);
foreach($siteconf['RESULT'] as $list){
	$objConf[$list['CKEY']]=$list['CVALUE'];	
}
?>