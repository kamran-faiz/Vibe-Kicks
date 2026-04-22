<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <section class="relative w-full overflow-hidden rounded-2xl mx-auto max-w-[1400px] my-12"
             style="background: linear-gradient(135deg, #0a0a0a 0%, #111111 50%, #1a120a 100%); aspect-ratio: 21/9; box-shadow: 0 30px 80px -20px rgba(180,120,60,0.4)">
        
        <!-- Grid texture -->
        <div class="absolute inset-0 opacity-[0.07] pointer-events-none"
             style="background-image: linear-gradient(#b87333 1px, transparent 1px), linear-gradient(90deg, #b87333 1px, transparent 1px); background-size: 60px 60px;" />

        <!-- Glow -->
        <div class="absolute -right-32 top-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full pointer-events-none"
             style="background: rgba(180,120,60,0.2); filter: blur(120px)" />

        <!-- Vertical label -->
        <div class="absolute left-6 top-1/2 -translate-y-1/2 hidden md:flex items-center gap-3 text-xs text-amber-600/80"
             style="writing-mode: vertical-rl; transform: translateY(-50%) rotate(180deg); letter-spacing: 0.5em">
            <span>VIBE KICKS · EST. 2024</span>
            <span class="block w-12 h-px bg-amber-600/40" />
            <span>EDITION 001 / 250</span>
        </div>

        <!-- Brand mark -->
        <div class="absolute top-5 left-6 md:top-8 md:left-20 z-20 flex items-center gap-2">
            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-amber-600 text-black font-black text-sm">V</span>
            <span class="text-lg text-white font-bold tracking-[0.3em]">VIBE KICKS</span>
        </div>

        <!-- Content -->
        <div class="relative h-full flex flex-col md:flex-row items-center justify-between px-6 md:px-20 py-8 md:py-0 gap-6">
            
            <!-- Left: copy -->
            <div class="flex-1 max-w-xl z-10 mt-12 md:mt-0">
                <div class="flex items-center gap-3 mb-5">
                    <span class="block w-10 h-px bg-amber-600" />
                    <span class="text-xs tracking-[0.4em] text-amber-600 uppercase">Vibe Kicks · New Drop SS26</span>
                </div>

                <h1 class="text-6xl md:text-8xl lg:text-9xl leading-[0.85] tracking-tight text-white font-black">
                    STEP <br />
                    <span class="text-transparent bg-clip-text italic"
                          style="background-image: linear-gradient(180deg, #d4a855 0%, #8b5e2a 100%)">Beyond.</span>
                </h1>

                <p class="mt-6 text-sm md:text-base text-white/60 max-w-md leading-relaxed font-light">
                    The Vibe Kicks Chrome 01 — hand-finished in Italy, limited to 250 pairs worldwide. Engineered for those who refuse the ordinary.
                </p>

                <div class="mt-8 flex items-center gap-4">
                    <Link href="/shop"
                          class="relative overflow-hidden bg-amber-600 text-black px-8 py-4 text-xs tracking-[0.3em] uppercase font-bold hover:bg-yellow-400 transition-colors duration-500">
                        Shop the Drop
                    </Link>
                    <Link href="/collections"
                          class="text-xs tracking-[0.3em] uppercase text-white/70 hover:text-amber-600 transition-colors border-b border-white/30 hover:border-amber-600 pb-1">
                        View Lookbook
                    </Link>
                </div>

                <div class="mt-10 flex items-center gap-8 text-xs text-white/50 tracking-widest uppercase">
                    <div>
                        <div class="text-amber-600 font-black text-2xl tracking-normal">Rs. 29,000</div>
                        <div class="mt-1">Starting</div>
                    </div>
                    <div class="w-px h-10 bg-white/20" />
                    <div>
                        <div class="text-white font-black text-2xl tracking-normal">72H</div>
                        <div class="mt-1">Early Access</div>
                    </div>
                </div>
            </div>

            <!-- Right: shoe -->
            <div class="flex-1 relative h-[260px] md:h-full flex items-center justify-center">
                <div class="absolute inset-0 flex items-center justify-center" style="animation: float-shoe 6s ease-in-out infinite">
                    <img src="/images/sneaker-hero.jpg" 
                         alt="Vibe Kicks limited edition sneaker"
                         class="w-[120%] md:w-[110%] object-contain"
                         style="filter: drop-shadow(0 40px 50px rgba(0,0,0,0.7))" />
                </div>

                <!-- Edition badge -->
                <div class="absolute top-4 right-4 md:top-8 md:right-8 z-10">
                    <div class="relative w-24 h-24 md:w-28 md:h-28 rounded-full border border-amber-600/40 flex items-center justify-center text-center"
                         style="backdrop-filter: blur(8px); background: rgba(0,0,0,0.2)">
                        <div>
                            <div class="text-[9px] tracking-[0.3em] text-amber-600">LIMITED</div>
                            <div class="text-2xl text-white font-black leading-none mt-1">250</div>
                            <div class="text-[9px] tracking-[0.3em] text-white/60 mt-1">PAIRS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="absolute bottom-0 inset-x-0 border-t border-amber-600/20"
             style="background: rgba(0,0,0,0.4); backdrop-filter: blur(8px)">
            <div class="flex items-center justify-between px-6 md:px-20 py-3 text-[10px] md:text-xs tracking-[0.3em] uppercase text-white/60">
                <span class="text-amber-600">● Live Now</span>
                <span class="hidden md:block">Free Worldwide Shipping · Authenticated · Lifetime Care</span>
                <span>VIBE KICKS / 001</span>
            </div>
        </div>
    </section>
</template>

<style scoped>
@keyframes float-shoe {
    0%, 100% { transform: translateY(0) rotate(-6deg); }
    50% { transform: translateY(-18px) rotate(-6deg); }
}
</style>