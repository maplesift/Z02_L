<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table style="width: 90%;" class="ct">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $rows=$Que->all(['main_id'=>0]);
        foreach ($rows as $key=>$row) :
        ?>
        <tr>
            <td><?=$key+1;?>.</td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td><a href="?do=result&id=<?=$row['id'];?>">結果</a> </td>
            <td>
                <?php 
                if(!isset($_SESSION['user'])){
                    echo "請先登入";
                }else{
                    echo "<a href='?do=vote&id={$row['id']}'>參與投票</a>";
                }

                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>