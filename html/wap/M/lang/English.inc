<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/wap/system/base.php';
$appb = $con->query("SELECT * FROM `package` WHERE `id` = '".$id."' and `system` = 'app'")->fetch_assoc();
$str=$appb['format'];
$str=str_replace('.','',$str);
$titleapp = "".$appb["name"]." ".$appb["platform"]." app free download ";
$nameapp = "".$appb["name"]." ".$appb["platform"]." app free download";
$descriptionapp = "Free download of ".$appb["name"]." app for ".$appb["platform"].". Easily download this ".$appb["name"]." ".$str." fast.";
$keywordsapp = "".$appb["name"]." ".$str."download ".$appb["name"]." for free,free download ".$appb["name"]." ".$str.",download direct link ".$appb["name"].",download ".$appb["name"]." for free";
$gameb = $con->query("SELECT * FROM `package` WHERE `id` = '".$id."' and `system` = 'game'")->fetch_assoc();
$str=$gameb['format'];
$str=str_replace('.','',$str);
$titlegame = "".$gameb["name"]." ".$gameb["platform"]." game free download ";
$namegame = "".$gameb["name"]." ".$appb["platform"]." app free download";
$descriptiongame = "Free download of ".$gameb["name"]." game for ".$gameb["platform"].". Easily download this ".$gameb["name"]." ".$str." fast.";
$keywordsgame = "".$gameb["name"]." ".$str."download ".$gameb["name"]." for free,free download ".$gameb["name"]." ".$str.",download direct link ".$gameb["name"].",download ".$gameb["name"]." for free";
$titleapps = "mobile apps ";
$descriptionapps = "Free download of latest and best free mobile apps like java jar apps and symbian sis or sisx formats for phones running the symbian os. Biggest collection of free apps for smartphones.";
$keywordsapps ="java apps,jar apps,symbian apps,sis apps,s60 applications,free download mobile apps,download sisx apps";
$titlejavaapps = "java apps | jar apps | j2me apps ";
$descriptionjavaapps = "Latest best java apps for free download. These apps are supported on devices running java based operating system and supporting j2me apps jar apps jad apps. Free download thousands of java apps with direct links.";
$keywordsjavaapps = "download java apps,free java apps,free download jar apps,j2me apps free download,free download mobile java apps";

//header
$titlemain = "Mobky: mobile games | themes | apps";
$descriptionmain = "Download free games, apps, themes for your mobile devices from mobky largest collection without registration or any waiting time. Direct download link.";
$keywordsmain = "Download Free Mobile Games, Download Free Nokia Themes, Download Nth Theme, Download Mobile App, Download Java Games, S60 Free Games, S60 Free Themes, S60 Free Apps";
$javaapps = "Java Apps";
$symbianapps = "Symbian Apps";
$mrpapps = "Mrp Apps";
$commentsname = "comments";
$view = "View ";
$software = "Apps";
$game = "Games";
$menu1 = "Set model";
$menu2 = "bookmark";
$searchname = "Search";
$loginname = "login";
$loginemail = "E-mail";
$logincode = "password";
$submitname = "submit";
$logintext = "请先用智能机或电脑访问mobky.com进入个人页面获取您的登录码。";
$pagess = "Page ";
$pagess1 = "";
$next = "Next";
$Previous = "Previous";
$typess = "type";
$sizesss = "size";
$Manufacturers = "Manufacturers";
$systems = "system";
$languagess = "lang";
$versions = "version";
$downloadss = "Download";
$resolutios = "resolution";
$stand = "Stand-alone connection";
$Brief = "Brief introduction";
$downloadpackage = "Download ";
$more = "more";
$uploaded = " uploaded";
$Recent = "Recently logged in";
$enroll = "Registration time";
$uploadss = "upload";
$logout = "Log out of the login";
$info1 = "Responsible for the statement";
$info2 = "联系我们";
$info3 = "Donation website";
$info4 = "frequently asked questions";
$lang1 = "?lang=en";
$lang2 = "&lang=en";
$htmllang = '<html lang="en">';