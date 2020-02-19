<?php
include('lib/log4php/Logger.php');
Logger::configure('lib/log4php.xml');
$log = Logger::getLogger('myLogger');

$log->trace("My first message.");   // Not logged because TRACE < WARN
$log->debug("My second message.");  // Not logged because DEBUG < WARN
$log->info("My third message.");    // Not logged because INFO < WARN
$log->warn("My fourth message.");   // Logged because WARN >= WARN
$log->error("My fifth message.");   // Logged because ERROR >= WARN
$log->fatal("My sixth message.");
?>