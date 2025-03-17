<style>
    fieldset{
        width: 85%;
        margin: auto;
    }
    .table{
        width: 95%;
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 >最新文章區</legend>
    <table class="table">
        <tr>
            <td style="width: 30%;">標題</td>
            <td>內容</td>
            <td style="width: 20%;"></td>
        </tr>
        <?php
$total=$News->count();
$div=5;
$now=$_GET['p']??1;
$pages=ceil($total/$div);
$start=($now-1)*$div;

// 選一個用
$rows=$News->all( ['sh'=>1] ," limit $start,$div ");
// $rows=$data->all();
foreach ($rows as $row) :
?>

        <tr>
            <td style="width: 20%;"><?=$row['title'];?></td>
            <td><?=mb_substr($row['text'],0,20);?></td>
            <td style="width: 20%;">
            <?php
            if(isset($_SESSION['user'])){
                $chk=$Log->find(['user'=>$_SESSION['user'],'news'=>$row['id']]);
                $like=($chk)?'收回讚':'讚';
                echo "<a href='#' class='like' data-id={$row['id']}>$like</a>";
            }
            ?>
<!-- <a href='#'>讚</a> -->
            </td>
        </tr>
<?php
endforeach;
?>
    </table>
    
<?php
if($now-1>0){
    echo "<a href='?do=news&p=".($now-1)."'> < </a> ";
}
for ($i=1; $i <=$pages; $i++) { 
    $size=($now==$i)?'26px':'18px' ;
    echo "<a href='?do=news&p=$i' style='font-size:$size ;'>$i</a> ";
}
if($now+1<=$pages){
    echo "<a href='?do=news&p=".($now+1)."'> > </a> ";
}
?>
</fieldset>
<script>
    $(".like").on("click",function(){
        let like = $(this).text()
        let id = $(this).data('id')
        console.log(like,id);
        $.post("./api/like.php",{id},()=>{
            if(like=='讚'){
                $(this).text('收回讚')
            }else{
                $(this).text('讚')
            }
        })
    })
</script>