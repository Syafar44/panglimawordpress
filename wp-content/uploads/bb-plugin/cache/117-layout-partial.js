/*!
 * Bowser - a browser detector
 * https://github.com/ded/bowser
 * MIT License | (c) Dustin Diaz 2015
 */!function(name,definition){if(typeof module!='undefined'&&module.exports)module.exports=definition()
else if(typeof define=='function'&&define.amd)define(name,definition)
else this[name]=definition()}('bowser',function(){var t=true
function detect(ua){function getFirstMatch(regex){var match=ua.match(regex);return(match&&match.length>1&&match[1])||'';}
function getSecondMatch(regex){var match=ua.match(regex);return(match&&match.length>1&&match[2])||'';}
var iosdevice=getFirstMatch(/(ipod|iphone|ipad)/i).toLowerCase(),likeAndroid=/like android/i.test(ua),android=!likeAndroid&&/android/i.test(ua),nexusMobile=/nexus\s*[0-6]\s*/i.test(ua),nexusTablet=!nexusMobile&&/nexus\s*[0-9]+/i.test(ua),chromeos=/CrOS/.test(ua),silk=/silk/i.test(ua),sailfish=/sailfish/i.test(ua),tizen=/tizen/i.test(ua),webos=/(web|hpw)os/i.test(ua),windowsphone=/windows phone/i.test(ua),windows=!windowsphone&&/windows/i.test(ua),mac=!iosdevice&&!silk&&/macintosh/i.test(ua),linux=!android&&!sailfish&&!tizen&&!webos&&/linux/i.test(ua),edgeVersion=getFirstMatch(/edge\/(\d+(\.\d+)?)/i),versionIdentifier=getFirstMatch(/version\/(\d+(\.\d+)?)/i),tablet=/tablet/i.test(ua),mobile=!tablet&&/[^-]mobi/i.test(ua),xbox=/xbox/i.test(ua),result
if(/opera|opr|opios/i.test(ua)){result={name:'Opera',opera:t,version:versionIdentifier||getFirstMatch(/(?:opera|opr|opios)[\s\/](\d+(\.\d+)?)/i)}}
else if(/coast/i.test(ua)){result={name:'Opera Coast',coast:t,version:versionIdentifier||getFirstMatch(/(?:coast)[\s\/](\d+(\.\d+)?)/i)}}
else if(/yabrowser/i.test(ua)){result={name:'Yandex Browser',yandexbrowser:t,version:versionIdentifier||getFirstMatch(/(?:yabrowser)[\s\/](\d+(\.\d+)?)/i)}}
else if(/ucbrowser/i.test(ua)){result={name:'UC Browser',ucbrowser:t,version:getFirstMatch(/(?:ucbrowser)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/mxios/i.test(ua)){result={name:'Maxthon',maxthon:t,version:getFirstMatch(/(?:mxios)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/epiphany/i.test(ua)){result={name:'Epiphany',epiphany:t,version:getFirstMatch(/(?:epiphany)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/puffin/i.test(ua)){result={name:'Puffin',puffin:t,version:getFirstMatch(/(?:puffin)[\s\/](\d+(?:\.\d+)?)/i)}}
else if(/sleipnir/i.test(ua)){result={name:'Sleipnir',sleipnir:t,version:getFirstMatch(/(?:sleipnir)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/k-meleon/i.test(ua)){result={name:'K-Meleon',kMeleon:t,version:getFirstMatch(/(?:k-meleon)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(windowsphone){result={name:'Windows Phone',windowsphone:t}
if(edgeVersion){result.msedge=t
result.version=edgeVersion}
else{result.msie=t
result.version=getFirstMatch(/iemobile\/(\d+(\.\d+)?)/i)}}
else if(/msie|trident/i.test(ua)){result={name:'Internet Explorer',msie:t,version:getFirstMatch(/(?:msie |rv:)(\d+(\.\d+)?)/i)}}else if(chromeos){result={name:'Chrome',chromeos:t,chromeBook:t,chrome:t,version:getFirstMatch(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}}else if(/chrome.+? edge/i.test(ua)){result={name:'Microsoft Edge',msedge:t,version:edgeVersion}}
else if(/vivaldi/i.test(ua)){result={name:'Vivaldi',vivaldi:t,version:getFirstMatch(/vivaldi\/(\d+(\.\d+)?)/i)||versionIdentifier}}
else if(sailfish){result={name:'Sailfish',sailfish:t,version:getFirstMatch(/sailfish\s?browser\/(\d+(\.\d+)?)/i)}}
else if(/seamonkey\//i.test(ua)){result={name:'SeaMonkey',seamonkey:t,version:getFirstMatch(/seamonkey\/(\d+(\.\d+)?)/i)}}
else if(/firefox|iceweasel|fxios/i.test(ua)){result={name:'Firefox',firefox:t,version:getFirstMatch(/(?:firefox|iceweasel|fxios)[ \/](\d+(\.\d+)?)/i)}
if(/\((mobile|tablet);[^\)]*rv:[\d\.]+\)/i.test(ua)){result.firefoxos=t}}
else if(silk){result={name:'Amazon Silk',silk:t,version:getFirstMatch(/silk\/(\d+(\.\d+)?)/i)}}
else if(/phantom/i.test(ua)){result={name:'PhantomJS',phantom:t,version:getFirstMatch(/phantomjs\/(\d+(\.\d+)?)/i)}}
else if(/slimerjs/i.test(ua)){result={name:'SlimerJS',slimer:t,version:getFirstMatch(/slimerjs\/(\d+(\.\d+)?)/i)}}
else if(/blackberry|\bbb\d+/i.test(ua)||/rim\stablet/i.test(ua)){result={name:'BlackBerry',blackberry:t,version:versionIdentifier||getFirstMatch(/blackberry[\d]+\/(\d+(\.\d+)?)/i)}}
else if(webos){result={name:'WebOS',webos:t,version:versionIdentifier||getFirstMatch(/w(?:eb)?osbrowser\/(\d+(\.\d+)?)/i)};if(/touchpad\//i.test(ua)){result.touchpad=t;}}
else if(/bada/i.test(ua)){result={name:'Bada',bada:t,version:getFirstMatch(/dolfin\/(\d+(\.\d+)?)/i)};}
else if(tizen){result={name:'Tizen',tizen:t,version:getFirstMatch(/(?:tizen\s?)?browser\/(\d+(\.\d+)?)/i)||versionIdentifier};}
else if(/qupzilla/i.test(ua)){result={name:'QupZilla',qupzilla:t,version:getFirstMatch(/(?:qupzilla)[\s\/](\d+(?:\.\d+)+)/i)||versionIdentifier}}
else if(/chromium/i.test(ua)){result={name:'Chromium',chromium:t,version:getFirstMatch(/(?:chromium)[\s\/](\d+(?:\.\d+)?)/i)||versionIdentifier}}
else if(/chrome|crios|crmo/i.test(ua)){result={name:'Chrome',chrome:t,version:getFirstMatch(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}}
else if(android){result={name:'Android',version:versionIdentifier}}
else if(/safari|applewebkit/i.test(ua)){result={name:'Safari',safari:t}
if(versionIdentifier){result.version=versionIdentifier}}
else if(iosdevice){result={name:iosdevice=='iphone'?'iPhone':iosdevice=='ipad'?'iPad':'iPod'}
if(versionIdentifier){result.version=versionIdentifier}}
else if(/googlebot/i.test(ua)){result={name:'Googlebot',googlebot:t,version:getFirstMatch(/googlebot\/(\d+(\.\d+))/i)||versionIdentifier}}
else{result={name:getFirstMatch(/^(.*)\/(.*) /),version:getSecondMatch(/^(.*)\/(.*) /)};}
if(!result.msedge&&/(apple)?webkit/i.test(ua)){if(/(apple)?webkit\/537\.36/i.test(ua)){result.name=result.name||"Blink"
result.blink=t}else{result.name=result.name||"Webkit"
result.webkit=t}
if(!result.version&&versionIdentifier){result.version=versionIdentifier}}else if(!result.opera&&/gecko\//i.test(ua)){result.name=result.name||"Gecko"
result.gecko=t
result.version=result.version||getFirstMatch(/gecko\/(\d+(\.\d+)?)/i)}
if(!result.msedge&&(android||result.silk)){result.android=t}else if(iosdevice){result[iosdevice]=t
result.ios=t}else if(mac){result.mac=t}else if(xbox){result.xbox=t}else if(windows){result.windows=t}else if(linux){result.linux=t}
var osVersion='';if(result.windowsphone){osVersion=getFirstMatch(/windows phone (?:os)?\s?(\d+(\.\d+)*)/i);}else if(iosdevice){osVersion=getFirstMatch(/os (\d+([_\s]\d+)*) like mac os x/i);osVersion=osVersion.replace(/[_\s]/g,'.');}else if(android){osVersion=getFirstMatch(/android[ \/-](\d+(\.\d+)*)/i);}else if(result.webos){osVersion=getFirstMatch(/(?:web|hpw)os\/(\d+(\.\d+)*)/i);}else if(result.blackberry){osVersion=getFirstMatch(/rim\stablet\sos\s(\d+(\.\d+)*)/i);}else if(result.bada){osVersion=getFirstMatch(/bada\/(\d+(\.\d+)*)/i);}else if(result.tizen){osVersion=getFirstMatch(/tizen[\/\s](\d+(\.\d+)*)/i);}
if(osVersion){result.osversion=osVersion;}
var osMajorVersion=osVersion.split('.')[0];if(tablet||nexusTablet||iosdevice=='ipad'||(android&&(osMajorVersion==3||(osMajorVersion>=4&&!mobile)))||result.silk){result.tablet=t}else if(mobile||iosdevice=='iphone'||iosdevice=='ipod'||android||nexusMobile||result.blackberry||result.webos||result.bada){result.mobile=t}
if(result.msedge||(result.msie&&result.version>=10)||(result.yandexbrowser&&result.version>=15)||(result.vivaldi&&result.version>=1.0)||(result.chrome&&result.version>=20)||(result.firefox&&result.version>=20.0)||(result.safari&&result.version>=6)||(result.opera&&result.version>=10.0)||(result.ios&&result.osversion&&result.osversion.split(".")[0]>=6)||(result.blackberry&&result.version>=10.1)||(result.chromium&&result.version>=20)){result.a=t;}
else if((result.msie&&result.version<10)||(result.chrome&&result.version<20)||(result.firefox&&result.version<20.0)||(result.safari&&result.version<6)||(result.opera&&result.version<10.0)||(result.ios&&result.osversion&&result.osversion.split(".")[0]<6)||(result.chromium&&result.version<20)){result.c=t}else result.x=t
return result}
var bowser=detect(typeof navigator!=='undefined'?navigator.userAgent:'')
bowser.test=function(browserList){for(var i=0;i<browserList.length;++i){var browserItem=browserList[i];if(typeof browserItem==='string'){if(browserItem in bowser){return true;}}}
return false;}
function getVersionPrecision(version){return version.split(".").length;}
function map(arr,iterator){var result=[],i;if(Array.prototype.map){return Array.prototype.map.call(arr,iterator);}
for(i=0;i<arr.length;i++){result.push(iterator(arr[i]));}
return result;}
function compareVersions(versions){var precision=Math.max(getVersionPrecision(versions[0]),getVersionPrecision(versions[1]));var chunks=map(versions,function(version){var delta=precision-getVersionPrecision(version);version=version+new Array(delta+1).join(".0");return map(version.split("."),function(chunk){return new Array(20-chunk.length).join("0")+chunk;}).reverse();});while(--precision>=0){if(chunks[0][precision]>chunks[1][precision]){return 1;}
else if(chunks[0][precision]===chunks[1][precision]){if(precision===0){return 0;}}
else{return-1;}}}
function isUnsupportedBrowser(minVersions,strictMode,ua){var _bowser=bowser;if(typeof strictMode==='string'){ua=strictMode;strictMode=void(0);}
if(strictMode===void(0)){strictMode=false;}
if(ua){_bowser=detect(ua);}
var version=""+_bowser.version;for(var browser in minVersions){if(minVersions.hasOwnProperty(browser)){if(_bowser[browser]){return compareVersions([version,minVersions[browser]])<0;}}}
return strictMode;}
function check(minVersions,strictMode,ua){return!isUnsupportedBrowser(minVersions,strictMode,ua);}
bowser.isUnsupportedBrowser=isUnsupportedBrowser;bowser.compareVersions=compareVersions;bowser.check=check;bowser._detect=detect;return bowser});(function($){UABBTrigger={triggerHook:function(hook,args){$('body').trigger('uabb-trigger.'+hook,args);},addHook:function(hook,callback){$('body').on('uabb-trigger.'+hook,callback);},removeHook:function(hook,callback){$('body').off('uabb-trigger.'+hook,callback);},};})(jQuery);jQuery(document).ready(function($){if(typeof bowser!=='undefined'&&bowser!==null){var uabb_browser=bowser.name,uabb_browser_v=bowser.version,uabb_browser_class=uabb_browser.replace(/\s+/g,'-').toLowerCase(),uabb_browser_v_class=uabb_browser_class+parseInt(uabb_browser_v);$('html').addClass(uabb_browser_class).addClass(uabb_browser_v_class);}
$('.uabb-row-separator').parents('html').css('overflow-x','hidden');});jQuery(function($){if(typeof $.fn.magnificPopup!=='undefined'){$('.fl-node-r643vp8izasw a').magnificPopup({type:'image',closeOnContentClick:true,closeBtnInside:false,tLoading:'',preloader:true,image:{titleSrc:function(item){}},callbacks:{open:function(){$('.mfp-preloader').html('<i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>');}}});}
$(function(){$('.fl-node-r643vp8izasw .fl-photo-img').on('mouseenter',function(e){$(this).data('title',$(this).attr('title')).removeAttr('title');}).on('mouseleave',function(e){$(this).attr('title',$(this).data('title')).data('title',null);});});window._fl_string_to_slug_regex='a-zA-Z0-9';});(function($){FLBuilderPostGrid=function(settings){this.settings=settings;this.nodeClass='.fl-node-'+settings.id;this.matchHeight=settings.matchHeight;if('columns'==this.settings.layout){this.wrapperClass=this.nodeClass+' .fl-post-grid';this.postClass=this.nodeClass+' .fl-post-column';}
else{this.wrapperClass=this.nodeClass+' .fl-post-'+this.settings.layout;this.postClass=this.wrapperClass+'-post';}
if(this._hasPosts()){this._initLayout();this._initInfiniteScroll();}};FLBuilderPostGrid.prototype={settings:{},nodeClass:'',wrapperClass:'',postClass:'',gallery:null,currPage:1,totalPages:1,_hasPosts:function(){return $(this.postClass).length>0;},_initLayout:function(){switch(this.settings.layout){case'columns':this._columnsLayout();break;case'grid':this._gridLayout();break;case'gallery':this._galleryLayout();break;}
$(this.postClass).css('visibility','visible');FLBuilderLayout._scrollToElement($(this.nodeClass+' .fl-paged-scroll-to'));},_columnsLayout:function(){$(this.wrapperClass).imagesLoaded($.proxy(function(){this._gridLayoutMatchHeight();},this));$(window).on('resize',$.proxy(function(){$(this.wrapperClass).imagesLoaded($.proxy(function(){this._gridLayoutMatchHeight();},this));},this));},_gridLayout:function(){var wrap=$(this.wrapperClass);wrap.masonry({columnWidth:this.nodeClass+' .fl-post-grid-sizer',gutter:parseInt(this.settings.postSpacing),isFitWidth:true,itemSelector:this.postClass,transitionDuration:0,isRTL:this.settings.isRTL});wrap.imagesLoaded($.proxy(function(){this._gridLayoutMatchHeight();wrap.masonry();},this));$(window).scroll($.debounce(25,function(){wrap.masonry()}));},_gridLayoutMatchHeight:function(){var highestBox=0;if(!this._isMatchHeight()){$(this.nodeClass+' .fl-post-grid-post').css('height','');return;}
$(this.nodeClass+' .fl-post-grid-post').css('height','').each(function(){if($(this).height()>highestBox){highestBox=$(this).height();}});$(this.nodeClass+' .fl-post-grid-post').height(highestBox);},_isMatchHeight:function(){var width=$(window).width(),breakpoints=FLBuilderLayoutConfig.breakpoints,matchLarge=''!=this.matchHeight.large?this.matchHeight.large:this.matchHeight.default,matchMedium=''!=this.matchHeight.medium?this.matchHeight.medium:this.matchHeight.default,matchSmall=''!=this.matchHeight.responsive?this.matchHeight.responsive:this.matchHeight.default;return(width>breakpoints.medium&&1==this.matchHeight.default)||(width>breakpoints.medium&&width<=breakpoints.large&&1==matchLarge)||(width>breakpoints.small&&width<=breakpoints.medium&&1==matchMedium)||(width<=breakpoints.small&&1==matchSmall);},_galleryLayout:function(){this.gallery=new FLBuilderGalleryGrid({'wrapSelector':this.wrapperClass,'itemSelector':'.fl-post-gallery-post','isRTL':this.settings.isRTL});},_initInfiniteScroll:function(){var isScroll='scroll'==this.settings.pagination||'load_more'==this.settings.pagination,pages=$(this.nodeClass+' .fl-builder-pagination').find('li .page-numbers:not(.next)');if(pages.length>1){total=pages.last().text().replace(/\D/g,'')
this.totalPages=parseInt(total);}
if(isScroll&&this.totalPages>1&&'undefined'===typeof FLBuilder){this._infiniteScroll();if('load_more'==this.settings.pagination){this._infiniteScrollLoadMore();}}},_infiniteScroll:function(settings){var path=$(this.nodeClass+' .fl-builder-pagination a.next').attr('href'),pagePattern=/(.*?(\/|\&|\?)paged-[0-9]{1,}(\/|=))([0-9]{1,})+(.*)/,wpPattern=/^(.*?\/?page\/?)(?:\d+)(.*?$)/,pageMatched=null,scrollData={navSelector:this.nodeClass+' .fl-builder-pagination',nextSelector:this.nodeClass+' .fl-builder-pagination a.next',itemSelector:this.postClass,prefill:true,bufferPx:200,loading:{msgText:this.settings.loadingText,finishedMsg:'',img:FLBuilderLayoutConfig.paths.pluginUrl+'img/ajax-loader-grey.gif',speed:1}};if(pagePattern.test(path)){scrollData.path=function(currPage){pageMatched=path.match(pagePattern);path=pageMatched[1]+currPage+pageMatched[5];return path;}}
else if(wpPattern.test(path)){scrollData.path=path.match(wpPattern).slice(1);}
$(this.wrapperClass).infinitescroll(scrollData,$.proxy(this._infiniteScrollComplete,this));setTimeout(function(){$(window).trigger('resize');},100);},_infiniteScrollComplete:function(elements){var wrap=$(this.wrapperClass);elements=$(elements);if(this.settings.layout=='columns'){wrap.imagesLoaded($.proxy(function(){$('#infscr-loading').remove();this._gridLayoutMatchHeight();elements.css('visibility','visible');},this));}
else if(this.settings.layout=='grid'){wrap.imagesLoaded($.proxy(function(){this._gridLayoutMatchHeight();wrap.masonry('appended',elements);wrap.masonry();elements.css('visibility','visible');},this));}
else if(this.settings.layout=='gallery'){this.gallery.resize();elements.css('visibility','visible');}
if('load_more'==this.settings.pagination){$(this.wrapperClass+' .fl-post-grid-sizer.masonry-brick').appendTo(this.wrapperClass);$('#infscr-loading').appendTo(this.wrapperClass);}
elements.find('img[srcset]').each(function(index,img){img.outerHTML=img.outerHTML;});this.currPage++;this._removeLoadMoreButton();node=$(wrap).closest('.fl-module-post-grid').data('node')
$('.fl-node-'+node).trigger('gridScrollComplete',this);},_infiniteScrollLoadMore:function(){var wrap=$(this.wrapperClass);$(window).unbind('.infscr');$(this.nodeClass+' .fl-builder-pagination-load-more .fl-button').on('click',function(){if($('#infscr-loading').length){$('#infscr-loading').remove();}
wrap.infinitescroll('retrieve');return false;});},_removeLoadMoreButton:function(){if('load_more'==this.settings.pagination&&this.totalPages==this.currPage){$(this.nodeClass+' .fl-builder-pagination-load-more').remove();}}};})(jQuery);(function($){$(function(){new FLBuilderPostGrid({id:'u59trc8bzewm',layout:'columns',pagination:'none',postSpacing:'40',postWidth:'300',matchHeight:{default:'0',large:'',medium:'',responsive:''},isRTL:false,loadingText:'Loading...'});});})(jQuery);