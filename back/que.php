<style>
fieldset {
    width: 85%;
    margin: auto;
}

.table {
    width: 95%;
}
</style>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">

        <table class="table">
            <tr>
                <!-- <td>問卷名稱</td> -->
                <td>問卷名稱<input type="text" name="sub"></td>
            </tr>
            
        </table>
        
        <div id="more">
            選項
            <input type="text" name="opt[]">
            <input type="button" value="更多" onclick="more()">
        </div>
        
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </form>
</fieldset>
<script>
function more() {
    let more = `<div>
                選項
                <input type="text" name="opt[]">
                </div>`
    $("#more").before(more)
}

</script>
