<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/system/base.php';
$title = '添加文件';
include_once $_SERVER["DOCUMENT_ROOT"].'/style/head.php';

if($user) {
	if(isset($_POST['submit'])) {
		$filename = strtolower($_FILES['userfile']['name']);
		// имя и формат файла в нижнем регистре
		$t = preg_replace('#.[^.]*$#', NULL, $filename);
		// имя файла
		$f = str_replace($t, '', $filename);
		// формат файла
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/down/files/';
		$rand=rand(1000000000, 9999999999);
		if($f=='.jar' || $f=='.jad') {
			$t=$rand.$f;
			//.basename($_FILES['userfile']['name']);
			$uploadfile = $uploaddir . $rand.$f;
			//.basename($_FILES['userfile']['name']);
		} else {
			echo "<div class='err'>上传失败 !</div>";
		}
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		    $id = filtr($_POST['class']);
			$name = filtr($_POST['name']);
			//名字
			$platform = filtr($_POST['platform']);
			//平台
			$dpi = filtr($_POST['dpi']);
			//分辨率
			$text = filtr($_POST['text']);
			//介绍
			$con->query("INSERT INTO `file` (`name`, `text`, `id_user`, `time`, `id_raz`, `down`, `format`) VALUES 
('".$name."', '".$text."', '".$user['id']."', '".time()."', '".$id."', '".$rand.$f."', '".$f."')");
			header('Location: /class/'.$id);
		} else {
			err('Ошибка');
		}
	}
	echo '
<span class="title">添加</span><div class="link">
上传的应用需要审核过才能显示。
<form action="" method="post" enctype="multipart/form-data">
<b>分类</b></br><select name="class">';
$b = $con->query("SELECT * FROM `class`");
	while($w = $b->fetch_assoc()) {
		echo '<option value="'.$w['id'].'"> '.$w['name'].' </option>';
	}
	echo '
</select>
<b>名字</b></br>
<input type="text" name="name" value=""><br/>
<b>平台</b></br>
<select name="platfrom"><br/>
<option value="0">J2ME</option>
<option value="1">S60V1</option>
<option value="2">S60V2</option>
<option value="3">S60V3</option>
<option value="4">S60V5</option>
<option value="5">Symbian3</option>
</select>
<b>分辨率</b></br>
<select name="dpi">
<option value="0">自适屏</option>
<option value="1">128×160</option>
<option value="2">132×176</option>
<option value="3">175×220</option>
<option value="4">176×208</option>
<option value="5">176×220</option>
<option value="6">176×240</option>
<option value="7">208×208</option>
<option value="8">208×320</option>
<option value="9">240×240</option>
<option value="10">240×320</option>
<option value="11">240×400</option>
<option value="12">240×432</option>
<option value="13">320×240</option>
<option value="14">320×480</option>
<option value="15">360×640</option>
<option value="16">480×640</option>
<option value="17">480×700</option>
<option value="18">480×720</option>
<option value="19">480×800</option>

</select><br/>
<b>描述</b></br>
<textarea name="text"></textarea></br></br>
<b>选择一个文件</b></br>
 <input type="hidden" name="MAX_FILE_SIZE" value="9000000000">
<input type="file" name="userfile" id="userfile"><br />
<input type="submit" name="submit" value="添加" />
</form></div>';
} else {
echo '对不起！您没有有登录！';
}
include_once $_SERVER["DOCUMENT_ROOT"].'/style/foot.php';
?>