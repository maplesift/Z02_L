<?php
// $title=$Que->find(['main_id'=>$_GET['id']]);
?>
<style>
    .vote{
        margin: 5px;
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$Que->find(['id'=>$_GET['id']])['text'];?></legend>

    <h2><?=$Que->find(['id'=>$_GET['id']])['text'];?></h2>
<form action="./api/vote.php" method="post">

    <?php
    $rows=$Que->all(['main_id'=>$_GET['id']]) ;
    foreach ($rows as $row) :
        ?>
        <div class="vote">
            <input type="radio" name="opt" value="<?=$row['id'];?>"><?=$row['text'];?>
        </div>
        <?php  endforeach; ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>