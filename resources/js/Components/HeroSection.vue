<script setup>

</script>

<template>
    
    <section class="bg-black text-white min-h-[90vh] flex items-center">
    <div class="container mx-auto px-8 flex flex-col md:flex-row items-center justify-between gap-12">
        
        <!-- Left Content -->
        <div class="flex flex-col items-start md:w-1/2">
            <span class="text-yellow-400 font-semibold tracking-widest uppercase text-sm mb-4">New Collection 2025</span>
            <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6">
                Step Into <br>
                <span class="text-yellow-400">The Vibe</span>
            </h1>
            <p class="text-gray-400 text-lg mb-8 max-w-md">Premium sneakers for every vibe. Find your perfect pair and walk with confidence.</p>
            <div class="flex gap-4">
                <a href="#" class="bg-yellow-400 text-black font-bold px-8 py-3 rounded-full hover:bg-yellow-300 transition">
                    Shop Now
                </a>
                <a href="#" class="border border-white text-white font-bold px-8 py-3 rounded-full hover:border-yellow-400 hover:text-yellow-400 transition">
                    Explore
                </a>
            </div>
        </div>

        <!-- Right Image -->
        <div class="md:w-1/2 flex justify-center items-center">
            <img 
                src="images/nike-hero.webp" 
                alt="Featured Sneaker"
                class="w-full max-w-lg object-contain drop-shadow-2xl"
            />
        </div>

    </div>
</section>
</template>