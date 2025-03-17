<style>
fieldset {
    width: 90%;
}

.table {
    width: 95%;
}

.detail {

    background: rgba(51, 51, 51, 0.8);
    color: #FFF;
    height: 400px;
    width: 300px;
    position: fixed;
    top: 29%;
    left: 56%;
    display: none;
    z-index: 9999;
    overflow: auto;

}.type_n{
    color: skyblue;
}
</style>
<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <form action="" method="post">

        <table class="table">
            <tr>
                <td style="width: 35%;">標題</td>
                <td style="width: 35%;">內容</td>
                <td style="width: 25%;"></td>
            </tr>
            <?php
                $total=$News->count();
                $div=5;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;
                $rows=$News->all(['sh'=>1]," order by `love` desc limit $start,$div ");
                ?>
            <?php foreach ($rows as $row) :  ?>


            <tr>
                <td class="t-title">
                    <?=$row['title'];?>
                </td>
                <td class="r-title">
                    <span class="title">

                        <?=mb_substr($row['text'],0,15);?>
                    </span>

                    <span class="detail">
                        <h2 class="ct type_n"><?=$row['type_name'];?></h2>
                        <?=nl2br($row['text']);?>
                    </span>
                </td>

                <?php if(isset($_SESSION['user'])): ?>
                <td style="width: 25%;">
                    <?=$row['love'];?>
                    個人說<span class="good"></span>
                    <?php  
                    $chk=$Log->find(['news_id'=>$row['id'],'user'=>$_SESSION['user']]);
                    $love=($chk)?"收回讚":"讚";
                    ?>
                    <a href='#' class="love" data-id="<?=$row['id'];?>"><?=$love?></a>
                </td>
                <?php  endif; ?>
            </tr>
            <?php endforeach ;?>
        </table>
    </form>
    <?php
            if($now-1>0){
                echo "<a href='?do=pop&p=".($now-1)."'> < </a>";
            }
            for ($i=1; $i <=$pages; $i++) {
                $size=($now==$i)?'26px':'18px';
                echo "<a href='?do=pop&p=$i' style='font-size:$size ;'> $i </a>";
            }
            if($now+1<=$pages){
                echo "<a href='?do=pop&p=".($now+1)."'> > </a>";
            }
            
            ?>
</fieldset>
<script>
$(".love").on("click", function() {
    let id = $(this).data('id')
    let love = $(this).text()
    console.log(id, love);
    $.post("./api/love.php", {
        id
    }, () => {
        if (love == "讚") {
            $(this).text("收回讚")
            location.reload()
        } else {
            $(this).text("讚")
            location.reload()
        }
    })
})
$(".r-title").hover(function() {
        $(this).find(".detail").show()
    },
    function() {
        $(this).find(".detail").hide()
    })

// $(".r-title").on("click",function(){
//         $(this).children(".title,.detail").toggle()
//     })
//     $(".t-title").on("click",function(){
//         $(this).next().children(".title,.detail").toggle()
//     })
</script>