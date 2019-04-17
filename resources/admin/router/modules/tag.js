// const BlankLayout = () => import('@/layouts/BlankLayout/index.vue')
const PageLayout = () => import('@/layouts/PageLayout/index.vue')

const tagRoutes = [
  {
    path: 'tag',
    component: PageLayout,
    meta: {
      title: '标签',
      hideChildrenInMenu: true
    },
    children: [
      {
        path: '',
        name: 'tag.index',
        component: () => import('@/views/tags/List.vue'),
        meta: {
          title: '标签列表'
        }
      },
      {
        path: 'create',
        name: 'tag.create',
        component: () => import('@/views/tags/Update.vue'),
        meta: {
          title: '新建标签'
        }
      },
      {
        path: ':id/edit',
        name: 'tag.edit',
        component: () => import('@/views/tags/Update.vue'),
        props: true,
        meta: {
          title: '编辑标签'
        }
      },
      {
        path: ':id',
        name: 'tag.detail',
        component: () => import('@/views/tags/Detail.vue'),
        props: true,
        meta: {
          title: '标签详情'
        }
      }
    ]
  }
]

export default tagRoutes
