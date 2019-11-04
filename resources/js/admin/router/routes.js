
// import dashboard from './modules/dashboard';
// import form from './modules/form';
// import list from './modules/list';
// import search from './modules/search';
// import profile from './modules/profile';
// import result from './modules/result';
// import exception from './modules/exception';
// import setting from './modules/setting';
// import editor from './modules/editor';
// import tool from './modules/tool';

// import BasicLayout from '@/layouts/basic-layout';

/**
 * 在主框架内显示
 */

const frameIn = [
    {
        path: '/',
        component: () => import('@admin/views/dashboard')
    }
];

/**
 * 在主框架之外显示
 */

const frameOut = [

];

/**
 * 错误页面
 */

const errorPage = [
    // {
    //     path: '/403',
    //     name: '403',
    //     meta: {
    //         title: '403'
    //     },
    //     component: () => import('@/pages/system/error/403')
    // },
    // {
    //     path: '/500',
    //     name: '500',
    //     meta: {
    //         title: '500'
    //     },
    //     component: () => import('@/pages/system/error/500')
    // },
    // {
    //     path: '*',
    //     name: '404',
    //     meta: {
    //         title: '404'
    //     },
    //     component: () => import('@/pages/system/error/404')
    // }
];

// 导出需要显示菜单的
export const frameInRoutes = frameIn;

// 重新组织后导出
export default [
    ...frameIn,
    ...frameOut,
    ...errorPage
];
