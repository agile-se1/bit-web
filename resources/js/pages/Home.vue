<script setup>
import InfoBlock from "@/components/InfoBlock.vue";
import Layout from "@/components/Layout.vue";
import { Carousel } from 'flowbite';

const infoBlocks = {
    basicInfos : {
        title: "Was ist der Bit?",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.",

    }
}

</script>


<template class="font-normal">
    <layout>
        <div id="default-carousel" class="flex justify-center min-h-fit" data-carousel="static">
            <InfoBlock :title="infoBlocks.basicInfos.title" :text="infoBlocks.basicInfos.text" url="#" />
        </div>

    </layout>




</template>

