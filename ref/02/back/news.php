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
    <legend>帳號管理</legend>
    <form action="./api/edit_news.php" method="post">

        <table style="width: 100%;" class="ct">
            <tr class="ct">
                <th style="width: 40%;">編號</th>
                <th style="width: 20%;">標題</th>
                <th style="width: 20%;">顯示</th>
                <th style="width: 30%;">刪除</th>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? '1';
            $start = ($now - 1) * $div;

            $rows = $News->all(" limit $start,$div");
            foreach ($rows as $key => $row) :
            ?>
                <tr>
                    <td style="width: 40%;"><?= $key + 1; ?></td>
                    <td style="width: 40%;">
                        <?= $row['title']; ?>
                    </td>
                    <td style="width: 30%;">
                        <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td style="width: 30%;"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">

            <?php

            if ($now - 1 > 0) {
                echo "<a href='?do=news&p=" . ($now - 1) . "'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($now == $i) ? "26px" : "18px";
                echo "<a href='?do=news&p=$i' style=font-size:$size; > $i </a>";
            }

            if ($now + 1 <= $pages)
                echo "<a href='?do=news&p=" . ($now + 1) . "'> > </a>";
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
            <!-- <input type="reset" value="清空選取"> -->
        </div>
    </form>
</fieldset>
<script>

</script>