<?php

if(!$user){
echo '<a href="/login.html">登录</a> 畅享下载乐趣!';
}else{
echo '<a href="/user/'.$user['id'].'.html">';
if($name = $user['name'] ?: $user['login']){
echo ''.$name.'</a> 畅享下载乐趣!';
}
}
echo '<br>【当前机型:没有选择】';
//include_once $_SERVER["DOCUMENT_ROOT"] . '/wap/M/c/menu.php';
?>