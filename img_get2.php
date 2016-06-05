<?php
// DB接続
try {
  $pdo = new PDO('mysql:dbname=share_note;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続出来ませんでした'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT IMG FROM IMAGES");
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else {
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    header("Content-Type: image/jpeg");
    // echo "<div>".$result["IMG"]."</div>";
    echo $result["IMG"];
  }
  // echo $result["IMG"];

}

?>
