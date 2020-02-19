<?php
function getParam($str){
		return isset($_REQUEST[$str]) ? $_REQUEST[$str] : '';	
	}
?>