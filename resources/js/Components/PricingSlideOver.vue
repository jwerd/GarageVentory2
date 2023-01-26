<template>
    <loading-button class="btn-indigo" @click="open = !open" type="submit">Caclulate Price</loading-button>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <div class="fixed inset-0" />

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                        <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto w-screen max-w-2xl">
                                <form class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                    <div class="flex-1">
                                        <!-- Header -->
                                        <div class="bg-indigo-900 px-4 py-6 sm:px-6">
                                            <div class="flex items-start justify-between space-x-3">
                                                <div class="space-y-1">
                                                    <DialogTitle class="text-lg font-medium text-white">Price Calculator</DialogTitle>
                                                </div>
                                                <div class="flex h-7 items-center">
                                                    <button type="button" class="text-gray-400 hover:text-gray-500" @click="open = false">
                                                        <span class="sr-only">Close panel</span>
                                                        <font-awesome-icon icon="fa-xmark" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Divider container -->
                                        <div class="space-y-6 py-6 sm:space-y-0 sm:divide-y sm:divide-gray-200 sm:py-0">
                                            <!-- Project name -->
                                            <div class="space-y-1 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                                <div class="sm:col-span-2">
                                                    <text-input v-model="form.price" class="pb-8 pr-6 w-full"
                                                                label="Purchase Price"/>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <text-input v-model="form.cost_of_materials" class="pb-8 pr-6 w-full"
                                                                label="Cost of Materials"/>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <text-input v-model="form.desired_profit" class="pb-8 pr-6 w-full"
                                                                label="Desired Profit"/>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <text-input v-model="form.cost_of_materials" class="pb-8 pr-6 w-full"
                                                                label="Tax Rate 8.1%"/>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <text-input v-model="form.list_price" class="pb-8 pr-6 w-full"
                                                                label="List Price"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action buttons -->
                                    <div class="flex-shrink-0 border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <div class="flex justify-end space-x-3">
                                            <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" @click="open = false">Cancel</button>
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import TextInput from "@/Components/TextInput.vue";
const form = {
    price: '',
    cost_of_materials: '',
    desired_profit: '',
    tax_rate: '8.1%',
    list_price: ''
}

const team = [
    {
        name: 'Tom Cook',
        email: 'tom.cook@example.com',
        href: '#',
        imageUrl:
            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    {
        name: 'Whitney Francis',
        email: 'whitney.francis@example.com',
        href: '#',
        imageUrl:
            'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    {
        name: 'Leonard Krasner',
        email: 'leonard.krasner@example.com',
        href: '#',
        imageUrl:
            'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    {
        name: 'Floyd Miles',
        email: 'floyd.miles@example.com',
        href: '#',
        imageUrl:
            'https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    {
        name: 'Emily Selman',
        email: 'emily.selman@example.com',
        href: '#',
        imageUrl:
            'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
]

const open = ref(false)

</script>
