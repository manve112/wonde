import './bootstrap';

import {createApp, defineAsyncComponent} from 'vue'

const app = createApp({})

app.component('frontend-app', defineAsyncComponent(() => import('./FrontendApp')))

app.mount('#app')
