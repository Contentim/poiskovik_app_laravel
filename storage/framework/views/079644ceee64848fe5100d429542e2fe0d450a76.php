<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="ru">
<?php echo $__env->make('site.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<div  id="app"
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
>
    <sidebar-desktop></sidebar-desktop>
    <sidebar-mobile></sidebar-mobile>

    <div class="flex flex-col flex-1 w-full">
        <site-header></site-header>

        <vertical></vertical>
    </div>

</div>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/l/lutsyi1l/mikros.contentim.ru/resources/views/vertical.blade.php ENDPATH**/ ?>