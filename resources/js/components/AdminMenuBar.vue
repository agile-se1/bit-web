<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";

const open = ref(false)

const toggle = () => open.value = !open.value
</script>
<template>
    <nav class="flex items-center justify-between flex-wrap bg-white p-6 drop-shadow-2xl">
        <Link href="/admin">
            <div class="flex items-center flex-no-shrink text-white mr-6">
                <img src="/logo.png" alt="Förderverein Logo" class="h-8 scale-175 mr-2">
                <span class="text-2xl font-bold text-bit-blue">Admin-Bereich</span>
            </div>
        </Link>
        <div class="block sm:hidden">
            <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-bit-blue border-gray-200 hover:text-bit-blue hover:border-bit-blue">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="text-sm sm:flex-grow">
                <Link href="/" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-bit-blue hover:text-gray-600 text-xl mr-4">
                    Home
                </Link>
                <Link href="/admin/user" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-bit-blue hover:text-gray-600 text-xl mr-4">
                    Nutzerverwaltung
                </Link>
                <Link href="/admin/emails" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-bit-blue hover:text-gray-600 text-xl">
                    Emails
                </Link>
            </div>

        </div>
    </nav>

</template>
