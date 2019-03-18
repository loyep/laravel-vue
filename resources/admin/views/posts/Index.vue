<template>
  <a-card>
    <div class="tableList">
      <div class="tableListForm">
        <a-form :form="form" layout="inline" @submit="handleSearch">
          <a-row :gutter="{ md: 8, lg: 24, xl: 48 }">
            <a-col :md="8" :sm="24">
              <a-form-item label="用户名">
                <a-input
                  v-decorator="[
                    'username',
                    {
                      rules: [
                        //{ required: true, message: $t('validation.required', { attribute: $t('validation.attributes.username') }) }
                      ],
                      validateTrigger: ['change', 'blur']
                    }
                  ]"
                  placeholder="请输入"
                />
              </a-form-item>
            </a-col>

            <a-col :md="8" :sm="24">
              <a-form-item label="权限">
                <a-select defaultValue="0" placeholder="请选择" style="width: 100%;">
                  <a-select-option value="0">
                    全部
                  </a-select-option>
                  <a-select-option value="1">
                    管理员
                  </a-select-option>
                </a-select>
              </a-form-item>
            </a-col>

            <a-col :md="8" :sm="24">
              <span class="submitButtons">
                <a-button type="primary" htmlType="submit">
                  查询
                </a-button>
                <a-button @click=" () => console.log(2222) ">
                  重置
                </a-button>
                <a @click="toggleForm">
                  展开 <a-icon type="down" />
                </a>
              </span>
            </a-col>
          </a-row>
        </a-form>
      </div>
      <div class="tableListOperator">
        <a-button icon="plus" type="primary" @click=" () => console.log(2222) ">
          新建
        </a-button>
        <span>
          <a-button>批量操作</a-button>
          <!-- <Dropdown overlay={menu}>
                    <Button>
                      更多操作 <Icon type="down" />
                    </Button>
                  </Dropdown> -->
        </span>
      </div>
      <!-- <standard-table
        selectedRows="selectedRows"
        loading="loading"
        data="data"
        columns="columns"
        onSelectRow="handleSelectRows"
        onChange="handleStandardTableChange"
      /> -->
      <a-table
        rowKey="id"
        :columns="columns"
        :loading="loading"
        :dataSource="data"
        :pagination="pagination"
        :rowSelection="{selectedRowKeys: selectedRowKeys}"
        @change="handleTableChange"
      >
        <template slot="name" slot-scope="name">
          {{ name.first }} {{ name.last }}
        </template>
      </a-table>
    </div>
  </a-card>
</template>

<script >
import { Card, Col, Row } from 'ant-design-vue'
import { index } from '@/api/post'

export default {
  name: 'Index',
  components: {
    'ACard': Card,
    'ACol': Col,
    'ARow': Row
  },
  data () {
    return {
      selectedRowKeys: [],
      columns: [
        {
          title: 'id',
          dataIndex: 'id',
          sorter: true
        },
        {
          title: '名称',
          dataIndex: 'name'
        },
        {
          title: '别名',
          dataIndex: 'slug'
        },
        {
          title: '描述',
          dataIndex: 'description'
        },
        {
          title: '总数',
          dataIndex: 'count'
        },
        {
          title: '创建时间',
          dataIndex: 'created_at',
          sorter: true
        }
      ],
      form: this.$form.createForm(this),
      data: [],
      loading: false,
      pagination: {

      }
    }
  },
  created () {
    this.loading = true
    index().then(res => {
      console.log(res)
      this.data = res.data.data

      const paginationProps = {
        showSizeChanger: true,
        showQuickJumper: true,
        total: parseInt(res.data.total),
        pageSize: parseInt(res.data.per_page),
        current: res.data.current_page
      }
      this.pagination = paginationProps
      this.loading = false
    })
  },
  methods: {
    handleSearch (value) {
      console.log(value)
    },
    toggleForm () {

    },
    handleTableChange (pagination, filters, sorter) {
      console.log(pagination)
      const query = {
        per_page: pagination.pageSize,
        page: pagination.current
      }
      this.loading = true
      index(query).then(res => {
        console.log(res)
        this.data = res.data.data

        const paginationProps = {
          showSizeChanger: true,
          showQuickJumper: true,
          total: parseInt(res.data.total),
          pageSize: parseInt(res.data.per_page),
          current: res.data.current_page
        }
        this.pagination = paginationProps
        this.loading = false
      })
      // index()
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';
@import '~@/styles/components/utils.less';

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
      margin-bottom: 24px;
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

@media screen and (max-width: @screen-lg) {
  .tableListForm :global(.ant-form-item) {
    margin-right: 24px;
  }
}

@media screen and (max-width: @screen-md) {
  .tableListForm :global(.ant-form-item) {
    margin-right: 8px;
  }
}

</style>
