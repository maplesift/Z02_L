<style>
.type{
    display: inline-block;
    margin: -5px;
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
if(isset($_GET['type'])){

    $row=$News->find(['type_id'=>$_GET['type']]);
}
    // dd($rows);
?>
<div>
    <!-- 目前位置: 首頁 > 分類網誌 > <span ><?=$rows[0]['type'];?></span> -->
</div>

    <a href="?type=1" class="type"><button>健康新知</button></a>
    <a href="?type=2" class="type"><button>菸害防制</button></a>
    <a href="?type=3" class="type"><button>癌症防治</button></a>
    <a href="?type=4" class="type"><button>慢性病防治</button></a>
 <?php   if(isset($_GET['type'])):?>
    <h2><?=$row['type'];?></h2>
    <div>
    <h3><?=$row['title'];?></h3><hr>
        <?=nl2br($row['text']);?>
    </div>
  <?php  endif;?>