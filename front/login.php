<style>
    fieldset{
        margin: auto;
        width: 50%;
    }
    .text-r{
        color: red;
    }
    .f-r{
        float: right;
        margin-left: 3px;
    }
</style>
<fieldset >
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

        <button onclick="">註冊</button>
        <button onclick="">清除</button>
        <a href="?do=reg" class="f-r">|尚未註冊</a>
        <a href="?do=forget" class="f-r">忘記密碼 </a>
    </div>
</fieldset>