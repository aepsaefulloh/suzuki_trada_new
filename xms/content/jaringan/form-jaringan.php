<?php
$pageseo='jaringan';

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
                <h1>Jaringan</h1>
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
                                <span class="field"><input type="text" name="NAMA" id="firstname2" class="input-block-level" value="<?php echo $objDetail['NAMA']?>"></span>
                            </p>
                            
                            <p>
                                <label>Kota</label>
                                <span class="field">
								<select name="CITY" class="uniformselect">
								<option value="">-</option>
								<?php
								$pv['LIMIT']=20;
								$pv['STATUS']=1;
								$pv['TIPE']='product';
								$listCat=getRecord('tbl_category',$pv);
								foreach($listCat['RESULT'] as $list){
								?>
								<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['CITY']){echo 'selected';} ?>><?php echo $list['CATEGORY']?></option>
								<?php } ?>
								</select>
								</span>
                            </p>
							
							<p>
                                <label>Alamat </label>
                                <span class="field"><textarea cols="80" rows="5" name="ADDRESS" id="location2" class="input-block-level"><?php echo $objDetail['ADDRESS']?></textarea></span>
                            </p>
							
							<p>
                                <label>TELP</label>
                                <span class="field"><input type="text" name="TELP" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TELP']?>"></span>
                            </p>
							<p>
                                <label>Image
								<small>(type : jpg,jpeg,png)</small>
								</label>
                                <span class="field"><input type="file" name="IMAGE" id="lastname2" class="input-xxlarge"><br><br>
								<img src="<?php echo ROOT_URL.'/images/product/'.$objDetail['IMAGE']?>" width='300px'>
								</span>
								
                            </p>
							
					
                            
                            
                            <p>
                                <label>Status</label>
                                <span class="field">
									<input type="radio" name="STATUS" value='1' <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Publish
									<input type="radio" name="STATUS" value='0' <?php if($objDetail['STATUS']=='0') echo 'checked'?>>	Unpublish
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
    
