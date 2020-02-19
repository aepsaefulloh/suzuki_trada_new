<?php

function writeCache($tbl,$seo=null){
	
$result=null;	
$params=null;
$list=null;


if($tbl=='tbl_menu'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';
	$params['SITE']='mobilinanews';
	$params['ORDER']='ORDNUM ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){		
		$posts[] = array('ID'=> $list['ID'],'TITLE'=> $list['TITLE'], 'URL'=> $list['URL'],'TYPE'=> $list['TYPE'],'POS'=> $list['POS'],'ORDNUM'=> $list['ORDNUM']);
	}
	
}else if($tbl=='tbl_category'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){		
		$posts[] = array('ID'=> $list['ID'],'CATEGORY_NAME'=> $list['CATEGORY_NAME'], 'SEO'=> $list['SEO']);
	}
	
}else if($tbl=='tbl_writer'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){
		$posts[] = array('ID'=> $list['ID'],'FULLNAME'=> $list['FULLNAME'], 'EMAIL'=> $list['EMAIL']);
	}	
}else if($tbl=='tbl_config'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){
		$posts[] = array('ID'=> $list['ID'],'CATEGORY'=> $list['CATEGORY'], 'LABEL'=> $list['LABEL'], 'CKEY'=> $list['CKEY'], 'CVALUE'=> $list['CVALUE']);
	}	
}else if($tbl=='tbl_article'){	
	$params['ORDER']='PUBLISH_TIMESTAMP DESC';
	if(($seo!='headline')&&($seo!='popular')&&($seo!='editorpick')){
		if($seo=='latest'){			
			$params['LIMIT']='0,100';		
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}else{
			$var['SEO']=$seo;
			$listCat=getCategory($var);
			$result['SQLC']=$listCat['SQL'];

			$params['CATEGORY']=$listCat['RESULT'][0]['ID'];
			$params['LIMIT']='0,20';
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}	
	}else{
		if($seo=='headline'){
			$params['LIMIT']='0,20';
			$params['TIPE']='headline';		
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}
		if($seo=='popular'){
			$params['FIRST']='0';	
			$params['END']='10';	
			$list=getNewsPopular($params);
			$result['SQL']=$list['SQL'];
		}
		
		if($seo=='editorpick'){
			$params['LIMIT']='0,20';
			$params['EDITORPICK']='1';	
			$list=getNewsPopular($params);
			$result['SQL']=$list['SQL'];
		}
	}
	
	foreach($list['RESULT'] as $list){
		$imgUrl=getImage($list);
		$imgThumb=$imgUrl['THUMB'];
		$imgView=$imgUrl['VIEW'];
		$url=getNewsUrl($list);
		$murl=getNewsUrlMobile($list);	

		$posts[] = array('ID'=> $list['ID'],
					'TITLE'=> $list['TITLE'], 
					'UPPERDECK'=> $list['UPPERDECK'],
					'TAICING'=> $list['TAICING'],
					'PUBLISH_TIMESTAMP'=> $list['PUBLISH_TIMESTAMP'],
					'KEYWORD'=> $list['KEYWORD'],
					'IMAGE'=> $list['IMAGE'],
					'IMG_URL'=> $imgUrl,'URL'=> $url,
					'MURL'=> $murl,
					'IMAGE_FROM'=> $list['IMAGE_FROM']
		);
	}
}

	$response['RESULT'] = $posts;
	$fp = fopen(CMS_PATH.'/cache/'.$seo.'.json', 'w');
	fwrite($fp, json_encode($response));
	fclose($fp);	
		
	return $result;	
}

function getCache($objItem){
	$results=null;
	$json = file_get_contents(CACHE_URL.'/'.$objItem.'.json');
	$results = json_decode($json,true);
	
	return $results['RESULT'];
}

function getApi($objItem){
	$results=null;
	$json = file_get_contents($objItem);
	$results = json_decode($json,true);
	
	return $results;
}
?>