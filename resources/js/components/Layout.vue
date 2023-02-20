<template>
    <div class="flex flex-col justify-between w-full min-h-screen">
        <div
            ref="overlappingDiv"
            class="top-0 min-h-fit sticky z-20"
        >
            <MenuBar/>
        </div>
        <div id="content" class="mt-10 flex justify-center flex-grow">
            <slot/>
        </div>
        <div class="">
            <Footer />
        </div>
    </div>
</template>

<script setup>
import MenuBar from "@/components/MenuBar.vue";
import Footer from "@/components/Footer.vue";</script>
