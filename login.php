<?php

$title = "ノート共有";
include("html_start.php");
 ?>

 <header>
   <h1><?=$title?></h1>
 </header>
 <form  action="login_act.php" method="post">
   ID:<input type="text" name="lid">
   PASS:<input type="text" name="lpw">
   <input type="submit" value="login">
 </form>
 <a href="regist.php">登録してない方はこちらへ</a>

<?php
include("html_end.php")
 ?>
