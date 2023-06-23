
import { createApp } from 'vue';
import { createStore } from 'vuex';

const debug = process.env.NODE_ENV !== 'production'

const store = createStore({
    state: {
        app_name: 'Конструктор ориентировок пропавших без вести',
        app_name_short: 'Конструктор ориентировок',
        version: 'v3.0',
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
                    label: 'подростков',
                },
                {
                    id: 105,
                    label: 'детей',
                },
                {
                    id: 106,
                    label: 'родственников',
                },
				{
                    id: 107,
                    label: 'людей',
                },
            ],
            selected_id: null,
			selected_label : ""
        },
        editor: {
            body_default: '<h1>Иванов</h1><h2>Иван Иванович, 22 года</h2><h3>01.01.2021 года в 8:00 ушел из дома по ул. Ленина в неизвестном направлении.</h3><p><strong style="color: rgb(230, 0, 0);">Приметы:</strong> text </p><p><strong style="color: rgb(230, 0, 0);">Одежда:</strong> text</p><p><strong style="color: rgb(230, 0, 0);">Особые приметы:</strong> text</p><p><strong style="color: rgb(230, 0, 0);">Состояние здоровья:</strong> text</p><p><strong style="color: rgb(230, 0, 0);">Вещи:</strong> text</p>',
            footer_default: '<h2 class="ql-align-center">НУЖДАЕТСЯ В МЕДИЦИНСКОЙ ПОМОЩИ</h2><p class="ql-align-center">Просим сообщать любую информацию по телефону горячей линии:</p><h2 class="ql-align-center">8(800) 123-45-67 или 112</h2><h2 class="ql-align-center">НУЖНА ПОМОЩЬ ДОБРОВОЛЬЦЕВ</h2>',
        },
        horizontal: {
            body: '',
            footer: '',
        },
        vertical: {
            body: '',
            footer: '',
        },
        caption: {
            top: '@poiskovik_app',
            bottom: 'https://vk.com/poiskovik_app'
        },
        photo: '',
		phone: '8(800) 511-01-30, 8-495-999-7-112, 112',
        color: '#e50420',
        predefine_colors: [
            '#fe5000',
            '#ffd700',
            '#90ee90',
            '#00ced1',
            '#1e90ff',
            '#c71585',
            'rgba(255, 69, 0, 1)',
            'rgb(255, 120, 0)',
            'hsv(51, 100, 98)',
            'hsva(120, 40, 94, 1)',
            'hsla(209, 100%, 56%, 1)',
            '#c7158577',
        ],
        //loader: false,
        //on_success: false,
        watermark_image: '',
        label: {
            on: true,
            male: {
                alive: true,
                died: false
            },
            female: {
                alive: false,
                died: false
            },
            all: {
                alive: false,
                died: false
            },
        },
        // editor: { // показывать ли поле?
        //     date: true,
        //     features: false,
        //     dress: false,
        //     special_features: false,
        //     health: true,
        //     free: true
        // }
    },
    modules: {
        // users
    },
    mutations: {
        changeSearchObject(state, id){
            state.search.selected_id = localStorage.selected_id = id;

            for (var i=0; i<state.search.objects.length; i++){
                if (state.search.objects[i].id === Number(id)){
                    state.search.selected_label = localStorage.selected_label = state.search.objects[i].label;
                }
            }
        },
		setName(state, value) {
    		if(value === ''){
    			state.search.name = ""
    			localStorage.removeItem('name')
    		} else {
    			state.search.name = value
    			localStorage.name = value;
    		}
    	  },
    	setBlockVisible(state, value){
    	    switch(value){
    	        case "date": // Дата и место пропажи
    	            state.editor.date = !state.editor.date;
    	            break;
    	       case "features": // Приметы
    	            state.editor.features = !state.editor.features;
    	            break;
    	       case "dress": // Одежда
    	            state.editor.dress = !state.editor.dress;
    	            break;
    	       case "special_features": // Особые приметы
    	            state.editor.special_features = !state.editor.special_features;
    	            break;
    	       case "health": // Состояние здоровья
    	            state.editor.health = !state.editor.health;
    	            break;
    	       case "free": // Свободное поле
    	            state.editor.free = !state.editor.free;
    	            break;
    	    }
    	    //console.log(value)
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

        updateColor(state, value){
            state.defaultColor = value;
        },
        // loader(state){
        //     state.loader = !state.loader;
        // },
        // success(state){
        //     state.on_success = !state.on_success;
        // },
        createWatermarkImage(state, image){
            state.watermark_image = image;
        },
        removeWatermarkImage(state){
            state.watermark_image = '';
            localStorage.removeItem('watermark_image')
        },
        returnImageLabel(state, base64){
            state.watermark_image = base64;
        },
        onSetWatermark(state, value){
            state.label.on = true;

            state.label.male.alive = state.label.male.died = false;
            state.label.female.alive = state.label.female.died = false;
            state.label.all.alive = state.label.all.died = false;

            switch (value){
                case 'alive_male':
                    state.label.male.alive = true;
                    break;
                case 'alive_female':
                    state.label.female.alive = true;
                    break;
                case 'died_male':
                    state.label.male.died = true;
                    break;
                case 'died_female':
                    state.label.female.died = true;
                    break;
                case 'alive_all':
                    state.label.all.alive = true;
                    break;
                case 'died_all':
                    state.label.all.died = true;
                    break;
                case 'off':
                    state.label.on = false;
                    break;
            }

        },
        changeColor(state, color) {
            state.color = localStorage.color = color;
        },
        changeCaptionTopText(state, text){
            state.caption.top = localStorage.caption_top = text;
        },
        changeCaptionBottomText(state, text){
            state.caption.bottom = localStorage.caption_bottom = text;
        },
        changeHorizontalBodyText(state, text){
            state.horizontal.body = localStorage.horizontal_body = text;
        },
        changeHorizontalFooterText(state, text){
            state.horizontal.footer = localStorage.horizontal_footer = text;
        },
        returnHorizontalBodyTextDefault(state){
            state.horizontal.body = localStorage.horizontal_body = state.editor.body_default;
            return  state.editor.body_default;
        },
        returnHorizontalFooterTextDefault(state){
            state.horizontal.footer = localStorage.horizontal_footer = state.editor.footer_default;
        },

        changeVerticalBodyText(state, text){
            state.vertical.body = localStorage.vertical_body = text;
        },
        changeVerticalFooterText(state, text){
            state.vertical.footer = localStorage.vertical_footer = text;
        },
        returnVerticalBodyTextDefault(state){
            state.vertical.body = localStorage.vertical_body = state.editor.body_default;
        },
        returnVerticalFooterTextDefault(state){
            state.vertical.footer = localStorage.vertical_footer = state.editor.footer_default;
        },
    },
    getters: {
        selectDefaultId: state => {
            return state.search.objects[0].id;
        },
        selectDefault: state => {
            return state.search.objects[0].label;
        },
        getColor: state => {
            return state.color;
        },
        getPredefineColors: state => {
            return state.predefine_colors;
        },
        getSearchObjectID: state => {
            if(localStorage.selected_id){
                for (var i=0; i<state.search.objects.length; i++){
                    if (state.search.objects[i].id === Number(localStorage.selected_id)){
                        return state.search.objects[i].id;
                    }
                }
            } else if (state.search.selected_id != null){
                return state.search.selected_id 
            } else {
                state.search.selected_id = state.search.objects[0].id
                return state.search.objects[0].id 
            }
        },
        getSearchObjectLabel: state => {
            if(localStorage.selected_label){
                for (var i=0; i<state.search.objects.length; i++){
                    if (state.search.objects[i].id === Number(localStorage.selected_id)){
                        return state.search.objects[i].label;
                    }
                }
            } else if (state.search.selected_label != ""){
                return state.search.selected_label 
            } else {
                state.search.selected_label = state.search.objects[0].label
                return state.search.objects[0].label 
            }
        },
        getCaptionTopText: state => {
            return state.caption.top;
        },
        getCaptionBottomText: state => {
            return state.caption.bottom;
        },
        getHorizontalBodyText: state => {
            state.horizontal.body = state.editor.body_default;
            return state.horizontal.body;
        },
        getHorizontalFooterText: state => {
            state.horizontal.footer = state.editor.footer_default;
            return state.horizontal.footer;
        },
        getVerticalBodyText: state => {
            state.vertical.body = state.editor.body_default;
            return state.vertical.body;
        },
        getVerticalFooterText: state => {
            state.vertical.footer = state.editor.footer_default;
            return state.vertical.footer;
        }, 
        
    },
});

export default store
