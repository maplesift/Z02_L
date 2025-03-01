
<style>
    .detail{
        display: none;
    }
    .text{
        color: blue;
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <!-- 讚 -->
            <td style="width: 25%;"></td>
        </tr>
        <?php 
            $total=$News->count();
            $div=5;
            $pages=ceil($total/$div);
            $now=$_GET['p']??1;
            $start=($now-1)*$div;
            $rows=$News->all(['sh'=>1]," order by `love` desc limit $start,$div ");
            foreach ($rows as $row):  
        ?>
        <tr >
            <td class="title"><?=$row['title'] ;?></td>
            <td class="r-title">
                <span class="text"><?=mb_substr($row['text'],0,25) ;?></span>
                <span class="detail"> <?=nl2br($row['text']) ;?></span>
            </td>
            <td style="width: 25%;"class="ct" >
                <a href=""></a>
                <?php
                if(isset($_SESSION['user'])){
                    $chk=$Log->find(['user'=>$_SESSION['user'],'news'=>$row['id']]);
                    $like=($chk)?'收回讚':'讚';
                    echo "<a href='#' data-id={$row['id']} class='like'>$like</a>";
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

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
<script>
$(".like").on("click",function(){
    let like=$(this).text()
    let id = $(this).data("id")
    console.log(like, id);
    $.post("./api/like.php",{id},()=>{
        if(like=='讚'){
            $(this).text("收回讚")
        }else{
            $(this).text("讚")
        }
    })
})









    $(".r-title").on("click",function(){
        $(this).children(".text,.detail").toggle()
    })
    $(".title").on("click",function(){
        $(this).next().children(".text,.detail").toggle()
    })
</script>