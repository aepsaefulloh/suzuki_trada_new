<?php
//IF IMAGE EXIST
	if($_FILES['IMAGE']['name'] != "") {		
		$allowExt=array('jpg','png','jpeg','pdf');
		$ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowExt)){
            $rpfolder='1';            
			$nfname=md5($_FILES['IMAGE']['name']).'.'.strtolower($ext);
			$target=CMS_PATH.'/files/ori/'.$nfname;
			
                                    
			move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);
			$objVar['IMAGE_FOLDER']=$rpfolder.'/'.date('Ym');
			$objVar['IMAGE']=$nfname;
            
            checkFolder($objVar['IMAGE_FOLDER']);
            
			//BUAT RESIZE
			if(!create_thumbnail_preserve_ratio($target, CMS_PATH.'/files/'.$objVar['IMAGE_FOLDER'].'/'.$nfname, '700')){
				copy($target,CMS_PATH.'/files/'.$objVar['IMAGE_FOLDER'].'/'.$nfname);
			}
            
            
		}
	}
?>
