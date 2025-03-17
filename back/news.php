<style>
fieldset {
    width: 90%;
}

.table {
    width: 85%;
}
</style>
<fieldset>
    <legend> </legend>
    <form action="./api/edit_news.php" method="post">

        <table class="table">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
                $total=$News->count();
                $div=3;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;
                $rows=$News->all(" limit $start,$div ");
                ?>
            <?php foreach ($rows as $idx=>$row) :  ?>
            <tr>
                <td><?=$start+$idx+1?></td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            <?php endforeach ;?>
        </table>
        <div class="ct">
            <!-- <a href='' style='font-size: ;'></a> -->
            <?php
            if($now-1>0){
                echo "<a href='?do=news&p=".($now-1)."'> < </a>";
            }
            for ($i=1; $i <=$pages; $i++) {
                $size=($now==$i)?'26px':'18px';
                echo "<a href='?do=news&p=$i' style='font-size:$size ;'> $i </a>";
            }
            if($now+1<=$pages){
                echo "<a href='?do=news&p=".($now+1)."'> > </a>";
            }
            
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>

</fieldset>