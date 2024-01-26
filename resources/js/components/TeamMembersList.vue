<template>
    <h1>
        Our team
    </h1>
    <p class="grey">
        We're a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.
    </p>
    <br>
    <ul>
        <li v-for="user in users" :key="user.id">
            <div class="team-member">
                <p>
                    {{ user.name }}
                </p>

                <p class="grey">
                    {{ user.email }}
                </p>
            </div>
            <br>
        </li>
    </ul>
</template>

<script>
export default {
    data() {
        return {
            users: [],
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            axios.get('/api/users').then(response => {
                this.users = response.data.users;
            });
        },
    },
};
</script>
