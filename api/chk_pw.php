<?php include_once "db.php";
$chk=$User->count($_POST);
if($chk){
    $_SESSION['user']=$_POST['acc'];
    // echo $_SESSION['user'];
    echo $chk;
}else{
    echo $chk;
}