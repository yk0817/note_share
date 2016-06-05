<?php
// DB接続
$dbLink = mysql_connect("localhost","root","");
	if (!$dbLink){
		echo "接続失敗";
	}
//DB選択
	mysql_select_db("share_note",$dbLink);

// 画像データ取得
// $sql = ("SELECT IMG FROM IMAGES WHERE ID = '" . $_GET['id']."'");
$sql = ("SELECT IMG FROM IMAGES WHERE ID = 3");
// var_dump($sql);
$result = mysql_query($sql, $dbLink);
$row = mysql_fetch_row($result);

// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/jpeg");

// バイナリデータを直接表示
echo $row[0];
?>
