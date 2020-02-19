<?php
$pageseo='content';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['content'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	//IF IMAGE EXIST
	if($_FILES['IMAGE']['name'] != "") {		
		$allowExt=array('jpg','png','jpeg');
		$ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowExt)){
			$nfname=md5($_FILES['IMAGE']['name']).'.'.strtolower($ext);
			$target=ROOT_PATH.'/images/content/'.$nfname;			
			move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);
			$objVar['IMAGE']=$nfname;
		}
	}
	$objVar['CREATE_TIMESTAMP']=date('Y-m-d H:i:s');
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	//echo $result['SQL'];
	
	//----cached-------
	$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$params['ORDER']='CREATE_TIMESTAMP DESC';

$list=getRecord('tbl_content',$params);

?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Content</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" class="btn btn-danger">TAMBAH</a>
				<h4 class="widgettitle">
				<form method='POST' action="<?php echo CMS_URL.'/index.php?page=data-'.$pageseo?>">
						<input type="text" name='sSearchContent' placeholder="pencarian.." value='<?php echo $sSearchContent?>'>
						<button class="btn btn-primary"><i class="iconsweets-magnifying iconsweets-white"></i></button>				
					</form>
				</h4>
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>                            
                            <th>Timestamp</th>
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){
							$url=getNewsUrl($list);							
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td>
							<?php if($list['STATUS']>0){ ?>
											<a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
										<?php }else{ ?>
											<a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
										<?php } ?>
							<a href="<?php echo $url?>" target='_blank'><?php echo $list['TITLE']?></a><br>
							
							</td>
							<td><?php echo $arrCategory[$list['CATEGORY']]?></td>
                            <td>
							
								<div class="thumb"><img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$list['IMAGE']?>" style="max-width:70px"></div>
							</td>
                            
                            
                            <td><?php echo $list['CREATE_TIMESTAMP']?></td>
                            <td class="center">
								<a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>" class="btn btn-primary"><i class="iconfa-pencil"></i></a>								
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
    
