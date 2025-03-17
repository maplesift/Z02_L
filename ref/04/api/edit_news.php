<?php include "db.php";
if(isset($_POST['id'])){
    foreach ($_POST['id'] as $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $row=$News->find($id);
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($row);
        }
    }
}
to("../admin.php?do=admin");





// Array
// (
//     [id] => Array
//         (
//             [0] => 1
//             [1] => 2
//             [2] => 3
//             [3] => 4
//             [4] => 5
//         )

//     [sh] => Array
//         (
//             [0] => 3
//             [1] => 4
//             [2] => 5
//         )

//     [del] => Array
//         (
//             [0] => 3
//             [1] => 4
//         )

// )