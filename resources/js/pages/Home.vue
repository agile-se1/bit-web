<script setup>
import MenuBar from "@/components/MenuBar.vue";
import InfoBlock from "@/components/InfoBlock.vue";
import Footer from "@/components/Footer.vue";

const infoBlocks = {
    basicInfos : {
        title: "Was ist der Bit?",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.",

    }
}

</script>


<template>
    <div class="">
        <div class="top-0 min-h-fit sticky-top">
            <MenuBar />
        </div>
        <div class="min-h-screen mt-40">
            <div class="flex justify-center min-h-fit">
                <InfoBlock :title="infoBlocks.basicInfos.title" :text="infoBlocks.basicInfos.text" url="#" />
            </div>
        </div>
        <div class="">
            <Footer />
        </div>
    </div>




</template>

