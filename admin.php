﻿<?php
include_once "./api/db.php";

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">
<style>

</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>健康促進網</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="alerr"
        style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
        <pre id="ssaa"></pre>
    </div>
    <div id="all">
        <div id="title">
            <?=date("Y 月 m 號 l");?>|
            今日瀏覽: <?=$Total->find(['date'=>date("Y-m-d")])['total'];?>|
            累積瀏覽: <?=qCol("SELECT SUM(total) from total");?>
        </div>



        <div id="title2">
            <a href="index.php">
                <img src="./icon/02B01.jpg" title="健康促進">
            </a>
        </div>
        <div id="mm">
            <div class="hal" id="lef">
                <a class="blo" href="?do=admin">帳號管理</a>
                <a class="blo" href="?do=po">分類網誌</a>
                <a class="blo" href="?do=news">最新文章管理</a>
                <a class="blo" href="?do=know">講座管理</a>
                <a class="blo" href="?do=que">問卷管理</a>
            </div>
            <div class="hal" id="main">
                <div>
                    <marquee behavior="" direction="" style="width:72%;">linebank</marquee>
                    <span style="width:25%; display:inline-block;">
                        <?php if(empty($_SESSION['user'])) {
                            echo "<a href='?do=login'>會員登入</a>";
                        }else {
                            echo "歡迎,{$_SESSION['user']}";
                            echo "<a href='./api/logout.php'><button>登出</button></a>";
                            if($_SESSION['user']=='admin'){
                                echo "<a href='admin.php'><button>管理</button></a>";
                            }
                        }

                            // <button></button>
                        
                        ?>
                        <!-- <a href="?do=login">會員登入</a> -->

                    </span>
                    <!-- include -->
                    <?php 
                     $do=$_GET['do']??'main';
                     $file="back/$do.php";
                     if(file_exists($file)){
                        include $file;
                     }else{
                        include "back/main.php";
                     }
                     ?>
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom">
            本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved
            <br>
            服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body>

</html>