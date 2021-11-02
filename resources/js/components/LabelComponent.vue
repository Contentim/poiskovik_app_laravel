<template>
  <div class="flex w-full h-screen bg-gray-50 relative">

    <div class="absolute bg-orange z-50 rounded-md flex justify-center content-center text-gray-800" id="success" v-if="this.$store.state.on_success == true">
      <div class="w-full h-full relative flex flex-wrap justify-center content-center">
        <div class="absolute top-0 right-0 cursor-pointer border-b border-transparent border-dashed hover:border-black" id="close_success" @click="$store.commit('success')">Закрыть</div>
        <span class="flex text-3xl font-medium">Готово!</span>
      </div>
    </div>

    <label-sidebar></label-sidebar>
    <div class="flex flex-col flex-1 w-full">
      <site-header></site-header>
      <label-body></label-body>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {

    }
  },
  mounted() {
    let self = this;

  },
  methods: {

  }
}
</script>

<style></style>
