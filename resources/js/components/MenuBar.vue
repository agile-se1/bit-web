<script setup>
import {Link} from "@inertiajs/inertia-vue3";

</script>

<template>
    <nav class="bg-white px-2 sm:px-4 py-2.5 w-full top-0 left-0 drop-shadow-2xl font-normal">
        <div class="container flex flex-wrap items-center justify-around mx-auto py-2">
            <a href="#" class="flex items-center justify-start">
                <img src='../../assets/logo.png' class="mr-3 sm:h-9 scale-175" alt="Logo">
            </a>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col p-4 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                    <li>
                        <Link href="/" class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Home</Link>
                    </li>
                    <li>
                        <Link href="#" class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Informationen</Link>
                    </li>
                    <li>
                        <Link href="#" class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Berufsfeldwahl</Link>
                    </li>
                    <li>
                        <Link href="#" class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Referenten</Link>
                    </li>
                    <li>
                        <Link href="#" class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Anfahrt</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
