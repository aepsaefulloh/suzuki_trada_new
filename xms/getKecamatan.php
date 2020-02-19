<?php
require_once '../config.php';

//LOGGER
require_once CMS_PATH.'/lib/log4php/Logger.php';
Logger::configure(CMS_PATH.'/lib/log4php.xml');
$log = Logger::getLogger(basename(__FILE__));

require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';

$varKb['ID_PROPINSI'] = isset($_REQUEST['id_propinsi'])?$_REQUEST['id_propinsi']:'';
$varKb['ID_KABUPATEN'] = isset($_REQUEST['id_kabupaten'])?$_REQUEST['id_kabupaten']:'0';
if(($varKb['ID_KABUPATEN']>0))
{
$varKb['STATUS']='1';
$varKb['LIMIT']='200';								
$listKb=getRecord('tbl_kecamatan',$varKb);
$log->info(basename(__FILE__).', getKecamatan : '.$listKb['SQL']);
$options = "<option value='0'>-kecamatan-</option>";
foreach($listKb['RESULT'] as $list){
$options .= "<option value='".$list['ID']."'>".$list['KECAMATAN']."</option>";
}
echo $options;
}
?>