<?php
# Включаем сессии
ob_start();
#session_start();

if(!is_file($_SERVER["DOCUMENT_ROOT"].'/system/base.php')) {
header('Location: /install/');
}

//echo '
//<head><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
//<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
//<meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8" />
//<meta name="viewport" content="width=device-width; initial-scale=1.">
//<link rel="stylesheet" href="/style/style.css" type="text/css"/>
//<link rel="stylesheet" href="/style/reset.css" type="text/css"/>
//<link rel="stylesheet" href="/style/iconfont.css" type="text/css"/>

include_once $_SERVER["DOCUMENT_ROOT"].'/system/system.php';





// ВРЕМЯ ГЕНЕРАЦИИ СКРИПТАЫ

$start_time = microtime();



$start_array = explode(" ",$start_time);


$start_time = $start_array[1] + $start_array[0]; 
//echo '<ion-view subpage-bar="true"></ion-view>';




if(!$title) $title = '续梦网';
if(!$title1) $title1 = ' - 续梦网';
if(!$title2) $title2 = '续梦网 - 手机游戏开发者之家，梦起飞的地方。';
//
if(!$description) $description = '';
if(!$keywords) $keywords = '';
echo '<!--?xml version="1.0"?-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd">
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/ xml:lang=xhtml""zh-CN">
<head>
<link rel="canonical" href="http://wap.rmct.cn'.$_SERVER['REQUEST_URI'].'">
<link rel="alternate" href="http://wap.rmct.cn'.$_SERVER['REQUEST_URI'].'" hreflang="zh-cn">
<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8">
<title>'.$title.'</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<style type="text/css">
            body{
                line-height:1.5;
                color:#282828;
                background-color:#fff;
            }
            a{ color:#1874cd; text-decoration:none;}
            .menu01{
                background-color:#e84218;
                border-top:1px solid #C0D9F1;
                line-height:25px;
                text-indent:0.3em;
                width:100%;
                color:#FFF;}
            .menu02{ background-color:#ef8526; color:#FFF;}
            .menu03{ background-color:#fff6ee; color:#FFF;}
            .c_white01{ color:#FFF; text-decoration:underline;}
            .c_white02{ color:#FFF; text-decoration:none;}
            a.txt01{ text-decoration:underline;}
            .info_1{ background-color:#fff;}
            .info_2{ background-color:#e8e8e8;}
            .content_1{ border-top:#d8d8d8 1px dotted;}
            .content_2{ border-top:#d8d8d8 1px dotted;}
 </style></head>';
uphold();
//if(!$user){
//echo '<a href="/auth">登录</a>|<a href="/reg">注册</a>';
//}else{
//echo '<a href="/user">用户中心</a>';
//}
//echo '</div></div></div>';

//echo '<div id="">';
//echo '<body class="">';

//echo '<div class="menu_rms">';
