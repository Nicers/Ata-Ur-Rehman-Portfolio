<script setup>
import Task from '@/components/Task.vue';
import api from '../axios';
import { ref, onMounted } from 'vue';

const sections = ref([]);
const projects = ref([]);
onMounted(async () => {
  try {
    const response = await api.get('/projects/home');
    projects.value = response.data.projects;

    const response2 = await api.get('home-section');
    // console.log(response2.data);
    
    sections.value = response2.data.sections;
    // console.log(sections.value);
    // section.value = response2.data.hero;

  } catch (error) {
    console.log('Fetching error')
  }
});

</script>

<template>

<template v-for="section in sections">

  <section v-if="section.type == 'hero'" class="home py-5">
    <div class="container-fluid px-4 px-md-5">
      <div class="row">
        <div class="col-12 col-xxl-10 ps-md-5">
          <div class="box w-100 mb-4 mb-sm-5">
            <br />
            <h1>
             {{ section.data.title }}
            </h1>
            <br />
            <p>
              {{ section.data.description }}
            </p>
            <div class="position-relative pt-3 pb-2 pb-sm-5">
              <div id="typing">
                {{ section.data.moving_txt1 }} <span> {{ section.data.moving_txt2 }}</span>
              </div>
              <div id="crow">|</div>
            </div>
            <br /><br /><br />
            <div class="pt-sm-3 d-flex flex-column flex-sm-row gap-5 gap-sm-3 flex-wrap">
              <RouterLink v-for="btn in section.data.buttons" :to="`/${btn.url}`" 
                class="btn btn-warning rounded text-decoration-none text-center fs-md-1 py-2 py-lg-3 px-4">{{ btn.label }}</RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section v-if="section.type == 'about'" class="about py-5">
    <div class="container-fluid px-4 pb-5">
      <div class="row pb-5">
        <div class="col-12">
          <div class="box pt-4 w-100 d-flex flex-column justify-content-center align-items-center">
            <div class="title d-flex flex-column align-items-center">
              <h1>{{ section.data.title }}</h1>
              <img src="../assets/images/line.png" alt="" />
            </div>
            <div class="box1 d-md-flex mt-5 py-5 p-3 p-md-5">
              <img :src="section.data.image" alt="" class="mb-4" />
              <div class="about-content d-flex flex-column align-items-center align-items-md-start ps-md-5 w-100">
                <div>
                  <div>
                    <h3 class="text-dark fw-bold">{{ section.data.sub_title }}</h3>
                    <p style="width: 6rem; height: 5px; background: #f1d118"></p>
                  </div>
                  <p>
                    {{ section.data.description }}
                  </p>
                </div>
                <RouterLink :to="section.data.button_url">
                  <button class="mt-4 py-3 px-5 sameButton">
                    {{ section.data.button_txt }}
                  </button>
                </RouterLink>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section v-if="section.type == 'project_section'" class="project py-5 bg-black text-white h-auto">
    <div class="container-fluid px-0 px-lg-4 pb-5">
      <div class="row pt-3">
        <div class="col-12 w-100 d-md-flex justify-content-md-center">
          <div class="box">
            <div class="title d-flex flex-column align-items-center mb-3">
              <h1 class="px-4 px-lg-5 text-center">{{ section.data.title }}</h1>
              <img src="../assets/images/line.png" alt="" />
            </div>
            <br />
            <p class="px-4 px-sm-5">
              {{ section.data.description }}
              <br />
              <template v-for="item in section.data.title_descs">
                <b>{{ item.title }}</b><br />
                {{ item.description }}
                <br />
              </template>
            </p>
          </div>
        </div>
      </div>
  
      <div class="row pb-5 mt-3 px-3 px-lg-5">
        <Task v-for="(project, index) in projects" class="col-12 col-sm-6 col-lg-4 h-auto py-1 mb-5"
          :title="project.title" :src="project.src" :site-path="project.sitePath" :is-git="project.isGit"
          :git-path="project.gitPath" />
      </div>
      <RouterLink :to="section.data.button_url" class="text-decoration-none">
        <button class="mt-4 py-3 px-5 sameButton" style="display: block; margin: auto">{{ section.data.button_txt }}</button>
      </RouterLink>
    </div>
  </section>

  <section v-if="section.type == 'contact_section'" class="contact py-5">
  <div class="container-fluid px-3 px-sm-4 pb-5">
    <div class="row pt-3">
      <div class="col-12 w-100 d-md-flex justify-content-md-center">
        <div class="box">
          <div class="title d-flex flex-column align-items-center mb-3">
            <h1>{{section.data.title}}</h1>
            <img src="../assets/images/line.png" alt="" />
          </div>
          <p class="px-0 px-sm-5">
           {{ section.data.description }}
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-center w-100">
        <div class="form d-flex flex-column align-items-center py-4 mt-3 w-100">
          <div class="c-one d-flex flex-sm-row flex-column justify-content-center gap-3 gap-sm-4 mb-5 mb-sm-4">
            <a :href="section.data.location_url"
              class="d-flex justify-content-sm-center align-items-center"><i class="fa-solid fa-location-dot"></i>
              &nbsp; {{ section.data.location_txt }}</a>
            <a :href="'mailto:'+ section.data.email" class="d-flex justify-content-sm-center align-items-center"><i
                class="fa-solid fa-envelope"></i> &nbsp;
              {{ section.data.email }}</a>
            <a :href="'tel:'+section.data.phone" class="d-flex justify-content-sm-center align-items-center"><i
                class="fa-solid fa-phone"></i> &nbsp; {{ section.data.phone }}</a>
          </div>

          <form action="https://formspree.io/f/mrgnwngl" method="POST"
            class="d-flex flex-column gap-4 align-items-center">
            <div class="f-one d-flex flex-sm-row flex-column gap-3 w-100">
              <div id="one" class="w-100">
                <label for="">Your Name</label><br /><input class="ps-3 w-100" type="text"
                  placeholder="E.g. Ata Ur Rehman" name="UserName" />
              </div>
              <div id="two" class="w-100">
                <label for="">Email</label><br /><input class="ps-3 w-100" type="email"
                  placeholder="E.g. info@gmail.com" name="Email" required />
              </div>
            </div>
            <div class="f-one d-flex flex-sm-row flex-column gap-3 w-100">
              <div id="one" class="w-100">
                <label for="">Phone Number</label><br /><input class="ps-3 w-100" type="tel"
                  placeholder="E.g. +923404556573" name="Phone Number" required />
              </div>
              <div id="two" class="w-100">
                <label for="">Subject</label><br /><input class="ps-3 w-100" type="text"
                  placeholder="E.g. Project Name" />
              </div>
            </div>
            <div id="four" class="w-100">
              <label for="">Message</label><br /><textarea class="ps-3 w-100" cols="30" rows="10" name="Message"
                placeholder="E.g. I need a help in Coding" required></textarea>
            </div>
            <input type="submit" class="px-4" :value="section.data.button_txt" />
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</template>

<section class="resume py-5">
  <div class="container-fluid px-4 pb-5">
    <div class="row pt-3">
      <div class="col-12 w-100 d-md-flex justify-content-md-center">
        <div class="box">
          <div class="title d-flex flex-column align-items-center mb-3">
            <h1>RESUME</h1>
            <img src="../assets/images/line.png" alt="" />
          </div>
          <p class="px-0 px-sm-5">
            Explore My Journey! Discover my comprehensive professional
            background, diverse skills, and key accomplishments. My resume
            highlights my expertise as a versatile software engineer, with a
            strong focus on both full stack web development (Laravel,
            Vue.js) and cutting edge AI/Machine Learning/Deep Learning. Dive
            into my qualifications to see how I can contribute to your next
            project or development team.
          </p>
        </div>
      </div>
    </div>
    <button class="mt-4 mx-0 mx-sm-5 py-2 py-sm-3 px-2 px-sm-3 sameButton"
      onclick="window.location.href='Ata_Ur_Rehman_Resume.pdf'">
      Download Complete CV
    </button>

    <div class="row px-0 px-sm-5 py-3">
      <div class="col-lg-6">
        <h3 class="resume-title">Education</h3>
        <div class="resume-item">
          <h4>BSC Software Engineering</h4>
          <h5>2021 - 2025</h5>
          <p><em>University Of Science & Technology, Bannu</em></p>
          <p>Position: 3.86/4.00 CGPA</p>
        </div>
        <div class="resume-item">
          <h4>FSC Pre Engineering</h4>
          <h5>2019 - 2021</h5>
          <p><em>Government Post Graduate College, Lakki Marwat</em></p>
          <p>Position: 814/1100 Marks</p>
        </div>
        <div class="resume-item">
          <h4>Matric - Lakki &nbsp; Marwat</h4>
          <h5>2017 - 2019</h5>
          <p><em>Tajori Model School, Lakki Marwat</em></p>
          <p>Position: 903/1100 Marks</p>
        </div>

        <h3 class="resume-title">Hard Skills</h3>
        <div class="resume-item">
          <h4>Languages</h4>
          <ul>
            <li>
              <p>HTML</p>
              <p>CSS</p>
              <p>JavaScript</p>
              <p>PHP</p>
              <p>Python</p>
            </li>
          </ul>
          <h4>Frameworks & Libraries</h4>
          <ul>
            <li>
              <p>Laravel</p>
              <p>Vue Js</p>
              <p>Inertia Js</p>
              <p>Tailwind CSS</p>
              <p>Bootstrap</p>
              <p>WordPress</p>
              <p>Deep Learning(TensorFlow,Keras,PyTorch)</p>
              <p>
                Machine
                Learning(scikit-learn,NumPy,Pandas,Matplotlib,Seaborn)
              </p>
              <p>Computer Vision(OpenCV)</p>
              <p>Natural Language Processing (NLP): NLTK, SpaCy</p>
            </li>
          </ul>
          <h4>Tools</h4>
          <ul>
            <li>
              <p>Git</p>
              <p>GitHub</p>
              <p>Postman</p>
              <p>Google Colab</p>
              <p>Jupyter Notebook</p>
            </li>
          </ul>
          <h4>Concepts</h4>
          <ul>
            <li>
              <p>SDLC(Software Development Life Cycle)</p>
              <p>REST API</p>
              <p>OOP</p>
              <p>MVC</p>
              <p>Data Preprocessing</p>
              <p>
                Machine Learning Algorithms ( Regression, Classification,
                KNN, SVMs etc)
              </p>
              <p>Deep Learning Architectures (CNNs, RNNs, LSTMs)</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <h3 class="resume-title">Professional Experience</h3>
        <div class="resume-item">
          <h4>Laravel + Vue.js Website Development Internship</h4>
          <h5>Jun 2024 - Oct 2024</h5>
          <p>
            <em>SoftGear Software House Rawalpindi, PK | Duration: 3
              months</em>
          </p>
          <ul>
            <b> Key responsibilities: </b>
            <li>
              <p>
                Developed dynamic and responsive websites using Vue.js and
                Laravel frameworks.
              </p>
            </li>
            <li>
              <p>
                Developed 5+ RESTful CRUD APIs and integrated with Vue.js
                frontend
              </p>
            </li>
            <li>
              <p>Used Inertia.js for SPA functionality</p>
            </li>
            <li>
              <p>
                Implemented modern UI designs with Bootstrap and Tailwind
                CSS.
              </p>
            </li>
            <li>
              <p>
                Built and maintained efficient, reusable, and reliable code
                using HTML, CSS, and JavaScript.
              </p>
            </li>
          </ul>
        </div>
        <div class="resume-item">
          <h4>Website Development InternShip</h4>
          <h5>June 2023 - September 2023</h5>
          <p>
            <em>Logics Buffer Software House Rawalpindi | Duration: 3
              months</em>
          </p>
          <ul>
            <b> Key responsibilities: </b>
            <li>
              <p>
                Developed and maintained websites for small businesses using
                HTML, CSS, JavaScript, and WordPress.
              </p>
            </li>
            <li>
              <p>Customized WordPress themes and plugins.</p>
            </li>
            <li>
              <p>Created responsive and mobile friendly designs.</p>
            </li>
            <li>
              <p>Learned and applied off page SEO techniques backlinks.</p>
            </li>
            <li>
              <p>Optimized website performance</p>
            </li>
          </ul>
        </div>
        <div class="resume-item">
          <h4>Courses & Certifications</h4>
          <h5>Web Development</h5>
          <ul>
            <li>
              <b>1. <em> Website development Certificate</em></b>
              <ul>
                <p>
                  Logics Buffer Software House Rawalpindi, Pk <br />
                  Duration: 3 months
                </p>
              </ul>
            </li>
            <li>
              <b>2. <em> Laravel & Vue.Js Courses</em></b>
              <ul>
                <p>Completed from official website documentation</p>
              </ul>
            </li>
            <li>
              <b>3. <em> HTML & CSS & Js Courses</em></b>
              <ul>
                <p>Yahoo Baba youtube Channel & W3 School Website</p>
              </ul>
            </li>
          </ul>
          <h5>AI/ML/DL</h5>
          <ul>
            <li>
              <b>1. <em> Advance Python (AI and ML and DL) Course</em></b>
              <ul>
                <p>
                  NAVTTC Bannu, Pakistan | March 2025 - June 2025 <br />
                  Duration: 3 months
                </p>
              </ul>
            </li>
            <li>
              <b>2. <em> University Coursework in AI/ML/DL</em></b>
              <ul>
                <p>
                  Machine Learning (7th Semester) <br />
                  Deep Learning (8th Semester) <br />
                  Python Programming (2nd Semester)
                </p>
              </ul>
            </li>
            <li>
              <b>3. <em> Python & AI/ML Seminar Certificate</em></b>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>





</template>