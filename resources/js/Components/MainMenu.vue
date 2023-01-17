<template>
    <div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" :href="route('dashboard')">
                <font-awesome-icon icon="fa-chart-simple" class="mr-2" :class="isUrl('dashboard') ? 'text-white' : 'text-indigo-400 fill-indigo-400 group-hover:text-white'"/>
                <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" :href="route('items')">
                <font-awesome-icon icon="fa-warehouse" class="mr-2" :class="isUrl('items') ? 'text-white' : 'text-indigo-400 fill-indigo-400 group-hover:text-white'"/>
                <div :class="isUrl('items') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Items</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" :href="route('products')">
                <font-awesome-icon icon="fa-tag" class="mr-2" :class="isUrl('products') ? 'text-white' : 'text-indigo-400 fill-indigo-400 group-hover:text-white'"/>
                <div :class="isUrl('products') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">For Sale</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" :href="route('products')">
                <font-awesome-icon icon="fa-money-bill" class="mr-2" :class="isUrl('products') ? 'text-white' : 'text-indigo-400 fill-indigo-400 group-hover:text-white'"/>
                <div :class="isUrl('products') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Purchases</div>
            </Link>
        </div>
        <!--        <div class="mb-4">-->
        <!--            <Link class="group flex items-center py-3" :href="route('organizations')">-->
        <!--                <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />-->
        <!--                <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Organizations</div>-->
        <!--            </Link>-->
        <!--        </div>-->
        <!--        <div class="mb-4">-->
        <!--            <Link class="group flex items-center py-3" :href="route('contacts')">-->
        <!--                <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('contacts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />-->
        <!--                <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Contacts</div>-->
        <!--            </Link>-->
        <!--        </div>-->
        <!--        <div class="mb-4">-->
        <!--            <Link class="group flex items-center py-3" :href="route('reports')">-->
        <!--                <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />-->
        <!--                <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>-->
        <!--            </Link>-->
        <!--        </div>-->
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'
import Icon from '@/Components/Icon.vue'

export default {
    components: {
        Icon,
        Link
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1)
            if (urls[0] === '') {
                return currentUrl === ''
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length
        },
    },
}
</script>
