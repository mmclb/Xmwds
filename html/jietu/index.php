<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/system/base.php';
//include_once $_SERVER["DOCUMENT_ROOT"] . '/system/system.php';
$id = abs(intval($_GET['id'])); # ФИЛЬТР ГЕТ
$b = $con->query("SELECT * FROM `image` WHERE `id` = '".$id."'")->fetch_assoc();
//$ms = $con->query("SELECT * FROM `image` WHERE `id_game` = '".$id."' ORDER BY `id` DESC");
//echo '<title>'.$id.'</title>';
//加水印
//$f = $png ?: $jpg;
if($b['format'] == ".png" ?: $b['format'] == ".jpg"){
$file = '../M/s/'.$id.''.$b['format'].'';
}
if(file_exists($file)){

$dst_path = $file;
//$src_path = '../M/o/99sjyx.cn.png';
//创建图片的实例

$dst = imagecreatefromstring(file_get_contents($dst_path));

//打上文字

$font = './simsun.ttc';//字体

$black = imagecolorallocate($dst, 0xff, 0xff, 0xff);//字体颜色
//分辨率
list($dst_w, $dst_h, $dst_wh) = getimagesize($dst_path);
//$dst_wh =''.$dst_w.''.$dst_h.'';
$text = 'rmct.cn';
if ($dst_w == 240 & $dst_h == 320){
imagefttext($dst, 8, 0, 185, 12, $black, $font, $text);
}else if ($dst_w == 640 & $dst_h == 360){
imagefttext($dst, 8, 0, 585, 12, $black, $font, $text);
}else if ($dst_w == 176 & $dst_h == 220){
imagefttext($dst, 8, 0, 125, 12, $black, $font, $text);
}else if ($dst_w == 320 & $dst_h == 240){
imagefttext($dst, 8, 0, 265, 12, $black, $font, $text);
}else if ($dst_w == 208 & $dst_h == 208){
imagefttext($dst, 8, 0, 155, 12, $black, $font, $text);
}else if ($dst_w == 128 & $dst_h == 160){
imagefttext($dst, 8, 0, 75, 12, $black, $font, $text);
}else if ($dst_w == 176 & $dst_h == 208){
imagefttext($dst, 8, 0, 120, 12, $black, $font, $text);
}else if ($dst_w == 128 & $dst_h == 128){
imagefttext($dst, 8, 0, 75, 12, $black, $font, $text);
}
//输出图片

list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);

switch ($dst_type) {
case 1://GIF

header('Content-Type: image/gif');

imagegif($dst);

break;

case 2://JPG

header('Content-Type: image/jpeg');

imagejpeg($dst);

break;

case 3://PNG

header('Content-Type: image/png');

imagepng($dst);

break;

default:

break;

}
}else if($b['format'] == ".gif"){
header("Content-type: image/png");
echo file_get_contents($_SERVER["DOCUMENT_ROOT"]."/M/s/".$b['id'].".gif");
}else{
header("Content-type: image/png");
echo file_get_contents($_SERVER["DOCUMENT_ROOT"]."/M/s/00.png");
}

//$srce = creatWaterMark('M/s/'.$id.'.png');