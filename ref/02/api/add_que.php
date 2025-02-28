<?php include_once "db.php";
// dd($_POST);
if(isset($_POST['sub'])){
    $Que->save([
        'text'=>$_POST['sub'],
        'main_id'=>0,
        'vote'=>0,

    ]);
    $main_id=$Que->find(['text'=>$_POST['sub']])['id'];
}
if(isset($_POST['opt'])){
    foreach ($_POST['opt'] as $opt) { 
        $Que->save([
            'text'=>$opt,
            'main_id'=>$main_id,
            'vote'=>0,
        ]);
        }   
    }
to("../admin.php?do=que");