<fieldset style="width:50%;margin:auto;">
    <legend>忘記密碼</legend>
    <!-- table>tr*3>td*2 -->
    <table style="width:98%">
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" style="width:98%"></td>
        </tr>
        <tr>
            <td id=result>
                <!-- 找到email的值  後端用find() -->
            </td>
        </tr>
        <tr>
            <td><input type="button" value="尋找" onclick="forgot()"></td>
        </tr>
    </table>
</fieldset>
<script>
function forgot() {
    let email = $("#email").val();
    $.get("./api/chk_email.php",{email},(res)=>{
        $("#result").html(res);
    })
}
</script>