<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    @include('site.head')
    <body>

        <div
          class="flex h-screen bg-gray-50 dark:bg-gray-900"
          :class="{ 'overflow-hidden': isSideMenuOpen }"
        >
            @include('site.header')

            <main class="h-full p@b-16 overflow-y-auto bg-white">

            <div class="c@ontainer grid p-2 mx-auto">
                <div class="flex text-xl mb-6">
                    <div class="mr-4 border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">редактор</div>
                    <div class="border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">просмотр и скачивание</div>
                </div>

                <div class="h-full">
                    
                </div>
              <!-- card -->
              {{--<div class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100">
                <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                  <div class="font-semibold text-lg leading-tight"><a href="https://selt.contentim.ru/post/rasskazhi-ej-skazku">Расскажи ей сказку</a></div>
                  <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                    Опубликовано • Jun 19, 2019
                  </p>
                </div>
              </div>--}}

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
