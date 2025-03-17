<style>
    fieldset{
        width: 55%;
        margin: auto;
    }
</style>
<fieldset>
    <legend>忘記密碼</legend>
    <table>
    <tr>
            <td>
                請輸入信箱以查詢密碼
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="" id="email">

            </td>
        </tr>
        <tr>
            <td>
                <span id="res"></span>

            </td>
        </tr>
    </table>
    <div>
        <button onclick="forgot()">尋找</button>
    </div>
</fieldset>
<script>
   function forgot(){
    let email= $("#email").val()
    $.post('./api/forgot.php',{email},function(res){
        $("#res").html(res);
    })
   }
</script>
