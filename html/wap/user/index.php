<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/wap/system/base.php';

$id = abs(intval($_GET['id'])); # ФИЛЬТР ГЕТ
$use = $con->query("SELECT * FROM `user` WHERE `id` = '".$id."'")->fetch_assoc();
$f = $con->query("SELECT * FROM `game` WHERE `id_user` = '".$use['id']."'")->fetch_assoc();
if($name = $use['name'] ?: $use['login']){
$title = ''.$name.'';
}
include_once $_SERVER["DOCUMENT_ROOT"].'/wap/M/c/header.php';
echo '</head><body>';
//echo '<div class="header"><a href="/">';
//echo ''.$title.'</a>';
include_once $_SERVER["DOCUMENT_ROOT"] . '/wap/M/c/user.php';
//echo '<div class="wrapper">';


//$arr_pol = array('1' => '♂', '2' => '♀');
//$arr_adm = array('0' => '用户', '1' => '版主', '2' => '管理员', '3' => '<font color="red">创始人</font>');

if($use['up_time']+300 > time()){
$on_off = '在线'; 
}else{
$on_off = '离线'; 
}


if($use){
//echo '<body class="subpage"><div id="header"><a href="#back" onclick="history.back();" class="iconfont icon-fanhui"></a><h1>'.$use['name'].'</h1><div id="user">'
$file = $con->query("SELECT * FROM `game` WHERE `id_user` = '".$id."' ORDER BY `id` DESC LIMIT 5");
if($use['id']==$f['id_user']){
if($name = $use['name'] ?: $use['login']){
echo '<br><a href="/game/1?user_id='.$use['id'].'" class="right">'.$more.'</a>'.$name.''.$uploaded.'';
}
//echo '<br>';
while($u = $file->fetch_assoc()){
echo '<br><a href="/'.$u['system'].'/'.$u['id'].'">';
if($name = $u['cn'] ?: $u['name']){
echo ''.$name.'</a>';
}
$size = getFilesize($_SERVER['DOCUMENT_ROOT'].'/download/'.$u['down'].'');
$str=$u['format'];
$str=str_replace('.','',$str);
echo '('.$size.'/'.$str.')';
}
}
$dow = $con->query("SELECT * FROM `game` ORDER BY `id` DESC");
if($name = $use['name'] ?: $use['login']){
echo ''.$name.'最近在玩';
}
while($do = $dow->fetch_assoc()){
$down = $con->query("SELECT * FROM `game_download` WHERE `game_id` = '".$do['id']."' AND `user_id` = '".$id."' ORDER BY `id` DESC LIMIT 10");
while($download = $down->fetch_assoc()){

}
}
//$uw = $con->query("SELECT * FROM `file` WHERE `id_user` = "'.$id.'" ORDER BY `id` DESC");
/**
 *$ip  string  必传
 *获取ip归属地
 *demo 四川省成都市 电信
 */
function get_ip_city($ip)
{
    $ch = curl_init();
    $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $ip;
    //用curl发送接收数据
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //请求为https
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $location = curl_exec($ch);
    curl_close($ch);
    //转码
    $location = mb_convert_encoding($location, 'utf-8', 'GB2312');
    //var_dump($location);
    //截取{}中的字符串
    $location = substr($location, strlen('({') + strpos($location, '({'), (strlen($location) - strpos($location, '})')) * (-1));
    //将截取的字符串$location中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
    $location = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $location)));
    //php内置函数，将处理成类似于url参数的格式的字符串  转换成数组
    parse_str($location, $ip_location);
    return $ip_location['pro'];
}
$uw = $con->query("SELECT * FROM `game` WHERE `id_user` = '".$id."' ORDER BY `id` DESC");
$uc = $con->query("SELECT * FROM `comment` WHERE `id_user` = '".$id."' ORDER BY `id` DESC");
if($name = $use['name'] ?: $use['login']){
echo '<br>'.$name.'';
}
echo '<br>UID:'.$use['id'].' ';
$str = get_ip_city($use['ip']);
$str=str_replace('省','',$str);
echo ''.$use['admin_level'].' ';
echo 'ip:'.$str.' ';
echo ''.$on_off.'';
echo '<br>注册:'.data($use['up_time']).'';
echo '<br>更新:'.data($use['data_reg']).'';
echo '<br>上传:'.$uw->num_rows.' ';
echo '下载:'.$use['game_downs'].' ';
echo '评论:'.$uc->num_rows.'';
//echo '<li>封号大礼包：'.fh($use['fh']).'</li>';
if($user['id']==$use['id']){
echo '<br>功能';
echo '<br><a href="/games/upload" >上传</a>  ';
//echo '<li><a href="/user/edit" >修改资料</li>';
//echo '<li><a href="/user/edit/password" >修改密码</li>';
echo '<a href="/user/logout" >退出登录</a>';
}
echo '</ul></div></div>';
echo '<div class="link"><b>用户名</b> : '.$use['login'].'</div>';
echo '<div class="link"><b>昵称</b> : '.$use['name'].'</div>';
echo '<div class="link"><bs>ID</b> : '.$use['id'].'</div>';
echo '<div class="link"><b>性别</b> : '.$use['pol'].'</div>';
echo '<div class="link"><b>注册时间</b> : '.data($use['data_reg']).'</div>';
echo '<div class="link"><b>用户等级</b> : '.$use['admin_level'].'</div>';
echo '<div class="link"><b>最近登录</b> : '.data($use['up_time']).'</div>';
}else{
err('Ошибка');
}
include_once $_SERVER["DOCUMENT_ROOT"].'/wap/M/c/foot.php';
?>