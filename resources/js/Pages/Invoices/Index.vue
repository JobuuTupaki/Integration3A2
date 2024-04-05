<template>
  <div>
    <AuthenticatedLayout>
      <template #header>
        <Head title="Invoices" />
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-1">Invoices</h2>
      </template>

      <div class="py-1">
        <div class="max-w-10xl mx-auto">
          <div class="bg-white dark:bg-white-800 ">
            <div class="flex justify-end m-2 p-3">
                <div class="flex">
                  <form action="/transactions/search" method="GET">
                    <input type="text" name="transaction_id" placeholder="Search Transaction ID" class="px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md">Search</button>
                  </form>
                  <div class="flex justify-end p-1">
                    <Link @click="printToPDF" href="/transactions/reciept" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                      Print
                    </Link>
                  </div>
                </div>
              </div>
            </div>
                            
          <!-- Receipt with QR code -->
          <div class="flex h-screen w-full items-center justify-center bg-white-600">
            <div class="w-80 rounded bg-white-50 px-6 pt-7 shadow-lg">
              <img src="/images/speed-up.png" alt="Speed Up Image" style="width: 250px; display: block; margin: 0 auto;" />
              <div class="flex flex-col justify-center items-center gap-1">
                <h4 class="font-semibold">SPEED-UP LAUNDRY</h4>
                <p class="text-xs">Amat Street, Surigao City</p>
              </div>
              <div class="flex flex-col gap-3 border-b py-6 text-xs">
                <p class="flex justify-between">
                  <span class="text-gray-400">Transaction No.:</span>
                  <span>5033122</span>
                </p>
                <p class="flex justify-between">
                  <span class="text-gray-400">Customer Name:</span>
                  <span>Lynde Joyce Roche</span>
                </p>
                <p class="flex justify-between">
                  <span class="text-gray-400">Weight:</span>
                  <span>3kl</span>
                </p>
                <p class="flex justify-between">
                  <span class="text-gray-400">Order Date:</span>
                  <span>4/26/2024</span>
                </p>
                <p class="flex justify-between">
                  <span class="text-gray-400">Description:</span>
                  <span>Clothes</span>
                </p>
              </div>
              <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                <table class="w-full text-left">
                  <thead>
                    <p class="flex justify-between">
                  <span class="text-gray-400">Total:</span>
                  <span>$2500</span>
                </p>
                  </thead>
                
                </table>
                <div class=" border-b border border-dashed"></div>
                <!-- Unique QR code -->
                <div id="qrcode" class="py-1  items-center flex flex-col gap-1"></div>
              </div>
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
import QRCode from 'qrcode'; // Import QRCode library


function printToPDF() {
window.print();
}

// Function to generate a unique QR code
const generateQRCode = async () => {
  try {
    const uniqueIdentifier = 'unique_transactitraon_id'; // Replace with your unique identifier for the transaction
    const qrCodeDataURL = await QRCode.toDataURL(uniqueIdentifier);
    const qrCodeImg = document.createElement('img');
    qrCodeImg.src = qrCodeDataURL;
    document.getElementById('qrcode').appendChild(qrCodeImg);
  } catch (error) {
    console.error('Error generating QR code:', error);
  }
};

// Call the function to generate the QR code
generateQRCode();
</script>
