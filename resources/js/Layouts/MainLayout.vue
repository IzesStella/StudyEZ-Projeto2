<template>
  <div class="flex w-full max-[479px]:flex-col">
    <div
      class="relative max-[479px]:h-[50px] h-[100dvh] sm:w-[90px] lg:w-[130px] max-[479px]:bg-[#fdf5cc]"
    >
      <SideBar />
    </div>
    <div class="w-full">
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
