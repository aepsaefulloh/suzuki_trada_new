<?php
$pageseo='wilayah';

$params['ID_KECAMATAN']=isset($_REQUEST['id_kecamatan'])?$_REQUEST['id_kecamatan']:'';
$params['LIMIT']='0,10';
$list=getRecord('tbl_kelurahan',$params);


//BREAD
$varKc['ID']=$params['ID_KECAMATAN'];
$listKc=getRecord('tbl_kecamatan',$varKc);
$kecamatan=$listKc['RESULT'][0]['KECAMATAN'];

$varKb['ID']=$listKc['RESULT'][0]['ID_KABUPATEN'];
$listKb=getRecord('tbl_kabupaten',$varKb);
$kabupaten=$listKb['RESULT'][0]['KABUPATEN'];

$varPr['ID']=$listKb['RESULT'][0]['ID_PROPINSI'];
$listPr=getRecord('tbl_propinsi',$varPr);
$propinsi=$listPr['RESULT'][0]['PROPINSI'];
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
				<h4 class="widgettitle">
				<a href='<?php echo CMS_URL.'/index.php?page=data-wilayah'?>' style='color:#fff'> Wilayah </a> > 
				<a href='<?php echo CMS_URL.'/index.php?page=data-kabupaten&id_propinsi='.$listPr['RESULT'][0]['ID']?>' style='color:#FFF'><?php echo $propinsi?> </a> > 
				<a href='<?php echo CMS_URL.'/index.php?page=data-kecamatan&id_kabupaten='.$listKb['RESULT'][0]['ID']?>' style='color:#FFF'><?php echo $kabupaten?> </a> > 
				<?php echo $kecamatan?>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kelurahan</th>
                            <th>KODE BPS</th>
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
                            <td><?php echo $list['KELURAHAN']?></td>
                            <td><?php echo $list['KODEBPS']?></td>
                            
                            <td><?php echo $list['STATUS']?></td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo?>" class="btn btn-danger"><i class="iconsweets-create iconsweets-white"></i></a>
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    