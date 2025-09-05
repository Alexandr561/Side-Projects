<!--<script setup>-->
<!--import { useForm } from '@inertiajs/vue3'-->
<!--import {Link} from '@inertiajs/vue3'-->


<!--const form = useForm({-->
<!--    title: '', // Изначально пустое значение-->
<!--    content: '' // Изначально пустое значение-->
<!--})-->

<!--const store = () => {-->
<!--    console.log('Form data:', form.title, form.content)-->
<!--    form.post(route('post.store'), {-->
<!--        preserveScroll: true, // Опциональный аргумент для сохранения положения прокрутки-->
<!--        onSuccess: () => {-->
<!--            console.log('Post created!')-->
<!--        },-->
<!--        onError: errors => {-->
<!--            console.error(errors)-->
<!--        }-->
<!--    })-->
<!--}-->
<!--</script>-->

<script>
import {Link} from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Create",

    layout: MainLayout,

    components: {
        Link
    },

    props: [
        'errors'
    ],

    data() {
        return {
            title: '',
            content: '',

        }
    },

    methods: {
        store() {
            this.$inertia.post('/posts', {title: this.title, content: this.content})
        }
    }
}
</script>


<template>

    <h1 class="text-lg font-semibold mb-4">Создать пост</h1>

    <div class="mb-8">
        <Link :href="route('post.index')" class="text-sky-500 text-sm mb-8">Назад</Link>
    </div>

    <form @submit.prevent="store" class="space-y-5">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="title">Название:</label>
            <input v-model="title"
                   type="text"
                   id="title"
                   placeholder="Введите название поста"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none"
            />
            <div v-if="errors.title" class="text-red-600">{{errors.title}}</div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="content">Содержание:</label>
            <textarea
                id="content"
                v-model="content"
                rows="4"
                placeholder="Напишите содержание поста..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"
            ></textarea>
            <div v-if="errors.content" class="text-red-600">{{errors.content}}</div>
        </div>
        <div class="flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
            >
                Создаём!
            </button>
        </div>
    </form>
</template>
<style scoped>

</style>
<!--v-model="form.title"-->
