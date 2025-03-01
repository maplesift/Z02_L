<?php include_once "db.php";
$sh=$Que->find($_POST);

if($sh['sh']==1){
  echo  $sh['sh']=0;
    $Que->save($sh);
}else{
   echo  $sh['sh']=1;
    $Que->save($sh);
}