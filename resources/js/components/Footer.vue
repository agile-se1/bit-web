<template>
    <footer class="bg-white drop-shadow-2xl md:py-2">
        <div class="w-full max-w-screen-xl mx-auto p-2 ">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex shrink">
                    <a href="https://www.ffgm.schule/index.php/start.html" target="_blank" class="flex items-center mb-4 sm:mb-0">
                        <img src="/logo.png" class="h-8 mr-3" alt="Förderverein Logo" />
                    </a>
                </div>
                <ul class="flex flex-wrap items-center justify-between mb-6 text-sm font-medium text-bit-blue sm:mb-0">
                    <li class="mr-4 hover:underline md:mr-6">
                        <Link href="/impressum">Impressum</Link>
                    </li>

                    <li class="mr-4 hover:underline md:mr-6">
                        <Link href="/privacy">Datenschutz</Link>
                    </li>

                    <li class="hover:underline">
                        <Link href="/arrival">Anfahrt</Link>
                    </li>
                </ul>
            </div>
            <hr class="my-2 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-2" />
            <span class="block text-sm text-bit-blue text-center">  &copy; {{ year }} - Freunde & Förderer Gymnasium Mellendorf</span>
        </div>
    </footer>
</template>




<script setup>
const year = new Date().getFullYear();
import {Link} from '@inertiajs/inertia-vue3'</script>
