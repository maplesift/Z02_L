<?php include_once "db.php";
$user=$User->find(['email'=>$_GET['email']]);

// 如果有
if(!empty($user)){
    echo "您的密碼為:".$user['pw'];
}else{
    echo "查無此資料";
}