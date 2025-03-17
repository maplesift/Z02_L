<?php include_once "db.php";
$user=$_SESSION['user'];
$news_id=$_POST['id'];
$chk=$Log->find(['news_id'=>$news_id,'user'=>$user]);
$news=$News->find($_POST['id']);
if($chk){
    $Log->del($chk);
    $news['love']--;
}else{
    $Log->save(['news_id'=>$news_id,'user'=>$user]);
    $news['love']++;
}
$News->save($news);
