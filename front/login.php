<style>
fieldset {
    width: 50%;
    margin: auto;
}
.f-r{
    float: right;
}
</style>
<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td style="width: 40%;">帳號</td>
            <td ><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>
    <div class="">
        <button onclick="login()">登入</button> 
        <button onclick="reset()">清除</button>
        <span class="f-r">

            <a href="?do=forgot" >忘記密碼</a>
            <a href="?do=reg" >|尚未註冊</a>
        </span>
    </div>
</fieldset>
<script>
    function login(){
       let acc=$("#acc").val("")
       let pw=$("#pw").val("")
       $.post("./api/login.php",{acc,pw},function(res){
            if(res>0){
                

            }
       })
    }
    function reset(){
        $("#acc").val("")
        $("#pw").val("")
    }
</script>