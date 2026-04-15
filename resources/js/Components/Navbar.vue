<script setup>
import {Link , usePage} from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore';
const cartStore = useCartStore();
const page = usePage();

const navLinks =[
     { name : 'Home', href: '/'},
     { name : 'Shop-All', href: '/shop'},
     { name : 'Collections', href: '/collections'},
     { name : 'Our Story', href: '/our-story'},

];


</script>


<template>
  <nav class="flex justify-between bg-white text-gray-900 w-full relative z-50 shadow-sm">
    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
      <Link class="text-3xl font-bold font-heading" href="/">
        Vibe Kicks
      </Link>
      
      <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
        <li v-for="link in navLinks" :key="link.name">
          <Link 
            :href="link.href" 
            class="hover:text-gray-500 transition-colors cursor-pointer"
          >
            {{ link.name }}
          </Link>
        </li>
      </ul>

      <div class="hidden xl:flex items-center space-x-5">
        <a class="hover:text-gray-500" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
        </a>

        <div class="relative">
          <Link href="/cart" class="flex items-center hover:text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span v-if="cartStore.totalItems > 0" 
                  class="flex absolute -mt-5 ml-4 bg-yellow-400 text-black text-[10px] font-bold rounded-full w-5 h-5 items-center justify-center">
              {{ cartStore.totalItems }}
            </span>
          </Link>
        </div>

        <Link :href="page.props.auth.user ? '/dashboard' : '/login'" class="flex items-center hover:text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span v-if="page.props.auth.user" class="ml-2 text-sm font-semibold">
            {{ page.props.auth.user.name }}
          </span>
        </Link>
      </div>
    </div>

    <div class="xl:hidden flex items-center px-4">
        <Link href="/cart" class="flex mr-6 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </Link>
        <button class="navbar-burger self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
  </nav>
</template>