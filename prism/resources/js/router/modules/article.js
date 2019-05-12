// const BlankLayout = () => import('@/layouts/BlankLayout/index.vue')
const PageLayout = () => import('@/layouts/PageLayout/index.vue')

const articleRoutes = [
  {
    path: 'article',
    component: PageLayout,
    meta: {
      title: '文章',
      hideChildrenInMenu: true
    },
    children: [
      {
        path: '',
        name: 'article.index',
        component: () => import('@/views/articles/List.vue'),
        meta: {
          title: '文章列表'
        }
      },
      {
        path: 'create',
        name: 'article.create',
        component: () => import('@/views/articles/Create.vue'),
        hidden: true,
        meta: {
          title: '创建文章'
        }
      },
      {
        path: ':id/edit',
        name: 'article.edit',
        component: () => import('@/views/articles/Update.vue'),
        hidden: true,
        meta: {
          title: '编辑文章'
        }
      },
      {
        path: ':id',
        name: 'article.detail',
        component: () => import('@/views/articles/Detail.vue'),
        hidden: true,
        meta: {
          title: '文章详情'
        }
      }
    ]
  }
]

export default articleRoutes
