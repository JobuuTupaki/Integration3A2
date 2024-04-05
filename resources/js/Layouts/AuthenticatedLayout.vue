<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-white-100 dark:bg-white-900">
            <nav class="bg-white dark:bg-white-800 border-b border-gray-100 dark:border-black-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-15xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <img src="/images/speed-up.png" alt="Speed Up Image" style="width: 180px; display: block; margin: 0 auto;">
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')" style="color: black; font-size: 15px;" exact>
                                <img src="/icon/home.png" class="h-5 w-5 inline mr-2" alt="Home Icon">
                                Home
                                </NavLink>

                                <NavLink :href="route('transactions.index')" :active="route().current('transactions.index')" style="color: black; font-size: 15px;" exact>
                                <img src="/icon/transaction.webp" class="h-5 w-5 inline mr-2" alt="Transactions Icon">
                                Transactions
                                </NavLink>

                                <NavLink :href="route('invoices.index')" :active="route().current('invoices.index')" style="color: black; font-size: 15px;" exact>
                                <img src="/icon/transaction.webp" class="h-5 w-5 inline mr-2" alt="Transactions Icon">
                                Invoice
                                </NavLink>

                                <NavLink :href="route('expenditures.index')" :active="route().current('expenditures.index')"  style="color: black; font-size: 15px;" exact>
                                <img src="/icon/expenditure.png" class="h-5 w-5 inline mr-2" alt="Expenditures Icon">
                                Expenditures
                                </NavLink>

                                <NavLink :href="route('reports.index')":active="route().current('reports.index')"  style="color: black; font-size: 15px;" exact>
                                <img src="/icon/reports.png" class="h-5 w-5 inline mr-2" alt="Reports Icon">
                                Reports
                                </NavLink>
                                
                            </div>
                            
                        </div>


                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-5 relative">
                                <Dropdown align="right" :width="50">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-0 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 dark:text-white-400 bg-white dark:bg-white-800 hover:text-white-700 dark:hover:text-white-300 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            <img
                                                src="/images/profile.png"
                                                alt="Profile Icon"
                                                class="h-10 w-10 mr-3"
                                            />
                                            {{ $page.props.auth.user.name }}
                                            <svg
                                            class="ml-1 h-4 w-4 text-gray-400 dark:text-gray-300"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="blue"
                                            aria-hidden="true"
                                        >
                                            <path fill-rule="evenodd" d="M10 12a1 1 0 01-.707-.293l-4-4a1 1 0 111.414-1.414L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4A1 1 0 0110 12z" clip-rule="evenodd" />
                                        </svg>
                                        </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigation9Dropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white dark:bg-blue-800 shadow" v-if="$slots.header">
                <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-5">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
