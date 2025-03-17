<style>
fieldset {
    width: 90%;
}

.table {
    width: 85%;
}
</style>
<fieldset>
    <legend>會員註冊</legend>
    <span style="color: red;">*請設定您要註冊的帳號及密碼（最長12個字元）</span>

    <table class="table">
        <tr>
            <td>
            Step1:登入帳號
            </td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td>
            Step2:登入密碼
            </td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>
            Step3:再次確認密碼
            </td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td>
            Step4:信箱(忘記密碼時使用)
            </td>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
    <div class="">

        <button onclick="reg()">登入</button>
        <button onclick="reset()">清除</button>
    </div>

</fieldset>

<script>
    function reg(){
        let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val()
    }
    console.log();
    
    if(user.acc == '' || user.pw == '' ||user.pw2 == '' ||user.email == ''){
        alert("不可空白")
        reset()
    }else if(user.pw != user.pw2){
        // console.log(user);
        alert("密碼錯誤")
        reset()
    }else{
        $.post("./api/chk_acc.php", {
        acc: user.acc
    }, function(res) {
        console.log(res);

        if(res > 0){
            alert("帳號重複")
            reset()
        }else{
            $.post("./api/reg.php", user, function(res) {
                console.log(res);
                if(res>0){
                    alert("註冊完成，歡迎加入")
                    location.href='index.php';
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