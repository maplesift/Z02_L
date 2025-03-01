<style>
fieldset {
    width: 95%;
}
</style>

<fieldset>
    <legend>
        最新文章管理
    </legend>
    <a href="?do=add_news"><button>新增文章</button></a>

    <form action="./api/edit_news.php" method="post">
        <table style="width: 90%;">
            <tr>
                <td class="ct" style="width: 20%;">編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php 
            
            $rows=$News->all();
            foreach ($rows as $key=>$row) :
            ?>
            <tr>
                <td class="ct"><?=$key+1;?></td>
                <td><?=$row['title'];?></td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>">
                </td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>">
                </td>
                <input type="hidden" name="id[]" value="<?=$row['id']?>">
            </tr>
            <?php
            endforeach ;
            ?>
        </table>
    </form>
</fieldset>