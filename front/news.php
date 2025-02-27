<style>
.detail {
    display: none;
}
</style>
<fieldset>
    <legend> 目前位置: 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <th style="width: 20%;">標題</th>
            <th>內容</th>
            <th style="width: 20%;">
                <!-- 讚 -->
            </th>
        </tr>
        <?php 
            $rows=$News->all();
            foreach ($rows as $row) :
                ?>
        <tr >
            <td style="width: 20%;" class="title">
                <?=$row['title'];?>
            </td>

            <td class="r-title ct">
                <span class="text">

                    <?=mb_substr($row['text'],0,20) ;?>
                </span>
                <span class="detail ">

                    <?=nl2br($row['text']);?>
                </span>
            </td>

            <td style="width: 20%;">
            <?php
            if(isset($_SESSION['user'])){
                $chk= $Log->find(['news'=>$row['id'],'user'=>$_SESSION['user']]);
                $love=($chk)?"收回讚":"讚";
                echo "<a href='#' class='love' data-id='{$row['id']}'>$love</a>";
                
            } 
            ?> 
            </td>
            <?php endforeach ;?>
        </tr>
    </table>

</fieldset>
<script>
$(".love").on("click",function(){
    let love = $(this).text();
    let id = $(this).data('id')
    console.log(id,love);
    $.post("./api/love.php",{id},()=>{
        if(love=="讚"){
             $(this).text("收回讚")
        }else{
            $(this).text("讚")
        }

    })
    
})




$(".r-title").on("click", function() {
    $(this).find(".text,.detail").toggle()
})
$(".title").on("click", function() {
    $(this).next().find(".text,.detail").toggle()
})



</script>