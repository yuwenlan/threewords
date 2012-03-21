<?php

return array(

    'db' => array(
       'class' => array('Database', array('mysql', 'localhost', 'root', 'good123', 'threewords')),
	   'initialization' => array(
    	   'SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary',
    	   "SET sql_mode=''"
		  )
    ),

    'smarty' => array(
       'class' => 'Smarty',
       'template_dir' => ROOT_PATH.'/template',
       'compile_dir' => ROOT_PATH.'/tmp/compile_dir',
       'error_reporting' => E_ALL ^ E_NOTICE
    ),

    'config' => array(
        'class' => 'ArrayObject',
        'sina' => array(
            'WB_AKEY'=>'256930401',
            'WB_SKEY'=>'516eed86fdeb61017323c0cb9ae07ec7',
            'WB_CALLBACK_URL'=>'http://127.0.0.1/threewords/callback.html?type=sina',
        ),
        // 'qq' => array(
        //     'appid'=>'100231024',
        //     'appkey'=>'9a2db5b8d4f47d90e6d5e86cbd1fcf59',
        //     'callback'=>SITE_URL.'/callback.html?type=qq',
        //     'scope'=>'get_user_info'
        // )
    ),
);

?>