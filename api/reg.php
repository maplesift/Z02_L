<?php include_once "db.php";
unset($_POST['pw2']);
//dd($_POST);
echo $User->save($_POST);