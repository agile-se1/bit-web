<template>
    <div class="">
        <div class="top-0 min-h-fit sticky-top">
            <MenuBar />
        </div>
        <div class="min-h-screen mt-40">
            <slot/>
        </div>
        <div class="">
            <Footer />
        </div>
    </div>
</template>

<script setup>
import MenuBar from "@/components/MenuBar.vue";
import Footer from "@/components/Footer.vue";
</script>

