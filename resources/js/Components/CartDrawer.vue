<script setup>
import { useCartStore } from '@/stores/cartStore';
import gsap from 'gsap';
import {ref, watch, onMounted} from 'vue';
import { Link } from '@inertiajs/vue3';


const cartStore = useCartStore();

const props = defineProps({
    isOpen: Boolean
})

const drawer = ref(null);

onMounted(() => {
    gsap.set(drawer.value, { x: 384 })
})
watch(() => props.isOpen, (newVal) => {
    if (newVal) {
        // Slide in
        gsap.to(drawer.value, { x: 0, duration: 0.4, ease: "power3.out" })
    } else {
        // Slide out
        gsap.to(drawer.value, { x: 384, duration: 0.3, ease: "power3.in" })
    }
})
const emit = defineEmits(['close'])



</script>

<template>
    <!-- Overlay -->
    <div 
        v-if="isOpen"
        @click="emit('close')"
        class="fixed inset-0 bg-black/50 z-40">
    </div>

    <!-- Drawer Panel -->
    <div 
        ref="drawer"
        class="fixed top-0 right-0 h-full w-96 bg-white z-50 shadow-2xl flex flex-col p-6">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-black uppercase tracking-widest">Your Cart</h2>
            <button @click="emit('close')" 
                    class="text-gray-400 hover:text-black transition text-2xl">✕</button>
        </div>

        <!-- Items -->
        <div class="flex-1 overflow-y-auto space-y-4">
            <div v-for="item in cartStore.items" :key="item.id + item.size"
                 class="flex gap-4 items-center border-b pb-4">
                <img :src="item.image" :alt="item.name" 
                     class="w-16 h-16 object-cover rounded-xl">
                <div class="flex-1">
                    <p class="font-bold text-sm">{{ item.name }}</p>
                    <p class="text-gray-400 text-xs">Size: {{ item.size }}</p>
                    <p class="text-sm font-semibold mt-1">Rs. {{ item.price * item.quantity }}</p>
                </div>
                <span class="text-xs text-gray-400">x{{ item.quantity }}</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between items-center mb-4">
                <span class="font-bold">Total</span>
                <span class="text-xl font-black">Rs. {{ cartStore.totalPrice }}</span>
            </div>
            <Link href="/cart"  @click="emit('close')"
               class="block w-full bg-black text-white text-center py-3 rounded-xl font-bold hover:bg-yellow-400 hover:text-black transition mb-3">
                View Cart
            </Link>
        <Link href="/cart"  @click="emit('close')"
   class="block w-full bg-yellow-400 text-black text-center py-3 rounded-xl font-bold hover:bg-black hover:text-white transition">
    Checkout
</Link>

        </div>

    </div>
</template>