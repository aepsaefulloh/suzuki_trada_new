<?php
$seo='klub';

$params['SEO']=isset($_REQUEST['seo'])?$_REQUEST['seo']:'';

$act='ADD';
$objDetail=null;
if($params['SEO']!=''){
	$act='EDIT';	
	$objDetail=getRecord('tbl_club',$params);	
	$objDetail=$objDetail['RESULT'][0];
	
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Klub</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>" enctype="multipart/form-data">					
					<input type='hidden' name='PK-SEO' value='<?php echo $objDetail['SEO']?>'>
					<input type='hidden' name='ACT' value='<?php echo $act?>'>
                            <p>
                                <label>Nama</label>
                                <span class="field"><input type="text" name="NAMA" id="firstname2" class="input-block-level" value="<?php echo $objDetail['NAMA']?>"></span>
                            </p>
                            
                            
							<p>
                                <label>Tahun</label>
                                <span class="field"><input type="text" name="TAHUN" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TAHUN']?>"></span>
                            </p>
                            
                            <p>
                                <label>Peringkat</label>
                                <span class="field"><input type="text" name="PERINGKAT" id="firstname2" class="input-block-level" value="<?php echo $objDetail['PERINGKAT']?>"></span>
                            </p>
							
                            <p>
                                <label>DESKRIPSI</label>
                                <span class="field"><textarea cols="80" rows="5" name="DESKRIPSI" id="location2" class="span5 mceEditor"><?php echo $objDetail['DESKRIPSI']?></textarea></span>
                            </p>
							
							<p>
                                <label>Photo
								<small>(type : jpg,jpeg,png)</small>
								</label>
                                <!--span class="field"><input type="file" name="IMAGE" id="lastname2" class="input-xxlarge"><br><br-->
								<img src="<?php echo $objDetail['PHOTO']?>" width='300px'>
								</span>
								
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
    
