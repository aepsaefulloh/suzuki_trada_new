<?php
$pageseo='kabupaten';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$idpropinsi=isset($_REQUEST['idpropinsi'])?$_REQUEST['idpropinsi']:'0';

//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['kabupaten'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
		
	$result=saveRecord('tbl_kabupaten',$objVar);
	$log->info(basename(__FILE__).', saveRecord : '.$result['SQL']);
	
	//----cached-------
	$res=writeCache('tbl_kabupaten','kabupaten');
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
	
	$idpropinsi=$objVar['ID_PROPINSI'];
}


$params['ID_PROPINSI']=$idpropinsi;
$params['LIMIT']='1000';
$list=getRecord('tbl_kabupaten',$params);



//BREAD
$varBr['ID']=$params['ID_PROPINSI'];
$listBr=getRecord('tbl_propinsi',$varBr);
$propinsi=$listBr['RESULT'][0]['PROPINSI'];
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
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add&idpropinsi='.$params['ID_PROPINSI']?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>ADD KABUPATEN</a>
				<h4 class="widgettitle">
				<a href='<?php echo CMS_URL.'/index.php?page=data-wilayah'?>' style='color:#fff'> Wilayah </a> > 
				<?php echo $propinsi?>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kabupaten</th>
                            <th>Jumlah Kecamatan</th>
                            <th>Status</th>
                            
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){
							$var['ID_KABUPATEN']=$list['ID'];
							$listCount=countRecord('tbl_kecamatan',$var);
							$total=$listCount['RESULT'][0]['TOTAL'];
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['KABUPATEN']?></td>
                            <td><a href='<?php echo CMS_URL.'/index.php?page=data-kecamatan&idkabupaten='.$list['ID']?>'><?php echo $total?> Kecamatan</a></td>
                            
                            <td>
							<?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?>
							</td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&id='.$list['ID'].'&act=edit'?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>								
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    