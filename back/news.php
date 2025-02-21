<style>
fieldset {
    margin: auto;
    width: 70%;
}

.table {
    width: 98%;
    margin: auto;
}

.text-r {
    color: red;
}
</style>

<fieldset>

    <legend>最新文章管理</legend>
    <form action="./api/edit_news.php" method="post">


        <table class="table">
            <tr>
                <td>編號</td>
                <td style="width: 50%;" class="ct">標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
        // 找出總比數 
        $total=$News->count();
        // 三筆換頁
        $div=3;
        // 
        $pages=ceil($total/$div);
        $now=$_GET['p']??'1';
        $start=($now-1)*3;

        $rows=$News->all(" limit $start,$div");
        foreach ($rows as $row) :
        ?>
            <tr>
                <td>
                    <?=$row['id']; ?>
                </td>
                <td class="ct">
                    <?=$row['title']; ?>

                </td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':''; ?>>

                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </td>
            </tr>
            <?php  endforeach ;?>
        </table>
        <div class="ct"><a href=""></a>
            <!-- 分頁 -->
        <?php
        if($now-1>0){
            echo "<a href='?do=news&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i <= $pages; $i++) { 
            $size =($i==$now)?'26px':'18px';
            echo "<a href='?do=news&p=$i' style=font-size:$size;> $i </a>";
        }

        
        if($now+1<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'> > </a>";
        }

       
       ?>
        </div>
        <div class="ct">
            <!-- <input type="hidden" name="id"> -->
            <input type="submit" value="確定修改">
            <input type="reset" value="清空選取">

    </form>

</fieldset>