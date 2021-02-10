<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pedidos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" class="flex space-x-8 justify-center">
                            <label for="dishes" class="self-center text-lg">Cantidad de platos a pedir:</label>
                            <input type="number" id="dishes" v-model.number="form.quantity" class="rounded-md border-gray-300 shadow-sm self-center text-lg" min="1">
                            <button class="px-10 py-2 rounded-md text-white bg-indigo-600 hover:bg-indigo-700 self-center text-lg">Nuevo pedido</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-14 bg-white border-b border-gray-200">
                        <dish-list :dishes="dishes" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DishList from '@/Pages/Dishes/Components/List'

    export default {
        components: {
            AppLayout,
            DishList,
        },
        props: {
            dishes: {
                type: Array,
            }
        },
        data() {
            return {
                form: {
                    quantity: 1,
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post(this.route('pedidos.store'), this.form)
            }
        }
    }
</script>
