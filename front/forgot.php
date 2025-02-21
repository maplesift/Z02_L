<style>
    fieldset {
    margin: auto;
    width: 50%;
}
</style>

<fieldset>
    <legend>忘記密碼</legend>
    <span class="text-r">請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td id="res"></td>
        </tr>
        <tr>
            <td><input type="button" value="尋找" onclick="forgot()"></td>
        </tr>
    </table>
    <script>
function forgot(){
    let email = $("#email").val();
    $.get("./api/forgot.php",{email},function(res){
        $("#res").html(res);
    })
}
    </script>