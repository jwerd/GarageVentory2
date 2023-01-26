<template>
    <div>
        <Head :title="form.name"/>
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" :href="route('items')"><font-awesome-icon icon="fa-circle-arrow-left" /></Link>
            {{ form.name }}
        </h1>
        <form @submit.prevent="update">
        <trashed-message v-if="item.deleted_at" class="mb-6" @restore="restore"> This item has been
            deleted.
        </trashed-message>

        <Column title="Details" description="Enter your basic items details.">
            <div class="max-w-full bg-white rounded-md shadow overflow-hidden">

                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                label="Name"/>
                    <text-input v-model="form.price" :error="form.errors.name" class="pb-8 pr-6 w-full"
                                label="Purchase Price"/>
                </div>
            </div>
        </Column>
        <Column title="Pricing" description="Calculate all various pricing.">
            <div class="max-w-full bg-white rounded-md shadow overflow-hidden p-6">
                    <PricingSlideOver />
            </div>
        </Column>
        <div class="border-t pt-5 border-gray-200"></div>
        <div class="flex items-center justify-end max-w-full">
            <button v-if="!item.deleted_at" class="text-red-600 hover:underline" tabindex="-1"
                    type="button" @click="destroy">Remove Item
            </button>
            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Save
            </loading-button>
        </div>
        </form>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
import Icon from '@/Components/Icon.vue'
import Layout from '@/Layouts/Layout.vue'
import TextInput from '@/Components/TextInput.vue'
import SelectInput from '@/Components/SelectInput.vue'
import LoadingButton from '@/Components/LoadingButton.vue'
import TrashedMessage from '@/Components/TrashedMessage.vue'
import Column from '@/Components/Column.vue'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import PricingSlideOver from "@/Components/PricingSlideOver.vue";

export default {
    components: {
        PricingSlideOver,
        FontAwesomeIcon,
        Column,
        Head,
        Icon,
        Link,
        LoadingButton,
        SelectInput,
        TextInput,
        TrashedMessage,
    },
    layout: Layout,
    props: {
        item: Object,
    },
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                name: this.item.name,
                price: this.item.price,
                list_price: this.item.list_price
            }),
        }
    },
    methods: {
        update() {
            this.form.put(route('items.update', this.item.id))
        },
        destroy() {
            if (confirm('Are you sure you want to delete this item?')) {
                this.$inertia.delete(route('items.destroy', this.item.id))
            }
        },
        restore() {
            if (confirm('Are you sure you want to restore this item?')) {
                this.$inertia.put(route('items.restore', this.item.id))
            }
        },
    },
}
</script>
