<template>
    <div>
        <Head title="Products"/>
        <h1 class="mb-8 text-3xl font-bold">Items</h1>
        <div class="flex items-center justify-between mb-6">
            <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
                <label class="block text-gray-700">Product Status:</label>
                <select v-model="form.status" class="form-select mt-1 w-full">
                    <option :value="null"/>
                    <option value="unsold">Unsold Items</option>
                    <option value="sold">Sold Items</option>
                </select>
            </search-filter>
            <Link class="btn-indigo" :href="route('items.create')">
                <font-awesome-icon class="mr-1" icon="fa-circle-plus" />
                <span>New</span>
                <span class="hidden md:inline">&nbsp;Item</span>
            </Link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Image</th>
                    <th class="pb-4 pt-6 px-6">Name</th>
                    <th class="pb-4 pt-6 px-6">Dimension</th>
                    <th class="pb-4 pt-6 px-6">Purchase Price</th>
                    <th class="pb-4 pt-6 px-6">List Price</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items.data" :key="item.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <img src="https://via.placeholder.com/100" />
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500"
                              :href="route('items.edit', item.id)">
                            {{ item.name }}
                            <icon v-if="item.deleted_at" name="trash"
                                  class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"/>
                        </Link>
                    </td>
                    <td class="border-t">
                        <span class="flex items-center px-6 py-4"
                              tabindex="-1">
                            <Dimension :value="item.dimension" />
                        </span>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('items.edit', item.id)"
                              tabindex="-1">
                            {{ item.price }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link class="flex items-center px-4" :href="route('items.edit', item.id)"
                              tabindex="-1">
                            <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400"/>
                        </Link>
                    </td>

                </tr>
                <tr v-if="items.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="5">No items found.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination class="mt-6" :links="items.links"/>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
import Icon from '@/Components/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Layouts/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Components/Pagination.vue'
import SearchFilter from '@/Components/SearchFilter.vue'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Dimension from "@/Components/Dimension.vue";

export default {
    components: {
        FontAwesomeIcon,
        Head,
        Icon,
        Link,
        Pagination,
        SearchFilter,
        Dimension
    },
    layout: Layout,
    props: {
        filters: Object,
        items: Object,
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                trashed: this.filters.trashed,
            },
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get(route('items'), pickBy(this.form), {preserveState: true})
            }, 150),
        },
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
}
</script>
