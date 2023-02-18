<template>
    <Layout>
        <div class="grid border-gray-200 border border-solid rounded p-5">
            <p class="text-2xl text-bit-blue">Admin Login</p>

            <input class="p-2 my-2 rounded" v-model="username" type="text" placeholder="Benutzername">
            <input class="p-2 my-2 rounded" v-model="password" type="password" placeholder="Passwort">
            <button class="bg-bit-blue text-white rounded p-2 my-2" type="submit"
                    @click="login">Login
            </button>
        </div>
    </Layout>


</template>

<script setup>
import {ref} from "vue";
import Layout from "@/components/Layout.vue";
import {Inertia} from "@inertiajs/inertia";

let username = ref("");
let password = ref("");

function login() {
    console.log("login");
    console.log(username.value);
    console.log(password.value)
    Inertia.post('/admin/login', {
        username: username.value,
        password: password.value
    });

}</script>
