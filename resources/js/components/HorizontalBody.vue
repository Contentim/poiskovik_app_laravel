<template>
  <main class="h-full p@b-16 overflow-y-auto bg-white">
    <div class="c@ontainer grid p-2 mx-auto">
      <div class="flex text-xl mb-6">

        <div class="mr-4">
          <button class="menu-trigger" :class="{active: menu_trigger}" id="menu01" @click="menuTrigger">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>

        <div v-if="menu_trigger == true" class="mr-4 flex flex-wrap content-center" @click="visible('editor')">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            редактор
          </div>
        </div>

        <div v-if="menu_trigger == true" class="mr-4 flex flex-wrap content-center" @click="visible('explorer')">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            просмотр и скачивание
          </div>
        </div>

        <div class="mr-4 flex flex-wrap content-center" v-if="menu_trigger == false && menu_editor == true" @click="converter()">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            Преобразовать в изображение
          </div>
        </div>

        <div v-if="menu_trigger == false && menu_explorer == true" class="mr-4 flex flex-wrap content-center" @click="returnEditor()">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            Вернуться в редактор
          </div>
        </div>

        <div v-if="menu_trigger == false && menu_explorer == true" class="mr-4 flex flex-wrap content-center" @click="downloadImage()">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            Скачать изображение
          </div>
        </div>

      </div>

      <div class="h-full">

        <div class="flex-center position-ref h@-screen bg@-gray-400" v-show="tab == 'editor'">

          <div id="form-horizontal">
            <div class="level_1">
              <div id="editor-top" class="editor-top"><div contenteditable="true">https://vk.com/poiskovik_app</div></div>
              <div class="level_2">
                <div class="content">
                  <div class="info">
                    <div class="col-1">
                      <div class="img border-4 border-red-600">

                        <div id="photo-container" v-if="$store.state.photo" class="h-full">
                          <img :src="$store.state.photo" class="img-responsive" width="374" height="445">
                          <button
                              class="absolute top-0 left-0 absolute top-0 left-0 bg-white px-4 py-1 border-2 border-red-500 opacity-0"
                              v-if="$store.state.photo" @click="removePhoto" >Удалить фото</button>
                        </div>

                        <form v-else id="upload_img" class="flex">
                          <div class="wrapp__info">
                            <div>Размер окна:</div>
                            <div class="size">380 * 458 пикселей</div>
                          </div>
                          <div class="upload_img_container">
                            <div class="form-group">
                              <label class="label">
                                <i class="material-icons">attach_file</i>
                                <span class="title">Выбрать фото</span>
                                <input type="file" name="image" accept="image/*" class="input__file" @change="onPhotoChange">
                              </label>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="notification">
                        <div class="item_1">помогите</div>
                        <div class="item_2">найти</div>
                        <div class="item_3" :class="'mod_' + $store.state.search.selected">
                          <template v-for="object in $store.state.search.objects" v-if="object.id == $store.state.search.selected">{{object.label}}</template>
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="editor">
                        <div id="editorjs-editor"></div>
                      </div>
                      <div class="footer">
                        <div id="editorjs-footer"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="editor-bottom" class="editor-bottom"><div contenteditable="true">https://vk.com/poiskovik_app</div></div>
            </div>
          </div>


          <!--          <div>selected: {{$store.state.search.object[$store.state.search.selected]}} == {{$store.state.search.selected}}</div>

                    <div v-show="$store.state.search.selected == 0">
                      ищем человека
                    </div>

                    <div v-show="$store.state.search.selected == 1">
                      ищем ребенка
                    </div>-->

          <!--          <div v-for="(object, index) in this.$store.state.search.object">
                      <div v-if="index == this.$store.state.search.selected">{{object}}</div>
                    </div>-->

        </div>
        <div class="flex-center position-ref h@-screen bg@-gray-400" v-show="tab == 'explorer'">
          <div id="image-horizontal">

            <img src="https://fakeimg.pl/1220x812/" alt="viewImage" id="viewImage">
            <!--            <img src="https://fakeimg.pl/1220x818/" alt="viewImage" id="viewImage">-->
          </div>

        </div>
      </div>
    </div>
  </main>
</template>

<script>
import * as htmlToImage from 'html-to-image';

export default {
  data: function() {
    return {
      tab: 'editor',
      menu_trigger: false,
      menu_editor: true,
      menu_explorer: false,
    }
  },
  mounted() {
    if(localStorage.photo){
      this.$store.commit('returnPhoto', localStorage.photo);
    }
  },
  created: function () {
    /*if(localStorage.getItem('tab')){}*/
    // console.log(localStorage.photo);
    // console.log(localStorage.horizontalBody);
    // localStorage.removeItem('cats');
    /*if(localStorage.tab == 'explorer'){
      this.menu_editor = false;
      this.menu_explorer = true;
    } else {

    }*/

    localStorage.tab = 'editor';


    // localStorage.tab = 'explorer';
  },
  methods: {
    converter(){
      let self = this;
      htmlToImage.toPng(document.getElementById('form-horizontal'))
          .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            // document.body.appendChild(img);

            // console.log(img);

            localStorage.tab = self.tab = 'explorer';
            self.menu_trigger = self.menu_editor = false;
            self.menu_explorer = true;

            document.getElementById('image-horizontal').innerHTML = '';
            document.getElementById('image-horizontal').append(img);

          })
          .catch(function (error) {
            console.error('oops, something went wrong!', error);
          });
    },
    visible(tab) {
      this.tab = tab;
      this.menu_trigger = this.menu_editor = this.menu_explorer = false;
      localStorage.tab = tab;

      switch (tab){
        case 'editor':
          this.menu_editor = true;
          break;
        case 'explorer':
          this.menu_explorer = true;
          break;
      }
    },
    menuTrigger(){
      this.menu_trigger = !this.menu_trigger;

      if(!this.menu_trigger){
        switch (localStorage.tab){
          case 'editor':
            this.menu_editor = true;
            this.menu_explorer = false;
            break;
          case 'explorer':
            this.menu_editor = false;
            this.menu_explorer = true;
            break;
        }
      }

      // this.menu_editor = false;
      // this.menu_explorer = false;
    },

    /* Photo */
    onPhotoChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createPhoto(files[0]);
    },
    createPhoto(file) {
      let reader = new FileReader();
      let self = this;

      // console.log(reader);
      reader.onload = (e) => {
        self.$store.commit('createPhoto', e.target.result);
        localStorage.photo = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removePhoto(){
      this.$store.commit('removePhoto');
    },
    uploadImage(){
      /*axios.post('/image/store',{image: this.image}).then(response => {
        if (response.data.success) {
          alert(response.data.success);
        }
      });*/
    },

    returnEditor(){
      localStorage.tab = this.tab = 'editor';
      this.menu_trigger = this.menu_explorer = false;
      this.menu_editor = true;
    },

    downloaderFile(url, fileName){ // скачивание файла по ссылке
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.responseType = "blob";
      xhr.onload = function(){
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(this.response);
        var tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
      }
      xhr.send();
    },

    downloadImage(){
      let now = new Date(),
          title = 'horizontal_';
          title = title + now.getHours();
          title = title + now.getMinutes();
          title = title + now.getSeconds();
          title = title + now.getMilliseconds();
          title = title + '_'+ now.getFullYear();

      let url = document.querySelector('#image-horizontal img').src;
      let fileName = title + '.png';

      let xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.responseType = "blob";
      xhr.onload = function(){
        let urlCreator = window.URL || window.webkitURL;
        let imageUrl = urlCreator.createObjectURL(this.response);
        let tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
      }
      xhr.send();

    }
  }
}
</script>

<style>
#form-horizontal {
  height: 835px;
  width: 1220px;
  display: block;
  /* margin: auto;*/
}
.level_1 {
  position: relative;
  width: 1220px;
  height: 835px;
  background: #e21e22;
}

[contenteditable] {
outline: 0px solid transparent;
}
.editor-top, .editor-bottom {
position: absolute;
width: 100%;
}
.editor-top {
top: 6px;
}
.editor-bottom {
bottom: 7px;
}
.editor-top div, .editor-bottom div {
text-align: center;
font-size: 26px;
color: #fff;
text-transform: uppercase;
}


.level_2 {
border: 20px solid #e21e22;
/*height: calc(100% - 120px);*/
  height: calc(100% - 0px);
  padding: 15px;
  /*width: calc(100% - 70px);*/
  width: calc(100% - 0px);
  background: #fff;
  border-top: 45px solid #e21e22;
  border-bottom: 45px solid #e21e22;
}
.content {
  width: 100%;
  height: 100%;
}
.info {
  width: 100%;
  height: inherit;
}
.col-1 {
  width: 380px;
  height: inherit;
  float: left;
  margin: 0;
  padding: 0;
  overflow: hidden;
  position: relative;
}
.col-1 .img {
  position: relative;
  /*border: 3px solid #e21e22;*/
  height: 451px;
  overflow: hidden;
}
#upload_img {
  height: 100%;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-align-content: stretch;
  -ms-flex-line-pack: stretch;
  align-content: stretch;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
}
#upload_img .wrapp__info {
  color: grey;
  transition: 200ms color;
  text-align: center;
  margin: 0 0 10px;
}
#upload_img .wrapp__info div {
  margin: 0;
  line-height: normal;
}
#upload_img .wrapp__info .size {
  font-weight: 600;
  color: #111;
}
#upload_img .upload_img_container {
  margin: 0 0 15px;
}
#upload_img .upload_img_container .form-group {
  padding: 0;
  margin: 0;
  width: 200px;
}
#upload_img .upload_img_container .label {
  /*width: 140px;*/
  border: 2px dashed grey;
  border-radius: 5px;
  display: block;
  padding: 1.2em;
  transition: border 300ms ease;
  cursor: pointer;
  text-align: center;
}
#upload_img .upload_img_container .label i,
.upload_img_container .label .title {
  color: grey;
  transition: 200ms color;
}
#upload_img .upload_img_container .label i {
  display: block;
  font-size: 42px;
  padding-bottom: 16px;
}
#upload_img .input__file {
  opacity: 0;
  visibility: hidden;
  position: absolute;
}
#upload_img .upload_img_container input[type=file] {
  outline: 0;
  opacity: 0;
  pointer-events: none;
  user-select: none;
}
#photo-container:hover button {
  opacity: 1;
}

#remove_image {
  position: absolute;
  top: 0;
  left: 0;
  color: #555;
  line-height: normal;
  width: 183px;
  margin: auto;
  border: 1px solid #555;
  padding: 10px 0;
  background: #fff;
  opacity: .3;
}
#remove_image:hover {
  opacity: 1;
}

.notification {
  font-family: 'DejaVu Sans';
  font-size: 60px;
  text-align: center;
  text-transform: uppercase;
  font-weight: 700;
  line-height: 70px;
}
.notification .item_1 {
  margin: 0 0 20px;
}
.notification .item_2 {
  font-size: 99px;
  text-indent: -4px;
  margin: 0 0 10px;
}
.notification .item_3.mod_101 {/*человек*/
  font-size: 60px;
}
.notification .item_3.mod_102 { /*ребенок*/
  font-size: 70px;
}
.notification .item_3.mod_103 {/*подросток*/
  font-size: 52px;
}
.notification .item_3.mod_104 {/*родственников*/
  letter-spacing: .01em;
  font-size: 36px;
}

/* col-2 */
.col-2 {
  padding: 0;
  float: right;
  width: 735px;
  margin: 0;
  position: relative;
  height: inherit;
}
.editor {
  position: relative;
  text-align: left;
  max-height: 605px;
  overflow: hidden;
}



/* editor */
.codex-editor {
  position: relative;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  z-index: 1;
}
#editorjs-title .codex-editor__redactor, #editorjs-subtitle .codex-editor__redactor, #editorjs-editor .codex-editor__redactor, #editorjs-footer .codex-editor__redactor, #editorjs-top .codex-editor__redactor, #editorjs-bottom .codex-editor__redactor {
  padding: 0 !important;
}
@media (min-width: 651px){
  .codex-editor--narrow .codex-editor__redactor {
    margin-right: 50px;
  }
}
.ce-block:first-of-type {
  margin-top: 0;
  padding-top: 6px;
}
.ce-block__content {
  position: relative;
  max-width: 650px;
  margin: 0 auto;
  -webkit-transition: background-color .15s ease;
  transition: background-color .15s ease;
}
#editorjs-title .ce-block__content,
#editorjs-subtitle .ce-block__content,
#editorjs-editor .ce-block__content,
#editorjs-footer .ce-block__content {
  max-width: 100%;
}
#form-horizontal .ce-header {
  color: #000;
  padding: 1em 0;
  margin: 0;
  margin-bottom: -0.9em;
  line-height: 1.5em;
  outline: none;
  font-family: 'DejaVu Sans';
  font-weight: 700;
}
#form-horizontal h1.ce-header {
  padding: 0;
  line-height: 60px;
  margin: 0;
  font-size: 60px;
  text-transform: uppercase;
  text-indent: -1px;
}
#form-horizontal h2.ce-header {
  line-height: 30px;
  padding: 0 0 20px;
  font-size: 24px;
  text-transform: uppercase;
  display: block;
  margin: 0;
}
.ce-paragraph {
  line-height: 1.6em;
  outline: none;
}
#form-horizontal .ce-paragraph {
  font-family: 'DejaVu Sans';
  font-size: 22px;
  padding: 0 0 5px;
  line-height: 1.2em;
  margin: 0;
}
.ce-block b {
  font-weight: 700;
}

/* footer */
.col-2 .footer {
  border-top: 4px solid #e21e22;
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #fff;
  z-index: 9;
  padding-top: 10px;
  color: #000;
}
#form-horizontal .footer .ce-header {
  text-align: center;
  margin: 0;
  padding: 0;
}
#form-horizontal .footer h1.ce-header {
  font-size: 44px;
  text-transform: initial;
}
#form-horizontal .footer h2.ce-header {
  line-height: 30px;
  font-size: 26px;
  text-transform: uppercase;
}
#form-horizontal .footer .ce-paragraph {
  padding: 0;
  line-height: normal;
  font-size: 20px;
  text-align: center;
}

#image-horizontal {
  /*height: 812px;*/
  /*width: 1220px;*/
  margin: auto;
  min-width: 1220px;
}

button:focus {
  outline: none;
  border: none;
}
.menu-trigger,
.menu-trigger span {
  display: inline-block;
  transition: all .4s;
  box-sizing: border-box;
}
.menu-trigger {
  position: relative;
  /*width: 50px;
  height: 44px;*/
  width: 36px;
  height: 36px;
  background: none;
  border: none;
  appearance: none;
  cursor: pointer;
}
.menu-trigger span {
  position: absolute;
  left: 0;
  width: 100%;
  height: 4px;
  background-color: #000;
  border-radius: 4px;
}
.menu-trigger span:nth-of-type(1) {
  top: 0;
}
.menu-trigger span:nth-of-type(2) {
  top: 16px;
}
.menu-trigger span:nth-of-type(3) {
  bottom: 0;
}


#menu01.active span:nth-of-type(1) {
  transform: translateY(16px) rotate(-45deg);
}
#menu01.active span:nth-of-type(2) {
  opacity: 0;
}
#menu01.active span:nth-of-type(3) {
  transform: translateY(-16px) rotate(45deg);
}
</style>

<!--

npm install vue-editor-js --save-dev

-->
