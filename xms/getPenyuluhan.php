<?php
require_once '../config.php';

//LOGGER
require_once CMS_PATH.'/lib/log4php/Logger.php';
Logger::configure(CMS_PATH.'/lib/log4php.xml');
$log = Logger::getLogger(basename(__FILE__));

require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';

$varKb['ID_PARENT'] = isset($_REQUEST['id_parent'])?$_REQUEST['id_parent']:'0';
if($varKb['ID_PARENT']>0)
{
$varKb['STATUS']='1';
$varKb['LIMIT']='200';								
$listKb=getRecord('tbl_penyuluhan',$varKb);
$log->info(basename(__FILE__).', getPenyuluhan : '.$listKb['SQL']);
$options = "<option value=''> - </option>";
foreach($listKb['RESULT'] as $list){
$options .= "<option value='".$list['ID']."'>".$list['PENYULUHAN']."</option>";
}
echo $options;
}
?>