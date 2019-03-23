import BlankLayout from '@/layouts/BlankLayout/index.vue'
import PageLayout from '@/layouts/PageLayout/index.vue'

export const routes = [
  {
    path: '/login',
    name: 'login',
    hidden: true,
    component: () => import(/* webpackChunkName: "login" */ '@/views/auth/Login.vue')
  },
  {
    path: '/register',
    name: 'register',
    hidden: true,
    component: () => import(/* webpackChunkName: "register" */ '@/views/auth/Register.vue')
  },
  {
    path: '/password/reset',
    name: 'forgot.password',
    hidden: true,
    component: () => import(/* webpackChunkName: "password.reset" */ '@/views/auth/ForgotPassword.vue')
  }
]

export const asyncRouterMap = [
  {
    path: '/',
    component: () => import(/* webpackChunkName: "layout" */'@/layouts/BasicLayout/index.vue'),
    children: [
      {
        path: '',
        component: BlankLayout,
        meta: {
          title: '仪表盘',
          icon: 'dashboard'
        },
        children: [
          {
            path: '',
            name: 'dashboard',
            component: () => import('@/views/dashboard/index.vue'),
            meta: {
              title: '仪表盘'
            }
          },
          {
            path: 'analysis',
            name: 'analysis',
            component: () => import('@/views/dashboard/Analysis.vue'),
            meta: {
              title: '监控台'
            }
          },
          {
            path: 'profile',
            name: 'profile',
            component: () => import('@/views/users/Profile.vue'),
            hidden: true,
            meta: {
              title: '个人资料'
            }
          }
        ]
      },
      {
        path: 'post',
        component: PageLayout,
        meta: {
          title: '文章',
          icon: 'edit'
        },
        children: [
          {
            path: '',
            name: 'post.index',
            component: () => import('@/views/posts/Index.vue'),
            meta: {
              title: '文章列表'
            }
          },
          {
            path: 'create',
            name: 'post.create',
            component: () => import('@/views/posts/Create.vue'),
            meta: {
              title: '创建文章'
            }
          },
          {
            path: ':id/edit',
            name: 'post.edit',
            component: () => import('@/views/posts/Update.vue'),
            meta: {
              title: '编辑文章'
            }
          },
          {
            path: ':id',
            name: 'post.detail',
            component: () => import('@/views/posts/Detail.vue'),
            meta: {
              title: '文章详情'
            }
          }
        ]
      },
      {
        path: 'user',
        component: PageLayout,
        meta: {
          title: '用户',
          icon: 'user'
        },
        children: [
          {
            path: '',
            name: 'user.index',
            component: () => import('@/views/users/Index.vue'),
            meta: {
              title: '用户列表'
            }
          },
          {
            path: 'create',
            name: 'user.create',
            component: () => import('@/views/users/Create.vue'),
            meta: {
              title: '创建用户'
            }
          },
          {
            path: ':id/edit',
            name: 'user.edit',
            component: () => import('@/views/users/Update.vue'),
            meta: {
              title: '编辑用户'
            }
          },
          {
            path: 'detail',
            name: 'user.detail',
            component: () => import('@/views/users/Detail.vue'),
            meta: {
              title: '用户详情'
            }
          },
          {
            path: 'setting',
            name: 'user.setting',
            component: () => import('@/views/users/Setting.vue'),
            meta: {
              title: '账号设置',
              hiddenHeader: true
            }
          }
        ]
      },
      {
        path: 'role',
        component: PageLayout,
        meta: {
          title: '角色',
          icon: 'team'
        },
        children: [
          {
            path: '',
            name: 'role.index',
            component: () => import('@/views/roles/Index.vue'),
            meta: {
              title: '角色列表'
            }
          },
          {
            path: 'create',
            name: 'role.create',
            component: () => import('@/views/roles/Create.vue'),
            meta: {
              title: '创建角色'
            }
          },
          {
            path: 'edit',
            name: 'role.edit',
            component: () => import('@/views/roles/Update.vue'),
            meta: {
              title: '编辑角色'
            }
          },
          {
            path: 'detail',
            name: 'role.detail',
            component: () => import('@/views/roles/Detail.vue'),
            meta: {
              title: '角色详情'
            }
          }
        ]
      },
      {
        path: 'tag',
        component: PageLayout,
        meta: {
          title: '标签',
          icon: 'tags'
        },
        children: [
          {
            path: '',
            name: 'tag.index',
            component: () => import('@/views/tags/Index.vue'),
            meta: {
              title: '标签列表'
            }
          },
          {
            path: 'create',
            name: 'tag.create',
            component: () => import('@/views/tags/Create.vue'),
            meta: {
              title: '新建标签'
            }
          },
          {
            path: 'edit',
            name: 'tag.edit',
            component: () => import('@/views/tags/Update.vue'),
            meta: {
              title: '编辑标签'
            }
          },
          {
            path: 'detail',
            name: 'tag.detail',
            component: () => import('@/views/tags/Detail.vue'),
            meta: {
              title: '标签详情'
            }
          }
        ]
      },
      {
        path: 'permission',
        component: PageLayout,
        meta: {
          title: '权限',
          icon: 'lock'
        },
        children: [
          {
            path: '',
            name: 'permission.index',
            component: () => import('@/views/permissions/Index.vue'),
            meta: {
              title: '权限列表'
            }
          },
          {
            path: 'create',
            name: 'permission.create',
            component: () => import('@/views/permissions/Create.vue'),
            meta: {
              title: '新建权限'
            }
          },
          {
            path: 'edit',
            name: 'permission.edit',
            component: () => import('@/views/permissions/Update.vue'),
            meta: {
              title: '编辑权限'
            }
          },
          {
            path: 'detail',
            name: 'permission.detail',
            component: () => import('@/views/permissions/Detail.vue'),
            meta: {
              title: '权限详情'
            }
          }
        ]
      },
      {
        path: 'widget',
        component: PageLayout,
        meta: {
          title: '插件',
          icon: 'edit'
        },
        children: [
          {
            path: '',
            name: 'widget.index',
            component: () => import('@/views/widgets/Index.vue'),
            meta: {
              title: '插件列表'
            }
          },
          {
            path: 'create',
            name: 'widget.create',
            component: () => import('@/views/widgets/Create.vue'),
            meta: {
              title: '创建插件'
            }
          },
          {
            path: ':id/edit',
            name: 'widget.edit',
            component: () => import('@/views/widgets/Update.vue'),
            meta: {
              title: '编辑插件'
            }
          },
          {
            path: ':id',
            name: 'widget.detail',
            component: () => import('@/views/widgets/Detail.vue'),
            meta: {
              title: '插件详情'
            }
          }
        ]
      },
      {
        path: 'setting',
        component: BlankLayout,
        meta: {
          title: '设置',
          icon: 'setting'
        },
        children: [
          {
            path: '',
            name: 'setting.index',
            component: () => import('@/views/settings/Index.vue'),
            meta: {
              title: '设置列表'
            }
          },
          {
            path: 'create',
            name: 'setting.create',
            component: () => import('@/views/settings/Create.vue'),
            meta: {
              title: '创建设置'
            }
          },
          {
            path: 'edit',
            name: 'setting.edit',
            component: () => import('@/views/settings/Update.vue'),
            meta: {
              title: '编辑设置'
            }
          },
          {
            path: 'detail',
            name: 'setting.detail',
            component: () => import('@/views/settings/Detail.vue'),
            meta: {
              title: '设置详情'
            }
          }
        ]
      },
      {
        path: '',
        component: BlankLayout,
        hidden: true,
        children: [
          {
            path: '403',
            component: () => import('@/views/errorPage/403.vue')
          },
          {
            path: '500',
            component: () => import('@/views/errorPage/500.vue')
          }
        ]
      },
      {
        path: '*',
        component: BlankLayout,
        hidden: true,
        children: [
          {
            path: '',
            component: () => import('@/views/errorPage/404.vue')
          }
        ]
      }
    ]
  }
]

export default routes
