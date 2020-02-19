<?php
function encrypt($string, $key=5) {
	$result = '';
	for($i=0, $k= strlen($string); $i<$k; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result .= $char;
	}
	return base64_encode($result);
}

function decrypt($string, $key=5) {
	$result = '';
	$string = base64_decode($string);
	for($i=0,$k=strlen($string); $i< $k ; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

function getSeo($objItem){
	$seo=null;
	$exp=explode('-',$objItem['PAGE']);
	$seo=$exp[1];
	return $seo;
}


function checkFolder($folder){
	$folder=CMS_PATH.'/files/'.$folder;
	if (!file_exists($folder)) {
		mkdir($folder, 0777, true);
	}
}


function createForm($tbl_model,$value){	
	foreach($tbl_model as $tbl){
		if ($tbl['FORM']=='Y'){			
			echo '<label><span>'.$tbl['TITLE'].'</span>';
			if ($tbl['TYPE']=='textarea'){
				echo "<textarea class='textarea-field' name='{$tbl['NAME']}'></textarea><br>";
			}else if ($tbl['TYPE']=='radio'){
				
				foreach($tbl['OPTION'] as $op){
					echo '  <input type="radio" name="radio" value='.$op['TEXT'].'>'.$op['TEXT'];
				}				
			}
			else{
				echo '<input class="input-field" type='.$tbl['TYPE'].' name='.$tbl['NAME'].' value'.$value[$tbl['NAME']].'><br>';
			}	
			echo '</label>';
		}
	}
}
function readMetaPdf($file)
{
	$f = fopen($file,'rb');
	if(!$f)
		return false;

	//Read the last 16KB
	fseek($f, -16384, SEEK_END);
	$s = fread($f, 16384);

	//Extract cross-reference table and trailer
	if(!preg_match("/xref[\r\n]+(.*)trailer(.*)startxref/s", $s, $a))
		return false;
	$xref = $a[1];
	$trailer = $a[2];

	//Extract Info object number
	if(!preg_match('/Info ([0-9]+) /', $trailer, $a))
		return false;
	$object_no = $a[1];

	//Extract Info object offset
	$lines = preg_split("/[\r\n]+/", $xref);
	$line = $lines[1 + $object_no];
	$offset = (int)$line;
	if($offset == 0)
		return false;

	//Read Info object
	fseek($f, $offset, SEEK_SET);
	$s = fread($f, 1024);
	fclose($f);

	//Extract properties
	if(!preg_match('/<<(.*)>>/Us', $s, $a))
		return false;
	$n = preg_match_all('|/([a-z]+) ?\((.*)\)|Ui', $a[1], $a);
	$prop = array();
	for($i=0; $i<$n; $i++)
		$prop[$a[1][$i]] = $a[2][$i];
	return $prop;
}

function readIptc($filename){
$iptchead = array
(
    '2#005'=>'DocumentTitle',
    '2#010'=>'Urgency',
    '2#015'=>'Category',
    '2#020'=>'Subcategories',
    '2#040'=>'SpecialInstructions',
    '2#055'=>'CreationDate',
    '2#080'=>'AuthorByline',
    '2#085'=>'AuthorTitle',
    '2#090'=>'City',
    '2#095'=>'State',
    '2#101'=>'Country',
    '2#103'=>'OTR',
    '2#105'=>'Headline',
    '2#110'=>'Source',
    '2#115'=>'PhotoSource',
    '2#116'=>'Copyright',
    '2#120'=>'Caption',
    '2#122'=>'CaptionWriter'
);

$data=null;
$picinfo = array();
getimagesize($filename, $picinfo);
//echo "<pre>";
//print_r(array_keys($picinfo));
//echo "</pre>";

if(isset($picinfo['APP13']))
{ $iptc = iptcparse($picinfo['APP13']);

}

if(isset($picinfo['APP13']))
{
$iptc = iptcparse($picinfo["APP13"]);
foreach($iptc as $k=>$v){
	//echo "<b>".$k."</b><br>";
	foreach($v as $i=>$j){
		//echo '-->'.$j."<br>";
	}
}

	
	if (is_array($iptc)) {	
	$data['TITLE'] = $iptc["2#005"][0]; 
	$data['URGENCY'] = $iptc["2#010"][0];    
	$data['CATEGORY'] = $iptc["2#015"][0];    		
	$data['SUBCATEGORY'] = $iptc["2#020"][0]; 
	$data['SPECIAL_INSTRUCTION'] = $iptc["2#040"][0]; 
	$data['CREATION_DATE'] = $iptc["2#055"][0]; 
	$data['AUTHOR'] = $iptc["2#080"][0]; 
	$data['AUTHOR_TITLE'] = $iptc["2#085"][0]; 
	$data['CITY'] = $iptc["2#090"][0]; 
	$data['STATE'] = $iptc["2#095"][0]; 
	$data['COUNTRY'] = $iptc["2#101"][0]; 
	$data['OTR'] = $iptc["2#103"][0]; 
	$data['HEADLINE'] = $iptc["2#105"][0]; 
	$data['SOURCE'] = $iptc["2#110"][0]; 
	$data['PHOTO_SOURCE'] = $iptc["2#115"][0]; 
	$data['COPYRIGHT'] = $iptc["2#116"][0]; 
	$data['CAPTION'] = $iptc["2#120"][0];
	$data['CAPTION_WRITER'] = $iptc["2#122"][0];
	}
}
return $data;
}


function prepareFolder(){
	$folder=null;
	$yFolder = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/";  
	$dFolder = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/".date('Y-m-d')."/";  
	$folder['ORI'] = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/".date('Y-m-d')."/ori/";  
	$folder['VIEW'] = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/".date('Y-m-d')."/view/";  
	$folder['THUMB'] = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/".date('Y-m-d')."/thumb/";  
	$folder['DOC'] = UPLOAD_DIR."/media/".GROUP_FOLDER."/".date('Y')."/".date('Y-m-d')."/doc/"; 
	
	if (!file_exists($yFolder)) {
		mkdir($yFolder, 0777, true);
		$folder['STATUS'].=$yFolder.'...created!<br>';
	}
	if (!file_exists($dFolder)) {
		mkdir($dFolder, 0777, true);
		$folder['STATUS'].=$dFolder.'...created!<br>';
	}
	if (!file_exists($folder['ORI'])) {
		mkdir($folder['ORI'], 0777, true);
		$folder['STATUS'].=$folder['ORI'].'...created!<br>';
	}
	if (!file_exists($folder['VIEW'])) {
		mkdir($folder['VIEW'], 0777, true);
		$folder['STATUS'].=$folder['VIEW'].'...created!<br>';
	}
	if (!file_exists($folder['THUMB'])) {
		mkdir($folder['THUMB'], 0777, true);
		$folder['STATUS'].=$folder['THUMB'].'...created!<br>';
	}
	if (!file_exists($folder['DOC'])) {
		mkdir($folder['DOC'], 0777, true);
		$folder['STATUS'].=$folder['DOC'].'...created!<br>';
	}
	
	return $folder;
}
?>
