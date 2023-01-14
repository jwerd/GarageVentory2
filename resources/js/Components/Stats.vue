<template>
    <div class="bg-white rounded-lg shadow relative px-6 py-4 md:col-span-4 min-h-40 h-full">
        <!---->
        <div class="h-6 flex items-center mb-4"><h3 class="mr-3 leading-tight text-sm font-bold">{{ title }}</h3><!---->
        </div>
        <div class="flex items-center mb-4">
            <div class="rounded-lg bg-indigo-600 text-white h-14 w-14 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     width="24" height="24" class="inline-block" role="presentation">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <div class="ml-4"><p class="flex items-center text-4xl">${{amount}} <!----></p>
                <div>
                    <p class="flex items-center font-bold text-sm"><!---->
                        <svg class="text-green-500 stroke-current mr-2" width="24" height="24" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span>{{change}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    inheritAttrs: false,
    props: {
        stats: Object,
        title: String
    },
    emits: ['update:modelValue'],
    data() {
        return {
            selected: this.modelValue,
        }
    },
    computed: {
        amount() {
            return this.stats.amount
        },
        change() {
            return this.stats.change
        }
    },
    watch: {
        selected(selected) {
            this.$emit('update:modelValue', selected)
        },
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
    },
}
</script>
