<style>
    .menu-item{
        width: 20%;
        text-align: center;
        float: left;
        background: url("<?= base_url('assets/image/btn-bg.png');?>") no-repeat;
        background-size: 100% 100%;
    }
    .menu-link:hover{
        background: #2D93CA;
        color: #fff;
    }
    .menu-link{
        color: #fff;
        display: block;
        width: 100%;
    }
</style>
<div class="menu" style="width: 100%;background: #2D93CA;height: 2rem;line-height: 2rem;position: fixed;bottom: 0;overflow: hidden">
    <div class="menu-item"><a href="<?=base_url()?>" class="menu-link" style="width: 100%">首页</a></div>
    <div class="menu-item"><a href="<?=site_url('bill/tag')?>" class="menu-link">标签</a></div>
    <div class="menu-item"><a href="<?=site_url('bill/in')?>" class="menu-link">收入</a></div>
    <div class="menu-item"><a href="<?=site_url('bill/index')?>" class="menu-link">消费</a></div>
    <div class="menu-item"><a href="<?=site_url('bill/analyse')?>" class="menu-link">统计</a></div>
</div>