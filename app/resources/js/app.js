import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import HelloVue from './components/HelloVue.vue';

const app = createApp({
    components: {
        'hello-vue' : HelloVue,
    }
});

app.mount('#app');
