// const BlankLayout = () => import('@/layouts/BlankLayout/index.vue')
const PageLayout = () => import('@/layouts/PageLayout/index.vue')

const commentRoutes = [
  {
    path: 'comment',
    component: PageLayout,
    meta: {
      title: '评论',
      hideChildrenInMenu: true
    },
    children: [
      {
        path: '',
        name: 'comment.index',
        component: () => import('@/views/comments/List.vue'),
        meta: {
          title: '评论列表'
        }
      },
      {
        path: 'create',
        name: 'comment.create',
        component: () => import('@/views/comments/Create.vue'),
        hidden: true,
        meta: {
          title: '创建评论'
        }
      },
      {
        path: ':id/edit',
        name: 'comment.edit',
        component: () => import('@/views/comments/Update.vue'),
        hidden: true,
        meta: {
          title: '编辑评论'
        }
      },
      {
        path: ':id',
        name: 'comment.detail',
        component: () => import('@/views/comments/Detail.vue'),
        hidden: true,
        props: true,
        meta: {
          title: '评论详情'
        }
      }
    ]
  }
]

export default commentRoutes
