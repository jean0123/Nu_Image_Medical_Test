<template>
    <form @submit.prevent="submitForm" class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Name</label>
            <input v-model="form.name" type="text" id="name" class="w-full p-2 border border-gray-300 rounded" />
            <span v-if="errors.name" class="text-red-500">{{ errors.name[0] }}</span>
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input v-model="form.email" type="email" id="email" class="w-full p-2 border border-gray-300 rounded" />
            <span v-if="errors.email" class="text-red-500">{{ errors.email[0] }}</span>
        </div>
        <div class="mb-4">
            <label for="phone" class="block mb-1 font-semibold">Phone</label>
            <input v-model="form.phone" type="text" id="phone" class="w-full p-2 border border-gray-300 rounded" />
            <span v-if="errors.phone" class="text-red-500">{{ errors.phone[0] }}</span>
        </div>
        <div class="mb-4">
            <label for="question_comments" class="block mb-1 font-semibold">Question/Comments</label>
            <textarea v-model="form.question_comments" id="question_comments"
                class="w-full p-2 border border-gray-300 rounded"></textarea>
            <span v-if="errors.question_comments" class="text-red-500">{{ errors.question_comments[0] }}</span>
        </div>
        <div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Submit</button>
        </div>
    </form>
</template>
  
<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                question_comments: '',
            },
            errors: {},
        };
    },
    methods: {
        submitForm() {
            // Disable the submit button to prevent multiple form submissions
            this.submitting = true;
            axios
                .post('/contact', this.form)
                .then(response => {
                    // Handle success.
                    this.form = {
                        name: '',
                        email: '',
                        phone: '',
                        question_comments: '',
                    };
                    this.errors = {};
                    window.alert('Thank you for your message. We will get back to you soon.');
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    } else {
                        // Show a generic error message
                        window.alert('Something went wrong. Please try again.');
                        console.error(error);
                    }
                })
                .finally(() => {
                    // Re-enable the submit button after form submission
                    this.submitting = false;
                });
        },
    },
};
</script>
  