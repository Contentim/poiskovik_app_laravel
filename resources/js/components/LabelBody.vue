<template>
  <main class="h-full p@b-16 overflow-y-auto bg-white">
    <div class="c@ontainer grid p-2 mx-auto relative">

      <div class="absolute w-full h-full bg-white z-50 px-2" id="loader" v-if="this.$store.state.loader == true">
        <div class="text-3xl font-medium"><span class="text-orange">Подождите.</span> Преобразуем текст в изображение...</div>
      </div>

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
            Редактор
          </div>
        </div>

        <div v-if="menu_trigger == true" class="mr-4 flex flex-wrap content-center" @click="visible('explorer')">
          <div class="border-b border-gray-400 border-dashed cursor-pointer hover:border-purple-800 hover:text-purple-800">
            Просмотр и скачивание
          </div>
        </div>

        <div class="mr-4 flex flex-wrap content-center" v-if="menu_trigger == false && menu_editor == true">
          <div class="font-medium text-gray-800">
            Редактор:
          </div>
        </div>

        <div class="mr-4 flex flex-wrap content-center py-1 px-3 rounded-md bg-orange text-white cursor-pointer" v-if="menu_trigger == false && menu_editor == true" @click="converter()">
          <svg version="1.1" class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="31" height="31"
               viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g>
                <g>
                    <path fill="#fff" d="M328.844,368.733c-5.383-3.235-10.908-6.487-16.433-9.675c1.299-11.07,1.302-22.268,0.006-33.316
                        c5.546-3.2,11.068-6.45,16.425-9.671c9.02-5.42,12.78-16.856,8.744-26.603c0,0,0,0-0.001-0.001l-11.771-28.418
                        c-4.037-9.744-14.777-15.175-24.993-12.63c-6.071,1.511-12.274,3.118-18.455,4.776c-6.901-8.732-14.82-16.649-23.563-23.554
                        c1.658-6.182,3.266-12.388,4.778-18.461c2.545-10.211-2.885-20.955-12.629-24.992l-28.418-11.771
                        c-9.744-4.038-21.183-0.281-26.605,8.741c-3.229,5.374-6.482,10.899-9.674,16.433c-11.067-1.299-22.263-1.302-33.316-0.007
                        c-3.202-5.551-6.453-11.074-9.67-16.426c-5.424-9.02-16.86-12.778-26.605-8.741l-28.418,11.771
                        c-9.742,4.036-15.174,14.781-12.629,24.992c1.515,6.085,3.121,12.289,4.776,18.455c-8.731,6.899-16.649,14.82-23.553,23.563
                        c-6.196-1.663-12.402-3.269-18.463-4.779c-10.214-2.547-20.956,2.888-24.993,12.631L1.615,289.467
                        c-4.035,9.745-0.276,21.182,8.742,26.602c5.375,3.23,10.9,6.482,16.433,9.675c-1.298,11.066-1.301,22.262-0.006,33.316
                        c-5.538,3.195-11.06,6.446-16.429,9.672c-9.018,5.421-12.777,16.857-8.741,26.603l11.772,28.418
                        c4.036,9.743,14.775,15.176,24.993,12.63c6.064-1.51,12.268-3.116,18.453-4.776c6.901,8.731,14.82,16.647,23.563,23.553
                        c-1.66,6.189-3.267,12.395-4.778,18.461c-2.545,10.211,2.885,20.956,12.629,24.992l28.419,11.772
                        c2.64,1.093,5.403,1.615,8.137,1.615c7.362,0,14.514-3.779,18.471-10.355c3.205-5.333,6.456-10.856,9.674-16.432
                        c11.065,1.297,22.264,1.299,33.316,0.006c3.179,5.512,6.43,11.034,9.67,16.427c5.422,9.02,16.858,12.777,26.605,8.741
                        l28.418-11.771c9.742-4.036,15.174-14.781,12.629-24.992c-1.503-6.033-3.109-12.237-4.776-18.455
                        c8.729-6.899,16.648-14.819,23.554-23.562c6.178,1.657,12.384,3.263,18.46,4.777c10.211,2.547,20.956-2.884,24.993-12.63
                        l11.771-28.419C341.621,385.59,337.862,374.153,328.844,368.733z M305.116,413.834c-5.837-1.462-11.787-3.008-17.703-4.602
                        c-8.376-2.253-17.215,0.692-22.519,7.507c-6.096,7.83-13.151,14.886-20.968,20.973c-6.807,5.302-9.748,14.138-7.493,22.509
                        c1.603,5.954,3.148,11.9,4.601,17.696l-26.122,10.819c-3.107-5.184-6.218-10.481-9.259-15.765
                        c-4.327-7.514-12.655-11.678-21.216-10.618c-9.831,1.221-19.81,1.22-29.654-0.005c-8.585-1.066-16.906,3.098-21.232,10.614
                        c-3.078,5.344-6.19,10.644-9.263,15.773l-26.122-10.82c1.461-5.827,3.007-11.776,4.603-17.701
                        c2.255-8.375-0.692-17.215-7.507-22.52c-7.83-6.095-14.885-13.149-20.973-20.965c-5.3-6.809-14.136-9.749-22.51-7.495
                        c-5.923,1.595-11.87,3.141-17.695,4.601l-10.82-26.121c5.16-3.094,10.459-6.205,15.765-9.26
                        c7.515-4.327,11.683-12.653,10.619-21.215c-1.223-9.832-1.22-19.81,0.003-29.655c1.068-8.57-3.097-16.905-10.616-21.233
                        c-5.304-3.054-10.604-6.166-15.772-9.265l10.82-26.121c5.82,1.459,11.768,3.005,17.702,4.602
                        c8.372,2.256,17.212-0.692,22.52-7.507c6.095-7.83,13.15-14.886,20.965-20.972c6.808-5.301,9.749-14.138,7.494-22.512
                        c-1.59-5.904-3.136-11.85-4.601-17.694l26.122-10.819c3.084,5.146,6.196,10.444,9.259,15.765
                        c4.328,7.515,12.663,11.689,21.216,10.618c9.827-1.223,19.804-1.223,29.657,0.005c8.575,1.068,16.905-3.102,21.231-10.617
                        c3.053-5.304,6.166-10.604,9.262-15.771l26.122,10.819c-1.462,5.833-3.008,11.782-4.603,17.703
                        c-2.255,8.374,0.692,17.214,7.507,22.519c7.829,6.095,14.885,13.149,20.973,20.965c5.3,6.807,14.133,9.748,22.511,7.494
                        c5.919-1.594,11.865-3.14,17.694-4.601l10.819,26.121c-5.153,3.089-10.451,6.2-15.765,9.26
                        c-7.515,4.327-11.684,12.654-10.619,21.216c1.223,9.827,1.221,19.806-0.005,29.657c-1.066,8.571,3.101,16.904,10.617,21.231
                        c5.296,3.049,10.596,6.161,15.772,9.263L305.116,413.834z"/>
                </g>
            </g>
            <g>
                <g>
                    <path fill="#fff" d="M241.762,312.511c0,0,0,0-0.001-0.001c-16.48-39.789-62.256-58.752-102.051-42.271
                        C99.922,286.721,80.958,332.501,97.44,372.29c7.983,19.276,22.997,34.287,42.271,42.272c9.637,3.991,19.763,5.987,29.889,5.987
                        s20.252-1.996,29.891-5.987C239.279,398.08,258.242,352.301,241.762,312.511z M190.72,393.388c-13.618,5.641-28.617,5.64-42.239,0
                        c-13.618-5.641-24.225-16.249-29.867-29.868c-11.647-28.114,1.753-60.462,29.868-72.107c6.885-2.852,14.021-4.202,21.047-4.202
                        c21.667,0,42.265,12.84,51.06,34.07C232.234,349.395,218.834,381.742,190.72,393.388z"/>
                </g>
            </g>
            <g>
                <g>
                    <path fill="#fff" d="M496.553,100.936c-3.956-0.592-8.019-1.167-12.111-1.713c-2.062-6.857-4.816-13.505-8.214-19.819
                        c2.504-3.275,4.972-6.556,7.357-9.779c5.295-7.161,4.529-17.317-1.78-23.623l-15.808-15.806
                        c-6.309-6.31-16.465-7.075-23.624-1.778c-3.234,2.393-6.514,4.86-9.779,7.355c-6.313-3.398-12.96-6.152-19.819-8.215
                        c-0.547-4.092-1.12-8.155-1.712-12.11C409.746,6.642,402.024,0,393.102,0h-22.356c-8.922,0-16.644,6.642-17.961,15.447
                        c-0.591,3.953-1.165,8.017-1.712,12.11c-6.859,2.063-13.507,4.817-19.819,8.215c-3.263-2.496-6.545-4.964-9.778-7.355
                        c-7.161-5.297-17.317-4.532-23.624,1.777l-15.806,15.805c-6.31,6.308-7.077,16.465-1.78,23.627
                        c2.383,3.222,4.851,6.504,7.354,9.778c-3.396,6.313-6.151,12.96-8.214,19.819c-4.091,0.547-8.155,1.121-12.11,1.713
                        c-8.807,1.318-15.449,9.039-15.449,17.962v22.355c0,8.922,6.64,16.644,15.447,17.962c3.956,0.592,8.019,1.167,12.111,1.713
                        c2.063,6.858,4.817,13.505,8.214,19.819c-2.501,3.272-4.969,6.552-7.357,9.779c-5.294,7.159-4.529,17.317,1.78,23.622
                        l15.808,15.808c6.308,6.31,16.464,7.074,23.624,1.778c3.234-2.391,6.514-4.86,9.778-7.354c6.315,3.398,12.963,6.152,19.82,8.214
                        c0.545,4.091,1.12,8.155,1.712,12.111c1.318,8.806,9.04,15.448,17.962,15.448h22.356c8.922,0,16.644-6.64,17.961-15.449
                        c0.591-3.956,1.165-8.019,1.712-12.111c6.858-2.061,13.505-4.817,19.819-8.215c3.263,2.496,6.545,4.964,9.778,7.356
                        c7.159,5.297,17.317,4.532,23.624-1.777l15.808-15.806c6.309-6.308,7.075-16.465,1.778-23.626
                        c-2.386-3.226-4.854-6.508-7.354-9.777c3.396-6.313,6.151-12.959,8.214-19.819c4.091-0.547,8.155-1.121,12.11-1.713
                        c8.807-1.318,15.449-9.039,15.449-17.962v-22.355C512,109.976,505.359,102.254,496.553,100.936z M490.228,138.142
                        c-3.592,0.521-7.257,1.027-10.934,1.506c-7.273,0.949-13.227,6.111-15.165,13.149c-1.857,6.739-4.552,13.242-8.009,19.328
                        c-3.611,6.353-3.054,14.215,1.419,20.032c2.255,2.932,4.492,5.883,6.669,8.799l-11.404,11.405
                        c-2.925-2.183-5.876-4.419-8.802-6.669c-5.814-4.475-13.678-5.028-20.032-1.421c-6.087,3.458-12.59,6.153-19.325,8.01
                        c-7.042,1.94-12.204,7.894-13.15,15.165c-0.479,3.677-0.984,7.343-1.506,10.935h-16.13c-0.521-3.592-1.026-7.257-1.506-10.931
                        c-0.949-7.274-6.11-13.228-13.15-15.168c-6.737-1.856-13.238-4.551-19.327-8.009c-6.354-3.61-14.218-3.055-20.031,1.419
                        c-2.927,2.251-5.876,4.486-8.803,6.669l-11.404-11.405c2.177-2.919,4.413-5.868,6.671-8.803c4.47-5.815,5.027-13.677,1.417-20.03
                        c-3.457-6.086-6.152-12.59-8.009-19.327c-1.939-7.04-7.892-12.201-15.165-13.15c-3.677-0.48-7.343-0.984-10.935-1.507v-16.128
                        c3.592-0.521,7.257-1.027,10.934-1.506c7.273-0.949,13.227-6.111,15.165-13.149c1.857-6.738,4.551-13.241,8.009-19.328
                        c3.611-6.353,3.054-14.216-1.417-20.031c-2.259-2.936-4.495-5.886-6.67-8.8l11.404-11.405c2.925,2.183,5.875,4.419,8.8,6.668
                        c5.812,4.475,13.675,5.033,20.034,1.422c6.085-3.457,12.589-6.152,19.325-8.01c7.042-1.94,12.204-7.894,13.15-15.165
                        c0.48-3.677,0.986-7.342,1.507-10.934h16.13c0.521,3.591,1.026,7.256,1.505,10.931c0.949,7.274,6.111,13.228,13.15,15.167
                        c6.738,1.857,13.242,4.553,19.328,8.01c6.355,3.611,14.218,3.05,20.03-1.42c2.927-2.25,5.876-4.486,8.803-6.669l11.404,11.405
                        c-2.175,2.915-4.411,5.866-6.67,8.803c-4.471,5.814-5.027,13.676-1.419,20.029c3.457,6.088,6.152,12.592,8.009,19.328
                        c1.939,7.04,7.892,12.201,15.165,13.15c3.677,0.48,7.343,0.985,10.935,1.507V138.142z"/>
                </g>
            </g>
            <g>
                <g>
                    <path fill="#fff" d="M381.924,83.675c-25.585,0-46.401,20.815-46.401,46.401c0,25.587,20.815,46.402,46.401,46.402
                        s46.401-20.815,46.401-46.402C428.325,104.49,407.51,83.675,381.924,83.675z M381.924,155.851
                        c-14.211,0-25.775-11.563-25.775-25.776c0-14.213,11.563-25.775,25.775-25.775c14.212,0,25.774,11.563,25.775,25.775
                        C407.699,144.288,396.136,155.851,381.924,155.851z"/>
                </g>
            </g>
            </svg>

          <div class="">
            Преобразовать в изображение формата *.PNG
          </div>
        </div>

        <div class="mr-4 flex flex-wrap content-center" v-if="menu_trigger == false && menu_explorer == true">
          <div class="font-medium text-gray-800">
            Просмотр и скачивание:
          </div>
        </div>

        <div
            class="mr-4 flex flex-wrap content-center py-1 px-3 rounded-md bg-orange text-white cursor-pointer"
            v-if="menu_trigger == false && menu_explorer == true"
            @click="returnEditor()">

          <svg version="1.1" class="mr-2" width="31" height="31" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
            <g>
              <g>
                <path fill="#fff" d="M384.834,180.699c-0.698,0-348.733,0-348.733,0l73.326-82.187c4.755-5.33,4.289-13.505-1.041-18.26
                  c-5.328-4.754-13.505-4.29-18.26,1.041l-82.582,92.56c-10.059,11.278-10.058,28.282,0.001,39.557l82.582,92.561
                  c2.556,2.865,6.097,4.323,9.654,4.323c3.064,0,6.139-1.083,8.606-3.282c5.33-4.755,5.795-12.93,1.041-18.26l-73.326-82.188
                  c0,0,348.034,0,348.733,0c55.858,0,101.3,45.444,101.3,101.3s-45.443,101.3-101.3,101.3h-61.58
                  c-7.143,0-12.933,5.791-12.933,12.933c0,7.142,5.79,12.933,12.933,12.933h61.58c70.12,0,127.166-57.046,127.166-127.166
                  C512,237.745,454.954,180.699,384.834,180.699z"/>
              </g>
            </g>
          </svg>

          <div class="">
            Вернуться в редактор
          </div>
        </div>

        <div
            class="mr-4 flex flex-wrap content-center py-1 px-3 rounded-md bg-orange text-white cursor-pointer"
            v-if="menu_trigger == false && menu_explorer == true"
            @click="downloadImage()">
          <svg version="1.1" class="mr-2" width="31" height="27" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;" xml:space="preserve">
            <g>
              <g>
                <path fill="#fff" d="M0,348.65v84.2c0,28.9,23.5,52.5,52.5,52.5h384.4c28.9,0,52.5-23.5,52.5-52.5v-84.2c0-28.9-23.5-52.5-52.5-52.5h-106
                  c-10.8,0-19.8,8.2-20.9,19c-3.4,33.6-31.5,58.9-65.3,58.9s-61.9-25.3-65.3-58.9c-1.1-10.8-10.1-19-20.9-19h-106
                  C23.6,296.15,0,319.65,0,348.65z M244.7,398.55c45.4,0,83.3-33.3,89.3-77.9h102.9c15.4,0,28,12.5,28,28v84.2c0,15.4-12.5,28-28,28
                  H52.5c-15.4,0-28-12.5-28-28v-84.2c0-15.4,12.5-28,28-28h102.9C161.4,365.25,199.3,398.55,244.7,398.55z"/>
                <path fill="#fff" d="M244.7,4.05c-6.8,0-12.3,5.5-12.3,12.3v209.8l-59.3-59.3c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l80.2,80.2
                  c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l80.2-80.2c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-59.3,59.3V16.25
                  C256.9,9.55,251.5,4.05,244.7,4.05z"/>
              </g>
            </g>
          </svg>
          <div class="">
            Скачать изображение
          </div>
        </div>

      </div>

      <div class="h-full">

        <div class="flex-center position-ref h@-screen bg@-gray-400" v-show="tab == 'editor'">

          <div id="photo-container" v-if="$store.state.image_label" class="relative inline-block">

            <div class="w-full h-full bg-gray-400 absolute opacity-50 z-10" v-if="$store.state.label.on == true"></div>
            <div class="flex flex-wrap content-center justify-center absolute top-0 left-0 h-full w-full">
              <img :src="asset('assets/images/najden_zhiv.png')" v-show="$store.state.label.male.alive == true" class="z-20" alt="">
              <img :src="asset('assets/images/najdena_zhiva.png')" v-show="$store.state.label.female.alive == true" class="z-20" alt="">
              <img :src="asset('assets/images/pogib.png')" v-show="$store.state.label.male.died == true" class="z-20" alt="">
              <img :src="asset('assets/images/pogibla.png')" v-show="$store.state.label.female.died == true" class="z-20" alt="">
            </div>

            <img
                :src="$store.state.image_label" 
                class="img-responsive inline-block"
                v-if="$store.state.label.on == false && $store.state.label.male.alive == false && $store.state.label.female.alive == false && $store.state.label.male.died == false && $store.state.label.female.died == false">
            <img
                :src="$store.state.image_label"
                class="img-responsive alive_filter inline-block"
                v-if="$store.state.label.male.alive == true || $store.state.label.female.alive == true">
            <img
                :src="$store.state.image_label"
                class="img-responsive died_filter inline-block"
                v-if="$store.state.label.male.died == true || $store.state.label.female.died == true">
            <button
                class="absolute top-0 left-0 absolute top-0 left-0 bg-white px-4 py-1 border-2 border-red-500 opacity-0 z-30"
                v-if="$store.state.image_label" @click="removeImageLabel">Удалить фото</button>
          </div>
          <div v-else id="image-container" class="img border-4 border-red-600" >
            <form id="upload_img" class="flex">
              <div class="upload_img_container">
                <div class="form-group">
                  <label class="label">
                    <i class="material-icons">attach_file</i>
                    <span class="title">Загрузить фото</span>
                    <input type="file" name="image" accept="image/*" class="input__file" @change="onImageLabelChange">
                  </label>
                </div>
              </div>
            </form>
          </div>

        </div>
        <div class="flex-center position-ref h@-screen bg@-gray-400" v-show="tab == 'explorer'">
          <div id="image-result">
            <img src="https://fakeimg.pl/350x350/" alt="resultImage" id="viewImage">
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
    if(localStorage.image_label){
      this.$store.commit('returnImageLabel', localStorage.image_label);
    }
  },
  created: function () {
    localStorage.tab = 'editor';
    // localStorage.tab = 'explorer';
  },
  methods: {
    converter(){
      let self = this;

      self.$store.commit('loader');

      htmlToImage.toPng(document.getElementById('photo-container'), {imagePlaceholder: 'https://fakeimg.pl/350x350/'})
          .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;

            localStorage.tab = self.tab = 'explorer';
            self.menu_trigger = self.menu_editor = false;
            self.menu_explorer = true;
            self.$store.commit('loader');

            self.$store.commit('success');
            setTimeout(function(){
              self.$store.commit('success');
            },6000)

            document.getElementById('image-result').innerHTML = '';
            document.getElementById('image-result').append(img);

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
    onImageLabelChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImageLabel(files[0]);
    },
    createImageLabel(file) {
      let reader = new FileReader();
      let self = this;


      reader.onload = (e) => {
        console.log(e.target);
        self.$store.commit('createImageLabel', e.target.result);
        localStorage.image_label = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImageLabel(){
      this.$store.commit('removeImageLabel');
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
          title = 'label_';
      title = title + now.getHours();
      title = title + now.getMinutes();
      title = title + now.getSeconds();
      title = title + now.getMilliseconds();
      title = title + '_'+ now.getFullYear();

      let url = document.querySelector('#image-result img').src;
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
[contenteditable] {
  outline: 0px solid transparent;
}

.alive_filter {
  /*filter: grayscale(1);*/
  filter: blur(2px);
}
.died_filter {
  /*filter: grayscale(1);*/
  filter: blur(2px) grayscale(1);
}

#image-container {
  position: relative;
  border: 3px solid #e21e22;
  width: 400px;
  height: 485px;
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
#upload_img .upload_img_container .label .title {
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
#photo-container {
  max-height: 1220px;
  max-width: 1220px;
  /*border-width: 4px;*/
  /*border-style: solid;*/
  overflow: hidden;
}
#photo-container:hover button {
  opacity: 1;
}

#form-horizontal #remove_image {
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
#form-horizontal #remove_image:hover {
  opacity: 1;
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
  background-color: #2d3748;
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
