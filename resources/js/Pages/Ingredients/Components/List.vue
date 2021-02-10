<template>
    <div class="p-6">
        <h3 class="text-center text-3xl pb-10">Ingredientes</h3>
        <table class="table-fixed w-2/3 text-center mx-auto">
            <thead class="bg-indigo-200">
                <th class="border border-indigo-400">Nombre</th>
                <th class="border border-indigo-400">Cantidad disponible</th>
            </thead>
            <tbody>
                <tr v-for="(ingredient, index) in ingredients" :key="ingredient.id" :class="{'bg-indigo-50': index % 2 === 0, 'bg-indigo-100': index % 2 !== 0}">
                    <td class="border border-indigo-400">{{ ingredient.name }}</td>
                    <td class="border border-indigo-400">{{ ingredient.stock }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            ingredients: {
                type: Array,
            }
        }
    }
</script>
