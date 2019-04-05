<template>
  <a-card>
    <div class="tableList">
      <div class="tableListForm">
        <a-form :form="form" layout="inline" @submit="handleSubmit">
          <a-row :gutter="{ md: 6, lg: 24, xl: 48 }">
            <template v-if="!showActions">
              <a-col :md="6" :sm="24">
                <a-form-item label="用户名">
                  <a-input
                    v-decorator="[
                    'name',
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
                    <a-button icon="plus" type="primary" @click="handleCreate">新建</a-button>
                  </span>
                </a-form-item>
              </a-col>
            </template>

            <template v-else>
              <a-col :md="6" :sm="24">
                <a-form-item>
                  <span class="submitButtons">
                    <a-button icon="delete" @click="handleDelete">删除</a-button>
                    <a-dropdown>
                      <a-button>
                        批量操作
                        <a-icon type="down"/>
                      </a-button>
                      <template #overlay>
                        <a-menu @click="handleMoreAction">
                          <a-menu-item key="1">
                            <a-icon type="delete"/>删除
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
        :rowSelection="{ selectedRowKeys: selectedRowKeys, onChange: onSelectChange, getCheckboxProps: getCheckboxProps}"
        @change="handleTableChange"
      >
        <template v-slot:avatar="avatar">
          <a-avatar :src="avatar"/>
        </template>

        <template #user_name="name, record">
          <router-link :to="{ name: 'user.edit', params: { id: record.id } }">{{ name }}</router-link>
        </template>

        <template #url="url">
          <a target="_blank" :href="url">{{ url }}</a>
        </template>

        <template #email="email">
          <a :href="`mailto:${email}`">{{ email }}</a>
        </template>
      </a-table>
    </div>
  </a-card>
</template>

<script lang="ts">
import { Component, Vue, Watch } from "vue-property-decorator";
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
import { State, Mutation, namespace } from "vuex-class";
import { WrappedFormUtils } from "ant-design-vue/types/form/form";

const authModule = namespace("auth");

const columns = [
  {
    title: "头像",
    dataIndex: "avatar",
    scopedSlots: { customRender: "avatar" }
  },
  {
    title: "用户名",
    dataIndex: "name",
    scopedSlots: { customRender: "user_name" }
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
    dataIndex: "created_at"
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

  private form: WrappedFormUtils;

  private data: Array<Object> = [];

  private loading = false;

  private pagination: object = {};

  private query: Object = {};

  @authModule.Getter("user")
  private user: any;

  get showActions(): boolean {
    return this.selectedRowKeys!.length > 0;
  }

  @Watch("data")
  onDataChanged(val: Array<Object>, oldVal: Array<Object>) {
    this.selectedRowKeys = [];
  }

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  created() {
    this.handleSearch();
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        this.handleSearch(values);
      }
    });
  }

  handleCreate(e: Event) {
    e.preventDefault();
    this.$router.push({
      name: "user.create"
    });
  }

  handleSearch(query: Object = {}) {
    this.query = query;
    this.loading = true;
    console.log(this.query);
    getList(query).then(res => {
      const data = res.data;

      this.data = data.data;
      const paginationProps = {
        showSizeChanger: true,
        total: parseInt(data.total),
        pageSize: parseInt(data.per_page),
        current: data.current_page
      };
      this.pagination = paginationProps;
      this.loading = false;
    });
  }

  toggleForm() {}

  onSelectChange(selectedRowKeys, selectedRows) {
    this.selectedRowKeys = selectedRowKeys;
  }

  handleMoreAction() {}

  handleDelete() {
    const that = this;
    this.$confirm({
      title: "提示",
      content: "确认要删除吗 ?",
      onOk() {
        destroy(that.selectedRowKeys!).then(res => {
          console.log(res);
          if (res.data.message) {
            that.$notification.success({
              message: "删除提示",
              description: res.data.message
            });
            that.$nextTick(() => {
              that.handleSearch();
            });
          }
        });
      },
      onCancel() {}
    });
  }

  getCheckboxProps(row) {
    return {
      props: {
        disabled: row.id === this.user.id
      }
    };
  }

  handleTableChange(pagination, filters, sorter) {
    const query: any = Object.assign(this.query, {
      per_page: pagination.pageSize,
      page: pagination.current
    });

    this.handleSearch(query);
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
