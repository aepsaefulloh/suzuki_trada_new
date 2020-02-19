<?php
$objVar['ACT']=isset($_REQUEST['act'])?$_REQUEST['act']:"EDIT";
$objVar['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:"";
$objVar['CKEY']=isset($_REQUEST['ckey'])?$_REQUEST['ckey']:'';
$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';


//IF SUBMITTED
if($submitcontent=='1'){

$objVar['CATEGORY']=isset($_REQUEST['CATEGORY'])?$_REQUEST['CATEGORY']:'';
$objVar['ckey']=isset($_REQUEST['ckey'])?$_REQUEST['ckey']:'';

foreach($_FILES as $x=>$y){	
	//echo $x.':'.$y['name'].':'.$y['tmp_name'];
	if($y['name']!=''){
	$gambar = ROOT_PATH."/images/conf/conf-".$y['name'];
	move_uploaded_file($y['tmp_name'], $gambar);
	$var['CKEY']=$x;
	$var['CVALUE']="conf-".$y['name'];
	$var['CATEGORY']=$objVar['CATEGORY'];
	$result=saveConfig($var);
	//echo $result['SQL'];
	//echo $gambar;
	}
}

foreach($_REQUEST as $key=>$v){
	if (substr($key,0,3)=='DD_'){
		//echo $key." = ".$v."<br>";	
		$var['CKEY']=$key;
		$var['CVALUE']=$v;
		$var['CATEGORY']=$objVar['CATEGORY'];
		$result=saveConfig($var);
		//echo $result['SQL']."<br>";		
		
		//----------------CACHED-----------------------	
		$res=writeCache('tbl_config','config');
		//echo 'SQL :'.$res['SQL'].'<hr>';
		//----------------END CACHED--------------------
	}
}
}
//END SUBMIT



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
                <h1>Setting</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">FORM</h4>
                <div class="widgetcontent nopadding">
						
							<?php
							foreach($cat['RESULT'] as $cat){
							?>
							<form class="stdform stdform2" method="post" action="<?php echo CMS_URL?>/index.php?page=data-setting" enctype="multipart/form-data">					
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
							<?php	}else if ($input['CTYPE']=='textarea'){	?>
								<p>
									<label><?php echo $input['LABEL']?> </label>
									<span class="field"><textarea cols="80" rows="5" name="<?php echo $input['CKEY']?>" id="location2" class="input-block-level"><?php echo $input['CVALUE']?></textarea></span>
								</p>
							<?php	}else if ($input['CTYPE']=='image'){ ?>
								<p>
									<label><?php echo $input['LABEL']?></label>
									<span class="field"><input type="file" name="<?php echo $input['CKEY']?>" id="lastname2" class="input-xxlarge"><br><br>
									<img src="<?php echo ROOT_URL."/images/conf/".$input['CVALUE']?>" style='width:300px;background:#ccc'>
									</span>								
								</p>
								
								
							<?php }} ?>
							
							<p class="stdformbutton">
                                <button class="btn btn-primary" name='submitcontent' value='1'>SIMPAN</button>
                                <button class="btn btn-warning" name='submitcontent' value='0'>BATAL</button>
                            </p>
							</form>
							
                            <?php } ?>
                            
							
                                                    
                            
                    
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    