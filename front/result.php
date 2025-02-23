
<?php
$sub=$Que->find($_GET['id']);
$opts=$Que->all(['main_id'=>$_GET['id']]);

?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$sub['text'];?></legend>
    <h3><?=$sub['text'];?></h3>

    <?php
    foreach ($opts as $opt) :
        if($opt['vote']==0){
            $rate=0;
        }else{
            $rate=$opt['vote']/$sub['vote'];
        }
        $ratemath=round($rate*100,2);
        
        ?>
    <div class="result">
        <div class="text">
            <?=$opt['text'] ;?>

        </div>
        <div class="bar">
            <div class="b-show" style="width:<?=$ratemath;?>%;">
                &nbsp;

            </div>
        </div>
        <div class="tot"><?=$opt['vote'];?>票(<?=$ratemath;?>%)</div>
    </div>
    <?php endforeach; ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">
            返回
        </button>

    </div>

</fieldset>
        <style>
        .result {
            display: flex;
            align-items: center;
            width: 100%;
        }
        
        .text {
            width: 40%;
        }
        
        .bar {
            width: 50%;
        
        }
        .b-show{
            background: #999;

            height: 20px;
        }
        
        .tot {
            width: 10%;
        }
        </style>