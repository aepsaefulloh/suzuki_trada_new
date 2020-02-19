<?php
$seo='kategorikebijakan';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_category',$params);
	$objDetail=$objDetail['RESULT'][0];
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Kategori Kebijakan</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>" enctype="multipart/form-data">					
					<input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
					<input type='hidden' name='ACT' value='<?php echo $act?>'>
                            <p>
                                <label>Kategori</label>
                                <span class="field"><input type="text" name="CATEGORY" id="firstname2" class="input-block-level" value="<?php echo $objDetail['CATEGORY']?>"></span>
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
    