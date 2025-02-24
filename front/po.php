<style>
.type {
    margin: 10px;
    display: block;
    /* vertical-align: top; */
}

.fld-1 {
    display: inline-block;
    vertical-align: top;
}

.fld-2 {
    display: inline-block;
}

.detail {
    display: none;
}
.title{
    color: blue;
    cursor: pointer;
}
</style>
<?php 
            if(isset($_GET['type'])){
                // $title=$News->find(['type'=>$_GET['type']]);
                $rows=$News->all(['type'=>$_GET['type']]);
                // dd($rows);
            }
                // foreach ($rows as $row) :
?>

<div>
    目前位置 : 首頁 > 分類網誌 > <span id="type"><?=$rows[0]['type_tx'];?></span>
</div>

<fieldset style="width: 150px;" class="fld-1">
    <legend>分類網誌</legend>
    <div class="title">
        <a href="?do=po&type=1" class="type" data-type="1">健康新知</a>
        <a href="?do=po&type=2" class="type" data-type="2">菸害防治</a>
        <a href="?do=po&type=3" class="type" data-type="3">癌症防治</a>
        <a href="?do=po&type=4" class="type" data-type="4">慢性病防治</a>
    </div>
</fieldset>
<fieldset style="width: 500px;" class="fld-2">
    <legend>文章列表</legend>

        <?php
            //  $type=$_GET['type']??'1';
            if(isset($_GET['type'])):
                foreach ($rows as $row) :
        
        ?>
            <div class="r-title">
                <div class="title"><?=$row['title'];?></div>
                <div class="detail"><?=nl2br($row['text']);?></div>
            </div>
    <?php  endforeach;  ?>
    <?php  endif;  ?>
    <div>
    </div>
</fieldset>

<script>
// $(".type").on("click", function() {
//     $(this).text()
//     console.log($(this).text());

//     $("#type").text($(this).text())
// })


$(".r-title").on("click",function(){
    $(this).children('.title,.detail').toggle();
})
</script>