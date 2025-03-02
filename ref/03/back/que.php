<style>
fieldset {
    width: 95%;
}
</style>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">

        <table >
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="sub"></td>
            </tr>
        </table>
        <div id="more">
            選項
            <input type="text" name="opt[]">
            <input type="button" value="更多" onclick="more()">

        </div>
        <div class="">
    <input type="submit" value="新增">
    <input type="submit" value="清空">
        </div>
    </form>
    <a href="?do=que_list" style="float: right;">問卷列表</a>
</fieldset>
<div>

</div>
<script>
function more() {
    let more =
        `
        <div >
            選項
            <input type="text" name="opt[]">


        </div>
        `
    $("#more").before(more)
}
</script>