<template>
  <div class="flex w-full h-screen bg-gray-50">


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
