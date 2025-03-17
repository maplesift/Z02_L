<style>
    fieldset {
        width: 90%;
    }

    .table {
        width: 85%;
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

    
    <tr>
        <td><?=$row['title'];?></td>
        <td><?=mb_substr($row['text'],0,15);?></td>
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
</script>