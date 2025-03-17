<style>
    fieldset {
        width: 90%;
    }

    .table {
        width: 85%;
    }
    .detail{
        display: none;
    }
</style>
<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <form action="" method="post">

        <table class="table">
            <tr>
                <td style="width: 40%;">標題</td>
                <td style="width: 40%;">內容</td>
                <td style="width: 15%;"></td>
            </tr>
            <?php
                $total=$News->count();
                $div=5;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;
                $rows=$News->all(['sh'=>1]," limit $start,$div ");
                ?>
<?php foreach ($rows as $row) :  ?>

    
    <tr >
        <td class="t-title">
            <?=$row['title'];?>
        </td>
        <td class="r-title">
            <span class="title">

                <?=mb_substr($row['text'],0,15);?>
            </span>

            <span class="detail">
                
                <?=nl2br($row['text']);?>
            </span>
        </td>
        <?php if(isset($_SESSION['user'])): ?>
        <td style="width: 20%;">
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
</fieldset>
<script>
    $(".love").on("click",function(){
        let id= $(this).data('id')
        let love= $(this).text()
        console.log(id,love);
        $.post("./api/love.php",{id},()=>{
            if(love=="讚"){
                $(this).text("收回讚")
            }else{
                $(this).text("讚")
            }
        })
    })
    $(".r-title").on("click",function(){
        $(this).children(".title,.detail").toggle()
    })
    $(".t-title").on("click",function(){
        $(this).next().children(".title,.detail").toggle()
    })
</script>