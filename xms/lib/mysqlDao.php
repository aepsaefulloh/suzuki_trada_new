<?php
function getRecord($TABLE,$COND){
	$obj=null;    
	
	$obj['SQL']="SELECT * from {$TABLE} where 1=1";

	foreach($COND as $k=>$v){
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='KEYWORD') && ($k!='ACT') && ($k!='PAGE') && ($k!='sSearchUser') && ($k!='sSearchContent') && ($k!='NIPOS')&& ($k!='NIC') && ($k!='INC') && ($k!='START_DATE')&& ($k!='END_DATE')&& ($k!='INCATEGORY')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".cleanParam($v)."'";
			}
		}
	}
	
	if(isset($COND['KEYWORD'])&& $COND['KEYWORD']!=''){
		$obj['SQL'].=" AND (DESCRIPTION like '%".$COND['KEYWORD']."%' or KEYWORD like '%".$COND['KEYWORD']."%') ";
	}	
	
	
	if(isset($COND['sSearchUser'])&& $COND['sSearchUser']!=''){
		$obj['SQL'].=" AND (EMAIL like '%".$COND['sSearchUser']."%' or FULLNAME like '%".$COND['sSearchUser']."%') ";
	}
	
	if(isset($COND['INCATEGORY'])&& $COND['INCATEGORY']!=''){
		$obj['SQL'].=" AND CATEGORY IN ".$COND['INCATEGORY'];
	}
	
	if(isset($COND['sSearchContent'])&& $COND['sSearchContent']!=''){
		$obj['SQL'].=" AND (TITLE like '%".$COND['sSearchContent']."%' or KEYWORD like '%".$COND['sSearchContent']."%') ";
	}
	
	if(isset($COND['sSearchContent'])&& $COND['sSearchContent']!=''){
		$obj['SQL'].=" AND (TITLE like '%".$COND['sSearchContent']."%' or KEYWORD like '%".$COND['sSearchContent']."%') ";
	}
	
	if(isset($COND['NIPOS'])&& $COND['NIPOS']!=''){
		$obj['SQL'].=" AND POS  not in ".$COND['NIPOS'];
	}
    
    if(isset($COND['NIC'])&& $COND['NIC']!=''){
		$obj['SQL'].=" AND CATEGORY  not in ".$COND['NIC'];
	}
    
    if(isset($COND['INC'])&& $COND['INC']!=''){
		$obj['SQL'].=" AND CATEGORY  in ".$COND['INC'];
	}
    
    if(isset($COND['START_DATE'])&& $COND['START_DATE']!=''){
		$obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)  >= '".$COND['START_DATE']."'";
	}
    
    if(isset($COND['END_DATE'])&& $COND['END_DATE']!=''){
		$obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)  <= '".$COND['END_DATE']."'";
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
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='CUSTOM') && ($k!='ACT')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".cleanParam($v)."'";
			}
		}
	}
	
	if(isset($COND['CUSTOM'])&& $COND['CUSTOM']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM'];
	}	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

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
				$val.=",'".$v."'";
			}else{
				$col.=$k;
				$val.="'".$v."'";
			}
			
		}
		
		//GET WHERE KEY
		if (sizeof($exp)>1){
				$where=' where '.$exp[1]."='".$v."'";
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




function getRelated($objItem){
	
	$KEYWORD=explode(",",$objItem['KEYWORD']);
	$ksize=sizeof($KEYWORD);
	
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_content WHERE STATUS=1 ";
		
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";				
	
	
	if($ksize==1){
     	$obj['SQL'].=" AND KEYWORD like '%".trim($KEYWORD[0])."%'";
	}else if($ksize==2){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%' or KEYWORD like '%".trim($KEYWORD[1])."%')";
	}else if($ksize==3){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%')";
	}else if($ksize==4){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%' or KEYWORD like '%".trim($KEYWORD[3])."%')";
	}
		
	//$obj['SQL'].=" AND PUBLISH_TIMESTAMP > (curdate()-interval 1 MONTH)";					
		
	$obj['SQL'].=" ORDER BY NO DESC ";
	$obj['SQL'].=" LIMIT ".$objItem['LIMIT'];
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function upcount($objItem){
	$obj=null;
    	
	$obj['SQL']="UPDATE tbl_content set VIEWED='".$objItem['VIEWED']."' WHERE FILENAME='".$objItem['FILENAME']."'";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}

function upcountDl($objItem){
	$obj=null;
    	
	$obj['SQL']="UPDATE tbl_content set DOWNLOADED='".$objItem['DOWNLOADED']."' WHERE FILENAME='".$objItem['FILENAME']."'";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}

function getRefMP(){
    $objResult=NULL;	
	
	$obj['SQL']="SELECT * from tbl_content WHERE SUBP>0 AND CATEGORY='materipenyuluhan' AND CATP IS NULL";
    	$obj['RESULT']=DAOQuerySQL($obj['SQL']);
	RETURN $obj;
}

function getLogin($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as status  from tbl_user WHERE STATUS='1'";
	$obj['SQL'].=" AND USERNAME='".$objItem['USERNAME']."' AND PASSWD='".$objItem['PASSWD']."'";
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}

function updatePassAuto($objItem){
	$obj=null;
	
	
	$obj['SQL1']="SELECT CPS  from tbl_user WHERE USERNAME='".$objItem['USERNAME']."' and LASTLOGIN IS NULL";	
	
    $obj['RESULT1']=DAOQuerySQL($obj['SQL1']);
	
	if(!empty($obj['RESULT1'])){
    $CPS=encrypt($obj['RESULT1'][0]['CPS']);
	
	$obj['SQL']="UPDATE tbl_user set PASSWD='".$CPS."' WHERE USERNAME='".$objItem['USERNAME']."' and LASTLOGIN IS NULL";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	
	}
	return $obj;
}


function getLoginInfo($objItem){
	$objResult=null;
	
	//SET LAST LOGIN		
	$obj['SQL2']="update tbl_user set LAST_LOGIN='".date('Y-m-d H:i:s')."' WHERE USERNAME='".$objItem['USERNAME']."'";
	$obj['RESULT2']=DAOExecuteSQL($obj['SQL2']);
    
	$obj['SQL']="SELECT * from tbl_user WHERE STATUS='1'";
	$obj['SQL'].=" AND USERNAME='".$objItem['USERNAME']."' AND PASSWD='".$objItem['PASSWD']."'";
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;
}


function getYear(){
	$objResult=null;
    
	$strSQL="SELECT * FROM m_tahun ";
	
    $objResult=DAOQuerySQL($strSQL);
	return $objResult;
    //return $strSQL;
	
}

function getMonth($objItem){
	$objResult=null;
    
	$strSQL="SELECT * FROM m_bulan where NOT(ISNULL(BULAN))";
	
	if(isset($objItem['BULAN'])&& $objItem['BULAN']!='')
     	$strSQL.=" AND BULAN='".$objItem['BULAN']."'";
	
    $objResult=DAOQuerySQL($strSQL);
	return $objResult;
    //return $strSQL;
	
}

function upTinyUrl($objItem){
	$obj=null;
    	
	$obj['SQL']="UPDATE tbl_article set TINYURL='".$objItem['TINYURL']."' WHERE ID='".$objItem['ID']."'";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}




function getNewsURLMotorina($objItem){
        // ARTIKEL/ID/TITLE/

        $search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","","");

        $seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));
        $result='http://www.motorinanews.id/artikel/'.$objItem['ID'].'/'.$seo.'/';
        return $result;
}

function getAccount($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_user WHERE 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
	
}


function saveAccount($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_user
				(FULLNAME,
				EMAIL,
				PASSWD,
				ROLE,
				STATUS)
				VALUES
				('".$objItem['FULLNAME']."',
				'".$objItem['EMAIL']."',
				MD5('".$objItem['PASSWD']."'),
				'".$objItem['ROLE']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_user set 
				FULLNAME='".$objItem['FULLNAME']."',
				EMAIL='".$objItem['EMAIL']."',";
			
		if(strlen($objItem['PASSWD'])>0){
		$obj['SQL'].="PASSWD=MD5('".$objItem['PASSWD']."'),";
		}
				
		$obj['SQL'].="ROLE='".$objItem['ROLE']."',
				STATUS='".$objItem['STATUS']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getPhotographer($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photographer WHERE STATUS=1";
    
    if(isset($objItem['EMAIL'])&& $objItem['EMAIL']!='')
        $obj['SQL'].=" AND EMAIL='".$objItem['EMAIL']."'";
				
	$obj['SQL'].=" ORDER BY NAME ASC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function savePhotographer($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_photographer
				(EMAIL,
				NAME,
				REMARK,
				STATUS)
				VALUES
				('".$objItem['EMAIL']."',				
				'".$objItem['NAME']."',
				'".$objItem['REMARK']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_photographer set 
				EMAIL='".$objItem['EMAIL']."',
				NAME='".$objItem['NAME']."',
				REMARK='".$objItem['REMARK']."',
				STATUS='".$objItem['STATUS']."'
				where EMAIL='".$objItem['EMAIL_TMP']."'";		
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getCategory($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_category WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" ORDER BY ID ASC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function saveMenu($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_menu
				(TITLE,
				URL,
				TYPE,
				STATUS,
				POS,
				ORDNUM,SYNC1,SYNC2,SYNC3)
				VALUES
				('".$objItem['TITLE']."',				
				'".$objItem['URL']."',
				'".$objItem['TYPE']."',
				'".$objItem['STATUS']."',
				'".$objItem['POS']."',				
				'".$objItem['ORDNUM']."',0,0,0)";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_menu set 
				TITLE='".$objItem['TITLE']."',											
				URL='".$objItem['URL']."',				
				TYPE='".$objItem['TYPE']."',				
				STATUS='".$objItem['STATUS']."',				
				POS='".$objItem['POS']."',										
				ORDNUM='".$objItem['ORDNUM']."',
				SYNC1=0,
				SYNC2=0,
				SYNC3=0
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getSubMenu($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_submenu WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['MENU_ID'])&& $objItem['MENU_ID']!='')
        $obj['SQL'].=" AND MENU_ID='".$objItem['MENU_ID']."'";
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" ORDER BY ORDNUM ASC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function saveSubMenu($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_submenu
				(TITLE,				
				MENU_ID,
				URL,
				TYPE,
				STATUS,
				ORDNUM)
				VALUES
				('".$objItem['TITLE']."',				
				'".$objItem['MENU_ID']."',
				'".$objItem['URL']."',
				'".$objItem['TYPE']."',
				'".$objItem['STATUS']."',
				'".$objItem['ORDNUM']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_submenu set 
				TITLE='".$objItem['TITLE']."',											
				MENU_ID='".$objItem['MENU_ID']."',				
				URL='".$objItem['URL']."',				
				TYPE='".$objItem['TYPE']."',				
				STATUS='".$objItem['STATUS']."',				
				ORDNUM='".$objItem['ORDNUM']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}



function getStatic($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_static where 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";		
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}




function getDistConfig($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT DISTINCT(CATEGORY) as CATEGORY FROM tbl_config order by CATEGORY ASC";	
				
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;  
	
}


function getConfig($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_config WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
        $obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" ORDER BY ORDNUM ASC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function saveConfig($objItem){
	$obj=null;
    $obj['SQL']="";
	$obj['SQL']="UPDATE tbl_config set CVALUE='".$objItem['CVALUE']."'	WHERE CATEGORY='".$objItem['CATEGORY']."' and CKEY='".$objItem['CKEY']."'";
				
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}




function getBanners($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_banners where 1=1 ";

    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
		
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
        $obj['SQL'].=" AND TITLE='".$objItem['TITLE']."'";
		
	if(isset($objItem['POS'])&& $objItem['POS']!='')
        $obj['SQL'].=" AND POS='".$objItem['POS']."'";		
	
	if(isset($objItem['SITE'])&& $objItem['SITE']!='')
        $obj['SQL'].=" AND SITE='".$objItem['SITE']."'";

	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" order by id desc";		
	
	if(isset($objItem['end'])&& $objItem['end']!=''){
		$obj['SQL'].=" LIMIT ".$objItem['start'].",".$objItem['end']."";
	}else{
		$obj['SQL'].=" LIMIT 1";
	}
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function saveBanners($objItem){
	$obj=null;
    $obj['SQL']="";
	if (strtolower($objItem['act'])=="add"){
        $obj['SQL']="insert into tbl_banners
				(TITLE,
				TYPE,
				POS,
				FILENAME,
				URL,
				SITE,
				START_DATE,
				END_DATE,
				STATUS,SYNC1,SYNC2,SYNC3)
				VALUES
				('".$objItem['TITLE']."',
				'".$objItem['TYPE']."',
				'".$objItem['POS']."',
				'".$objItem['FILENAME']."',
				'".$objItem['URL']."',
				'".$objItem['SITE']."',
				'".$objItem['START_DATE']."',
				'".$objItem['END_DATE']."',
				'".$objItem['STATUS']."',0,0,0)";
	}else if(strtolower($objItem['act'])=="edit"){
		$obj['SQL']="UPDATE tbl_banners set 
				TITLE='".$objItem['TITLE']."',
				TYPE='".$objItem['TYPE']."',
				POS='".$objItem['POS']."',
				FILENAME='".$objItem['FILENAME']."',
				URL='".$objItem['URL']."',
				SITE='".$objItem['SITE']."',
				START_DATE='".$objItem['START_DATE']."',
				END_DATE='".$objItem['END_DATE']."',
				STATUS='".$objItem['STATUS']."',
				SYNC1=0,
				SYNC2=0,
				SYNC3=0
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function countPhotos($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as TOTAL from tbl_photos where 1=1";

    if(isset($objItem['photo_group_id'])&& $objItem['photo_group_id']!='')
        $obj['SQL'].=" AND photo_group_id='".$objItem['photo_group_id']."'";

	if(isset($objItem['tags'])&& $objItem['tags']!='')
        $obj['SQL'].=" AND tags like '%".$objItem['tags']."%'";	
		
	if(isset($objItem['description'])&& $objItem['description']!='')
        $obj['SQL'].=" AND description like '%".$objItem['description']."%'";	
				
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}



function getPhotos($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photos WHERE STATUS=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	 
	if(isset($objItem['NAME'])&& $objItem['NAME']!='')
        $obj['SQL'].=" AND NAME='".$objItem['NAME']."'";		
		
	if(isset($objItem['DESCRIPTION'])&& $objItem['DESCRIPTION']!='')
        $obj['SQL'].=" AND DESCRIPTION like '%".$objItem['DESCRIPTION']."%'";		
		

	$obj['SQL'].=" ORDER BY ID DESC";
	
	if(isset($objItem['END'])&& $objItem['END']!=''){
        $obj['SQL'].=" limit {$objItem['FIRST']},{$objItem['END']} ";
	}else{
		$obj['SQL'].=" limit 1";
	}		
						  
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function deletePhotos($objItem=null){
	$obj=null;
    
	$obj['SQL']="update tbl_photos set status=0 WHERE id={$objItem['ID']}";
    
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function savePhotos($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="add"){
        $obj['SQL']="insert into tbl_photos
				(NAME,
				PHOTO_TYPE,
				PHOTO_MIME,
				DESCRIPTION,				
				ADDRESS_URL,
				CREATE_TIME,
				STATUS,SYNC1,SYNC2,SYNC3)
				VALUES
				('".$objItem['NAME']."',				
				'".$objItem['PHOTO_TYPE']."',
				'".$objItem['PHOTO_MIME']."',
				'".$objItem['DESCRIPTION']."',				
				'".$objItem['ADDRESS_URL']."',
				'".date('Y-m-d H:i:s')."',
				1,0,0,0)";
	}else if($objItem['ACT']=="edit"){
		$obj['SQL']="UPDATE tbl_photos set 				
				DESCRIPTION='".$objItem['DESCRIPTION']."',SYNC1=0,SYNC2=0,SYNC3=0 WHERE id='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	$obj['ID']=mysql_insert_id();
	return $obj;    
}

function getFocus($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_focus where 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
     	$obj['SQL'].=" AND TITLE like '%".$objItem['TITLE']."%'";		
	
	
	$obj['SQL'].=" ORDER BY ID DESC";
	
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}


function getFocusNews($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_focus_article where 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['FOCUS_ID'])&& $objItem['FOCUS_ID']!='')
     	$obj['SQL'].=" AND FOCUS_ID='".$objItem['FOCUS_ID']."'";		
		
	$obj['SQL'].=" ORDER BY ID DESC";
	
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}


function countFocus($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as TOTAL FROM tbl_focus WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function saveFocus($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_focus
				(TITLE,
				STATUS)
				VALUES
				('".$objItem['TITLE']."',				
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_focus set 
				TITLE='".$objItem['TITLE']."',				
				STATUS='".$objItem['STATUS']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}




function saveFocusArticle($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_focus_article
				(FOCUS_ID,
				ARTICLE_ID)
				VALUES
				('".$objItem['FOCUS_ID']."',				
				'".$objItem['ARTICLE_ID']."')";
	}else if($objItem['ACT']=="DELETE"){
		$obj['SQL']="delete from tbl_focus_article WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getFocusURL($id,$Judul){
	// ARTIKEL/ID/TITLE/
	
	$search = array("quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","-","-","","","","","","","","","","","","","","","-","",""); 	
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $Judul)));		
	$result=ROOT_URL.'/fokus/'.$id.'/'.$seo.'/';
	return $result;
}

function saveStatic($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_static
				(TITLE
				CONTENT,SYNC1,SYNC2,SYNC3)
				VALUES
				('".$objItem['TITLE']."',				
				'".$objItem['CONTENT']."',0,0,0)";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_static set 
				TITLE='".$objItem['TITLE']."',				
				CONTENT='".$objItem['CONTENT']."',
				SYNC1=0,
				SYNC2=0,
				SYNC3=0
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getWriter($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_writer where 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['EMAIL'])&& $objItem['EMAIL']!='')
     	$obj['SQL'].=" AND EMAIL='".$objItem['EMAIL']."'";
		
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
     	$obj['SQL'].=" AND STATUS>='".$objItem['STATUS']."'";	
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}


function saveWriter($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_writer
				(FULLNAME,
				EMAIL,
				BIOGRAFI,
				IMAGE,
				STATUS)
				VALUES
				('".$objItem['FULLNAME']."',
				'".$objItem['EMAIL']."',
				'".$objItem['BIOGRAFI']."',
				'".$objItem['IMAGE']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_writer set 
				FULLNAME='".$objItem['FULLNAME']."',
				EMAIL='".$objItem['EMAIL']."',
				BIOGRAFI='".$objItem['BIOGRAFI']."',
				IMAGE='".$objItem['IMAGE']."',
				STATUS='".$objItem['STATUS']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}



function getBreak($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_sekilasinfo WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
		
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";
		
	$obj['SQL'].=" ORDER BY PUBLISH_TIMESTAMP DESC";

	if(isset($objItem['END'])&& $objItem['END']!='')
        $obj['SQL'].=" LIMIT ".$objItem['START'].", ".$objItem['END']."";
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function countBreak($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as TOTAL FROM tbl_sekilasinfo WHERE 1=1";
         
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";			
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}




function getContent($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_content where 1=1 ";	
    
    if(isset($objItem['NO'])&& $objItem['NO']!='')
        $obj['SQL'].=" AND NO='".$objItem['NO']."'";
	
	if(isset($objItem['FILENAME'])&& $objItem['FILENAME']!='')
        $obj['SQL'].=" AND FILENAME='".$objItem['FILENAME']."'";
		
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
        $obj['SQL'].=" AND TITLE like '%".$objItem['TITLE']."%'";		
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
        $obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";	
	
	if(isset($objItem['NCATEGORY'])&& $objItem['NCATEGORY']!='')
        $obj['SQL'].=" AND CATEGORY<>'".$objItem['NCATEGORY']."'";	
	
	if(isset($objItem['KEYWORD'])&& $objItem['KEYWORD']!='')
		$obj['SQL'].=" AND (TITLE like '%".$objItem['KEYWORD']."%' or DESCRIPTION like '%".$objItem['KEYWORD']."%' or KEYWORD like '%".$objItem['KEYWORD']."%')";
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";
	
	if(isset($objItem['AUTHOR'])&& $objItem['AUTHOR']!='')
        $obj['SQL'].=" AND AUTHOR='".$objItem['AUTHOR']."'";
	
	if(isset($objItem['CTYPE'])&& $objItem['CTYPE']!='')
        $obj['SQL'].=" AND CTYPE='".$objItem['CTYPE']."'";
		
	
	if(isset($objItem['PUBLISH_DATE'])&& $objItem['PUBLISH_DATE']!='')
        $obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)='".$objItem['PUBLISH_DATE']."'";
					
	$obj['SQL'].=" ORDER BY ADD_TIMESTAMP DESC";

	if(isset($objItem['LIMIT'])&& $objItem['LIMIT']!=''){
        $obj['SQL'].=" LIMIT {$objItem['LIMIT']}";
	}else{
		$obj['SQL'].=" LIMIT 1";
	}
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}



function getNewsURL($objItem){
	// ARTIKEL/ID/TITLE/
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=ROOT_URL.'/artikel/'.$objItem['ID'].'/'.strtolower($seo).'/';
	return $result;
}

function getNewsURLMobile($objItem){
	// ARTIKEL/ID/TITLE/	
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=MROOT_URL.'/artikel/'.$objItem['ID'].'/'.strtolower($seo).'/';
	return $result;
}


function getPhoto($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photo WHERE STATUS=0";
        
	if(isset($objItem['SEARCH'])&& $objItem['SEARCH']!='')
        $obj['SQL'].=" AND DESCRIPTION like '%".$objItem['SEARCH']."%' OR KEYWORD like '%".$objItem['SEARCH']."%'";	
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	$obj['SQL'].=" ORDER BY UPDATE_TIMESTAMP DESC";
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function countContent($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as TOTAL FROM tbl_content WHERE 1=1";
		
	if(isset($objItem['KEYWORD'])&& $objItem['KEYWORD']!='')
		$obj['SQL'].=" AND (TITLE like '%".$objItem['KEYWORD']."%' or DESCRIPTION like '%".$objItem['KEYWORD']."%' or KEYWORD like '%".$objItem['KEYWORD']."%')";
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";
	
	if(isset($objItem['AUTHOR'])&& $objItem['AUTHOR']!='')
        $obj['SQL'].=" AND AUTHOR='".$objItem['AUTHOR']."'";
	
	if(isset($objItem['CTYPE'])&& $objItem['CTYPE']!='')
        $obj['SQL'].=" AND CTYPE='".$objItem['CTYPE']."'";
		
	
	if(isset($objItem['PUBLISH_DATE'])&& $objItem['PUBLISH_DATE']!='')
        $obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)='".$objItem['PUBLISH_DATE']."'";
		
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function saveContent($objItem){
	$obj=null;
    $obj['SQL']="";
	
	//CHECK IF COMPLETE
	if (($objItem['TITLE']!='') && ($objItem['CATEGORY']!='') && ($objItem['AUTHOR']!='') && ($objItem['DESCRIPTION']!='') && ($objItem['KEYWORD']!='')) {
		$objItem['STATUS']=1;
	}else{
		$objItem['STATUS']=0;
	}
	
	$objItem['CTYPE']=$objItem['CATEGORY'];
	
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_content
				(FILENAME,
				TITLE,
				DESCRIPTION,
				CTYPE,
				KEYWORD,				
				EXTENSION,
				FOLDER,
				CATEGORY,
				AUTHOR,
				ADD_TIMESTAMP,
				ADD_BY,				
				STATUS)
				VALUES
				('".$objItem['FILENAME']."',
				'".$objItem['TITLE']."',
				'".$objItem['DESCRIPTION']."',
				'".$objItem['CTYPE']."',
				'".$objItem['KEYWORD']."',
				'".$objItem['EXTENSION']."',
				'".$objItem['FOLDER']."',
				'".$objItem['CATEGORY']."',
				'".$objItem['AUTHOR']."',
				'".date('Y-m-d H:i:s')."',
				'".$objItem['ADD_BY']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_content set 							
				CTYPE='".$objItem['CTYPE']."',				
				AUTHOR='".$objItem['AUTHOR']."',				
				CATEGORY='".$objItem['CATEGORY']."',				
				DESCRIPTION='".$objItem['DESCRIPTION']."',				
				KEYWORD='".$objItem['KEYWORD']."',				
				STATUS='".$objItem['STATUS']."',				
				TITLE='".$objItem['TITLE']."',
				DL_URL='".$objItem['DL_URL']."'
				WHERE NO='".$objItem['NO']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function countNews($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT count(1) as TOTAL FROM tbl_article WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
        $obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";	
		
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
        $obj['SQL'].=" AND TITLE like '%".$objItem['TITLE']."%'";		
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";
		
	if(isset($objItem['STATUS_UC'])&& $objItem['STATUS_UC']!='')
        $obj['SQL'].=" AND STATUS_UC='".$objItem['STATUS_UC']."'";	
					
	$obj['SQL'].=" ORDER BY PUBLISH_TIMESTAMP DESC";
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}



function saveNews($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_article
				(CATEGORY,
				SUBCATEGORY,
				TITLE,
				UPPERDECK,
				TAICING,
				CONTENT,
				REPORTER,
				REDAKTUR,
				IMAGE,				
				CAPTION,
				VIDEO,
				TIPE,
				EDITORPICK,
				STATUS,								
				PUBLISH_TIMESTAMP,
				KEYWORD,SYNC1,SYNC2,SYNC3)
				VALUES
				('".$objItem['CATEGORY']."',
				'".$objItem['SUBCATEGORY']."',
				'".$objItem['TITLE']."',
				'".$objItem['UPPERDECK']."',
				'".$objItem['TAICING']."',
				'".$objItem['CONTENT']."',
				'".$objItem['REPORTER']."',
				'".$objItem['REDAKTUR']."',
				'".$objItem['IMAGE']."',				
				'".$objItem['CAPTION']."',
				'".$objItem['VIDEO']."',
				'".$objItem['TIPE']."',
				'".$objItem['EDITORPICK']."',
				'".$objItem['STATUS']."',				
				'".$objItem['PUBLISH_TIMESTAMP']."',
				'".$objItem['KEYWORD']."',0,0,0)";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_article set 
				CATEGORY='".$objItem['CATEGORY']."',
				SUBCATEGORY='".$objItem['SUBCATEGORY']."',
				TITLE='".$objItem['TITLE']."',
				UPPERDECK='".$objItem['UPPERDECK']."',
				TAICING='".$objItem['TAICING']."',
				CONTENT='".$objItem['CONTENT']."',
				REPORTER='".$objItem['REPORTER']."',
				REDAKTUR='".$objItem['REDAKTUR']."',
				IMAGE='".$objItem['IMAGE']."',				
				CAPTION='".$objItem['CAPTION']."',
				VIDEO='".$objItem['VIDEO']."',
				TIPE='".$objItem['TIPE']."',
				EDITORPICK='".$objItem['EDITORPICK']."',
				STATUS='".$objItem['STATUS']."',				
				PUBLISH_TIMESTAMP='".$objItem['PUBLISH_TIMESTAMP']."',
				KEYWORD='".$objItem['KEYWORD']."',SYNC1=0,SYNC2=0,SYNC3=0
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function saveCategory($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_category
				(CATEGORY_NAME,
				SEO,
				STATUS)
				VALUES
				('".$objItem['CATEGORY_NAME']."',				
				'".$objItem['SEO']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_category set 
				CATEGORY_NAME='".$objItem['CATEGORY_NAME']."',				
				SEO='".$objItem['SEO']."',				
				STATUS='".$objItem['STATUS']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getSubCategory($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_subcategory WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['CATEGORY_ID'])&& $objItem['CATEGORY_ID']!='')
        $obj['SQL'].=" AND CATEGORY_ID='".$objItem['CATEGORY_ID']."'";	
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function saveSubCategory($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_subcategory
				(CATEGORY_ID,
				SUBCATEGORY_NAME,
				STATUS)
				VALUES
				('".$objItem['CATEGORY_ID']."',				
				'".$objItem['SUBCATEGORY_NAME']."',
				'".$objItem['STATUS']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_subcategory set 
				CATEGORY_ID='".$objItem['CATEGORY_ID']."',				
				SUBCATEGORY_NAME='".$objItem['SUBCATEGORY_NAME']."',
				STATUS='".$objItem['STATUS']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


//------------------------------UTIL-------------------------------------------------
function tanggal($tanggal,$ftanggal)
{
$tgl=substr($tanggal,8,2);
$bulan=substr($tanggal,5,2);
$tahun=substr($tanggal,0,4);
$waktu=substr($tanggal,10,8);

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
switch ($bulan) {
case 1: $bulan="Januari";
break;
case 2: $bulan="Februari";
break;
case 3: $bulan="Maret";
break;
case 4: $bulan="April";
break;
case 5: $bulan="Mei";
break;
case 6: $bulan="Juni";
break;
case 7: $bulan="Juli";
break;
case 8: $bulan="Agustus";
break;
case 9: $bulan="September";
break;
case 10: $bulan="Oktober";
break;
case 11: $bulan="November";
break;
case 12: $bulan="Desember";
break;
}

	if ($ftanggal=="tipe1"){
		echo "$tgl $bulan $tahun";
	}else if($ftanggal=="tipe2"){
		echo "$hari, $tgl $bulan $tahun";    
	}else if($ftanggal=="tipe3"){
		echo "$hari, $tgl $bulan $tahun , $waktu";
	}
}



function getImage($objItem){
$image=null;

if($objItem['IMAGE_FOLDER']==NULL){
	$oldfile=CMS_PATH."/files/archieve".$objItem['IMAGE'];
        if (file_exists($oldfile)) {
                $image=PHOTO_URL."/files/archieve".$objItem['IMAGE'];
        }else{
                $image=PHOTO_URL."/files/archieve2".$objItem['IMAGE'];
        }
}else{

	$filename = CMS_PATH.'/files/'.$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
	if (file_exists($filename)) {
		$image=PHOTO_URL."/files/".$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
	} else {
		$image=PHOTO_URL."/files/default/noimage.png";
	}	
}
return $image;
}

function getAddImage($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_add_image WHERE STATUS=1";
    
    if(isset($objItem['POST_ID'])&& $objItem['POST_ID']!='')
        $obj['SQL'].=" AND POST_ID='".$objItem['POST_ID']."'";	
				
	$obj['SQL'].=" ORDER BY SEQNUMBER";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function saveAddImage($objItem){
	$obj=null;
    $obj['SQL']="";
	if ($objItem['ACT']=="ADD"){
        $obj['SQL']="insert into tbl_add_image
				(POST_ID,
				IMAGE,
				CAPTION,
				SEQNUMBER,
				CATEGORY)
				VALUES
				('".$objItem['POST_ID']."',
				'".$objItem['IMAGE']."',
				'".$objItem['CAPTION']."',
				'".$objItem['SEQNUMBER']."',
				'".$objItem['CATEGORY']."')";
	}else if($objItem['ACT']=="EDIT"){
		$obj['SQL']="UPDATE tbl_add_image set 
				POST_ID='".$objItem['POST_ID']."',
				IMAGE='".$objItem['IMAGE']."',
				SEQNUMBER='".$objItem['SEQNUMBER']."',
				CAPTION='".$objItem['CAPTION']."',
				CATEGORY='".$objItem['CATEGORY']."'
				WHERE ID='".$objItem['ID']."'";
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function deleteAddImage($objItem){
	$obj=null;
    
	$obj['SQL']="update tbl_add_image set STATUS=0 WHERE ID='".$objItem['IMG_ID']."'";
       
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function deleteAttachment($objItem){
	$obj=null;
    
	$obj['SQL']="delete from tbl_attachment WHERE CONTENT_ID='".$objItem['CONTENT_ID']."'";
       
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getImageFile($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photos WHERE 1=1";
    
    if(isset($objItem['NAME'])&& $objItem['NAME']!='')
        $obj['SQL'].=" AND NAME='".$objItem['NAME']."'";	
	
	if(isset($objItem['SSEARCH'])&& $objItem['SSEARCH']!='')
        $obj['SQL'].=" AND DESCRIPTION like '%".$objItem['SSEARCH']."%'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";		

	if(isset($objItem['LIMIT'])&& $objItem['LIMIT']!=''){
		$obj['SQL'].=" LIMIT ".$objItem['LIMIT'];
	}else{
		$obj['SQL'].=" LIMIT 1";
	}	
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function create_thumbnail_preserve_ratio($source, $destination, $thumbWidth)
{
    //$extension = get_image_extension($source);
	$extension = strtolower(pathinfo($source, PATHINFO_EXTENSION));
    $size = getimagesize($source);
    $imageWidth  = $size[0];
    $imageHeight = $size[1];
	$newWidth  = 250; //initial width
	$newheight = 170; //initial height	
	
	
	
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

function selisihWaktu($waktu){
$waktulalu;
$twaktu=explode(":",$waktu);
if (($twaktu[0]>0) and ($twaktu[0]<=24)) {    	
	$waktulalu=intval($twaktu[0])." jam ".intval($twaktu[1])." menit yang lalu";		
}else if ($twaktu[0]<1){
	$waktulalu=intval($twaktu[1])." menit yang lalu";		
}else{
	$waktulalu=floor($twaktu[0]/24)." hari ".($twaktu[0]%24)." jam yang lalu";
}

return $waktulalu;
} 

function doLog($text)
{
  // open log file
  $filename = "sentmail.log";
  $fh = fopen($filename, "a") or die("Could not open log file.");
  fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("Could not write file!");
  fclose($fh);
}

//REKAP
function getRekapByCategory($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT CATEGORY,COUNT(1) AS TOTAL FROM tbl_content where date(PUBLISH_TIMESTAMP) between '".$objItem['START_DATE']."' AND '".$objItem['END_DATE']."' AND CATEGORY NOT IN ('profilkita','banner','sekilasinfo','statis','pengumuman','kebijakan','galfoto','galvideo','galaudio','galmediacetak')GROUP BY CATEGORY";
    
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function getRekapByKabupaten($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT ID_PROPINSI,ID_KABUPATEN,COUNT(1) AS TOTAL FROM tbl_content where date(PUBLISH_TIMESTAMP) between '".$objItem['START_DATE']."' AND '".$objItem['END_DATE']."' AND ID_PROPINSI > 0 and ID_KABUPATEN > 0 GROUP BY ID_PROPINSI,ID_KABUPATEN";
    
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function getRekapPenyuluhan($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT ID_USER,COUNT(1) AS TOTAL FROM tbl_content where date(PUBLISH_TIMESTAMP) between '".$objItem['START_DATE']."' AND '".$objItem['END_DATE']."' AND CATEGORY='materipenyuluhan' GROUP BY ID_USER";
    
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function cleanParam($var){   
    $result=null;
	$search = array("select","insert","update","union","delete",'concat','outfile');  
    $replace = array("","","","","","",""); 
					 
	$result=str_ireplace("\\","",(str_ireplace($search, $replace, strtolower($var))));			
	$result=strip_tags($result);	
	return $result;
}
?>
