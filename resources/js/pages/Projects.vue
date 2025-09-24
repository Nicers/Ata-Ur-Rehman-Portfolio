<script setup>
import Task from '@/components/Task.vue';
// const projects = [
//   {
//     title: "Laravel + Vue.Js Projects",
//     src: "images/netflix.png",
//     sitePath: "laravelVueJs",
//     gitPath: '',
//     isGit: false,
//   },
//   {
//     title: "Python & AI/ML Projects",
//     src: "images/python&AI&Ml.webp",
//     sitePath: "pythonAiMl",
//     gitPath: '',
//     isGit: false,
//   },
//   {
//     title: "6 Live WordPress Websites",
//     src: "images/wordpress.jpg",
//     sitePath: "wordpress",
//     gitPath: '',
//     isGit: false,
//   },
//   {
//     title: "Music Shop Website",
//     src: "images/m2.jpg",
//     sitePath: "https://musics-web.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/041d3d6ec74606dd24c04b4b12023feba450aee1/My%20Advanced%20Level%20Projectss/Music%20Website',
//     isGit: true,
//   },
//   {
//     title: "Netflix Dynamic + Responsive",
//     src: "images/netflix.png",
//     sitePath: "laravelVueJs",
//     gitPath: 'https://netflixesdynamic.000webhostapp.com/index.php',
//     isGit: true,
//   },
//   {
//     title: "Food shop Website",
//     src: "images/food.jpg",
//     sitePath: "https://shop-nicer.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/dedec62cb7c7098d569526de640e3ec55441c8fd/My%20Advanced%20Level%20Projectss/Foods%20Website',
//     isGit: true,
//   },
//   {
//     title: "Ball Game Website",
//     src: "images/Advance/ball.png",
//     sitePath: "https://balloutgame.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Ball%20Game',
//     isGit: true,
//   },
//   {
//     title: "Online Shopping Website",
//     src: "images/Advance/shop.jpg",
//     sitePath: "https://proshopcart.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/d9d84b982f074bc88acc0a5f53fe6cd74aad25e9/My%20Advanced%20Level%20Projectss/Shopping%20Website',
//     isGit: true,
//   },
//   {
//     title: "Quiz Website",
//     src: "images/Advance/quiz.png",
//     sitePath: "https://quizm.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Quiz%20App',
//     isGit: true,
//   },
//   {
//     title: "TodoList CRUD Operation",
//     src: "images/Advance/todolist.png",
//     sitePath: "https://nicer-todolist.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/To-Do-List%20CRUD%20Operation',
//     isGit: true,
//   },
//   {
//     title: "Instagram Story App",
//     src: "images/Advance/instagram.jpeg",
//     sitePath: "https://instastorys.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Instagram%20Story',
//     isGit: true,
//   },
//   {
//     title: "Currency Converter App",
//     src: "images/Advance/currency3.jpg",
//     sitePath: "https://currenccy-converter.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/CurrencyConverter.html',
//     isGit: true,
//   },
//   {
//     title: "User Money Manager App",
//     src: "images/Advance/user.png",
//     sitePath: "https://useruse.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/User%20Money%20Manager.html',
//     isGit: true,
//   },
//   {
//     title: "Counter Timer App",
//     src: "images/Advance/timer.jpg",
//     sitePath: "https://counterdowne.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/counterDown.html',
//     isGit: true,
//   },
//   {
//     title: "Advance Calculator",
//     src: "images/Advance/calculator.jpg",
//     sitePath: "https://nicercalculation.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/c6401681e4b27e91244e4600cee6dc69799a4cd6/My%20Advanced%20Level%20Projectss/Calculator%20Advance',
//     isGit: true,
//   },
//   {
//     title: "Review CaraSoul",
//     src: "images/Advance/review.png",
//     sitePath: "https://review-carousell.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Reviews%20Carousel',
//     isGit: true,
//   },
//   {
//     title: "Animated SideBar",
//     src: "images/Advance/sidebar.jpg",
//     sitePath: "https://sidebar-animate.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/SideBar%20with%20Animation',
//     isGit: true,
//   },
//   {
//     title: "NavBar Collapse",
//     src: "images/Advance/navbar.jpg",
//     sitePath: "https://navbarcollapse.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/NavBar%20Collapse',
//     isGit: true,
//   },
//   {
//     title: "Hotel Management System",
//     src: "images/Advance/hotel.jpg",
//     sitePath: "https://hotelas.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Hotel%20Management%20System',
//     isGit: true,
//   },
//   {
//     title: "Responsive Website",
//     src: "images/Advance/responsivewebsite.jpg",
//     sitePath: "https://responsivewebsit.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Responsive%20Website',
//     isGit: true,
//   },
//   {
//     title: "Books Website",
//     src: "images/Advance/navbar.jpg",
//     sitePath: "https://nicer-portfolio.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Book%20Project',
//     isGit: true,
//   },
//   {
//     title: "Final Year Website Design",
//     src: "images/Advance/finalyear.jpg",
//     sitePath: "https://finalyears.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Final%20Year%20project%20design.html',
//     isGit: true,
//   },
//   {
//     title: "Responsive Netflix Website",
//     src: "images/Advance/netflix1.png",
//     sitePath: "https://movie-see.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/781e3b1e1b8bd4f76ff9cc3753f803416a191146/My%20Advanced%20Level%20Projectss/Netflix%20Responsive',
//     isGit: true,
//   },
//   {
//     title: "Employee ID Card",
//     src: "images/Medium/card.jpg",
//     sitePath: "https://identitycard.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Company%20Card',
//     isGit: true,
//   },
//   {
//     title: "Advanced Quiz App",
//     src: "images/Medium/quiz1.png",
//     sitePath: "https://quizad.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Advance%20Quiz%20App',
//     isGit: true,
//   },
//   {
//     title: "Counter App",
//     src: "images/Medium/timer.jpg",
//     sitePath: "https://counter-appe.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Counter%20App',
//     isGit: true,
//   },
//   {
//     title: "Login Page",
//     src: "images/Medium/login.png",
//     sitePath: "https://loginens.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Login%20Page',
//     isGit: true,
//   },
//   {
//     title: "Responsive NavBar",
//     src: "images/Medium/navbar.png",
//     sitePath: "https://responsive-navbaar.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Responsive%20NavBar',
//     isGit: true,
//   },
//   {
//     title: "Responsive Shopping Card1",
//     src: "images/Medium/shop2.png",
//     sitePath: "https://redditcard.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Responsive%20Shopping%20Cards/Card-1.html',
//     isGit: true,
//   },
//   {
//     title: "Responsive Shopping Card2",
//     src: "images/Medium/shop1.png",
//     sitePath: "https://femaleshop.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Responsive%20Shopping%20Cards/Card-2.html',
//     isGit: true,
//   },
//   {
//     title: "Calculator App",
//     src: "images/Medium/calculator.png",
//     sitePath: "https://calculatormed.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/Calculator.html',
//     isGit: true,
//   },
//   {
//     title: "MicroSoft Clone",
//     src: "images/Medium/microsoft.jpg",
//     sitePath: "https://microsoft.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/6d0007ad68c413b83e3d532cf0fd567a4e6ca56e/My%20Medium%20Level%20Projects/Microsoft%20Clone',
//     isGit: true,
//   },
//   {
//     title: "Animated Card",
//     src: "images/Medium/animatedCard.png",
//     sitePath: "https://animate-card.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/3b90a2ead4c1458fd53a9639a1d7b0af732d35d0/Tailwind%20CSS/AnimatedCard',
//     isGit: true,
//   },
//   {
//     title: "About Us",
//     src: "images/Medium/about.jpg",
//     sitePath: "https://about-sus.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/3b90a2ead4c1458fd53a9639a1d7b0af732d35d0/Tailwind%20CSS/About%20Us%20Tailwind',
//     isGit: true,
//   },
//   {
//     title: "Card Design",
//     src: "images/Medium/cardDesign.png",
//     sitePath: "https://card-designs.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/3b90a2ead4c1458fd53a9639a1d7b0af732d35d0/Tailwind%20CSS/Card%20Design',
//     isGit: true,
//   },
//   {
//     title: "Shopping Data Display1",
//     src: "images/Medium/shopData.png",
//     sitePath: "https://shopdata-ajax.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/ShopDataUsing%20AJAX.html',
//     isGit: true,
//   },
//   {
//     title: "Shopping Data Display2",
//     src: "images/Medium/shopData2.png",
//     sitePath: "https://shopdata-json.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/f60736ee12cdab97c9a5c008ea687b17471ac6c1/My%20Medium%20Level%20Projects/ShopData%20Display',
//     isGit: true,
//   },
//   {
//     title: "Custom Cursor",
//     src: "images/Medium/cursor.jpg",
//     sitePath: "https://customcursors.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/f60736ee12cdab97c9a5c008ea687b17471ac6c1/My%20Medium%20Level%20Projects/customCursor.html',
//     isGit: true,
//   },
//   {
//     title: "Animated SideBar",
//     src: "images/Medium/siderbar1.png",
//     sitePath: "https://animsider.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/f60736ee12cdab97c9a5c008ea687b17471ac6c1/My%20Medium%20Level%20Projects/siderbar.html',
//     isGit: true,
//   },
//   {
//     title: "Dynamic Form",
//     src: "images/Medium/form.png",
//     sitePath: "https://ata-marwat.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/submission%20form.html',
//     isGit: true,
//   },
//   {
//     title: "Facebook Friend Btn",
//     src: "images/Medium/friend.png",
//     sitePath: "https://addfriendbtn.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/blob/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/addFreindBtn.html',
//     isGit: true,
//   },
//   {
//     title: "Advanced Text Hover",
//     src: "images/Medium/hover.png",
//     sitePath: "https://texthoveeffect.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/Text%20Hover',
//     isGit: true,
//   },
//   {
//     title: "Model Project",
//     src: "images/Medium/model.png",
//     sitePath: "https://modelprojects.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/Modal%20Project',
//     isGit: true,
//   },
//   {
//     title: "Static Movie App",
//     src: "images/Medium/movie.jpg",
//     sitePath: "https://moviefirst.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/41a72cc59c87ddc86d8f515360ca5522e26af289/My%20Medium%20Level%20Projects/Static%20Movie',
//     isGit: true,
//   },
//   {
//     title: "User Profile JSON Server",
//     src: "images/Medium/profile.png",
//     sitePath: "https://userprofile-json-server.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/User%20Profile%20JSON%20SERVER',
//     isGit: true,
//   },
//   {
//     title: "Instagram Like Btn",
//     src: "images/Medium/instalike.png",
//     sitePath: "https://instaslike.netlify.app",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/InstaLike',
//     isGit: true,
//   },
//   {
//     title: "HTML & CSS CV",
//     src: "images/Medium/cv.png",
//     sitePath: "https://htmlcvs.netlify.app/",
//     gitPath: 'https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/HTML%20CV',
//     isGit: true,
//   },
//   {
//     title: "Website Layout",
//     src: "images/Medium/website.png",
//     sitePath: "https://wblayout.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/fab21fc3063269f87b8dafeb77f6f052f16fecb8/My%20Medium%20Level%20Projects/Website%20Layout",
//     isGit: true,
//   },
//   {
//     title: "Sticky Navigation",
//     src: "images/Medium/stickey-navbar.png",
//     sitePath: "https://navbar-stickey.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/sticky-navigation",
//     isGit: true,
//   },
//   {
//     title: "Advance Random Color",
//     src: "images/Medium/background.png",
//     sitePath: "https://random-backgrounds.netlify.app",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/Random%20Background%20Color",
//     isGit: true,
//   },
//   {
//     title: "Js SideBar",
//     src: "images/Medium/sidebar2.png",
//     sitePath: "https://sidebar-display.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/blob/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/Hide%20%26%20Display%20SideBar.html",
//     isGit: true,
//   },
//   {
//     title: "String Task",
//     src: "images/Medium/stringTask.png",
//     sitePath: "https://string-task.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/blob/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/stringTask.html",
//     isGit: true,
//   },
//   {
//     title: "Random Paragraph",
//     src: "images/Medium/Prandom.png",
//     sitePath: "https://htmlcvs.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/Random%20Paragraph",
//     isGit: true,
//   },
//   {
//     title: "Random Background",
//     src: "images/Medium/bgRandom.png",
//     sitePath: "https://htmlcvs.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/60f96f3e9db630cf2e60a6b03f9cfaf612665bf4/My%20Medium%20Level%20Projects/Random%20Color",
//     isGit: true,
//   },
//   {
//     title: "8+ Task More",
//     src: "images/Medium/task.jpg",
//     sitePath: "",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/692512393b7d2502dfb14a9d6ddf27c2e0a25444/My%20Medium%20Level%20Projects/HTML%20%2B%20CSS%20%2B%20JS",
//     isGit: true,
//   },
//   {
//     title: "Crypto Website",
//     src: "images/beginner/cryptos.jpg",
//     sitePath: "https://cryptos-me.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/3b90a2ead4c1458fd53a9639a1d7b0af732d35d0/My%20Beginner%20Level%20Projects/Crypto%20Layout",
//     isGit: true,
//   },
//   {
//     title: "Business Website",
//     src: "images/beginner/business.jpg",
//     sitePath: "https://businessses.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/fef496b867aa4ffc6bfa66a5f70825cd812e94d5/My%20Beginner%20Level%20Projects/project%201",
//     isGit: true,
//   },
//   {
//     title: "Basic NavBar",
//     src: "images/beginner/navbar.png",
//     sitePath: "https://nav-barss.netlify.app/",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/fef496b867aa4ffc6bfa66a5f70825cd812e94d5/My%20Beginner%20Level%20Projects/project%208",
//     isGit: true,
//   },
//   {
//     title: "10+ Projects More",
//     src: "images/beginner/project.jpg",
//     sitePath: "",
//     gitPath: "https://github.com/Nicers/All-Projects/tree/fef496b867aa4ffc6bfa66a5f70825cd812e94d5/My%20Beginner%20Level%20Projects",
//     isGit: true,
//   }
// ];

import api from '@/axios';
import { ref, onMounted } from 'vue';
const projects = ref([]);

const pushData = (tag, data) => {
  data.forEach(project => {
     tag == 'home' ? ((project.id == 6 || project.id==8 || project.id ==9) ?
      projects.value.push(project): {}) : projects.value.push(project);});
console.log(projects.value);
  }
   

onMounted(async () => {
  try {
   const response1 = await api.get('projects/home');
   pushData('home', response1.data.projects);
   
   const response2 = await api.get('projects/advance');
   pushData('advance', response2.data.projects);
   
   const response3 = await api.get('projects/medium');
   pushData('medium', response3.data.projects);
   
   const response4 = await api.get('projects/beginer');
   pushData('beginer', response4.data.projects);
  } catch (error) {
    console.log('Fetching Error: '+error);
  }
});
</script>

<template>
  <section class="project pt-5" style="background-color: black; color: white;">
    <div class="container-fluid px-0 px-lg-4">
      <div class="row pt-3">
        <div class="col-12 w-100 d-md-flex justify-content-md-center">
          <div class="box">
            <div class="title d-flex flex-column align-items-center mb-3">
              <h1 class="px-4 px-lg-5 text-center">My All Projects</h1>
              <img src="../assets/images/line.png" alt="" />
            </div>
            <p class="px-4 px-lg-5">
              My portfolio covers a wide range of projects from frontend
              designs to backend APIs, and from classic web solutions to
              cutting edge AI systems.
              <br />
              <b>1. Web Projects:</b><br />
              See dynamic and fully functional web solutions like e-commerce
              platforms and intuitive user interfaces.
              <br />
              <b>2. AI/ML Projects:</b> <br />
              Discover projects demonstrating my proficiency in Python,
              TensorFlow, Keras, and scikit-learn such as Skin Cancer
              Detection, Thyroid Cancer Image Segmentation, Image
              classification and sentiment analysis with Python etc.

              <br /><b>3. WordPress & CMS Solutions:</b><br />
              Explore my expertise in customizing themes and designing
              responsive, user-friendly websites with WordPress.
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