<?php
//DOWNLOAD ATTACHMENT
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';

$param['LIMIT']=5;
$param['FIN']='0';
$list=getRecord('tbl_attachment',$param);
$cburl='http://cybex.pertanian.go.id';
$remoteimg='';
foreach($list['RESULT'] as $list){
	$remoteimg=$cburl.'/'.$list['FILES'];
	echo $remoteimg.'<br>';
	$fname=explode('/',$list['FILES']);
	$indexFd=sizeof($fname)-1;
	//$indexFl=sizeof($fname)-2;
	$folder='attachment';
	
	echo 'folder : '.$folder.'<br>';
	echo 'Name :'.$fname[$indexFd].'<br>';
	$directoryName=CMS_PATH.'/files/'.$folder;	
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
		mkdir($directoryName, 0755);
	}
	
	echo 'copying : '.$remoteimg.' ---> '.$directoryName.'/'.$fname[$indexFd].'<br>';
	//copy($remoteimg, $directoryName.'/'.$fname[$indexFd]);	
	
	
	
	
	header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename='.basename($remoteimg));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($remoteimg));
    ob_clean();
    flush();
    readfile($remoteimg);
    exit;
	
	
	
	//update db
	$objVar['ACT']='EDIT';
	$objVar['PK-ID']=$list['ID'];
	$objVar['FIN']='1';	
	$objVar['FILENAME']=$fname[$indexFd];	
	$res=saveRecord('tbl_attachment',$objVar);
	echo $res['SQL'].'<hr>';
}



//REFINE CONTENT ID
//SELECT c.id,c.title,a.`FILES`,a.id FROM tbl_content c LEFT JOIN tbl_attachment a ON c.`PREVID`=a.`PREVID` AND c.`CATEGORY`=a.`CATEGORY`  WHERE a.`FILES` IS NOT NULL LIMIT 5


?>