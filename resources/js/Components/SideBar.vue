<template>
  <div
    class="bg-[#fdf5cc] hidden flex-col items-center h-[calc(100%_-_30px)] py-[20px] border-r border-[#E0E0E0] left-0 mt-[15px] ml-[30px] rounded-xl shadow-[0_4px_6px_rgba(0,0,0,0.15)] min-[480px]:flex min-[480px]:w-[60px] min-[480px]:ml-[10px] min-[480px]:py-[10px] min-[480px]:px-0 z-40 sm:w-[80px] lg:w-[100px] lg:ml-[30px]"
  >
    <img
      src="/images/zizi.png"
      alt="StudyEZ Logo"
      class="w-[50px] md:w-[60px] lg:w-[80px]"
    />
    <nav class="flex flex-col items-center justify-center h-[100%]">
      <NavButton icon="home" color="#ce9e10" route="/dashboard" />
      <NavButton icon="plus" color="#3885a7" route="/" />
    </nav>
  </div>
</template>

<script>
import NavButton from './NavButton.vue';

export default {
  components: {
    NavButton,
  },
};
</script>
