<div class="layui-container" style="max-width: 600px">
    <div class="mb-20"></div>
    <blockquote class="layui-elem-quote mb-20" style="border-right: 5px solid #009688;border-radius:2px;">
        <span><?=date('Y-m-d H:i:s',time())?></span>
    </blockquote>

    <div class="layui-row">
        <div class="layui-col-xs12">

            <!--<div style="text-align: center" class="mb-20">-->
            <!--    <a class="layui-btn layui-btn-xs layui-btn-normal" href="--><?//= site_url() ?><!--">首页</a>-->
            <!--</div>-->
            <blockquote class="layui-elem-quote mb-20" style="border-right: 5px solid #FF5722;border-left: 5px solid #FF5722;border-radius:2px;">
                <p>今天： - <?=$out['today']?> <span style="width: 100px;float: right">+ <?=$in['today']?></span></p>
                <p>本周： - <?=$out['this_week']?> <span style="width: 100px;float: right">+ <?=$in['this_week']?></span></p>
                <p>上周： - <?=$out['last_week']?> <span style="width: 100px;float: right">+ <?=$in['last_week']?></span></p>
                <p>本月： - <?=$out['this_month']?> <span style="width: 100px;float: right">+ <?=$in['this_month']?></span></p>
                <p>上月： - <?=$out['last_month']?> <span style="width: 100px;float: right">+ <?=$in['last_month']?></span></p>
            </blockquote>
            <div class="mb-20"></div>

            <!--时间线-->
            <ul class="layui-timeline">

                <?php foreach ($list as $value):?>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title"><?=date('Y年m月d日 H:i:s',$value['add_time'])?></h3>
                        <ul>
                            <li>金额：<?=$value['money']?></li>
                            <li>类型：<?php if($value['type']==1){echo '消费';}else{echo '收入';}?></li>
                            <li>标签：<?=$value['tag_name']?></li>
                        </ul>
                        <p style="color: #FF5722"><?=$value['note']?></p>
                    </div>
                </li>
                <?php endforeach;?>

                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">起点</div>
                    </div>
                </li>
            </ul>


        </div>
    </div>
</div>

<script src="<?= base_url('assets/lib/layui/2.2.5/layui.all.js') ?>" charset="utf-8"></script>
<script>
</script>