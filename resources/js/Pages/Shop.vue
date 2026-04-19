<script setup>
import Navbar from '@/Components/Navbar.vue';
import ProductCard from '@/Components/ProductCard.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    products: Array
});

// State for the checkboxes
const selectedBrands = ref([]);

// The logic that filters the DB products based on selection
const filteredProducts = computed(() => {
    if (selectedBrands.value.length === 0) {
        return props.products;
    }
    return props.products.filter(product => 
        selectedBrands.value.includes(product.brand)
    );
});
const visible = ref(6);

const displayCount = computed(() => {
    return filteredProducts.value.slice(0, visible.value);
});
const loadMore = () => {
    visible.value += 6;
};
</script>

<template>
  <Navbar />
  
  <div class="flex min-h-screen bg-gray-100 pt-20">
    <aside class="w-64 bg-white p-6 shadow-sm hidden md:block sticky top-8 self-start h-fit">
      <h2 class="font-bold text-lg mb-4 italic uppercase">Filters</h2>
      
      <div class="mb-6">
        <h3 class="font-semibold text-gray-700 mb-3">Brand</h3>
        <div class="flex flex-col gap-3">
          <label v-for="brand in ['Nike', 'Adidas', 'Jordan', 'Puma']" :key="brand" class="flex items-center gap-3 cursor-pointer group">
            <input type="checkbox" :value="brand" v-model="selectedBrands" class="w-5 h-5 rounded border-gray-300 text-yellow-400 focus:ring-yellow-400">
            <span class="group-hover:text-yellow-500 transition-colors">{{ brand }}</span>
          </label>
        </div>
      </div>
    </aside>

    <main class="flex-1 p-8">
      <div class="flex justify-between items-end mb-8">
        <h1 class="text-4xl font-black italic uppercase">All <span class="text-yellow-400">Sneakers</span></h1>
      </div>

      <div v-if="filteredProducts.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
        <ProductCard 
            v-for="product in displayCount" 
            :key="product.id" 
            :id="product.id"
            :name="product.name" 
            :price="product.price" 
            :originalPrice="product.original_price" 
            :image="product.image" 
        />
      </div>

      <div v-if="filteredProducts.length > 0" class="flex justify-center mt-8">
        <button v-if="filteredProducts.length > visible" @click="loadMore" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Load more</button>
      </div>

      <div v-else class="flex flex-col items-center justify-center py-20 text-center">
        <p class="text-2xl font-bold text-gray-400 italic">No kicks match your vibe...</p>
        <button @click="selectedBrands = []" class="mt-4 text-yellow-600 underline">Clear all filters</button>
      </div>
    </main>
  </div>
</template>