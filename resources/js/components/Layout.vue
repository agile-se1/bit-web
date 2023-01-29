<template>
    <div>
        <div
            ref="overlappingDiv"
            class="top-0 min-h-fit sticky z-20"
        >
            <MenuBar/>
        </div>
        <div id="content" class="min-h-screen relative mt-6">
            <slot/>
        </div>
        <div class="relative">
            <Footer />
        </div>
    </div>
</template>

<script setup>
import MenuBar from "@/components/MenuBar.vue";
import Footer from "@/components/Footer.vue";

</script>
