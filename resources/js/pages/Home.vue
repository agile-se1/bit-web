<script setup>
import MenuBar from "@/components/MenuBar.vue";
import InfoBlock from "@/components/InfoBlock.vue";
import {info} from "autoprefixer";

const infoBlocks = {
    basicInfos : {
        title: "Was ist der Bit?",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.",

    }
}

</script>


<template>
    <div class="top-0 sticky">
        <MenuBar />
    </div>
    <div class="flex mt-52 justify-center">
        <InfoBlock class="mx-6" :title="infoBlocks.basicInfos.title" :text="infoBlocks.basicInfos.text" url="#" />
    </div>




</template>

