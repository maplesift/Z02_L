<?php include_once "db.php";

switch ($_POST['type_id']) {
    case '1':
        $type="健康新知";
        break;
    case '2':
        $type="菸害防制";
        break;
    case '3':
        $type="癌症防治";
        break;
    case '4':
        $type="慢性病防治";
        break;
    }
// dd($_POST);
// echo $type;
    $News->save([
        'title'=>$_POST['title'],
        'type'=>$type,
        'text'=>$_POST['text'],
        'type_id'=>$_POST['type_id']
    ]);
    to("../admin.php?do=add_news");