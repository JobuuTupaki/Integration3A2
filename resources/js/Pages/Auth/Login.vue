<template>
    <GuestLayout>
        <Head title="Speed-Up LaundryShop" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
     
        <form @submit.prevent="submit" class="login-form-container">
            <div>
                
                <img src="/images/speed-up.png" alt="Speed Up Image" style="width: 300px; display: block; margin: 0 auto;">
                <InputLabel for="email" value="Email" style="color: black;" />


                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    style="background-color: white; color: black;"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                
                <InputLabel for="password" value="Password" style="color: black;" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    style="background-color: white; color: black;"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-black-600 dark:text-black-400">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-2 ">
           

                <PrimaryButton class="ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>

            <Link
                :href="route('password.request')"
                class="underline text-sm text-black dark:text-black hover:text-black-900 dark:hover:text-black-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            >
                Forgot your password?
            </Link>
            </div>
            <div class="flex items-center justify-center mt-4">
                <Link
                    href="/register"
                    class="underline text-sm text-black-600 dark:text-black-400 hover:text-black-900 dark:hover:text-black-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-black-800"
                >
                    Register here
                </Link>
            </div>
        
        </form>
    </GuestLayout>
</template>

<style scoped>
.login-form-container {
    background-color: white;
}
</style>

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
