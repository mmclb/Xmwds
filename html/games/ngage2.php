<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width" /><meta name="renderer" content="webkit" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><meta name="applicable-device" content="pc,mobile" /><title>诺基亚N-Gage2游戏大全</title><style type="text/css">
		html,
		body,
		ul,
		li,
		h3 {
			margin: 0;
			padding: 0;
			font-size: 15px;
		}

		html,
		body {
			background: #e7f1cf;
			color: #666;
			margin: 0;
		}

		body {
			max-width: 640px;
			margin: 0 auto;
		}

		a {
			text-decoration: none;
			color: inherit;
		}

		header {
			border-bottom: solid 3px #febd03;
			display: flex;
			margin-top: 0.5em;
		}

		header a {
			flex: 1;
			padding: 0.5em;
			text-align: center;
			font-weight: bold;
			border-radius: 5px 5px 0 0;
		}

		header a:first-of-type {
			background: #febd03;
			background: linear-gradient(to bottom, #fd8000 0%, #febd03 100%);
		}

		.list a {
			display: block;
			padding: 0.5em;
			text-align: center;
			border: solid 3px transparent;
			border-radius: 5px;
		}

		.list a:hover {
			background: #b5c8d6;
			border-color: #5d87a0;
		}

		.list a div:first-of-type {
			color: #a0a0a0;
		}

		.list a div span:nth-of-type(2) {
			margin: 0 1em;
		}

		.list a img {
			border-radius: 5px;
		}

		.list a div:last-of-type {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 1em;
		}

		.list a div:last-of-type img {
			width: 100%;
		}

		footer {
			margin-top: 2em;
			text-align: center;
		}

		footer a {
			margin: 0 1em;
		}

	</style></head><body><header><a href="/">首页</a><a href="/games">游戏</a><a href="/search">搜索</a><a href="/info/3">捐助</a></header></html>
	<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
	echo '<div class="list">';
	$hot = $con->query("SELECT * FROM `game` WHERE `platform` = 'java' ORDER BY `id` DESC");
	while($w = $hot->fetch_assoc()){
	echo '<a href="/game/'.$w['id'].'"><img src="/M/i/'.$w['icon'].'" />';
	if($name = $w['cn'] ?: $w['name']){
	echo '<h3>'.$name.'</h3>';
	}
	echo '<div><span>'.$w['id_raz'].'</span><span>'.$w['downs'].'</span><span>'.$w['author'].'</span></div><div>';
	$mn = $con->query("SELECT * FROM `image` WHERE `id_game` = '".$w['id']."' ORDER BY `id` DESC");
	while($u = $mn->fetch_assoc()){
	echo '<img src="/M/s/'.$u['url'].'" />';
	}
	echo '</div></a>';
	}
	echo '</div>';
	?>
	<footer><a href="/">&copy; 2019-2021 iniche.cn</a><a href="https://beian.miit.gov.cn/">晋ICP备09000017号-5</a></footer></body></html>