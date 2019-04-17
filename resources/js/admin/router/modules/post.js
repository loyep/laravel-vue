// const BlankLayout = () => import('@/layouts/BlankLayout/index.vue')
const PageLayout = () => import('@/layouts/PageLayout/index.vue')

const postRoutes = [
  {
    path: 'post',
    component: PageLayout,
    meta: {
      title: '文章',
      hideChildrenInMenu: true
    },
    children: [
      {
        path: '',
        name: 'post.index',
        component: () => import('@/views/posts/List.vue'),
        meta: {
          title: '文章列表'
        }
      },
      {
        path: 'create',
        name: 'post.create',
        component: () => import('@/views/posts/Create.vue'),
        hidden: true,
        meta: {
          title: '创建文章'
        }
      },
      {
        path: ':id/edit',
        name: 'post.edit',
        component: () => import('@/views/posts/Update.vue'),
        hidden: true,
        meta: {
          title: '编辑文章'
        }
      },
      {
        path: ':id',
        name: 'post.detail',
        component: () => import('@/views/posts/Detail.vue'),
        hidden: true,
        meta: {
          title: '文章详情'
        }
      }
    ]
  }
]

export default postRoutes
