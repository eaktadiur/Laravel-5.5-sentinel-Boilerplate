import './bootstrap'

const Home = () => import('./components/Home');



// Vue.component('Home', require('./components/Home.vue'));

// Vue.component("Home", function(resolve) { require(['./components/Home.vue'], resolve) });
Vue.component("blog", function(resolve) { require(['./components/Blog.vue'], resolve) });
Vue.component("example", function(resolve) { require(['./components/Example.vue'], resolve) });



const app = new Vue({
    el: '#app',
    components: {
        home: Home
    },
});
