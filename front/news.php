<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
        <table>
            <tr>
                <th>標題</th>
                <th>內容</th>
                <th><!--讚--></th>
            </tr>
            <tr>
                <?php 
                $total=$News->count();
                // 三筆換頁
                $div=5;
                // 
                $pages=ceil($total/$div);
                $now=$_GET['p']??'1';
                $start=($now-1)*3;

                $rows=$News->all(['sh'=>1],"limit $start,$div");
                foreach ($rows as $row) :
                    
                
                ?>
                <td style="width: 20%;"><?=$row['title'];?></td>
                <td style="width: 60%;" class="ct"><?=mb_substr($row['text'],0,25);?></td>
                <td><!--讚-->
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
            echo "<a href='?do=news&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i <= $pages; $i++) { 
            $size =($i==$now)?'26px':'18px';
            echo "<a href='?do=news&p=$i' style=font-size:$size;> $i </a>";
        }

        
        if($now+1<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'> > </a>";
        }

       
       ?>
        

</fieldset>
<script>
    $(".like").on("click",function(){
        let id= $(this).data('id');
        let like= $(this).text();
        console.log(like);
        $.post("./api/like.php",{id},()=>{
            
            if(like=="讚"){
                $(this).text("收回讚")
            }else{
                $(this).text("讚")
            }
        })
    })
</script>