<?php include_once "db.php";
$chk=$User->find($_POST);

if($chk){
    echo "您的密碼為:".$chk['pw'];
}else{
    echo "查無此資料";
}