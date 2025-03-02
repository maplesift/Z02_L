<style>
fieldset {
    width: 95%;
}
</style>
<fieldset>
    <legend>問卷列表</legend>
    <table style="width: 90%;">
        <tr>
            <td>問卷名稱</td>
            <td>投票數</td>
            <td>狀態</td>
        </tr>
        <?php 
        $rows=$Que->all(['main_id'=>0]);
        foreach ($rows as $row) :
        ?>
        <tr>
            <td><?=$row['text']?></td>
            <td><?=$row['vote']?></td>
            <td class="r-td">
                <button class="sh" data-id="<?=$row['id']?>"><?=($row['sh']==1)?'開放':'隱藏' ?></button>
            </td>
        </tr>
        <?php  endforeach; ?>
    </table>
</fieldset>
<script>
$(".sh").on("click", function() {
    id = $(this).data("id")
    val = $(this).text()
    console.log(val, id);
    $.post("./api/que_sh.php", {
        id
    }, ()=> {
        if (val =="開放") {
            $(this).text("隱藏")
        } else {
            $(this).text("開放")
        }
    })
})
</script>