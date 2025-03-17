<style>
    .btn{
        margin: -2px;
    }
</style>

<a href="?do=main&type=1"><button class="btn">健康新知</button></a>
<a href="?do=main&type=2"><button class="btn">菸害防制</button></a>
<a href="?do=main&type=3"><button class="btn">癌症防治</button></a>
<a href="?do=main&type=4"><button class="btn">慢性病防治</button></a>

<?php 
if(isset($_GET['type'])):
    $row=$News->find(['type'=>$_GET['type']]);
?>
<h2><?=$row['type_name'];?></h2>
<hr>
<div>
    <?=$row['title'];?>
    <?=nl2br($row['text']);?>
</div>
<?php endif;?>