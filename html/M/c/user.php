<?php
//include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/menu.php';

//echo '<p>珍藏即将遗失的功能机JAVA游戏软件</p></a>';
//echo '<span class="mast-favs"><ul id="user">';	
				
if(!$user){
echo '<a href="/login"><img src="/M/guest.png" width="32" height="32" alt="头像" /></a>';
}else{
if($user['qq']){
$user_qq = ''.$user['qq_avatar'].'/40?t='.$user['up_time'].'';
}
if($user['baidu_avatar']){
$user_baidu = 'https://himg.bdimg.com/sys/portrait/item/'.$user['baidu_avatar'].'';
}
if($user['github_avatar']){
$user_baidu = ''.$user['github_avatar'].'';
}

if ($avatar = $user_baidu ?: $user_qq ?: $github_avatar){
echo '
<a href="/user/'.$user['id'].'"><span1 class="user-img"><img class="Avatar" src="'.$avatar.'" width="32" height="32" alt="头像" /></a>';
}
if ($user['v'] == "蓝色"){
echo '<i class="m-icon m-icon-user m-icon-yellowv"></i></span1>';
}
//if ($user['v']>=1){
//echo '<i class="m-icon m-icon-user m-icon-yellowv"></i></span1>';
//<img  class="Avatar v" src="/style/image/V.png" width="14" height="14" alt="头像" />
//}
//echo '</a>';
}
echo '</div>';
echo '</header>';
//include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/menu.php';
//include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/language.php';
?>