<style>
    fieldset{
        margin: auto;
        width: 50%;
    }
    .text-r{
        color: red;
    }
</style>
<fieldset >
    <legend>會員註冊</legend>
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
        <tr>
            <td>step3.再次確認密碼</td>
            <td><input type="text" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>step4.信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="">

        <button onclick="">註冊</button>
        <button onclick="">清除</button>
    </div>
</fieldset>