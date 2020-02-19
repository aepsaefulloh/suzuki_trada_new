<?php  
require_once 'SMTPClass.php';
  
		$to = "vises@jurnas.com,vicecell@yahoo.com";  
		$nameto = "vises@jurnas.com,vicecell@yahoo.com";  
		
		$mto = explode(',',$to);
		$nmto = explode(',',$nameto);
		for ($i = 0; $i < count($mto); $i++)
		{				
		$from = "noreply@jurnas.com";  
		$namefrom = "noreply@jurnas.com";  
		$subject = "Server Alert!";  
		$message = "Server ok";  
		authSendEmail($from, $namefrom, $mto[$i], $nmto[$i], $subject, $message); 	
		}
?>  
 
 