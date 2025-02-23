<style>
.detail {
    background: rgba(51, 51, 51, 0.8);
    color: #FFF;
    height: 300px;
    width: 400px;
    position: absolute;
    display: none;
    z-index: 9999;
    overflow: auto;
    left: 0;
    top: 0;
}
h2{
   color: skyblue; 
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th>人氣</th>
        </tr>
        <tr>
            <?php 
                $total=$News->count();
                // 三筆換頁
                $div=5;
                // 
                $pages=ceil($total/$div);
                $now=$_GET['p']??'1';
                $start=($now-1)*$div;

                $rows=$News->all(['sh'=>1]," order by `love` desc limit $start,$div");
                foreach ($rows as $row) :
                    
                
                ?>
            <td style="width: 20%;" class="r-title"><?=$row['title'];?></td>
            <td style="width:60%;position:relative;" class="ct">
                <span class="title">
                    <?=mb_substr($row['text'],0,25);?>
                </span>
                <span class="detail">
                    <h2><?=$News::$type[$row['type']];?></h2>
                    <?=nl2br($row['text']);?>
                </span>
            </td>
            <td>
                <!--讚-->
                <?=$row['love'];?>個人說<div class="good"></div>
                <?php 
                    if(isset($_SESSION['user'])) {
                        $chk=$Log->count(['news'=>$row['id'],'user'=>$_SESSION['user']]);
                        $like=($chk>0)?'收回讚':'讚';
                        echo " <a href='#'data-id={$row['id']} class='like'>$like</a>";
                    }
                    ?>
                <!-- <a href="">讚</a> -->


            </td>
        </tr>
        <?php
            endforeach;
            ?>
    </table>
    <?php
        if($now-1>0){
            echo "<a href='?do=pop&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i <= $pages; $i++) { 
            $size =($i==$now)?'26px':'18px';
            echo "<a href='?do=pop&p=$i' style=font-size:$size;> $i </a>";
        }

        
        if($now+1<=$pages){
            echo "<a href='?do=pop&p=".($now+1)."'> > </a>";
        }

       
       ?>


</fieldset>
<script>
$(".like").on("click", function() {
    let id = $(this).data('id');
    let like = $(this).text();
    console.log(like);
    $.post("./api/like.php", {
        id
    }, () => {

        if (like == "讚") {
            $(this).text("收回讚")
        } else {
            $(this).text("讚")
        }
        location.reload()
    })
})
$(".r-title").hover(
    function(){
        $(this).next().children('.detail').show();
},
    function(){
        $(this).next().children('.detail').hide();
})
$(".ct").hover(
    function(){
        $(this).children('.detail').show();
},
    function(){
        $(this).children('.detail').hide();
})
</script>