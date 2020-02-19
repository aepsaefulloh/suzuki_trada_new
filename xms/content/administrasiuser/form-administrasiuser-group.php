<?php
$seo='administrasiuser';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act='ADD';
if($params['ID']>0){
	$act='EDIT';
}

$objDetail=getRecord('tbl_group',$params);
$objDetail=$objDetail['RESULT'][0];
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Group</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>">					
							<input type='hidden' name='PK-ID' value="<?php echo $params['ID']?>">
							<input type='hidden' name='ACT' value="<?php echo $act?>">
                            <p>
                                <label>Nama Group</label>
                                <span class="field"><input type="text" name="GROUP_NAME" id="firstname2" class="input-block-level" value="<?php echo $objDetail['GROUP_NAME']?>"></span>
                            </p>
							
                            <p>
                                <label>Akses</label>
                                <span class="formwrapper">
									<?php 
									$acpl=explode('|',$objDetail['ACCESS']);
									$varModul['LIMIT']='50';
									$varModul['STATUS']='1';
									$listModul=getRecord('tbl_modul',$varModul);
									foreach($listModul['RESULT'] as $list){
									?>									
									<input type="checkbox" name="ACCESS[]" value="<?php echo $list['SEO']?>" <?php if (in_array($list['SEO'], $acpl)) echo 'checked' ?> /> <?php echo $list['MODUL']?><br />
									<?php } ?>									
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary" name='submitgroup' value='1'>SIMPAN</button>
                                <button class="btn btn-warning" name='submitgroup' value='0'>BATAL</button>
                                
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    