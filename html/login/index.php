<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
$title = '登录';
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/header.php';
//百度登录
echo '<title>'.$title.'</title>';
session_start();
require_once 'baidu/config.php';
$getcode_url = "http://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=$api_key&redirect_uri=$redirect_url&state=baidu&display=";
//
echo '';
include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/user.php';
echo '<div id="nav" class="container"><a href="/">首页</a>';
echo '<span>'.$title.'</span></div>';
echo '<main class="container"><div id="main">';
echo '<div class="area"><ul id="login">';
echo '<li><a href="###" data-href="'.$getcode_url.'" class="iconfont icon-baidu">baidu登录</a></li><li><a href="###" data-href="https://graph.qq.com/oauth2.0/authorize?response_type=code&amp;client_id=102054372&amp;redirect_uri=https%3A%2F%2Fxmwds.com%2Flogin%2Fqq&amp;state=qq&amp;display=" class="iconfont icon-qq">QQ登录</a></li><li><a href="###" data-href="//github.com/login/oauth/authorize?client_id=c9cbb49f280cecfd3a7e&redirect_uri=https://jvzh.org/login/github" class="iconfont icon-github">github登录</a></li>';
echo '</ul><div><input type="checkbox" name="agreen" value="true" />&nbsp;同意&nbsp;<a href="/info/1.html" target="_blank">免责声明</a></div></div></main>';
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/foot.php';
?>