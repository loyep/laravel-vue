<template>
  <a-card>
    <div class="tableList">
      <div class="tableListForm">
        <a-form :form="form" layout="inline" @submit="handleSubmit">
          <a-row :gutter="{ md: 6, lg: 24, xl: 48 }">
            <template v-if="!showActions">
              <a-col :md="6" :sm="24">
                <a-form-item label="关键词">
                  <a-input v-decorator="[ 'keywords', ]" placeholder="请输入关键词" />
                </a-form-item>
              </a-col>

              <a-col :md="6" :sm="24">
                <a-form-item label="状态">
                  <a-select
                    v-decorator="[
                      'status',
                    ]"
                    allowClear
                    placeholder="请选择"
                    style="width: 100%;"
                  >
                    <a-select-option value="published">
                      已发布
                    </a-select-option>
                    <a-select-option value="draft">
                      草稿
                    </a-select-option>
                    <a-select-option value="private">
                      私密
                    </a-select-option>
                  </a-select>
                </a-form-item>
              </a-col>

              <a-col :md="6" :sm="24">
                <a-form-item label="分类">
                  <a-select
                    v-decorator="[
                      'category_id',
                    ]"
                    allowClear
                    placeholder="请选择"
                    style="width: 100%;"
                  >
                    <a-select-option value="published">
                      已发布
                    </a-select-option>
                    <a-select-option value="draft">
                      草稿
                    </a-select-option>
                    <a-select-option value="private">
                      私密
                    </a-select-option>
                  </a-select>
                </a-form-item>
              </a-col>

              <a-col :md="6" :sm="24">
                <a-form-item>
                  <span class="submitButtons">
                    <a-button icon="search" type="primary" htmlType="submit">查询</a-button>
                    <a-button icon="undo" @click="handleReset">重置</a-button>
                    <a-button icon="plus" type="primary" @click="handleCreate">新建</a-button>
                  </span>
                </a-form-item>
              </a-col>
            </template>

            <template v-else>
              <a-col :md="6" :sm="24">
                <a-form-item>
                  <span class="submitButtons">
                    <a-button icon="delete" type="danger" @click="handleDelete">删除</a-button>
                    <a-dropdown>
                      <a-button>
                        批量操作
                        <a-icon type="down" />
                      </a-button>
                      <template #overlay>
                        <a-menu @click="handleMoreAction">
                          <a-menu-item key="1">
                            <a-icon type="delete" />删除
                          </a-menu-item>
                        </a-menu>
                      </template>
                    </a-dropdown>
                  </span>
                </a-form-item>
              </a-col>
            </template>
          </a-row>
        </a-form>
      </div>

      <a-table
        rowKey="id"
        :columns="columns"
        :loading="loading"
        :dataSource="data"
        :pagination="pagination"
        :rowSelection="{ selectedRowKeys, onChange: onSelectChange }"
        @change="handleTableChange"
      >
        <template #post_title="title, post">
          <router-link :to="{ name: 'post.edit', params: {id: post.id}}">
            {{ title }}
          </router-link>
        </template>

        <template #post_user="user, post">
          <router-link :to="{ name: 'post.index', query: {user: user.id}}">
            {{ user.name }}
          </router-link>
        </template>

        <template #post_category="category">
          <router-link
            :to="{ name: 'post.index', query: {category: category.id}}"
          >
            {{ category.name }}
          </router-link>
        </template>

        <template #post_status="status">
          <a-badge
            :status="statusMap(status).type"
            :text="statusMap(status).label"
            @click="searchByStatus(status)"
          />
        </template>

        <template #post_tags="tags">
          <template v-for="tag in tags">
            <a-tag :key="tag.id" color="blue">
              <router-link :to="{ name: 'post.index', query: {tag: tag.id}}">
                {{ tag.name }}
              </router-link>
            </a-tag>
          </template>
        </template>
      </a-table>
    </div>
  </a-card>
</template>

<script >
import { Card, Col, Row, Tag, Menu, Dropdown, Badge } from 'ant-design-vue'
import { getList, destroy } from '@/api/post'

const columns = [
  {
    title: '名称',
    dataIndex: 'title',
    width: 300,
    scopedSlots: { customRender: 'post_title' }
  },
  {
    title: '作者',
    dataIndex: 'user',
    width: 100,
    scopedSlots: { customRender: 'post_user' }
  },
  {
    title: '分类',
    dataIndex: 'category',
    width: 120,
    scopedSlots: { customRender: 'post_category' }
  },
  {
    title: '标签',
    dataIndex: 'tags',
    width: 300,
    scopedSlots: { customRender: 'post_tags' }
  },
  {
    title: '状态',
    dataIndex: 'status',
    scopedSlots: { customRender: 'post_status' }
  },
  {
    title: '总数',
    dataIndex: 'comments_count'
  },
  {
    title: '发布时间',
    dataIndex: 'published_at'
  }
]

export default {
  components: {
    ABadge: Badge,
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag,
    ADropdown: Dropdown,
    AMenu: Menu,
    AMenuItem: Menu.Item
  },
  data () {
    return {
      selectedRowKeys: [],
      columns: columns,
      form: this.$form.createForm(this),
      data: [],
      loading: false,
      pagination: {},
      query: {}
    }
  },
  computed: {
    showActions () {
      return this.selectedRowKeys.length > 0
    }
  },
  watch: {
    data (val, oldVal) {
      this.selectedRowKeys = []
    },

    $route (val, oldVal) {
      this.initForm()
    }
  },
  created () {
    this.initForm()
  },

  methods: {
    initForm () {
      this.handleSearch()
    },
    searchByStatus (status) {
      this.form.setFieldsValue({ status })
      this.form.validateFields((err, values) => {
        if (!err) {
          this.handleSearch(values)
        }
      })
    },
    handleSubmit (e) {
      e.preventDefault()
      this.form.validateFields((err, values) => {
        if (!err) {
          this.handleSearch(values)
        }
      })
    },
    handleCreate (e) {
      e.preventDefault()
      this.$router.push({
        name: 'post.create'
      })
    },
    handleReset (e) {
      e.preventDefault()
      this.form.resetFields()
      this.$router.replace({
        name: 'post.index'
      })
    },
    handleSearch (query = {}) {
      this.query = query
      this.loading = true
      query = Object.assign(query, this.$route.query)
      getList(query).then(res => {
        const { data, total } = res.data
        this.data = data

        const paginationProps = {
          showSizeChanger: true,
          total: parseInt(total),
          pageSize: parseInt(res.data.per_page),
          current: res.data.current_page
        }
        this.pagination = paginationProps
        this.loading = false
      })
    },
    handleMoreAction () {},
    handleDelete () {
      destroy(this.selectedRowKeys).then(res => {
        if (res.data.message) {
          this.$notification.success({
            message: '删除提示',
            description: res.data.message
          })
          this.$nextTick(() => {
            this.handleSearch()
          })
        }
      })
    },
    onSelectChange (selectedRowKeys, selectedRows) {
      this.selectedRowKeys = selectedRowKeys
    },
    statusMap (status) {
      const colorMap = {
        published: {
          // color: "blue",
          type: 'success',
          label: '已发布'
        },
        draft: {
          // color: "cyan",
          type: 'processing',
          label: '草稿'
        },
        private: {
          // color: "green",
          type: 'warning',
          label: '私密'
        }
      }
      return colorMap[status]
    },

    handleTableChange (pagination, filters, sorter) {
      const query = Object.assign(this.query, {
        per_page: pagination.pageSize,
        page: pagination.current
      })

      this.handleSearch(query)
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~@/styles/variables";
@import "~@/styles/components/utils";

.tableList {
  .tableListOperator {
    margin-bottom: 16px;
    button {
      margin-right: 8px;
    }
  }
}

.tableListForm {
  :global(.ant-form-item) {
    display: flex;
    margin-right: 0;
    // margin-bottom: 24px;
    > .ant-form-item-label {
      width: auto;
      padding-right: 8px;
      line-height: 32px;
    }
    .ant-form-item-control {
      line-height: 32px;
    }
    :global(.ant-form-item-control-wrapper) {
      flex: 1;
    }
  }
  .submitButtons {
    display: block;
    margin-bottom: 24px;
    white-space: nowrap;
    :global(.ant-btn) {
      margin-right: 8px;
    }
  }
}

@media screen and (max-width: $screen-lg) {
  .tableListForm :global(.ant-form-item) {
    margin-right: 24px;
  }
}

@media screen and (max-width: $screen-md) {
  .tableListForm :global(.ant-form-item) {
    margin-right: 8px;
  }
}
</style>
