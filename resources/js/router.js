import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('./pages/Home.vue'),
    },
    {
        path: '/players/add',
        component: () => import('./pages/AddPlayers.vue'),
    },
    {
        path: '/line-up/add',
        component: () => import('./pages/AddLineup.vue'),
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
