<template>
    <div class="p-6">
        <h3 class="text-center text-3xl pb-10">Órdenes</h3>
        <table class="table-auto w-full text-center mx-auto">
            <thead class="bg-indigo-200">
                <th class="border border-indigo-400">ID</th>
                <th class="border border-indigo-400">Receta</th>
                <th class="border border-indigo-400">Solicitado por</th>
                <th class="border border-indigo-400">Tiempo restante</th>
            </thead>
            <tbody>
                <tr v-for="(dish, index) in dishes" :key="dish.id" :class="{'bg-indigo-50': index % 2 === 0, 'bg-indigo-100': index % 2 !== 0}">
                    <td class="border border-indigo-400">{{ dish.id }}</td>
                    <td class="border border-indigo-400">{{ dish.recipe.name }}</td>
                    <td class="border border-indigo-400">{{ dish.user.name }}</td>
                    <td class="border border-indigo-400">
                        <timer :date="dish.finish_date" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Timer from '@/Pages/Dishes/Components/Timer'

    export default {
        components: {
            Timer
        },
        props: {
            dishes: {
                type: Array,
            }
        },
    }
</script>
