<?php
$seo='materipenyuluhan';

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
                <h1>Materi Penyuluhan</h1>
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
                                <label>Jenis</label>
                                <span class="field">
								<select name="JNSP" id="materi-list">
                                    <option value=''>- materi- </option>
                                    <?php 
                                    $varMt['ID_PARENT']='0';
                                    $varMt['STATUS']='1';
                                    $varMt['LIMIT']='200';								
                                    $listGroup=getRecord('tbl_penyuluhan',$varMt);
                                    foreach($listGroup['RESULT'] as $list){
                                    ?>		
                                        <option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['JNSP']) echo 'selected'?>><?php echo $list['PENYULUHAN']?></option>
                                    <?php } ?>
                                </select>
								</span>
                            </p>
							<p>
                                <label>Kategori</label>
                                <span class="field">
								<select name="CATP" class="uniformselect" id="kategori-list">
								<option value='0'>-kategori-</option>
								<?php 
								if ($objDetail['CATP']>0){
									$varKb['ID']=$objDetail['CATP'];
									$varKb['STATUS']='1';
									$varKb['LIMIT']='500';
									$listKab=getRecord('tbl_penyuluhan',$varKb);
									
									foreach($listKab['RESULT'] as $list){
								?>
									<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['CATP']) echo 'selected'?>><?php echo $list['PENYULUHAN']?></option>
								<?php }} ?>
								</select>
								</span>
                            </p>
							
							
							<p>
                                <label>Subkategori</label>
                                <span class="field">
								<select name="SUBP" class="uniformselect" id="subkategori-list">
								<option value='0'>-subkategori-</option>
								<?php 
								if ($objDetail['SUBP']>0){
									$varKc['ID']=$objDetail['SUBP'];
									$varKc['STATUS']='1';
									$varKc['LIMIT']='500';
									$listKc=getRecord('tbl_penyuluhan',$varKc);									
									foreach($listKc['RESULT'] as $list){
								?>
									<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['SUBP']) echo 'selected'?>><?php echo $list['PENYULUHAN']?></option>
								<?php }} ?>
								</select>
								</span>
                            </p>
						
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
							<script>
							$('#materi-list').on('change', function(){
							var id_parent = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getPenyuluhan.php",
							data:'id_parent='+id_parent,
							success: function(result){
							$("#kategori-list").html(result);
							}
							});
							});
							
							$('#kategori-list').on('change', function(){
							var id_parent = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getPenyuluhan.php",
							data:'id_parent='+id_parent,
							success: function(result){
							$("#subkategori-list").html(result);
							}
							});
							});
							
							
							$('#materi-list').on('change', function(){							
							var id_parent = this.value;
							$.ajax({
							type: "POST",
							url: "<?php echo CMS_URL?>/getPenyuluhan.php",
							data:'id_parent='+id_parent,
							success: function(result){
							$("#subkategori-list").html(result);
							}
							});
							});
							</script>
							
                            
                            
                            
                            
                            
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
                            
							<?php require_once CMS_PATH."/include/attachment-input.php"?>
                            
                            
                            <p>
                                <label>Aktif</label>
                                <span class="field">
									<input type="radio" name="STATUS" value='1'  <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Ya
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
    
