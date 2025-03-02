<style>
.btn{
    margin-right: -7px;
}
</style>
<a href="?do=main&type=1"><button class="btn">健康新知</button></a>
<a href="?do=main&type=2"><button class="btn">菸害防治</button></a>
<a href="?do=main&type=3"><button class="btn">癌症防治</button></a>
<a href="?do=main&type=4"><button class="btn">慢性病防治</button></a>
<?php
if(isset($_GET['type'])){

    $row=$News->find(['type_id'=>$_GET['type']])
    ?>

<div>
    <h2>

        <?=$row['type']?>
    </h2>
    <hr>
    </div>
    <div>
        <?=nl2br($row['text']);?>
    </div>
    <?php
}
?>