<style>
fieldset {
    width: 95%;
}


</style>
<fieldset>
    <legend>帳號管理</legend>
    <div class="ct">
        <form action="./api/del_user.php" method="post">

            <table  style="width: 70%;margin: auto;">
                <tr>
                    <td>帳號</td>
                    <td>密碼</td>
                    <td>刪除</td>
                </tr>
                <?php
        $rows=$User->all();
        foreach ($rows as $row):
            ?>
                <tr>
                    <td><?=$row['acc'];?></td>
                    <td><?=$row['pw'];?></td>
                    <td>
                    <input type="checkbox" name="del" value="<?=$row['id']?>">
                </td>
                </tr>
                <?php endforeach;?>
            </table>
            <div class="ct">
                <input type="submit" value="確定刪除">
                <input type="reset" value="清空選取">
            </div>
        </form>
    </div>
</fieldset>


<h2>新增會員</h2>
<span style="color:red;">*請設定您要註冊的帳號及密碼(最⾧ 12 個字元)</span>
<table style="width: 80%;">
    <tr>
        <td>帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td>確認密碼:</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td>信箱</td>
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
    if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
        alert("不可空白")
    } else if (user.pw != user.pw2) {
        alert("密碼錯誤")
        reset()

    } else {
        $.post("./api/chk_acc.php", {
            acc: user.acc
        }, function(res) {
            console.log('chk_acc', res);
            if (res > 0) {
                alert("帳號重複")
                reset()

            } else {
                $.post("./api/reg.php", user, function(res) {
                    console.log('reg', res);
                    if (res > 0) {
                        alert("註冊完成,歡迎加入")
                        location.reload()
                    }
                })
            }
        })
    }
}

function reset() {
    $("#acc").val('')
    $("#pw").val('')
    $("#pw2").val('')
    $("#email").val('')

}
</script>