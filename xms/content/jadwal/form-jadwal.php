<?php
$seo='jadwal';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_schedule',$params);	
	$objDetail=$objDetail['RESULT'][0];
	
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Diseminasi Teknologi</h1>
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
                                <label>Laga</label>
                                <span class="field"><input type="text" name="LAGA" id="firstname2" class="input-block-level" value="<?php echo $objDetail['LAGA']?>"></span>
                            </p>
                            
							<p>
                                <label>Tanggal</label>
                                <span class="field"><input type="date" name="TANGGAL" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TANGGAL']?>"></span>
                            </p>
							
							<p>
                                <label>Pekan Ke-</label>
                                <span class="field"><input type="text" name="PEKAN" id="firstname2" class="input-block-level" value="<?php echo $objDetail['PEKAN']?>"></span>
                            </p>
							
                            <p>
                                <label>Lokasi</label>
                                <span class="field"><input type="text" name="LOKASI" id="firstname2" class="input-block-level" value="<?php echo $objDetail['LOKASI']?>"></span>
                            </p>
                            
                            <p>
                                <label>Waktu Mulai</label>
                                <span class="field"><input type="text" name="WAKTU_MULAI" id="firstname2" class="input-block-level" value="<?php echo $objDetail['WAKTU_MULAI']?>"></span>
                            </p>
                            
                            <p>
                                <label>Waktu Selesai</label>
                                <span class="field"><input type="text" name="WAKTU_SELESAI" id="firstname2" class="input-block-level" value="<?php echo $objDetail['WAKTU_SELESAI']?>"></span>
                            </p>
							
                            <p>
                                <label>Kandang</label>
                                <span class="field"><input type="text" name="KANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['KANDANG']?>"></span>
                            </p>
                            
                            <p>
                                <label>Tandang</label>
                                <span class="field"><input type="text" name="TANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TANDANG']?>"></span>
                            </p>
                            
                            <p>
                                <label>Skor Kandang</label>
                                <span class="field"><input type="text" name="SKOR_KANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['SKOR_KANDANG']?>"></span>
                            </p>
                            
                            <p>
                                <label>Skor Tandang</label>
                                <span class="field"><input type="text" name="SKOR_TANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['SKOR_TANDANG']?>"></span>
                            </p>
							
							 <p>
                                <label>Logo Kandang</label>
                                <span class="field"><input type="text" name="LOGO_KANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['LOGO_KANDANG']?>"></span>
                            </p>
							
							<p>
                                <label>Logo Tandang</label>
                                <span class="field"><input type="text" name="LOGO_TANDANG" id="firstname2" class="input-block-level" value="<?php echo $objDetail['LOGO_TANDANG']?>"></span>
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
    
