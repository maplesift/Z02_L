<style>
fieldset {
    width: 90%;
} 

.table {
    width: 99%;
}
.bar{
    background-color:silver;
    /* width: 50%; */
}
</style>
<?php
$main=$Que->find(['id'=>$_GET['id']]);
$subs=$Que->all(['main_id'=>$main['id']]);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 ><?=$main['text'];?> </legend>
    <h2><?=$main['text'];?></h2>
    <table class="table">
            <?php
            foreach ($subs as $sub) :
                    if($sub['vote']==0){
                        $rate=0;
                    }else{
                        $rate=$sub['vote']/$main['vote'];
                        
                    }
                    $math=$rate*100;
            ?>
        <tr style="width: 100%;">
            <td style="width: 35%;">

        <?=$sub['text'];?>

            </td>
            <td >
                <div class="bar" style="width: <?=$math?>%;">&nbsp;</div>
            </td>
            <td style="width: 20%;">
            票(<?=$math?>%)
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="ct">
        <a href="?do=que" class=""><button>返回</button></a>
    </div>
</fieldset>


<?php
