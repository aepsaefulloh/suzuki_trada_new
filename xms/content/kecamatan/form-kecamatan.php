<?php
$seo='kecamatan';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act=isset($_REQUEST['act'])?$_REQUEST['act']:'ADD';


$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_kecamatan',$params);
	$objDetail=$objDetail['RESULT'][0];
	
	
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Kecamatan</h1>
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
                                <label>Propinsi</label>
                                <span class="field">
								<select name="ID_PROPINSI" class="uniformselect" id="propinsi-list">
								<option value='0'>-propinsi-</option>
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
								<option value='0'>-kabupaten-</option>
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
							
							
							
							
							</script>
							
					
                            <p>
                                <label>KECAMATAN</label>
                                <span class="field"><input type="text" name="KECAMATAN" id="firstname2" class="input-block-level" value="<?php echo $objDetail['KECAMATAN']?>"></span>
                            </p>
							<p>
                                <label>KODEBPS</label>
                                <span class="field"><input type="text" name="KODEBPS" id="firstname2" class="input-block-level" value="<?php echo $objDetail['KODEBPS']?>"></span>
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
    