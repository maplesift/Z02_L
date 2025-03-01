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
                $total=$News->count();
                $div=5;
                $pages=ceil($total/$div);
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
            
            
                $rows=$News->all(" limit $start,$div ");
                foreach ($rows as $key=>$row) :
            ?>
            <tr>
                <td class="ct"><?=$start+$key+1;?></td>
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
    
    <?php
    if($now-1>0){
        echo "<a href='?do=news&p=".($now-1)."'> < </a>";
    }
    for ($i=1; $i <=$pages ; $i++) { 
        $size=($now==$i)?'26px':'18px';
        echo  "<a href='?do=news&p=$i'style='font-size:$size ;'>$i</a> ";
    }
    if($now+1<=$pages){
        echo "<a href='?do=news&p=".($now+1)."'> > </a>";
    }
    ?>
</fieldset>