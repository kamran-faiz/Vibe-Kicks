<script setup>
import Navbar from '@/Components/Navbar.vue';
import ProductCard from '@/Components/ProductCard.vue';
import { ref } from 'vue';
import { computed } from 'vue';

const selectedBrands = ref([]);


const props = defineProps({
    products: Array,
});

const filteredProducts = computed(() => {
    if (selectedBrands.value.length === 0) {
        return props.products;
    }
    return props.products.filter(product => selectedBrands.value.includes(product.brand));
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
            <ProductCard v-for="product in filteredProducts" :key="product.id" :name="product.name" :price="product.price" :originalPrice="product.original_price" :image="product.image" />
        </div>
    </div>

</div>


</template>