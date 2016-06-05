<?php
$image = array();
// DB接続
try {
  $pdo = new PDO('mysql:dbname=share_note;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続出来ませんでした'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT IMG FROM IMAGES");
$status = $stmt->execute();
// echo '<div class = slider>';
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else {
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // echo "1"."\n";
    // echo "<div>";
    header("Content-Type: image/jpeg");
    echo $result["IMG"]."\n";
    // echo "</div>";
    // array_push($image,$result["IMG"]) ;
    // print_r($image);
    // print_r($image);
  }
}
// echo '</div>';
?>
