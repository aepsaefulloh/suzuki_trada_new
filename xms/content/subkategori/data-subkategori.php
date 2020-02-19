<?php
$pageseo='kategori';

$params['ID_PARENT']=isset($_REQUEST['idparent'])?$_REQUEST['idparent']:'';
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
	echo $result['SQL'];
	//----cached-------
	$res=writeCache('tbl_penyuluhan','penyuluhan');
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
	$params['ID_PARENT']=$objVar['ID_PARENT'];
}



$params['LIMIT']='100';
$list=getRecord('tbl_penyuluhan',$params);


//BREAD
$varBr['ID']=$params['ID_PARENT'];
$listBr=getRecord('tbl_penyuluhan',$varBr);
$materi=$listBr['RESULT'][0]['PENYULUHAN'];
?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Data Penyuluhanx</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add&idparent='.$params['ID_PARENT']?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>ADD KATEGORI</a>
				<h4 class="widgettitle">
				<a href='<?php echo CMS_URL.'/index.php?page=data-subkategori'?>' style='color:#fff'> Penyuluhan </a> > 
				<?php echo $materi?>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SubKategori</th>                            
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
                            <td>
                            <?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?>
                            </td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>
								
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    