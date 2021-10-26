<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    <?php echo $__env->make('site.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>

        <div
          class="flex h-screen bg-gray-50 dark:bg-gray-900"
          :class="{ 'overflow-hidden': isSideMenuOpen }"
        >
            <?php echo $__env->make('site.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main class="h-full p@b-16 overflow-y-auto bg-white">

            <div class="c@ontainer grid p-2 mx-auto">
                <div class="flex text-xl mb-6">
                    <div class="mr-4 border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">редактор</div>
                    <div class="border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">просмотр и скачивание</div>
                </div>

                <div class="h-full">
                    
                </div>
              <!-- card -->
              

            </div>
        </main>
        </div>
        <!-- Header -->

        <!-- @ include('site.navbar') -->

            <!-- strat wrapper -->

              <!--@ include('site.sidebar')-->

              <!-- strat content -->


                <!-- General Report -->
                <!--@ include('data.generalReport')-->
                <!-- End General Report -->

              <!-- end content -->

            <!-- end wrapper -->

        <!-- Scripts -->
        <!--@ nclude('site.footer');-->

    </body>
</html>
<?php /**PATH /home/l/lutsyi1l/mikros.contentim.ru/resources/views/horizontal.blade.php ENDPATH**/ ?>