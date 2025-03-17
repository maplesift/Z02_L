<?php include_once "db.php";
$Que->save(['text'=>$_POST['main'],'main_id'=>0]);

$main=$Que->find(['text'=>$_POST['main']]);
foreach ($_POST['sub'] as $sub) {
    $Que->save(['text'=>$sub,'main_id'=>$main['id']]);
}
to("../admin.php?do=que");
