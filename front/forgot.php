<style>
    fieldset {
        width: 90%;
    }

    .table {
        width: 85%;
    }
</style>
<fieldset>
    <legend>忘記密碼</legend>
    <div>
        請輸入信箱以查詢密碼

    </div>
    <div>
        <input type="text" name="" id="email">
    </div>
    <div>
    <span id='res'></span>
    </div>
    <button onclick="forgot()">尋找</button>

</fieldset>

<script>
    function forgot(){
        let email=$("#email").val()
        $.post("./api/forgot.php",{email},function(res){
            $("#res").html(res)
        })
    }
</script>