<?PHP
	/*
	@ include of logger manager plugin
	*/	
	require("log4php/LoggerManager.php");

	
	/*
	@ logger class
	@ defined each logger type
	*/	
	class AppLogger {
	    var $objLogger;

		function AppLogger($strName) {
			$this->objLogger = LoggerManager::getLogger($strName);
		}
	
		function info($strLog) {
			$this->objLogger->info($strLog, $this);
		}
		
		function debug($strLog) {
			$this->objLogger->debug($strLog, $this);
		}

		function warn($strLog) {
			$this->objLogger->warn($strLog, $this);
		}

		function error($strLog) {
			$this->objLogger->error($strLog, $this);
		}
		
		// kerjin 
		// 4-3-2009
		function dumpArray($arrData, $strLogLevel = "info") {
			$strLog = "";

			foreach ($arrData as $strKey => $strValue) {
				if (strlen($strLog) > 0) {
					$strLog .= ", ";
				}
				$strLog .= "$strKey: $strValue";
			}

			if (strcmp($strLogLevel, "error") == 0) {
				$this->error($strLog);
			} else if (strcmp($strLogLevel, "warn") == 0) {
				$this->warn($strLog);
			} else if (strcmp($strLogLevel, "debug") == 0) {
				$this->debug($strLog);
			} else {
				$this->info($strLog);
			}
		}
		
	}
	
	/*
	@ initial logger
	@ for the use of functions logging
	@ no value has returned
	*/		
	function setLogger($filename,$strTitle,$strLog,$logger) {
	
	  $objLogger = new AppLogger($filename);
	  if($logger == LOG4PHP_INFO)  $objLogger->info ("*** ".$strTitle.": ".$strLog);
	  if($logger == LOG4PHP_WARN)  $objLogger->warn ("*** ".$strTitle.": ".$strLog);
	  if($logger == LOG4PHP_DEBUG) $objLogger->debug("*** ".$strTitle.": ".$strLog);
	  if($logger == LOG4PHP_ERROR) $objLogger->error("*** ".$strTitle.": ".$strLog);
	 
	}	
?>