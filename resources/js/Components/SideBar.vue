<template>
  <div
    class="bg-[#fdf5cc] hidden flex-col items-center h-[calc(100%_-_30px)] py-[20px] border-r border-[#E0E0E0] left-0 mt-[15px] ml-[30px] rounded-xl shadow-[0_4px_6px_rgba(0,0,0,0.15)] min-[480px]:flex min-[480px]:w-[60px] min-[480px]:ml-[10px] min-[480px]:py-[10px] min-[480px]:px-0 z-40 sm:w-[80px] lg:w-[100px] lg:ml-[30px]"
  >
    <img
      src="/images/zizi.png"
      alt="StudyEZ Logo"
      class="w-[50px] md:w-[60px] lg:w-[80px]"
    />
    <nav class="flex flex-col items-center justify-between h-[100%]">
      <div class="grow flex flex-col justify-center items-center gap-4">
        <NavButton icon="home" color="#ce9e10" route="/dashboard" />
        <NavButton icon="plus" color="#3885a7" route="/" />
      </div>
      <router-link :to="'/profile'">
        <div class="pb-4">
          <img
            :src="profilePhoto"
            alt="Foto de perfil"
            class="flex justify-center items-center sm:w-[50px] sm:h-[50px] lg:w-[60px] lg:h-[60px] bg-[#ffffff] border-none rounded-[50%] text-[1.5rem] cursor-pointer mb-[10px] transition-all duration-300 hover:scale-110 min-[480px]:w-[40px] min-[480px]:h-[40px]"
          />
        </div>
      </router-link>
    </nav>
  </div>
</template>

<script>
import NavButton from './NavButton.vue';

export default {
  data() {
    return {
      profilePhoto: this.$page.props.auth.user.profile_photo
        ? '/' + this.$page.props.auth.user.profile_photo
        : '/images/default-avatar.png',
    };
  },

  components: {
    NavButton,
  },
};
</script>
