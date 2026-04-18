<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import gsap from 'gsap';
import AuthLayout from '@/Components/AuthLayout.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const formRef = ref(null);
const showSuccess = ref(false);
const successRef = ref(null);

onMounted(() => {
    gsap.set(formRef.value, { y: 40, opacity: 0 });
    gsap.to(formRef.value, { y: 0, opacity: 1, duration: 0.7, ease: "power3.out", delay: 0.4 });
});

const playSuccess = () => {
    showSuccess.value = true;
    setTimeout(() => {
        gsap.fromTo(successRef.value,
            { scale: 0, rotate: -30, opacity: 0 },
            { scale: 1, rotate: 0, opacity: 1, duration: 0.9, ease: "elastic.out(1, 0.45)" }
        );
        gsap.to(successRef.value.querySelector('[data-bounce]'), {
            y: -14, repeat: 3, yoyo: true, duration: 0.35,
            ease: "power2.inOut", delay: 0.4
        });
    }, 50);
};

const submit = () => {
    form.post(route('login'), {
        onError: () => {
            gsap.fromTo(formRef.value,
                { x: 0 },
                { keyframes: { x: [-12, 12, -10, 10, -6, 6, -3, 3, 0] }, duration: 0.6, ease: "power2.out" }
            );
        },
        onFinish: () => {
            if (!form.hasErrors) {
                playSuccess();
            } else {
                form.reset('password');
            }
        }
    });
};
</script>

<template>
    <Head title="Log in" />
    <AuthLayout>
        <!-- Success Overlay -->
        <div v-if="showSuccess" class="fixed inset-0 z-50 flex items-center justify-center bg-white/80 backdrop-blur-sm">
            <div ref="successRef" class="flex flex-col items-center gap-4">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-yellow-400 flex items-center justify-center">
                        <svg class="w-12 h-12 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span data-bounce class="absolute -top-3 -right-4 text-3xl">👟</span>
                </div>
                <p class="text-xl font-semibold text-black">You're in. Let's go.</p>
            </div>
        </div>

        <div ref="formRef">
            <div class="mb-10">
                <p class="text-xs font-semibold tracking-[0.2em] uppercase text-gray-400 mb-3">Account</p>
                <h1 class="text-4xl sm:text-5xl font-bold text-black leading-tight">
                    Welcome back<span class="text-yellow-400">.</span>
                </h1>
                <p class="mt-3 text-gray-500">Sign in to check out the latest drops.</p>
            </div>

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">{{ status }}</div>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Email</label>
                    <input type="email" v-model="form.email" required placeholder="you@vibekicks.com"
                        class="w-full px-5 py-4 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Password</label>
                    <input type="password" v-model="form.password" required placeholder="••••••••"
                        class="w-full px-5 py-4 rounded-2xl bg-gray-100 border border-transparent text-black placeholder:text-gray-400 focus:outline-none focus:border-black transition-colors" />
                    <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 text-sm text-black cursor-pointer">
                        <input type="checkbox" v-model="form.remember" class="rounded" />
                        Remember me
                    </label>
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="text-sm font-medium text-black hover:text-yellow-500 transition-colors">
                        Forgot password?
                    </Link>
                </div>

                <button type="submit" :disabled="form.processing"
                    class="w-full mt-2 py-4 rounded-2xl bg-black text-white font-semibold tracking-wide hover:bg-yellow-400 hover:text-black transition-all duration-300 disabled:opacity-60 active:scale-[0.98]">
                    {{ form.processing ? 'Signing in…' : 'Sign in' }}
                </button>

                <p class="text-center text-sm text-gray-500 pt-4">
                    New to Vibe Kicks?
                    <Link :href="route('register')" class="font-semibold text-black hover:text-yellow-500 transition-colors">
                        Create an account
                    </Link>
                </p>
            </form>
        </div>
    </AuthLayout>
</template>