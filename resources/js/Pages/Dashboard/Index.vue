<template>
    <div>
        <Head title="Dashboard"/>
        <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
        <div class="grid md:grid-cols-12 gap-6">
            <Stats title="Month To Date Sales" :stats="stats.mtd"/>
            <Stats title="Year To Date Sales" :stats="stats.ytd"/>
        </div>
    </div>
</template>

<script>
import {Head} from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import Stats from '@/Components/Stats.vue'

export default {
    components: {
        Head,
        Stats,
    },
    props: {
        stats: Object
    },
    data() {
        return {

        }
    },
    layout: Layout,
}
</script>
