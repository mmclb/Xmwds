<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
$title = '消息提示';
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/header.php';
aut();

setcookie('xm','', time()-86400*365, '/'); 
setcookie('pass','', time()-86400*365, '/');
setcookie('BAEID','', time()-86400*365, '/');  
header('Location: /');
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/foot.php';
?>