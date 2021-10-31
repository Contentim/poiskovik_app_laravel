<template>
  <main class="w-full h-full overflow-y-auto bg-white flex flex-col justify-start content-start pt-6">

    <div class="flex justify-center flex-wrap text-5xl w-full font-medium leading-none text-gray-800">
      Конструктор ориентировок
    </div>
    <div class="flex justify-center flex-wrap text-5xl w-full font-medium leading-none text-gray-800 mb-6">
      пропавших без вести
    </div>
    <div class="flex justify-center flex-wrap text-2xl w-full leading-none text-gray-700 mb-8">
      Выберите ориентацию
    </div>
    <div class="flex justify-center flex-wrap w-full">
      <a class="flex flex-col p-10 mr-10 rounded-xl bg-gray-200 hover:bg-gray-400 shadow-lg" href="/horizontal">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 490 490"><g><path fill="#F34606" transform="rotate(90 244.99896240234378,245.00050354003906) " d="m422.233969,489.444423l-213.764,0c-2.77,0 -5.417,-1.097501 -7.372,-3.04806l-140.704,-140.384357c-1.955,-1.950559 -3.054,-4.596534 -3.054,-7.354255l0,-327.698858c0,-5.744919 4.662,-10.402315 10.425,-10.402315l354.468,0c5.762,0 10.425,4.657396 10.425,10.402315l0,468.083215c0.001,5.744919 -4.662,10.402315 -10.424,10.402315zm-224.19,-35.51314l0,-104.871217l-105.11,0l56.301,56.173099l48.809,48.698119zm213.765,-432.570075l-333.617,0l0,306.895226l130.278,0c5.762,0 10.426,4.657396 10.426,10.402315l0,129.982042l192.913,0l0,-447.279583z"></path></g></svg>
        <div class="text-xl font-medium text-gray-800 text-center">Горизонтальная</div>
      </a>
      <a class="flex flex-col p-10 rounded-xl bg-gray-200 hover:bg-gray-400 shadow-lg" href="/vertical">
        <svg version="1.1" width="150" height="150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490 490" xml:space="preserve"><path fill="#F34606" d="M422.234,0H208.47c-2.77,0-5.417,1.1-7.372,3.055L60.394,143.759c-1.955,1.955-3.054,4.607-3.054,7.371v328.445
              c0,5.758,4.662,10.426,10.425,10.426h354.468c5.762,0,10.425-4.668,10.425-10.426V10.426C432.659,4.668,427.996,0,422.234,0z
               M198.044,35.594v105.11H92.934l56.301-56.301L198.044,35.594z M411.809,469.149H78.192V161.555H208.47
              c5.762,0,10.426-4.668,10.426-10.426V20.851h192.913V469.149z"></path></svg>
        <div class="text-xl font-medium text-gray-800 text-center">Вертикальная</div>
      </a>
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
