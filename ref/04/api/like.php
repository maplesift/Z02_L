<?php include "db.php";
$user=$_SESSION['user'];
$newsId=$_POST['id'];

$likes=$News->find($newsId);
$chk=$Log->find(['user'=>$user,'news'=>$newsId]);

if($chk){
    $Log->del($chk);
    $likes['likes']--;
}else{
    $Log->save(['user'=>$user,'news'=>$newsId]);
    $likes['likes']++;
}
$News->save($likes);