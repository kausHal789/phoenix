/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// It was not proper working
// require('./comman-action');
require('./hover-effects');
require('./file-preview');
// require('./audio');
require('./bootstrap');
require('./artist-action');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('message', require('./components/Message.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import Vue from 'vue'

// //For auto scroll
// import VueChatScroll from 'vue-chat-scroll'
// Vue.use(VueChatScroll)

// //For notification
// import Toaster from 'v-toaster'
// import 'v-toaster/dist/v-toaster.css'
// // optional set default timeout, the default is 10000 (10 seconds).
// Vue.use(Toaster, {timeout: 5000})

// const app = new Vue({
//     el: '#app',

//     data: {
//         message: '',
//         chat: {
//             message: [],
//             user: [],
//             time: [],
//         },
//         typing: '',
//         noOfUsers: 0,
//     },


//     methods: {
//         send() {
//             if (this.message) {
//                 // this part is sending message

//                 this.chat.message.push(this.message);
//                 this.chat.user.push('You');
//                 this.chat.time.push(this.getTime());

//                 axios.post('/send', {
//                     message: this.message
//                 })
//                     .then(response => {
//                         this.message = '';
//                         console.log(response);
//                     })
//                     .catch(err => console.log(err));

//             }
//         },
//         getTime() {
//             let time = new Date();
//             return time.getHours() + ':' + time.getMinutes();
//         }
//     },

//     mounted() {
//         // this part is reciving message
//         Echo.private('chat')
//             .listen('ChatEvent', (e) => {
//                 //add message in chat of current component
//                 console.log(e);
//                 this.chat.message.push(e.message);
//                 this.chat.user.push(e.user);
//                 this.chat.time.push(this.getTime());
//             })
//             .listenForWhisper('typing', (e) => {
//                 if(e.name) {
//                     this.typing = 'typing...';
//                 } else {
//                     this.typing = '';
//                 }
//             });
//         Echo.join(`chat`)
//             .here((users) => {
//                 this.noOfUsers = users.length;
//             })
//             .joining((user) => {
//                 this.noOfUsers++;
//                 this.$toaster.success(user.name + ' is online');
//             })
//             .leaving((user) => {
//                 this.$toaster.warning(user.name + ' is offline');
//                 this.noOfUsers--;
//             });
//     },

//     watch: {
//         message() {
//             Echo.private('chat')
//                 .whisper('typing', {
//                     name: this.message
//                 });
//         }
//     },

// });
