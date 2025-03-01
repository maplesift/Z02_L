<?php
$sub=$Que->find($_GET['id']);
?>
<style>
.vote {
    margin: 5px;
}

.bar {
    background-color: silver;
    /* width: 30%; */
}
</style>
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$sub['text'];?></legend>

    <h2><?=$sub['text'];?></h2>

    <table>
        <tr>
            <td style="width: 20%;"></td>
            <td style="width: 40%;"></td>
            <td style="width: 10%;"></td>
        </tr>
        <?php
    
    $rows=$Que->all(['main_id'=>$_GET['id']]) ;
    
    foreach ($rows as $row) {
        if($row['vote']==0){
            $rate=0;
        }else{
            $rate= $row['vote']/$sub['vote'];   
        }
        $ratemath=  ceil($rate*100);
        ?>
        <tr>
            <td style="width: 40%;">

                <?=$row['text'];?>
            </td>
            <td style="width: 40%;">
                <div class="bar" style="width: <?=$ratemath;?>%"> &nbsp; </div>
            </td>
            <td>
                <?=$row['vote']?>票(<?=$ratemath;?>%)
            </td>
        </tr>
        <?php  } ?>
    </table>
    <div class="ct">
        <button onclick="location.href='index.php?do=que'">返回</button> </a>
    </div>

</fieldset>