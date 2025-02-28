<?php include_once "db.php";
$user=$_SESSION['user'];
$id=$_POST['id'];

$chk= $Log->find(['news'=>$id,'user'=>$user]);
$news= $News->find($id);
if($chk){
    $Log->del($chk);
    $news['love']--;
}else{
    $Log->save(['news'=>$id,'user'=>$user]);
    $news['love']++;
}
$News->save($news);


?>