<?php
$pageseo='rkpsemuamateri';

$objVar['START_DATE']=isset($_REQUEST['START_DATE'])?$_REQUEST['START_DATE']:date('Y-m-d');
$objVar['END_DATE']=isset($_REQUEST['END_DATE'])?$_REQUEST['END_DATE']:date('Y-m-d');

$objVar['STATUS']=1;
$list=getRekapByCategory($objVar);
//echo $list['SQL'];
$log->info(basename(__FILE__).', getRecord : '.$list['SQL']);


//GET PROPINSI
$propinsi=array();
$varProp['LIMIT']=5000;
$listProp=getRecord('tbl_propinsi',$varProp);
$propinsi[0]='-';
foreach($listProp['RESULT'] as $list){
    $propinsi[$list['ID']]=$list['PROPINSI'];
}

//GET KABUPATEN
$kabupaten=array();
$varKab['LIMIT']=5000;
$listKab=getRecord('tbl_kabupaten',$varKab);
$kabupaten[0]='-';
foreach($listKab['RESULT'] as $list){
    $kabupaten[$list['ID']]=$list['KABUPATEN'];
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
		<?php $params='jnsrkp=semuamateri&start='.$objVar['START_DATE'].'&end='.$objVar['END_DATE'];?>
               <button class="btn btn-small btn-red" onclick="self.location.href = '<?php echo CMS_URL.'/export.php?'.$params?>';">DOWNLOAD EXCEL</button> 
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gerbang Daerah</th>                                                        
                            <th>Gerbang Nasional</th>                                                        
                            <th>Materi Lokalita</th>                                                       
				<th>Diseminasi Teknologi</th> 
                            <th>TP</th>                                                        
                            <th>Horti</th>                                                        
                            <th>Ternak</th>                                                        
                            <th>Kebun</th>                                                        
                            <th>Sdm</th>                                                        
                            <th>Jml Pembaca</th>                                                        
                            <th>Kabupaten</th>                                                        
                            <th>Propinsi</th>                                                                                                                
                        </tr>
                    </thead>
                    <tbody>
						<?php
                        $var['START_DATE']=$objVar['START_DATE'];
                        $var['END_DATE']=$objVar['END_DATE'];
                        $var['LIMIT']='5000';
			$var['STATUS']=1;
			$var['ORDER']=' PUBLISH_TIMESTAMP DESC';
                        $var['INC']='("materipenyuluhan","gerbangdaerah","materilokalita","diseminasiteknologi","gerbangnasional")';
                        $j=0;
						$listContent=getRecord('tbl_content',$var);
                        //echo $listContent['SQL'];
                        $j++;
                        //echo $list['SQL'];	
                        $cGerbangDaerah=0;
                        $cGerbangNasional=0;
                        $cMateriLokalita=0;
			$cDiseminasiTeknologi=0;
                        $cTp=0;
                        $cHorti=0;
                        $cTernak=0;
                        $cKebun=0;
                        $cSDM=0;
                        foreach($listContent['RESULT'] as $list){
			    $url=getNewsUrl($list);
                             if($list['CATEGORY']=='gerbangdaerah') $cGerbangDaerah++;
                             if($list['CATEGORY']=='gerbangnasional') $cGerbangNasional++;
                             if($list['CATEGORY']=='materilokalita') $cMateriLokalita++;
			     if($list['CATEGORY']=='diseminasiteknologi') $cDiseminasiTeknologi++;
                             if($list['JNSP']==1) $cTp++;
                             if($list['JNSP']==5) $cHorti++;
                             if($list['JNSP']==9) $cTernak++;
                             if($list['JNSP']==244) $cKebun++;
                             if($list['JNSP']==241) $cSDM++;
                            
						?>
                        <tr>
                            <td><?php echo $j?></td>
                            <td><a href='<?php echo $url?>' target='_blank'><?php echo strtolower($list['TITLE']); ?></a></td>                                                        
                            <td style='text-align:center'><?php if($list['CATEGORY']=='gerbangdaerah') echo '&radic;'?>	</td>                            
                            <td style='text-align:center'><?php if($list['CATEGORY']=='gerbangnasional') echo '&radic;'?></td>                            
                            <td style='text-align:center'><?php if($list['CATEGORY']=='materilokalita') echo '&radic;'?></td>                            
			     <td style='text-align:center'><?php if($list['CATEGORY']=='diseminasiteknologi') echo '&radic;'?></td>
                            <td style='text-align:center'><?php if($list['JNSP']==1) echo '&radic;'?></td>                            
                            <td style='text-align:center'><?php if($list['JNSP']==5) echo '&radic;'?></td>                            
                            <td style='text-align:center'><?php if($list['JNSP']==9) echo '&radic;'?></td>                            
                            <td style='text-align:center'><?php if($list['JNSP']==244) echo '&radic;'?></td>                            
                            <td style='text-align:center'><?php if($list['JNSP']==241) echo '&radic;'?></td>                            
                            <td><?php echo $list['HIT']?></td>                            
                            <td><?php echo $kabupaten[$list['ID_KABUPATEN']]?></td>                            
                            <td><?php echo $propinsi[$list['ID_PROPINSI']]?></td>                            
                        </tr>
							<?php } ?>
                             <tr>
                            <td></td>
                            <td></td>                                                        
                            <td><?php echo $cGerbangDaerah?></td>                            
                            <td><?php echo $cGerbangNasional?></td>                            
                            <td><?php echo $cMateriLokalita?></td>                            
			    <td><?php echo $cDiseminasiTeknologi?></td>
                            <td><?php echo $cTp?></td>                            
                            <td><?php echo $cHorti?></td>                            
                            <td><?php echo $cTernak?></td>                            
                            <td><?php echo $cKebun?></td>                            
                            <td><?php echo $cSDM?></td>                            
                            <td></td>                            
                            <td></td>                            
                            <td></td>                            
                        </tr>
                    </tbody>
                </table>
                
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>By Kategori</th>
                            <th>Total</th>                                                        
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						$i=0;
						foreach($list['RESULT'] as $list){
							
							$i++;
							
						?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $list['CATEGORY']; ?></td>
                            <td><?php echo $list['TOTAL']; ?></td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>								
							</td>                            
                        </tr>
							<?php } ?>
                    </tbody>
                </table>
				<br>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>By Kabupaten</th>
                            <th>Total</th>                                                        
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						//GET KAB
						$kab=array();
						$varG['LIMIT']='1000';
						$listG=getRecord('tbl_kabupaten',$varG);
						foreach($listG['RESULT'] as $listG){
							$kab[$listG['ID_PROPINSI'].'-'.$listG['ID']]=$listG['KABUPATEN'];
						}

						
						
						$list=getRekapByKabupaten($objVar);
						//echo $list['SQL'];
						$log->info(basename(__FILE__).', getRecord : '.$list['SQL']);						
						$i=0;
						foreach($list['RESULT'] as $list){							
							$i++;
							
							
						?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $kab[$list['ID_PROPINSI'].'-'.$list['ID_KABUPATEN']]; ?></td>
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
    
