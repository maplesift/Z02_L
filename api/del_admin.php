<?php include_once "db.php";
// dd($_POST);
foreach ($_POST['del'] as $id) {
    $User->del($id);
}
to("../admin.php?do=admin");