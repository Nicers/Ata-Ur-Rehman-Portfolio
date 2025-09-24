import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import Resume from './pages/Resume.vue';
import Projects from './pages/Projects.vue';
import AboutUs from './pages/AboutUs.vue';
import ContactUs from './pages/ContactUs.vue';
import laravelVueJs from './pages/LaravelVueJs.vue';
import pythonAiMl from './pages/pythonAiMl.vue';
import WordPress from './pages/WordPress.vue';
import AdvanceProjects from './pages/AdvanceProjects.vue';
import MediumProjects from './pages/MediumProjects.vue';
import BeginerProjects from './pages/BeginerProjects.vue';
import SemesterProjects from './pages/SemesterProjects.vue';
import Portfolio from './pages/Portfolio.vue';


const routes=[
    {
        path: '/',
        component: Home
    },
    {
        path: '/resume',
        component: Resume
    },
    {
        path: '/projects',
        component: Projects
    },
    {
        path: '/aboutUs',
        component: AboutUs
    },
    {
        path: '/contactUs',
        component: ContactUs
    },
    {
        path: '/laravelVueJs',
        component: laravelVueJs
    },
    {
        path: '/pythonAiMl',
        component: pythonAiMl
    },
    {
        path: '/wordpress',
        component: WordPress
    },
    {
        path: '/advanceProjects',
        component: AdvanceProjects
    },
    {
        path: '/mediumProjects',
        component: MediumProjects
    },
    {
        path: '/beginerProjects',
        component: BeginerProjects
    },
    {
        path: '/semesterProjects',
        component: SemesterProjects
    },
    {
        path: '/portfolio',
        component: Portfolio
    },
];

export const router = createRouter({
    history: createWebHistory(),
    routes
});