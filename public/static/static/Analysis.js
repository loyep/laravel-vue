(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{"1UeK":function(t,a,s){(t.exports=s("I1BE")(!1)).push([t.i,".extra-wrapper[data-v-658686ce] {\n  line-height: 55px;\n  padding-right: 24px;\n}\n.extra-wrapper .extra-item[data-v-658686ce] {\n  display: inline-block;\n  margin-right: 24px;\n}\n.extra-wrapper .extra-item a[data-v-658686ce] {\n  margin-left: 24px;\n}\n.antd-pro-pages-dashboard-analysis-twoColLayout[data-v-658686ce] {\n  position: relative;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  display: block;\n  -webkit-box-orient: horizontal;\n  -webkit-box-direction: normal;\n      -ms-flex-flow: row wrap;\n          flex-flow: row wrap;\n}\n.antd-pro-pages-dashboard-analysis-twoColLayout.desktop div[class^=ant-col][data-v-658686ce]:last-child {\n  position: absolute;\n  right: 0;\n  height: 100%;\n}\n.antd-pro-pages-dashboard-analysis-salesCard[data-v-658686ce] {\n  height: calc(100% - 24px);\n}\n.antd-pro-pages-dashboard-analysis-salesCard[data-v-658686ce] .ant-card-head {\n  position: relative;\n}\n.dashboard-analysis-iconGroup i[data-v-658686ce] {\n  margin-left: 16px;\n  color: rgba(0, 0, 0, 0.45);\n  cursor: pointer;\n  -webkit-transition: color 0.32s;\n  transition: color 0.32s;\n  color: black;\n}\n.analysis-salesTypeRadio[data-v-658686ce] {\n  position: absolute;\n  right: 54px;\n  bottom: 12px;\n}\n",""])},"8PPb":function(t,a,s){"use strict";var e=s("KFRM");s.n(e).a},KFRM:function(t,a,s){var e=s("1UeK");"string"==typeof e&&(e=[[t.i,e,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};s("aET+")(e,r);e.locals&&(t.exports=e.locals)},Si6x:function(t,a,s){"use strict";s.r(a);for(var e=s("wd/R"),r=s.n(e),o=s("q0+x"),i=s("JQcH"),n=[],l=0;l<7;l++)n.push({name:"白鹭岛 "+(l+1)+" 号店",total:1234.56-100*l});for(var d=[],c=0;c<7;c++)d.push({x:r()().add(c,"days").format("YYYY-MM-DD"),y:Math.ceil(10*Math.random())});for(var p=[{dataKey:"x",alias:"时间"},{dataKey:"y",alias:"用户数",min:0,max:10}],m=[{dataIndex:"index",title:"排名",width:90},{dataIndex:"keyword",title:"搜索关键词"},{dataIndex:"count",title:"用户数"},{dataIndex:"range",title:"周涨幅",align:"right",sorter:function(t,a){return t.range-a.range},scopedSlots:{customRender:"range"}}],v=[],g=0;g<50;g+=1)v.push({index:g+1,keyword:"搜索关键词-".concat(g),count:Math.floor(1e3*Math.random()),range:Math.floor(100*Math.random()),status:Math.floor(10*Math.random()%2)});var u=s("cQSq"),x=[{item:"家用电器",count:32.2},{item:"食用酒水",count:21},{item:"个护健康",count:17},{item:"服饰箱包",count:13},{item:"母婴产品",count:9},{item:"其他",count:7.8}],h=[{dataKey:"percent",min:0,formatter:".0%"}],_=(new u.View).source(x);_.transform({type:"percent",field:"count",dimension:"item",as:"percent"});var y=_.rows,f={name:"Analysis",mixins:[i.c],components:{ChartCard:o.d,MiniArea:o.i,MiniBar:o.j,MiniProgress:o.k,RankList:o.o,Bar:o.c,Trend:o.u,NumberInfo:o.m,MiniSmoothArea:o.l},data:function(){return{loading:!0,rankList:n,searchUserData:d,searchUserScale:p,searchTableColumns:m,searchData:v,pieScale:h,pieData:y,sourceData:x,pieStyle:{stroke:"#fff",lineWidth:1}}},created:function(){var t=this;setTimeout(function(){t.loading=!t.loading},1e3)}},b=(s("8PPb"),s("KHd+")),w=Object(b.a)(f,function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"page-header-index-wide"},[s("a-row",{attrs:{gutter:24}},[s("a-col",{style:{marginBottom:"24px"},attrs:{sm:24,md:12,xl:6}},[s("chart-card",{attrs:{loading:t.loading,title:"总销售额",total:"￥126,560"}},[s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{attrs:{type:"info-circle-o"}})],1),t._v(" "),s("div",[s("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"up"}},[s("span",{attrs:{slot:"term"},slot:"term"},[t._v("周同比")]),t._v("\n            12%\n          ")]),t._v(" "),s("trend",{attrs:{flag:"down"}},[s("span",{attrs:{slot:"term"},slot:"term"},[t._v("日同比")]),t._v("\n            11%\n          ")])],1),t._v(" "),s("template",{slot:"footer"},[t._v("日均销售额"),s("span",[t._v("￥ 234.56")])])],2)],1),t._v(" "),s("a-col",{style:{marginBottom:"24px"},attrs:{sm:24,md:12,xl:6}},[s("chart-card",{attrs:{loading:t.loading,title:"访问量",total:t._f("NumberFormat")(8846)}},[s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{attrs:{type:"info-circle-o"}})],1),t._v(" "),s("div",[s("mini-area")],1),t._v(" "),s("template",{slot:"footer"},[t._v("日访问量"),s("span",[t._v(" "+t._s(t._f("NumberFormat")("1234")))])])],2)],1),t._v(" "),s("a-col",{style:{marginBottom:"24px"},attrs:{sm:24,md:12,xl:6}},[s("chart-card",{attrs:{loading:t.loading,title:"支付笔数",total:t._f("NumberFormat")(6560)}},[s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{attrs:{type:"info-circle-o"}})],1),t._v(" "),s("div",[s("mini-bar")],1),t._v(" "),s("template",{slot:"footer"},[t._v("转化率 "),s("span",[t._v("60%")])])],2)],1),t._v(" "),s("a-col",{style:{marginBottom:"24px"},attrs:{sm:24,md:12,xl:6}},[s("chart-card",{attrs:{loading:t.loading,title:"运营活动效果",total:"78%"}},[s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{attrs:{type:"info-circle-o"}})],1),t._v(" "),s("div",[s("mini-progress",{attrs:{color:"rgb(19, 194, 194)",target:80,percentage:78,height:"8px"}})],1),t._v(" "),s("template",{slot:"footer"},[s("trend",{staticStyle:{"margin-right":"16px"},attrs:{flag:"down"}},[s("span",{attrs:{slot:"term"},slot:"term"},[t._v("同周比")]),t._v("\n            12%\n          ")]),t._v(" "),s("trend",{attrs:{flag:"up"}},[s("span",{attrs:{slot:"term"},slot:"term"},[t._v("日环比")]),t._v("\n            80%\n          ")])],1)],2)],1)],1),t._v(" "),s("a-card",{attrs:{loading:t.loading,bordered:!1,"body-style":{padding:"0"}}},[s("div",{staticClass:"salesCard"},[s("a-tabs",{attrs:{"default-active-key":"1",size:"large","tab-bar-style":{marginBottom:"24px",paddingLeft:"16px"}}},[s("div",{staticClass:"extra-wrapper",attrs:{slot:"tabBarExtraContent"},slot:"tabBarExtraContent"},[s("div",{staticClass:"extra-item"},[s("a",[t._v("今日")]),t._v(" "),s("a",[t._v("本周")]),t._v(" "),s("a",[t._v("本月")]),t._v(" "),s("a",[t._v("本年")])]),t._v(" "),s("a-range-picker",{style:{width:"256px"}})],1),t._v(" "),s("a-tab-pane",{key:"1",attrs:{loading:"true",tab:"销售额"}},[s("a-row",[s("a-col",{attrs:{xl:16,lg:12,md:12,sm:24,xs:24}},[s("bar",{attrs:{title:"销售额排行"}})],1),t._v(" "),s("a-col",{attrs:{xl:8,lg:12,md:12,sm:24,xs:24}},[s("rank-list",{attrs:{title:"门店销售排行榜",list:t.rankList}})],1)],1)],1),t._v(" "),s("a-tab-pane",{key:"2",attrs:{tab:"访问量"}},[s("a-row",[s("a-col",{attrs:{xl:16,lg:12,md:12,sm:24,xs:24}},[s("bar",{attrs:{title:"销售额趋势"}})],1),t._v(" "),s("a-col",{attrs:{xl:8,lg:12,md:12,sm:24,xs:24}},[s("rank-list",{attrs:{title:"门店销售排行榜",list:t.rankList}})],1)],1)],1)],1)],1)]),t._v(" "),s("div",{staticClass:"antd-pro-pages-dashboard-analysis-twoColLayout",class:t.isDesktop()?"desktop":""},[s("a-row",{attrs:{gutter:24}},[s("a-col",{attrs:{xl:12,lg:24,md:24,sm:24,xs:24}},[s("a-card",{style:{marginTop:"24px",minHeight:"500px"},attrs:{loading:t.loading,bordered:!1,title:"线上热门搜索"}},[s("a-dropdown",{attrs:{slot:"extra",trigger:["click"],placement:"bottomLeft"},slot:"extra"},[s("a",{staticClass:"ant-dropdown-link",attrs:{href:"#"}},[s("a-icon",{attrs:{type:"ellipsis"}})],1),t._v(" "),s("a-menu",{attrs:{slot:"overlay"},slot:"overlay"},[s("a-menu-item",[s("a",{attrs:{href:"javascript:;"}},[t._v("操作一")])]),t._v(" "),s("a-menu-item",[s("a",{attrs:{href:"javascript:;"}},[t._v("操作二")])])],1)],1),t._v(" "),s("a-row",{attrs:{gutter:68}},[s("a-col",{style:{marginBottom:" 24px"},attrs:{xs:24,sm:12}},[s("number-info",{attrs:{total:12321,"sub-total":17.1}},[s("span",{attrs:{slot:"subtitle"},slot:"subtitle"},[s("span",[t._v("搜索用户数")]),t._v(" "),s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{style:{marginLeft:"8px"},attrs:{type:"info-circle-o"}})],1)],1)]),t._v(" "),s("div",[s("mini-smooth-area",{style:{height:"45px"},attrs:{dataSource:t.searchUserData,scale:t.searchUserScale}})],1)],1),t._v(" "),s("a-col",{style:{marginBottom:" 24px"},attrs:{xs:24,sm:12}},[s("number-info",{attrs:{total:2.7,"sub-total":26.2,status:"down"}},[s("span",{attrs:{slot:"subtitle"},slot:"subtitle"},[s("span",[t._v("人均搜索次数")]),t._v(" "),s("a-tooltip",{attrs:{slot:"action",title:"指标说明"},slot:"action"},[s("a-icon",{style:{marginLeft:"8px"},attrs:{type:"info-circle-o"}})],1)],1)]),t._v(" "),s("div",[s("mini-smooth-area",{style:{height:"45px"},attrs:{dataSource:t.searchUserData,scale:t.searchUserScale}})],1)],1)],1),t._v(" "),s("div",{staticClass:"ant-table-wrapper"},[s("a-table",{attrs:{"row-key":"index",size:"small",columns:t.searchTableColumns,dataSource:t.searchData,pagination:{pageSize:5}},scopedSlots:t._u([{key:"range",fn:function(a,e){return s("span",{},[s("trend",{attrs:{flag:0===e.status?"up":"down"}},[t._v("\n                  "+t._s(a)+"%\n                ")])],1)}}])})],1)],1)],1),t._v(" "),s("a-col",{attrs:{xl:12,lg:24,md:24,sm:24,xs:24}},[s("a-card",{staticClass:"antd-pro-pages-dashboard-analysis-salesCard",style:{marginTop:"24px",minHeight:"500px"},attrs:{loading:t.loading,bordered:!1,title:"销售额类别占比"}},[s("div",{staticStyle:{height:"inherit"},attrs:{slot:"extra"},slot:"extra"},[s("span",{staticClass:"dashboard-analysis-iconGroup"},[s("a-dropdown",{attrs:{trigger:["click"],placement:"bottomLeft"}},[s("a-icon",{staticClass:"ant-dropdown-link",attrs:{type:"ellipsis"}}),t._v(" "),s("a-menu",{attrs:{slot:"overlay"},slot:"overlay"},[s("a-menu-item",[s("a",{attrs:{href:"javascript:;"}},[t._v("操作一")])]),t._v(" "),s("a-menu-item",[s("a",{attrs:{href:"javascript:;"}},[t._v("操作二")])])],1)],1)],1),t._v(" "),s("div",{staticClass:"analysis-salesTypeRadio"},[s("a-radio-group",{attrs:{defaultValue:"a"}},[s("a-radio-button",{attrs:{value:"a"}},[t._v("全部渠道")]),t._v(" "),s("a-radio-button",{attrs:{value:"b"}},[t._v("线上")]),t._v(" "),s("a-radio-button",{attrs:{value:"c"}},[t._v("门店")])],1)],1)]),t._v(" "),s("h4",[t._v("销售额")]),t._v(" "),s("div",[s("div",[s("v-chart",{attrs:{"force-fit":!0,height:405,data:t.pieData,scale:t.pieScale}},[s("v-tooltip",{attrs:{showTitle:!1,dataKey:"item*percent"}}),t._v(" "),s("v-axis"),t._v(" "),s("v-legend",{attrs:{dataKey:"item"}}),t._v(" "),s("v-pie",{attrs:{position:"percent",color:"item",vStyle:t.pieStyle}}),t._v(" "),s("v-coord",{attrs:{type:"theta",radius:.75,innerRadius:.6}})],1)],1)])])],1)],1)],1)],1)},[],!1,null,"658686ce",null);a.default=w.exports}}]);