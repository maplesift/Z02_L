<style>
fieldset {
    width: 95%;
}

.table {
    width: 99%;
}
</style>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 </legend>
    <form action="" method="post">

        <table class="table">
            <tr>
                <td>編號</td>
                <td>問卷題目</td>
                <td>投票總數</td>
                <td>結果</td>
                <td>狀態</td>
            </tr>
            <?php
$rows=$Que->all(['sh'=>1,'main_id'=>0]);
?>




<?php foreach ($rows as $idx=>$row) :  ?>
            <tr>
                <td><?=$idx+1;?></td>
                <td><?=$row['text'];?></td>
                <td><?=$row['vote'];?></td>
                <td><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
                <?php
                if(isset($_SESSION['user'])):
                ?>
                <td><a href="?do=vote&id=<?=$row['id'];?>">我要投票</a></td>
                <?php else :?>
                    <td><a href="?do=login">請先登入</a></td>
                <?php endif ?>
            </tr>
            <?php endforeach ;?>
        </table>
    </form>

</fieldset>