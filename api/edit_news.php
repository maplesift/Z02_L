<?php include_once "db.php";
// dd($_POST);
if(isset($_POST['id'])){
    foreach ($_POST['id'] as $id) {
        // 刪除
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
            // 顯示
        }else{
            $sh=$News->find($id);
            $sh['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($sh);
        }
        
    }
}
    
to("../admin.php?do=news");