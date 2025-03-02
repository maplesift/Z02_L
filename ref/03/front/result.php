<?php
$row=$Que->find($_GET['id']);
$opts=$Que->all(['main_id'=>$_GET['id']]);
// echo $row['vote'];
// echo $opts[0]['vote'];
?>

<style>
    .bar{
        background-color: silver;
        
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <span><?=$row['text'];?> </span></legend>
    <h2><?=$row['text'];?></h2>
    <table style="width: 90%;">
    
        <tr>
            <td style="width: 20%;"></td>
            <td style="width: 40%;"></td>
            <td style="width: 10%;"></td>
        </tr>
    <?php foreach ($opts as $opt) : 
        if($opt['vote']==0){
            $rate=0;
        }else{
            $rate=$opt['vote']/$row['vote'];
            // echo $rate;
        }
        
        $ratemath=ceil($rate*100);
        
        ?>
        <tr>
            <td style="width: 40%;">

                <?=$opt['text'];?>
            </td>
            <td style="width: 40%;">
                <div class="bar" style="width: <?=$ratemath;?>%"> &nbsp; </div>
            </td>
            <td>
                <?=$opt['vote']?>票(<?=$ratemath;?>%)
            </td>
        </tr>
        
        
        <?php
endforeach;
?>
</table>

<div class="ct">
    <input type="button" onclick="location.href='?do=que'" value="返回">
</div>


</fieldset>
