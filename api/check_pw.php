<?php
include_once "db.php";

$res = $User->count($_POST);

// 資料表中有指定帳號和密碼的使用者資料，代表登入成功，這時就建立 session，因為要紀錄登入狀態
if($res) {
  $_SESSION['user'] = $_POST['acc'];
}

echo $res;