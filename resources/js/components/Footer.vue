<template>
    <footer class="w-full bg-bit-blue flex justify-between min-h-full px-6">
        <Link href="/impressum" class="text-white py-6">Impressum</Link>

        <p class="text-white py-6">Copyright C.Matthias & his mommy {{ year }}</p>

        <Link href="/privacy" class="text-white py-6">Datenschutz</Link>
    </footer>
</template>

<script setup>
const year = new Date().getFullYear();
import { Link } from '@inertiajs/inertia-vue3'



</script>
