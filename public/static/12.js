(window.webpackJsonp=window.webpackJsonp||[]).push([[12],{ZoxY:function(t,a,n){"use strict";n.r(a);var e=n("aRHk"),s=[];s.push({title:"Alipay",avatar:"https://gw.alipayobjects.com/zos/rmsportal/WdGqmHpayyMjiEhcKoVE.png",description:"那是一种内在的东西， 他们到达不了，也无法触及的",owner:"付晓晓",startAt:"2018-07-26 22:44",progress:{value:90}}),s.push({title:"Angular",avatar:"https://gw.alipayobjects.com/zos/rmsportal/zOsKZmFRdUtvpqCImOVY.png",description:"希望是一个好东西，也许是最好的，好东西是不会消亡的",owner:"曲丽丽",startAt:"2018-07-26 22:44",progress:{value:54}}),s.push({title:"Ant Design",avatar:"https://gw.alipayobjects.com/zos/rmsportal/dURIMkkrRFpPgTuzkwnB.png",description:"生命就像一盒巧克力，结果往往出人意料",owner:"林东东",startAt:"2018-07-26 22:44",progress:{value:66}}),s.push({title:"Ant Design Pro",avatar:"https://gw.alipayobjects.com/zos/rmsportal/sfjbOqnsXXJgNCjCzDBL.png",description:"城镇中有那么多的酒馆，她却偏偏走进了我的酒馆",owner:"周星星",startAt:"2018-07-26 22:44",progress:{value:30}}),s.push({title:"Bootstrap",avatar:"https://gw.alipayobjects.com/zos/rmsportal/siCrBXXhmvTQGWPNLBow.png",description:"那时候我只会想自己想要什么，从不想自己拥有什么",owner:"吴加好",startAt:"2018-07-26 22:44",progress:{status:"exception",value:100}});var i={name:"StandardList",components:{HeadInfo:e.a},data:function(){return{data:s}}},o=(n("dBI/"),n("KHd+")),r=Object(o.a)(i,function(){var t=this,a=t.$createElement,n=t._self._c||a;return n("div",[n("a-card",{attrs:{bordered:!1}},[n("a-row",[n("a-col",{attrs:{sm:8,xs:24}},[n("head-info",{attrs:{title:"我的待办",content:"8个任务",bordered:!0}})],1),t._v(" "),n("a-col",{attrs:{sm:8,xs:24}},[n("head-info",{attrs:{title:"本周任务平均处理时间",content:"32分钟",bordered:!0}})],1),t._v(" "),n("a-col",{attrs:{sm:8,xs:24}},[n("head-info",{attrs:{title:"本周完成任务数",content:"24个"}})],1)],1)],1),t._v(" "),n("a-card",{staticStyle:{"margin-top":"24px"},attrs:{bordered:!1,title:"标准列表"}},[n("div",{attrs:{slot:"extra"},slot:"extra"},[n("a-radio-group",[n("a-radio-button",[t._v("全部")]),t._v(" "),n("a-radio-button",[t._v("进行中")]),t._v(" "),n("a-radio-button",[t._v("等待中")])],1),t._v(" "),n("a-input-search",{staticStyle:{"margin-left":"16px",width:"272px"}})],1),t._v(" "),n("div",{staticClass:"operate"},[n("a-button",{staticStyle:{width:"100%"},attrs:{type:"dashed",icon:"plus"}},[t._v("添加")])],1),t._v(" "),n("a-list",{attrs:{size:"large",pagination:{showSizeChanger:!0,showQuickJumper:!0,pageSize:5,total:50}}},t._l(t.data,function(a,e){return n("a-list-item",{key:e},[n("a-list-item-meta",{attrs:{description:a.description}},[n("a-avatar",{attrs:{slot:"avatar",size:"large",shape:"square",src:a.avatar},slot:"avatar"}),t._v(" "),n("a",{attrs:{slot:"title"},slot:"title"},[t._v(t._s(a.title))])],1),t._v(" "),n("div",{attrs:{slot:"actions"},slot:"actions"},[n("a",[t._v("编辑")])]),t._v(" "),n("div",{attrs:{slot:"actions"},slot:"actions"},[n("a-dropdown",[n("a-menu",{attrs:{slot:"overlay"},slot:"overlay"},[n("a-menu-item",[n("a",[t._v("编辑")])]),t._v(" "),n("a-menu-item",[n("a",[t._v("删除")])])],1),t._v(" "),n("a",[t._v("更多"),n("a-icon",{attrs:{type:"down"}})],1)],1)],1),t._v(" "),n("div",{staticClass:"list-content"},[n("div",{staticClass:"list-content-item"},[n("span",[t._v("Owner")]),t._v(" "),n("p",[t._v(t._s(a.owner))])]),t._v(" "),n("div",{staticClass:"list-content-item"},[n("span",[t._v("开始时间")]),t._v(" "),n("p",[t._v(t._s(a.startAt))])]),t._v(" "),n("div",{staticClass:"list-content-item"},[n("a-progress",{staticStyle:{width:"180px"},attrs:{percent:a.progress.value,status:a.progress.status?a.progress.status:null}})],1)])],1)}),1)],1)],1)},[],!1,null,"14460ff3",null);a.default=r.exports},aRHk:function(t,a,n){"use strict";var e={name:"HeadInfo",props:{title:{type:String,default:""},content:{type:String,default:""},bordered:{type:Boolean,default:!1},center:{type:Boolean,default:!0}}},s=(n("eqyF"),n("KHd+")),i=Object(s.a)(e,function(){var t=this,a=t.$createElement,n=t._self._c||a;return n("div",{staticClass:"head-info",class:t.center&&"center"},[n("span",[t._v(t._s(t.title))]),t._v(" "),n("p",[t._v(t._s(t.content))]),t._v(" "),t.bordered?n("em"):t._e()])},[],!1,null,"35523232",null);a.a=i.exports},bhDK:function(t,a,n){(t.exports=n("I1BE")(!1)).push([t.i,".ant-avatar-lg[data-v-14460ff3] {\n  width: 48px;\n  height: 48px;\n  line-height: 48px;\n}\n.list-content-item[data-v-14460ff3] {\n  color: rgba(0, 0, 0, 0.45);\n  display: inline-block;\n  vertical-align: middle;\n  font-size: 14px;\n  margin-left: 40px;\n}\n.list-content-item span[data-v-14460ff3] {\n  line-height: 20px;\n}\n.list-content-item p[data-v-14460ff3] {\n  margin-top: 4px;\n  margin-bottom: 0;\n  line-height: 22px;\n}\n",""])},"dBI/":function(t,a,n){"use strict";var e=n("i538");n.n(e).a},eqyF:function(t,a,n){"use strict";var e=n("vKj+");n.n(e).a},hzdK:function(t,a,n){(t.exports=n("I1BE")(!1)).push([t.i,".head-info[data-v-35523232] {\n  position: relative;\n  text-align: left;\n  padding: 0 32px 0 0;\n  min-width: 125px;\n}\n.head-info.center[data-v-35523232] {\n  text-align: center;\n  padding: 0 32px;\n}\n.head-info span[data-v-35523232] {\n  color: rgba(0, 0, 0, 0.45);\n  display: inline-block;\n  font-size: 14px;\n  line-height: 22px;\n  margin-bottom: 4px;\n}\n.head-info p[data-v-35523232] {\n  color: rgba(0, 0, 0, 0.85);\n  font-size: 24px;\n  line-height: 32px;\n  margin: 0;\n}\n.head-info em[data-v-35523232] {\n  background-color: #e8e8e8;\n  position: absolute;\n  height: 56px;\n  width: 1px;\n  top: 0;\n  right: 0;\n}\n",""])},i538:function(t,a,n){var e=n("bhDK");"string"==typeof e&&(e=[[t.i,e,""]]);var s={hmr:!0,transform:void 0,insertInto:void 0};n("aET+")(e,s);e.locals&&(t.exports=e.locals)},"vKj+":function(t,a,n){var e=n("hzdK");"string"==typeof e&&(e=[[t.i,e,""]]);var s={hmr:!0,transform:void 0,insertInto:void 0};n("aET+")(e,s);e.locals&&(t.exports=e.locals)}}]);