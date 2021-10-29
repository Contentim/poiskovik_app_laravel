import Vue from 'vue';
import Vuex from 'vuex';
import vSelect from 'vue-select';
import * as htmlToImage from 'html-to-image';// import Editor from 'vue-editor-js';

vSelect.props.reduce.default = function (option) {
    return option.id;
};

Vue.component('v-select', vSelect);
// Vue.use(Editor);
// import VueRouter from 'vue-router'
// import users from './modules/users'

Vue.use(Vuex)
Vue.use(htmlToImage)
// Vue.use(VueRouter)

const debug = process.env.NODE_ENV !== 'production'

// const Foo = { template: '<div>foo</div>' }
// const Bar = { template: '<div>bar</div>' }

// const routes = [
//     { path: '/foo', component: Foo },
//     { path: '/bar', component: Bar }
// ];

// const router = new VueRouter({
//     mode: 'history',
//     routes // сокращённая запись для `routes: routes`
// });

export default new Vuex.Store({
    state: {
        horizontal: {
            text: {
                body: [
                    {
                        type: "header",
                        data: {
                            text: "ЁЙамилия",
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
                ],
                footer: [
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
            }
        },
        vertical: {},
        search: {
            objects: [
                {
                    id: 101,
                    label: 'человека',
                },
                {
                    id: 102,
                    label: 'ребёнка',
                },
                {
                    id: 103,
                    label: 'подростка',
                },
                {
                    id: 104,
                    label: 'родственников',
                },
            ],
            selected: 101
        },
        photo: ''
    },
    modules: {
        // users
    },
    mutations: {
        setObjectSearch(state, option){
            state.search.selected = option;
        },
        createPhoto(state, photo){
            state.photo = photo;
        },
        removePhoto(state){
            state.photo = '';
            localStorage.removeItem('photo')
        },
        returnPhoto(state, base64){
            state.photo = base64;
        },

        defaultTextBodyHorizontal(state){

        },
        returnDefaultTextFooterHorizontal(state){

        }
    },
    getters: {
        selectDefaultId: state => {
            return state.search.objects[0].id;
        },
        selectDefault: state => {
            return state.search.objects[0].label;
        }
    },
    // strict: debug
})
