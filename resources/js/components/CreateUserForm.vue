<template>
    <div class="component">
        <h3>
            Profile
        </h3>
        <p class="grey blurb">
            This information will be displayed publicly so be careful what you share.
        </p>
        <div>
            <form @submit.prevent="saveFormData">
                <label for="name">Name</label>
                <input type="text" id="name" v-model="formData.name" required>

                <label for="email">Email</label>
                <input type="email" id="email" v-model="formData.email" required>

                <label for="image_url">Image Url</label>
                <input type="text" id="image_url" v-model="formData.image_url" required>

                <div class="buttons">
                    <button type="button" class="cancel-button" @click="cancelForm">Cancel</button>
                    <button type="submit" class="save-button">Save</button>
                </div>
            </form>
        </div>
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
