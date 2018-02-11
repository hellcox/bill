<div class="layui-container" style="max-width: 600px">
    <div class="mb-20"></div>
    <blockquote class="layui-elem-quote mb-20" style="border-right: 5px solid #009688;border-radius:2px;">
        <span>2018-02-11 15:12:66</span>
    </blockquote>

    <div class="layui-row">
        <div class="layui-col-xs12">

            <div style="text-align: center">
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="<?=base_url()?>">流出</a>
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="">统计</a>
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="">标签</a>
            </div>

            <div class="mb-20"></div>
            <form class="layui-form" action="">
                <select name="type">
                    <option value="1">测试</option>
                    <option value="2">进入</option>
                </select>

                <div class="mb-20"></div>
                <input type="number" name="money" placeholder="额度" min="0.00" step="0.01" class="layui-input mb-20">
                <input type="text" name="note" placeholder="说明" class="layui-input mb-20">
            </form>

        </div>
    </div>
</div>

<script src="<?= base_url('assets/lib/layui/2.2.5/layui.all.js') ?>" charset="utf-8"></script>
<script>
</script>