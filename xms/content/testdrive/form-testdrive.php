<?php
$pageseo='testdrive';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_'.$pageseo,$params);
	
	$objDetail=$objDetail['RESULT'][0];
	
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Test Drive</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">					
					<input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
					<input type='hidden' name='ACT' value='<?php echo $act?>'>
                            <p>
                                <label>Nama</label>
                                <span class="field"><input type="text" name="FULLNAME" id="firstname2" class="input-block-level" value="<?php echo $objDetail['FULLNAME']?>"></span>
                            </p>
							
							<p>
                                <label>Email</label>
                                <span class="field"><input type="text" name="EMAIL" id="firstname2" class="input-block-level" value="<?php echo $objDetail['EMAIL']?>"></span>
                            </p>
							
							<p>
                                <label>Telp</label>
                                <span class="field"><input type="text" name="TELP" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TELP']?>"></span>
                            </p>
                            
                            
							
							<p>
                                <label>Alamat </label>
                                <span class="field"><textarea cols="80" rows="5" name="ADDRESS" id="location2" class="input-block-level"><?php echo $objDetail['ADDRESS']?></textarea></span>
                            </p>
							
							<p>
                                <label>Tipe Mobil</label>
                                <span class="field"><input type="text" name="CARTYPE" id="firstname2" class="input-block-level" value="<?php echo $objDetail['CARTYPE']?>"></span>
                            </p>
							
                            <p>
                                <label>Tanggal Testdrive</label>
                                <span class="field"><input type="date" name="TD_DATE" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TD_DATE']?>"></span>
                            </p>
                            
                            <p>
                                <label>Status</label>
                                <span class="field">
									<input type="radio" name="STATUS" value='1' <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Follow Up
									<input type="radio" name="STATUS" value='0' <?php if($objDetail['STATUS']=='0') echo 'checked'?>>	Pending
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary" name='submitcontent' value='1'>Save</button>
                                <button class="btn btn-warning" name='submitcontent' value='0'>Cancel</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    
