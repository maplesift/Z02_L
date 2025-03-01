<style>
fieldset {
    width: 95%;
}
textarea{
    width: 500px;
    height: 250px;
}
</style>


<fieldset>
    <legend>新增文章</legend>
    <form action="./api/add_news.php" method="post">

        <table style="width: 90%;">
            <tr>
                <td style="width: 20%;"class="">文章標題</td>
                <td><input type="text" name="title" id="" style="width: 500px;"></td>
            </tr>
            <tr>
                <td>文章分類</td>
                <td><select name="type_id" id="">
                    <option value="1">健康新知</option>
                    <option value="2">菸害防治</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select></td>
            </tr>
            <tr>
                <td>文章內容:</td>
                <td><textarea name="text" id=""></textarea></td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</fieldset>