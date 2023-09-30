import { createRouter, createWebHistory } from 'vue-router';
import StudentsManagement from './views/StudentsManagement.vue';
import CoursesManagement from './views/CoursesManagement.vue';
import AddStudent from './views/AddStudent.vue';
import EditStudent from './views/EditStudent.vue';
import CourseDetails from './views/CourseDetails.vue';

const routes = [
    // { path: '/', component: Home },
    // { path: '/about', component: About },
    { path: '/students', component: StudentsManagement },
    { path: '/students/:id', component: EditStudent },
    { path: '/add_student', component: AddStudent },
    { path: '/courses', component: CoursesManagement },
    { path: '/courses/:id', component: CourseDetails },
  ];

  const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
  });

  export default router;
