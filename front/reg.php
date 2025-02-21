<style>
fieldset {
    margin: auto;
    width: 50%;
}

.text-r {
    color: red;
}
</style>
<fieldset>
    <legend>會員註冊</legend>
    <span class="text-r">請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table>
        <tr>
            <td>step1.登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>step2.登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>step3.再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>step4.信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="">

        <button onclick="reg()">註冊</button>
        <button onclick="reset()">清除</button>
    </div>
</fieldset>
<script>
    
function reg() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val(),
    }
    if (user.acc == "" && user.pw == "" && user.pw2 == "" && user.email == "") {
        alert("不可空白");
    } else if (user.pw != user.pw2) {
        alert("密碼錯誤")
    } else {
        $.post("./api/chk_acc.php", {
            acc: user.acc
        }, function(res) {
            console.log('chkacc', res);

            if (parseInt(res) == 1) {
                alert("帳號重複");
            } else {
                $.post("./api/reg.php", user, function(res) {
                    console.log('reg', res);
                    if (parseInt(res) == 1) {
                        alert("註冊完成,歡迎加入")
                    }
                })
            }
        })
    }
}

function reset() {
    $("#acc").val("");
    $("#pw").val("");
    $("#pw2").val("");
    $("#email").val("");
}
</script>

<!-- $.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
	{ -->