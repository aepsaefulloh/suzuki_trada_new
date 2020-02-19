<?php
$pageseo='addimage';

$params['PRODUCT_ID']=isset($_REQUEST['pid'])?$_REQUEST['pid']:'';
$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act=isset($_REQUEST['act'])?$_REQUEST['act']:'';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'';


//IF DELETE
if($act=='delete'){
	$vd['ACT']='EDIT';
	$vd['STATUS']='99';
	$vd['PK-ID']=$params['ID']	;
	$res=saveRecord('tbl_addimage',$vd);
	echo $res['SQL'];
}

//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['addimage'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	
	//FILES
	foreach($_FILES as $k=>$v){
		//echo $k.'<br>';
		if (in_array(strtoupper($k), $entity['addimage'])){
			$dir=ROOT_PATH.'/images/product/';
			$allowExt=array('jpg','png','jpeg','pdf','xls','xlsx','doc','docx');
			$ext = pathinfo($v['name'], PATHINFO_EXTENSION);
			if (in_array($ext, $allowExt)){
				$nfname=md5($v['name']).'.'.strtolower($ext);
				$target=$dir.'/'.$nfname;
				move_uploaded_file($v['tmp_name'],$target);			
				$objVar[$k]=$nfname;
			}
		}
	}
	
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	//echo $result['SQL'];
	
	//----cached-------
	//$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Additional Image</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
           
			
			<div class="mediamgr">
            	<div class="mediamgr_left">
                	<div class="mediamgr_head">
                    	<ul class="mediamgr_menu">
                        	<form method='post'  enctype="multipart/form-data">
							<input type='hidden' name='ACT' value='ADD'>
							<input type='hidden' name='PRODUCT_ID' value='<?php echo $params['PRODUCT_ID']?>'>
							<input type='hidden' name='STATUS' value='1'>
                            <li class="filesearch">
                            	
									
                            		<input type="file" name='IMAGE' id="filekeyword" class="filekeyword">
                            		
                                
                            </li>
                            <li class="right newfilebtn">
								<button class="btn btn-primary" name='submitcontent' value='1'>Upload</button>
							</li>
							</form>
                        </ul>
                        <span class="clearall"></span>
                    </div><!--mediamgr_head-->
                    
                    
                    <div class="mediamgr_content">
						
                        
                    	
                        <ul id="medialist" class="listfile isotope" style="position: relative; overflow: hidden; height: 1250px;">
						<?php 
						$var['STATUS']='1';
						$var['LIMIT']=50;
						$var['PRODUCT_ID']=$params['PRODUCT_ID'];
						$list=getRecord('tbl_addimage',$var);
						foreach($list['RESULT'] as $list){
						?>
                        	<li class="image isotope-item">
                                <a href="#" class="cboxElement">
								 <img src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE']?>" style='width:200px'>
								</a>
                            	
								<a href='<?php echo CMS_URL.'/index.php?page=form-product-image&act=delete&pid='.$list['PRODUCT_ID'].'&id='.$list['ID']?>' class="btn trash" title="Trash"><span class="icon-trash"></span></a>
                           </li>
						<?php } ?>
                        </ul>
                        
                        <br class="clearall">
                        
                    </div><!--mediamgr_content-->
                    
                </div><!--mediamgr_left -->
                
               
            </div>
			
			
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    
