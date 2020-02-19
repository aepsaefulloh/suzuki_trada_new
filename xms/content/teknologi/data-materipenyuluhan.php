<?php
$params['LIMIT']='0,10';
$list=getRecord('tbl_article',$params);

?>
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Pengumuman</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			
				<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>...</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
						foreach($list['RESULT'] as $list){
						?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['TITLE']?></td>
                            <td><?php echo $list['PUBLISH_TIMESTAMP']?></td>
                            <td class="center">
								<a href="<?php echo CMS_URL?>?page=form-pengumuman" class="btn btn-primary"><i class="iconfa-pencil"></i></a>
								<a href="" class="btn btn-danger"><i class="iconsweets-create iconsweets-white"></i></a>
							</td>                            
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
			
                <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>
        </div>
        
    </div>
    