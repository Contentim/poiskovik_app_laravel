<template>
  <main class="h-full p@b-16 overflow-y-auto bg-white">
    <div class="c@ontainer grid p-2 mx-auto">
      <div class="flex text-xl mb-6">
        <div class="mr-4 border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
          редактор
        </div>
        <div class="border-b-2 border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
          просмотр и скачивание
        </div>
      </div>
      <div class="h-full">
        <div class="flex-center position-ref h-screen bg-gray-400">
          vertical

          <div>selected: {{$store.state.search.object[$store.state.search.selected]}} == {{$store.state.search.selected}}</div>

          <div v-show="$store.state.search.selected == 0">
            ищем человека
          </div>

          <div v-show="$store.state.search.selected == 1">
            ищем ребенка
          </div>

<!--          <div v-for="(object, index) in this.$store.state.search.object">
            <div v-if="index == this.$store.state.search.selected">{{object}}</div>
          </div>-->

        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data: function() {
    return {
      // amount: 'this.initialAmount'
    }
  },
  mounted() {
    // this.$store.commit('updateStr');
    // console.log('Component DEMO mounted.', this.$store.state.test)
  }
}
</script>
