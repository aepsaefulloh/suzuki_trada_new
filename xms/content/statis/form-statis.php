<?php
$seo='statis';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_content',$params);
	$objDetail=$objDetail['RESULT'][0];
	$img=getImage($objDetail);
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Statis</h1>
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
                                <label>Ringkasan </label>
                                <span class="field"><textarea cols="80" rows="5" name="TAICING" id="location2" class="input-block-level"><?php echo $objDetail['TAICING']?></textarea></span>
                            </p>
							
                            <p>
                                <label>Isi</label>
                                <span class="field"><textarea cols="80" rows="5" name="CONTENT" id="location2" class="span5 mceEditor"><?php echo $objDetail['CONTENT']?></textarea></span>
                            </p>
							
							<p>
                                <label>Kata Kunci</label>
                                <span class="field"><input type="text" name="KEYWORD" id="lastname2" class="input-block-level" value='<?php echo $objDetail['KEYWORD']?>'></span>
                            </p>
							
							<p>
                                <label>Gambar
								<small>(type : jpg,jpeg,png)</small>
								</label>
                                <span class="field"><input type="file" name="IMAGE" id="lastname2" class="input-xxlarge"><br><br>
								<img src="<?php echo $img?>" width='300px'>
								</span>
								
                            </p>
                            
                            <p>
                                <label>Sumber Gambar</label>
                                <span class="field"><input type="text" name="CAPTION" id="email2" class="input-block-level" value='<?php echo $objDetail['CAPTION']?>'></span>
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
    
