<?php
$seo='materilokalita';

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
                <h1>Materi Lokalita</h1>
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
                                <label>Propinsi</label>
                                <span class="field">
								<select name="ID_PROPINSI" class="uniformselect" id="propinsi-list">
								<option value=''>-</option>
								<?php 
								$var['STATUS']='1';
								$var['LIMIT']='200';								
								$listGroup=getRecord('tbl_propinsi',$var);
								foreach($listGroup['RESULT'] as $list){
								?>		
                            	<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['ID_PROPINSI']) echo 'selected'?>><?php echo $list['PROPINSI']?></option>
								<?php } ?>
								</select>
								</span>
                            </p>
							<p>
                                <label>Kabupaten</label>
                                <span class="field">
								<select name="ID_KABUPATEN" class="uniformselect" id="kabupaten-list">
								<option value=''>-kabupaten-</option>
								<?php 
								if ($objDetail['ID_PROPINSI']>0){
									$varKb['ID_PROPINSI']=$objDetail['ID_PROPINSI'];
									$varKb['STATUS']='1';
									$varKb['LIMIT']='500';
									$listKab=getRecord('tbl_kabupaten',$varKb);
									
									foreach($listKab['RESULT'] as $list){
								?>
									<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['ID_KABUPATEN']) echo 'selected'?>><?php echo $list['KABUPATEN']?></option>
								<?php }} ?>
								</select>
								</span>
                            </p>
							
							
							<p>
                                <label>Kecamatan</label>
                                <span class="field">
								<select name="ID_KECAMATAN" class="uniformselect" id="kecamatan-list">
								<option value=''>-kecamatan-</option>
								<?php 
								if ($objDetail['ID_KABUPATEN']>0){
									$varKc['ID_KABUPATEN']=$objDetail['ID_KABUPATEN'];
									$varKc['STATUS']='1';
									$varKc['LIMIT']='500';
									$listKc=getRecord('tbl_kecamatan',$varKc);
									//echo $listKc['SQL'];
									foreach($listKc['RESULT'] as $list){
								?>
									<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['ID_KECAMATAN']) echo 'selected'?>><?php echo $list['KECAMATAN']?></option>
								<?php }} ?>
								</select>
								</span>
                            </p>
						
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
							<script>
							$('#propinsi-list').on('change', function(){
							var id_propinsi = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getKabupaten.php",
							data:'id_propinsi='+id_propinsi,
							success: function(result){
							$("#kabupaten-list").html(result);
							}
							});
							});
							
							$('#propinsi-list').on('change', function(){
							var id_propinsi = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getKecamatan.php",
							data:'id_propinsi='+id_propinsi,
							success: function(result){
							$("#kecamatan-list").html(result);
							}
							});
							});
							
							
							$('#kabupaten-list').on('change', function(){							
							var id_kabupaten = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getKecamatan.php",
							data:'id_kabupaten='+id_kabupaten,
							success: function(result){
							$("#kecamatan-list").html(result);
							}
							});
							});
							</script>
							
							
							
							
							<p>
                                <label>Ringkasan </label>
                                <span class="field"><textarea cols="80" rows="5" name="TAICING" id="location2" class="input-block-level"><?php echo $objDetail['TAICING']?></textarea></span>
                            </p>
							
                            <p>
                                <label>Materi Lokalita</label>
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
                            
                            <?php require_once CMS_PATH."/include/attachment-input.php"?>
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
    
