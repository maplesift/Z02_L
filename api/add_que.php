<?php include_once "db.php";
dd($_POST);
if(isset($_POST['subject'])){
    $Que->save([
        'text'=>$_POST['subject'],
        'main_id'=>0,
        'vote'=>0,  
    ]);
    $main_id= $Que->find(['text'=>$_POST['subject']])['id'];
    
}
if(isset($_POST['opt'])){
    foreach ($_POST['opt'] as $opt) {
        $Que->save([
            'text'=>$opt,
            'main_id'=>$main_id,
            'vote'=>0, 
        ]);
    };
}