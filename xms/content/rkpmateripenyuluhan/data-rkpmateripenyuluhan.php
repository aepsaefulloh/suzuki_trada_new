<?php
$pageseo='rkpmateripenyuluhan';

$objVar['START_DATE']=isset($_REQUEST['START_DATE'])?$_REQUEST['START_DATE']:date('Y-m-d');
$objVar['END_DATE']=isset($_REQUEST['END_DATE'])?$_REQUEST['END_DATE']:date('Y-m-d');

//GET PENYULUHAN
$jsonPy=getCache('penyuluhan');
$arrayPy=array();
foreach($jsonPy as $list){
        $arrayPy[$list['ID']]=$list['PENYULUHAN'];
}

?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Rekap Data</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">			
			<h4 class="widgettitle">
				<form method='POST' action="<?php echo CMS_URL.'/index.php?page=data-'.$pageseo?>">
						<input type="date" name='START_DATE' placeholder="tanggal awal" value='<?php echo $objVar['START_DATE']?>'>
						<input type="date" name='END_DATE' placeholder="tanggal akhir" value='<?php echo $objVar['END_DATE']?>'>
						<button class="btn btn-primary"><i class="iconsweets-magnifying iconsweets-white"></i></button>				
					</form>
				</h4>
               
		 <br>
                <?php $params='jnsrkp=materipenyuluhan&start='.$objVar['START_DATE'].'&end='.$objVar['END_DATE'];?>
               <button class="btn btn-small btn-red" onclick="self.location.href = '<?php echo CMS_URL.'/export.php?'.$params?>';">DOWNLOAD EXCEL</button> 
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Subsektor</th>                                                        
                            <th>Penulis</th>                                                                                    
                        </tr>
                    </thead>
                    <tbody>
						<?php
						$varAt['START_DATE']=$objVar['START_DATE'];
						$varAt['END_DATE']=$objVar['END_DATE'];
						$varAt['LIMIT']=1000;
						$varAt['CATEGORY']='materipenyuluhan';
						$listAt=getRecord('tbl_content',$varAt);
						//echo $listAt['SQL'];
						$log->info(basename(__FILE__).', getRecord : '.$list['SQL']);						
						$i=0;
						foreach($listAt['RESULT'] as $list){							
							$i++;
							$varUsr['ID']=$list['ID_USER'];
							$listUsr=getRecord('tbl_user',$varUsr);
							$penulis=$listUsr['RESULT'][0]['FULLNAME'];
						?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $list['TITLE']; ?></td>
                            <td><?php echo $arrayPy[$list['JNSP']]; ?></td>
                            <td>
								<?php echo $penulis?> 				
							</td>                            
                        </tr>
							<?php } ?>
                    </tbody>
                </table>		
			
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Total</th>                                                        
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						
						
						
						$list=getRekapPenyuluhan($objVar);
						//echo $list['SQL'];
						$log->info(basename(__FILE__).', getRecord : '.$list['SQL']);						
						$i=0;
						foreach($list['RESULT'] as $list){							
							$i++;
							$varUsr['ID']=$list['ID_USER'];
							$listUsr=getRecord('tbl_user',$varUsr);
							$penulis=$listUsr['RESULT'][0]['FULLNAME'];
						?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $penulis?> </td>
                            <td><?php echo $list['TOTAL']; ?></td>
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
    
