<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { RouterLink } from 'vue-router'

const isMobile = ref(window.innerWidth < 769)
const sidebar = ref(false)

const headerMenu = [
  { name: 'HOME', url: '' },
  { name: 'ABOUT US', url: 'aboutUs' },
  { name: 'RESUME', url: 'resume' },
  { name: 'PROJECTS', url: 'projects' },
  { name: 'CONTACT US', url: 'contactUs' }
]

// handle resize (reactive mobile/desktop check)
const handleResize = () => {
  isMobile.value = window.innerWidth < 769
}

onMounted(() => {
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  window.removeEventListener('resize', handleResize)
})

const open_sidebar = () => {
  sidebar.value = !sidebar.value
}

const searchText = ref('')

const search = () => {
  alert(`Please See this '${searchText.value}' in my Portfolio`)
}
</script>

<template>
  <header class="header py-3">
    <div class="container-fluid px-3 px-md-4">
      <div class="row">

        <!-- Logo -->
        <div class="col-3 col-md-2 d-flex justify-content-center align-items-center">
          <div class="logo">
            <img src="../assets/images/logo.png" @click="$router.push('/')" alt="Your Logo" />
          </div>
        </div>

        <!-- Center Menu / Search -->
        <div class="col-6 col-md-8 d-flex justify-content-center align-items-center" id="search_in">

          <!-- Desktop Menu -->
          <ul v-if="!isMobile" class="d-flex gap-3 gap-lg-5 m-0 p-0" id="ull">
            <li v-for="menu in headerMenu">
              <RouterLink :to="`/${menu.url}`">{{ menu.name }}</RouterLink>

            </li>
          </ul>

          <!-- Mobile Search -->
          <div v-else class="search w-100 d-flex">
            <input v-model="searchText" type="search" placeholder="Search here!" class="ps-3 w-75" />
            <button class="search_in py-3 px-4 w-25" @click="search">
              <i class="fas fa-search"></i>
            </button>
          </div>

        </div>

        <!-- Right Side (Search / Sidebar) -->
        <div class="col-3 col-md-2 d-flex justify-content-md-center justify-content-end align-items-center" id="tab_in">

          <!-- Desktop Search -->
          <div v-if="!isMobile" class="search w-100 d-flex">
            <input v-model="searchText" type="search" placeholder="Search here!" class="ps-3 w-75" />
            <button class="search_in py-3 px-4 w-25" @click="search">
              <i class="fas fa-search"></i>
            </button>
          </div>

          <!-- Mobile Sidebar -->
          <div v-else class="d-flex justify-content-md-center justify-content-end align-items-center">
            <div class="close w-100">
              <i :class="['fa', sidebar ? 'fa-close' : 'fa-bars', 'pe-1']" @click="open_sidebar"
                id="open_close_btn"></i>
            </div>

            <div v-show="sidebar" :class="['sidebar d-flex flex-column gap-5 ps-4 pe-4 pb-4', { open_side: sidebar }]">
              <RouterLink v-for="(item, index) in headerMenu" :key="`headerMenu-${index}`" :to="`/${item.url}`">
                {{ item.name }}
              </RouterLink>
            </div>






          </div>

        </div>
      </div>
    </div>
  </header>
</template>
