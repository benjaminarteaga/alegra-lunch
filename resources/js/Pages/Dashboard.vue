<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <welcome /> -->
                    <div class="grid grid-cols-2">
                        <dish-list :dishes="dishes" />
                        <ingredient-list :ingredients="ingredients" />
                        <buy-list :buys="buys" />
                        <recipe-list :recipes="recipes" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import DishList from '@/Pages/Dishes/Components/List'
    import IngredientList from '@/Pages/Ingredients/Components/List'
    import BuyList from '@/Pages/Buys/Components/List'
    import RecipeList from '@/Pages/Recipes/Components/List'


    export default {
        components: {
            AppLayout,
            Welcome,
            DishList,
            IngredientList,
            BuyList,
            RecipeList,
        },
        props: {
            dishes: {
                type: Array,
            },
            ingredients: {
                type: Array,
            },
            buys: {
                type: Array,
            },
            recipes: {
                type: Array,
            }
        }
    }
</script>
