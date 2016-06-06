<?php



try {

    // 接続
    $pdo = new PDO('mysql:dbname=share_note;charset=utf8;host=localhost', 'root', '');

    // 画像データを1次元配列として取得
    // 取り扱いやすいが，画像サイズ総量が大きい場合にメモリがつらい
    // $images = $pdo->query('SELECT img FROM images')->fetchAll(PDO::FETCH_COLUMN, 0);

    // $images = $pdo->query("SELECT IMG FROM IMAGES");
    $images = $pdo->prepare("SELECT IMG FROM IMAGES");
    $images->setFetchMode(PDO::FETCH_COLUMN,0);
    $images->execute();
    // echo $images;

} catch (PDOException $e) {

    // 500 Internal Server Errorでテキストとしてエラーメッセージを表示
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}
// header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<title>JPEG画像一覧</title>
<style>
    /*img { float: center; }*/
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="./slick-1.6.0/slick/slick.js"></script>
<script src="./lity/lity.js"></script>
<link rel="stylesheet" href="./slick-1.6.0/slick/slick.css">
<link rel="stylesheet" href="./lity/lity.css">


<h1>JPEG画像一覧</h1>
<div class="slider" >
  <?php foreach ($images as $i => $img): ?>
    <?php echo "<div>"; ?>
  <a data-lity href="data:image/jpeg;base64,<?=base64_encode($img)?>" >拡大</a>
  <img style="width:360px;height:200px;" class = "picture"  src="data:image/jpeg;base64,<?=base64_encode($img)?>" alt="画像<?=$i+1?>">
  </a>
    <?php echo "</div>"; ?>
  <?php endforeach; ?>
</div>

<!-- 検索戻るボタンが欲しいよね<a href="#"></a> -->
<script>
$('.slider').slick(
  // centerMode: true,
  // centerPadding: '160px'
);
</script>
