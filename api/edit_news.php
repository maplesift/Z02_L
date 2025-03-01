<?php include_once "db.php";
// dd($_POST);
if(isset($_POST['id'])){
    foreach ($_POST['id'] as $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $row=$News->find($id);
            $row['sh']=(isset($_POST['del']) && in_array($id,$_POST['del']))?1:0;
            $News->save($row);
        }
    }
}
to("../admin.php?do=news");