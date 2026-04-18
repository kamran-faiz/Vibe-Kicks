<script setup>
import Navbar from '@/Components/Navbar.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    orders: Array
});

const openOrders = ref([])

const toggleOrder = (id) => {
    if (openOrders.value.includes(id)) {
        openOrders.value = openOrders.value.filter(i => i !== id)
    } else {
        openOrders.value.push(id)
    }
}

</script>

<template>
    <Navbar />
    <div class="min-h-screen bg-gray-100 pt-20">
        <div class="container mx-auto px-8 py-12">
            <h1 class="text-4xl font-black italic uppercase mb-12">Your <span class="text-yellow-400">Orders</span></h1>
            
            <div v-if="orders.length > 0" class="space-y-6">
                <div v-for="order in orders" :key="order.id" 
                     class="bg-white p-6 rounded-xl shadow-sm cursor-pointer"
                     @click="toggleOrder(order.id)">
                    
                    <!-- Summary -->
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Order #{{ order.id }}</p>
                            <p class="text-lg font-semibold">{{ new Date(order.created_at).toLocaleDateString() }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-xl">Rs. {{ order.total_price }}</p>
                            <span class="text-xs font-bold uppercase bg-yellow-400 text-black px-2 py-1 rounded-full">
                                {{ order.status }}
                            </span>
                        </div>
                        <p :class="openOrders.includes(order.id) ? 'text-yellow-400' : 'text-gray-400'">
                            {{ openOrders.includes(order.id) ? '▲' : '▼' }}
                        </p>
                    </div>
                    
                    

                    <!-- Expanded Items -->
                    <div v-if="openOrders.includes(order.id)" class="mt-6 space-y-4 border-t pt-4">
                        <div v-for="item in order.items" :key="item.id" class="flex items-center gap-4">
                            <img :src="item.product.image" :alt="item.product.name" class="w-16 h-16 object-cover rounded-lg">
                            <div>
                                <p class="font-bold">{{ item.product.name }}</p>
                                <p class="text-gray-500 text-sm">Size: {{ item.size }} · Qty: {{ item.quantity }}</p>
                            </div>
                            <p class="ml-auto font-semibold">Rs. {{ item.price * item.quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Continue Shopping -->
            <div v-if="orders.length > 0" class="mt-8 text-center">
                <Link href="/shop" 
                      class="inline-block bg-black text-white px-8 py-3 rounded-full font-bold hover:bg-yellow-400 hover:text-black transition">
                    Continue Shopping
                </Link>
            </div>


            <!-- Empty State -->
            <div v-else class="text-center py-20 bg-white rounded-2xl">
                <p class="text-gray-400 text-xl">No orders yet.</p>
                <Link href="/shop" class="text-yellow-500 font-bold mt-2 inline-block">Start Shopping</Link>
            </div>
        </div>
    </div>
    
</template>