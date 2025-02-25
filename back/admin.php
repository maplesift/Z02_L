<style>
fieldset {
    width: 50%;
    margin: auto;
}

.f-r {
    float: right;
}
</style>
<fieldset>
    <legend>帳號管理</legend>
<form action="./api/del_acc.php" method="post">

    <table style="width: 100%;" class="ct">
        <tr class="ct">
            <th  style="width: 40%;">帳號</th>
            <th style="width: 30%;">密碼</th>
            <th style="width: 30%;">刪除</th>
        </tr>
        <?php
        $rows=$User->all();
        foreach ($rows as $row) :
        ?>
        <tr>
            <td style="width: 40%;"><?=$row['acc'];?></td>
            <td style="width: 30%;"><?=str_repeat("*",strlen($row['pw']));?></td>
            <td style="width: 30%;"><input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>"></td>
        </tr>
        <?php  endforeach ;?>
    </table>
    <div class="ct">
        <input type="submit" value="確定刪除">
        <input type="reset" value="清空選取">
    </div>
</form>

    <h2>新增會員</h2>
    <span style="color: red;">
        *請設定您要註冊的帳號及密碼（最長 12 個字元）
    </span>
    <table>
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
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="">
        <button onclick="login()">新增</button>
        <button onclick="reset()">清除</button>

    </div>
</fieldset>
<script>
function login() {
    user = {
        acc: $('#acc').val(),
        pw: $('#pw').val(),
        pw2: $('#pw2').val(),
        email: $('#email').val(),
    }
    if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
        alert("不可空白");
    } else if (user.pw != user.pw2) {
        alert("密碼錯誤");
    } else {
        $.post("./api/chk_acc.php", {
            acc: user.acc
        }, function(res) {
            // console.log(res);
            if (res > 0) {
                alert("帳號重複");
            } else {
                $.post("./api/reg.php", user, (res) => {
                    console.log(res);
                    if (res > 0) {
                        alert("註冊成功,歡迎加入");
                        reset();
                    }
                })
            }
        })
    }
}

function reset() {
     $('#acc').val("")
     $('#pw').val("")
     $('#pw2').val("")
     $('#email').val("")
}
</script>