<script setup>
import Navbar from '@/Components/Navbar.vue';
import { ref, onMounted } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Footer from '@/Components/Footer.vue';

gsap.registerPlugin(ScrollTrigger);

const rootRef = ref(null);

const socialLinks = [
    { label: "Instagram", href: "https://instagram.com" },
    { label: "TikTok", href: "https://tiktok.com" },
    { label: "X", href: "https://x.com" },
    { label: "LinkedIn", href: "https://linkedin.com/in/kamran-faiz" },
];

const values = [
    {
        title: "Craft Over Hype",
        description: "Every silhouette is tested on city concrete before release, so comfort and durability carry the same weight as style.",
    },
    {
        title: "Culture First",
        description: "Vibe Kicks collaborates with underground creators, dancers, and stylists to keep every drop rooted in real community energy.",
    },
    {
        title: "Quiet Luxury",
        description: "Premium textures, restrained detailing, and deliberate color stories create statement pairs without shouting.",
    },
];

const handleHeroMove = (event) => {
    const target = event.currentTarget;
    const bounds = target.getBoundingClientRect();
    const x = ((event.clientX - bounds.left) / bounds.width) * 100;
    const y = ((event.clientY - bounds.top) / bounds.height) * 100;
    target.style.setProperty("--pointer-x", `${x}%`);
    target.style.setProperty("--pointer-y", `${y}%`);
};

onMounted(() => {
    const tl = gsap.timeline();

    tl.from("[data-hero-title]", {
        autoAlpha: 0,
        y: 36,
        duration: 1,
        ease: "power3.out",
    });

    tl.from("[data-hero-copy]", {
        autoAlpha: 0,
        y: 28,
        duration: 0.9,
        ease: "power2.out",
    }, "-=0.6");

    gsap.utils.toArray("[data-reveal]").forEach((section) => {
        gsap.from(section, {
            autoAlpha: 0,
            y: 40,
            duration: 0.9,
            ease: "power2.out",
            scrollTrigger: {
                trigger: section,
                start: "top 82%",
            },
        });
    });
});
</script>

<template>
    <Navbar />
    <main ref="rootRef" class="min-h-screen bg-gray-950 text-white">
        
        <!-- Hero Section -->
        <section
            @mousemove="handleHeroMove"
            class="relative overflow-hidden border-b border-white/10"
            style="background: radial-gradient(circle at var(--pointer-x, 80%) var(--pointer-y, 10%), rgba(234,179,8,0.12), transparent 34%)"
        >
            <div class="container mx-auto px-6 py-20 md:py-28">
                <p class="text-sm text-gray-400 uppercase tracking-widest">Our Story</p>
                <h1 data-hero-title class="mt-4 max-w-3xl text-5xl md:text-7xl font-black leading-tight">
                    Vibe<span class="text-yellow-400">.</span>Kicks
                </h1>
                <p data-hero-copy class="mt-6 max-w-2xl text-base md:text-lg leading-relaxed text-gray-400">
                    Born between late-night studio sessions and street courts, Vibe Kicks creates luxury sneakers with movement in mind. We build pairs that feel as elevated as they look.
                </p>
            </div>
        </section>

        <!-- Founder Section -->
        <section data-reveal class="container mx-auto px-6 py-16 md:py-20">
            <div class="grid gap-10 md:grid-cols-[1.2fr_0.8fr] md:items-start">
                <div>
                    <h2 class="text-3xl md:text-5xl font-black">The Founder</h2>
                    <p class="mt-5 max-w-2xl leading-relaxed text-gray-400">
                        After years studying modern web and product design, Kamran Faiz launched Vibe Kicks as a portfolio project that blends real ecommerce functionality with cinematic UI. His vision was simple: build something that feels alive.
                    </p>
                    <p class="mt-4 max-w-2xl leading-relaxed text-gray-400">
                        Each page starts with a story, translated into premium UI and animations built for everyday rhythm.
                    </p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-8">
                    <div class="flex h-28 w-28 items-center justify-center rounded-full border border-yellow-400/40 bg-white/10 text-3xl font-black text-yellow-400">
                        KF
                    </div>
                    <p class="mt-6 text-sm text-gray-400">Founder & Developer</p>
                    <p class="mt-2 text-2xl font-bold">Kamran Faiz</p>
                    <div class="mt-6 h-px bg-white/10" />
                    <p class="mt-6 leading-relaxed text-gray-400 italic">
                        "Luxury should feel lived in, not locked away. We design for people who move with intent."
                    </p>
                    <div class="mt-6 flex gap-3">
                        <a href="https://www.linkedin.com/in/kamran-faiz-213a84305/" target="_blank"
                           class="text-xs tracking-widest uppercase text-yellow-400 hover:text-white transition border border-yellow-400/30 hover:border-white px-4 py-2 rounded-full">
                            LinkedIn
                        </a>
                        <a href="https://github.com/kamran-faiz" target="_blank"
                           class="text-xs tracking-widest uppercase text-yellow-400 hover:text-white transition border border-yellow-400/30 hover:border-white px-4 py-2 rounded-full">
                            GitHub
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section data-reveal class="border-y border-white/10 bg-white/5">
            <div class="container mx-auto px-6 py-16 md:py-20">
                <h2 class="text-3xl md:text-5xl font-black">Brand Values</h2>
                <div class="mt-10 grid gap-5 md:grid-cols-3">
                    <article 
                        v-for="value in values" 
                        :key="value.title"
                        class="bg-white/5 border border-white/10 rounded-2xl p-6 transition-transform duration-300 hover:-translate-y-1">
                        <h3 class="text-2xl font-bold text-yellow-400">{{ value.title }}</h3>
                        <p class="mt-4 leading-relaxed text-gray-400">{{ value.description }}</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Connect Section -->
        <section data-reveal class="container mx-auto px-6 py-16 md:py-20">
            <h2 class="text-3xl md:text-5xl font-black">Connect With Us</h2>
            <div class="mt-8 flex flex-wrap gap-3">
                <a 
                    v-for="social in socialLinks"
                    :key="social.label"
                    :href="social.href"
                    target="_blank"
                    class="px-5 py-3 text-sm border border-white/10 bg-white/5 text-gray-300 rounded-full transition-all duration-300 hover:border-yellow-400 hover:text-yellow-400">
                    {{ social.label }}
                </a>
            </div>
        </section>

    </main>
    <Footer />
</template>