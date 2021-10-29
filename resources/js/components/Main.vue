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
        dfgdfgdfg
        <div class="flex-center position-ref full-height">
          1
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    Example Component 234234234
                  </div>
                  <div class="card-header">
                    === 111111 ===
                  </div>
                  <div class="card-body">
                    I'm an example component.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    Component DEMO mounted =&gt; <b>this.initialAmount</b>
                  </div>
                  <div class="card-body">
                    I'm an example component. <b>dolor sit amet</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
