<?php
require_once '../../../../../../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';
session_start();
$_SESSION["verify"] = "FileManager4TinyMCE";

$objVar['search']=$_GET['search'];

if(isset($_POST['submit'])){

include('upload.php');

}else{

include 'config.php';
include('utils.php');

if(isset($_GET['popup'])) $popup= $_GET['popup']; else $popup=0;

if (isset($_GET['fldr']) && !empty($_GET['fldr'])) {
    $subdir = trim($_GET['fldr'],'/') . '/';
}
else
    $subdir = '';

/***
 *SUB-DIR CODE
 ***/
$subfolder = '';
if(isset($_GET['subfolder']) && !empty($_GET['subfolder'])) {
    if($_GET['subfolder'] != "undefined") $subfolder = $_GET['subfolder'];
    $cur_dir = $upload_dir . $subfolder . '/' . $subdir;
    $cur_path = $current_path . $subfolder .'/'. $subdir;
    $thumbs_path = 'thumbs/' . $subfolder . '/';
    if (!file_exists($thumbs_path.$subdir)) create_folder(false,$thumbs_path.$subdir);
}
else {
    $cur_dir = $upload_dir . $subdir;
    $cur_path = $current_path . $subdir;
    $thumbs_path = 'thumbs/';
}


if (isset($_GET['lang']) && $_GET['lang'] != 'undefined' && is_readable('lang/' . $_GET['lang'] . '.php')) {
    require_once 'lang/' . $_GET['lang'] . '.php';
} else {
    require_once 'lang/en_EN.php';
}
if(!isset($_GET['type'])) $_GET['type']=0;
if(!isset($_GET['field_id'])) $_GET['field_id']='';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="robots" content="noindex,nofollow">
        <title>FileManager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-lightbox.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
	<!--[if lt IE 8]><style>
	.img-container span {
	    display: inline-block;
	    height: 100%;
	}
	</style><![endif]-->
        <script type="text/javascript" src="js/jquery.1.9.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-lightbox.min.js"></script>
	<script type="text/javascript" src="js/dropzone.min.js"></script>
	<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script>
	    var ext_img=new Array('<?php echo implode("','", $ext_img)?>');
	    var allowed_ext=new Array('<?php echo implode("','", $ext)?>');

	    //dropzone config
	    Dropzone.options.myAwesomeDropzone = {
		    dictInvalidFileType: "<?php echo lang_Error_extension;?>",
		    dictFileTooBig: "<?php echo lang_Error_Upload; ?>",
		    dictResponseError: "SERVER ERROR",
		    paramName: "file", // The name that will be used to transfer the file
		    maxFilesize: <?php echo $MaxSizeUpload; ?>, // MB
		    url: "upload.php",
		    accept: function(file, done) {
		    var extension=file.name.split('.').pop().toLowerCase();
		      if ($.inArray(extension, allowed_ext) > -1) {
			done();
		      }
		      else { done("<?php echo lang_Error_extension;?>"); }
		    }
	    };
	</script>
	<script type="text/javascript" src="js/include.js"></script>
    </head>
    <body>
	
		<input type="hidden" id="popup" value="<?php echo $popup; ?>" />
		<input type="hidden" id="track" value="<?php echo $_GET['editor']; ?>" />
		<input type="hidden" id="cur_dir" value="<?php echo $cur_dir; ?>" />
		<input type="hidden" id="cur_dir_thumb" value="<?php echo $thumbs_path.$subdir; ?>" />
		<input type="hidden" id="root" value="<?php echo $root; ?>" />
		<input type="hidden" id="insert_folder_name" value="<?php echo lang_Insert_Folder_Name; ?>" />
		<input type="hidden" id="new_folder" value="<?php echo lang_New_Folder; ?>" />
		<input type="hidden" id="base_url" value="<?php echo $base_url?>"/>
			
		<div class="container-fluid">
          
          

    <!----- breadcrumb div start ------->
    <div class="row-fluid">
	<?php 
	$link="dialog.php?type=".$_GET['type']."&editor=";
	$link.=$_GET['editor'] ? $_GET['editor'] : 'mce_0';
	$link.="&popup=".$popup."&lang=";
	$link.=$_GET['lang'] ? $_GET['lang'] : 'en_EN';
	$link.="&field_id=";
	$link.=$_GET['field_id'] ? $_GET['field_id'] : '';
	$link.="&subfolder=".$subfolder;
	$link.="&fldr="; 
	?>
	<ul class="breadcrumb">
	<li class="pull-left"><a href="<?php echo $link?>"><i class="icon-home"></i></a></li><li><span class="divider">/</span></li>
	<?php
		$bc=explode('/',$subdir);
	$tmp_path='';
	if(!empty($bc))
	foreach($bc as $k=>$b){ 
		$tmp_path.=$b."/";
		if($k==count($bc)-2){
	?> <li class="active"><?php echo $b?></li><?php
		}elseif($b!=""){ ?>
		<li><a href="<?php echo $link.$tmp_path?>"><?php echo $b?></a></li><li><span class="divider">/</span></li>
	<?php }
	}
	?>
	<li class="pull-right"><a id="refresh" href="dialog.php?type=<?php echo $_GET['type']?>&editor=<?php echo $_GET['editor'] ? $_GET['editor'] : 'mce_0'; ?>&subfolder=<?php echo $subfolder ?>&popup=<?php echo $popup;?>&field_id=<?php echo $_GET['field_id'] ? $_GET['field_id'] : '';?>&lang=<?php echo $_GET['lang'] ? $_GET['lang'] : 'en_EN'; ?>&fldr=<?php echo $subdir ?>&<?php echo uniqid() ?>"><i class="icon-refresh"></i></a></li>
	</ul>
    </div>
    <!----- breadcrumb div end ------->
	<?php 
	
	$objVar['DESCRIPTION']=isset($_REQUEST['search'])?$_REQUEST['search']:"";
	$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:1;
	?>
	<form action="">
		Search : <input type="text" name="search" value="<?php echo $objVar['DESCRIPTION']?>" style="padding:10px;margin-top:10px">
		<input type="hidden" name="hal" value="1">
		<input type="hidden" name="type" value="1" />
		<input type="hidden" name="editor" value="TAICING" />
		<input type="submit" value="filter">
	</form>
	
	
    <div class="row-fluid ff-container">
	<div class="span12">
	    
	    <h4 id="help">Swipe the name of file/folder to show options</h4>
		    
	    <!--ul class="thumbnails ff-items"-->
	    <ul class="grid cs-style-2">
		<?php		
		$start=false;
		$end=false;
		$apply = 'apply_img';
		
		
		//PAGING
		$totalPhotos=countPhotos($objVar);
		//echo $totalPost['SQL'];
		$totalPhotos=$totalPhotos['RESULT'][0]['TOTAL'];
		//echo $totalPost;
		$per_page =20;
		$totalpages = ceil($totalPhotos / $per_page);
		$first = ($hal-1) * $per_page;
		
		
		$start=$hal-10;
		if ($start<1){
			$start=1;
		}
		
		$end=$hal+10;
		if ($end>$totalpages){
			$end=$totalpages;
		}
		
		for($i=$start;$i<=$end;$i++){
		?>	<div style="width:30px;float:left">
			<form>
			<input type="hidden" name="type" value="1" />
			<input type="hidden" name="editor" value="TAICING" />
			
			<input type="hidden" name="search" value="<?php echo $objVar['DESCRIPTION']?>">
			<input type="hidden" name="hal" value="<?php echo $i?>">
			<input type="submit" value="<?php echo $i?>">
			</form>
			</div>
		<?php	
		}
		echo "<div style='clear:both'></div><hr>";
		
		
		$objVar['FIRST']=$first;
		$objVar['END']=$per_page;
		$listPhoto=getPhotos($objVar);
		foreach($listPhoto['RESULT'] as $objList) {
			$ph=explode('.',$objList['NAME']);
			$url=PHOTO_URL.'/'.$objList['ADDRESS_URL'].'/'.$ph[0].'_1.'.$ph[1];
			?>
			<li class="ff-item-type-<?php echo $class_ext; ?>">
				<figure>
				
					<a href="javascript:void('');" title="<?php echo $objList['DESCRIPTION']?>" onclick="<?php echo $apply."('".$url."','".$_GET['type']."','".$_GET['field_id']."');"; ?>">
					<div class="img-precontainer">
					<div class="img-container"><span></span>
					<img data-src="holder.js/122x91" alt="image" <?php echo $show_original ? "class='original'" : "" ?> src="<?php echo $url; ?>">
					</div>
					</div>
					</a>	
					<div class="box">				
					<h4><?php echo $objList['NAME']?></h4>

					</div>
					<figcaption>
					    <form action="force_download.php" method="post" class="download-form" id="form<?php echo $nu; ?>">
						<input type="hidden" name="path" value="<?php echo $url?>"/>
						<input type="hidden" name="name" value="<?php echo $objList['NAME']?>"/>
						
						<a title="<?php echo lang_Download?>" class="" href="javascript:void('');" onclick="$('#form<?php echo $nu; ?>').submit();"><i class="icon-download"></i></a>
					    
					    <a class="preview" title="<?php echo lang_Preview?>" data-url="<?php echo $url;?>" data-toggle="lightbox" href="#previewLightbox"><i class=" icon-eye-open"></i></a>
					    
					  
					    </form>
					</figcaption>
				</figure>
				
			</li>
			
			<?php
		}
	?></div>
	    </ul>
	    
	</div>
    </div>
</div>
    
    <!----- lightbox div start ------->    
    <div id="previewLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
	    <div class='lightbox-content'>
		    <img id="full-img" src="">
	    </div>    
    </div>
    <!----- lightbox div end ------->

    <!----- loading div start ------->  
    <div id="loading_container" style="display:none;">
	    <div id="loading" style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>
	    <img id="loading_animation" src="img/storing_animation.gif" alt="loading" style="z-index:10001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
    </div>
    <!----- loading div end ------->
    
</body>
</html>
<?php } ?>
