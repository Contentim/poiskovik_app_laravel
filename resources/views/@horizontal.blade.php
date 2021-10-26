<!DOCTYPE html>
<html id="release">
    @include('site.head')
    <body>
        <main>
            <!-- Header -->
            @include('site.header')
            
    
            <!-- Content -->
            <section id="layout-content">
                </section>
                
                <div class="uk-section uk-section-default">
    
    			<div class="uk-container">
    				<div uk-grid="" class="uk-grid">
    				
    				    <!--{ % partial 'site/left-sidebar' %}-->

    
    					<div class="uk-width-1-1@m uk-first-column">
    						<article class="uk-article">
    						    <div id="app">
  
  <div class="container" v-show="this.zoomer.status == false">

    <ul class="nav-tabs nav-justified">
      <li class="nav-item">
        <a class="nav-link" @click.prevent="setActive('constructor')" :class="{ active: isActive('constructor') }" href="#constructor">Конструктор</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click.prevent="setActive('download')" :class="{ active: isActive('download') }" href="#download">Просмотр и скачивание</a>
      </li>
    </ul>
    
    <div class="tab-content" id="tabContent">
      <div :class="{ 'active show': isActive('constructor') }" id="constructor">
        <div class="header">
            <div class="download">
            
                <!-- <button onclick="test();">TEST</button> -->
                <button onclick="returnDefaultData();">Вернуть исходный текст ориентировки</button>
                <button onclick="returnDefaultFooter();" style="margin: 0 10px;">Вернуть исходный текст контактов ориентировки</button>
                
                <span>Сформировав объявление, нажмите вкладку <br><b>Просмотр и скачивание</b></span>
            </div>
        </div>
        <div id="creator">
            <div id="creator-form">
                <div class="level_1">
        
                    <div class="editor-top" id="editor-top">
                        <div contenteditable="true">загрузка...</div>
                    </div>
                    
                    <div class="level_2">
                        <div class="content">
                            <div class="info">
                
                                <div class="img">
                                    <div class="img_wrapper">
                                        <form
                                            data-request="onSubmit"
                                            data-request-files
                                            data-request-flash
                                            data-request-update="remove_image: '#remove_image'"
                                            data-request-success="visibleRemoveImage(); saveLocalStorage(data); console.log(data)" id="upload_img">
                                            
                                            <div class="wrapp__info">
                                                <div>Размер окна:</div>
                                                <div class="size">380 * 458 пикселей</div>
                                            </div>        
                                            
                                            <div class="upload_img_container">
                                              <div class="form-group">
                                                <label class="label">
                                                  <i class="material-icons">attach_file</i>
                                                  <span class="title">Выбрать фото</span>
                                                    <input type="hidden" name="size" value="465" class="input__file">
                                                    <input type="file" name="image" accept="image/*" class="input__file">
                                                </label>
                                              </div>
                                            </div>
                                            <div class="submit__wrapper">
                                                <button type="submit"><i class="icon fa fa-upload"></i> Загрузить</button>
                                            </div>
                                        </form>
                                    
                                        <div id="upload__img"></div>
                                    
                                        <form id="remove_image">
                                            {% partial 'remove_image' %}
                                        </form>
                                    </div>
                                    
                                    <div class="notification">
                                        <div class="item_1">помогите</div>
                                        <div class="item_2">найти</div>
                                        <div class="item_3">человека</div>
                                    </div>
                                </div> 
                
                                <div class="text">
                                    
                                    <div class="editor">
                                        <div id="editorjs-editor"></div>
                                    </div>
                                    
                                    <div class="footer">
                                        <div id="editorjs-footer"></div>
                                    </div>
                                </div>
                            
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="editor-bottom" id="editor-bottom">
                        <div contenteditable="true">загрузка...</div>
                    </div>
                </div>
            </div>
        </div> <!-- end #creator -->
      </div>
      <div :class="{ 'active show': isActive('download') }" id="download">
          <div class="header">
                <div class="download">

                    <button
                            data-request-data="
                                src: function(){ 
                                
                                return document.querySelector('#upload__img img').src;
                                    document.querySelector('#downloadImage').style.display = 'block';
                                    if(document.querySelector('#upload__img img')){
                                        return document.querySelector('#upload__img img').src;
                                    } else {
                                        return '//fakeimg.pl/380x458/';
                                    }
                                },                                
                                editor: function(){ 
                                    return document.querySelector('#editorjs-editor .codex-editor__redactor').innerHTML;
                                },
                                footer: function(){ 
                                    return document.querySelector('#editorjs-footer .codex-editor__redactor').innerHTML;
                                },
                                top: function(){ 
                                    return document.querySelector('#editor-top div').innerText;
                                },
                                bottom: function(){ 
                                    return document.querySelector('#editor-bottom div').innerText;
                                }
                            " 
                            data-request="onDownload" 
                            data-request-success="getImage(data); console.log('data', data);"
                            data-request-confirm="Вы уверены, что хотите скачать фотографию?">Генерация нового изображения</button>
                            
                    <button id="downloadImage" onclick="downloadImage();">Скачать</button>
                    <input type="hidden" id="html">
                </div>
            </div>
            <img src="https://fakeimg.pl/1220x818/" alt="" id="viewImage">
      </div>
    </div>
  </div>

</div>

<style>
#nav .title h1 {
    color: #111;
}
#app button:focus {
    outline: none;
}
.list_history {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-align-content: flex-start;
    -ms-flex-line-pack: start;
    align-content: flex-start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.list_history .item {
    width: 584px;
    border: 1px solid #8c3a4d;
    padding: 8px;
    margin: 0 0 15px;
    
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-align-content: flex-start;
    -ms-flex-line-pack: start;
    align-content: flex-start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.list_history .item:nth-child(odd){
    margin: 0 15px 0 0;
}
.list_history .content {
    padding: 0 0 0 10px;
    height: 183px;
    
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-align-content: flex-start;
    -ms-flex-line-pack: start;
    align-content: flex-start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.list_history .content .top,
.list_history .content .bottom {
    width: 100%;
}
.list_history .content .title {
    font-size: 18px;
    margin: 0;
    font-weight: 600;
    color: #111;
}
.list_history .content button {
    background-color: #fff;
    color: #111;
    padding: 5px 0;
    display: block;
    font-size: 18px;
    transition: 0.1s ease-in-out;
    transition-property: color, background-color;
    text-decoration: none;
    cursor: pointer;
    width: 100%;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    border: 1px solid #8c3a4d;
    font-weight: 500;
}
.list_history .content button:hover {
    background-color: #efefef;
}
.list_history .content .zoom {
    margin: 0 0 10px;
}
.zoomer .header {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-align-content: flex-start;
    -ms-flex-line-pack: start;
    align-content: flex-start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.zoomer .header .title {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-align-content: flex-start;
    -ms-flex-line-pack: start;
    align-content: flex-start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.zoomer .header h1 {
    margin: 0 15px 0 0;
    line-height: 41px;
}
.zoomer .header button {
    background-color: #ff6600;
    color: #fff;
    padding: 10px 15px;
    display: block;
    font-size: 20px;
    text-transform: uppercase;
    transition: 0.1s ease-in-out;
    transition-property: color, background-color;
    text-decoration: none;
    cursor: pointer;
    border: none;
    border-radius: 8px;
}
</style>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        /*$('#onGenerateImage').on('onDownload', function() {
            console.log('Updated!');
        });*/
        
        
        /* TOP */
        document.querySelector('#editor-top div').addEventListener("input", function(e) {
            localStorage.setItem('topOrienting', e.target.innerHTML);
        }, false);
        
        let count_Top = localStorage.getItem("topOrienting"),
            countTop;
        
        
        if (count_Top == null || count_Top.length == 0) {
            countTop = 0;
        }

        if(countTop == 0){
            document.querySelector('#editor-top div').innerHTML = '';
        } else {
            document.querySelector('#editor-top div').innerHTML = localStorage.getItem('topOrienting');
        }
        
        if(count_Top == null){
            document.querySelector('#editor-top div').innerHTML = 'https://vk.com/poiskovik_app';
        }
        
        
        /* BOTTOM */
        document.querySelector('#editor-bottom div').addEventListener("input", function(e) {
            localStorage.setItem('bottomOrienting', e.target.innerHTML);
        }, false);
        
        let count_Bottom = localStorage.getItem("bottomOrienting"),
            countBottom;
        
        if (count_Bottom == null || count_Bottom.length == 0) {
            countBottom = 0;
        }
        
        if(countBottom == 0){
            document.querySelector('#editor-bottom div').innerHTML = '';
        } else {
            document.querySelector('#editor-bottom div').innerHTML = localStorage.getItem('bottomOrienting');
        }
        
        if(count_Bottom == null){
            document.querySelector('#editor-bottom div').innerHTML = 'https://vk.com/poiskovik_app';
        }
        
        


        if(localStorage.getItem('imgAd')){
            var img = document.createElement("img");

            let imgAd = localStorage.getItem('imgAd');
            let str = imgAd.replace(/\"*/g,'');

            img.src = str;
            var src = document.getElementById("upload__img");
            src.appendChild(img);

            document.getElementById('path_img').value = str;

            document.querySelector('#upload_img').style.display = 'none';
            document.querySelector('#remove_image').style.display = 'flex';
        }
        
        /*if(localStorage.getItem('getImage')){
            document.querySelector('#downloadImage').style.display = 'block';
            document.querySelector('#viewImage').src = localStorage.getItem('getImage');
        } else {
            document.querySelector('#downloadImage').style.display = 'none';
            document.querySelector('#viewImage').src = 'https://fakeimg.pl/1220x818/';
        }
        
        document.querySelector('#downloadImage').addEventListener('click', function(){
            let now = new Date(),
                title = 'orienting_';
                
                title = title + now.getHours();
                title = title + now.getMinutes();
                title = title + now.getSeconds();
                title = title + now.getMilliseconds();
                title = title + '_'+ now.getFullYear();
                
                if(localStorage.getItem('getImage')){
                    downloadFile(localStorage.getItem('getImage'), title + '.jpg');
                }                
            
        });*/
        
        // скачивание файла по ссылке
        function downloadFile(url, fileName){
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
        }
        
        /*document.querySelectorAll('ul#commontTabs li').addEventListener ('click', function(e){
            //document.querySelector('#commontTabs li').classList.remove('uk-active');
            
            console.log(e)
            //e.target.classList.add('uk-active 23423423');
        });*/


    });
              
    /*
    ** load to server
    */
    
    function getSRC(){
        
        try {
          return JSON.parse('https://fakeimg.pl/380x458/');
        } catch (e) {
          // handle error
          return;
        }

        
        
        
        //console.log('WWW', document.querySelector('#upload__img img').src);
        
        document.querySelector('#downloadImage').style.display = 'block';
        if(document.querySelector('#upload__img img')){
            return document.querySelector('#path_img').src;
        } else {
            return 'https://fakeimg.pl/380x458/';
        }        
    }
    function getEditor(){
        return document.querySelector('#editorjs-editor .codex-editor__redactor').innerHTML;
    }
    function getFooter(){
        return document.querySelector('#editorjs-footer .codex-editor__redactor').innerHTML;
    }
    function getTop(){
        return document.querySelector('#editor-top div').innerText;
    }
    function getBottom(){
        return document.querySelector('#editor-bottom div').innerText;
    }
    function getImage(data){
        localStorage.setItem('getImage', data.data);
        document.querySelector('#viewImage').src = data.data;
    }
    
    function visibleRemoveImage(){
        document.querySelector('#upload_img').style.display = 'none';
        document.querySelector('#remove_image').style.display = 'flex';
    }
    function saveLocalStorage(data){
        localStorage.setItem('imgAd', data.src);
    }

    function returnDefaultData(){
        localStorage.removeItem('orientingData');
        document.querySelector('#editorjs-editor').innerHTML = '';
        var editor = new EditorJS({
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
            blocks: [
              {
                type: "header",
                data: {
                  text: "Фамилия",
                  level: 1
                }
              },
              {
                type: "header",
                data: {
                  text: "Имя Отчество, возраст",
                  level: 2
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>01.01.2021 года в 8:00 ушла из дома по ул. Ленина в неизвестном направлении.<b>'
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>Приметы:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.'
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>Одежда:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.'
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>Особые приметы:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.'
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>Состояние здоровья:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore.'
                }
              },
              {
                type : 'paragraph',
                data : {
                  text : '<b>Вещи:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.'
                }
              },
            ]
          },
          onReady: function(){
            //saveButton.click();
          },
          onChange: function() {
            editor.save().then((outputData) => {
                localStorage.setItem('orientingData', JSON.stringify(outputData.blocks));
            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
          }
        });
    }
    
    function returnDefaultFooter(){
        localStorage.removeItem('orientingFooter');
        document.querySelector('#editorjs-footer').innerHTML = '';
        var footer = new EditorJS({
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
           * This Tool will be used as default
           */
          // initialBlock: 'paragraph',
          /**
           * Initial Editor data
           */
          data: { 
              blocks: [
                  {
                    type: "header",
                    data: {
                      text: "Нуждается в медицинской помощи",
                      level: 2
                    }
                  },
                  /*{
                    type: "header",
                    data: {
                      text: "дезориентирован",
                      level: 2
                    }
                  },*/
                  {
                    type : 'paragraph',
                    data : {
                      text : 'Просим сообщать любую информацию по телефону горячей линии:'
                    }
                  },
                  {
                    type: "header",
                    data: {
                      text: "8(800) 123-45-67 или 112", 
                      level: 1
                    }
                  },
                  {
                    type: "header",
                    data: {
                      text: "Нужна помощь добровольцев",
                      level: 2
                    }
                  },
              ]
          },
          onReady: function(){
            //saveButton.click();
          },
          onChange: function() {
            footer.save().then((outputFooter) => {
                localStorage.setItem('orientingFooter', JSON.stringify(outputFooter.blocks));
            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
          }
        });
    }
    
    
    
    
    

</script>


<!-- END PAGE-->
    						</article>
    					</div>

    				</div>
    			</div>
    		</div>
		
    
            <!-- Footer -->
            @include('site.footer');
        </main>
        
        <!-- Scripts -->

        <script src="assets/js/uikit-icons.min.js"></script>

        <script>
 
            new Vue({
              el: "#app",
              delimiters: ['[[',']]'],
              data: {
                zoomer: {
                    status: false,
                    src: ''
                },
                activeItem: 'constructor',
                history: []
              },
              mounted: function(){
                  //console.log(JSON.parse(localStorage.getItem('getHistory')));
                  
              },
              methods: {
                
                visibleZoom: function(id, src){
                    console.log(src);
                    this.zoomer.id = id;
                    this.zoomer.src = src;
                    this.zoomer.status = true;
                },
                closeZoom: function(){
                    this.zoomer.id = '';
                    this.zoomer.src = '';
                    this.zoomer.status = false;
                },
              	isActive (menuItem) {
                  return this.activeItem === menuItem
                },
                setActive (menuItem) {
                  this.activeItem = menuItem
                }
              }
            })
           
        </script>
        
    </body>
</html>