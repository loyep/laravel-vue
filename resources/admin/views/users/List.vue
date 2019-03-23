<template>
  <a-card>
    <div class="tableList">
      <div class="tableListForm">
        <a-form :form="form" layout="inline" @submit="handleSearch">
          <a-row :gutter="{ md: 6, lg: 24, xl: 48 }">
            <a-col :md="6" :sm="24">
              <a-form-item label="用户名">
                <a-input
                  v-decorator="[
                    'username',
                  ]"
                  placeholder="请输入"
                />
              </a-form-item>
            </a-col>

            <a-col :md="6" :sm="24">
              <a-form-item label="状态">
                <a-select
                  v-decorator="[ 
                    'role',
                   ]"
                  allowClear
                  placeholder="请选择"
                  style="width: 100%;"
                >
                  <a-select-option value="admin">管理员</a-select-option>
                </a-select>
              </a-form-item>
            </a-col>

            <a-col :md="6" :sm="24">
              <a-form-item></a-form-item>
            </a-col>

            <a-col :md="6" :sm="24">
              <a-form-item>
                <span class="submitButtons">
                  <a-button icon="search" type="primary" htmlType="submit">查询</a-button>
                  <a-button icon="plus" type="primary" @click=" () => console.log(2222) ">新建</a-button>
                </span>
              </a-form-item>
            </a-col>
          </a-row>
        </a-form>
      </div>
      <div class="tableListOperator">
        <a-button icon="plus" type="primary" @click=" () => console.log(2222) ">新建</a-button>
        <a-dropdown>
          <a-button>批量操作
            <a-icon type="down"/>
          </a-button>

          <template #overlay>
            <a-menu>
              <a-menu-item key="1">
                <a-icon type="delete"/>删除
              </a-menu-item>
            </a-menu>
          </template>
        </a-dropdown>
      </div>

      <a-table
        rowKey="id"
        :columns="columns"
        :loading="loading"
        :dataSource="data"
        :pagination="pagination"
        :rowSelection="{selectedRowKeys: selectedRowKeys, onChange: onSelectChange}"
        @change="handleTableChange"
      >
        <template v-slot:avatar="avatar">
          <a-avatar :src="avatar"/>
        </template>

        <template #name="name, record">
          <router-link :to="{ name: 'user.edit', params: { id: record.id } }">{{ name }}</router-link>
        </template>

        <template #url="url">
          <a target="_blank" :href="url">{{ url }}</a>
        </template>

        <template #email="email">
          <a :href="`mailto:${email}`">{{ email }}</a>
        </template>

        <template #action="item">
          <a-list>
            <a-list-item/>
          </a-list>
          <a icon="edit">编辑</a>
          <a-divider type="vertical"/>
          <a icon="delete" @click="handleTableDelete(item)">删除</a>
        </template>
      </a-table>
    </div>
  </a-card>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import {
  Card,
  Col,
  Row,
  Tag,
  Avatar,
  Divider,
  Dropdown,
  Menu
} from "ant-design-vue";
import { getList, destroy } from "@/api/user";
import { link } from "fs";

const columns = [
  {
    title: "头像",
    dataIndex: "avatar",
    scopedSlots: { customRender: "avatar" }
  },
  {
    title: "用户名",
    dataIndex: "name",
    scopedSlots: { customRender: "name" }
  },
  {
    title: "昵称",
    dataIndex: "display_name"
  },
  {
    title: "邮箱",
    dataIndex: "email",
    scopedSlots: { customRender: "email" }
  },
  {
    title: "网站",
    dataIndex: "url",
    scopedSlots: { customRender: "url" }
  },
  {
    title: "创建时间",
    dataIndex: "created_at",
    sorter: true
  },
  {
    title: "操作",
    key: "action",
    scopedSlots: { customRender: "action" }
  }
];

@Component({
  components: {
    AAvatar: Avatar,
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag,
    ADivider: Divider,
    ADropdown: Dropdown,
    ADropdownButton: Dropdown.Button,
    AMenu: Menu,
    AMenuItem: Menu.Item
  }
})
export default class UserList extends Vue {
  protected selectedRowKeys: Array<number> = [];

  private columns = columns;

  private form: any;

  private data: Array<Object> = [];

  private loading = false;

  private pagination: Object = {};

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  created() {
    this.handleSearch();
  }

  handleSearch(query: Object = {}) {
    this.loading = true;
    getList(query).then(res => {
      this.data = res.data.data;

      console.log(res.data.data);
      const paginationProps = {
        showSizeChanger: true,
        showQuickJumper: true,
        total: parseInt(res.data.total),
        pageSize: parseInt(res.data.per_page),
        current: res.data.current_page
      };
      this.pagination = paginationProps;
      this.loading = false;
    });
  }

  toggleForm() {}

  onSelectChange(selectedRowKeys, selectedRows) {
    this.selectedRowKeys = selectedRowKeys;
  }

  handleTableChange(pagination, filters, sorter) {
    console.log(pagination);
    const query: any = {
      per_page: pagination.pageSize,
      page: pagination.current
    };
    if (sorter) {
      query.orderBy = sorter.columnKey;
      query.sortedBy = sorter.order === "ascend" ? "asc" : "desc";
    }
    console.log(sorter);
    this.loading = true;
    getList(query).then(res => {
      this.data = res.data.data;

      console.log(res.data.data);
      const paginationProps = {
        showSizeChanger: true,
        showQuickJumper: true,
        total: parseInt(res.data.total),
        pageSize: parseInt(res.data.per_page),
        current: res.data.current_page
      };
      this.pagination = paginationProps;
      this.loading = false;
    });
  }
}
</script>

<style lang="less" scoped>
@import "~@/styles/variables.less";
@import "~@/styles/components/utils.less";

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
