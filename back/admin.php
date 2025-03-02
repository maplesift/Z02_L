<style>
fieldset {
    width: 85%;
    margin: auto;
}

.table {
    width: 100%;
}
</style>
<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del_acc.php" method="post">
        <table class="table">

            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php 
        $rows=$User->all();
        foreach ($rows as $row) :
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=$row['pw'];?></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            </tr>
            <?php  endforeach;?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    
    <legend>會員註冊</legend>
    <span style="color: red;">*請設定您要註冊的帳號及密碼（最長 12 個字元）</span>
    <table style="width: 90%;">
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱「忘記密碼時使用」</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
<div>
    <button onclick="reg()">新增</button>
    <button onclick="reset()">清除</button>
    <span >

    </span>
</div>
</fieldset>

<script>
    function reg(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }
        if(user.acc=='' || user.pw=='' || user.pw2=='' ||user.email==''){
            alert("不可空白")
            reset()
        }else if(user.pw !=user.pw2){
            alert("密碼錯誤")
            reset()
        }else{
            $.post('./api/chk_acc.php',{acc:user.acc},function(res){
                if(res>0){
                    alert("帳號重複")
                    reset()
                }else{
                    $.post('./api/reg.php',user,function(res){
                        if(res>0){
                            alert("註冊完成，歡迎加入")
                            location.reload()
                        }
                    })
                }
            })
        }
    }

   function reset(){
        $("#acc").val('')
        $("#pw").val('')
        $("#pw2").val('')
        $("#email").val('')
    }
</script>
