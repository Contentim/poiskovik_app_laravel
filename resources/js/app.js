import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp } from '@inertiajs/inertia-vue3'


import { createDeviceDetector } from "next-vue-device-detector"
export const device = createDeviceDetector()

import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'

import shortkey from 'vue3-shortkey'

import * as htmlToImage from 'html-to-image';
import { toPng, toJpeg, toBlob, toPixelData, toSvg } from 'html-to-image';

/* Vuex Store */
import store from '@/store/index';

InertiaProgress.init();

/* editor */
//import editor from '@/editor/index';

// редактор https://vueup.github.io/vue-quill/


createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  title: title => title != 'home' ? `${title} - Конструктор ориентировок поиска пропавших без вести` : 'Конструктор ориентировок поиска пропавших без вести v3.0',
  setup({ el, App, props, plugin }) {

    const app =  createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(device)
      .use(shortkey)
      .use(store)
      .use(htmlToImage)

    for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
      app.component(key, component)
    }

    /* global filters */  
    app.config.globalProperties.$filters = {
      truncate: function (text, length, suffix) {
        if (text.length > length) {
            return text.substring(0, length) + suffix;
        } else {
            return text;
        }
      },
      // Put the rest of your filters here
    }

    app.use(ElementPlus)
    app.mount(el);
  },
})
