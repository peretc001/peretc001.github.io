(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0bd16c"],{"2b06":function(t,e,o){"use strict";o.r(e);var i=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"container"},[o("div",{staticClass:"form__title"},[t._v("\n        Как Вы планируете покупать квартиру?\n    ")]),o("div",{staticClass:"form__items"},[o("div",{staticClass:"form__item"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.housingStock1,expression:"housingStock1"}],attrs:{type:"checkbox",id:"cash",required:"",value:"cash"},domProps:{checked:Array.isArray(t.housingStock1)?t._i(t.housingStock1,"cash")>-1:t.housingStock1},on:{change:function(e){var o=t.housingStock1,i=e.target,a=!!i.checked;if(Array.isArray(o)){var s="cash",c=t._i(o,s);i.checked?c<0&&(t.housingStock1=o.concat([s])):c>-1&&(t.housingStock1=o.slice(0,c).concat(o.slice(c+1)))}else t.housingStock1=a}}}),o("label",{attrs:{for:"cash"}},[t._v("за наличные")])]),o("div",{staticClass:"form__item"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.housingStock2,expression:"housingStock2"}],attrs:{type:"checkbox",id:"mortgage",required:"",value:"mortgage"},domProps:{checked:Array.isArray(t.housingStock2)?t._i(t.housingStock2,"mortgage")>-1:t.housingStock2},on:{change:function(e){var o=t.housingStock2,i=e.target,a=!!i.checked;if(Array.isArray(o)){var s="mortgage",c=t._i(o,s);i.checked?c<0&&(t.housingStock2=o.concat([s])):c>-1&&(t.housingStock2=o.slice(0,c).concat(o.slice(c+1)))}else t.housingStock2=a}}}),o("label",{attrs:{for:"mortgage"}},[t._v("в ипотеку")])]),o("div",{staticClass:"form__item"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.housingStock3,expression:"housingStock3"}],attrs:{type:"checkbox",id:"installments",required:"",value:"installments"},domProps:{checked:Array.isArray(t.housingStock3)?t._i(t.housingStock3,"installments")>-1:t.housingStock3},on:{change:function(e){var o=t.housingStock3,i=e.target,a=!!i.checked;if(Array.isArray(o)){var s="installments",c=t._i(o,s);i.checked?c<0&&(t.housingStock3=o.concat([s])):c>-1&&(t.housingStock3=o.slice(0,c).concat(o.slice(c+1)))}else t.housingStock3=a}}}),o("label",{attrs:{for:"installments"}},[t._v("в рассрочку")])]),o("div",{staticClass:"form__item"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.housingStock4,expression:"housingStock4"}],attrs:{type:"checkbox",id:"capital",required:"",value:"capital"},domProps:{checked:Array.isArray(t.housingStock4)?t._i(t.housingStock4,"capital")>-1:t.housingStock4},on:{change:function(e){var o=t.housingStock4,i=e.target,a=!!i.checked;if(Array.isArray(o)){var s="capital",c=t._i(o,s);i.checked?c<0&&(t.housingStock4=o.concat([s])):c>-1&&(t.housingStock4=o.slice(0,c).concat(o.slice(c+1)))}else t.housingStock4=a}}}),o("label",{attrs:{for:"capital"}},[t._v("материнский капитал")])]),o("div",{staticClass:"form__item"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.housingStock5,expression:"housingStock5"}],attrs:{type:"checkbox",id:"militaryMortgage",required:"",value:"militaryMortgage"},domProps:{checked:Array.isArray(t.housingStock5)?t._i(t.housingStock5,"militaryMortgage")>-1:t.housingStock5},on:{change:function(e){var o=t.housingStock5,i=e.target,a=!!i.checked;if(Array.isArray(o)){var s="militaryMortgage",c=t._i(o,s);i.checked?c<0&&(t.housingStock5=o.concat([s])):c>-1&&(t.housingStock5=o.slice(0,c).concat(o.slice(c+1)))}else t.housingStock5=a}}}),o("label",{attrs:{for:"militaryMortgage"}},[t._v("военная ипотека")])])])])},a=[],s={name:"SeventhStep",computed:{housingStock1:{get:function(){return this.$store.state.form.SeventhStep.cash},set:function(t){var e={input:"SeventhStep",name:"cash",value:t};this.$store.commit("updateForm",e)}},housingStock2:{get:function(){return this.$store.state.form.SeventhStep.mortgage},set:function(t){var e={input:"SeventhStep",name:"mortgage",value:t};this.$store.commit("updateForm",e)}},housingStock3:{get:function(){return this.$store.state.form.SeventhStep.installments},set:function(t){var e={input:"SeventhStep",name:"installments",value:t};this.$store.commit("updateForm",e)}},housingStock4:{get:function(){return this.$store.state.form.SeventhStep.capital},set:function(t){var e={input:"SeventhStep",name:"capital",value:t};this.$store.commit("updateForm",e)}},housingStock5:{get:function(){return this.$store.state.form.SeventhStep.militaryMortgage},set:function(t){var e={input:"SeventhStep",name:"militaryMortgage",value:t};this.$store.commit("updateForm",e)}}}},c=s,n=o("2877"),r=Object(n["a"])(c,i,a,!1,null,"7c30716c",null);e["default"]=r.exports}}]);
//# sourceMappingURL=chunk-2d0bd16c.ccccef1e.js.map