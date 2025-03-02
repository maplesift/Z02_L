<?php include "db.php";
foreach ($_POST['del'] as $id) {
    $User->del($id);
}
to("../admin.php?do=admin");