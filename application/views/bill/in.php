<div class="layui-container" style="max-width: 600px">
    <div class="mb-20"></div>
    <blockquote class="layui-elem-quote mb-20" style="border-right: 5px solid #009688;border-radius:2px;">
        <span><?=date('Y-m-d H:i:s',time())?></span>
    </blockquote>

    <div class="layui-row">
        <div class="layui-col-xs12">

            <div style="text-align: center">
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="<?= site_url() ?>">首页</a>
            </div>

            <div class="mb-20"></div>
            <form class="layui-form" action="">
                <select name="tag" id="tag">
                    <?php foreach ($outType as $value): ?>
                        <option value="<?= $value['tag_id'] ?>"><?= $value['tag_name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="mb-20"></div>
                <input type="number" name="money" placeholder="额度" min="0.00" step="0.01" class="layui-input mb-20">
                <input type="text" name="note" placeholder="说明" class="layui-input mb-20">
            </form>

            <button id="btn-in" class="layui-btn layui-btn-normal" style="width: 100%" onclick="doin()">IN</button>

        </div>
    </div>
</div>

<script src="<?= base_url('assets/lib/layui/2.2.5/layui.all.js') ?>" charset="utf-8"></script>
<script>
    function doin() {
        var url = "<?=site_url('bill/doin')?>";
        var tag = $("#tag").find("option:selected").val();
        var money = $("input[name='money']").val();
        var note = $("input[name='note']").val();
        var data = {"money": money, "tag": tag, "note": note};

        $("#btn-in").removeAttr("onclick"); // 禁用按钮事件
        $.post(url, data, function (res) {
            var code = res.code;
            if (code == 0) {
                layer.msg(res.msg, {time: 1500}, function () {
                    location.reload();
                });
            } else {
                $("#btn-in").attr("onclick","doin()"); // 启用按钮事件
                layer.msg(res.msg);
            }
        });
    }
</script>