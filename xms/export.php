<?PHP
namespace Chirp;
	
   require_once "../config.php";	 
   require_once CMS_PATH."/lib/navutil.php";	 
   require_once CMS_PATH."/lib/dao_utility.php";
   require_once CMS_PATH."/lib/mysqlDao.php";	 
   require_once CMS_PATH."/lib/auth.php";	 	

  

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

  
$objVar['JNSREKAP']=isset($_REQUEST['jnsrkp'])?$_REQUEST['jnsrkp']:'semuamateri';
$objVar['START_DATE']=isset($_REQUEST['start'])?$_REQUEST['start']:date('Y-m-d');
$objVar['END_DATE']=isset($_REQUEST['end'])?$_REQUEST['end']:date('Y-m-d');
$objVar['LIMIT']='0,50000';

if ($objVar['JNSREKAP']=='semuamateri'){


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

  // file name for download
  $filename = "rkpsemuamateri.xls";
  $filename = "rkpmateripenyuluhan.xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
?>
	 <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gerbang Daerah</th>                                                        
                            <th>Gerbang Nasional</th>                                                        
                            <th>Materi Lokalita</th>                                                        
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
	
<?php
}else{
?>
 <table class="table table-bordered responsive" border='1'>
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
<?php    
}
  exit;
?>