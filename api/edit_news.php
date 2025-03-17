<?php include_once "db.php";

if(isset($_POST['id'])){
    foreach ($_POST['id'] as $idx => $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $sh=$News->find($id);
            $sh['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($sh);
        }
    }
}
to("../admin.php?do=news");