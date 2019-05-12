// const BlankLayout = () => import('@/layouts/BlankLayout/index.vue')
const PageLayout = () => import('@/layouts/PageLayout/index.vue')

const categoryRoutes = [
  {
    path: 'category',
    component: PageLayout,
    meta: {
      title: '分类',
      hideChildrenInMenu: true
    },
    children: [
      {
        path: '',
        name: 'category.index',
        component: () => import('@/views/categories/List.vue'),
        meta: {
          title: '分类列表'
        }
      },
      {
        path: 'create',
        name: 'category.create',
        component: () => import('@/views/categories/Update.vue'),
        hidden: true,
        meta: {
          title: '创建分类'
        }
      },
      {
        path: ':id/edit',
        name: 'category.edit',
        component: () => import('@/views/categories/Update.vue'),
        hidden: true,
        props: true,
        meta: {
          title: '编辑分类'
        }
      },
      {
        path: ':id',
        name: 'category.detail',
        component: () => import('@/views/categories/Detail.vue'),
        hidden: true,
        props: true,
        meta: {
          title: '分类详情'
        }
      }
    ]
  }
]

export default categoryRoutes
