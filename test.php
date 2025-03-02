<?php
$total=$News->count();
$div=5;
$now=$_GET['p']??1;
$pages=ceil($total/$div);
$start=($now-1)*$div;

// 選一個用
$rows=$data->all(" limit $start,$div ");
$rows=$data->all();
foreach ($rows as $row) :
?>
<?php
endforeach;
?>


<?php
if($now-1>0){
    echo "<a href='?do=news&p=".($now-1)."'> < </a> ";
}
for ($i=1; $i < $pages; $i++) { 
    $size=($now==$i)?'26px':'18px' ;
    echo "<a href='?do=news&p=$i' style='font-size:$size ;'>$i</a> ";
}
if($now+1<=$pages){
    echo "<a href='?do=news&p=".($now+1)."'> > </a> ";
}
?>
