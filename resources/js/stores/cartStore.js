import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useCartStore = defineStore('cart', () => {
    // state
    const items = ref([])

    // actions
    function addToCart(product, size) {
        items.value.push({ ...product, size })
    }

    // getters
    const totalItems = computed(() => items.value.length)

    return { items, addToCart, totalItems }
})