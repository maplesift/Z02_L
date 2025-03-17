<?php
$rows=$table->all();
?>
<?php foreach ($rows as $row) :  ?>

<?php endforeach ;?>

<?=$row[''];?>




                <?php
                $total=$News->count();
                $div=3;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;
                $rows=$News->all();
                ?>