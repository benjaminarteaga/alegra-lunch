<template>
    <div class="p-6">
        <h3 class="text-center text-3xl pb-10">Compras</h3>
        <table class="table-auto w-full text-center mx-auto">
            <thead class="bg-indigo-200">
                <th class="border border-indigo-400">Ingrediente</th>
                <th class="border border-indigo-400">Cantidad comprada</th>
                <th class="border border-indigo-400">Fecha de compra</th>
            </thead>
            <tbody>
                <tr v-for="(buy, index) in buys" :key="buy.id" :class="{'bg-indigo-50': index % 2 === 0, 'bg-indigo-100': index % 2 !== 0}">
                    <td class="border border-indigo-400">{{ buy.ingredient.name }}</td>
                    <td class="border border-indigo-400" :class="[{ 'text-red-600': buy.quantity === 0 }]">
                        {{ buy.quantity !== 0 ? buy.quantity : 'No habia stock en el mercado' }}
                    </td>
                    <td class="border border-indigo-400">{{ buy.date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            buys: {
                type: Array,
            }
        }
    }
</script>
