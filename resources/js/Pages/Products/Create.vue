<template>
    <div>
        <Head title="Create Product"/>
        <h1 class="mb-8 text-3xl font-bold">
            Create Product
        </h1>
        <form @submit.prevent="store">
            <Column title="Product Details" description="Enter your basic product details.">
                <div class="max-w-full bg-white rounded-md shadow overflow-hidden">

                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                        <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                    label="Name"/>
                        <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                    label="Purchase Price"/>
                    </div>
                </div>
            </Column>
            <Column title="Product Dimensions" description="Enter your dimensions for your product.">
                <div class="max-w-full bg-white rounded-md shadow overflow-hidden">
                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                        <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                    label="Height"/>
                        <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                    label="Width"/>
                        <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                    label="Length"/>
                    </div>
                </div>
            </Column>
            <div class="border-t pt-5 border-gray-200"></div>
            <div class="flex items-center justify-end max-w-full">
                <loading-button :loading="form.processing" class="btn-indigo" type="submit">Save
                </loading-button>
            </div>

        </form>

    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import TextInput from '@/Components/TextInput.vue'
import SelectInput from '@/Components/SelectInput.vue'
import LoadingButton from '@/Components/LoadingButton.vue'
import Column from "@/Components/Column.vue";

export default {
    components: {
        Column,
        Head,
        Link,
        LoadingButton,
        SelectInput,
        TextInput,
    },
    layout: Layout,
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                phone: null,
                address: null,
                city: null,
                region: null,
                country: null,
                postal_code: null,
            }),
        }
    },
    methods: {
        store() {
            this.form.post(route('organizations'))
        },
    },
}
</script>
