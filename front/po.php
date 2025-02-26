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
</style>
<?php
    $News->all(['type'=>$_GET['type']]);
?>
<div>
    目前位置: 首頁 > 分類網誌 > <span class="title"></span>
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
</fieldset>