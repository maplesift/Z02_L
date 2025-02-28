<style>
.type{
    display: block;
    margin: 5px;
}
.fl1{
    width: 20%;
    display: inline-block;
    vertical-align: top;
}
.fl2{
    width: 50%;
    display: inline-block;
}
.text{
    display: none;
}
.title{
    color: blue;
}
</style>
<?php
    $rows=$News->all(['type_id'=>$_GET['type']]);
    // dd($rows);
?>
<div>
    目前位置: 首頁 > 分類網誌 > <span ><?=$rows[0]['type'];?></span>
</div>
<fieldset class="fl1">
    <legend>分類網誌</legend>
    <a href="?do=po&type=1" class="type">健康新知</a>
    <a href="?do=po&type=2" class="type">菸害防制</a>
    <a href="?do=po&type=3" class="type">癌症防治</a>
    <a href="?do=po&type=4" class="type">慢性病防治</a>
</fieldset>
<fieldset class="fl2">
    <legend>文章列表</legend>
    <?php foreach ($rows as $row) :
     ?>
     <div class="r-title">
         <div class="title"><?=$row['title'];?></div>
         <div class="text"><?=$row['text'] ;?></div>
    </div>
    <!-- <div class="text"><?=mb_substr($row['text'],0,25) ;?></div> -->
    <?php endforeach ;?>
</fieldset>
<script>
    $(".r-title").on("click",function(){
        $(this).children('.title,.text').toggle();
    })
</script>