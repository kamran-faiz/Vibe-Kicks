<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import HeroSection from '@/Components/HeroSection.vue';
import ProductCard from '@/Components/ProductCard.vue';

defineProps({
    products: Array,
    
});

</script>

<template>
    <Head title="Welcome" />
    <Navbar />
    <HeroSection />
    <div class="text-center py-10">
    <h2 class="text-4xl font-bold text-gray-900">Featured <span class="text-yellow-400">Sneakers</span></h2>
    <div class="w-16 h-1 bg-yellow-400 mx-auto mt-3"></div>
    <p class="text-gray-500 mt-4 text-lg">Handpicked styles for every vibe</p>
</div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <ProductCard v-for="product in products" :key="product.id" :id="product.id" :name="product.name" :price="product.price" :originalPrice="product.originalPrice" :image="product.image" />
    </div>
</template>
