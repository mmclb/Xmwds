
<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
$title = '常见说明';
include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/header.php';
echo '<title>'.$title.'</title>';
echo '</head>'; 

echo '<body class="subpage"><div id="header"><a href="#back" onclick="history.back();" class="iconfont icon-fanhui" title="'.$exit.'"></a>';

echo '<h1>'.$title.'</h1><a href="/"><img src="/favicon.ico" width="32" height="32" alt="'.$title2.'logo" /><h1>'.$title2.'</h1>';

include_once $_SERVER["DOCUMENT_ROOT"] . '/M/c/user.php';

echo '<div id="nav" class="container"><a href="/">首页</a>';
echo '<span>'.$title.'</span></div>';
echo '<main class="container"><div id="main">';

echo '<div class="article"><h1>'.$title.'</h1><div class="content">
<p><h2>安卓手机怎么玩？</h2>
网页底部有模拟器下载，安装好之后就能用模拟器安装JAVA游戏。</p><p><h2>个人主页报错？</h2>
续梦网暂时不支持小伙伴使用空白网名，请小伙伴修改网名后重新登陆续梦网即可。</p></div></div></div>';

include_once $_SERVER["DOCUMENT_ROOT"].'/info/top.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/M/c/foot.php';

?>