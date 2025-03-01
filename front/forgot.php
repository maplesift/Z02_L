<style>
    fieldset{
        margin: auto;
        width: 60%;
    }
</style>
<fieldset>
    <!-- <?=$_SESSION['user']?> -->
    <legend>忘記密碼</legend>
    <table style="width: 80%;">
        <tr>
            <td>請輸入信箱以查詢密碼</td>
            <!-- <td><input type="text" name="acc" id="acc"></td> -->
        </tr>
        <tr>
            <!-- <td>密碼:</td> -->
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td id="res"></td>
        </tr>
    </table>
    <div class="">
        <button onclick="forgot()">尋找</button>

    </div>
</fieldset>
<script>
function forgot(){
let email=$("#email").val()
    $.post("./api/forgot.php",{email},function(res){
        $("#res").html(res)
    })
    
}
function reset(){
    $("#acc").val('')
        $("#pw").val('')


}
</script>
</script>