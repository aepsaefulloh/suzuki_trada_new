<div class="leftmenu">
	<ul class="nav nav-tabs nav-stacked">
		<li class="nav-header">Navigation</li>
		<?php
		//GET USER ACCESS FROM CACHE
		$rawmenu='';
		$listMp=getCache('group');
		foreach($listMp as $list){
			if ($list['ID']==$_SESSION['ID_GROUP']){
				$rawmenu=$list['ACCESS'];
			}
		}	
		
		
		$menus=explode('|',$rawmenu);
		
		
		$varMn['LIMIT']='50';
		$varMn['POS']='xms';
		$varMn['LEVEL']='0';
		$listMn=getRecord('tbl_menu',$varMn);
        //echo $listMn['SQL'];
		foreach($listMn['RESULT'] as $list){
			
			if (in_array($list['URL'], $menus)) {
			
			
			if ($list['URL']!='dashboard'){
				$mnUrl=CMS_URL.'/index.php?page=data-'.$list['URL'];
			}else{
				$mnUrl=CMS_URL.'/index.php?page=home';
			}
			
			
			$varSmn['PARENT_ID']=$list['ID'];
			$varSmn['STATUS']=1;
			$varSmn['LIMIT']=10;
			$listSMn=getRecord('tbl_menu',$varSmn);
			//echo $listSMn['SQL'];
			if (!empty($listSMn['RESULT'])) {
				$drop='dropdown';
				$hasChild=true;
			}else{
				$hasChild=false;
				$drop='';	
			}	
			
		?>
			<li class="<?php echo $drop?> <?php if($page=='data-'.$list['URL']) echo 'active'?>"><a href="<?php echo $mnUrl?>"><i class="icon-chevron-right"></i> <?php echo $list['TITLE']?></a>
				<?php if ($hasChild){ ?>
				<ul>
					<?php 
					foreach($listSMn['RESULT'] as $listSMn){
						if (in_array($listSMn['URL'], $menus)) {
	
					?>
					<li><a href="<?php echo CMS_URL?>/index.php?page=data-<?php echo $listSMn['URL']?>"><?php echo $listSMn['TITLE']?></a></li>
					<?php } }?>					
				</ul>
				<?php } ?>
			</li>
		<?php }} ?>
	</ul>
</div>