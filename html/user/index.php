<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';

$id = abs(intval($_GET['id'])); # ФИЛЬТР ГЕТ

?>

<meta itemprop="name" content="<?php $title2 ?>" />

<?php
$use = $con->query("SELECT * FROM `user` WHERE `id` = '".$id."'")->fetch_assoc();
$f = $con->query("SELECT * FROM `game` WHERE `id_user` = '".$use['id']."'")->fetch_assoc();

$title = ''.$use['name'].'';
include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/header.php';
echo '<body class="subpage"><header><a href="#back" onclick="history.back();" class="iconfont icon-fanhui" title="返回"></a>';
echo '<h2>'.$title.'</h2><a href="/"><img src="/favicon.ico" width="32" height="32" alt="续梦网logo" /><h1>宝软网</h1>';
include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/user.php';
echo '<div id="nav" class="container"><a href="/">宝软网</a><span>'.$use['name'].'</span></div>';
echo '<main class="container"><div id="main">';
//$arr_pol = array('1' => '♂', '2' => '♀');
//$arr_adm = array('' => '用户', '1' => '版主', '2' => '管理员', '3' => '<font color="red">创始人</font>', '4' => '禁言');

if($use['up_time']+300 > time()){
$on_off = '在线'; 
}else{
$on_off = '离线'; 
}


if($use){
//echo '<body class="subpage"><div id="header"><a href="#back" onclick="history.back();" class="iconfont icon-fanhui"></a><h1>'.$use['name'].'</h1><div id="user">'
$file = $con->query("SELECT * FROM `game` WHERE `id_user` = '".$id."' ORDER BY `id` DESC LIMIT 10");
//if($use['id']==$f['id_user']){
if($name = $use['name'] ?: $use['id']){
echo '<h2 class="topic"><a href="/list?users_id='.$use['id'].'" class="right">更多</a>'.$name.'上传的游戏</h2>';
}
echo '<ul class="games">';
while($u = $file->fetch_assoc()){
if($name = $u['cn'] ?: $u['name']){
echo '<li><a href="/game/'.$u['id'].'"><img src="/M/i/'.$u['icon'].'" width="46" height="46" alt="'.$name.'图标" /></a><div>';
echo '<h3><a href="/game/'.$u['id'].'">'.$name.'</a></h3><div>';
}
echo '<span>'.$u['platform'].'</span><span>'.$u['id_raz'].'</span><span>'.$u['downs'].' 下载</span>';
$number = $con->query('SELECT * FROM `comment` WHERE `id_obmen` = "'.$u['id'].'"')->num_rows;
echo '<span>'.$number.' 评论</span></div></div></li>';
}
echo '</ul>';

$dow = $con->query("SELECT * FROM `game` ORDER BY `id` DESC");
if($name = $use['name'] ?: $use['id']){
echo '<h2 class="topic">'.$name.'最近下载</h2>';
}
echo '<ul class="games">';
while($do = $dow->fetch_assoc()){
$down = $con->query("SELECT * FROM `game_download` WHERE `game_id` = '".$do['id']."' AND `user_id` = '".$id."' ORDER BY `id` DESC LIMIT 10");
while($download = $down->fetch_assoc()){
if($name = $do['cn'] ?: $do['name']){
echo '<li><a href="/game/'.$do['id'].'"><img src="/M/i/'.$do['icon'].'" width="46" height="46" alt="'.$name.'图标" /></a><div>';
echo '<h3><a href="/game/'.$do['id'].'">'.$name.'</a></h3><div>';
}
echo '<span>'.$do['platform'].'</span><span>下载：'.$download['downs'].'</span></div></div></li>';
}
}
echo '</ul></div>';
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
if($use['qq_avatar']){
$qq = ''.$use['qq_avatar'].'/100?t='.$use['up_time'].'';
}
if($use['baidu_avatar']){
$baidu = 'https://himg.bdimg.com/sys/portrait/item/'.$use['baidu_avatar'].'';
    }
if($use['github_avatar']){
$github = ''.$use['github_avatar'].'';
    }
if ($avatar = $baidu ?: $github ?: $qq){
echo '<div id="aside"><div class="info"><img class="Avatar" src="'.$avatar.'" alt="头像" width="180" height="180" /><h2 class="'.$use['pol'].'">';
}
if($name = $use['name']){
echo ''.$name.'</h2>';
}else{
echo 'user_'.$use['id'].'</h2>';
}
echo '</div><ul class="list list1">';
echo '<li>UID：'.$use['id'].'</li>';
$str = get_ip_city($use['ip']);
$str=str_replace('省','',$str);
echo '<li>IP属地：'.$str.'</li>';
echo '<li>状态：'.$on_off.'</li>';
if ($use['baidu']){
echo '<li>方式：百度</li>';
}else if ($use['github']){
echo '<li>方式：github</li>';
}else  if ($use['qq']){
echo '<li>方式：qq</li>';
}

echo '<li>注册：'.data($use['data_reg']).'</li>';
echo '<li>上传：'.$uw->num_rows.'</li>';
echo '<li>下载：'.$use['downs'].'</li>';
echo '<li>评论：'.$uc->num_rows.'</li>';
//echo '<li>封号大礼包：'.fh($use['fh']).'</li>';
echo '</ul></div>';
if($user['id']==$use['id']){
echo '<h2 class="topic margin-top">'.$use['admin_level'].'管理功能</h2>';
echo '<ul class="list list2">';
echo '<li>会员组：'.$use['admin_level'].'</li>';
if($use['xm']){
echo '<li>已绑定续梦号,需重新绑定,请联系管理员</li>';
}else{
echo '<li><a href="/user/edit/bdxm" >绑定续梦号</li>';
}
if($use['admin_level'] == "管理员"){
echo '<li><a href="/admin" >后台管理</li>';
}
echo '<li><a href="/user/logout" >注销账号</li>';
echo '<li><a href="/games/upload" >上传游戏</li>';
echo '<li><a href="/log_login">登录历史</a></li>';
echo '<li><a href="/user/edit" >修改资料</li>';
if($use['baidu']){
}else{
echo '<li><a href="/user/edit/pic" >修改头像</li>';
}
echo '<li><a href="/user/edit/password" >修改密码</li>';
}
echo '</ul></div></main>';
//echo '<div class="link"><b>用户名</b> : '.$use['login'].'</div>';
//echo '<div class="link"><b>昵称</b> : '.$use['name'].'</div>';
//echo '<div class="link"><b>ID</b> : '.$use['id'].'</div>';
//echo '<div class="link"><b>性别</b> : '.$arr_pol{$use['pol']}.'</div>';
//echo '<div class="link"><b>注册时间</b> : '.data($use['data_reg']).'</div>';
//echo '<div class="link"><b>用户等级</b> : '.$arr_adm{$use['admin_level']}.'</div>';
//echo '<div class="link"><b>最近登录</b> : '.data($use['up_time']).'</div>';
}else{
//err('Ошибка');
}
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/foot.php';
?>