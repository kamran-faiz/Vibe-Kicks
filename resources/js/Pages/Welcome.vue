<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import HeroSection from '@/Components/HeroSection.vue';
import ProductCard from '@/Components/ProductCard.vue';
const products = [
    { id: 1, name: 'Nike Air Force 1', price: 12999, originalPrice: 15999, image: 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=500&q=60' },
    { id: 2, name: 'Adidas Ultraboost', price: 14999, originalPrice: 18999, image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=60' },
    { id: 3, name: 'Jordan Retro 4', price: 19999, originalPrice: 24999, image: 'https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&w=500&q=60' },
    
]

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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-10">
        <ProductCard v-for="product in products" :key="product.id" :id="product.id" :name="product.name" :price="product.price" :originalPrice="product.originalPrice" :image="product.image" />
    </div>
</template>
