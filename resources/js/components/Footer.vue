<template>
    <footer class="w-full bg-bit-blue flex justify-between min-h-full px-6">
        <p class="text-white py-6">Impressum</p>

        <p class="text-white py-6">Copyright to C.Matthias {{ year }}</p>

        <Link href="/privacy" class="text-white py-6">Datenschutz</Link>
    </footer>
</template>

<script setup>
const year = new Date().getFullYear();
import { Link } from '@inertiajs/inertia-vue3'



</script>
