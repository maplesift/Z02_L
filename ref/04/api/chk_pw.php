<?php include "db.php";
$chk=$User->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    echo 1;
    $_SESSION['user']=$chk['acc'];
}else{
    echo 0;
}