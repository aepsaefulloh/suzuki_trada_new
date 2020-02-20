<?php
$debug=isset($_REQUEST['debug'])?$_REQUEST['debug']:0;
if($debug>0){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}


define('DB_HOST', 'localhost');
define('DB_UID', 'user_trada');
define('DB_PWD', 'p4ssword');
define('DB_DATABASE', 'suzukitrada');
define( "ROOT_PATH", "/var/www/html/www.suzukitrada.id" );
define( "ROOT_URL", "https://www.suzukitrada.id");


define( "CACHE_URL", ROOT_URL."/cache" );

define( "CMS_PATH", ROOT_PATH."/xms" );
define( "CMS_URL", ROOT_URL."/xms" );

$qAbout = array('1'=>'Bantuan Layanan', '2'=>'Pertanyaan Umum');

$list_mobil = array (
                    '1'=>'XL7',
                    '2'=>'All New Ertiga', 
                    '3'=>'All New Ertiga Sport',
                    '4'=>'New Baleno', 
                    '5'=>'Karimun Wagon R',
                    '6'=>'Karimun Wagon R GS',
                    '7'=>'APV New Luxury',
                    '8'=>'APV Arena',
                    '9'=>'Ignis',
                    '10'=>'Ignis Sport Edition',
                    '11'=>'New SX4 S-Cross',
                    '12'=>'Jimny',
                    '13'=>'New Carry Pick-Up' 
                    );                    
?>
