!function(e){function t(a){if(n[a])return n[a].exports;var r=n[a]={i:a,l:!1,exports:{}};return e[a].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,a){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:a})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});n(1)},function(e,t,n){"use strict";var a=n(2),r=(n.n(a),n(3)),i=(n.n(r),n(4)),s=n(5),l=n(6),u=wp.i18n.__;(0,wp.blocks.registerBlockType)("employees/employee-name-block",{title:u("Employee Name"),icon:"nametag",category:"employees",keywords:[u("Employee Name"),u("Employees")],attributes:l.a,edit:function(e){return wp.element.createElement(i.a,e)},save:function(e){return wp.element.createElement(s.a,e)}})},function(e,t){},function(e,t){},function(e,t,n){"use strict";var a=wp.i18n.__,r=wp.components.TextControl,i=function(e){var t=e.setAttributes,n=e.attributes,i=n.prefix,s=n.nameFirst,l=n.nameLast,u=n.suffix;return wp.element.createElement("div",{className:"employee-name-edit-wrap"},wp.element.createElement(r,{className:"field-prefix",label:a("Prefix"),onChange:function(e){return t({prefix:e})},value:i}),wp.element.createElement(r,{className:"field-name-first",label:a("First Name"),onChange:function(e){return t({nameFirst:e})},value:s}),wp.element.createElement(r,{className:"field-name-last",label:a("Last Name"),onChange:function(e){return t({nameLast:e})},value:l}),wp.element.createElement(r,{className:"field-suffix",label:a("Suffix"),onChange:function(e){return t({suffix:e})},value:u}))};t.a=i},function(e,t,n){"use strict";var a=function(e){var t=e.attributes.jobTitle;return wp.element.createElement("div",{className:e.className},t)};t.a=a},function(e,t,n){"use strict";t.a={prefix:{type:"string",source:"meta",meta:"prefix"},nameFirst:{type:"string",source:"meta",meta:"nameFirst"},nameLast:{type:"string",source:"meta",meta:"nameLast"},suffix:{type:"string",source:"meta",meta:"suffix"}}}]);