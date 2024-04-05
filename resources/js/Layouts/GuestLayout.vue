<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="full-page-container">
    <!-- Background Image -->
    <div class="bg-image-container">
      <img src="/images/bg.png" alt="Background Image" class="bg-image" />
    </div>
    <div class="login-page-content">
      <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-100 dark:bg-white-900">
        <!--<div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>-->
        <!-- Use h1 tag with appropriate styling for emphasis 
        <h1 class="text-3xl font-bold text-white mt-4 font-serif">Speed-Up LaundryShop</h1>-->

        <div
          class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white light:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Scoped CSS for the component */
.full-page-container {
  position: relative;
  width: 100%;
  height: 100vh; /* Set the height to viewport height */
  overflow: hidden; /* Prevent scrollbars */
}

.bg-image-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.bg-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity:100%;

}

.login-page-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 90%;
  height: 100%;
  display: flex;
  justify-content: right;
  align-items: center;
}
</style>
