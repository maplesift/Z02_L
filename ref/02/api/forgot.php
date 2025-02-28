<?php include_once "db.php";
$pw=$User->find($_POST);
if($pw){
    echo "您的密碼為:".$pw['pw'];
}else{
    echo "查無此資料";
}