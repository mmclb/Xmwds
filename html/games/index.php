<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
$pagesize = abs(intval($_GET['pagesize']));
$top = abs(intval($_GET['top'])); # 
$new = $con->query("SELECT * FROM `game` WHERE `downs` > 0 ORDER BY `downs` DESC LIMIT 10");
$order = abs(intval($_GET['order'])); #
$n = $con->query("SELECT * FROM `game` ORDER BY `id` DESC LIMIT 10");
if ($order==10){
$str="";
foreach($n as $row){
    $rowArr = json_encode(array("id" => "".$row['id']."","name" => "".$row['name']."","chinese" => "".$row['cn']."","system" => "".$row['platform']."","category" => "".$row['id_raz']."","vendor" => "".$row['author']."","download_num" => "".$row['downs']."","comment_num" => "0"));
    $str=$str.$rowArr."###";
}
$jsonArr=rtrim($str,"###");
echo "{\"list\":[".str_replace("###",",",$jsonArr)."]}";
exit();
}
if ($top==10){
$str="";
foreach($new as $row){
    $rowArr = json_encode(array("id" => "".$row['id']."","name" => "".$row['name']."","chinese" => "".$row['cn']."","system" => "".$row['platform']."","category" => "".$row['id_raz']."","vendor" => "".$row['author']."","download_num" => "".$row['downs']."","comment_num" => "0"));
    $str=$str.$rowArr."###";
}
$jsonArr=rtrim($str,"###");
echo "{\"list\":[".str_replace("###",",",$jsonArr)."]}";
exit();
}
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/system/system.php';
	//名字
$system = filtr($_GET['system']);
	$resolution = filtr($_GET['resolution']);
	$category = filtr($_GET['category']);
	$vendor = filtr($_GET['vendor']);
	$users_id = filtr($_GET['users_id']);
	$lang = filtr($_GET['lang']);
	$online = filtr($_GET['online']);
	//$systemos = filtr($_GET['systemos']);
$page = 1;
if(isset($_GET['page']))
$page = $_GET['page'];
//$users = $con->query("SELECT * FROM `user` WHERE `id` = '".$user_id."'")->fetch_assoc();
if($k_post1 = $users_id ?: $system ?: $category ?: $vendor ?: $resolution ?: $lang ?: $online){
//$k_post3 = $con->query("SELECT * FROM `games` WHERE `dpi` LIKE '".$resolution."'")->num_rows;
$k_post1 = $con->query("SELECT * FROM `game` WHERE `id_user` LIKE '".$users_id."' OR `dpi` LIKE '".$resolution."' OR `platform` LIKE '".$system."' OR `raz` LIKE '".$category."' OR `author` LIKE '".$vendor."' OR `zh` LIKE '".$lang."' OR `DJ` LIKE '".$online."'")->num_rows;
}else{
$k_post2 = $con->query("SELECT * FROM `game`")->num_rows;
}
if($k_post = $k_post1 ?: $k_post2){
$total = $k_post;//记录数
}
$count = 0;
//$pagesize = $pagesi;
$pagesiz = 24;
$totalPage = ceil($total/$pagesiz);//总页数
$pages = ceil($conut/$pagesiz);//共多少页
$prepage=$page-1;
if($prepage<=0)
$prepage=1;
$nextpage = $page+1;
if($nextpage >= $pages){
$nextpage = $pages;
$start = ($page-1) * $pagesiz;
}
//$ms = $con->query("SELECT * FROM `game` WHERE `id_user` LIKE '%$users_id%' OR `platform` LIKE '%$system%' OR `id_raz` LIKE '%$category%' OR `author` LIKE '%$vendor%' order by downs DESC LIMIT $start,$pagesiz");
//$pagesss = str($users_id,$system.$category.$vendor.$resolution.$lang.$online);
if($mss = $users_id ?: $system ?: $category ?: $vendor ?: $resolution ?: $lang ?: $online){
	//$mssss = $con->query("SELECT * FROM `games` WHERE `dpi` LIKE '".$resolution."' order by id DESC LIMIT $start,$pagesiz");
		$mss = $con->query("SELECT * FROM `game` WHERE `id_user` LIKE '".$users_id."' OR `platform` LIKE '".$system."' OR `raz` LIKE '".$category."' OR `author` LIKE '".$vendor."' OR `zh` LIKE '".$lang."' OR `DJ` LIKE '".$online."' OR `dpi` LIKE '".$resolution."' order by downs DESC LIMIT $start,$pagesiz");
		//`id` LIKE '".$mssss['id_game']."' OR 
	}else{
	$msss = $con->query("SELECT * FROM `game` order by downs DESC LIMIT $start,$pagesiz");
	}
		$mi = $con->query("SELECT * FROM `game` WHERE `platform` LIKE '%$system%' and `raz` LIKE '%$category%' and `author` LIKE '%$vendor%' ORDER BY RAND() LIMIT $start,$pagesize");
		//$ms = $con->query("SELECT * FROM `file` WHERE `author` = '".$author."' ORDER BY `id` DESC LIMIT 10");
if ($pagesize==10){
$str="";
foreach($mi as $row){
$number = $con->query('SELECT * FROM `comment` WHERE `id_obmen` = "'.$row['id'].'"')->num_rows;
     $rowArr = json_encode(array("id" => "".$row['id']."","name" => "".$row['name']."","chinese" => "".$row['cn']."","system" => "".$row['platform']."","category" => "".$row['id_raz']."","vendor" => "".$row['author']."","download_num" => "".$row['downs']."","comment_num" => "".$number.""));
    $str=$str.$rowArr."###";
}
$jsonArr=rtrim($str,"###");
echo "{\"list\":[".str_replace("###",",",$jsonArr)."]}";
exit();
}
$title = ''.$title.'';
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/header.php';
//echo '<h2>'.$title2.'</h2><a href="/"><img src="/favicon.ico" width="32" height="32" alt="续梦网logo" /><h1>'.$title2.'</h1>';
//if($k_post  < 1) err('没有同厂游戏！');

include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/user.php';
echo '<div id="where"><a href="/">续梦网</a><span>首页</span></div>';
echo '<div id="middle"><div id="main">';

//echo '<div class="tabs"><a href="/games" class="current">最多下载</a><a href="/games/order=id">最新上传</a></div>';
//echo '<span class="title">同厂游戏</span>'.$key.'<div class="block">';
echo '<ul class="box res">';
if($ms = $mss ?: $msss ?: $mssss){
while($w = $ms->fetch_assoc()){
$mu = $con->query("SELECT * FROM `image` WHERE `id_game` = '".$w['id']."' ORDER BY `id` ASC limit 1")->fetch_assoc();
if($mu > 0){
$image = $mu['id'];
}else{
$image = '0';
}
if($name = $w['cn'] ?: $w['name']){
echo '<li><a href="/game/'.$w['id'].'" class="clearfix"><img src="/jietu/'.$image.'"  width="240" height="240">';
echo '<h3>'.$name.'</h3></a>
<footer>
<img src="//gimg4.baidu.com/poster/src=https%3A%2F%2Fgips0.baidu.com%2Fit%2Fu%3D3566520152%2C2448224215%26fm%3D3012%26app%3D3012%26autime%3D1700379890%26size%3Db200%2C200&refer=http%3A%2F%2Fwww.baidu.com&app=2004&size=f72,72&n=0&g=0n&q=75&fmt=auto?sec=1703782800&t=34cc33e4ffdac063a92236bf994380ab" width="25" height="25" alt="头像">
<name>码农掌叔傻逼&nbsp;&nbsp;0</name>
</footer></li>';
}
}
}
//echo '</ul>';
//echo '<div class="link_game"><a href="/file/'.$w['id'].'"> <div class="example3">
//<img class="img_rms" src="/icon/'.$w['id'].'"> <div class="example_text"><h6>'.$w['name'].'</h6><span><i class="fas fa-file-download ic"></i> 已下载: '.$w['downs'].' 次.</span></div></div></a></div>';
echo '</ul>';
//echo '</div>';
while($count < 1){
echo '<div class="pager"><span>第'.$page.'页/共'.$totalPage.'页</span>';
$count++;
}
if($page>2){//不在第一页
//echo '<a href="/games">首页</a>';
}
if($page>1){//不在第一页
echo '<a href="/games/'.($page-1).'">上一页</a>';
}
if($page < $totalPage){//不在最后一页
echo '<a href="/games/'.($page+1).'">下一页</a>';
}
echo'<div>页码:<input type="number" name="go_page" size="5" maxlength="6" min="1" max="'.$totalPage.'" step="1"><input type="button" value="跳转" onclick="go()"></div>';
if($page < $totalPage-1){//不在最后一页
//echo '<a href="/games?page='.$totalPage.'">尾页</a>';
}
echo '</div></div>';
//if($k_post > '20') {  echo str('?page='.$page.'&system='.$system.'&resolution='.$resolution.'&category='.$category.'&vendor='.$vendor.'&',$k_page,$page.'');  }
//echo '<div id="aside"></div>';
echo '<div id="aside"><a href="/games/ngage2" title="N-Gage2"><img src="/M/o/ngage.png" alt="ngage logo" /></a><div class="twobuttons margin-top"><a href="/games/upload" class="button green">上传JAR</a><a href="/games/uploadGame" class="button green">上传SIS或N-Gage</a></div>
<form action="/games" method="get" class="form">
<select name="system"><option value="">系统</option><option value="J2ME" >J2ME</option><option value="S60V1" >S60V1</option><option value="S60V2" >S60V2</option><option value="S60V3" >S60V3</option><option value="S60V5" >S60V5</option><option value="Symbian3" >Symbian3</option><option value="N-Gage2" >N-Gage2</option><option value="MRP" >MRP</option></select>
<select name="resolution"><option value="">分辨率</option><option value="96×65">96×65</option>
    <option value="128×108">128×108</option>
    <option value="128×128">128×128</option>
    <option value="128×160">128×160</option>
    <option value="132×176">132×176</option>
    <option value="175×220">175×220</option>
    <option value="175×315">175×315</option>
    <option value="176×176">176×176</option>
    <option value="176×208">176×208</option>
    <option value="176×220">176×220</option>
    <option value="176×240">176×240</option>
    <option value="180×320">180×320</option>
    <option value="208×208">208×208</option>
    <option value="208×320">208×320</option>
    <option value="282×320">282×320</option>
    <option value="240×240">240×240</option>
    <option value="240×320">240×320</option>
    <option value="240×400">240×400</option>
    <option value="240×432">240×432</option>
    <option value="320×240">320×240</option>
    <option value="320×480">320×480</option>
    <option value="352×416">352×416</option>
    <option value="360×360">360×360</option>
    <option value="360×640">360×640</option>
    <option value="480×640">480×640</option>
    <option value="480×700">480×700</option>
    <option value="480×720">480×720</option>
    <option value="480×800">480×800</option>
    <option value="640×360">640×360</option>
    <option value="640×480">640×480</option>
    <option value="flex">flex</option>
    </select>
<select name="category"><option value="">类型</option><option value="ACT" >动作游戏</option><option value="ARPG" >动作角色扮演</option><option value="AVG" >冒险游戏</option><option value="ETC" >其他游戏</option><option value="FPS" >第一人称射击</option><option value="FTG" >格斗游戏</option><option value="MUG" >音乐游戏</option><option value="RAC" >赛车游戏</option><option value="RPG" >角色扮演</option><option value="RTS" >限时战略</option><option value="SLG" >战略模拟</option><option value="SPG" >体育游戏</option><option value="STG" >射击游戏</option><option value="APP" >应用软件</option></select>
<input type="submit" value="筛选" /></div></form></div></div>';
//}

include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/foot.php';

?>