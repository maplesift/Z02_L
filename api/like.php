<?php include_once "db.php";
// $id=$_POST['id'];
// $user=$_SESSION['user'];

$chk=$Log->count(['news'=>$_POST['id'],'user'=>$_SESSION['user']]);

if($chk>0){
    $Log->del(['news'=>$_POST['id'],'user'=>$_SESSION['user']]);
}else{
    $Log->save(['news'=>$_POST['id'],'user'=>$_SESSION['user']]);
}
