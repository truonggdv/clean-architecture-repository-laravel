!function(t){var e={};function o(n){if(e[n])return e[n].exports;var l=e[n]={i:n,l:!1,exports:{}};return t[n].call(l.exports,l,l.exports,o),l.l=!0,l.exports}o.m=t,o.c=e,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var l in t)o.d(n,l,function(e){return t[e]}.bind(null,l));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="/",o(o.s=687)}({687:function(t,e,o){t.exports=o(688)},688:function(t,e,o){"use strict";var n={init:function(){var t,e;!function(){var t=$("#kt_dual_listbox_1"),e=[];t.children("option").each((function(){var t=$(this).val(),o=$(this).text();e.push({text:o,value:t})})),new DualListbox(t.get(0),{addEvent:function(t){console.log(t)},removeEvent:function(t){console.log(t)},availableTitle:"Available options",selectedTitle:"Selected options",addButtonText:"Add",removeButtonText:"Remove",addAllButtonText:"Add All",removeAllButtonText:"Remove All",options:e})}(),function(){var t=$("#kt_dual_listbox_2"),e=[];t.children("option").each((function(){var t=$(this).val(),o=$(this).text();e.push({text:o,value:t})})),new DualListbox(t.get(0),{addEvent:function(t){console.log(t)},removeEvent:function(t){console.log(t)},availableTitle:"Source Options",selectedTitle:"Destination Options",addButtonText:"<i class='flaticon2-next'></i>",removeButtonText:"<i class='flaticon2-back'></i>",addAllButtonText:"<i class='flaticon2-fast-next'></i>",removeAllButtonText:"<i class='flaticon2-fast-back'></i>",options:e})}(),function(){var t=$("#kt_dual_listbox_3"),e=[];t.children("option").each((function(){var t=$(this).val(),o=$(this).text();e.push({text:o,value:t})})),new DualListbox(t.get(0),{addEvent:function(t){console.log(t)},removeEvent:function(t){console.log(t)},availableTitle:"Available options",selectedTitle:"Selected options",addButtonText:"Add",removeButtonText:"Remove",addAllButtonText:"Add All",removeAllButtonText:"Remove All",options:e})}(),t=$("#kt_dual_listbox_4"),e=[],t.children("option").each((function(){var t=$(this).val(),o=$(this).text();e.push({text:o,value:t})})),new DualListbox(t.get(0),{addEvent:function(t){console.log(t)},removeEvent:function(t){console.log(t)},availableTitle:"Available options",selectedTitle:"Selected options",addButtonText:"Add",removeButtonText:"Remove",addAllButtonText:"Add All",removeAllButtonText:"Remove All",options:e}).search.classList.add("dual-listbox__search--hidden")}};jQuery(document).ready((function(){n.init()}))}});