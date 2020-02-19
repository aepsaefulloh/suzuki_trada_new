<?php 
$page=isset($_REQUEST['page'])?$_REQUEST['page']:'home'; 
$ext=explode('-',$page);
if (sizeof($ext)>1){
	$content=$ext[1];
	$page_file = CMS_PATH."/content/".$ext[1]."/".$page.".php";
	if (!file_exists($page_file)){
		$page_file=CMS_PATH."/content/404.php";
	}
}else{
	$page_file=CMS_PATH."/content/{$page}.php";
}
?>