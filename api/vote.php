<?php include_once "db.php";
// dd($_POST);

$opt=$Que->find($_POST['opt']);
$sub=$Que->find($opt['main_id']);
// dd($opt);
// dd($sub);
$opt['vote']++;
$sub['vote']++;

$Que->save($opt);
$Que->save($sub);

to("../index.php?do=result&id={$sub['id']}");
// Array
// (
//     [opt] => 3
// )