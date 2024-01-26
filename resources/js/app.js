import './bootstrap';
import {createApp} from 'vue'
import TeamMembersList from './components/TeamMembersList.vue';
import CreateUserForm from './components/CreateUserForm.vue';

createApp({
    components: {
        TeamMembersList,
        CreateUserForm
    }
}).mount('#app');
