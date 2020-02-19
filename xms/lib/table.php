<?php
$tbl['tbl_user'] = array
  (
  array("NAME"=>"EMAIL","TYPE"=>"text","PLACEHOLDER"=>"Email","TITLE"=>"Email","FORM"=>"Y"),
  array("NAME"=>"DESC","TYPE"=>"text","PLACEHOLDER"=>"Description","TITLE"=>"Description","FORM"=>"Y"),
  array("NAME"=>"PASSWD","TYPE"=>"password","PLACEHOLDER"=>"Password","TITLE"=>"Password","FORM"=>"Y"),
  array("NAME"=>"FULLNAME","TYPE"=>"text","PLACEHOLDER"=>"Full Name","TITLE"=>"Full Name","FORM"=>"Y"),
  array("NAME"=>"ROLE","TYPE"=>"radio","PLACEHOLDER"=>"Access","TITLE"=>"Access","FORM"=>"Y",
			'OPTION' => array
			(
				array("TEXT"=>"admin","VALUE"=>"admin"),
				array("TEXT"=>"uploader","VALUE"=>"uploader"),
				array("TEXT"=>"viewer","VALUE"=>"viewer"),
			)
		),
  array("NAME"=>"PHOTO","TYPE"=>"FILE","PLACEHOLDER"=>"Photo","TITLE"=>"Photo","FORM"=>"Y"),
  array("NAME"=>"STATUS","TYPE"=>"radio","PLACEHOLDER"=>"Status","TITLE"=>"Status","FORM"=>"Y",
			'OPTION' => array
			(
				array("TEXT"=>"On","VALUE"=>"1"),
				array("TEXT"=>"off","VALUE"=>"0")				
			)
		),
  array("NAME"=>"LAST_LOGIN","TYPE"=>"text","PLACEHOLDER"=>"Last Login","TITLE"=>"Last Login","FORM"=>"N")
  );
  
  
$entity['group']=array('ACT','PK-ID','GROUP_NAME','ACCESS');
$entity['photographer']=array('ACT','PK-EMAIL','EMAIL','NAME','REMARK','PHOTO','STATUS');
$entity['category']=array('ACT','PK-ID','CATEGORY','SEO','TIPE','STATUS');
$entity['user']=array('ACT','PK-ID','EMAIL','PASSWD','CPS','FULLNAME','ID_GROUP','ID_PROPINSI','ID_KABUPATEN','ID_KECAMATAN','DESCRIPTION','STATUS','LASTLOGIN');
$entity['content']=array('ACT','PK-ID','TITLE','TAICING','CONTENT','IMAGE_FOLDER','IMAGE','VIDEO','CAPTION','CATEGORY','KEYWORD','SUBCATEGORY','JNSP','CATP','SUBP','STATUS','ID_PROPINSI','ID_KABUPATEN','ID_KABUPATEN','ID_KECAMATAN','ID_USER');
$entity['config']=array('ACT','PK-CKEY','CVALUE');
$entity['profile']=array('ACT','PK-EMAIL','EMAIL','PASSWD');  
$entity['menu']=array('ACT','PK-ID','TITLE','URL','POS','STATUS','LEVEL','PARENT_ID','ORDNUM');  
$entity['propinsi']=array('ACT','PK-ID','PROPINSI','IBUKOTA','KODEBPS','KODEISO','LUAS','POPULASI','STATUS');  
$entity['article']=array('ACT','PK-ID','TITLE','SUMMARY','CONTENT','IMAGE','KEYWORD','HIT','STATUS');  
$entity['banner']=array('ACT','PK-ID','TITLE','POS','FILENAME','URL','STATUS');  
$entity['product']=array('ACT','PK-ID','PRODUCT','CATEGORY','SUMMARY','PRICE','SPECS','BROCHURE','IMAGE','STATUS'); 
$entity['content']=array('ACT','PK-ID','TITLE','SUMMARY','CONTENT','KEYWORD','CATEGORY','HIT','CREATE_TIMESTAMP','CREATE_BY','STATUS');
$entity['contact']=array('ACT','PK-ID','FULLNAME','EMAIL','TELP','QABOUT','MESSAGE','STATUS');
$entity['jaringan']=array('ACT','PK-ID','NAMA','ADDRESS','TELP','OPENHOUR','COORDINATE','STATUS');
$entity['addimage']=array('ACT','PK-ID','PRODUCT_ID','IMAGE','CAPTION','STATUS');
$entity['testdrive']=array('ACT','PK-ID','FULLNAME','EMAIL','TELP','PROV','KAB','KEC','ADDRESS','TD_DATE','CARTYPE','STATUS');
$entity['booking']=array('ACT','PK-ID','FULLNAME','EMAIL','PHONE','ADDRESS','BTIMESTAMP','PLAT','CARTYPE','CARYEAR','DEALER','STATUS');
$entity['lead']=array('ACT','PK-ID','INDATE','FULLNAME','PHONE','CAR','LOCATION','DEALER','BUYPLAN','CAMPAIGN','NOTE','STATUS');
?>
