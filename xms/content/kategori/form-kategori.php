<?php
$seo='kategori';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$params['ID_PARENT']=isset($_REQUEST['idparent'])?$_REQUEST['idparent']:'';
$act=isset($_REQUEST['act'])?$_REQUEST['act']:'ADD';


$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_penyuluhan',$params);
	$objDetail=$objDetail['RESULT'][0];
	$params['ID_PARENT']=$objDetail['ID_PARENT'];
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Penyuluhan</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>" enctype="multipart/form-data">					
					<input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>					
					<input type='hidden' name='ID_PARENT' value='<?php echo $params['ID_PARENT']?>'>					
					<input type='hidden' name='ACT' value='<?php echo $act?>'>
                            <p>
                                <label>KATEGORI</label>
                                <span class="field"><input type="text" name="PENYULUHAN" id="firstname2" class="input-block-level" value="<?php echo $objDetail['PENYULUHAN']?>"></span>
                            </p>
							
							
                            <p>
                                <label>Aktif</label>
                                <span class="field">
									<input type="radio" name="STATUS" value='1' <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Ya
									<input type="radio" name="STATUS" value='0' <?php if($objDetail['STATUS']=='0') echo 'checked'?>>	Tidak
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary" name='submitcontent' value='1'>SIMPAN</button>
                                <button class="btn btn-warning" name='submitcontent' value='0'>BATAL</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    