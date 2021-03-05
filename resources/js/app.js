/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
 
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('message', require('./components/message.vue').default );
Vue.component('names', require('./components/names.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
    	message: '',
        sender: '',
        chat: {
            message:[],
            user:[]
        },
        newName: '',
        names: ["arron", "bernard", "tom"]
    },
    methods:{
    	send: function (e){
    		if(this.message.length > 0)
            {
                //console.log(this.chat.user);
                this.chat.message.push(this.message);
                axios.get('/user')
                .then( (response) => { //(1)
                    this.chat.user.push(response.data.name); 
                    this.sender = response.data.name; 
                })
                .catch(  (error) => { //(1)
                    console.log(error);
                });

                axios.post('/send', {
                    message: this.message,
                })
                .then( (response) => { //(1)
                    console.log(response.data);
                    
                })
                .catch(  (error) => { //(1)
                    console.log(error);
                });
            }

            this.message = "";
    	},
        addName: function (e){
            this.names.push(this.newName);
            this.newName = ""
        }
    },
    mounted(){//console.log('component mounted');
        Echo.private('chat')
        .listen('ChatEvent', (e) => { //(1) 
            this.chat.message.push(e.message);
            this.chat.user.push(e.user);
        });
    },
});

app.newName = 'Dean'

/**Note */
//(1) must use ES6 arrow function here, else Can’t access component data from within lifecycle hook.
//ref: https://forum.vuejs.org/t/cant-access-component-data-from-within-lifecycle-hook/12078
