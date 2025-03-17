<style>

    .table{
        width: 95%;
    }
    .fld1{
    width: 20%;
    vertical-align: top;    
    display: inline-block;
    }
    .fld2{
    width: 50%;
        display: inline-block;
    }
    .type{
        display: block;
        margin-top: 10px;
    }
    .detail{
        display: none;
    }
</style>
<?php 
$row=$News->find(['type_id'=>$_GET['type']])
?>
<div>
    目前位置:首頁 > 分類網誌 > <span> <?=$row['type'];?></span>
</div>
<fieldset class="fld1">
    <legend>分類網誌</legend>
    <a href="?do=po&type=1" class="type">健康新知</a>
<a href="?do=po&type=2" class="type">菸害防治</a>
<a href="?do=po&type=3" class="type">癌症防治</a>
<a href="?do=po&type=4" class="type">慢性病防治</a>
</fieldset>
<fieldset class="fld2">
    <legend>文章列表</legend>

    <div id="r-title">
    <span class="title"><?=$row['title'];?></span>    
    <span class="detail"><?=nl2br($row['text']);?></span>
    </div>

</fieldset>
<script>
    $("#r-title").on("click",function(){
        $(this).children(".title,.detail").toggle()
    })

</script>