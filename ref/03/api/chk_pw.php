<?php include_once "db.php";

$chk=$User->find($_POST);

if($chk){
    echo 1;
    $_SESSION['user']=$chk['acc'];
}else{
        echo 0;
    }