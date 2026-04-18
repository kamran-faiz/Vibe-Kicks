<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import gsap from 'gsap';
import AuthLayout from '@/Components/AuthLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const formRef = ref(null);

onMounted(() => {
    gsap.set(formRef.value, { y: 40, opacity: 0 });
    gsap.to(formRef.value, { y: 0, opacity: 1, duration: 0.7, ease: "power3.out", delay: 0.4 });
});

const submit = () => {
    form.post(route('register'), {
        onError: () => {
            gsap.fromTo(formRef.value,
                { x: 0 },
                { keyframes: { x: [-12, 12, -10, 10, -6, 6, -3, 3, 0] }, duration: 0.6, ease: "power2.out" }
            );
        },
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />
    <AuthLayout>
        <div ref="formRef">
            <div class="mb-6">
                <p class="text-xs font-semibold tracking-[0.2em] uppercase text-gray-400 mb-3">New Account</p>
                <h1 class="text-4xl sm:text-5xl font-bold text-black leading-tight">
                    Join the culture<span class="text-yellow-400">.</span>
                </h1>
                <p class="mt-3 text-gray-500">Create your Vibe Kicks account.</p>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Full Name</label>
                    <input type="text" v-model="form.name" required autofocus placeholder="Your name"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Email</label>
                    <input type="email" v-model="form.email" required placeholder="you@vibekicks.com"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Password</label>
                    <input type="password" v-model="form.password" required placeholder="••••••••"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Confirm Password</label>
                    <input type="password" v-model="form.password_confirmation" required placeholder="••••••••"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">{{ form.errors.password_confirmation }}</p>
                </div>

                <button type="submit" :disabled="form.processing"
                    class="w-full mt-2 py-3 rounded-2xl bg-black text-white font-semibold tracking-wide hover:bg-yellow-400 hover:text-black transition-all duration-300 disabled:opacity-60 active:scale-[0.98]">
                    {{ form.processing ? 'Creating account…' : 'Create Account' }}
                </button>

                <p class="text-center text-sm text-gray-500 pt-4">
                    Already have an account?
                    <Link :href="route('login')" class="font-semibold text-black hover:text-yellow-500 transition-colors">
                        Sign in
                    </Link>
                </p>
            </form>
        </div>
    </AuthLayout>
</template>