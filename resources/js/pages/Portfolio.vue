<script setup>
import api from '@/axios';
import Task from '@/components/Task.vue';
import { ref, onMounted } from 'vue';

const projects = ref([]);
onMounted(async () => {
  try {
    const response = await api.get('projects/portfolio');
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
                <h1>My Portfolio Projects</h1>
                <img src="../assets/images/line.png" alt="" />
              </div>
              <p class="px-4 px-lg-5">
                Welcome to my portfolio projects page! This section features a
                carefully curated selection of my best work across various
                technologies. Each project represents my ability to create
                polished, professional web solutions with attention to detail,
                user experience, and performance. Dive into this section to
                discover the quality, creativity, and expertise I bring to every
                project.
              </p>
            </div>
          </div>
        </div>

        <div class="row pb-5 mt-5 px-3 px-lg-5">
           <Task v-for="project in projects" class="col-12 col-sm-6 col-lg-4 h-auto mb-5 py-1" :title="project.title"
          :src="project.src" :site-path="project.sitePath" :is-git="project.isGit" :git-path="project.gitPath" />
        </div>
      </div>
    </section>
</template>