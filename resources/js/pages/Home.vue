<script setup>
import InfoBlock from "@/components/InfoBlock.vue";
import Layout from "@/components/Layout.vue";

const year = new Date().getFullYear();

const infoBlocks = {
    generalInfos: {
        title: `Berufsinformationstag ${year}`,
        text: "Nutze die Gelegenheit, um Einblicke in die Arbeitswelt zu gewinnen und dich bei der Berufsorientierung von Experten beraten zu lassen. Entdecke deine Möglichkeiten und finde heraus, welcher Beruf zu dir passt."
    }
}
</script>


<template>
    <layout>
        <div class="flex justify-between items-center min-h-full max-w-4xl mx-10">
            <div class="py-10">
                <InfoBlock :title="infoBlocks.generalInfos.title" :text="infoBlocks.generalInfos.text">
                    <template #images>
                        <img src="/img.jpeg" alt="Symbolbild"
                        class="rounded"><!-- TODO: Change image and Adjust styling -->
                        <img src="/img_1.png" alt="Symbolbild"
                             class="rounded pt-2 min-w-full">
                    </template>
                </InfoBlock>
            </div>
        </div>
    </layout>


</template>

