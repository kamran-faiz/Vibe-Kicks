import { defineStore } from 'pinia'
import { ref, computed, watch } from 'vue'

export const useCartStore = defineStore('cart', () => {
    // state
    const items = ref([])

    // actions
    function addToCart(product) {
        // Find if exact item (ID + Size) exists
        const existingItem = items.value.find(item => 
            item.id === product.id && item.size === product.size
        );

        if (existingItem) {    
            existingItem.quantity += 1;
        } else {
            // Push new item with initial quantity of 1
            items.value.push({ ...product, quantity: 1 });
        }
    };
    const decreaseQuantity = (product) => {
        const existingItem = items.value.find(item => 
            item.id === product.id && item.size === product.size
        );

        if(existingItem && existingItem.quantity > 1) {
            existingItem.quantity -= 1;
        } else {
            removeFromCart(product);
        }
        
    };  
    const increaseQuantity =(product) => {
        const existingItem = items.value.find(item =>
            item.id === product.id && item.size === product.size
        );
        if (existingItem){
            existingItem.quantity += 1;
        }
    };
    const removeFromCart = (product) => {
        items.value = items.value.filter(item =>  
            !(item.id === product.id && item.size === product.size)
        )
    }
    

    // getters / computed
    const totalPrice = computed(() => {
        return items.value.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    });

    // Counts actual quantity of all items combined
    const totalItems = computed(() => {
        return items.value.reduce((total, item) => total + item.quantity, 0);
    });

    const savedItem = localStorage.getItem('cart');
    if(savedItem) {
        items.value =JSON.parse(savedItem);
    }
    watch(items, (newItems) =>{
        localStorage.setItem('cart', JSON.stringify(newItems))
    },
{ deep : true })
    // CRITICAL: You must return everything you want to use in components
    return { 
        items, 
        addToCart, 
        totalItems, 
        totalPrice ,
        increaseQuantity,
        decreaseQuantity,
        removeFromCart  
    };
    
})