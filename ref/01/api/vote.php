<?php include_once "db.php";
// 問卷選項
$opt=$Que->find($_POST['opt']);
// 主題
$sub=$Que->find($opt['main_id']);
$opt['vote']++;
$sub['vote']++;
$Que->save($opt);
$Que->save($sub);

to("../index.php?do=result&id={$opt['main_id']}");