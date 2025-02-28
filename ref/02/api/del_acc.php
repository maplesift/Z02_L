<?php include_once "db.php";


foreach ($_POST['del'] as $del) {
        $User->del($del);
        // dd($del);
}
to("../admin.php?do=admin");