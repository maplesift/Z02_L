<style>
fieldset {
    margin: auto;
    width: 50%;
}

.text-r {
    color: red;
}

.f-r {
    float: right;
    margin-left: 3px;
}
</style>
<fieldset>
    <legend>會員登入</legend>
    <span class="text-r">請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table>
        <tr>
            <td>step1.登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>step2.登入密碼</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>

    </table>
    <div class="">

        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
        <a href="?do=reg" class="f-r">|尚未註冊</a>
        <a href="?do=forgot" class="f-r">忘記密碼 </a>
    </div>
</fieldset>
<script>
function login() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),

    }

    $.post("./api/chk_acc.php", {
        acc: user.acc
    }, function(res) {
        console.log('chkacc', res);

        if (parseInt(res) != 1) {
            alert("查無帳號");
        } else {
            $.post("./api/chk_pw.php", user, function(res) {
                console.log('login', res);
                if (parseInt(res) == 1) {
                    alert("登入成功")
                    if (user.acc == 'admin') {
                        location.href = 'admin.php';
                    } else {
                        location.href = 'index.php';
                    }
                } else {
                    alert("密碼錯誤");
                    reset();
                }
            })
        }
    })
}




function reset() {
    $("#acc").val("");
    $("#pw").val("");

}
</script>