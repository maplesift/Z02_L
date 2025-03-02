<?php include_once "db.php";
dd($_POST);

if(isset($_POST['del'])){
    foreach ($_POST as $id) {
        $User->del($id);
    }
}
// to("../admin.php?do=admin");