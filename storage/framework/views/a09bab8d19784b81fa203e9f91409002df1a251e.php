
<?php $__env->startSection('info'); ?>
    <title><?php echo e($field->cate_name); ?> - <?php echo e(Config::get('web.web_title')); ?></title>
    <meta name="keywords" content="<?php echo e($field->cate_keywords); ?>" />
    <meta name="description" content="<?php echo e($field->cate_description); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <article>
        <h1 class="t_nav"><span><?php echo e($field->cate_title); ?></span><a href="<?php echo e(url('/')); ?>" class="n1">网站首页</a><a href="<?php echo e(url('cate/'.$field->cate_id)); ?>" class="n2"><?php echo e($field->cate_name); ?></a></h1>
        <div class="newblog left">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2><?php echo e($d->art_title); ?></h2>
            <p class="dateview"><span>发布时间：<?php echo e($d->created_at); ?></span><span>作者：<?php echo e($d->art_author); ?></span><span>分类：[<a href="<?php echo e(url('cate/'.$field->cate_id)); ?>"><?php echo e($field->cate_name); ?></a>]</span></p>
            <figure><img src="<?php echo e(url($d->art_thumb)); ?>"></figure>
            <ul class="nlist">
                <p><?php echo e($d->art_description); ?></p>
                <a title="<?php echo e($d->art_title); ?>" href="<?php echo e(url('a/'.$d->art_id)); ?>" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="page">
                <?php echo e($data->links()); ?>

            </div>
        </div>
        <aside class="right">
            <?php if($submenu->all()): ?>
            <div class="rnav">
                <ul>
                    <?php $__currentLoopData = $submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="rnav<?php echo e($k+1); ?>"><a href="<?php echo e(url('cate/'.$s->cate_id)); ?>" target="_blank"><?php echo e($s->cate_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->

            <div class="news" style="float:left;">
                ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
            </div>
        </aside>
    </article>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/blog/resources/views/home/list.blade.php ENDPATH**/ ?>