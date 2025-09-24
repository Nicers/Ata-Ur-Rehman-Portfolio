<script setup>
import { computed } from 'vue';

const props = defineProps({
  class: String,
  title: String,
  src: String,
  sitePath: String,
  gitPath: String,
  isGit: Boolean
});

const isExternal = computed(() => /^https?:\/\//.test(props.sitePath));

</script>

<template>
  <div :class="props.class">
    <div class="p-row2 h-100 position-relative">
      <a target="_blank" href="#" class="h-100 d-flex flex-column align-items-center justify-content-between"><img
          class="w-100" :src="props.src" alt="" />
        <p class="py-3 m-0 px-1 text-center">
          {{ props.title }}
        </p>
      </a>
      <div class="overlay"></div>

      <div class="projectButton d-flex flex-xl-row flex-sm-column gap-xl-3 gap-sm-2 gap-3">
        <a v-if="isExternal" class="px-3 py-2" :href="props.sitePath" target="_blank" rel="noopener noreferrer">
          Visit Site
          <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </a>

        <RouterLink v-else :to="{ path: props.sitePath }" class="px-3 py-2">
          <button class="px-3 py-2">
            Visit Site
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
          </button>
        </RouterLink>

        <a v-if="isGit" class="px-3 py-2" :href="props.gitPath" target="_blank" rel="noopener noreferrer">
          Check Github
          <i class="fa-brands fa-square-github"></i>
        </a>
      </div>

    </div>
  </div>
</template>