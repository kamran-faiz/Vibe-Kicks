<script setup>
import Navbar from '@/Components/Navbar.vue';
import { useCartStore } from '@/stores/cartStore';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';  

const toast = useToast();

const cartStore = useCartStore();

const checkout = () => {
    const cartItems = cartStore.items.map(item => ({
        product_id: item.id,
        quantity: item.quantity,
        size: item.size,
        price: item.price
    }))
    
    router.post(route('checkout'), { cart: cartItems }, {
        onSuccess: () => {
            cartStore.clearCart();
            toast.success('Order placed successfully!')
        }
    })
}





</script>

<template>
    <Navbar />
    <div class="min-h-screen bg-gray-100">
        <div class="container mx-auto px-8 py-12">
            <h1 class="text-3xl font-bold mb-8">Your Cart</h1>

            <div v-if="cartStore.items.length > 0" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <div class="lg:col-span-8 space-y-4">
                    <div v-for="(item, index) in cartStore.items" :key="index" 
                         class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                        <img :src="item.image" :alt="item.name" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
    <div class="flex justify-between items-start">
        <div>
            <h2 class="text-lg font-bold text-gray-800">{{ item.name }}</h2>
            <p class="text-gray-500 text-sm">Size: {{ item.size }}</p>
        </div>
        <p class="text-gray-900 font-bold">Rs. {{ item.price * item.quantity }}</p>
    </div>

    <div class="flex items-center justify-between mt-4">
        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
            <button @click="cartStore.decreaseQuantity(item)" 
                    class="px-3 py-1 hover:bg-gray-200 transition-colors text-gray-600 border-r border-gray-200">-</button>
            
            <span class="px-4 py-1 text-sm font-semibold text-gray-700">{{ item.quantity }}</span>
            
            <button @click="cartStore.increaseQuantity(item)" 
                    class="px-3 py-1 hover:bg-gray-200 transition-colors text-gray-600 border-l border-gray-200">+</button>
        </div>

        <button @click="cartStore.removeFromCart(item)" 
                class="text-xs font-medium text-red-500 hover:text-red-700 flex items-center gap-1 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Remove
        </button>
    </div>
</div>
                        </div>
                </div>

                <div class="lg:col-span-4">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 sticky top-4">
                        <h2 class="text-xl font-bold mb-4 border-bottom pb-2">Order Summary</h2>
                        
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-gray-600">Total Amount</span>
                            <span class="text-2xl font-black text-gray-900">Rs. {{ cartStore.totalPrice }}</span>
                        </div>

                        <button @click="checkout" 
                                class="w-full bg-black text-white py-4 rounded-xl font-bold hover:bg-gray-800 transition-all active:scale-95">
                            Proceed to Checkout
                        </button>
                        
                        <p class="text-center text-xs text-gray-400 mt-4">Taxes and shipping calculated at checkout</p>
                    </div>
                </div>

            </div>

            <div v-else class="text-center py-20 bg-white rounded-2xl shadow-sm">
                <p class="text-gray-400 text-xl">Your cart is feeling a bit light...</p>
                <Link href="/shop" class="text-blue-500 underline mt-2 inline-block">Go back to shopping</Link>
            </div>
        </div>
    </div>
</template>