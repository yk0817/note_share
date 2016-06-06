<?php
session_start();
include('func.php');

// 接続　
func_pass_db();

$stmt = $pdo->prepare("SELECT * FROM users WHERE lid = :lid AND lpw = :lpw AND life_flg = 0");
$stmt->bindValue(':lid', $_POST["lid"]);
$stmt->bindValue(':lpw', $_POST["lpw"]);
$res = $stmt->execute();

if ($res == false) {
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

$val = $stmt->fetch();

if ($val["id"] !="") {
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"] = $val['name'];
  header("Location: search.php");
} else{
  header("Location: logout.php");
}

exit();

 ?>
