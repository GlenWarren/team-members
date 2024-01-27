<template>
    <div class="component">
        <h1>
            Our team
        </h1>
        <p class="grey blurb">
            We're a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.
        </p>
        <ul>
            <li v-for="user in users" :key="user.id">
                <div class="team-member">
                    <div class="round-image-container">
                        <img :src="user.image_url" alt="Profile Image" class="round-image" />
                    </div>
                    <div>
                        <p class="name">
                            {{ user.name }}
                        </p>
                        <p class="grey email">
                            {{ user.email }}
                        </p>
                    </div>
                </div>
                <br>
            </li>
        </ul>
    </div>
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
