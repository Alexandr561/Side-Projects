<script setup>
import "@/Pages/Post/Index222.vue";
import Index222 from "@/Pages/Post/Index222.vue";
import { ref, computed } from 'vue';
// export default {
//     name: "Index",
//
//     data() {
//         return {
//             name: 'Vasya',
//             age: 20,
//         }
//     }
// }

const name = ref('Vasya'); // Референс на имя
const age = ref(20); // Референс на возраст

const num1 = ref(10);
const num2 = ref(20);
const sum = computed(() => {
    return num1.value + num2.value;
});

// Данные (обычно приходят из props или store)
const persons = ref([
    { name: 'Alice', age: 25 },
    { name: 'Bob', age: 18 },
    { name: 'Charlie', age: 30 },
    { name: 'David', age: 22 }
])

// Вычисляемое свойство
const personAgeMoreTwenty = computed(() => {
    return persons.value.filter(person => person.age > 20)
})
</script>





// Методы
const sayHello = () => {
    console.log('Hello');
};
const sayHi = () => {
    console.log('hi');
};


<!--<script>-->
<!--import "@/Pages/Post/Index222.vue";-->
<!--export default {-->
<!--    name: "index",-->

<!--    components: {-->
<!--        Index222-->
<!--    }-->
<!--}-->
<!--</script>-->
<template>
<div class="w-96 mx-auto pt-8">Indexxx
    <div>
        <p>Сумма чисел: {{ sum }}</p>
    </div>
    <button @click="sayHello" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">hello</button>
    <button @click="sayHi" class="bg-green-500 text-white px-4 py-2 rounded-md">hi</button>

</div>
    <div>Имя: {{ name }}, Возраст: {{ age }}</div>
    <div>
        <Index222>
        </Index222>
    </div>


    <div>
        <h2>Люди старше 20 лет:</h2>
        <ul>
            <li v-for="person in personAgeMoreTwenty" :key="person.name">
                {{ person.name }} - {{ person.age }} лет
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
