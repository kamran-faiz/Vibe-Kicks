<script setup>
import Navbar from '@/Components/Navbar.vue';
import ProductCard from '@/Components/ProductCard.vue';
import { ref } from 'vue';
import { computed } from 'vue';

const selectedBrands = ref([]);


const products = [
    { id: 1, name: 'Nike Air Force 1', price: 12999, brand: 'Nike', originalPrice: 15999, image: 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=500&q=60' },
    { id: 2, name: 'Adidas Ultraboost', price: 14999, brand: 'Adidas', originalPrice: 18999, image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=60' },
    { id: 3, name: 'Jordan Retro 4', price: 19999, brand: 'Jordan', originalPrice: 24999, image: 'https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&w=500&q=60' },
    
]

const filteredProducts = computed(() => {
    if (selectedBrands.value.length === 0) {
        return products;
    }
    return products.filter(product => selectedBrands.value.includes(product.brand));
});



</script>

<template>
    <Navbar />
     
    <div class="flex min-h-screen bg-gray-50">
    
    <!-- Left Sidebar - Filters -->
    <div class="w-64 bg-white p-6 shadow-sm">
        <h2 class="font-bold text-lg mb-4">Filters</h2>
        
        <div class="mb-6">
    <h3 class="font-semibold text-gray-700 mb-3">Brand</h3>
    <div class="flex flex-col gap-2">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" value="Nike" v-model="selectedBrands" class="w-4 h-4">
            <span>Nike</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" value="Adidas" v-model="selectedBrands" class="w-4 h-4">
            <span>Adidas</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" value="Jordan" v-model="selectedBrands" class="w-4 h-4">
            <span>Jordan</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" value="Puma" v-model="selectedBrands" class="w-4 h-4">
            <span>Puma</span>
        </label>
    </div>
</div>
    </div>

    <!-- Right Side - Products Grid -->
    <div class="flex-1 p-8">
        <h1   class="text-2xl font-bold mb-6">All Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <ProductCard v-for="product in filteredProducts" :key="product.id" :name="product.name" :price="product.price" :originalPrice="product.originalPrice" :image="product.image" />
        </div>
    </div>

</div>


</template>