<?php
require_once './Library/__init__.php';

Site::getInstance()->setComponent(require './config/config.php');

Database::$preFix = 'tw_';
session_start();
Site::getInstance()->run(new WebApplication());

?>