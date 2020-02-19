<?php
$objVar=array();
foreach($_REQUEST as $k=>$v){	
	//GET COL VAR
	if (in_array(strtoupper($k), $entity['content'])){
		$objVar[strtoupper($k)]=$v;		
		echo "<i>".strtoupper($k)."=".$v."</i><br>";		
	}
}

$result=saveRecord('tbl_content',$objVar);
if ($result['RESULT']){	
	$redir=CMS_URL.'/index.php?page=detail-media&no='.$objVar['NO'];		
	if($objVar['STATUS']!='1'){
		$redir=CMS_URL.'/index.php?page=incomplete-media';		
	}
	
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