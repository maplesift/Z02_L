<?php include_once "db.php";

// dd($_POST);
$Que->save(['text'=>$_POST['sub'],'main_id'=>0]);

$sub=$Que->find(['text'=>$_POST['sub']]);
$sub_id=$sub['id'];

foreach ($_POST['opt'] as $opt) {
    echo $opt;
    $Que->save(['text'=>$opt,'main_id'=>$sub_id]);
    
}

// Array
// (
//     [sub] => 問題一：你最常做什麼運動來促進健康體能呢?
//     [opt] => Array
//         (
//             [0] => 1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。
//             [1] => 12.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。
//             [2] => 33
//             [3] => 1
//         )

// )