<?php
session_start();

$title = "検索画面";
include("html_start.php");
 ?>

 <header><?= $title ?></header>

 <form action="search.php" method="post">
   科目:
   <input type="checkbox" name="english" value="english">英語
   <input type="checkbox" name="math" value="math">数学
   <input type="checkbox" name="japanese" value="japanese">国語
   <input type="checkbox" name="society" value="society">社会
   <input type="checkbox" name="science" value="science">理科
   <br>
   <input type="submit" value="検索">
 </form>

 <?php
 include("html_end.php")
  ?>
