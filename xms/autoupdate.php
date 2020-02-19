<?php
require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';

//GET INCOMPLETE MATERI PENYULUHAN
$sql="SELECT ID , TITLE,JNSP,CATP,SUBP FROM tbl_content where SUBP > 10 limit 1";
$result=DAOQuerySQL($sql);
$list=$result[0];
$SUBP=$list['SUBP'];
echo $list['ID'].'-'.$list['TITLE'].' -> '.$list['JNSP'].':'.$list['CATP'].':'.$list['SUBP'];


//GET CATP
$sql="SELECT ID,ID_PARENT  FROM tbl_penyuluhan where ID = ".$list['SUBP']." limit 1";
$result=DAOQuerySQL($sql);
$list=$result[0];
$CATP=$list['ID_PARENT'];
echo '<br>CATP:'.$CATP;

//GET CATP
$sql="SELECT ID,ID_PARENT  FROM tbl_penyuluhan where ID =".$CATP." limit 1";
$result=DAOQuerySQL($sql);
$list=$result[0];
$JNSP=$list['ID_PARENT'];

echo '<br>JNSP:'.$JNSP;
//


$sql="update tbl_content set JNSP=".$JNSP.",CATP=".$JNSP." where SUBP=".$SUBP;
echo '<br>'.$sql;


?>

