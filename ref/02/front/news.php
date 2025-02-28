<fieldset>
    <legend>    目前位置: 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <th style="width: 20%;">標題</th>
            <th>內容</th>
            <th style="width: 20%;">讚</th>
        </tr>
        <?php 
            $rows=$News->all();
            foreach ($rows as $row) :
                ?>
                <tr >
            <td style="width: 20%;"><?=$row['title']; ?></td>
            <!-- <td><?=mb_substr($row['text'],0,25) ;?></td> -->
            <td style="width: 20%;"></td>
        <?php endforeach ;?>
        </tr>
    </table>
    
</fieldset>