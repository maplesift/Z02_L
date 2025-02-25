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
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">

        <table>
            <tr>
                <td>
                    問卷名稱
                </td>
                <td>
                    <input type="text" name="sub" id="">
                </td>
            </tr>
            <tr id="r-title">
                <td>
                    <div>
                            選項
                        <input type="text" name="opt[]" id="">
                    </div>
                </td>
                <td>
                    <input type="button" value="更多" onclick="more()">
                </td>
            </tr>
        </table>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
function more() {
    let m = `
                    <div>
                    選項
                    
                    <input type="text" name="opt[]" id="">
                    </div>
`
    $("#r-title").before(m)
}
</script>