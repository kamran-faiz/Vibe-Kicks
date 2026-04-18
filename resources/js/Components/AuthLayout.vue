<script setup>
import { ref, onMounted } from 'vue';
import gsap from 'gsap';

const leftRef = ref(null);
const cardRef = ref(null);

onMounted(() => {
    gsap.set(cardRef.value, { opacity: 0, y: 30 });
    gsap.set(leftRef.value, { x: -80, opacity: 0 });

    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });
    tl.to(cardRef.value, { opacity: 1, y: 0, duration: 0.6 })
      .to(leftRef.value, { x: 0, opacity: 1, duration: 0.9 }, "-=0.3");
});
</script>

<template>
    <main class="min-h-screen flex items-center justify-center bg-gray-100 p-4 sm:p-8">
        <div ref="cardRef" class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[35%_65%] bg-white rounded-3xl overflow-hidden shadow-2xl">
            
            <!-- Left Panel -->
            <div ref="leftRef" class="relative hidden md:block min-h-[640px] bg-black overflow-hidden">
                <img
                    src="/images/sneaker-hero.jpg"
                    alt="Premium streetwear sneakers"
                    class="absolute inset-0 w-full h-full object-cover"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/85" />
                
                <!-- Top brand mark -->
                <div class="relative z-10 p-8 flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                    <span class="text-white/80 text-xs font-semibold tracking-[0.2em] uppercase">
                        Drop 04 / SS26
                    </span>
                </div>

                <!-- Bottom brand -->
                <div class="absolute bottom-0 left-0 right-0 p-8 z-10">
                    <h2 class="text-5xl font-bold text-white leading-none">
                        Vibe<span class="text-yellow-400">.</span>Kicks
                    </h2>
                    <p class="mt-3 text-white/70 text-sm max-w-[260px] leading-relaxed">
                        Step into the culture. Curated streetwear silhouettes for the bold.
                    </p>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="bg-white p-8 sm:p-12 md:p-16 flex items-center">
                <div class="w-full max-w-md mx-auto">
                    <slot />
                </div>
            </div>
        </div>
    </main>
</template>