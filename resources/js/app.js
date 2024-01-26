import './bootstrap';
import {createApp} from 'vue'
import TeamMembersList from './components/TeamMembersList.vue';

createApp({
    components: {
        TeamMembersList,
    }
}).mount('#app');
