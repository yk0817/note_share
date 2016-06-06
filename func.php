<?php
func_pass_db(){
try {
  $pdo = new PDO('mysql:dbname=share_note;charset=utf8;host=localhost','root','');

} catch (PDOException $e) {
  exit('DBエラー:'.$e->getMessage());
}
    
}

 ?>
