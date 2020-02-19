<?php
$pageseo='kecamatan';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$idkabupaten=isset($_REQUEST['idkabupaten'])?$_REQUEST['idkabupaten']:'';

//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['kecamatan'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
		
	$result=saveRecord('tbl_kecamatan',$objVar);
	$log->info(basename(__FILE__).', saveRecord : '.$result['SQL']);
	
	//----cached-------
	$res=writeCache('tbl_kecamatan','kecamatan');
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
	$idkabupaten=$objVar['ID_KABUPATEN'];
}




$params['ID_KABUPATEN']=$idkabupaten;
$params['LIMIT']='1000';
$list=getRecord('tbl_kecamatan',$params);


//BREAD
$varKb['ID']=$params['ID_KABUPATEN'];
$listKb=getRecord('tbl_kabupaten',$varKb);
$kabupaten=$listKb['RESULT'][0];

$varPr['ID']=$listKb['RESULT'][0]['ID_PROPINSI'];
$listPr=getRecord('tbl_propinsi',$varPr);
$propinsi=$listPr['RESULT'][0];
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Data Wilayah</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add&idpropinsi='.$propinsi['ID'].'&idkabupaten='.$kabupaten['ID']?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>ADD KECAMATAN</a>
				<h4 class="widgettitle">
				<a href='<?php echo CMS_URL.'/index.php?page=data-wilayah'?>' style='color:#fff'> Wilayah </a> > 
				<a href='<?php echo CMS_URL.'/index.php?page=data-kabupaten&idpropinsi='.$propinsi['ID']?>' style='color:#FFF'><?php echo $propinsi['PROPINSI']?> </a> > 
				<?php echo $kabupaten['KABUPATEN']?></a>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kecamatan</th>                            
                            <th>Status</th>
                            
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){							
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['KECAMATAN']?></td>
                            <td><?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?></td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>								
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    