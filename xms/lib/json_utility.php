<?php

function writeCache($tbl,$seo=null){
	
$result=null;	
$params=null;
$list=null;
$posts=array();


if($tbl=='tbl_product'){
        $params['LIMIT']='1000';
        $params['STATUS']='1';
        $list=getRecord($tbl,$params);
        $result['SQL']=$list['SQL'];

        foreach($list['RESULT'] as $list){
                $posts[] = array('ID'=> $list['ID'],'PRODUCT'=> $list['PRODUCT'],'CATEGORY'=> $list['CATEGORY'],'SUMMARY'=> $list['SUMMARY'],'PRICE'=> $list['PRICE'],'SPECS'=> $list['SPECS'],'BROCHURE'=> $list['BROCHURE'],'IMAGE'=> $list['IMAGE'],'STATUS'=> $list['STATUS']);
        }

}else if($tbl=='tbl_content'){
        $params['LIMIT']='1000';
        $params['STATUS']='1';
        $list=getRecord($tbl,$params);
        $result['SQL']=$list['SQL'];

        foreach($list['RESULT'] as $list){
                $posts[] = array('ID'=> $list['ID'],'TITLE'=> $list['TITLE'],'SUMMARY'=> $list['SUMMARY'],'CONTENT'=> $list['CONTENT'],'IMAGE'=> $list['IMAGE'],'KEYWORD'=> $list['KEYWORD'],'CATEGORY'=> $list['CATEGORY'],'CONTENT'=> $list['CONTENT'],'HIT'=> $list['HIT'],'STATUS'=> $list['STATUS']);
        }

}else if($tbl=='tbl_kabupaten'){
        $params['LIMIT']='10000';
        $list=getRecord($tbl,$params);
        $result['SQL']=$list['SQL'];

        foreach($list['RESULT'] as $list){
                $posts[] = array('ID'=> $list['ID'],'ID_PROPINSI'=> $list['ID_PROPINSI'],'KABUPATEN'=> $list['KABUPATEN']);
        }

}else if($tbl=='tbl_propinsi'){
        $params['LIMIT']='500';
        $list=getRecord($tbl,$params);
        $result['SQL']=$list['SQL'];

        foreach($list['RESULT'] as $list){
                $posts[] = array('ID'=> $list['ID'],'PROPINSI'=> $list['PROPINSI']);
        }

}else if($tbl=='tbl_group'){
	$params['LIMIT']='100';		
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){		
		$posts[] = array('ID'=> $list['ID'],'GROUP_NAME'=> $list['GROUP_NAME'], 'ACCESS'=> $list['ACCESS']);
	}
	
}elseif($tbl=='tbl_menu'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ORDNUM ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){		
		$posts[] = array('ID'=> $list['ID'],'TITLE'=> $list['TITLE'], 'URL'=> $list['URL'],'TYPE'=> $list['TYPE'],'POS'=> $list['POS'],'ORDNUM'=> $list['ORDNUM']);
	}
	
}else if($tbl=='tbl_category'){
	$params['LIMIT']='100';
	$params['STATUS']='1';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){		
		$posts[] = array('ID'=> $list['ID'],'CATEGORY'=> $list['CATEGORY'],'LEVEL'=> $list['LEVEL'],'PARENT_ID'=> $list['PARENT_ID'], 'SEO'=> $list['SEO'], 'TIPE'=> $list['TIPE'], 'STATUS'=> $list['STATUS']);
	}
	
}else if($tbl=='tbl_banners'){
	$params['LIMIT']='20';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){
		$posts[] = array('ID'=> $list['ID'],'TITLE'=> $list['TITLE'], 'POS'=> $list['POS'], 'URL'=> $list['URL'], 'FILENAME'=> $list['FILENAME']);
	}	
}else if($tbl=='tbl_writer'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getRecord($tbl,$params);
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){
		$posts[] = array('ID'=> $list['ID'],'TITLE'=> $list['TITLE'], 'POS'=> $list['POS'], 'URL'=> $list['URL']);
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
}else if($tbl=='statistik'){
	$params['LIMIT']='0,100';
	$params['STATUS']='1';	
	$params['ORDER']='ID ASC';
	$list=getStatistik();
	$result['SQL']=$list['SQL'];
	
	foreach($list['RESULT'] as $list){
		$posts[] = array('ID'=> $list['ID'],'CATEGORY'=> $list['CATEGORY'], 'LABEL'=> $list['LABEL'], 'CKEY'=> $list['CKEY'], 'CVALUE'=> $list['CVALUE']);
	}	
}else if($tbl=='tbl_contentx'){
	$params['STATUS']='1';	
	$params['ORDER']='PUBLISH_TIMESTAMP DESC';
	
	if(($seo!='headline')&&($seo!='popular')&&($seo!='editorpick')&&($seo!='infoterkini')){
		if($seo=='latest'){
			$params['NCATEGORY']='13';
			$params['LIMIT']='0,100';		
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}else{			
			$params['CATEGORY']=$seo;
			$params['LIMIT']='20';
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}	
	}else{
		
		if($seo=='infoterkini'){
			$params['LIMIT']='0,20';
			$params['INCATEGORY']='("pengumuman","sekilasinfo")';		
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}
		
		if($seo=='headline'){
			$params['LIMIT']='0,20';
			$params['TIPE']='headline';		
			$list=getRecord($tbl,$params);
			$result['SQL']=$list['SQL'];
		}
		if($seo=='popular'){
			$params['LIMIT']='0,10';				
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
		$url=getNewsUrl($list);
		$murl=getNewsUrlMobile($list);	

		$posts[] = array('ID'=> $list['ID'],
						'TITLE'=> $list['TITLE'],
						'TAICING'=> $list['TAICING'],
						'CATEGORY'=> $list['CATEGORY'],
						'SUBCATEGORY'=> $list['SUBCATEGORY'],
						'PUBLISH_TIMESTAMP'=> $list['PUBLISH_TIMESTAMP'],
						'KEYWORD'=> $list['KEYWORD'],
						'IMAGE'=> $list['IMAGE'],
						'IMG_URL'=> $imgUrl,
						'URL'=> $url,
						'MURL'=> $murl,
						'FIN'=> $list['FIN'],
						'VIDEO'=> $list['VIDEO']
		);
	}
}

	$response['RESULT'] = $posts;
	$fp = fopen(ROOT_PATH.'/cache/'.$seo.'.json', 'w');
	fwrite($fp, json_encode($response));
	fclose($fp);	
		
	return $result;	
}

function getCache($objItem){
	$results=null;
	$json = file_get_contents(ROOT_PATH.'/cache/'.$objItem.'.json');
	$results = json_decode($json,true);
	
	return $results['RESULT'];
}
?>
