<style>
fieldset {
    width: 85%;
    margin: auto;
}

.table {
    width: 95%;
}
</style>
<fieldset>
    <legend>最新文章管理</legend>
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
            $div=5;
            $now=$_GET['p']??1;
            $pages=ceil($total/$div);
            $start=($now-1)*$div;
            
            // 選一個用
            $rows=$News->all(" limit $start,$div ");
            // $rows=$data->all();
            foreach ($rows as $key=>$row) :
                ?>
            <tr>
                <td><?=$start+$key+1;?></td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定修改">
            <!-- <input type="reset" value=""> -->
        </div>
    </form>
    <?php
        if($now-1>0){
            echo "<a href='?do=news&p=".($now-1)."'> < </a> ";
        }
        for ($i=1; $i <= $pages; $i++) { 
            $size=($now==$i)?'26px':'18px' ;
            echo "<a href='?do=news&p=$i' style='font-size:$size ;'>$i</a> ";
        }
        if($now+1<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'> > </a> ";
        }
    ?>

</fieldset>