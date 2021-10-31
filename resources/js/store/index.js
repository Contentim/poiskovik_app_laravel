import Vue from 'vue';
import Vuex from 'vuex';
import vSelect from 'vue-select';
import * as htmlToImage from 'html-to-image';// import Editor from 'vue-editor-js';
import * as VueColor from 'vue-color'

vSelect.props.reduce.default = function (option) {
    return option.id;
};

Vue.component('v-select', vSelect);

var Chrome = VueColor.Chrome;
Vue.component('colorpicker', {
    components: {
        'chrome-picker': Chrome,
    },
    template: `
        <div class="flex content-center border border-gray-600 rounded py-1 px-1 justify-between" ref="colorpicker">
            <input type="text" class="w-4/5 pl-1" v-model="colorValue" @focus="showPicker()" @input="updateFromInput" />
            <span class="w-1/5 bg-gray-400">
                <span class="block w-full h-full cursor-pointer border border-gray-600" :style="'background-color: ' + colorValue" @click="togglePicker()"></span>
                <chrome-picker :value="colors" @input="updateFromPicker" v-if="displayPicker" />
            </span>
        </div>`,
    props: ['color'],
    data() {
        return {
            colors: {
                hex: '#e21e22',
            },
            colorValue: '',
            displayPicker: false,
        }
    },
    mounted() {
        this.setColor(this.color || '#000000');

        /*if(localStorage.colors){
            console.log('123123', localStorage.colors);
            this.$store.commit('updateDefaultColor', localStorage.colors)
        } else {
            localStorage.colors = this.$store.state.defaultColor;
        }*/
    },
    created(){

    },
    methods: {
        setColor(color) {
            if(localStorage.colors){
                this.updateColors(localStorage.colors);
                this.colorValue = localStorage.colors;
                this.$store.commit('updateDefaultColor', localStorage.colors)
            } else {
                this.updateColors(color);
                this.colorValue = color;
            }
        },
        updateColors(color) {
            if(color.slice(0, 1) == '#') {
                this.colors = {
                    hex: color
                };
            }
            else if(color.slice(0, 4) == 'rgba') {
                var rgba = color.replace(/^rgba?\(|\s+|\)$/g,'').split(','),
                    hex = '#' + ((1 << 24) + (parseInt(rgba[0]) << 16) + (parseInt(rgba[1]) << 8) + parseInt(rgba[2])).toString(16).slice(1);
                this.colors = {
                    hex: hex,
                    a: rgba[3],
                }
            }

            localStorage.colors = this.colors.hex;


            /*if(localStorage.colors){
                this.$store.commit('updateDefaultColor', localStorage.colors)
                this.colors.hex = localStorage.colors
            } else {

            }*/
        },
        showPicker() {
            document.addEventListener('click', this.documentClick);
            this.displayPicker = true;
        },
        hidePicker() {
            document.removeEventListener('click', this.documentClick);
            this.displayPicker = false;
        },
        togglePicker() {
            this.displayPicker ? this.hidePicker() : this.showPicker();
        },
        updateFromInput() {
            this.updateColors(this.colorValue);
        },
        updateFromPicker(color) {
            this.colors = color;
            if(color.rgba.a == 1) {
                this.colorValue = color.hex;
            }
            else {
                this.colorValue = 'rgba(' + color.rgba.r + ', ' + color.rgba.g + ', ' + color.rgba.b + ', ' + color.rgba.a + ')';
            }
        },
        documentClick(e) {
            var el = this.$refs.colorpicker,
                target = e.target;
            if(el !== target && !el.contains(target)) {
                this.hidePicker()
            }
        }
    },
    watch: {
        colorValue(val) {
            if(val) {
                this.updateColors(val);
                this.$emit('input', val);
                //document.body.style.background = val;
            }
            this.$store.commit('updateDefaultColor', val)
        }
    },
});

Vue.use(Vuex)
Vue.use(htmlToImage)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    state: {
        horizontal: {
            text: {
                body: [
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
        vertical: {
            text: {
                body: [
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
                            text : '<b>Состояние здоровья:</b> Деменция. Инсулинзависимый...'
                        }
                    },
                    {
                        type : 'paragraph',
                        data : {
                            text : '<b>Вещи:</b> Lorem ipsum dolor sit amet, consectetur.'
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
                ]
            }
        },
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
        photo: '',
        defaultColor: '#ff0000',
        loader: false,
        on_success: false
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
        updateDefaultColor(state, value){
            state.defaultColor = value;
        },
        loader(state){
            state.loader = !state.loader;
        },
        success(state){
            state.on_success = !state.on_success;
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
})
