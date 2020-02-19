<?php
$pageseo='klub';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['klub'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	//require_once CMS_PATH.'/include/image-save.php';
	
	if ($objVar['ACT']=='ADD'){
		$objVar['SEO']=str_replace(" ","-",trim(strtolower($objVar['NAMA'])));
	}
	$result=saveRecord('tbl_club',$objVar);
	
	
	//require_once CMS_PATH."/include/attachment-save.php";
	//require_once CMS_PATH."/include/jsonwrite.php";
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$list=getRecord('tbl_club',$params);

?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Klub</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" class="btn btn-danger"><i class="iconsweets-user iconsweets-white"></i>Tulis Konten</a>
				<h4 class="widgettitle">
				<form method='POST' action="<?php echo CMS_URL.'/index.php?page=data-'.$pageseo?>">
						<input type="text" name='sSearchContent' placeholder="pencarian.." value='<?php echo $sSearchContent?>'>
						<button class="btn btn-primary"><i class="iconsweets-magnifying iconsweets-white"></i></button>				
					</form>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Kota</th>
                            <th>Tahun</th>                                                        
                            <th>Peringkat</th>                                                        
                            <th>Gambar</th>                                                                                    
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){							
						?>
                        <tr>
                            <td>...</td>
                            <td><?php echo $list['NAMA']?></td>
                            <td><?php echo $list['KOTA']?></td>
                            <td><?php echo $list['TAHUN']?></td>
                            <td><?php echo $list['PERINGKAT']?></td>
                            <td><div class="thumb"><img src="<?php echo $list['PHOTO']?>" style="max-width:70px"></div></td>
                            
                            
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&seo='.$list['SEO']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>								
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
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    
