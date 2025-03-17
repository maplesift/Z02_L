<style>
    fieldset {
        width: 90%;
    }

    .table {
        width: 85%;
    }
</style>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        
        <div>
            問卷名稱: 
            <input type="text" name="main" class="main">
        </div>
        <div class="more">
            <div class="sub">
                選項: <input type="text" name="sub[]" > <input type="button" value="更多" onclick="more()">
            </div>
        </div>


    <input type="submit" value="新增">
    <input type="reset" value="清空">
    </form>

</fieldset>
<script>
    function more(){
        let more=`    
        <div class="sub">
        選項: <input type="text" name="sub[]" > 
        </div>
        `
        $(".more").before(more)
    }
</script>