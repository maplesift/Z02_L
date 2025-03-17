<style>
    fieldset {
        width: 90%;
    }

    .table {
        width: 85%;
    }
</style>
<?php
$main=$Que->find(['id'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 ><?=$main['text'];?> </legend>
    <form action="./api/vote.php" method="post">
<h2><?=$main['text'];?></h2>
<?php
$subs=$Que->all(['main_id'=>$main['id']]);
foreach ($subs as $sub) :
?>
<div>

    <input type="radio" name="sub" value="<?=$sub['id'];?>"><?=$sub['text'];?>
</div>

<?php endforeach; ?>
<div class="ct">
    <input type="hidden" name="main_id" value="<?=$main['id'];?>">
    <input type="submit" value="我要投票">

</div>
    </form>

</fieldset>