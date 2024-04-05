<template>
  <div>
    <AuthenticatedLayout>
      <template #header>
        <Head title="Expenditures" />
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-1">Expenditures</h2>
      </template>

      <div class="py-1">
        <div class="max-w-10xl mx-auto">
          <div class="bg-white dark:bg-white-800 ">
            <div class="flex justify-end m-2 p-2">
              <Link href="/expenditures/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Add Expenditure</Link>
            </div>

            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-8">
              <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-200">
                  <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Detail</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Expenditure Date</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Total</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th> <!-- Add Actions column header -->
                  </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                  <tr v-for="expenditure in expenditures" :key="expenditure.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ expenditure.detail }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ formatDate(expenditure.expenditure_date) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">₱{{ expenditure.total }}</td>
                    
                   
                    <td 
                    class="
                    flex space-x-4
                    px-6 
                    py-4 
                    whitespace-nowrap"
                    >

                        <Link 
                        :href="'/expenditures/' + expenditure.id + '/edit'"
                        class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded"
                        > Edit</Link>

                        <Link 
                          :href="'/expenditures/' + expenditure.id"
                          method="delete" as="button"
                          class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded"
                      > Delete</Link>

                    </td>
                      
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { format } from 'date-fns'; // Import the format function from date-fns

const props = defineProps({
  expenditures: Array
});

// Define formatDate function to format date
const formatDate = (date) => {
  if (!date) return ''; // Handle case where date is null or undefined
  return format(new Date(date), 'MM/dd/yyyy'); // Format the date using date-fns
};
</script>
