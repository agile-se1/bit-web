<template>
    <layout>
        <BitFormWizard
            :general_presentations="general_presentations"
            :professional_fields="professional_fields"/>

    </layout>

</template>

<script setup>
import Layout from "@/components/Layout.vue";
import BitFormWizard from "@/components/BitFormWizard.vue";

defineProps({
    professional_fields: Array,
    general_presentations: Array,
});
</script>
