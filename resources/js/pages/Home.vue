<script setup>
import InfoBlock from "@/components/InfoBlock.vue";
import Layout from "@/components/Layout.vue";

const year = new Date().getFullYear();

const infoBlocks = {
    generalInfos:{
        title: `Berufsinformationstag ${year}`,
        text: "Nutze die Gelegenheit, um Einblicke in die Arbeitswelt zu gewinnen und dich bei der Berufsorientierung von Experten beraten zu lassen. Entdecke deine Möglichkeiten und finde heraus, welcher Beruf zu dir passt."
    }
}
</script>


<template class="font-normal">
    <layout>
        <div class="flex justify-between min-h-full max-w-4xl mx-10">
            <InfoBlock :title="infoBlocks.generalInfos.title" :text="infoBlocks.generalInfos.text">
                <template #below-text>
                    <div class="flex flex-row mt-4">
                        <p class="text-white bg-bit-blue rounded p-2 mr-2 my-2">Zukunft</p>
                        <p class="text-white bg-bit-blue rounded p-2 m-2">Arbeitsleben</p>
                        <p class="text-white bg-bit-blue rounded p-2 ml-2 my-2">Beratung</p>
                    </div>
                </template>
                <template #images>
                    <img src="../../assets/img.png" alt="Symbolbild"
                    class="rounded">
                    <img src="../../assets/img_1.png" alt="Symbolbild"
                    class="rounded pt-2">
                </template>
            </InfoBlock>
        </div>
    </layout>




</template>

