<?php
$seo='administrasiuser';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';
	$objDetail=getRecord('tbl_user',$params);
	$objDetail=$objDetail['RESULT'][0];
    $passwd=decrypt($objDetail['PASSWD'],5);
    if(strlen($objDetail['PASSWD'])<2){
        $passwd=$objDetail['CPS'];
    }
}


?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Administrasi User</h1>
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
                                <label>Email</label>
                                <span class="field"><input type="text" name="EMAIL" id="firstname2" class="input-block-level" value="<?php echo $objDetail['EMAIL']?>"></span>
                            </p>
                            
                            <p>
                                <label>Username</label>
                                <span class="field"><input type="text" name="USERNAME" id="lastname2" class="input-xxlarge" value="<?php echo $objDetail['USERNAME']?>" required></span>
                            </p>
							
							<p>
                                <label>Password</label>
                                <span class="field"><input type="text" name="PASSWD" id="lastname2" class="input-xxlarge" value="<?php echo $passwd?>" required></span>
                            </p>
                            
                            <p>
                                <label>Nama Lengkap</label>
                                <span class="field"><input type="text" name="FULLNAME" id="email2" class="input-xxlarge" value='<?php echo $objDetail['FULLNAME']?>'></span>
                            </p>
                            
							<p>
                                <label>Deskripsi</label>
                                <span class="field"><textarea cols="80" rows="5" name="DESCRIPTION" id="location2" class="span5"><?php echo $objDetail['DESCRIPTION']?></textarea></span>
                            </p>
							
							
							
							<p>
                                <label>Group</label>
                                <span class="field">
								<select name="ID_GROUP" class="uniformselect">
								<option value=''>-</option>
								<?php 
								$var['LIMIT']='50';
								$var['STATUS']='1';
								$listGroup=getRecord('tbl_group',$var);
								foreach($listGroup['RESULT'] as $list){
								?>		
                            	<option value="<?php echo $list['ID']?>" <?php if($list['ID']==$objDetail['ID_GROUP']) echo 'selected'?>><?php echo $list['GROUP_NAME']?></option>
								<?php } ?>
								</select>
								</span>
                            </p>
							
							
                            
                            <p>
                                <label>Aktif</label>
                                <span class="field">
									<input type="radio" name="STATUS"  value='1'  <?php if($objDetail['STATUS']=='1') echo 'checked'?>>	Ya
									<input type="radio" name="STATUS"  value='0' <?php if($objDetail['STATUS']=='0') echo 'checked'?>>	Tidak
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary" name='submituser' value='1'>SIMPAN</button>
                                <button class="btn btn-warning" name='submituser' value='0'>BATAL</button>
                                
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    
