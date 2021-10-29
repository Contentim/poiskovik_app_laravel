<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Component DEMO mounted => <b>{{amount}}</b></div>
          <div class="card-body">I'm an example component. <b>{{$store.state.test}}</b></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      amount: 'this.initialAmount'
    }
  },
  mounted() {
    this.$store.commit('updateStr');
    console.log('Component DEMO mounted.', this.$store.state.test)
  }
}
</script>
