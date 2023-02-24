<template>
    <Layout type="admin">
        <div class="flex flex-col justify-around">
            <div class="grid border-gray-200 border border-solid rounded p-5 w-72">
                <p class="text-2xl text-bit-blue">Admin Login</p>
                <p v-if="errors.username" class="text-red-700 text-xs">Fehler: {{ errors.username }}</p>
                <p v-if="errors.password" class="text-red-700 text-xs">Fehler: {{ errors.password }}</p>
                <input class="p-2 my-2 rounded" v-model="username" type="text" placeholder="Benutzername">
                <input class="p-2 my-2 rounded" v-model="password" type="password" placeholder="Passwort">
                <button class="bg-bit-blue text-white rounded p-2 my-2" type="submit"
                        @click="login">Login
                </button>
            </div>
        </div>
    </Layout>


</template>

<script setup>
import {ref} from "vue";
import Layout from "@/components/Layout.vue";
import {Inertia} from "@inertiajs/inertia";

const username = ref("");
const password = ref("");

defineProps({
        errors: {
            type: Object,
        }
    }
)

function login() {
    Inertia.post('/admin/login', {
        username: username.value,
        password: password.value
    });

}</script>
