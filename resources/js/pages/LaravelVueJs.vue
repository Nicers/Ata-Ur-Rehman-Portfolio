<script setup>
import Task from '@/components/Task.vue';
import api from '@/axios';
import { ref, onMounted } from 'vue';

const projects = ref([]);
onMounted( async () => {
  try {
    const response = await api.get('/projects/laravel-vuejs');
    projects.value = response.data.projects;
  } catch (error) {
    console.log('Fetching error'+error);
  }
});
</script>

<template>
        <section class="project pt-5" style="background-color: black; color: white">
      <div class="container-fluid px-4">
        <div class="row pt-3">
          <div class="col-12 w-100 d-md-flex justify-content-md-center">
            <div class="box">
              <div class="title d-flex flex-column align-items-center mb-3">
                <h1 class="px-4 px-lg-5 text-center">
                  Laravel + Vue.Js PROJECTS
                </h1>
                <img src="../assets/images/line.png" alt="" />
              </div>
              <p class="px-0 px-sm-5">
                Welcome to my Laravel + Vue.js projects page! This section
                highlights the real world web applications I’ve built using the
                powerful combination of Laravel (backend) and Vue.js (frontend).
                These projects showcase my expertise in RESTful APIs, CRUD
                operations, component-based UIs, authentication systems, and
                dynamic dashboard interfaces. Explore this section to see how I
                build scalable, maintainable, and modern full stack applications
                that follow industry best practices.
              </p>
            </div>
          </div>
        </div>

        <div class="row pb-5 mt-5 px-3 px-sm-5">
          <Task v-for="project in projects" class="col-12 col-sm-4 h-auto mb-5 py-1" :title="project.title" :src="project.src" :site-path="project.sitePath" :is-git="project.isGit" :git-path="project.gitPath"/>
        </div>
      </div>
    </section>
</template>