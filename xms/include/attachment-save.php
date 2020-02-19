<?php
//GET INSERTED ID
$varRs['TITLE']=$objVar['TITLE'];
$varRs['CATEGORY']=$pageseo;
$varRs['LIMIT']='1';
$rget=getRecord('tbl_content',$varRs);
//echo $rget['SQL'];
$cid=$rget['RESULT' ][0]['ID'];



//CLEAN ATTACHMENT
$vdel['CONTENT_ID']=$cid;
$rdel=deleteAttachment($vdel);
//echo $rdel['SQL'];

$filename=isset($_REQUEST['FILENAME'])?$_REQUEST['FILENAME']:'';

if (!empty($filename)){
	foreach($filename as $k=> $v){
        echo $k.'-'.$v.'<br>';
        
		$varAt['ACT']='ADD';
		$varAt['CONTENT_ID']=$cid;
		$varAt['CATEGORY']=$pageseo;
		$varAt['URL']=$v;
		$varAt['STATUS']='1';
		$varAt['FIN']='1';		
		
		if(strlen($varAt['URL'])>1){
		$rSave=saveRecord('tbl_attachment',$varAt);
       		//echo $rSave['SQL'];
		}
	}	
}

?>
