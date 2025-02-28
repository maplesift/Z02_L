<fieldset>
    <legend>目前位置: 首頁 > 問卷調查</legend>
    <table style="width: 95%;">
        <tr>
            <td>編號</td>
            <td style="width: 45%;" class="ct">問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $rows=$Que->all(['main_id'=>0]);
        foreach ($rows as $key =>$row) :
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
        <?php 
        if(isset($_SESSION['user'])){
            echo "<td><a href='?do=vote&id={$row['id']}'>參與投票</a></td>";
        }else{
            echo "<td><a href='?do=login'>請先登入</a></td>";
        }
        ?>
            
        </tr>
        <?php endforeach ;?>
    </table>
</fieldset>