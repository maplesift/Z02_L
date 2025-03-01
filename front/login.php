<style>
    fieldset{
        margin: auto;
        width: 60%;
    }
</style>
<fieldset>
    <!-- <?=$_SESSION['user']?> -->
    <legend>會員登入</legend>
    <table style="width: 80%;">
        <tr>
            <td>帳號:</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>
    <div class="">
        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
        <a href="?do=forgot">忘記密碼|</a>
        <a href="?do=reg">尚未註冊</a>
    </div>
</fieldset>
<script>
function login(){
    let user={
        acc:$("#acc").val(),
        pw:$("#pw").val(),

    }
        $.post("./api/chk_acc.php",{acc:user.acc},function(res){
            console.log('chk_acc',res);
            if(res=0){
                alert("查無帳號")
                reset()

            }else{
                $.post("./api/chk_pw.php",user,function(res){
                console.log('chk_pw',res);
                 if(res>0){
                    alert("登入成功")
                    if(user.acc=="admin"){
                        location.href='admin.php'
                    }else{
                        location.href='index.php'
                    }
                 }
                 else{
                    alert("密碼錯誤")
                    reset()
                 }
                })
            }
        })
    
}
function reset(){
    $("#acc").val('')
        $("#pw").val('')


}
</script>
</script>