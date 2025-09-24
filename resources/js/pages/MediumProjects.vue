<script setup>
import api from '@/axios';
import Task from '@/components/Task.vue';
import { ref, onMounted } from 'vue';

const projects = ref([]);
onMounted(async () => {
  try {
    const response = await api.get('/projects/medium');
    projects.value = response.data.projects;
  } catch (error) {
    console.log('Fetching Error: '+error);
  }
});
</script>

<template>
  <section class="project pt-5" style="background-color: black; color: white">
    <div class="container-fluid px-0 px-lg-4">
      <div class="row pt-3">
        <div class="col-12 w-100 d-md-flex justify-content-md-center">
          <div class="box">
            <div class="title d-flex flex-column align-items-center mb-3">
              <h1 class="px-4 px-lg-5 text-center">
                My Medium Level Projects
              </h1>
              <img src="../assets/images/line.png" alt="" />
            </div>
            <p class="px-4 px-lg-5">
              Welcome to my medium level projects page! This section features
              a collection of projects where I exhibit my growing proficiency
              in HTML, CSS, JavaScript, Vue.js, Laravel, Bootstrap, Tailwind
              CSS, and PHP. These projects focus on creating clean, effective,
              and visually appealing web solutions. Take a look to see how I
              combine creativity and functionality to deliver well-rounded,
              quality-driven work.
            </p>
          </div>
        </div>
      </div>

      <div class="row pb-5 mt-5 px-3 px-lg-5">
        <Task v-for="project in projects" class="col-12 col-sm-6 col-md-4 col-lg-3 h-auto mb-5 py-1"
          :title="project.title" :src="project.src" :site-path="project.sitePath" :is-git="project.isGit"
          :git-path="project.gitPath" />
      </div>
    </div>
  </section>

</template>