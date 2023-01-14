<template>
    <div>
        <Head title="Create Product"/>
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" :href="route('products')">Products</Link>
            <span class="text-indigo-400 font-medium">/</span>Create Product
        </h1>
        <div class="max-w-full bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="store">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                label="Name"/>
                    <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                label="Purchase Price"/>
                    <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                label="Height"/>
                    <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                label="Width"/>
                    <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full md:w-1/3"
                                label="Length"/>
                </div>

                <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <loading-button :loading="form.processing" class="btn-indigo" type="submit">Save
                    </loading-button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import TextInput from '@/Components/TextInput.vue'
import SelectInput from '@/Components/SelectInput.vue'
import LoadingButton from '@/Components/LoadingButton.vue'

export default {
    components: {
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
