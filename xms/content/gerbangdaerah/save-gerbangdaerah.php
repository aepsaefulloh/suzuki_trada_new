<?php
$objVar=array();
foreach($_REQUEST as $k=>$v){	
	//GET COL VAR
	if (in_array(strtoupper($k), $entity['content'])){
		$objVar[strtoupper($k)]=$v;		
		echo "<i>".strtoupper($k)."=".$v."</i><br>";		
	}
}


//CHECK IF COMPLETE
if ($objVar['STATUS']<10){
	echo 'cek status';
	if (($objVar['TITLE']!='') && ($objVar['CATEGORY']!='') && ($objVar['AUTHOR']!='') && ($objVar['DESCRIPTION']!='') && ($objVar['KEYWORD']!='')) {
		$objVar['STATUS']=1;
	}else{
		$objVar['STATUS']=0;
	}
}


$result=saveRecord('tbl_user',$objVar);
if ($result['RESULT']){		
	$redir=CMS_URL.'/index.php?page=data-'.$seo;
	if (DEBUG) {
		echo $result['SQL'];
		echo '<br><a href="'.$redir.'">Incomplete list</a>';
	}else{	
		header("Location: ".$redir);
		
	}
}else{
	echo 'Saving Fail !';
	if (DEBUG) echo $result['SQL'];
}

?>