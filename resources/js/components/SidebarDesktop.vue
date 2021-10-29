<template>
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 border-r-4">
    <div class="py-4 dark:text-gray-400">
      <a class="logo-primary@  block leading-6 mx-2 text-center text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
        Конструктор ориентировок
      </a>

      <ul class="mt-6 hidden">
        <li class="relative px-6 py-3">
          <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
          <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="/">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="ml-4">Dashboard</span>
          </a>
        </li>
      </ul>

      <div class="w-full pt-8">


        <div class="relative px-6 py-3">
          <div class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="defaultTextBodyHorizontal()"> <!-- $store.commit('defaultTextBodyHorizontal')  -->
            <svg hidden="" class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="ml-4">Вернуть шаблонный текст ориентировки</span>
          </div>
        </div>

        <div class="relative px-6 py-3">
          <div class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="defaultTextFooterHorizontal()">
            <svg hidden="" class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="ml-4">Вернуть шаблонный текст <span class="text-purple-600 dark:text-purple-400">контактов</span> ориентировки</span>
          </div>
        </div>

        <div class="relative px-6 py-3">
          <div class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
            <span class="ml-4">Выбрать цвет рамки:</span>
          </div>
          <div class="ml-4">color-picker</div>
        </div>

        <div class="relative px-6 py-3">
          <div class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
            <span class="ml-4">Кого разыскиваем?</span>
          </div>
          <div class="ml-4">
            <!-- select -->
            <v-select
              placeholder="человека"
              v-model="selected"
              :reduce="object => object.id"
              :options="$store.state.search.objects"
              @input="setObjectSearch"
            />
          </div>
        </div>


        <!--
         <div x-data="{show:false}" class="relative px-6 py-3">
            <div class="" id="headingOne">
                <button @click="show=!show" class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" type="button">
                <span class="inline-flex items-center">
                  <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                  </svg>
                  <span class="ml-4">Lorem ipsum</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                </button>

            </div>

            <div x-show="show" class="" style="display: none">
                <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" href="https://selt.contentim.ru/dolor-sit">Dolor sit</a>
                  </li>
                            </ul>
            </div>
        </div>
        -->

      </div>

      <div class="px-6 my-6 hidden">
        <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Create account
          <span class="ml-2" aria-hidden="true">+</span>
        </button>
      </div>
    </div>
  </aside>
</template>

<script>
export default {
  data: function() {
    return {
      selected: null,
      select_default: null,
    }
  },
  computed: {
    store() {
      // return this.$store.state
    }
  },
  mounted() {
    this.selected = this.$store.getters.selectDefaultId;
    this.select_default = this.$store.getters.selectDefaultLabel;
  },
  methods: {
    setActivePerson(){

    },
    setObjectSearch(value) {
      console.log('setObjectSearch', value);
      if(!value){
        this.selected = this.$store.getters.selectDefaultId;
      }
      this.$store.commit('setObjectSearch', this.selected);

      // this.$store.commit('setActivePerson', val)
    },

    defaultTextBodyHorizontal(){
      localStorage.removeItem('horizontalBody');
      document.querySelector('#editorjs-editor').innerHTML = '';

      let self = this;
      /**
       * body
       */
      new EditorJS({
        /**
         * Wrapper of Editor
         */
        holderId: 'editorjs-editor',
        /**
         * Tools list
         */
        tools: {
          header: {
            class: Header,
            inlineToolbar: ['link'],
            config: {
              placeholder: 'Заголовок'
            },
            shortcut: 'CMD+SHIFT+H'
          },
        },
        /**
         * Initial Editor data
         */
        data: {
          blocks: self.$store.state.horizontal.text.body
        },
        onReady: function(){
          //saveButton.click();
        },
        onChange: function() {
          /*editorjs_editor.save().then((outputData) => {
            localStorage.setItem('horizontalBody', JSON.stringify(outputData.blocks));
          }).catch((error) => {
            console.log('Saving failed: ', error)
          });*/
        }
      });
    },
    defaultTextFooterHorizontal(){
      let self = this;

      localStorage.removeItem('horizontalFooter');
      document.querySelector('#editorjs-footer').innerHTML = '';

      new EditorJS({
        /**
         * Wrapper of Editor
         */
        holderId: 'editorjs-footer',
        /**
         * Tools list
         */
        tools: {
          header: {
            class: Header,
            inlineToolbar: ['link'],
            config: {
              placeholder: 'Заголовок'
            },
            shortcut: 'CMD+SHIFT+H'
          },
        },
        /**
         * Initial Editor data
         */
        data: {
          blocks: self.$store.state.horizontal.text.footer
        },
        onReady: function(){
          //saveButton.click();
        },
        onChange: function() {
          /*editorjs_footer.save().then((outputFooter) => {
            localStorage.setItem('horizontalFooter', JSON.stringify(outputFooter.blocks));
          }).catch((error) => {
            console.log('Saving failed: ', error)
          });*/
        }
      });
    }
  },
}
</script>
