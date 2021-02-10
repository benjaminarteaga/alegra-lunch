<template>
    <div class="p-6">
        <h3 class="text-center text-3xl pb-10">Recetas</h3>

        <table class="table-auto w-full text-center">
            <thead class="bg-indigo-200">
                <th class="border border-indigo-400">ID</th>
                <th class="border border-indigo-400">Receta</th>
                <th class="border border-indigo-400">Ingredientes</th>
            </thead>
            <tbody>
                <tr v-for="(recipe, index) in recipes" :key="recipe.id" :class="{'bg-indigo-50': index % 2 === 0, 'bg-indigo-100': index % 2 !== 0}">
                    <td class="border border-indigo-400">{{ recipe.id }}</td>
                    <td class="border border-indigo-400">{{ recipe.name }}</td>
                    <td class="border border-indigo-400">
                        <ul v-for="ingredient in recipe.ingredients" :key="ingredient.id">
                            <li>{{ ingredient.name }}</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            recipes: {
                type: Array,
            }
        },
    }
</script>
