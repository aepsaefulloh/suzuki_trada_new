<?php
$objVar=array();
foreach($_REQUEST as $k=>$v){
	//GET COL VAR
	$raw[strtoupper($k)]=$v;	
	if (in_array(strtoupper($k), $entity['user'])){
		if($k=='PASSWD') $v=encrypt($v);
		$objVar[strtoupper($k)]=$v;		
		
		echo "<i>".strtoupper($k)."=".$v."</i><br>";
	}
}
$objVar['CPS']=$raw['PASSWD'];
$result=saveRecord('tbl_user',$objVar);

//UPDATE CONTENT BY USER PROP, KAB
$varCt['ID_PROPINSI']=$raw['ID_PROPINSI'];
$varCt['ID_KABUPATEN']=$raw['ID_KABUPATEN'];
$varCt['ID_KECAMATAN']=$raw['ID_KECAMATAN'];
$varCt['PK-ID_USER']=$raw['ID'];
$result2=saveRecord('tbl_content',$varCt);
echo '<hr>'.$result2['SQL'];

if ($result['RESULT']){
	$redir=CMS_URL.'/index.php?page=data-'.$page;
	//header("Location: ".$redir);
}else{
	echo 'Saving Fail !';
	if (DEBUG) echo $result['SQL'];
}
?>