<?php
$sub=$Que->find($_GET['id']);
$opts=$Que->all(['main_id'=>$_GET['id']]);

?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$sub['text'];?></legend>
    <h3><?=$sub['text'];?></h3>
    <form action="./api/vote.php" method="post">
    <?php
    foreach ($opts as $opt) :
    ?>
    <div>
        <input type="radio" name="opt" value="<?=$opt['id'];?>">
        <?=$opt['text'] ;?>
    </div>
<?php endforeach; ?>
<div class="ct">
    <input type="submit" value="我要投票">
</div>

    </form>
</fieldset>