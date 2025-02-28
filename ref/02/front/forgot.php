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
    <legend>忘記密碼</legend>
    <table>
        <tr>
            <td style="width: 90%;">請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td style="width: 90%;">
                <input type="text" name="email" id="email" style="width: 250px;">
            </td>
        </tr>
        <tr>
            <td>
                <div id="result"></div>
            </td>
        </tr>
    </table>
    <div class="">
        <button onclick="forgot()">尋找</button>
        <!-- <button onclick="reset()">清除</button> -->

    </div>
</fieldset>
<script>
function forgot() {
    let email= $("#email").val();
    $.post("./api/forgot.php",{email},function(res){
        $("#result").html(res);
    })
}

</script>