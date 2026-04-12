<script setup>
import Navbar from '@/Components/Navbar.vue';
import { ref } from 'vue';
import { useCartStore } from '@/stores/cartStore';
import { useToast } from 'vue-toastification';
const toast = useToast();

const toastOptions = {
    position: "top-right",
    timeout: 3000,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
    showCloseButtonOnHover: false,
    hideProgressBar: false,
    closeButton: "button",
    icon: true,
};
const props = defineProps({
    product: Object,
})
const sizes = [6, 7, 8, 9, 10, 11];
const selectedSize = ref(null);
const cartStore = useCartStore();

function addToCart() {
    if (!selectedSize.value) {
        toast.error('Please select a size before adding to cart.', toastOptions);
        return;
    }
    cartStore.addToCart(props.product, selectedSize.value);
    toast.success('Product added to cart!', toastOptions);
}

</script>

<template>
    <Navbar />
    <div class="container mx-auto px-8 py-12">
        <div class="flex flex-col md:flex-row gap-12">
            
            <!-- Left - Image -->
            <div class="md:w-1/2">
                <img :src="product.image" :alt="product.name" class="w-full rounded-2xl object-cover" />
            </div>

            <!-- Right - Details -->
            <div class="md:w-1/2 flex flex-col justify-center">
                <span class="text-yellow-500 font-semibold uppercase tracking-widest text-sm">{{ product.brand }}</span>
                <h1 class="text-4xl font-black mt-2 mb-4">{{ product.name }}</h1>
                <p class="text-gray-500 mb-6">{{ product.description }}</p>
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-3xl font-bold">Rs. {{ product.price }}</span>
                    <span class="text-gray-400 line-through text-lg">Rs. {{ product.original_price }}</span>
                </div>
                <div class="mb-8">
    <h3 class="font-semibold mb-3">Select Size</h3>
    <div class="flex gap-3 flex-wrap">
        <button 
            v-for="size in sizes" 
            :key="size"
            @click="selectedSize = size"
            :class="selectedSize === size ? 'bg-black text-white' : 'bg-white text-black border border-gray-300'"
            class="w-12 h-12 rounded-lg font-semibold hover:border-black transition">
            {{ size }}
        </button>
    </div>
</div>
                <button @click="addToCart" class="bg-black text-white px-8 py-3 rounded-full font-bold hover:bg-yellow-400 hover:text-black transition w-fit">
                    Add to Cart
                </button>
            </div>
         

        </div>
    </div>
</template>