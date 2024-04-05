o <template>
    <div>
      <AuthenticatedLayout>
        <template #header>
          <Head title="Expenditure" />
          <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-1">Create Expenditure</h2>
        </template>

        <div class="py-10">
          <div class="max-w-5xl mx-auto">
            <div class="bg-white dark:bg-white-800 ">
                <div class="flex m-2 p-2">
                    
                    <Link href="/expenditures" 
                    class="px-4 py-2 
                    bg-indigo-500 
                    hover:bg-indigo-600 
                    text-white rounded"
                    >Back</Link>
                </div>
            
              <!-- component -->
              <div class="grid place-content-center mt-5">
    <form @submit.prevent="storeExpenditure" class="bg-white shadow-md m-7 p-5 rounded grid grid-cols-2 gap-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Detail</label>
            <div class="mt-2">
                <input type="text" id="title" name="detail" v-model="form.detail" class="block w-full sm:w-96 transition duration-150 ease-in-out">
            </div>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Expenditure Date</label>
            <div class="mt-1">
                <input type="date" id="title" name="expenditure_date" v-model="form.expenditure_date" class="block w-full sm:w-96 transition duration-150 ease-in-out">
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

const form=useForm({
    detail: null,
    expenditure_date:null,
    total:null,
})

    function storeExpenditure(){
        form.post('/expenditures')
    }
</script>

  

