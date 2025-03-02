<?php include "db.php";
// dd($_POST);
$Que->save(['text'=>$_POST['sub'],'main_id'=>0]);
$sub=$Que->find(['text'=>$_POST['sub']]);


foreach ($_POST['opt'] as $opt) {
    // dd($opt);
    $Que->save(['text'=>$opt,'main_id'=>$sub['id']]);
}
to("../admin.php?do=que");