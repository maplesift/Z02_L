<?php include_once "db.php";
$user=$_SESSION['user'];
$news=$_POST['id'];


$log=$Log->find(['news'=>$_POST['id'],'user'=>$user]);
$like=$News->find($_POST);
if($log){
    $Log->del($log);
    $like['love']--;
}else{
    $Log->save(['news'=>$_POST['id'],'user'=>$user]);
    $like['love']++;
}
$News->save($like);