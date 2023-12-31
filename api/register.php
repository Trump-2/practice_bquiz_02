<?php
include_once "db.php";
unset($_POST['pw2']); // 因為這個欄位在資料表中沒有，所以如果直接用 $_POST 寫入資料時會發生錯誤，因此要先 unset 它

// echo $User->save($_POST);
$User->save($_POST); // 這段這樣寫是為了檢定，否則正常來說要像上面那行一樣，回傳結果給前端再去處理