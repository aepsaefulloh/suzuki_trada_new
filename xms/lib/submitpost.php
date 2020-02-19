<?php
//IF SUBMIT GROUPFORM
if($submitGrp=='1'){
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		if($k=='ACCESS'){
			$p=0;			
			foreach($v as $l=>$m){
				$p++;
				if($p<2){
					$v=$m;
				}else{
					$v.='|'.$m;
				}
			}			
		}
		
		if (in_array(strtoupper($k), $entity['group'])){			
			$objVar[strtoupper($k)]=$v;			
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
	
	
	//DEFAULT
	$objVar['ACCESS'].='|dashboard';
	
	//MATERI HEAD
	if ((strpos($objVar['ACCESS'],'klub') !== false)||(strpos($objVar['ACCESS'],'jadwal') !== false)||(strpos($objVar['ACCESS'],'topskor') !== false)||(strpos($objVar['ACCESS'],'video') !== false)||(strpos($objVar['ACCESS'],'photo') !== false)||(strpos($objVar['ACCESS'],'profilkita') !== false)) {
		$objVar['ACCESS'].='|dataapi';
	}
	
	//GALERI HEAD
	if ((strpos($objVar['ACCESS'],'galfoto') !== false)||(strpos($objVar['ACCESS'],'galvideo') !== false)||(strpos($objVar['ACCESS'],'galaudio') !== false)||(strpos($objVar['ACCESS'],'galmediacetak') !== false)) {
		$objVar['ACCESS'].='|galeri';
	}
	
	//MASTER HEAD
	if ((strpos($objVar['ACCESS'],'wilayah') !== false)||(strpos($objVar['ACCESS'],'penyuluhan') !== false)||(strpos($objVar['ACCESS'],'kategorikebijakan') !== false)) {
		$objVar['ACCESS'].='|datamaster';
	}
	
	//REKAP HEAD
	if ((strpos($objVar['ACCESS'],'rkpsemuamateri') !== false)||(strpos($objVar['ACCESS'],'rkpmateripenyuluhan') !== false)) {
		$objVar['ACCESS'].='|rekapdata';
	}
	
	
	
	$result=saveRecord('tbl_group',$objVar);
	
	
	//----cached-------
	$res=writeCache('tbl_group','group');
	
	//----------end cached-------
}

?>
