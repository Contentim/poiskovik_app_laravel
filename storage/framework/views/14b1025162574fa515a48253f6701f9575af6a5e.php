<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="ru">
    <?php echo $__env->make('site.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>

        <div id="app" class="flex w-full h-screen bg-gray-50 dark:bg-gray-900">
            <horizontal></horizontal>
        </div>

        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </body>
</html>

<!--
/*
use Anam\PhantomMagick\Converter;

Converter::make('https://google.com')
    ->toPdf()
    ->download('google.pdf');

Converter::make('https://google.com')
    ->toPng()
    ->download('yahoo.png');*/
-->
<?php /**PATH /home/l/lutsyi1l/mikros.contentim.ru/resources/views/horizontal.blade.php ENDPATH**/ ?>