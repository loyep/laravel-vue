(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5b3a5356"],{"1f05":function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a-card",[a("div",{staticClass:"tableList"},[a("div",{staticClass:"tableListForm"},[a("a-form",{attrs:{form:t.form,layout:"inline"},on:{submit:t.handleSubmit}},[a("a-row",{attrs:{gutter:{md:6,lg:24,xl:48}}},[t.showActions?[a("a-col",{attrs:{md:6,sm:24}},[a("a-form-item",[a("span",{staticClass:"submitButtons"},[a("a-button",{attrs:{icon:"delete"},on:{click:t.handleDelete}},[t._v("删除")]),a("a-dropdown",{scopedSlots:t._u([{key:"overlay",fn:function(){return[a("a-menu",{on:{click:t.handleMoreAction}},[a("a-menu-item",{key:"1"},[a("a-icon",{attrs:{type:"delete"}}),t._v("删除\n                        ")],1)],1)]},proxy:!0}])},[a("a-button",[t._v("\n                      批量操作\n                      "),a("a-icon",{attrs:{type:"down"}})],1)],1)],1)])],1)]:[a("a-col",{attrs:{md:6,sm:24}},[a("a-form-item",{attrs:{label:"关键词"}},[a("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["keywords"],expression:"[ 'keywords', ]"}],attrs:{placeholder:"请输入关键词"}})],1)],1),a("a-col",{attrs:{md:6,sm:24}},[a("a-form-item",{attrs:{label:"状态"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["status"],expression:"[\n                    'status',\n                  ]"}],staticStyle:{width:"100%"},attrs:{allowClear:"",placeholder:"请选择"}},[a("a-select-option",{attrs:{value:"published"}},[t._v("\n                    已发布\n                  ")]),a("a-select-option",{attrs:{value:"draft"}},[t._v("\n                    草稿\n                  ")]),a("a-select-option",{attrs:{value:"private"}},[t._v("\n                    私密\n                  ")])],1)],1)],1),a("a-col",{attrs:{md:6,sm:24}},[a("a-form-item",[a("span",{staticClass:"submitButtons"},[a("a-button",{attrs:{icon:"search",type:"primary",htmlType:"submit"}},[t._v("查询")]),a("a-button",{attrs:{icon:"undo"},on:{click:t.handleReset}},[t._v("重置")]),a("a-button",{attrs:{icon:"plus",type:"primary"},on:{click:t.handleCreate}},[t._v("新建")])],1)])],1)]],2)],1)],1),a("a-table",{attrs:{rowKey:"id",columns:t.columns,loading:t.loading,dataSource:t.data,pagination:t.pagination,rowSelection:{selectedRowKeys:t.selectedRowKeys,onChange:t.onSelectChange}},on:{change:t.handleTableChange},scopedSlots:t._u([{key:"article_title",fn:function(e,n){return[a("router-link",{attrs:{to:{name:"article.edit",params:{id:n.id}}}},[t._v("\n          "+t._s(e)+"\n        ")])]}},{key:"article_user",fn:function(e,n){return[a("router-link",{attrs:{to:{name:"article.index",query:{user:e.id}}}},[t._v("\n          "+t._s(e.name)+"\n        ")])]}},{key:"article_category",fn:function(e){return[a("router-link",{attrs:{to:{name:"article.index",query:{category:e.id}}}},[t._v("\n          "+t._s(e.name)+"\n        ")])]}},{key:"article_status",fn:function(e){return[a("a-badge",{attrs:{status:t.statusMap(e).type,text:t.statusMap(e).label},on:{click:function(a){return t.searchByStatus(e)}}})]}},{key:"article_tags",fn:function(e){return[t._l(e,function(e){return[a("a-tag",{key:e.id,attrs:{color:"blue"}},[a("router-link",{attrs:{to:{name:"article.index",query:{tag:e.id}}}},[t._v("\n              "+t._s(e.name)+"\n            ")])],1)]})]}}])})],1)])},s=[],o=(a("a481"),a("a071")),r=a("cdeb"),i=a("e32c"),c=a("9a63"),l=a("7571"),u=a("a600"),d=a("55f1"),h=a("2423"),m=[{title:"名称",dataIndex:"title",width:300,scopedSlots:{customRender:"article_title"}},{title:"作者",dataIndex:"user",width:100,scopedSlots:{customRender:"article_user"}},{title:"分类",dataIndex:"category",width:120,scopedSlots:{customRender:"article_category"}},{title:"标签",dataIndex:"tags",width:300,scopedSlots:{customRender:"article_tags"}},{title:"状态",dataIndex:"status",width:120,scopedSlots:{customRender:"article_status"}},{title:"总数",width:120,dataIndex:"comments_count"},{title:"发布时间",width:200,dataIndex:"published_at"}],p={name:"ArticleList",components:{ABadge:o["a"],ACard:r["a"],ACol:i["a"],ARow:c["a"],ATag:l["a"],ADropdown:u["a"],AMenu:d["a"],AMenuItem:d["a"].Item},data:function(){return{selectedRowKeys:[],columns:m,form:this.$form.createForm(this),data:[],loading:!1,pagination:{},query:{}}},computed:{showActions:function(){return this.selectedRowKeys.length>0}},watch:{data:function(t,e){this.selectedRowKeys=[]},$route:function(){console.log(this.$route.query.tag),this.initForm()}},created:function(){console.log(this.$route.query.tag),this.initForm()},methods:{searchByStatus:function(t){var e=this;this.form.setFieldsValue({status:t}),this.form.validateFields(function(t,a){t||e.handleSearch(a)})},initForm:function(){this.handleSearch()},handleSubmit:function(t){var e=this;t.preventDefault(),this.form.validateFields(function(t,a){t||e.handleSearch(a)})},handleCreate:function(t){t.preventDefault(),this.$router.push({name:"article.create"})},handleReset:function(t){t.preventDefault(),this.form.resetFields(),this.$router.replace({name:"article.index"})},handleSearch:function(){var t=this,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.query=e,this.loading=!0,e=Object.assign(e,this.$route.query),console.log(e),Object(h["b"])(e).then(function(e){var a=e.data,n=a.data,s=a.total;t.data=n;var o={showSizeChanger:!0,total:parseInt(s),pageSize:parseInt(e.data.per_page),current:e.data.current_page};t.pagination=o,t.loading=!1})},handleMoreAction:function(){},handleDelete:function(){var t=this;this.$confirm({title:"提示",content:"确认要删除吗 ?",onOk:function(){Object(h["a"])(t.selectedRowKeys).then(function(e){console.log(e),e.data.message&&(t.$notification.success({message:"删除提示",description:e.data.message}),t.$nextTick(function(){t.handleSearch()}))})},onCancel:function(){}})},onSelectChange:function(t,e){this.selectedRowKeys=t},statusMap:function(t){var e={published:{type:"success",label:"已发布"},draft:{type:"processing",label:"草稿"},private:{type:"warning",label:"私密"}};return e[t]},handleTableChange:function(t,e,a){var n=Object.assign(this.query,{per_page:t.pageSize,page:t.current});this.handleSearch(n)}}},f=p,g=(a("db33"),a("2877")),y=Object(g["a"])(f,n,s,!1,null,"11f92606",null);e["default"]=y.exports},7319:function(t,e,a){},db33:function(t,e,a){"use strict";var n=a("7319"),s=a.n(n);s.a}}]);
//# sourceMappingURL=chunk-5b3a5356.js.map