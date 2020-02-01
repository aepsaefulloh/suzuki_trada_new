<?php
function DAOgetConnection()    
{
    $objReturn=null;
    if ($objConn=mysql_connect(DB_HOST,DB_UID,DB_PWD))
    {
        if (mysql_select_db(DB_DATABASE,$objConn)==true){
            $objReturn=$objConn;
        }
    }    
    return $objReturn;
}

function DAOExecuteSQL($strSQL)
{
    $bReturn=false;
    $objConn=DAOgetConnection();
    if (is_null($objConn)==false)
    {
      $bReturn=mysql_query($strSQL,$objConn);  
    }
    
    return $bReturn;
}

function DAOQuerySQL($strSQL)
{
    $objReturn=null;
    $objResult=null;
    $objConn=DAOgetConnection();
    if (is_null($objConn)==false)
    {
        if($objResult=mysql_query($strSQL,$objConn))
        {
            if(mysql_num_rows($objResult)>0)
            {
                $objRow=mysql_fetch_assoc($objResult);
                $objReturn=array($objRow);
                while ($objRow=mysql_fetch_assoc($objResult))
                {
                    array_push($objReturn,$objRow);
                }
            }
        }
        mysql_close($objConn);
    }
    return $objReturn;   
}
?>
