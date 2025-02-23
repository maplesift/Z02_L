<style>
    .type{
        margin: 10px;
        display: block;
        /* vertical-align: top; */
    }
    .fld-1{
        display: inline-block;
        vertical-align: top;
    }
    .fld-2{
        display: inline-block;
    }
</style>

<div>
    目前位置 : 首頁 > 分類網誌 > <span id="type">健康新知</span>
</div>

<fieldset style="width: 150px;" class="fld-1">
    <legend>分類網誌</legend>
    <div class="title">
    <a href="#" class="type" >健康新知</a>
    <a href="#" class="type" >菸害防治</a>
    <a href="#" class="type" >癌症防治</a>
    <a href="#" class="type" >慢性病防治</a>
    </div>
</fieldset>
<fieldset style="width: 500px;" class="fld-2">
    <legend>文章列表</legend>
    <div></div>
</fieldset>
<script>
    $(".type").on("click",function(){
        // $(this).text()
        // console.log($(this).text());
        
        $("#type").text($(this).text())
    })
</script>