(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{"/J8n":function(t,a,e){"use strict";var s=e("sUCc");e.n(s).a},"9gkv":function(t,a){t.exports="/images/logo.png?c924155285cdba2f57cbd751674c1bb0"},YCEv:function(t,a,e){(t.exports=e("I1BE")(!1)).push([t.i,"\n.home[data-v-56fac6d6] {\n  width: 900px;\n  margin: 0 auto;\n  padding: 25px 0;\n}\n.home > .banner[data-v-56fac6d6] {\n  text-align: center;\n  padding: 25px 0;\n  margin: 25px 0;\n}\n",""])},rIsg:function(t,a,e){"use strict";e.r(a);var s=[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"banner"},[a("img",{staticStyle:{width:"64px",height:"64px"},attrs:{alt:"Vue logo",src:e("9gkv")}}),this._v(" "),a("h3",{staticStyle:{"margin-top":"1rem"}},[this._v("Welcome to Your Vue.js App")])])}],i=e("Riz+"),r=e("37cH"),n=e("uWBw"),o=e("3k+l"),l=e("rV4k"),c=e("F2k1"),v=e("q0+x"),m=r.a.AvatarItem,p=c.a.Option,d=v.e.Item,g={name:"Home",components:{NumberInfo:l.a,Ellipsis:o.a,CountDown:n.a,Trend:i.a,AvatarList:r.a,AvatarListItem:m,TagSelect:c.a,TagSelectOption:p,TagCloud:v.s,DescriptionList:v.e,DescriptionListItem:d},data:function(){return{targetTime:(new Date).getTime()+39e5,tagCloudData:[]}},created:function(){this.getTagCloudData()},methods:{onEndHandle:function(){this.$message.success("CountDown callback!!!")},onEndHandle2:function(){this.$notification.open({message:"Notification Title",description:"This is the content of the notification. This is the content of the notification. This is the content of the notification."})},getTagCloudData:function(){var t=this;this.$http.get("/data/antv/tag-cloud").then(function(a){t.tagCloudData=a.result})}}},_=(e("/J8n"),e("KHd+")),u=Object(_.a)(g,function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"home"},[t._m(0),t._v(" "),e("br"),t._v(" "),e("h2",[t._v("# Trend 组件 ")]),t._v(" "),e("a-divider",[t._v(" 正常 ")]),t._v(" "),e("a-card",[e("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"up"}},[e("span",{attrs:{slot:"term"},slot:"term"},[t._v("工资")]),t._v("\n      5%\n    ")]),t._v(" "),e("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"up"}},[e("span",{attrs:{slot:"term"},slot:"term"},[t._v("工作量")]),t._v("\n      50%\n    ")]),t._v(" "),e("trend",{attrs:{flag:"down"}},[e("span",{attrs:{slot:"term"},slot:"term"},[t._v("身体状态")]),t._v("\n      50%\n    ")])],1),t._v(" "),e("a-divider",[t._v(" 颜色反转 ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"up","reverse-color":!0}},[e("span",{attrs:{slot:"term"},slot:"term"},[t._v("工资")]),t._v("\n      5%\n    ")]),t._v(" "),e("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"down","reverse-color":!0}},[e("span",{attrs:{slot:"term"},slot:"term"},[t._v("工作量")]),t._v("\n      50%\n    ")])],1),t._v(" "),e("h2",[t._v("# AvatarList 组件 ")]),t._v(" "),e("a-divider",[t._v(" AvatarList ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("avatar-list",{attrs:{"max-length":3}},[e("avatar-list-item",{attrs:{tips:"Jake",src:"https://gw.alipayobjects.com/zos/rmsportal/zOsKZmFRdUtvpqCImOVY.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Andy",src:"https://gw.alipayobjects.com/zos/rmsportal/sfjbOqnsXXJgNCjCzDBL.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}})],1),t._v(" "),e("a-divider",{staticStyle:{margin:"0 16px"},attrs:{type:"vertical"}}),t._v(" "),e("avatar-list",{attrs:{size:"mini"}},[e("avatar-list-item",{attrs:{tips:"Jake",src:"https://gw.alipayobjects.com/zos/rmsportal/zOsKZmFRdUtvpqCImOVY.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Andy",src:"https://gw.alipayobjects.com/zos/rmsportal/sfjbOqnsXXJgNCjCzDBL.png"}}),t._v(" "),e("avatar-list-item",{attrs:{tips:"Niko",src:"https://gw.alipayobjects.com/zos/rmsportal/kZzEzemZyKLKFsojXItE.png"}})],1)],1),t._v(" "),e("h2",[t._v("# CountDown 组件 ")]),t._v(" "),e("a-divider",[t._v(" CountDown ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("count-down",{staticStyle:{"font-size":"2rem"},attrs:{target:(new Date).getTime()+3e6,"on-end":t.onEndHandle}}),t._v(" "),e("a-divider",{staticStyle:{margin:"0 16px"},attrs:{type:"vertical"}}),t._v(" "),e("count-down",{staticStyle:{"font-size":"2rem"},attrs:{target:(new Date).getTime()+1e4,"on-end":t.onEndHandle2}})],1),t._v(" "),e("h2",[t._v("# Ellipsis 组件 ")]),t._v(" "),e("a-divider",[t._v(" Ellipsis ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("ellipsis",{attrs:{length:100,tooltip:""}},[t._v("\n      There were injuries alleged in three cases in 2015, and a\n      fourth incident in September, according to the safety recall report. After meeting with US regulators in October, the firm decided to issue a voluntary recall.\n    ")])],1),t._v(" "),e("h2",[t._v("# NumberInfo 组件 ")]),t._v(" "),e("a-divider",[t._v(" NumberInfo ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("number-info",{attrs:{"sub-title":function(){return"Visits this week"},total:12321,status:"up","sub-total":17.1}})],1),t._v(" "),e("h2",[t._v("# TagSelect 组件 ")]),t._v(" "),e("a-divider",[t._v(" TagSelect ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("tag-select",[e("tag-select-option",{attrs:{value:"cat1"}},[t._v("类目1")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat2"}},[t._v("类目2")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat3"}},[t._v("类目3")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat4"}},[t._v("类目4")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat5"}},[t._v("类目5")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat6"}},[t._v("类目6")]),t._v(" "),e("tag-select-option",{attrs:{value:"cat7"}},[t._v("类目7")])],1)],1),t._v(" "),e("h2",[t._v("# DescriptionList 组件 ")]),t._v(" "),e("a-divider",[t._v(" DescriptionList ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("description-list",{attrs:{title:"组名称",size:"small"}},[e("description-list-item",{attrs:{term:"负责人"}},[t._v("林东东")]),t._v(" "),e("description-list-item",{attrs:{term:"角色码"}},[t._v("1234567")]),t._v(" "),e("description-list-item",{attrs:{term:"所属部门"}},[t._v("XX公司-YY部")]),t._v(" "),e("description-list-item",{attrs:{term:"过期时间"}},[t._v("2018-08-08")]),t._v(" "),e("description-list-item",{attrs:{term:"描述"}},[t._v("这段描述很长很长很长很长很长很长很长很长很长很长很长很长很长很长...")])],1)],1),t._v(" "),e("a-divider",[t._v(" TagCloud ")]),t._v(" "),e("a-card",{staticStyle:{"margin-bottom":"3rem"}},[e("tag-cloud",{attrs:{"tag-list":t.tagCloudData}})],1)],1)},s,!1,null,"56fac6d6",null);a.default=u.exports},sUCc:function(t,a,e){var s=e("YCEv");"string"==typeof s&&(s=[[t.i,s,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};e("aET+")(s,i);s.locals&&(t.exports=s.locals)}}]);