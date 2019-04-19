(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-fc22d1d4"],{1242:function(a,e,t){"use strict";t.d(e,"a",function(){return o});var r=t("a4bb"),n=t.n(r),s=(t("ac6a"),t("5176")),i=t.n(s);function o(a,e){var t=i()({},a.getFieldsValue()),r={};n()(t).forEach(function(a){r[a]={value:t[a],errors:e.hasOwnProperty(a)?e[a].map(function(a){return new Error(a)}):void 0}}),a.setFields(r)}},5176:function(a,e,t){a.exports=t("51b6")},7622:function(a,e,t){"use strict";t.r(e);var r=function(){var a=this,e=a.$createElement,t=a._self._c||e;return t("div",[t("a-row",{attrs:{gutter:{md:24}}},[t("a-col",{attrs:{md:16,sm:24}},[t("a-card",[t("a-form",{attrs:{form:a.form},on:{submit:a.handleSubmit}},[t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"用户名",extra:"此用户名将作为用户登录时所用的名称. 请不要与系统中现有的用户名重复."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["name",{rules:[{required:!0,message:"请输入用户名"}]}],expression:"[\n                'name',\n                {rules: [{ required: true, message: '请输入用户名' }]}\n              ]"}],attrs:{placeholder:"请输入用户名"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"邮箱",extra:"电子邮箱地址将作为此用户的主要联系方式.请不要与系统中现有的电子邮箱地址重复."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["email",{rules:[{required:!0,message:"请输入邮箱"},{type:"email",message:"邮箱格式错误"}]}],expression:"[\n                'email',\n                {\n                  rules: [\n                    { required: true, message: '请输入邮箱' },\n                    { type: 'email', message: '邮箱格式错误' }\n                  ]}\n              ]"}],attrs:{placeholder:"请输入邮箱"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"昵称",extra:"用户昵称可以与用户名不同, 用于前台显示.如果你将此项留空, 将默认使用用户名."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["display_name"],expression:"[\n                'display_name',\n              ]"}],attrs:{placeholder:"请输入昵称"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"个人网址",extra:"此用户的个人主页地址, 请用 http:// 开头."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["url",{rules:[{type:"url",message:"个人网址格式错误"}]}],expression:"[\n                'url',\n                {\n                  rules: [\n                    { type: 'url', message: '个人网址格式错误' }\n                  ]\n                }\n              ]"}],attrs:{placeholder:"请输入个人网址"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"密码",extra:"为此用户分配一个密码.建议使用特殊字符与字母、数字的混编样式,以增加系统安全性."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["password",{rules:[{required:!0,message:"请输入密码"}]}],expression:"[\n                'password',\n                {rules: [{ required: true, message: '请输入密码' }]}\n              ]"}],attrs:{type:"password",placeholder:"请输入密码"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"确认密码",extra:"请确认你的密码, 与上面输入的密码保持一致."}},[t("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["password_confirmation",{rules:[{required:!0,message:"请输入确认密码"}]}],expression:"[\n                'password_confirmation',\n                {rules: [{ required: true, message: '请输入确认密码' }]}\n              ]"}],attrs:{type:"password",placeholder:"请输入确认密码"}})],1),t("a-form-item",{attrs:{labelCol:{span:4},wrapperCol:{span:12},label:"用户角色",extra:"不同的用户组拥有不同的权限."}},[t("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["role",{initialValue:"admin"}],expression:"[\n                'role',\n                {\n                  initialValue: 'admin'\n                }\n              ]"}]},[t("a-select-option",{attrs:{value:"visitor"}},[a._v("\n                访问者\n              ")]),t("a-select-option",{attrs:{value:"editor"}},[a._v("\n                编辑\n              ")]),t("a-select-option",{attrs:{value:"admin"}},[a._v("\n                管理员\n              ")])],1)],1),t("a-form-item",{attrs:{wrapperCol:{xs:{span:24,offset:0},sm:{span:12,offset:4}}}},[t("a-button",{attrs:{type:"primary",htmlType:"submit"}},[a._v("\n              创建\n            ")])],1)],1)],1)],1),t("a-col",{attrs:{md:8,sm:12}},[t("a-card",[t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br"),t("br")])],1)],1)],1)},n=[],s=t("cdeb"),i=t("e32c"),o=t("9a63"),d=t("c24f"),l=t("1242"),c={name:"UserUpdate",components:{ACard:s["a"],ACol:i["a"],ARow:o["a"]},data:function(){return{form:this.$form.createForm(this)}},methods:{handleSubmit:function(a){var e=this;a.preventDefault(),this.form.validateFields(function(a,t){a||Object(d["d"])(t).then(function(a){var t=a.data;t.errors?Object(l["a"])(e.form,t.errors):e.$confirm({title:t.message,okText:"确认",cancelText:"取消",onOk:function(){e.$router.push({name:"user.index"})}})})})}}},u=c,p=t("2877"),b=Object(p["a"])(u,r,n,!1,null,null,null);e["default"]=b.exports},"9a63":function(a,e,t){"use strict";var r=t("290c");r["a"].install=function(a){a.component(r["a"].name,r["a"])},e["a"]=r["a"]},c24f:function(a,e,t){"use strict";t.d(e,"b",function(){return n}),t.d(e,"c",function(){return s}),t.d(e,"d",function(){return i}),t.d(e,"e",function(){return o}),t.d(e,"a",function(){return d});var r=t("b775");function n(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return Object(r["a"])({url:"/user",method:"get",params:a})}function s(a){return Object(r["a"])({url:"/user/"+a,method:"get"})}function i(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return Object(r["a"])({url:"/user",method:"post",data:a})}function o(a,e){return Object(r["a"])({url:"/user/"+a,method:"put",data:e})}function d(a){return Object(r["a"])({url:"/user/"+a,method:"delete"})}},cdeb:function(a,e,t){"use strict";var r=t("92fa"),n=t.n(r),s=t("6042"),i=t.n(s),o=t("0464"),d=t("ccb9e"),l=t("9a63"),c=t("e32c"),u=t("4d91"),p=t("f194"),b=t("daa3"),v=t("9b57"),m=t.n(v),f=t("c449"),h=t.n(f);function g(a){var e=void 0,t=function(t){return function(){e=null,a.apply(void 0,m()(t))}},r=function(){for(var a=arguments.length,r=Array(a),n=0;n<a;n++)r[n]=arguments[n];null==e&&(e=h()(t(r)))};return r.cancel=function(){return h.a.cancel(e)},r}var y=t("b488"),w=d["a"].TabPane,C={name:"ACard",mixins:[y["a"]],props:{prefixCls:u["a"].string.def("ant-card"),title:u["a"].any,extra:u["a"].any,bordered:u["a"].bool.def(!0),bodyStyle:u["a"].object,headStyle:u["a"].object,loading:u["a"].bool.def(!1),hoverable:u["a"].bool.def(!1),type:u["a"].string,actions:u["a"].any,tabList:u["a"].array,activeTabKey:u["a"].string,defaultActiveTabKey:u["a"].string},data:function(){return this.updateWiderPaddingCalled=!1,{widerPadding:!1}},beforeMount:function(){this.updateWiderPadding=g(this.updateWiderPadding)},mounted:function(){this.updateWiderPadding(),this.resizeEvent=Object(p["a"])(window,"resize",this.updateWiderPadding)},beforeDestroy:function(){this.resizeEvent&&this.resizeEvent.remove(),this.updateWiderPadding.cancel&&this.updateWiderPadding.cancel()},methods:{updateWiderPadding:function(){var a=this,e=this.$refs.cardContainerRef;if(e){var t=936;e.offsetWidth>=t&&!this.widerPadding&&this.setState({widerPadding:!0},function(){a.updateWiderPaddingCalled=!0}),e.offsetWidth<t&&this.widerPadding&&this.setState({widerPadding:!1},function(){a.updateWiderPaddingCalled=!0})}},onHandleTabChange:function(a){this.$emit("tabChange",a)},isContainGrid:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],e=void 0;return a.forEach(function(a){a&&Object(b["m"])(a).__ANT_CARD_GRID&&(e=!0)}),e},getAction:function(a){var e=this.$createElement;if(!a||!a.length)return null;var t=a.map(function(t,r){return e("li",{style:{width:100/a.length+"%"},key:"action-"+r},[e("span",[t])])});return t}},render:function(){var a,e=arguments[0],t=this.$props,r=t.prefixCls,s=void 0===r?"ant-card":r,u=t.headStyle,p=void 0===u?{}:u,v=t.bodyStyle,m=void 0===v?{}:v,f=t.loading,h=t.bordered,g=void 0===h||h,y=t.type,C=t.tabList,x=t.hoverable,k=t.activeTabKey,j=t.defaultActiveTabKey,O=this.$slots,P=this.$scopedSlots,_=this.$listeners,$=(a={},i()(a,""+s,!0),i()(a,s+"-loading",f),i()(a,s+"-bordered",g),i()(a,s+"-hoverable",!!x),i()(a,s+"-wider-padding",this.widerPadding),i()(a,s+"-padding-transition",this.updateWiderPaddingCalled),i()(a,s+"-contain-grid",this.isContainGrid(O["default"])),i()(a,s+"-contain-tabs",C&&C.length),i()(a,s+"-type-"+y,!!y),a),A=0===m.padding||"0px"===m.padding?{padding:24}:void 0,W=e("div",{class:s+"-loading-content",style:A},[e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:22}},[e("div",{class:s+"-loading-block"})])]),e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:8}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:15}},[e("div",{class:s+"-loading-block"})])]),e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:6}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:18}},[e("div",{class:s+"-loading-block"})])]),e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:13}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:9}},[e("div",{class:s+"-loading-block"})])]),e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:4}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:3}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:16}},[e("div",{class:s+"-loading-block"})])]),e(l["a"],{attrs:{gutter:8}},[e(c["a"],{attrs:{span:8}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:6}},[e("div",{class:s+"-loading-block"})]),e(c["a"],{attrs:{span:8}},[e("div",{class:s+"-loading-block"})])])]),T=void 0!==k,S={props:i()({size:"large"},T?"activeKey":"defaultActiveKey",T?k:j),on:{change:this.onHandleTabChange},class:s+"-head-tabs"},N=void 0,q=C&&C.length?e(d["a"],S,[C.map(function(a){var t=a.tab,r=a.scopedSlots,n=void 0===r?{}:r,s=n.tab,i=void 0!==t?t:P[s]?P[s](a):null;return e(w,{attrs:{tab:i,disabled:a.disabled},key:a.key})})]):null,E=Object(b["h"])(this,"title"),R=Object(b["h"])(this,"extra");(E||R||q)&&(N=e("div",{class:s+"-head",style:p},[e("div",{class:s+"-head-wrapper"},[E&&e("div",{class:s+"-head-title"},[E]),R&&e("div",{class:s+"-extra"},[R])]),q]));var D=O["default"],G=Object(b["h"])(this,"cover"),K=G?e("div",{class:s+"-cover"},[G]):null,z=e("div",{class:s+"-body",style:m},[f?W:D]),F=Object(b["c"])(this.$slots.actions),M=F&&F.length?e("ul",{class:s+"-actions"},[this.getAction(F)]):null;return e("div",n()([{class:$,ref:"cardContainerRef"},{on:Object(o["a"])(_,["tabChange","tab-change"])}]),[N,K,D?z:null,M])}},x={name:"ACardMeta",props:{prefixCls:u["a"].string.def("ant-card"),title:u["a"].any,description:u["a"].any},render:function(){var a=arguments[0],e=this.$props.prefixCls,t=void 0===e?"ant-card":e,r=i()({},t+"-meta",!0),s=Object(b["h"])(this,"avatar"),o=Object(b["h"])(this,"title"),d=Object(b["h"])(this,"description"),l=s?a("div",{class:t+"-meta-avatar"},[s]):null,c=o?a("div",{class:t+"-meta-title"},[o]):null,u=d?a("div",{class:t+"-meta-description"},[d]):null,p=c||u?a("div",{class:t+"-meta-detail"},[c,u]):null;return a("div",n()([{on:this.$listeners},{class:r}]),[l,p])}},k={name:"ACardGrid",__ANT_CARD_GRID:!0,props:{prefixCls:u["a"].string.def("ant-card")},render:function(){var a=arguments[0],e=this.$props.prefixCls,t=void 0===e?"ant-card":e,r=i()({},t+"-grid",!0);return a("div",n()([{on:this.$listeners},{class:r}]),[this.$slots["default"]])}};C.Meta=x,C.Grid=k,C.install=function(a){a.component(C.name,C),a.component(x.name,x),a.component(k.name,k)};e["a"]=C},e32c:function(a,e,t){"use strict";var r=t("da05");r["b"].install=function(a){a.component(r["b"].name,r["b"])},e["a"]=r["b"]}}]);
//# sourceMappingURL=chunk-fc22d1d4.a5f4f544.js.map