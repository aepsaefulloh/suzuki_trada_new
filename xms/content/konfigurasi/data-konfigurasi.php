<?php
$seo='konfigurasi';

$objVar['ACT']=isset($_REQUEST['act'])?$_REQUEST['act']:"EDIT";
$objVar['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:"";
$objVar['CKEY']=isset($_REQUEST['ckey'])?$_REQUEST['ckey']:'';
$objList=null;
$conf=array();
if ($objVar['ACT']=='EDIT'){	
	$objList=getConfig($objVar);
	//echo "SQL : ".$objList['SQL'];
	foreach($objList['RESULT'] as $list){
		$conf[$list['CKEY']]=$list['CVALUE'];
	}
}


$cat=getDistConfig();
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Konfigurasi</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
					<?php
							foreach($cat['RESULT'] as $cat){
							?>
                    <form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>" enctype="multipart/form-data">
					<input type="hidden" name="CATEGORY" value="<?php echo $cat['CATEGORY']?>">
					
							
					<?php
					$params['CATEGORY']=$cat['CATEGORY'];
					$params['CKEY']=$objVar['CKEY'];
					$input=getConfig($params);
					foreach($input['RESULT'] as $input){
					if ($input['CTYPE']=='text'){
					?>
                            <p>
                                <label><?php echo $input['LABEL']?></label>
                                <span class="field"><input type="text" name="<?php echo $input['CKEY']?>" id="firstname2" class="input-block-level" value="<?php echo $input['CVALUE']?>"></span>
                            </p>
                            
				<?php }else if ($input['CTYPE']=='textarea'){ ?>
							<p>
                                <label><?php echo $input['LABEL']?> </label>
                                <span class="field"><textarea cols="80" rows="5" name="<?php echo $input['CKEY']?>" id="location2" class="input-block-level"><?php echo $input['CVALUE']?></textarea></span>
                            </p>
					
				<?php }else if ($input['CTYPE']=='image'){ ?>
							<p>
                                <label><?php echo $input['LABEL']?>
								<small>(type : jpg,jpeg,png)</small>
								</label>
                                <span class="field"><input type="file" name="<?php echo $input['CKEY']?>" id="lastname2" class="input-xxlarge"><br><br>
								<img src="<?php echo CMS_URL.'/files/'.$objDetail['IMAGE_FOLDER'].'/'.$objDetail['IMAGE']?>" width='300px'>
								</span>
								
                            </p>
				<?php }} ?>
							
							
                        
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary" name='submitcontent' value='1'>SIMPAN</button>
                                <button class="btn btn-warning" name='submitcontent' value='0'>BATAL</button>
                            </p>
                    </form>
					<?php				
					}
					?>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    