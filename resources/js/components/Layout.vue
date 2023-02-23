<template>
    <div class="flex flex-col justify-between w-full min-h-screen">
        <div
            ref="overlappingDiv"
            class="top-0 min-h-fit sticky z-20"
        >
            <MenuBar v-if="type==='default'"/>
            <AdminMenuBar v-else-if="type==='admin'"/>
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
import Footer from "@/components/Footer.vue";
import AdminMenuBar from "@/components/AdminMenuBar.vue";

defineProps({
    type: {
        type: String,
        default: 'default'
    }
})

</script>
