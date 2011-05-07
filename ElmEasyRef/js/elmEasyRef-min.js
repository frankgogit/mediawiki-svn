/*
 * ElmEasyRef v 0.8.2b:
 * Add popup field to display reference's content
 * When user click on reference he would be not jumped down to "References" section.
 * Text will be shown in popup field
 *
 * This is compressed version of elmEasyRef.js
 *
 * author: Elancev Michael
 */
function elm_addEvent(d,c,b){if(d.addEventListener){d.addEventListener(c,b,false)}else{var a=d;d.attachEvent("on"+c,function(){var e={target:window.event.srcElement,currentTarget:a,ctrlKey:window.event.ctrlKey,keyCode:window.event.keyCode,eventObj:window.event,preventDefault:function(){this.eventObj.returnValue=false},stopPropagation:function(){this.eventObj.cancelBubble=true}};return b.apply(a,[e])})}}function elm_hasClass(e,f){var c=e.className;if(c==f){return true}var a=/\s+/;if(!a.test(c)){return false}var d=c.split(a);for(var b=0;b<d.length;b++){if(d[b]==f){return true}}return false}function elm_getElementsByClassName(b,e){if(b.getElementsByClassName){return b.getElementsByClassName(e)}else{var c=b.getElementsByTagName("*");if(!e){return c}var d=[];for(var a=0;a<c.length;a++){if(elm_hasClass(c[a],e)){d.push(c[a])}}return d}}function elm_getWindowSize(){if(typeof(window.innerWidth)=="number"){return{x:window.innerWidth,y:window.innerHeight}}else{if(document.documentElement&&typeof(document.documentElement.clientWidth)=="number"){return{x:document.documentElement.clientWidth,y:document.documentElement.clientHeight}}else{return false}}}function elm_getWindowScroll(){if(typeof(window.pageYOffset)=="number"){return{x:window.pageXOffset,y:window.pageYOffset}}else{if(document.body&&(document.body.scrollLeft||document.body.scrollTop)){return{x:document.body.scrollLeft,y:document.body.scrollTop}}else{if(document.documentElement&&typeof(document.documentElement.scrollLeft)=="number"){return{x:document.documentElement.scrollLeft,y:document.documentElement.scrollTop}}else{return false}}}}var elmEasyRef={debug:false,references:null,refField:null,refText:null,bodyContentId:"bodyContent",regRefNum_rp:/(<.*?>)/,regRefNum_mt:/([0-9]+)/,messages:{elm_easyref_ref:"Reference $1",elm_easyref_close:"Close"},animation:{enable:true,delay:50,stepw:2,steph:3},fieldm:{min_width:140,min_height:40,col_width:400,col_height:140,exp_width:400,exp_height:380},lastRef:null,prepare:function(){var c=document.getElementById(this.bodyContentId);if(!c){if(this.debug){alert("bodyContent node not found")}return}var a=elm_getElementsByClassName(c,"reference");for(var b=0;b<a.length;b++){if(a[b].firstChild&&a[b].firstChild.tagName=="A"){elm_addEvent(a[b].firstChild,"click",this.refClickListener)}}if(a.length){this.references=elm_getElementsByClassName(c,"references")[0];if(!this.references){if(this.debug){alert("References block not found")}return}this.refText=document.createElement("div")}elm_addEvent(document.body,"mousedown",function(d){if(elmEasyRef.refField&&elmEasyRef.refField.is_shown&&elmEasyRef.lastRef!=d.target&&!elmEasyRef.refField.isInsideField(d.target)){elmEasyRef.refField.hide()}});elm_addEvent(window,"resize",function(d){if(elmEasyRef.refField&&elmEasyRef.refField.is_shown){elmEasyRef.refField.updatePos()}})},refClickListener:function(b){var c=b.currentTarget,a=elmEasyRef.refField;if(elmEasyRef.lastRef==c&&a&&a.is_shown){a.hide()}else{if(!elmEasyRef.showRefField(c)){return}}b.preventDefault();elmEasyRef.lastRef=c},showRefField:function(b){var a=document.getElementById(b.hash.substr(1));if(!a){if(this.debug){alert("Reference content not found")}return false}this.refText.innerHTML=a.innerHTML;this.cutUselessNodes(this.refText);if(!this.refField){this.refField=new ElmEasyRefField()}this.refField.setRefLink(this.getRefNum(b),b.href);this.refField.setInnerNode(this.refText.innerHTML);this.refField.attachToAnchor(b);this.refField.show();this.refText.innerHTML="";return true},getRefNum:function(b){var a=String(b.innerHTML).replace(this.regRefNum_rp,"");a=this.regRefNum_mt.exec(a);return(a?a[0]:0)},cutUselessNodes:function(b){var c=b.childNodes;var e;for(e=c.length-1;e>=0;e--){var f=null;if(c[e].tagName=="A"){f=c[e]}else{if(c[e].firstChild&&c[e].firstChild.tagName=="A"){f=c[e].firstChild}}if(f&&f.hash){var g=window.location.pathname,a=f.pathname;if(g.charAt(0)=="/"){g=g.substr(1)}if(a.charAt(0)=="/"){a=a.substr(1)}if(g==a||a=="blank"){for(var d=0;d<=e;d++){b.removeChild(c[0])}break}}}c=b.getElementsByTagName("SCRIPT");for(e=0;e<c.length;e++){c[e].parentNode.removeChild(c[e])}c=null}};function ElmEasyRefField(){this.elems={container:null,frame:null,header:null,link:null,close:null,field:null,content:null,more:null,corner:null};this.metrics={width:0,height:0};if(elmEasyRef.animation.enable){this.animation={curw:0,curh:0,interval:null}}this.anchor=null;this.is_shown=false;var a=this.elems.container=document.createElement("div");a.className="elm-easyref-container";a.style.display="none";a.style.visibility="hidden";a.style.position="absolute";a=this.elems.frame=document.createElement("div");a.className="elm-easyref-frame";this.elems.container.appendChild(a);a=this.elems.corner=document.createElement("div");a.className="elm-easyref-corner-l";this.elems.container.appendChild(a);a=this.elems.header=document.createElement("div");a.className="elm-easyref-header";this.elems.frame.appendChild(a);a=this.elems.link=document.createElement("a");a.href="#";a.className="elm-easyref-link";this.elems.header.appendChild(a);a=this.elems.close=document.createElement("a");a.href="#";a.className="elm-easyref-close";a.title=elmEasyRef.messages.elm_easyref_close;this.elems.header.appendChild(a);a=this.elems.field=document.createElement("div");a.className="elm-easyref-field";this.elems.frame.appendChild(a);a=this.elems.content=document.createElement("div");a.className="elm-easyref-content";this.elems.field.appendChild(a);a=this.elems.more=document.createElement("div");a.className="elm-easyref-more";a.innerHTML='<a href="#">...</a>';this.elems.field.appendChild(a);a.style.width=(elmEasyRef.fieldm.col_width-2)+"px";document.getElementById(elmEasyRef.bodyContentId).appendChild(this.elems.container);elm_addEvent(this.elems.close,"click",this.closeButtonListener);elm_addEvent(this.elems.link,"click",this.linkButtonListener);elm_addEvent(this.elems.more,"click",this.moreButtonListener)}ElmEasyRefField.prototype.setRefLink=function(b,a){this.elems.link.href=a;this.elems.link.innerHTML=elmEasyRef.messages.elm_easyref_ref.replace("$1",b)};ElmEasyRefField.prototype.setInnerNode=function(a){this.elems.content.innerHTML=a};ElmEasyRefField.prototype.show=function(){var a=this.elems.container;a.style.display="block";a.style.visibility="hidden";this.elems.field.style.width=elmEasyRef.fieldm.col_width+"px";this.metrics.width=this.elems.content.clientWidth;if(this.metrics.width<elmEasyRef.fieldm.min_width){this.metrics.width=elmEasyRef.fieldm.min_width}this.elems.field.style.width=this.metrics.width+"px";this.elems.frame.style.width=this.metrics.width+"px";this.metrics.height=this.elems.content.clientHeight;if(this.metrics.height>elmEasyRef.fieldm.col_height){this.metrics.height=elmEasyRef.fieldm.col_height;this.elems.more.style.display="block";this.elems.more.style.visibility="visible"}else{if(this.metrics.height<elmEasyRef.fieldm.min_height){this.metrics.height=elmEasyRef.fieldm.min_height}this.elems.more.style.display="none";this.elems.more.style.visibility="hidden"}this.elems.field.style.height=this.metrics.height+"px";this.updatePos();this.scrollDownToMe();if(this.animation){this.animation.curw=elmEasyRef.fieldm.min_width;this.animation.curh=elmEasyRef.fieldm.min_height;this.startAnimation()}a.style.visibility="visible";this.is_shown=true};ElmEasyRefField.prototype.attachToAnchor=function(a){this.anchor=a};ElmEasyRefField.prototype.calcAnchorPos=function(){var a={x:this.anchor.offsetLeft,y:this.anchor.offsetTop},b=this.anchor.offsetParent;while(b&&b.id!=elmEasyRef.bodyContentId){a.x+=b.offsetLeft;a.y+=b.offsetTop;b=b.offsetParent}return a};ElmEasyRefField.prototype.updatePos=function(){var b=this.elems.container;var c=this.calcAnchorPos(),a=c.x+Math.round(this.anchor.offsetWidth/2),f=c.y+this.anchor.offsetHeight,e=b.offsetParent.offsetWidth-a-b.clientWidth;if(e<0){a+=e;this.elems.corner.style.left=(-e)+"px";if(b.clientWidth+e<this.elems.corner.clientWidth||e/b.clientWidth<-0.5){this.elems.corner.className="elm-easyref-corner-r"}else{this.elems.corner.className="elm-easyref-corner-l"}}else{this.elems.corner.style.left="";this.elems.corner.className="elm-easyref-corner-l"}b.style.left=(a)+"px";b.style.top=(f)+"px"};ElmEasyRefField.prototype.scrollDownToMe=function(){var a=this.elems.container;if(a.getBoundingClientRect&&window.scrollTo){var c=a.getBoundingClientRect(),b=elm_getWindowSize(),d=elm_getWindowScroll();if(b&&d&&c.bottom>b.y){window.scrollTo(d.x,d.y+c.bottom-b.y+10)}}};ElmEasyRefField.prototype.expand=function(b){var a=this.elems.container;this.elems.more.style.visibility="hidden";this.elems.more.style.display="none";this.metrics.width=elmEasyRef.fieldm.exp_width;this.elems.field.style.width=this.metrics.width+"px";this.elems.frame.style.width=this.metrics.width+"px";this.metrics.height=this.elems.content.clientHeight;if(this.metrics.height>elmEasyRef.fieldm.exp_height){this.metrics.height=elmEasyRef.fieldm.exp_height;this.elems.field.style.overflow="auto"}this.elems.field.style.height=this.metrics.height+"px";this.updatePos();this.scrollDownToMe();if(this.animation){this.animation.curw=elmEasyRef.fieldm.col_width;this.animation.curh=elmEasyRef.fieldm.col_height;this.startAnimation()}};ElmEasyRefField.prototype.removeExpandStyles=function(){this.elems.field.style.overflow="";this.elems.field.scrollTop=0};ElmEasyRefField.prototype.hide=function(){this.finishAnimation();var a=this.elems.container;a.style.left="-1000px";a.style.top="-1000px";a.style.visibility="hidden";this.removeExpandStyles();this.is_shown=false};ElmEasyRefField.prototype.closeButtonListener=function(a){if(elmEasyRef.refField){elmEasyRef.refField.hide()}a.preventDefault()};ElmEasyRefField.prototype.linkButtonListener=function(a){if(elmEasyRef.refField){elmEasyRef.refField.hide()}};ElmEasyRefField.prototype.moreButtonListener=function(a){if(elmEasyRef.refField){elmEasyRef.refField.expand()}a.preventDefault()};ElmEasyRefField.prototype.isInsideField=function(b){var a=elmEasyRef.refField;if(!a){return false}while(b){if(b==a.elems.frame){return true}b=b.parentNode}return false};ElmEasyRefField.prototype.startAnimation=function(){if(this.animation){if(!this.animation.interval){this.animation.interval=setInterval(this.stepAnimation,elmEasyRef.animation.delay)}this.stepAnimation()}};ElmEasyRefField.prototype.stepAnimation=function(){var a=elmEasyRef.refField;if(a){var b=false;a.elems.container.style.visibility="hidden";var c=(a.metrics.width-a.animation.curw)/elmEasyRef.animation.stepw;if(c>0.5){a.animation.curw+=c;a.elems.frame.style.width=Math.round(a.animation.curw)+"px";b=true}c=(a.metrics.height-a.animation.curh)/elmEasyRef.animation.steph;if(c>0.5){a.animation.curh+=c;a.elems.field.style.height=Math.round(a.animation.curh)+"px";b=true}if(!b){a.finishAnimation()}a.updatePos();a.elems.container.style.visibility="visible"}};ElmEasyRefField.prototype.finishAnimation=function(){if(this.animation){this.elems.content.style.wordWrap="";this.elems.content.style.wordBreak="";this.elems.frame.style.width=this.metrics.width+"px";this.elems.field.style.height=this.metrics.height+"px";if(this.animation.interval){clearInterval(this.animation.interval)}this.animation.interval=null}};