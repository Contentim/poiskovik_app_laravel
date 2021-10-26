<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    @include('site.head')
    <body>
        
        <div
          class="flex h-screen bg-gray-50 dark:bg-gray-900"
          :class="{ 'overflow-hidden': isSideMenuOpen }" 
        >
            @include('site.header')
            
            <main class="h-full pb-16 overflow-y-auto">

            <div class="container grid px-6 mx-auto">
                <h1 class="text-center md:text-left my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Вертикальная</h1>
              <!-- card -->
              <div class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100">
                <!-- content -->
                <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                  <div class="font-semibold text-lg leading-tight"><a href="https://selt.contentim.ru/post/rasskazhi-ej-skazku">Расскажи ей сказку</a></div>
                  <!-- { % if post.excerpt %} -->
                  <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                    Опубликовано • Jun 19, 2019
                  </p>
                </div>
              </div>
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