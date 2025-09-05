<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<script>

import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Show",

    layout: MainLayout,

    props: [
        'post'
    ],
}
</script>

<template>

        <h1 class="text-lg mb-4">Пост:</h1>
        <div class="mb-8">
            <Link :href="route('post.index')" class="text-sky-500 text-sm mb-8" >Назад</Link>
        </div>
        <div v-if="post">
            <div class="mt-6 pt-6 border-t border-gray-400">
                <div>id: {{ post.id }}</div>
                <div>title: {{ post.title }}</div>
                <div>content: {{ post.content }}</div>
            </div>
        </div>

</template>

<style scoped>

</style>
