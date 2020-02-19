<?php
$pageseo='administrasiuser';

$submitUsr=isset($_REQUEST['submituser'])?$_REQUEST['submituser']:'0';
$submitGrp=isset($_REQUEST['submitgroup'])?$_REQUEST['submitgroup']:'0';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';
$sSearchUser=isset($_REQUEST['sSearchUser'])?$_REQUEST['sSearchUser']:'';





//IF SUBMIT USERFORM
if($submitUsr=='1'){
	$objVar=array();
	$raw=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
        $raw[strtoupper($k)]=$v;	
		//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		
		if (in_array(strtoupper($k), $entity['user'])){
			if($k=='PASSWD') $v=encrypt($v,5);
			$objVar[strtoupper($k)]=$v;		
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
	$objVar['CPS']=$_REQUEST['PASSWD'];
	$objVar['EUP']=encrypt($_REQUEST['USERNAME']).'|'.encrypt($_REQUEST['PASSWD']);
	$result=saveRecord('tbl_user',$objVar);
    //echo $result['SQL'];
    
 
}


require_once CMS_PATH."/lib/submitpost.php";


//GET GROUP
$group=array();
$varG['LIMIT']='50';
$listG=getRecord('tbl_group',$varG);
foreach($listG['RESULT'] as $listG){
	$group[$listG['ID']]=$listG['GROUP_NAME'];
}




//GET USER
$REC_PERPAGE=12;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchUser']=$sSearchUser;
$list=getRecord('tbl_user',$params);

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
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
					<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>TAMBAH USER</a>
                    <h4 class="widgettitle">					
					<form method='POST' action="<?php echo CMS_URL.'/index.php?page=data-'.$pageseo?>">
						<input type="text" name='sSearchUser' placeholder="pencarian.." value='<?php echo $sSearchUser?>'>
						<button class="btn btn-primary"><i class="iconsweets-magnifying iconsweets-white"></i></button>				
					</form>
					</h4>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">ID</th>
                                    <th class="head0">Email / User / Pass</th>                                    
                                    <th class="head1">Group</th>
                                    <th class="head0">Last Login</th>
                                    <th class="head1">...</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								foreach($list['RESULT'] as $list){
								?>
                                <tr>
                                    <td><?php echo $list['ID']?></td>
                                    <td>
										<?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?>
										<?php echo $list['EMAIL']?> / <span><?php echo $list['FULLNAME']?> / <?php echo decrypt($list['PASSWD'],5)?></span><br>
										
									</td>                                    
                                    <td><?php echo $group[$list['ID_GROUP']]?></td>
                                    <td class="center"><?php echo $list['LASTLOGIN']?></td>
                                    <td class="center">
									<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>
									</td>
                                </tr>
								<?php } ?>                              
                            </tbody>
                        </table>
                                 
						<br>
						<div class="btn-group">                                          
                            <a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal-1)?>'><button class="btn"><i class="iconfa-backward"></i> prev</button></a>
                                          <button class="btn"><?php echo $hal?></button>
							<a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal+1)?>'><button class="btn">next <i class="iconfa-forward"></i></button></a>
                        </div>			
                        
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span4">
                        <div class="tabbedwidget tab-primary">                            
                            <div id="tabs-1" class="nopadding">
                                <h5 class="tabtitle">Groups</h5>
                                <ul class="userlist">
								<?php
								$paramsGr['LIMIT']='50';
								$paramsGr['STATUS']='1';
								$list=getRecord('tbl_group',$paramsGr);
								foreach($list['RESULT'] as $list){
								?>
                                    <li>
                                        <div>
                                            <img src="<?php echo CMS_URL?>/images/group.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5><?php echo $list['GROUP_NAME']?></h5>
                                                
                                                <span>
												<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'-group&act=edit&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i> EDIT</a>
												</span>
                                            </div>
                                        </div>
                                    </li>
								<?php } ?>
                                </ul>
                            </div>
                            
                           
                        </div><!--tabbedwidget-->
                        
                        <br />
                                                
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    