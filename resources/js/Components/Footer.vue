<script setup>
const socialLinks = [
    { label: "Instagram", href: "https://instagram.com" },
    { label: "TikTok", href: "https://tiktok.com" },
    { label: "X", href: "https://x.com" },
    { label: "LinkedIn", href: "https://linkedin.com/in/kamran-faiz" },
];

const footerColumns = [
    { title: "Shop", links: [
        { label: "New Arrivals", href: "/shop" },
        { label: "Best Sellers", href: "/shop" },
        { label: "All Sneakers", href: "/shop" },
    ]},
    { title: "Help", links: [
        { label: "Shipping", href: "#" },
        { label: "Returns", href: "#" },
        { label: "Size Guide", href: "#" },
        { label: "Contact", href: "#" },
    ]},
    { title: "Account", links: [
        { label: "Sign In", href: "/login" },
        { label: "Register", href: "/register" },
        { label: "My Orders", href: "/orders" },
    ]},
];

const year = new Date().getFullYear();
</script>

<template>
    <footer class="border-t border-white/10 bg-gray-950 text-white">
        <div class="container mx-auto px-6 py-14 md:py-16">
            <div class="grid gap-10 md:grid-cols-[1.4fr_repeat(3,1fr)]">
                
                <!-- Brand -->
                <div>
                    <p class="text-3xl font-black">Vibe<span class="text-yellow-400">.</span>Kicks</p>
                    <p class="mt-4 max-w-xs leading-relaxed text-gray-400 text-sm">
                        Dark-luxury sneakers crafted for city rhythm, quiet confidence, and all-night movement.
                    </p>
                    <div class="mt-6 flex gap-3">
                        <a 
                            v-for="social in socialLinks"
                            :key="social.label"
                            :href="social.href"
                            target="_blank"
                            :aria-label="social.label"
                            class="flex h-10 w-10 items-center justify-center border border-white/10 bg-white/5 text-gray-400 rounded-full transition-all duration-300 hover:border-yellow-400 hover:text-yellow-400">
                            {{ social.label[0] }}
                        </a>
                    </div>
                </div>

                <!-- Columns -->
                <div v-for="column in footerColumns" :key="column.title">
                    <h3 class="text-lg font-bold text-white">{{ column.title }}</h3>
                    <ul class="mt-5 space-y-3">
                        <li v-for="link in column.links" :key="link.label">
                            <a :href="link.href" class="text-sm text-gray-400 transition-colors hover:text-yellow-400">
                                {{ link.label }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-sm text-gray-400 md:flex-row md:items-center md:justify-between">
                <p>© {{ year }} Vibe Kicks. All rights reserved.</p>
                <p>Designed & Built by <span class="text-yellow-400 font-semibold">Kamran Faiz</span></p>
            </div>
        </div>
    </footer>
</template>