window.CloudflareApps=window.Eager=window.CloudflareApps||window.Eager||{};window.CloudflareApps=window.CloudflareApps||{};CloudflareApps.siteId="a817fc656a71a976f10aee8748275812";CloudflareApps.installs=CloudflareApps.installs||{};(function(){'use strict'
CloudflareApps.internal=CloudflareApps.internal||{}
var errors=[]
CloudflareApps.internal.placementErrors=errors
var errorHashes={}
function noteError(options){var hash=options.selector+'::'+options.type+'::'+(options.installId||'')
if(errorHashes[hash]){return}
errorHashes[hash]=!0
errors.push(options)}
var initializedSelectors={}
var currentInit=!1
CloudflareApps.internal.markSelectors=function markSelectors(){if(!currentInit){check()
currentInit=!0
setTimeout(function(){currentInit=!1})}}
function check(){var installs=window.CloudflareApps.installs
for(var installId in installs){if(!installs.hasOwnProperty(installId)){continue}
var selectors=installs[installId].selectors
if(!selectors){continue}
for(var key in selectors){if(!selectors.hasOwnProperty(key)){continue}
var hash=installId+'::'+key
if(initializedSelectors[hash]){continue}
var els=document.querySelectorAll(selectors[key])
if(els&&els.length>1){noteError({type:'init:too-many',option:key,selector:selectors[key],installId:installId})
initializedSelectors[hash]=!0
continue}else if(!els||!els.length){continue}
initializedSelectors[hash]=!0
els[0].setAttribute('cfapps-selector',selectors[key])}}}
CloudflareApps.querySelector=function querySelector(selector){if(selector==='body'||selector==='head'){return document[selector]}
CloudflareApps.internal.markSelectors()
var els=document.querySelectorAll('[cfapps-selector="'+selector+'"]')
if(!els||!els.length){noteError({type:'select:not-found:by-attribute',selector:selector})
els=document.querySelectorAll(selector)
if(!els||!els.length){noteError({type:'select:not-found:by-query',selector:selector})
return null}else if(els.length>1){noteError({type:'select:too-many:by-query',selector:selector})}
return els[0]}
if(els.length>1){noteError({type:'select:too-many:by-attribute',selector:selector})}
return els[0]}}());(function(){'use strict'
var prevEls={}
CloudflareApps.createElement=function createElement(options,prevEl){options=options||{}
CloudflareApps.internal.markSelectors()
try{if(prevEl&&prevEl.parentNode){var replacedEl
if(prevEl.cfAppsElementId){replacedEl=prevEls[prevEl.cfAppsElementId]}
if(replacedEl){prevEl.parentNode.replaceChild(replacedEl,prevEl)
delete prevEls[prevEl.cfAppsElementId]}else{prevEl.parentNode.removeChild(prevEl)}}
var element=document.createElement('cloudflare-app')
var container
if(options.pages&&options.pages.URLPatterns&&!CloudflareApps.matchPage(options.pages.URLPatterns)){return element}
try{container=CloudflareApps.querySelector(options.selector)}catch(e){}
if(!container){return element}
if(!container.parentNode&&(options.method==='after'||options.method==='before'||options.method==='replace')){return element}
if(container===document.body){if(options.method==='after'){options.method='append'}else if(options.method==='before'){options.method='prepend'}}
switch(options.method){case'prepend':if(container.firstChild){container.insertBefore(element,container.firstChild)
break}
case'append':container.appendChild(element)
break
case'after':if(container.nextSibling){container.parentNode.insertBefore(element,container.nextSibling)}else{container.parentNode.appendChild(element)}
break
case'before':container.parentNode.insertBefore(element,container)
break
case'replace':try{var id=element.cfAppsElementId=Math.random().toString(36)
prevEls[id]=container}catch(e){}
container.parentNode.replaceChild(element,container)}
return element}catch(e){if(typeof console!=='undefined'&&typeof console.error!=='undefined'){console.error('Error creating Cloudflare Apps element',e)}}}}());(function(){'use strict'
CloudflareApps.matchPage=function matchPage(patterns){if(!patterns||!patterns.length){return!0}
var loc=document.location.host+document.location.pathname
if(window.CloudflareApps&&CloudflareApps.proxy&&CloudflareApps.proxy.originalURL){var url=CloudflareApps.proxy.originalURL.parsed
loc=url.host+url.path}
for(var i=0;i<patterns.length;i++){var re=new RegExp(patterns[i],'i')
if(re.test(loc)){return!0}}
return!1}}());CloudflareApps.installs.MqOMsMXnghQ5={appId:"lMxPPXVOqmoE",scope:{}};CloudflareApps.installs.MqOMsMXnghQ5.options={"account":{"accountId":"Ww81IDcgroHk","service":"googleanalytics","userId":"114092820615628688003"},"anonymizeIp":!1,"id":"","organization":"134170979","social":!1,"web-properties-for-116829757":"UA-116829757-1","web-properties-for-126637684":"UA-126637684-1","web-properties-for-132907538":"UA-132907538-1","web-properties-for-134170979":"UA-134170979-1","web-properties-for-32409340":"UA-32409340-1","web-properties-for-32414523":"UA-32414523-1","web-properties-for-32497361":"UA-32497361-1","web-properties-for-32501016":"UA-32501016-1","web-properties-for-32518152":"UA-32518152-1","web-properties-for-41606993":"UA-41606993-2","web-properties-for-45699450":"UA-45699450-1","web-properties-for-54078468":"UA-54078468-1","web-properties-for-54081653":"UA-54081653-1","web-properties-for-67824658":"UA-67824658-1","web-properties-for-67831269":"UA-67831269-1","web-properties-for-69868647":"UA-69868647-1","web-properties-for-73407073":"UA-73407073-1","web-properties-for-73420367":"UA-73420367-1","web-properties-for-73741271":"UA-73741271-1","web-properties-for-73746964":"UA-73746964-1","web-properties-for-73802159":"UA-73802159-1","web-properties-for-73861368":"UA-73861368-1","web-properties-for-73884698":"UA-73884698-1","web-properties-for-73894497":"UA-73894497-1","web-properties-for-74200795":"UA-74200795-1","web-properties-for-75287473":"UA-75287473-1","web-properties-for-76145870":"UA-76145870-1","web-properties-for-90843476":"UA-90843476-1","web-properties-for-90851290":"UA-90851290-1","web-properties-for-96612605":"UA-96612605-1","webPropertySchemaNames":["web-properties-for-132907538","web-properties-for-73884698","web-properties-for-73861368","web-properties-for-73802159","web-properties-for-73746964","web-properties-for-73894497","web-properties-for-32518152","web-properties-for-54078468","web-properties-for-90843476","web-properties-for-69868647","web-properties-for-73741271","web-properties-for-67824658","web-properties-for-67831269","web-properties-for-134170979","web-properties-for-32497361","web-properties-for-73407073","web-properties-for-54081653","web-properties-for-32409340","web-properties-for-75287473","web-properties-for-126637684","web-properties-for-45699450","web-properties-for-41606993","web-properties-for-96612605","web-properties-for-32414523","web-properties-for-73420367","web-properties-for-116829757","web-properties-for-74200795","web-properties-for-76145870","web-properties-for-90851290","web-properties-for-32501016"]};CloudflareApps.installs.MqOMsMXnghQ5.URLPatterns=["^chikucab.com/?.*$","^www.chikucab.com/?.*$"];if(CloudflareApps.matchPage(CloudflareApps.installs.MqOMsMXnghQ5.URLPatterns)){(function(){var options=CloudflareApps.installs.MqOMsMXnghQ5.options;var id;if(options.account&&options.organization){id=options["web-properties-for-"+options.organization]}else{id=(options.id||"").trim()}
if(!id){console.log("Cloudflare Google Analytics: Disabled. UA-ID not present.");return}else if("MqOMsMXnghQ5"==="preview"){console.log("Cloudflare Google Analytics: Enabled",id)}
function resolveParameter(uri,parameter){if(uri){var parameters=uri.split("#")[0].match(/[^?=&]+=([^&]*)?/g);for(var i=0,chunk;(chunk=parameters[i]);++i){if(chunk.indexOf(parameter)===0){return unescape(chunk.split("=")[1])}}}}
window.dataLayer=window.dataLayer||[];function gtag(){window.dataLayer.push(arguments)}
gtag("js",new Date());gtag("config",id);gtag("set",{anonymizeIp:options.anonymizeIp});var vendorScript=document.createElement("script");vendorScript.src="https://www.googletagmanager.com/gtag/js?id="+id;document.head.appendChild(vendorScript);if(options.social){window.addEventListener("load",function googleAnalyticsSocialTracking(){var FB=window.FB;var twttr=window.twttr;if("FB"in window&&"Event"in FB&&"subscribe"in window.FB.Event){FB.Event.subscribe("edge.create",function(targetUrl){gtag("event","share",{method:"facebook",event_action:"like",content_id:targetUrl})});FB.Event.subscribe("edge.remove",function(targetUrl){gtag("event","share",{method:"facebook",event_action:"unlike",content_id:targetUrl})});FB.Event.subscribe("message.send",function(targetUrl){gtag("event","share",{method:"facebook",event_action:"send",content_id:targetUrl})})}
if("twttr"in window&&"events"in twttr&&"bind"in twttr.events){twttr.events.bind("tweet",function(event){if(event){var targetUrl;if(event.target&&event.target.nodeName==="IFRAME"){targetUrl=resolveParameter(event.target.src,"url")}
gtag("event","share",{method:"twitter",event_action:"tweet",content_id:targetUrl})}})}},!1)}})()}