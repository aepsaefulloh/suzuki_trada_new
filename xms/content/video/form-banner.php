<?php
$seo='banner';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_banners',$params);
	$objDetail=$objDetail['RESULT'][0];
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Banner</h1>
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
                                <label>Judul</label>
                                <span class="field"><input type="text" name="TITLE" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TITLE']?>"></span>
                            </p>
                            
							<p>
                                <label>Url</label>
                                <span class="field"><input type="text" name="URL" id="lastname2" class="input-block-level" value='<?php echo $objDetail['URL']?>'></span>
                            </p>
							
							<p>
                                <label>Posisi</label>
                                <span class="field">
								<select name="POS" class="uniformselect">
								<option value=''>-</option>
								<option value="SLIDER" <?php if($objDetail['POS']=='SLIDER') echo 'selected'?>>SLIDER (1200x250)</option>
								<option value="BOTTOM" <?php if($objDetail['POS']=='BOTTOM') echo 'selected'?>>BOTTOM</option>
								<option value="MIDDLE" <?php if($objDetail['POS']=='MIDDLE') echo 'selected'?>>MIDDLE</option>								
								<option value="RIGHT" <?php if($objDetail['POS']=='RIGHT') echo 'selected'?>>RIGHT</option>								
								</select>
								</span>
                            </p>
							
							<p>
                                <label>Gambar
								<small>(type : jpg,jpeg,png)</small>
								</label>
                                <span class="field"><input type="file" name="IMAGE" id="lastname2" class="input-xxlarge"><br><br>
								<img src="<?php echo CMS_URL.'/files/'.$objDetail['IMAGE_FOLDER'].'/'.$objDetail['IMAGE']?>" width='300px'>
								</span>
								
                            </p>
                            
                            
                            <p>
                                <label>Aktif</label>
                                <span class="field">
									<input type="radio" name="STATUS" value='1' style="opacity: 0;" <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Ya
									<input type="radio" name="STATUS" value='0' style="opacity: 0;" <?php if($objDetail['STATUS']=='0') echo 'checked'?>>	Tidak
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
    