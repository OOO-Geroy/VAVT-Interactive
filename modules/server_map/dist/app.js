!function(t){function e(e){for(var r,s,l=e[0],a=e[1],c=e[2],d=0,h=[];d<l.length;d++)s=l[d],Object.prototype.hasOwnProperty.call(n,s)&&n[s]&&h.push(n[s][0]),n[s]=0;for(r in a)Object.prototype.hasOwnProperty.call(a,r)&&(t[r]=a[r]);for(u&&u(e);h.length;)h.shift()();return o.push.apply(o,c||[]),i()}function i(){for(var t,e=0;e<o.length;e++){for(var i=o[e],r=!0,l=1;l<i.length;l++){var a=i[l];0!==n[a]&&(r=!1)}r&&(o.splice(e--,1),t=s(s.s=i[0]))}return t}var r={},n={0:0},o=[];function s(e){if(r[e])return r[e].exports;var i=r[e]={i:e,l:!1,exports:{}};return t[e].call(i.exports,i,i.exports,s),i.l=!0,i.exports}s.m=t,s.c=r,s.d=function(t,e,i){s.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},s.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},s.t=function(t,e){if(1&e&&(t=s(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(s.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)s.d(i,r,function(e){return t[e]}.bind(null,r));return i},s.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return s.d(e,"a",e),e},s.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},s.p="./";var l=window.webpackJsonp=window.webpackJsonp||[],a=l.push.bind(l);l.push=e,l=l.slice();for(var c=0;c<l.length;c++)e(l[c]);var u=a;o.push([11,1]),i()}({1:function(t,e,i){},11:function(t,e,i){"use strict";i.r(e);i(1);var r=i(0),n=i.n(r),o=document.documentElement.lang||"en",s={"reset filter":{"de-DE":"filter zurücksetzen"},search:{"de-DE":"suche"},review:{"de-DE":"rezension"},site:{"de-DE":"seite"},"click for more information":{"de-DE":"Klicken Sie für weitere Informationen"},"search vpn provider":{"de-DE":"Suche VPN-Anbieter"}};function l(t){return s[t][o]||t}var a,c=function(t,e,i,r){return new(i||(i=Promise))((function(n,o){function s(t){try{a(r.next(t))}catch(t){o(t)}}function l(t){try{a(r.throw(t))}catch(t){o(t)}}function a(t){var e;t.done?n(t.value):(e=t.value,e instanceof i?e:new i((function(t){t(e)}))).then(s,l)}a((r=r.apply(t,e||[])).next())}))},u=function(t,e){var i,r,n,o,s={label:0,sent:function(){if(1&n[0])throw n[1];return n[1]},trys:[],ops:[]};return o={next:l(0),throw:l(1),return:l(2)},"function"==typeof Symbol&&(o[Symbol.iterator]=function(){return this}),o;function l(o){return function(l){return function(o){if(i)throw new TypeError("Generator is already executing.");for(;s;)try{if(i=1,r&&(n=2&o[0]?r.return:o[0]?r.throw||((n=r.return)&&n.call(r),0):r.next)&&!(n=n.call(r,o[1])).done)return n;switch(r=0,n&&(o=[2&o[0],n.value]),o[0]){case 0:case 1:n=o;break;case 4:return s.label++,{value:o[1],done:!1};case 5:s.label++,r=o[1],o=[0];continue;case 7:o=s.ops.pop(),s.trys.pop();continue;default:if(!(n=s.trys,(n=n.length>0&&n[n.length-1])||6!==o[0]&&2!==o[0])){s=0;continue}if(3===o[0]&&(!n||o[1]>n[0]&&o[1]<n[3])){s.label=o[1];break}if(6===o[0]&&s.label<n[1]){s.label=n[1],n=o;break}if(n&&s.label<n[2]){s.label=n[2],s.ops.push(o);break}n[2]&&s.ops.pop(),s.trys.pop();continue}o=e.call(t,s)}catch(t){o=[6,t],r=0}finally{i=n=0}if(5&o[0])throw o[1];return{value:o[0]?o[1]:void 0,done:!0}}([o,l])}}};!function(t){var e=parseInt(getComputedStyle(document.documentElement).getPropertyValue("--s_pad")),i=parseInt(getComputedStyle(document.documentElement).getPropertyValue("--s_mob"));function r(){return window.innerWidth<=e}function o(){return window.innerWidth<=i}t.init=function(){new s(a)};var s=function(){function t(t){this.box=document.querySelector(".chart-map-container"),this.containerEl=this.box.querySelector(".chart-map"),this.filterInput=this.box.querySelector(".providers-search"),this.listEl=this.box.querySelector(".providers-list"),this.showBtn=this.box.querySelector(".providers-btn-show"),this.resetBtn=this.box.querySelector(".chart-btn-reset"),this.selectedRegion="",this.init(t)}return Object.defineProperty(t.prototype,"search",{get:function(){return this.filterInput.value},enumerable:!1,configurable:!0}),t.prototype.init=function(t){return c(this,void 0,void 0,(function(){return u(this,(function(e){switch(e.label){case 0:return e.trys.push([0,2,,3]),[4,this.loadData()];case 1:return e.sent(),this.drawerStrategy=(i=t,r=this.containerEl,n=this.vpnMap,new i(r,n)),this.drawerStrategy.subscribeResetRegion(this.onResetSelection.bind(this)),this.drawerStrategy.subscribeRegionSelect(this.onSelectRegion.bind(this)),this.localizeUI(),this.bindFilter(),this.bindProvidersShowBtn(),this.bindReset(),this.renderList(),[3,3];case 2:return e.sent(),[3,3];case 3:return[2]}var i,r,n}))}))},t.prototype.localizeUI=function(){this.resetBtn.textContent=l("reset filter"),this.filterInput.placeholder=l("search")+"...",this.filterInput.setAttribute("aria-label",l("search vpn provider"))},t.prototype.draw=function(){this.drawerStrategy.draw()},t.prototype.onSelectRegion=function(t){var e=this,i=t.region;this.selectedRegion!==i&&(this.selectedRegion=i,this.renderList(),setTimeout((function(){return e.showProviders()})))},t.prototype.onResetSelection=function(){this.selectedRegion="",this.renderList()},t.prototype.bindFilter=function(){this.filterInput.addEventListener("input",this.onSearchInput.bind(this)),this.filterInput.addEventListener("keydown",(function(t){13==t.keyCode&&this.blur()}))},t.prototype.bindProviderSelect=function(){var t=this;this.listEl.querySelectorAll(".providers-el").forEach((function(e){e.addEventListener("click",(function(){t.onClickProvider(+this.dataset.id,this)}))}))},t.prototype.bindReset=function(){this.resetBtn.addEventListener("click",this.reset.bind(this))},t.prototype.reset=function(){this.selectedProvider=null,this.selectedRegion="",this.filterInput.value="",this.renderList(),this.drawerStrategy.draw()},t.prototype.onSearchInput=function(){var t=this;this.renderList(),setTimeout((function(){return t.showProviders()}))},t.prototype.filter=function(){return this.filterProvidersByRegion().filter(this.filterProvidersByName.bind(this))},t.prototype.filterProvidersByRegion=function(){var t=this,e=this.vpnMap.mapList.find((function(e){return e.countryCode===t.selectedRegion}));return e&&this.selectedRegion?e.providers:Object.keys(this.vpnMap.providers).map((function(t){return+t}))},t.prototype.filterProvidersByName=function(t){var e,i,r=new RegExp(""+(e=this.search,i=RegExp("["+["-","[","]","/","{","}","(",")","*","+","?",".","\\","^","$","|"].join("\\")+"]","g"),e.replace(i,"\\$&")),"gi");return!!this.vpnMap.providers[t].name.match(r)},t.prototype.loadData=function(){return c(this,void 0,void 0,(function(){var t,e;return u(this,(function(i){switch(i.label){case 0:return i.trys.push([0,3,,4]),[4,fetch("/wp-json/vavt-interactive/v1/server_map_json")];case 1:return t=i.sent(),e=this,[4,t.json()];case 2:return e.vpnMap=i.sent(),[3,4];case 3:return i.sent(),[3,4];case 4:return[2]}}))}))},t.prototype.renderList=function(){return c(this,void 0,void 0,(function(){var t;return u(this,(function(e){switch(e.label){case 0:return t=this.listEl,[4,this.genHtmlListByProviders(this.filter())];case 1:return t.innerHTML=e.sent(),this.bindProviderSelect(),[2]}}))}))},t.prototype.genHtmlListByProviders=function(t){return c(this,void 0,void 0,(function(){var e=this;return u(this,(function(i){return[2,t.map((function(t){return{provider:e.vpnMap.providers[t],id:t}})).sort((function(t,e){var i=t.provider,r=e.provider;return i.priority<r.priority&&i.order>r.order?1:i.priority>r.priority||i.order>r.order?-1:i.priority<r.priority||i.order<r.order?1:0})).reduce((function(t,i){var r=i.provider,n=i.id;return t+'\n            <div class="providers-el'+(n===e.selectedProvider?" providers-el--active":"")+'" data-id="'+n+'">\n              <div class="providers-el__logo">\n                <img src="'+r.logo+'" alt="">\n              </div>\n              <div class="providers-el__content">\n                <div class="providers-el__title">'+r.name+"</div>\n                "+((r.affLink||r.revLink)&&'\n                  <div class="providers-el__links">\n                    '+(r.revLink&&'<a class="providers-el__link providers-el__review" target="_blank" href="'+r.revLink+'"><i class="fas fa-external-link-alt"></i><span>'+l("review")+"</span></a>")+"\n                    "+(r.affLink&&'<a class="providers-el__link providers-el__site" target="_blank" rel="noopener"  href="'+r.affLink+'"><i class="fas fa-globe"></i><span>'+l("site")+"</span></a>")+"\n                  </div>\n                    ")+"\n                \n              </div>\n              "+(1===r.priority?'<div class="providers-el__extra"><i class="fas fa-star"></i></div>':"")+"\n          </div>\n        "}),"")||'<div class="providers-no-results">No results found</div>']}))}))},t.prototype.onClickProvider=function(t,e){var i=this,r=this.listEl.querySelector(".providers-el--active");r&&r.classList.remove("providers-el--active"),this.selectedProvider!==t?(this.selectedProvider=t,e.classList.add("providers-el--active"),queueMicrotask((function(){var e=i.vpnMap.mapList.filter((function(e){return e.providers.includes(t)}));i.drawerStrategy.draw(e)}))):queueMicrotask((function(){i.selectedProvider=null,i.drawerStrategy.draw(i.vpnMap.mapList)}))},t.prototype.bindProvidersShowBtn=function(){this.showBtn.addEventListener("click",this.toggleProviders.bind(this))},t.prototype.toggleProviders=function(){this.listEl.classList.contains("providers-list--showed")?this.hideProviders():this.showProviders()},t.prototype.showProviders=function(){var t=this;if(!r()&&!this.listEl.classList.contains("providers-list--showed")){var e=parseInt(getComputedStyle(this.listEl).maxHeight),i=Math.min(this.listEl.scrollHeight+1,e);this.listEl.style.transitionDuration=i/e*600+"ms",this.listEl.style.height=i+"px",this.listEl.classList.add("providers-list--showed"),this.showBtn.classList.add("providers-btn-show--opened"),this.listEl.addEventListener("transitionend",(function(){t.listEl.style.height=null,t.listEl.style.transitionDuration=null,t.listEl.style.overflow="auto"}),{once:!0})}},t.prototype.hideProviders=function(){var t=this;if(!r()&&this.listEl.classList.contains("providers-list--showed")){var e=parseInt(getComputedStyle(this.listEl).maxHeight),i=Math.min(this.listEl.scrollHeight+1,e);this.listEl.style.transitionDuration=i/e*600+"ms",this.listEl.style.height=i+"px",setTimeout((function(){t.listEl.style.height="0px",t.listEl.style.overflow=null,t.listEl.classList.remove("providers-list--showed"),t.showBtn.classList.remove("providers-btn-show--opened")}),16),this.listEl.addEventListener("transitionend",(function(){t.listEl.style.height=null,t.listEl.style.transitionDuration=null}),{once:!0})}},t}(),a=function(){function t(t,e){var i=this;this.regionClickSubscribers=[],this.resetRegionSubscribers=[],this.onRegionClick=function(t){i.currentMapList.some((function(e){return e.countryCode===t.region}))&&(i.unbindSelection(),setTimeout((function(){return i.bindSelection()})),i.regionClickSubscribers.forEach((function(e){return e(t)})))},this.onGoogleSelection=function(t){i.gChart.getSelection().length||i.resetRegionSubscribers.forEach((function(t){return t()}))},this.vpnMap=e,this.containerEl=t,this.loadGoogleChart()}return t.prototype.draw=function(t){void 0===t&&(t=this.vpnMap.mapList),this.currentMapList=t,this.drawGooogleChart(t)},t.prototype.subscribeRegionSelect=function(t){this.regionClickSubscribers.push(t)},t.prototype.subscribeResetRegion=function(t){this.resetRegionSubscribers.push(t)},t.prototype.loadGoogleChart=function(){google.charts.load("current",{packages:["geochart"],mapsApiKey:"AIzaSyBc74cl1-7D6F09eOzHtx5A9DwHQLQBrro"}),google.charts.setOnLoadCallback(this.initGoogleChart.bind(this))},t.prototype.initGoogleChart=function(){this.gChart=new google.visualization.GeoChart(this.containerEl),this.draw(),google.visualization.events.addListener(this.gChart,"ready",this.initZoomDrag.bind(this)),this.bindRegionClick(),this.bindSelection(),window.addEventListener("resize",this.resizeGoogleChart.bind(this))},t.prototype.bindRegionClick=function(){google.visualization.events.addListener(this.gChart,"regionClick",this.onRegionClick.bind(this))},t.prototype.bindSelection=function(){this.selectionEvent=google.visualization.events.addListener(this.gChart,"select",this.onGoogleSelection)},t.prototype.unbindSelection=function(){google.visualization.events.removeListener(this.selectionEvent)},t.prototype.drawGooogleChart=function(t){void 0===t&&(t=this.vpnMap.mapList),this.gChart.draw(this.fillGoogleTable(t),{legend:"none",colorAxis:{colors:["#dadada","#b5b5b5","#00b3e3","#008de3","#4886d6","#0a4bbf","#7a76ff","#6329ea"]},datalessRegionColor:"#f3f3f3",tooltip:{textStyle:{fontSize:14}}})},t.prototype.fillGoogleTable=function(t){void 0===t&&(t=this.vpnMap.mapList);var e=this.transformDataForGoogle(t),i=new google.visualization.DataTable;return i.addColumn("string","Country"),i.addColumn("number","Count"),i.addColumn({type:"string",role:"tooltip"}),i.addRows(e),i},t.prototype.resizeGoogleChart=function(){this.draw()},t.prototype.initZoomDrag=function(){var t=n()(this.containerEl.querySelector("g[clip-path]"),{zoomSpeed:.06,maxZoom:o()?3:1.2,minZoom:1,smoothScroll:!1,beforeWheel:function(t){},onTouch:function(t){return!1}});o()&&t.moveTo(0,20)},t.prototype.transformDataForGoogle=function(t){return void 0===t&&(t=this.vpnMap.mapList),t.map((function(t){return[{v:t.countryCode,f:t.countryName},t.providers.length,l("click for more information")]}))},t}()}(a||(a={})),console.info((a.init(),"📜 vpn servers map initialized"))}});