<template>
  <main
    class="w-full h-full overflow-y-auto bg-white flex flex-col justify-between content-center pt-6"
  >
  <Head title="home" /> <!-- не удалять -->
    <!-- <Head>
      <title>{{title}}</title>
      <meta name="description" content="Your page description" />
    </Head> -->

    <div class="navigation" style="min-height: 720px;z-index: 1;">
      <div class="flex justify-center flex-wrap text-2xl font-bold w-full leading-none text-gray-700 mb-8">
        Выберите ориентацию
      </div>

      <div class="flex justify-center flex-wrap w-full mb-10">
        <Link
          href="/horizontal"
          class="flex flex-col p-10 mr-10 rounded-xl bg-gray-200 hover:bg-gray-400 shadow-lg"
        >
          <el-icon
            size="150"
            class="fill-orange_c"
            style="transform: rotate(-90deg)"
          >
            <Document />
          </el-icon>
          <div class="text-xl font-medium text-gray-800 text-center">
            Горизонтальная
          </div>
        </Link>

        <Link
          href="/vertical"
          class="flex flex-col p-10 rounded-xl bg-gray-200 hover:bg-gray-400 shadow-lg"
        >
          <el-icon size="150" class="fill-orange_c">
            <Document />
          </el-icon>
          <div class="text-xl font-medium text-gray-800 text-center">
            Вертикальная
          </div>
        </Link>
      </div>

      <div class="flex justify-center flex-wrap text-2xl font-bold w-full leading-none text-gray-700 mb-8">
        Поставить метку о завершении поисков
      </div>

      <div class="flex justify-center flex-wrap w-full">
        <Link
          class="flex flex-col p-10 rounded-xl bg-gray-200 hover:bg-gray-400 shadow-lg"
          href="/watermark"
        >
          <el-icon size="150" class="fill-orange_c">
            <Finished />
          </el-icon>
          <div class="text-xl font-medium text-gray-800 text-center">
            Водяной знак
          </div>
        </Link>
      </div>
    </div>
    <div class="text-2xl text-center font-bold py-6 px-4 bg-gray-200 border-t-4 border-orange_c">
      Веб-приложение не сохраняет тексты объявлений и фотографии разыскиваемых
      лиц в базу данных, а также не передает заполняемые сведения ориентировок
      третьим лицам.
    </div>

    <!-- обрати внимание на логику при запуске генерации изображения - лоадер срабатывает с задержкой -->
    <!-- сделать всплывающее уведомление о готовности изображения -->
  </main>
</template>

<script>
  import { Head, Link } from "@inertiajs/inertia-vue3";
  import Layout from "@/Shared/Dashboard/Layout";

  export default {
    name: "dashboard",
    title: "dashboard",
    components: {
      Head,
      Link,
    },
    data() {
      return {};
    },
    created(){

    },
    layout: Layout,
  };
</script>

<style>
  .el_divider {
    margin: 10px 0;
  }
  .el-icon.fill-orange_c {
    color: #fe5000;
  }
</style>
