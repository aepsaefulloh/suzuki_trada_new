<?php
$pageseo='penyuluhan';


$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';

//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['penyuluhan'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
		
	$result=saveRecord('tbl_penyuluhan',$objVar);
	$log->info(basename(__FILE__).', saveRecord : '.$result['SQL']);
	//echo $result['SQL'];
	//----cached-------
	$res=writeCache('tbl_penyuluhan','penyuluhan');
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
}


$params['LIMIT']='50';
$params['ID_PARENT']='0';
$list=getRecord('tbl_penyuluhan',$params);

?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Data Penyuluhan</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>ADD MATERI</a>
				<h4 class="widgettitle">
				Jenis Materi
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jumlah Kategori</th>
                            <th>Status</th>
                            
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){
							$var['ID_PARENT']=$list['ID'];
							$listCount=countRecord('tbl_penyuluhan',$var);
							$total=$listCount['RESULT'][0]['TOTAL'];
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['PENYULUHAN']?></td>
                            <td><a href='<?php echo CMS_URL.'/index.php?page=data-kategori&idparent='.$list['ID']?>'><?php echo $total?> Kategori</a></td>
                            
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
    