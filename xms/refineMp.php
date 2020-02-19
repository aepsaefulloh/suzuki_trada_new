<?php
//REFINE ATTACHMENT
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';


$list=getRefMP();
$subcategory=$list['RESULT'][0]['SUBP'];
echo $list['SQL'];
echo '<br>SUBP :'.$list['RESULT'][0]['SUBP'];


//GET CAT
$vcat['ID']=$list['RESULT'][0]['SUBP'];
$cat=getRecord('tbl_penyuluhan',$vcat);
$category=$cat['RESULT'][0]['ID_PARENT'];
echo '<br>'.$cat['SQL'];
echo '<br> CATP : '.$category;
if($category==0){
    echo '<br>NO CATEGORY';
    $var['ACT']='EDIT';
    $var['PK-SUBP']=$subcategory;
    $var['JNSP']=$subcategory;
    $var['CATP']=0;
    $var['SUBP']=0;
    $rest=saveRecord('tbl_content',$var);
    echo '<br> SQL : '.$rest['SQL'];
}else{
    //GET JNSP
    //GET CAT
    $vjns['ID']=$category;
    $list=getRecord('tbl_penyuluhan',$vjns);
    $jns=$list['RESULT'][0]['ID_PARENT'];
    echo '<br>'.$list['SQL'];
    echo '<br> JNSP : '.$jns;
    
    $var['ACT']='EDIT';
    $var['PK-SUBP']=$subcategory;
    $var['JNSP']=$jns;
    $var['CATP']=$category;    
    $rest=saveRecord('tbl_content',$var);
    echo '<br> SQL : '.$rest['SQL'];
    
}




?>