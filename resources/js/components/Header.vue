<template>
  <header class="z-10 py-4 bg-white border-b-4">
    <div
        class="flex items-center justify-between h-full px-6 mx-auto text-purple-600"
    >

      <div class="flex flex-wrap justify-start text-gray-800 w-full">

        <a class="px-4 py-1 inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/horizontal">
<!--          <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#F34606" d="M4 5.5C3.725 5.5 3.5 5.724 3.5 6L3.5 18C3.5 18.276 3.725 18.5 4 18.5H20C20.275 18.5 20.5 18.276 20.5 18V12L16 12C14.896 12 14 11.104 14 10V5.5L4 5.5ZM19.379 10.5L15.5 6.622V10C15.5 10.276 15.725 10.5 16 10.5H19.379ZM15.586 4.586L21.414 10.415C21.44 10.441 21.46 10.473 21.484 10.5C21.548 10.571 21.611 10.641 21.664 10.719C21.691 10.759 21.709 10.805 21.732 10.847C21.772 10.918 21.816 10.988 21.848 11.063C21.93 11.26 21.971 11.472 21.986 11.687C21.989 11.734 22 11.78 22 11.828V18C22 19.104 21.104 20 20 20H4C2.896 20 2 19.104 2 18L2 6C2 4.896 2.896 4 4 4L14.172 4C14.702 4 15.211 4.211 15.586 4.586Z" />
          </svg>-->

          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 490 490">
            <g>
              <path fill="#F34606" transform="rotate(90 244.99896240234378,245.00050354003906) " d="m422.233969,489.444423l-213.764,0c-2.77,0 -5.417,-1.097501 -7.372,-3.04806l-140.704,-140.384357c-1.955,-1.950559 -3.054,-4.596534 -3.054,-7.354255l0,-327.698858c0,-5.744919 4.662,-10.402315 10.425,-10.402315l354.468,0c5.762,0 10.425,4.657396 10.425,10.402315l0,468.083215c0.001,5.744919 -4.662,10.402315 -10.424,10.402315zm-224.19,-35.51314l0,-104.871217l-105.11,0l56.301,56.173099l48.809,48.698119zm213.765,-432.570075l-333.617,0l0,306.895226l130.278,0c5.762,0 10.426,4.657396 10.426,10.402315l0,129.982042l192.913,0l0,-447.279583z"/>
            </g>
          </svg>

          <span class="ml-4">Горизонтальная ориентация</span>
        </a>

        <a class="px-4 py-1 inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/vertical">
          <svg version="1.1" width="24" height="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;" xml:space="preserve">
            <path fill="#F34606" d="M422.234,0H208.47c-2.77,0-5.417,1.1-7.372,3.055L60.394,143.759c-1.955,1.955-3.054,4.607-3.054,7.371v328.445
              c0,5.758,4.662,10.426,10.425,10.426h354.468c5.762,0,10.425-4.668,10.425-10.426V10.426C432.659,4.668,427.996,0,422.234,0z
               M198.044,35.594v105.11H92.934l56.301-56.301L198.044,35.594z M411.809,469.149H78.192V161.555H208.47
              c5.762,0,10.426-4.668,10.426-10.426V20.851h192.913V469.149z"/>
          </svg>
          <span class="ml-4">Вертикальная ориентация</span>
        </a>

        <a class="px-4 py-1 inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/about">
          <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="none" stroke="#F34606" stroke-width="2" d="M12,23 C18.0751322,23 23,18.0751322 23,12 C23,5.92486775 18.0751322,1 12,1 C5.92486775,1 1,5.92486775 1,12 C1,18.0751322 5.92486775,23 12,23 Z M15,23 L15,17 M9,23 L9,17 M15,7 L15,1 M9,7 L9,1 M12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 Z M1,15 L7,15 M1,9 L7,9 M17,15 L23,15 M17,9 L23,9" transform="rotate(45 12 12)"/>
          </svg>

          <span class="ml-4">От автора</span>
        </a>

      </div>
    </div>
  </header>
</template>

<script>
export default {
  data: function() {
    return {
      // amount: 'this.initialAmount'
    }
  },
  mounted() {
    // console.log('Component DEMO mounted.', this.$store.state.test)
  },
  methods: {

  }
}
</script>
