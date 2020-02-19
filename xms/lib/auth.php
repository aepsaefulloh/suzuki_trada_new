<?php
session_start();
//$objItem=null;

$ERROR_MSG='GOOD DAY';
if (!isset($_SESSION['ISLOGIN'])) {
		$_SESSION['ISLOGIN'] = false;					
	}

if (!isset($_SESSION['NAMA'])) {
		$_SESSION['NAMA'] = "";					
	}

if (!isset($_SESSION['ID_USER'])) {
		$_SESSION['ID_USER'] = "";					
	}	
	
if (!isset($_SESSION['USERNAME'])) {
		$_SESSION['USERNAME'] = "";					
	}	
	
if (!isset($_SESSION['EMAIL'])) {
		$_SESSION['EMAIL'] = "";					
	}

if (!isset($_SESSION['ROLE'])) {
		$_SESSION['ROLE'] = "";					
	}	
	
if (!isset($_SESSION['PASSWD'])) {
		$_SESSION['PASSWD'] = "";					
	}	


//CEK IF LOGIN/LOGOUT
$act=isset($_REQUEST['act'])?$_REQUEST['act']:'';	


if ($act=="login"){	
	$objItem['USERNAME']=isset($_REQUEST['username'])?$_REQUEST['username']:"";
	$objItem['PASSWD']=isset($_REQUEST['password'])?$_REQUEST['password']:"";	
	
	if (($objItem['USERNAME']!="") AND  ($objItem['PASSWD']!="")){
	//echo 'SQL PROCESS';		
		$var['EUP']=encrypt($objItem['USERNAME']).'|'.encrypt($objItem['PASSWD']);
		$status=validateUser($var);			
	}else{
		//echo 'unprecess';
	}
}else if ($act=="logout"){
	
	$_SESSION['ID_USER'] = "";
	$_SESSION['USERNAME'] = "";
	$_SESSION['EMAIL'] = "";
	$_SESSION['FULLNAME']="";
	$_SESSION['ID_GROUP'] = "";
	$_SESSION['PASSWD'] = "";
	$_SESSION['ISLOGIN'] = false;
}

function validateUser($objItem){
	
//echo 'SQL VALIDATE';
$res=false;
$objInfo=getRecord('tbl_user',$objItem);
//echo $objInfo['SQL'];
if(!empty($objInfo['RESULT'])){
	//echo 'okey login';
	
	$_SESSION['ID_USER'] = $objInfo['RESULT'][0]['ID'];
	$_SESSION['USERNAME'] = $objInfo['RESULT'][0]['USERNAME'];
	$_SESSION['FULLNAME'] = $objInfo['RESULT'][0]['FULLNAME'];
	$_SESSION['EMAIL'] = $objInfo['RESULT'][0]['EMAIL'];	
	$_SESSION['ID_GROUP'] = $objInfo['RESULT'][0]['ID_GROUP'];	
	$_SESSION['PASSWD'] = $objInfo['RESULT'][0]['PASSWD'];	
	$_SESSION['ISLOGIN'] = true;	
	
	$res=true;
	
	//SET LASTLOGIN
	$vrl['LASTLOGIN']=date('Y-m-d H:i:s');
	$vrl['PK-ID']=$_SESSION['ID_USER'];
	$vrl['ACT']='EDIT';
	$rVl=saveRecord('tbl_user',$vrl);
	//echo $rVl['SQL'];
	
	//--------------DO LOG------------
	$var['ACT']='ADD';		
	$var['PROC']='login';
	$var['ACC']=$_SESSION['USERNAME'];
	$var['TBL']='tbl_user';
	$var['REMARKS']=$_SERVER['REMOTE_ADDR'].' - '.$_SERVER['HTTP_USER_AGENT'];
	$var['LOG_TIMESTAMP']=date('Y-m-d H:i:s');
	$rl=saveRecord('tbl_log',$var);
	//echo $rl['SQL'];
	//--------------------------------
	
	
}else{
	$_SESSION['ISLOGIN'] = false;	
}
return $res;
}
?>
