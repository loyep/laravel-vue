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
              <a-form-item label="状态">
                <a-select defaultValue="" placeholder="请选择" style="width: 100%;">
                  <a-select-option value="">全部</a-select-option>
                  <a-select-option value="published">已发布</a-select-option>
                  <a-select-option value="draft">草稿</a-select-option>
                  <a-select-option value="private">私密</a-select-option>
                </a-select>
              </a-form-item>
            </a-col>

            <a-col :md="8" :sm="24">
              <span class="submitButtons">
                <a-button type="primary" @click="handleSearch">查询</a-button>
                <a-button @click=" () => console.log(2222) ">重置</a-button>
                <a @click="toggleForm">
                  展开
                  <a-icon type="down"/>
                </a>
              </span>
            </a-col>
          </a-row>
        </a-form>
      </div>
      <div class="tableListOperator">
        <a-button icon="plus" type="primary" @click=" () => console.log(2222) ">新建</a-button>
        <span>
          <a-button>批量操作</a-button>
        </span>
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
        <template slot="post_title" slot-scope="title, post">
          <router-link :to="{ name: 'post.edit', params: {id: post.id}}">{{ title }}</router-link>
        </template>

        <template slot="post_author" slot-scope="author, post">
          <a @click="handleSearch({user: post.user.name})">{{ author }}</a>
        </template>

        <template slot="post_category" slot-scope="category">
          <a href="javascript:;">{{ category.name }}</a>
        </template>

        <template slot="post_status" slot-scope="status">
          <a-tag :color="statusMap(status).color">{{ statusMap(status).label }}</a-tag>
        </template>

        <template slot="post_tags" slot-scope="tags">
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
import { Card, Col, Row, Tag } from "ant-design-vue";
import { index } from "@/api/post";

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
  },
  {
    title: "日期",
    dataIndex: "created_at"
  }
];

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag
  }
})
export default class PostList extends Vue {
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
    index(query).then(res => {
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

  statusMap(status) {
    console.log(status);
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
    index(query).then(res => {
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
