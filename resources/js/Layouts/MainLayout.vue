<template>
  <div class="flex">
    <div class="relative h-[100dvh] sm:w-[90px] lg:w-[130px] bg-red-600">
      <SideBar />
    </div>
    <div>
      <slot></slot>
    </div>
  </div>
</template>
<script>
import SideBar from '@/Components/SideBar.vue';

export default {
  components: { SideBar },
};
</script>
