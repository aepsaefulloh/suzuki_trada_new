<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';

$param['LIMIT']=10;
$param['FIN']='0';
$list=getRecord('tbl_content',$param);
$cburl='http://cybex.pertanian.go.id';
$remoteimg='';
foreach($list['RESULT'] as $list){
	$remoteimg=$cburl.$list['PREVIMG'];
	echo $remoteimg.'<br>';
	$fname=explode('/',$list['PREVIMG']);
	$indexFd=sizeof($fname)-1;
	//$indexFl=sizeof($fname)-2;
	$folder='archieve';
	
	echo 'folder : '.$folder.'<br>';
	echo 'Name :'.$fname[$indexFd].'<br>';
	$directoryName=CMS_PATH.'/files/'.$folder;	
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
		mkdir($directoryName, 0755);
	}
	
	echo 'copying : '.$remoteimg.' ---> '.$directoryName.'/'.$fname[$indexFd].'<br>';
	copy($remoteimg, $directoryName.'/'.$fname[$indexFd]);	
	
	
	//update db
	$objVar['ACT']='EDIT';
	$objVar['PK-ID']=$list['ID'];
	$objVar['FIN']='1';
	$objVar['IMAGE_FOLDER']=$folder;
	$objVar['IMAGE']=$fname[$indexFd];	
	$res=saveRecord('tbl_content',$objVar);
	echo $res['SQL'].'<hr>';
}


?>