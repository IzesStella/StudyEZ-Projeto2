<template>
  <button
    @click="goToRoute(route)"
    class="flex justify-center items-center sm:w-[50px] sm:h-[50px] lg:w-[60px] lg:h-[60px] bg-[#ffffff] border-none rounded-[50%] text-[1.5rem] cursor-pointer mb-[10px] transition-all duration-300 hover:scale-110 min-[480px]:w-[40px] min-[480px]:h-[40px]"
  >
    <font-awesome-icon :icon="icon" :style="{ color: color }" />
  </button>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
  props: {
    icon: {
      type: String,
      required: true,
      default: 'home',
    },
    color: {
      type: String,
      required: true,
      default: '#ce9e10',
    },
    route: {
      type: String,
      required: false,
      default: '/',
    },
  },

  methods: {
    goToRoute(route) {
      router.visit(route);
    },
  },
};
</script>
