!function($,e,t,o){function n(e,t){return e[t]===o?p[t]:e[t]}function a(){var t=e.pageYOffset;return t===o?v.scrollTop:t}function i(e,t){var o=p["on"+e];o&&(w(o)?o.call(t[0]):(o.addClass&&t.addClass(o.addClass),o.removeClass&&t.removeClass(o.removeClass))),t.trigger("lazy"+e,[t]),c()}function r(e){i(e.type,$(this).off(g,r))}function l(t){if(b.length){t=t||p.forceLoad,I=1/0;var o=a(),n=e.innerHeight||v.clientHeight,l=e.innerWidth||v.clientWidth,s,c;for(s=0,c=b.length;s<c;s++){var d=b[s],f=d[0],h=d[u],m=!1,y=t||E(f,A)<0,C;if($.contains(v,f)){if(t||!h.visibleOnly||f.offsetWidth||f.offsetHeight){if(!y){var z=f.getBoundingClientRect(),T=h.edgeX,B=h.edgeY;C=z.top+o-B-n,y=C<=o&&z.bottom>-B&&z.left<=l+T&&z.right>-T}if(y){d.on(g,r),i("show",d);var L=h.srcAttr,X=w(L)?L(d):f.getAttribute(L);X&&(f.src=X),m=!0}else C<I&&(I=C)}}else m=!0;m&&(E(f,A,0),b.splice(s--,1),c--)}c||i("complete",$(v))}}function s(){T>1?(T=1,l(),setTimeout(s,p.throttle)):T=0}function c(t){b.length&&(t&&"scroll"===t.type&&t.currentTarget===e&&I>=a()||(T||setTimeout(s,0),T=2))}function d(){C.lazyLoadXT()}function f(){l(!0)}var u="lazyLoadXT",A="lazied",g="load error",h="lazy-hidden",v=t.documentElement||t.body,m=e.onscroll===o||!!e.operamini||!v.getBoundingClientRect,p={autoInit:!0,selector:"img[data-src]",blankImage:"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",throttle:99,forceLoad:m,loadEvent:"pageshow",updateEvent:"load orientationchange resize scroll touchmove focus",forceEvent:"lazyloadall",oninit:{removeClass:"lazy"},onshow:{addClass:h},onload:{removeClass:h,addClass:"lazy-loaded"},onerror:{removeClass:h},checkDuplicates:!0},y={srcAttr:"data-src",edgeX:0,edgeY:0,visibleOnly:!0},C=$(e),w=$.isFunction,z=$.extend,E=$.data||function(e,t){return $(e).data(t)},b=[],I=0,T=0;$[u]=z(p,y,$[u]),$.fn[u]=function(t){t=t||{};var o=n(t,"blankImage"),a=n(t,"checkDuplicates"),r=n(t,"scrollContainer"),l=n(t,"show"),s={},d;$(r).on("scroll",c);for(d in y)s[d]=n(t,d);return this.each(function(n,r){if(r===e)$(p.selector).lazyLoadXT(t);else{var d=a&&E(r,A),f=$(r).data(A,l?-1:1);if(d)return void c();o&&"IMG"===r.tagName&&!r.src&&(r.src=o),f[u]=z({},s),i("init",f),b.push(f),c()}})},$(t).ready(function(){i("start",C),C.on(p.updateEvent,c).on(p.forceEvent,f),$(t).on(p.updateEvent,c),p.autoInit&&(C.on(p.loadEvent,d),d())})}(window.jQuery||window.Zepto||window.$,window,document);