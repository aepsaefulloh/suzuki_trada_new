<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

function saveRecord($TABLE,$objItem){
	$obj=null;
    $obj['SQL']="";
	//LIST COL
	$colup='';
	$col='';
	$val='';
	$where='';	
	$i=0;
	foreach($objItem as $k=>$v){
		$exp=explode("-",$k);		
		if (($k!='ACT')&&($exp[0]!='PK')){
			$i++;
			
			//EDIT VAR			
			if ($i>1){
				$colup.=",".$k."='".cleanParam($v)."'";				
			}else{
				$colup.=$k."='".cleanParam($v)."'";
			}
			
			
			//ADD VAR
			if ($i>1){
				$col.=",".$k;
				$val.=",'".cleanParam($v)."'";
			}else{
				$col.=$k;
				$val.="'".cleanParam($v)."'";
			}
			
		}
		
		//GET WHERE KEY
		if (sizeof($exp)>1){
				$where=' where '.$exp[1]."='".cleanParam($v)."'";
		}
	}
	
	if (strtoupper($objItem['ACT'])=="ADD"){
        $obj['SQL']="insert into {$TABLE} (".$col.") values (".$val.")";		
	}else if(strtoupper($objItem['ACT'])=="EDIT"){
		$obj['SQL']="UPDATE {$TABLE} set ".$colup;
		$obj['SQL'].=$where;
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getRecord($TABLE,$COND){
	$obj=null;    
	
	$obj['SQL']="SELECT * from {$TABLE} where 1=1";

	foreach($COND as $k=>$v){
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='KEYWORD') && ($k!='ACT') && ($k!='INID')&& ($k!='CUSTOM1')&& ($k!='CUSTOM2')&& ($k!='CUSTOM3')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".cleanParam($v)."'";
			}
		}
	}
	
	if(isset($COND['KEYWORD'])&& $COND['KEYWORD']!=''){
		$obj['SQL'].=" AND (DESCRIPTION like '%".$COND['KEYWORD']."%' or KEYWORD like '%".$COND['KEYWORD']."%') ";
	}	
	
	if(isset($COND['CUSTOM1'])&& $COND['CUSTOM1']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM1'];	
	}
	
	if(isset($COND['CUSTOM2'])&& $COND['CUSTOM2']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM2'];	
	}
	
	if(isset($COND['CUSTOM3'])&& $COND['CUSTOM3']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM3'];	
	}
	
	
	if(isset($COND['ORDER'])&& $COND['ORDER']!=''){
		$obj['SQL'].=" ORDER by ".$COND['ORDER'];	
	}	
	
	if(isset($COND['LIMIT'])&& $COND['LIMIT']!=''){
		$obj['SQL'].=" LIMIT ".$COND['LIMIT'];
	}else{
		$obj['SQL'].=" LIMIT 1";
	}
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function countRecord($TABLE,$COND){
	$obj=null;    
	
	$obj['SQL']="SELECT count(1) as TOTAL from {$TABLE} where 1=1";

	foreach($COND as $k=>$v){
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='KEYWORD') && ($k!='ACT')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".$v."'";
			}
		}
	}
	
	if(isset($COND['KEYWORD'])&& $COND['KEYWORD']!=''){
		$obj['SQL'].=" AND (DESCRIPTION like '%".$COND['KEYWORD']."%' or KEYWORD like '%".$COND['KEYWORD']."%') ";
	}	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function getNewsRelated($objItem){
	
	$KEYWORD=explode(",",$objItem['KEYWORD']);
	$ksize=sizeof($KEYWORD);
	
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_article ";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now()";
		
	
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";			
		
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";				
	
	
	if($ksize==1){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%')";
	}else if($ksize==2){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%' or KEYWORD like '%".trim($KEYWORD[1])."%')";
	}else if($ksize==3){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%')";
	}else if($ksize==4){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%' or KEYWORD like '%".trim($KEYWORD[3])."%')";
	}else if($ksize==5){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%' or KEYWORD like '%".trim($KEYWORD[3])."%' or KEYWORD like '%".trim($KEYWORD[4])."%')";
	}else if($ksize==6){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%' or KEYWORD like '%".trim($KEYWORD[3])."%' or KEYWORD like '%".trim($KEYWORD[4])."%' or KEYWORD like '%".trim($KEYWORD[5])."%')";
	}
		
	//$obj['SQL'].=" AND PUBLISH_TIMESTAMP > (curdate()-interval 1 MONTH)";					
		
	$obj['SQL'].=" ORDER BY PUBLISH_TIMESTAMP DESC ";
	$obj['SQL'].=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function upcount($objItem){
	$obj=null;
    	
	$obj['SQL']="UPDATE tbl_article set HIT='".$objItem['HIT']."' WHERE ID='".$objItem['ID']."'";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}

function getNewsPopular($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_article ";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now()";
		
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";	
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";			
		
	$obj['SQL'].=" AND PUBLISH_TIMESTAMP > (CURDATE() - interval 3 DAY)";	
		
		
	$obj['SQL'].=" ORDER BY HIT DESC ";
	$obj['SQL'].=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

 
function getNewsURL($objItem){
	// ARTIKEL/ID/TITLE/
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=ROOT_URL.'/artikel/'.$objItem['ID'].'/'.$seo.'/';
	return $result;
}

function getNewsURLMobile($objItem){
	// ARTIKEL/ID/TITLE/	
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=MROOT_URL.'/artikel/'.$objItem['ID'].'/'.$seo.'/';
	return $result;
}


//------------------------------UTIL-------------------------------------------------
function tanggal($tanggal,$ftanggal)
{
$xbulan='';	
	
$tgl=substr($tanggal,8,2);
$bulan=substr($tanggal,5,2);
$tahun=substr($tanggal,0,4);

$waktu=substr($tanggal,10,9);
if(strlen($waktu)>0){
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
$detik=$twaktu[2];
if ($jam>24){
	$jam=$twaktu[0]-24;
}
//$waktu=$jam.':'.$menit.':'.$detik;
$waktu=$jam.':'.$menit;
}


$hari=date('w',mktime(0,0,0,$bulan,$tgl,$tahun));

switch ($hari) {
case 0: $hari="Minggu";
break;
case 1: $hari="Senin";
break;
case 2: $hari="Selasa";
break;
case 3: $hari="Rabu";
break;
case 4: $hari="Kamis";
break;
case 5: $hari="Jum'at";
break;
case 6: $hari="Sabtu";
break;
}
switch ($xbulan) {
case 1: $bulan="Janu";
break;
case 2: $bulan="Feb";
break;
case 3: $bulan="Mar";
break;
case 4: $bulan="Apr";
break;
case 5: $bulan="Mei";
break;
case 6: $bulan="Jun";
break;
case 7: $bulan="Jul";
break;
case 8: $bulan="Agu";
break;
case 9: $bulan="Sep";
break;
case 10: $bulan="Okt";
break;
case 11: $bulan="Nov";
break;
case 12: $bulan="Des";
break;
}

	if ($ftanggal=="tipe1"){
		echo "$tgl $bulan $tahun";
	}else if($ftanggal=="tipe2"){
		echo "$hari, $tgl $bulan $tahun";    
	}else if($ftanggal=="tipe3"){
		//echo "$hari, $tgl $bulan $tahun | $waktu WIB";
		echo "$hari, $tgl/$bulan/$tahun  $waktu WIB";
	}
}


function remote_file_exists($objVar) 
{ 
	
  //CHECK INI CONFIG 	
  if(ini_get('allow_url_fopen') == 0) 
  { 
    trigger_error('ERROR: allow_url_fopen is not enabled on this server', E_USER_WARNING); 
    return(FALSE); 
  }
  
  
  //CHECK IF IMAGE ALREADY EXIST
  if(($handle = @fopen($objVar['folder']."/thumb/".$objVar['name'], 'r'))&& ($handle = @fopen($objVar['folder']."/thumb/".$objVar['name'], 'r')) )
  { 
    fclose($handle); 
    return(TRUE); 
  }else{
  //COPY IMAGE WHEN NOT EXIST
  
	//------if not exist create folder using news date-----
	if(!file_exists($objVar['folder'])) mkdir($objVar['folder']); 		
	if(!file_exists($objVar['folder']."/thumb")) mkdir($objVar['folder']."/thumb/"); 		
	if(!file_exists($objVar['folder']."/view/")) mkdir($objVar['folder']."/view/");
		
	//-----copy thumbnail and view -------
	
	//CHECK SOURCE 1
	$vimgold=IMG_SOURCE;	
	
	
	$varold = array("[IDPIC]","[K]", "[MD5]", "[SIZE]");
	$varnew_thumb   = array($objVar['id'], $objVar['k'], $objVar['md5'], "thumb");
	$varnew_view   = array($objVar['id'], $objVar['k'], $objVar['md5'], "view");
	
	//build source url
	$varnew_thumb = str_replace($varold, $varnew_thumb,$vimgold);
	$varnew_view = str_replace($varold, $varnew_view,$vimgold);
			
	//Copy if source exist
	if($handle = @fopen($varnew_view, 'r'))
	{
	//copy original to local folder	
	copy($varnew_view, $objVar['folder']."/view/".$objVar['name']);
	//copy thumb to local folder
	copy($varnew_view, $objVar['folder']."/thumb/".$objVar['name']);			
	//resize view to thumb image
	create_thumbnail_preserve_ratio($objVar['folder']."/view/".$objVar['name'], $objVar['folder']."/thumb/".$objVar['name'], '250');		
	}	
  }  
  return(FALSE); 
}

function create_thumbnail_preserve_ratio($source, $destination, $thumbWidth)
{
    //$extension = get_image_extension($source);
	$extension = pathinfo($source, PATHINFO_EXTENSION);
    $size = getimagesize($source);
    $imageWidth  = $size[0];
    $imageHeight = $size[1];
	$newWidth  = 250;
	$newheight = 170;	
	
	
	
    if ($imageWidth > $thumbWidth || $imageHeight > $thumbWidth)
    {
        // Calculate the ratio
        $xscale = ($imageWidth/$thumbWidth);
        $yscale = ($imageHeight/$thumbWidth);
        $newWidth  = ($yscale > $xscale) ? round($imageWidth * (1/$yscale)) : round($imageWidth * (1/$xscale));
        $newHeight = ($yscale > $xscale) ? round($imageHeight * (1/$yscale)) : round($imageHeight * (1/$xscale));
		
		
		$newImage = imagecreatetruecolor($newWidth, $newHeight);

    switch ($extension)
    {
        case 'jpeg':
        case 'jpg':
            $imageCreateFrom = 'imagecreatefromjpeg';
            $store = 'imagejpeg';
            break;

        case 'png':
            $imageCreateFrom = 'imagecreatefrompng';
            $store = 'imagepng';
            break;

        case 'gif':
            $imageCreateFrom = 'imagecreatefromgif';
            $store = 'imagegif';
            break;

        default:
            return false;
    }

    $container = $imageCreateFrom($source);
    imagecopyresampled($newImage, $container, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);
    return $store($newImage, $destination);
    }else{
		//error_log("ukuran gambar kekecilan", 3, "/var/tmp/jurnas-debug.log");
	}

    
}


function getPhotos($objItem){	
	$image=null;		
	$objItem['k']='f';
	if($objItem['kf_id']<1){
		$objItem['id']=$objItem['kg_id'];
		$objItem['k']='g';
	}
	if(remote_file_exists($objItem)){
		$file_status=true;
		$image['VIEW']=IMG_URL.$objItem['folder']."/view/".$objItem['name'];	
		$image['THUMB']=IMG_URL.$objItem['folder']."/thumb/".$objItem['name'];										
	}

    return $image;
}

function getImage($objItem){
$image=null;
if ($objItem['IMAGE_FROM']!=3){
	//$image['VIEW']=ROOT_URL."/css/noimage.png";
	//$image['THUMB']=ROOT_URL."/css/noimage.png";
	//$image['creator']="jurnas";
	if (strlen($objItem['IMAGE'])>0){
		$image['VIEW']=IMG_URL."/images/view/".$objItem['IMAGE'];
		$image['THUMB']=IMG_URL."/images/thumb/".$objItem['IMAGE'];
	}else{
		$image['VIEW']=IMG_URL."/images/noimage.png";
		$image['THUMB']=IMG_URL."/images/noimage.png";	
	}	
}else{
	$objVar['NAME']=$objItem['IMAGE'];
	$list=getImageFile($objVar);   
	$list=$list['RESULT'][0];
	$expImg=explode('.',$objItem['IMAGE']);
	if (strlen($objItem['IMAGE'])>0){
		$image['VIEW']=PHOTO_URL."/".$list['ADDRESS_URL']."/".$expImg[0].'_1.'.$expImg[1];
		$image['THUMB']=PHOTO_URL."/".$list['ADDRESS_URL']."/".$expImg[0].'_2.'.$expImg[1];
	}else{
		$image['VIEW']=IMG_URL."/images/noimage.png";
		$image['THUMB']=IMG_URL."/images/noimage.png";	
	}
}

return $image;
}


function getImageFile($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photos WHERE 1=1";
    
    if(isset($objItem['NAME'])&& $objItem['NAME']!='')
        $obj['SQL'].=" AND NAME='".$objItem['NAME']."'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function selisihWaktu($waktu){
$waktulalu;
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
if (($jam>0) and ($jam<=24)) {    	
	$waktulalu=intval($jam)." jam ".intval($menit)." menit yang lalu";		
}else if ($jam<1){
	$waktulalu=intval($menit)." menit yang lalu";		
}else{
	$waktulalu=floor($jam/24)." hari ".($jam%24)." jam yang lalu";
}

return $waktulalu;
}


function waktuPublish($waktu){
$waktupublish=$waktu;
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
$detik=$twaktu[2];
if ($jam>24){
	$jam=$twaktu[0]-24;
}
$waktupublish=$jam.':'.$menit.':'.$detik;

return $waktupublish;
}

function doLog($text)
{
  // open log file
  $filename = "debug.log";
  $fh = fopen($filename, "a") or die("Could not open log file.");
  fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("Could not write file!");
  fclose($fh);
}

function cleanParam($var){   
    $result=null;
	$search = array("select","insert","update","union","delete");  
    $replace = array("","","","",""); 
					 
	$result=str_ireplace("\\","",(str_replace($search, $replace, $var)));			
	return $result;
}
?>