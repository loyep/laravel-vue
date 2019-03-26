<template>
  <a-card>
    <div class="tableList">
      <div class="tableListForm">
        <a-form :form="form" layout="inline" @submit="handleSubmit">
          <a-row :gutter="{ md: 6, lg: 24, xl: 48 }">
            <a-col :md="6" :sm="24">
              <a-form-item label="关键词">
                <a-input v-decorator="[ 'keywords', ]" placeholder="请输入关键词"/>
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
                  <a-select-option value="published">已发布</a-select-option>
                  <a-select-option value="draft">草稿</a-select-option>
                  <a-select-option value="private">私密</a-select-option>
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
                  <a-select-option value="published">已发布</a-select-option>
                  <a-select-option value="draft">草稿</a-select-option>
                  <a-select-option value="private">私密</a-select-option>
                </a-select>
              </a-form-item>
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
        :rowSelection="{ selectedRowKeys, onChange: onSelectChange }"
        @change="handleTableChange"
      >
        <template #post_title="title, post">
          <router-link :to="{ name: 'post.edit', params: {id: post.id}}">{{ title }}</router-link>
        </template>

        <template #post_author="author, post">
          <a @click="handleSearch({user: post.user.name})">{{ author }}</a>
        </template>

        <template #post_category="category">
          <a href="javascript:;">{{ category.name }}</a>
        </template>

        <template #post_status="status">
          <a-tag :color="statusMap(status).color">{{ statusMap(status).label }}</a-tag>
        </template>

        <template #post_tags="tags">
          <template v-for="tag in tags">
            <a-tag :key="tag.id" color="blue">
              <a href="javascript:;">{{ tag.name }}</a>
            </a-tag>
          </template>
        </template>
      </a-table>
    </div>
  </a-card>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Card, Col, Row, Tag, Menu, Dropdown, Button } from "ant-design-vue";
import { getList } from "@/api/category";
import { WrappedFormUtils } from "ant-design-vue/types/form/form";

const columns = [
  {
    title: "名称",
    dataIndex: "title",
    scopedSlots: { customRender: "post_title" }
  },
  {
    title: "作者",
    dataIndex: "user.name",
    scopedSlots: { customRender: "post_author" }
  },
  {
    title: "分类",
    dataIndex: "category",
    scopedSlots: { customRender: "post_category" }
  },
  {
    title: "标签",
    dataIndex: "tags",
    scopedSlots: { customRender: "post_tags" }
  },
  {
    title: "状态",
    dataIndex: "status",
    scopedSlots: { customRender: "post_status" }
  },
  {
    title: "总数",
    dataIndex: "comments_count"
  },
  {
    title: "发布时间",
    dataIndex: "published_at"
  }
];

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag,
    ADropdown: Dropdown,
    ADropdownButton: Dropdown.Button,
    AMenu: Menu,
    AMenuItem: Menu.Item,
    AButton: Button
  }
})
export default class CategoryList extends Vue {
  protected selectedRowKeys: Array<number> = [];

  private columns = columns;

  private form: WrappedFormUtils;

  private data: Array<Object> = [];

  private loading = false;

  private pagination: Object = {};

  private query: Object = {};

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

  handleSearch(query: Object = {}) {
    this.query = query;
    this.loading = true;
    getList(query).then(res => {
      const data = res.data
      this.data = data.data;

      const paginationProps = {
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

  statusMap(status) {
    const colorMap = {
      published: {
        color: "blue",
        label: "已发布"
      },
      draft: {
        color: "cyan",
        label: "草稿"
      },
      private: {
        color: "green",
        label: "私密"
      }
    };
    return colorMap[status];
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
