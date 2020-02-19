<?php
$seo='menu';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$params['PARENT_ID']=isset($_REQUEST['parentid'])?$_REQUEST['parentid']:'';

if ($params['PARENT_ID']>1){
	$level=1;
}else{
	$level=0;
}

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_menu',$params);
	$objDetail=$objDetail['RESULT'][0];
	
	$params['PARENT_ID']=$objDetail['PARENT_ID'];
}
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Menu</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>" enctype="multipart/form-data">					
					<input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
					<input type='hidden' name='PARENT_ID' value='<?php echo $params['PARENT_ID']?>'>
					<input type='hidden' name='ACT' value='<?php echo $act?>'>
					<input type='hidden' name='LEVEL' value='<?php echo $level?>'>
                            <p>
                                <label>Menu</label>
                                <span class="field"><input type="text" name="TITLE" id="firstname2" class="input-block-level" value="<?php echo $objDetail['TITLE']?>"></span>
                            </p>
                            							
							<p>
                                <label>Url</label>
                                <span class="field"><input type="text" name="URL" id="lastname2" class="input-block-level" value='<?php echo $objDetail['URL']?>'></span>
                            </p>							
							
                            <?php if($params['PARENT_ID']<1){?>
                            <p>
                                <label>Posisi</label>
                                <span class="field">
									<input type="radio" name="POS" value='TOP' style="opacity: 0;" <?php if($objDetail['POS']=='TOP') echo 'checked'?>>	Top
									<input type="radio" name="POS" value='FOOTER1' <?php if($objDetail['POS']=='FOOTER1') echo 'checked'?>>	Footer1
									<input type="radio" name="POS" value='FOOTER2' <?php if($objDetail['POS']=='FOOTER2') echo 'checked'?>>	Footer2
									
								</span>								
                            </p>
							<?php } ?>
							
                            <p>
                                <label>Order No</label>
                                <span class="field"><input type="text" name="ORDNUM" id="lastname2" class="input-block-level" value='<?php echo $objDetail['ORDNUM']?>'></span>
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
    
