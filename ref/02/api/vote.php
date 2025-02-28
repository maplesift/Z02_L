<?php include_once "db.php";
// 問卷選項  $sql .= " where `id`='$id' ";
// 主題  
// $_POST['opt']=3 m
$opt=$Que->find($_POST['opt']);
// dd($opt);
$sub=$Que->find($opt['main_id']);
// dd($sub);
$opt['vote']++;
$sub['vote']++;

$Que->save($opt);
$Que->save($sub);

to("../index.php?do=result&id={$sub['id']}");