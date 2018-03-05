<div class="layui-container" style="max-width: 600px">
    <div class="mb-20"></div>
    <blockquote class="layui-elem-quote mb-20" style="border-right: 5px solid #009688;border-radius:2px;">
        <span>TAG</span>
    </blockquote>

    <div class="layui-row">
        <div class="layui-col-xs12">

            <!--<div style="text-align: center">-->
            <!--    <a class="layui-btn layui-btn-xs layui-btn-normal" href="--><?//= site_url() ?><!--">首页</a>-->
            <!--</div>-->

            <div class="mb-20"></div>
            <form class="layui-form" action="">
                <input type="text" name="name" placeholder="名称" class="layui-input mb-20">

                <div class="mb-20">
                    <input type="radio" name="type" value="1" title="消费" checked>
                    <input type="radio" name="type" value="2" title="收入">
                </div>
            </form>

        </div>

        <button id="btn-tag" class="layui-btn layui-btn-normal" style="width: 100%" onclick="doadd()">提交</button>

    </div>
</div>
</div>

<script src="<?= base_url('assets/lib/layui/2.2.5/layui.all.js') ?>" charset="utf-8"></script>
<script>
    function doadd() {
        var url = "<?=site_url('bill/addTag')?>";
        var name = $("input[name='name']").val();
        var type = $("input[name='type']:checked").val();
        var data = {"name": name, "type": type};

        $("#btn-tag").removeAttr("onclick"); // 禁用按钮事件
        $.post(url, data, function (res) {
            var code = res.code;
            if (code == 0) {
                layer.msg(res.msg, {time: 1500}, function () {
                    location.reload();
                });
            } else {
                $("#btn-tag").attr("onclick", "doadd()"); // 启用按钮事件
                layer.msg(res.msg);
            }
        });
    }
</script>