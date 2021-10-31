<template>
  <div class="flex w-full h-screen bg-gray-50 relative">

    <div class="absolute bg-orange z-50 rounded-md flex justify-center content-center text-gray-800" id="success" v-if="this.$store.state.on_success == true">
      <div class="w-full h-full relative flex flex-wrap justify-center content-center">
        <div class="absolute top-0 right-0 cursor-pointer border-b border-transparent border-dashed hover:border-black" id="close_success" @click="$store.commit('success')">Закрыть</div>
        <span class="flex text-3xl font-medium">Готово!</span>
      </div>
    </div>

    <sidebar-desktop></sidebar-desktop>
    <div class="flex flex-col flex-1 w-full">
      <site-header></site-header>
      <horizontal-body></horizontal-body>
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

    let body
    if(localStorage.getItem('horizontalBody')){
      body = JSON.parse(localStorage.getItem('horizontalBody'));
    } else {
      body = this.$store.state.horizontal.text.body;
    }

    let editorjs_editor = new EditorJS({
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
        blocks: body
      },
      onReady: function(){
        //saveButton.click();
      },
      onChange: function() {
        editorjs_editor.save().then((outputData) => {
          localStorage.setItem('horizontalBody', JSON.stringify(outputData.blocks));
        }).catch((error) => {
          console.log('Saving failed: ', error)
        });
      }
    });

    /**
     * footer
     */
    let footer
    if(localStorage.getItem('horizontalFooter')){
      footer = JSON.parse(localStorage.getItem('horizontalFooter'));
    } else {
      footer = this.$store.state.horizontal.text.footer;
    }
    let editorjs_footer = new EditorJS({
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
        blocks: footer
      },
      onReady: function(){
        //saveButton.click();
      },
      onChange: function() {
        editorjs_footer.save().then((outputFooter) => {
          localStorage.setItem('horizontalFooter', JSON.stringify(outputFooter.blocks));
        }).catch((error) => {
          console.log('Saving failed: ', error)
        });
      }
    });
    // this.editor.render(state.horizontal.text.footer);
  },
  methods: {

  }
}
</script>

<style></style>
