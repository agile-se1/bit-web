<template>
    <h1>THIS IS A DEMO SITE</h1>
    <p> {{ message }} </p>
    <p> {{ number }}</p>
    <div>
        <button @click="increment"> + </button>
        <button @click="decrement"> - </button>
    </div>

</template>

<script setup>
import {ref} from 'vue';


const message = "Hello Test!";

const number = ref(0);

const increment = () => {
    number.value++;
}
const decrement = () => {
    number.value--;
}

</script>

<style scoped>

</style>
