<template>
  <div
    class="fixed inset-0 bg-black/90 z-50"
    :class="[show ? 'flex justify-center items-center' : 'hidden']"
  >
    <img src="/images/tube-spinner.svg" class="w-[100px]" alt="" />
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
      required: true,
      default: false,
    },
  },
};
</script>
