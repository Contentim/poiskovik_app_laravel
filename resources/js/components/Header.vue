<template>
  <header class="z-10 py-4 bg-white border-b-4">
    <div
        class="flex items-center justify-between h-full px-6 mx-auto text-purple-600"
    >

      <div class="flex text-gray-800 w-full">

        <a class="px-4 py-1 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/horizontal">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
          </svg>
          <span class="ml-4">Горизонтальная ориентация</span>
        </a>

        <a class="px-4 py-1 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/vertical">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
          </svg>
          <span class="ml-4">Вертикальная ориентация</span>
        </a>

        <a class="px-4 py-1 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="/about">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
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
