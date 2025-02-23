<style>
fieldset {
    margin: auto;
    width: 70%;
}

.table {
    width: 98%;
    /* margin: auto; */
}

.text-r {
    color: red;
}
#opt{
    width: 300px;
}
div{
    font-size: 18px;
    /* padding: 5px; */
}
</style>

<fieldset>

    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">


        <table class="table">
            <tr>
                <td style="width: 300px;">
                    問卷名稱
                    <input type="text" name="subject" id="subject">
                </td>
                <td>

                </td>
                <!-- <td>顯示</td> -->
                <!-- <td>刪除</td> -->
            </tr>

            <tr>
                <td >
                    <div id="opt">
                        選項<input type="text" name="opt[]" >
                        <input type="button" onclick="more()" value="更多">
                    </div>
                </td>

                <td>
                    <!-- <input type="checkbox" name="del[]" value="<?=$row['id'];?>"> -->

                </td>
            </tr>

        </table>

        <div class="">
            <!-- <input type="hidden" name="id"> -->
            <input type="submit" value="新增">
            <input type="reset" value="清空">

    </form>

</fieldset>
<script>
    function more(){
        let opt =`<div>選項
        <input type="text" name="opt[]">
        </div>`;
        $("#opt").before(opt);
    }
</script>