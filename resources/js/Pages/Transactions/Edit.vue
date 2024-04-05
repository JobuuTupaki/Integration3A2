o <template>
    <div>
      <AuthenticatedLayout>
        <template #header>
          <Head title="Transaction" />
          <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-1">Transactions</h2>
        </template>
  
        <div class="py-10">
          <div class="max-w-5xl mx-auto">
            <div class="bg-white dark:bg-white-800 ">
                <div class="flex m-2 p-2">
                    
                    <Link href="/transactions" 
                    class="px-4 py-2 
                    bg-indigo-500 
                    hover:bg-indigo-600 
                    text-white rounded"
                    >Back</Link>
                </div>
            
              <!-- component -->
              <div class="grid place-content-center mt-5">
    <form @submit.prevent="updateTransaction" class="bg-white shadow-md m-7 p-5 rounded grid grid-cols-2 gap-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Transaction ID</label>
            <div class="mt-2">
                <input type="number" id="title" name="transaction_id" v-model="form.transaction_id" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Customer Name</label>
            <div class="mt-2">
                <input type="text" id="title" name="customer_name" v-model="form.customer_name" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Weight</label>
            <div class="mt-2">
                <input type="number" id="title" name="weight" v-model="form.weight" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Order Date</label>
            <div class="mt-1">
                <input type="date" id="title" name="order_date" v-model="form.order_date" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
            <div class="mt-1">
                <input type="text" id="title" name="description" v-model="form.description" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Total</label>
            <div class="mt-1">
                <input type="number" id="title" name="total"  v-model="form.total" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>

        <div class="col-span-2">
            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">Create</button>
        </div>
    </form>

  
            </div>
            </div>
          </div>
        </div>
      </AuthenticatedLayout>
    </div>
  </template>
  
  
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, Link , useForm } from '@inertiajs/vue3'; 
  import {Inertia} from "@inertiajs/inertia";
  
  
  const props =defineProps({
    transaction: Object,
  })
  
  const form=useForm({
    transaction_id: props.transaction.transaction_id,
    customer_name: props.transaction.customer_name,
    weight: props.transaction.weight,
    order_date:props.transaction.order_date,
    description:props.transaction.description,
    total:props.transaction.total,
  })
  
    function updateTransaction(){
      Inertia.post(`/transactions/${props.transaction.id}`, {
    _method: 'put',
    transaction_id: form.transaction_id,
    customer_name: form.customer_name,
    weight: form.weight,
    order_date: form.order_date,
    description: form.description,
    total: form.total,
  })
  }
  </script>
  
  
  
  