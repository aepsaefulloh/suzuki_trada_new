<?php
$pageseo='wilayah';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';

//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['propinsi'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
		
	$result=saveRecord('tbl_propinsi',$objVar);
	$log->info(basename(__FILE__).', saveRecord : '.$result['SQL']);
	//echo $result['SQL'];
	//----cached-------
	$res=writeCache('tbl_propinsi','propinsi');
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
}


$params['LIMIT']='1000';
$list=getRecord('tbl_propinsi',$params);

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
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>ADD PROPINSI</a>
				<h4 class="widgettitle">
				Propinsi
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Propinsi</th>
                            <th>Jumlah Kabupaten</th>
                            <th>Status</th>
                            
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){
							$var['ID_PROPINSI']=$list['ID'];
							$listCount=countRecord('tbl_kabupaten',$var);
							$total=$listCount['RESULT'][0]['TOTAL'];
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['PROPINSI']?></td>
                            <td><a href='<?php echo CMS_URL.'/index.php?page=data-kabupaten&idpropinsi='.$list['ID']?>'><?php echo $total?> Kabupaten</a></td>
                            
                            <td>
							<?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?>
							</td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>
								
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    