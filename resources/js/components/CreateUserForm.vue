<template>
    <h1>
        Profile
    </h1>
    <p class="grey">
        This information will be displayed publicly so be careful what you share.
    </p>
    <div>
        <form @submit.prevent="saveFormData">
            <label for="name">Name:</label>
            <input type="text" id="name" v-model="formData.name" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="formData.email" required>
            <br><br>
            <label for="image_url">Image Url:</label>
            <input type="text" id="image_url" v-model="formData.image_url" required>
            <br><br>
            <button type="button" @click="cancelForm">Cancel</button>
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: '',
                email: '',
                image_url: ''
            },
        };
    },
    methods: {
        saveFormData() {
            axios.post('/api/users', this.formData).then(response => {
                console.log('Data saved successfully', response.data);
                this.formData = {
                    name: '',
                    email: '',
                    image_url: ''
                };
            }).catch(error => {
                console.error('Error saving data', error);
            });
        },
        cancelForm() {
            this.formData = {
                name: '',
                email: '',
                image_url: ''
            };
        },
    },
};
</script>
