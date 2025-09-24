<script setup>
import api from '@/axios';
import Task from '@/components/Task.vue';
import { ref, onMounted } from 'vue';

const projects = ref([]);
onMounted( async() => {
  try {
    const response = await api.get('/projects/python-aiml');
    projects.value = response.data.projects;
  } catch (error) {
    console.log('Fetching Error: '+error);
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
                PYTHON & AI/ML PROJECTS
              </h1>
              <img src="../assets/images/line.png" alt="" />
            </div>
            <p class="px-0 px-sm-5">
              Welcome to my Python & AI/ML projects page! This section
              highlights my passion and proficiency in Machine Learning, Deep
              Learning, and AI based problem solving using Python. These
              projects include work in image classification, NLP, data
              preprocessing, model training, and deployment using TensorFlow,
              Keras, Scikit-learn, and OpenCV. Each project represents my
              commitment to solving complex problems through intelligent
              systems and data driven models.
            </p>
          </div>
        </div>
      </div>

      <div class="row pb-5 mt-5 px-3 px-sm-5">
        <Task v-for="project in projects" class="col-12 col-sm-6 col-md-4 col-lg-3 h-auto mb-5 py-1"
          :title="project.title" :src="project.src" :site-path="project.sitePath" :is-git="project.isGit"
          :git-path="project.gitPath" />
      </div>
    </div>
  </section>
</template>