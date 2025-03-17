<?php include_once "db.php";

$main=$Que->find(['id'=>$_POST['main_id']]);
$sub=$Que->find(['id'=>$_POST['sub']]);
$main['vote']++;
$sub['vote']++;
$Que->save($sub);
$Que->save($main);
// Array
// (
//     [sub] => 3
//     [main_id] => 1
// )
to("../index.php?do=result&id={$main['id']}");