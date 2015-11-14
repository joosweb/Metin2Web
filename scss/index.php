<?php
session_start();
require('config/classes.php');
$class = new user_panel();
?>
<!DOCTYPE html> 
<html lang="es"> 
<head>
<title>Metin2Evolution</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/bootstrap-blue.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
/* jquery.form.min.js */
(function(e){"use strict";if(typeof define==="function"&&define.amd){define(["jquery"],e)}else{e(typeof jQuery!="undefined"?jQuery:window.Zepto)}})(function(e){"use strict";function r(t){var n=t.data;if(!t.isDefaultPrevented()){t.preventDefault();e(t.target).ajaxSubmit(n)}}function i(t){var n=t.target;var r=e(n);if(!r.is("[type=submit],[type=image]")){var i=r.closest("[type=submit]");if(i.length===0){return}n=i[0]}var s=this;s.clk=n;if(n.type=="image"){if(t.offsetX!==undefined){s.clk_x=t.offsetX;s.clk_y=t.offsetY}else if(typeof e.fn.offset=="function"){var o=r.offset();s.clk_x=t.pageX-o.left;s.clk_y=t.pageY-o.top}else{s.clk_x=t.pageX-n.offsetLeft;s.clk_y=t.pageY-n.offsetTop}}setTimeout(function(){s.clk=s.clk_x=s.clk_y=null},100)}function s(){if(!e.fn.ajaxSubmit.debug){return}var t="[jquery.form] "+Array.prototype.join.call(arguments,"");if(window.console&&window.console.log){window.console.log(t)}else if(window.opera&&window.opera.postError){window.opera.postError(t)}}var t={};t.fileapi=e("<input type='file'/>").get(0).files!==undefined;t.formdata=window.FormData!==undefined;var n=!!e.fn.prop;e.fn.attr2=function(){if(!n){return this.attr.apply(this,arguments)}var e=this.prop.apply(this,arguments);if(e&&e.jquery||typeof e==="string"){return e}return this.attr.apply(this,arguments)};e.fn.ajaxSubmit=function(r){function k(t){var n=e.param(t,r.traditional).split("&");var i=n.length;var s=[];var o,u;for(o=0;o<i;o++){n[o]=n[o].replace(/\+/g," ");u=n[o].split("=");s.push([decodeURIComponent(u[0]),decodeURIComponent(u[1])])}return s}function L(t){var n=new FormData;for(var s=0;s<t.length;s++){n.append(t[s].name,t[s].value)}if(r.extraData){var o=k(r.extraData);for(s=0;s<o.length;s++){if(o[s]){n.append(o[s][0],o[s][1])}}}r.data=null;var u=e.extend(true,{},e.ajaxSettings,r,{contentType:false,processData:false,cache:false,type:i||"POST"});if(r.uploadProgress){u.xhr=function(){var t=e.ajaxSettings.xhr();if(t.upload){t.upload.addEventListener("progress",function(e){var t=0;var n=e.loaded||e.position;var i=e.total;if(e.lengthComputable){t=Math.ceil(n/i*100)}r.uploadProgress(e,n,i,t)},false)}return t}}u.data=null;var a=u.beforeSend;u.beforeSend=function(e,t){if(r.formData){t.data=r.formData}else{t.data=n}if(a){a.call(this,e,t)}};return e.ajax(u)}function A(t){function T(e){var t=null;try{if(e.contentWindow){t=e.contentWindow.document}}catch(n){s("cannot get iframe.contentWindow document: "+n)}if(t){return t}try{t=e.contentDocument?e.contentDocument:e.document}catch(n){s("cannot get iframe.contentDocument: "+n);t=e.document}return t}function k(){function f(){try{var e=T(v).readyState;s("state = "+e);if(e&&e.toLowerCase()=="uninitialized"){setTimeout(f,50)}}catch(t){s("Server abort: ",t," (",t.name,")");_(x);if(w){clearTimeout(w)}w=undefined}}var t=a.attr2("target"),n=a.attr2("action"),r="multipart/form-data",u=a.attr("enctype")||a.attr("encoding")||r;o.setAttribute("target",p);if(!i||/post/i.test(i)){o.setAttribute("method","POST")}if(n!=l.url){o.setAttribute("action",l.url)}if(!l.skipEncodingOverride&&(!i||/post/i.test(i))){a.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"})}if(l.timeout){w=setTimeout(function(){b=true;_(S)},l.timeout)}var c=[];try{if(l.extraData){for(var h in l.extraData){if(l.extraData.hasOwnProperty(h)){if(e.isPlainObject(l.extraData[h])&&l.extraData[h].hasOwnProperty("name")&&l.extraData[h].hasOwnProperty("value")){c.push(e('<input type="hidden" name="'+l.extraData[h].name+'">').val(l.extraData[h].value).appendTo(o)[0])}else{c.push(e('<input type="hidden" name="'+h+'">').val(l.extraData[h]).appendTo(o)[0])}}}}if(!l.iframeTarget){d.appendTo("body")}if(v.attachEvent){v.attachEvent("onload",_)}else{v.addEventListener("load",_,false)}setTimeout(f,15);try{o.submit()}catch(m){var g=document.createElement("form").submit;g.apply(o)}}finally{o.setAttribute("action",n);o.setAttribute("enctype",u);if(t){o.setAttribute("target",t)}else{a.removeAttr("target")}e(c).remove()}}function _(t){if(m.aborted||M){return}A=T(v);if(!A){s("cannot access response document");t=x}if(t===S&&m){m.abort("timeout");E.reject(m,"timeout");return}else if(t==x&&m){m.abort("server abort");E.reject(m,"error","server abort");return}if(!A||A.location.href==l.iframeSrc){if(!b){return}}if(v.detachEvent){v.detachEvent("onload",_)}else{v.removeEventListener("load",_,false)}var n="success",r;try{if(b){throw"timeout"}var i=l.dataType=="xml"||A.XMLDocument||e.isXMLDoc(A);s("isXml="+i);if(!i&&window.opera&&(A.body===null||!A.body.innerHTML)){if(--O){s("requeing onLoad callback, DOM not available");setTimeout(_,250);return}}var o=A.body?A.body:A.documentElement;m.responseText=o?o.innerHTML:null;m.responseXML=A.XMLDocument?A.XMLDocument:A;if(i){l.dataType="xml"}m.getResponseHeader=function(e){var t={"content-type":l.dataType};return t[e.toLowerCase()]};if(o){m.status=Number(o.getAttribute("status"))||m.status;m.statusText=o.getAttribute("statusText")||m.statusText}var u=(l.dataType||"").toLowerCase();var a=/(json|script|text)/.test(u);if(a||l.textarea){var f=A.getElementsByTagName("textarea")[0];if(f){m.responseText=f.value;m.status=Number(f.getAttribute("status"))||m.status;m.statusText=f.getAttribute("statusText")||m.statusText}else if(a){var c=A.getElementsByTagName("pre")[0];var p=A.getElementsByTagName("body")[0];if(c){m.responseText=c.textContent?c.textContent:c.innerText}else if(p){m.responseText=p.textContent?p.textContent:p.innerText}}}else if(u=="xml"&&!m.responseXML&&m.responseText){m.responseXML=D(m.responseText)}try{L=H(m,u,l)}catch(g){n="parsererror";m.error=r=g||n}}catch(g){s("error caught: ",g);n="error";m.error=r=g||n}if(m.aborted){s("upload aborted");n=null}if(m.status){n=m.status>=200&&m.status<300||m.status===304?"success":"error"}if(n==="success"){if(l.success){l.success.call(l.context,L,"success",m)}E.resolve(m.responseText,"success",m);if(h){e.event.trigger("ajaxSuccess",[m,l])}}else if(n){if(r===undefined){r=m.statusText}if(l.error){l.error.call(l.context,m,n,r)}E.reject(m,"error",r);if(h){e.event.trigger("ajaxError",[m,l,r])}}if(h){e.event.trigger("ajaxComplete",[m,l])}if(h&&!--e.active){e.event.trigger("ajaxStop")}if(l.complete){l.complete.call(l.context,m,n)}M=true;if(l.timeout){clearTimeout(w)}setTimeout(function(){if(!l.iframeTarget){d.remove()}else{d.attr("src",l.iframeSrc)}m.responseXML=null},100)}var o=a[0],u,f,l,h,p,d,v,m,g,y,b,w;var E=e.Deferred();E.abort=function(e){m.abort(e)};if(t){for(f=0;f<c.length;f++){u=e(c[f]);if(n){u.prop("disabled",false)}else{u.removeAttr("disabled")}}}l=e.extend(true,{},e.ajaxSettings,r);l.context=l.context||l;p="jqFormIO"+(new Date).getTime();if(l.iframeTarget){d=e(l.iframeTarget);y=d.attr2("name");if(!y){d.attr2("name",p)}else{p=y}}else{d=e('<iframe name="'+p+'" src="'+l.iframeSrc+'" />');d.css({position:"absolute",top:"-1000px",left:"-1000px"})}v=d[0];m={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var n=t==="timeout"?"timeout":"aborted";s("aborting upload... "+n);this.aborted=1;try{if(v.contentWindow.document.execCommand){v.contentWindow.document.execCommand("Stop")}}catch(r){}d.attr("src",l.iframeSrc);m.error=n;if(l.error){l.error.call(l.context,m,n,t)}if(h){e.event.trigger("ajaxError",[m,l,n])}if(l.complete){l.complete.call(l.context,m,n)}}};h=l.global;if(h&&0===e.active++){e.event.trigger("ajaxStart")}if(h){e.event.trigger("ajaxSend",[m,l])}if(l.beforeSend&&l.beforeSend.call(l.context,m,l)===false){if(l.global){e.active--}E.reject();return E}if(m.aborted){E.reject();return E}g=o.clk;if(g){y=g.name;if(y&&!g.disabled){l.extraData=l.extraData||{};l.extraData[y]=g.value;if(g.type=="image"){l.extraData[y+".x"]=o.clk_x;l.extraData[y+".y"]=o.clk_y}}}var S=1;var x=2;var N=e("meta[name=csrf-token]").attr("content");var C=e("meta[name=csrf-param]").attr("content");if(C&&N){l.extraData=l.extraData||{};l.extraData[C]=N}if(l.forceSync){k()}else{setTimeout(k,10)}var L,A,O=50,M;var D=e.parseXML||function(e,t){if(window.ActiveXObject){t=new ActiveXObject("Microsoft.XMLDOM");t.async="false";t.loadXML(e)}else{t=(new DOMParser).parseFromString(e,"text/xml")}return t&&t.documentElement&&t.documentElement.nodeName!="parsererror"?t:null};var P=e.parseJSON||function(e){return window["eval"]("("+e+")")};var H=function(t,n,r){var i=t.getResponseHeader("content-type")||"",s=n==="xml"||!n&&i.indexOf("xml")>=0,o=s?t.responseXML:t.responseText;if(s&&o.documentElement.nodeName==="parsererror"){if(e.error){e.error("parsererror")}}if(r&&r.dataFilter){o=r.dataFilter(o,n)}if(typeof o==="string"){if(n==="json"||!n&&i.indexOf("json")>=0){o=P(o)}else if(n==="script"||!n&&i.indexOf("javascript")>=0){e.globalEval(o)}}return o};return E}if(!this.length){s("ajaxSubmit: skipping submit process - no element selected");return this}var i,o,u,a=this;if(typeof r=="function"){r={success:r}}else if(r===undefined){r={}}i=r.type||this.attr2("method");o=r.url||this.attr2("action");u=typeof o==="string"?e.trim(o):"";u=u||window.location.href||"";if(u){u=(u.match(/^([^#]+)/)||[])[1]}r=e.extend(true,{url:u,success:e.ajaxSettings.success,type:i||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},r);var f={};this.trigger("form-pre-serialize",[this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-pre-serialize trigger");return this}if(r.beforeSerialize&&r.beforeSerialize(this,r)===false){s("ajaxSubmit: submit aborted via beforeSerialize callback");return this}var l=r.traditional;if(l===undefined){l=e.ajaxSettings.traditional}var c=[];var h,p=this.formToArray(r.semantic,c);if(r.data){r.extraData=r.data;h=e.param(r.data,l)}if(r.beforeSubmit&&r.beforeSubmit(p,this,r)===false){s("ajaxSubmit: submit aborted via beforeSubmit callback");return this}this.trigger("form-submit-validate",[p,this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-submit-validate trigger");return this}var d=e.param(p,l);if(h){d=d?d+"&"+h:h}if(r.type.toUpperCase()=="GET"){r.url+=(r.url.indexOf("?")>=0?"&":"?")+d;r.data=null}else{r.data=d}var v=[];if(r.resetForm){v.push(function(){a.resetForm()})}if(r.clearForm){v.push(function(){a.clearForm(r.includeHidden)})}if(!r.dataType&&r.target){var m=r.success||function(){};v.push(function(t){var n=r.replaceTarget?"replaceWith":"html";e(r.target)[n](t).each(m,arguments)})}else if(r.success){v.push(r.success)}r.success=function(e,t,n){var i=r.context||this;for(var s=0,o=v.length;s<o;s++){v[s].apply(i,[e,t,n||a,a])}};if(r.error){var g=r.error;r.error=function(e,t,n){var i=r.context||this;g.apply(i,[e,t,n,a])}}if(r.complete){var y=r.complete;r.complete=function(e,t){var n=r.context||this;y.apply(n,[e,t,a])}}var b=e("input[type=file]:enabled",this).filter(function(){return e(this).val()!==""});var w=b.length>0;var E="multipart/form-data";var S=a.attr("enctype")==E||a.attr("encoding")==E;var x=t.fileapi&&t.formdata;s("fileAPI :"+x);var T=(w||S)&&!x;var N;if(r.iframe!==false&&(r.iframe||T)){if(r.closeKeepAlive){e.get(r.closeKeepAlive,function(){N=A(p)})}else{N=A(p)}}else if((w||S)&&x){N=L(p)}else{N=e.ajax(r)}a.removeData("jqxhr").data("jqxhr",N);for(var C=0;C<c.length;C++){c[C]=null}this.trigger("form-submit-notify",[this,r]);return this};e.fn.ajaxForm=function(t){t=t||{};t.delegation=t.delegation&&e.isFunction(e.fn.on);if(!t.delegation&&this.length===0){var n={s:this.selector,c:this.context};if(!e.isReady&&n.s){s("DOM not ready, queuing ajaxForm");e(function(){e(n.s,n.c).ajaxForm(t)});return this}s("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)"));return this}if(t.delegation){e(document).off("submit.form-plugin",this.selector,r).off("click.form-plugin",this.selector,i).on("submit.form-plugin",this.selector,t,r).on("click.form-plugin",this.selector,t,i);return this}return this.ajaxFormUnbind().bind("submit.form-plugin",t,r).bind("click.form-plugin",t,i)};e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")};e.fn.formToArray=function(n,r){var i=[];if(this.length===0){return i}var s=this[0];var o=this.attr("id");var u=n?s.getElementsByTagName("*"):s.elements;var a;if(u&&!/MSIE [678]/.test(navigator.userAgent)){u=e(u).get()}if(o){a=e(':input[form="'+o+'"]').get();if(a.length){u=(u||[]).concat(a)}}if(!u||!u.length){return i}var f,l,c,h,p,d,v;for(f=0,d=u.length;f<d;f++){p=u[f];c=p.name;if(!c||p.disabled){continue}if(n&&s.clk&&p.type=="image"){if(s.clk==p){i.push({name:c,value:e(p).val(),type:p.type});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}continue}h=e.fieldValue(p,true);if(h&&h.constructor==Array){if(r){r.push(p)}for(l=0,v=h.length;l<v;l++){i.push({name:c,value:h[l]})}}else if(t.fileapi&&p.type=="file"){if(r){r.push(p)}var m=p.files;if(m.length){for(l=0;l<m.length;l++){i.push({name:c,value:m[l],type:p.type})}}else{i.push({name:c,value:"",type:p.type})}}else if(h!==null&&typeof h!="undefined"){if(r){r.push(p)}i.push({name:c,value:h,type:p.type,required:p.required})}}if(!n&&s.clk){var g=e(s.clk),y=g[0];c=y.name;if(c&&!y.disabled&&y.type=="image"){i.push({name:c,value:g.val()});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}}return i};e.fn.formSerialize=function(t){return e.param(this.formToArray(t))};e.fn.fieldSerialize=function(t){var n=[];this.each(function(){var r=this.name;if(!r){return}var i=e.fieldValue(this,t);if(i&&i.constructor==Array){for(var s=0,o=i.length;s<o;s++){n.push({name:r,value:i[s]})}}else if(i!==null&&typeof i!="undefined"){n.push({name:this.name,value:i})}});return e.param(n)};e.fn.fieldValue=function(t){for(var n=[],r=0,i=this.length;r<i;r++){var s=this[r];var o=e.fieldValue(s,t);if(o===null||typeof o=="undefined"||o.constructor==Array&&!o.length){continue}if(o.constructor==Array){e.merge(n,o)}else{n.push(o)}}return n};e.fieldValue=function(t,n){var r=t.name,i=t.type,s=t.tagName.toLowerCase();if(n===undefined){n=true}if(n&&(!r||t.disabled||i=="reset"||i=="button"||(i=="checkbox"||i=="radio")&&!t.checked||(i=="submit"||i=="image")&&t.form&&t.form.clk!=t||s=="select"&&t.selectedIndex==-1)){return null}if(s=="select"){var o=t.selectedIndex;if(o<0){return null}var u=[],a=t.options;var f=i=="select-one";var l=f?o+1:a.length;for(var c=f?o:0;c<l;c++){var h=a[c];if(h.selected){var p=h.value;if(!p){p=h.attributes&&h.attributes.value&&!h.attributes.value.specified?h.text:h.value}if(f){return p}u.push(p)}}return u}return e(t).val()};e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})};e.fn.clearFields=e.fn.clearInputs=function(t){var n=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var r=this.type,i=this.tagName.toLowerCase();if(n.test(r)||i=="textarea"){this.value=""}else if(r=="checkbox"||r=="radio"){this.checked=false}else if(i=="select"){this.selectedIndex=-1}else if(r=="file"){if(/MSIE/.test(navigator.userAgent)){e(this).replaceWith(e(this).clone(true))}else{e(this).val("")}}else if(t){if(t===true&&/hidden/.test(r)||typeof t=="string"&&e(this).is(t)){this.value=""}}})};e.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=="function"||typeof this.reset=="object"&&!this.reset.nodeType){this.reset()}})};e.fn.enable=function(e){if(e===undefined){e=true}return this.each(function(){this.disabled=!e})};e.fn.selected=function(t){if(t===undefined){t=true}return this.each(function(){var n=this.type;if(n=="checkbox"||n=="radio"){this.checked=t}else if(this.tagName.toLowerCase()=="option"){var r=e(this).parent("select");if(t&&r[0]&&r[0].type=="select-one"){r.find("option").selected(false)}this.selected=t}})};e.fn.ajaxSubmit.debug=false})
</script>
<style>
#uploadForm {border-top:#F0F0F0 2px solid;padding:10px;}
#uploadForm label {margin:2px; font-size:1em; font-weight:bold;}
.demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:4px; background-color:#FFF;}
#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;
}
</style>
<script src="scripts/scripts.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
</head> 
<body>	
<script type="text/javascript" src="js/wz_tooltip.js"></script>
<!-- Modal -->
<div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Subir Avatar</h4>
      </div>
      <div class="modal-body">
      </div>
      <center>    	
	<form id="uploadForm" action="upload.php" method="post">
    <div>
    <div class="text">La imagen debe ser de 150x150 pixeles y con un peso maximo de 70kbs.</div>
    <label>Upload Image File:</label>
    <input name="userImage" id="userImage" type="file" class="demoInputBox" />
    </div>
    <div></div>
    <div id="progress-div"><div id="progress-bar"></div></div>
    <div id="targetLayer"></div>
	<div id="loader-icon" style="display:none;"><img src="ajax-loader.gif" /></div>
	</center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="changemailclose">Cerrar</button>
        <input type="submit" id="btnSubmit" value="Subir" class="btnSubmit btn btn-success" />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiar Email</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-dismissible alert-success" id="changemailinfo"style="display:none">
	  <button type="button" class="close" data-dismiss="alert" >×</button>
	  <strong><img src="img/ajax-loader.gif"> Enviando solicitud por favor espere...</strong>
	</div>
	 <div class="alert alert-dismissible alert-success" id="changemailsuccess"style="display:none">
	  <button type="button" class="close" data-dismiss="alert" >×</button>
	  <strong><span class="glyphicon glyphicon-ok"></span> Se ha enviado un email de confirmacion, por favor revise su correo</strong>
	</div>
	  <form>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email actual</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nuevo Email</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nuevo Email">
	  </div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="changemailclose">Cerrar</button>
        <button type="button" class="btn btn-success" id="cambiaremail">Salvar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de usuarios</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-dismissible alert-warning" id="registerinfo"style="display:none">
	  <button type="button" class="close" data-dismiss="alert" >×</button>
	  <strong><img src="img/ajax-loader.gif"> Enviando solicitud por favor espere...</strong>
	</div>
	 <div class="alert alert-dismissible alert-success" id="registersuccess"style="display:none">
	  <button type="button" class="close" data-dismiss="alert" >×</button>
	  <strong><span class="glyphicon glyphicon-ok"></span> Su cuenta se ha creado exitosamente!</strong>
	</div>
	<div class="alert alert-dismissible alert-danger" id="registerexist"style="display:none">
	  <button type="button" class="close" data-dismiss="alert" >×</button>
	  <strong><span class="glyphicon glyphicon-ok"></span> Este nombre de usuario ya existe.</strong>
	</div>
	  <form action="" method="post" id="formregister">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Usuario</label>
	    <input type="text" class="form-control input-sm" id="username" placeholder="Usuario" required>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Constraseña</label>
	    <input type="password" class="form-control input-sm" id="password" placeholder="Contraseña" required>
	  </div>

	  <div class="form-group">
	    <label for="exampleInputPassword1">Codigo de borrado</label>
	    <input type="text" class="form-control input-sm" id="socialid" placeholder="Codigo de borrado" required>
	  </div>
	   <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input type="email" class="form-control input-sm" id="email" placeholder="Email" required>
	  </div>
	  	  <div class="form-group">
	      <label for="exampleInputPassword1">Pais</label>	     
		    <select name="pais" id="pais" class="form-control input-sm">
		    <option value="AF">Afganistán</option>
		    <option value="AL">Albania</option>
		    <option value="DE">Alemania</option>
		    <option value="AD">Andorra</option>
		    <option value="AO">Angola</option>
		    <option value="AI">Anguilla</option>
		    <option value="AQ">Antártida</option>
		    <option value="AG">Antigua y Barbuda</option>
		    <option value="AN">Antillas Holandesas</option>
		    <option value="SA">Arabia Saudí</option>
		    <option value="DZ">Argelia</option>
		    <option value="AR">Argentina</option>
		    <option value="AM">Armenia</option>
		    <option value="AW">Aruba</option>
		    <option value="AU">Australia</option>
		    <option value="AT">Austria</option>
		    <option value="AZ">Azerbaiyán</option>
		    <option value="BS">Bahamas</option>
		    <option value="BH">Bahrein</option>
		    <option value="BD">Bangladesh</option>
		    <option value="BB">Barbados</option>
		    <option value="BE">Bélgica</option>
		    <option value="BZ">Belice</option>
		    <option value="BJ">Benin</option>
		    <option value="BM">Bermudas</option>
		    <option value="BY">Bielorrusia</option>
		    <option value="MM">Birmania</option>
		    <option value="BO">Bolivia</option>
		    <option value="BW">Botswana</option>
		    <option value="BR">Brasil</option>
		    <option value="BN">Brunei</option>
		    <option value="BG">Bulgaria</option>
		    <option value="BF">Burkina Faso</option>
		    <option value="BI">Burundi</option>
		    <option value="BT">Bután</option>
		    <option value="CV">Cabo Verde</option>
		    <option value="KH">Camboya</option>
		    <option value="CM">Camerún</option>
		    <option value="CA">Canadá</option>
		    <option value="TD">Chad</option>
		    <option value="CL">Chile</option>
		    <option value="CN">China</option>
		    <option value="CY">Chipre</option>
		    <option value="CO">Colombia</option>
		    <option value="KM">Comores</option>
		    <option value="CG">Congo</option>
		    <option value="KR">Corea</option>
		    <option value="KP">Corea del Norte</option>
		    <option value="CI">Costa de Marfíl</option>
		    <option value="CR">Costa Rica</option>
		    <option value="HR">Croacia (Hrvatska)</option>
		    <option value="CU">Cuba</option>
		    <option value="DK">Dinamarca</option>
		    <option value="DJ">Djibouti</option>
		    <option value="DM">Dominica</option>
		    <option value="EC">Ecuador</option>
		    <option value="EG">Egipto</option>
		    <option value="SV">El Salvador</option>
		    <option value="ER">Eritrea</option>
		    <option value="SI">Eslovenia</option>
		    <option value="ES" selected>España</option>
		    <option value="US">Estados Unidos</option>
		    <option value="EE">Estonia</option>
		    <option value="ET">Etiopía</option>
		    <option value="FJ">Fiji</option>
		    <option value="PH">Filipinas</option>
		    <option value="FI">Finlandia</option>
		    <option value="FR">Francia</option>
		    <option value="GA">Gabón</option>
		    <option value="GM">Gambia</option>
		    <option value="GE">Georgia</option>
		    <option value="GH">Ghana</option>
		    <option value="GI">Gibraltar</option>
		    <option value="GD">Granada</option>
		    <option value="GR">Grecia</option>
		    <option value="GL">Groenlandia</option>
		    <option value="GP">Guadalupe</option>
		    <option value="GU">Guam</option>
		    <option value="GT">Guatemala</option>
		    <option value="GY">Guayana</option>
		    <option value="GF">Guayana Francesa</option>
		    <option value="GN">Guinea</option>
		    <option value="GQ">Guinea Ecuatorial</option>
		    <option value="GW">Guinea-Bissau</option>
		    <option value="HT">Haití</option>
		    <option value="HN">Honduras</option>
		    <option value="HU">Hungría</option>
		    <option value="IN">India</option>
		    <option value="ID">Indonesia</option>
		    <option value="IQ">Irak</option>
		    <option value="IR">Irán</option>
		    <option value="IE">Irlanda</option>
		    <option value="BV">Isla Bouvet</option>
		    <option value="CX">Isla de Christmas</option>
		    <option value="IS">Islandia</option>
		    <option value="KY">Islas Caimán</option>
		    <option value="CK">Islas Cook</option>
		    <option value="FO">Islas Faroe</option>
		    <option value="FK">Islas Malvinas</option>
		    <option value="MH">Islas Marshall</option>
		    <option value="PW">Islas Palau</option>
		    <option value="SB">Islas Salomón</option>
		    <option value="TK">Islas Tokelau</option>
		    <option value="IL">Israel</option>
		    <option value="IT">Italia</option>
		    <option value="JM">Jamaica</option>
		    <option value="JP">Japón</option>
		    <option value="JO">Jordania</option>
		    <option value="KZ">Kazajistán</option>
		    <option value="KE">Kenia</option>
		    <option value="KG">Kirguizistán</option>
		    <option value="KI">Kiribati</option>
		    <option value="KW">Kuwait</option>
		    <option value="LA">Laos</option>
		    <option value="LS">Lesotho</option>
		    <option value="LV">Letonia</option>
		    <option value="LB">Líbano</option>
		    <option value="LR">Liberia</option>
		    <option value="LY">Libia</option>
		    <option value="LI">Liechtenstein</option>
		    <option value="LT">Lituania</option>
		    <option value="LU">Luxemburgo</option>
		    <option value="MG">Madagascar</option>
		    <option value="MY">Malasia</option>
		    <option value="MW">Malawi</option>
		    <option value="MV">Maldivas</option>
		    <option value="ML">Malí</option>
		    <option value="MT">Malta</option>
		    <option value="MA">Marruecos</option>
		    <option value="MQ">Martinica</option>
		    <option value="MU">Mauricio</option>
		    <option value="MR">Mauritania</option>
		    <option value="YT">Mayotte</option>
		    <option value="MX">México</option>
		    <option value="FM">Micronesia</option>
		    <option value="MD">Moldavia</option>
		    <option value="MC">Mónaco</option>
		    <option value="MN">Mongolia</option>
		    <option value="MS">Montserrat</option>
		    <option value="MZ">Mozambique</option>
		    <option value="NA">Namibia</option>
		    <option value="NR">Nauru</option>
		    <option value="NP">Nepal</option>
		    <option value="NI">Nicaragua</option>
		    <option value="NE">Níger</option>
		    <option value="NG">Nigeria</option>
		    <option value="NU">Niue</option>
		    <option value="NF">Norfolk</option>
		    <option value="NO">Noruega</option>
		    <option value="NC">Nueva Caledonia</option>
		    <option value="NZ">Nueva Zelanda</option>
		    <option value="OM">Omán</option>
		    <option value="NL">Países Bajos</option>
		    <option value="PA">Panamá</option>
		    <option value="PG">Papúa Nueva Guinea</option>
		    <option value="PK">Paquistán</option>
		    <option value="PY">Paraguay</option>
		    <option value="PE">Perú</option>
		    <option value="PN">Pitcairn</option>
		    <option value="PF">Polinesia Francesa</option>
		    <option value="PL">Polonia</option>
		    <option value="PT">Portugal</option>
		    <option value="PR">Puerto Rico</option>
		    <option value="QA">Qatar</option>
		    <option value="UK">Reino Unido</option>
		    <option value="CF">República Centroafricana</option>
		    <option value="CZ">República Checa</option>
		    <option value="ZA">República de Sudáfrica</option>
		    <option value="DO">República Dominicana</option>
		    <option value="SK">República Eslovaca</option>
		    <option value="RE">Reunión</option>
		    <option value="RW">Ruanda</option>
		    <option value="RO">Rumania</option>
		    <option value="RU">Rusia</option>
		    <option value="EH">Sahara Occidental</option>
		    <option value="KN">Saint Kitts y Nevis</option>
		    <option value="WS">Samoa</option>
		    <option value="AS">Samoa Americana</option>
		    <option value="SM">San Marino</option>
		    <option value="VC">San Vicente y Granadinas</option>
		    <option value="SH">Santa Helena</option>
		    <option value="LC">Santa Lucía</option>
		    <option value="ST">Santo Tomé y Príncipe</option>
		    <option value="SN">Senegal</option>
		    <option value="SC">Seychelles</option>
		    <option value="SL">Sierra Leona</option>
		    <option value="SG">Singapur</option>
		    <option value="SY">Siria</option>
		    <option value="SO">Somalia</option>
		    <option value="LK">Sri Lanka</option>
		    <option value="PM">St. Pierre y Miquelon</option>
		    <option value="SZ">Suazilandia</option>
		    <option value="SD">Sudán</option>
		    <option value="SE">Suecia</option>
		    <option value="CH">Suiza</option>
		    <option value="SR">Surinam</option>
		    <option value="TH">Tailandia</option>
		    <option value="TW">Taiwán</option>
		    <option value="TZ">Tanzania</option>
		    <option value="TJ">Tayikistán</option>
		    <option value="TP">Timor Oriental</option>
		    <option value="TG">Togo</option>
		    <option value="TO">Tonga</option>
		    <option value="TT">Trinidad y Tobago</option>
		    <option value="TN">Túnez</option>
		    <option value="TM">Turkmenistán</option>
		    <option value="TR">Turquía</option>
		    <option value="TV">Tuvalu</option>
		    <option value="UA">Ucrania</option>
		    <option value="UG">Uganda</option>
		    <option value="UY">Uruguay</option>
		    <option value="UZ">Uzbekistán</option>
		    <option value="VU">Vanuatu</option>
		    <option value="VE">Venezuela</option>
		    <option value="VN">Vietnam</option>
		    <option value="YE">Yemen</option>
		    <option value="YU">Yugoslavia</option>
		    <option value="ZM">Zambia</option>
		    <option value="ZW">Zimbabue</option>
		    </select>
		  </div>
	   <div class="form-group">
	   <label for="exampleInputPassword1">Eres humano?</label>
	   2 + 3 = ? <input type="text" id="captcha" class="form-control input-sm" required>
	   </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="changemailclose">Cerrar</button>
        <button type="submit" class="btn btn-success" id="cambiaremail">Salvar Cambios</button>
      </div>
      </form>
   	  </div>
	  </div>
      </div>
	<!-- Modal -->
	<!-- Modal -->
		<div class="modal fade" id="chargecoins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Cargar MD</h4>
		      </div>
		      <table class="table">
		      	<tr>
		      		<td align="center">
		      			<h5>Costos y coins por SMS</h5>
		      			Chile = 120 coins<br>
		      			Argentina = 100 coins<br>
		      			España = 100 coins <br>
		      			<b>Todos los demas paises por cada SMS reciben 75 coins</b>
		      			<h5>Metodo de pago Tarjeta de credito y deposito bancario</h5>
		      			20€ = 1350 coins<br>
		      			35€ = 2400 coins<br>
		      			50€ = 3600 coins<br>
		      			<h5>Conciendo los precios solo debes pinchar en el icono de aqui abajo</h5>
		      			<a class='rm_pay_btn' href='https://iframes.recursosmoviles.com/v3/?wmid=11526&cid=33799' target='_blank'><img src='https://iframes.recursosmoviles.com/v3/button.php?label=games&theme=3&color=green' /></a>
		      		</td>
		      	</tr>
		      </table>
		    </div>
		  </div>
		</div>
		<!-- Modal -->
	   <div class="col-md-10 col-md-offset-1">
	   <div class="well" style="margin-top:15px;">
	   	 <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">MT2Evolution</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
	      </div>
	      <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <li>
           <a href="index.php?s=home">Inicio</a>
            </li>
            <li>
            <a href="#" data-toggle="modal" data-target="#myModal2">Registro</a>
            </li>
            <li>
            <a href="index.php?s=descargas">Descargas</a>
            </li>
            <li>
            <a href="#">Tienda</a>
            </li>
            <li>
            <a href="index.php?s=ranking">Ranking</a>
            </li>
            <li>
              <a href="#">Contacto</a>
            </li>
            <li>
             <a href="#">Foro</a>
            </li>          
         </ul>
         </div>
      	 </div>
   		 </div>
    	 <div class="row">
          <div class="col-lg-4">
            <div class="bs-component">
             <div class="panel panel-danger">
			 <div class="panel-heading">
			 <h3 class="panel-title">Panel de usuario</h3>
			 </div>
			 <div class="panel-body">
			 <div class="alert alert-dismissible alert-success" id="correcto" style="display:none">
			 <button type="button" class="close" data-dismiss="alert">×</button>
		 	 <strong><span class="glyphicon glyphicon-ok"></span> inicio de Session Correcto!</strong>
		    </div>
		    <div class="alert alert-dismissible alert-danger" id="fail" style="display:none">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong><span class="glyphicon glyphicon-exclamation-sign"></span> Revise sus entradas!</strong>
			</div>
			<div class="alert alert-dismissible alert-danger" id="empty" style="display:none">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong><span class="glyphicon glyphicon-exclamation-sign"></span> Ingrese sus datos!</strong>
			</div>
			<div class="alert alert-dismissible alert-info" id="logout" style="display:none">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Saliendo!</strong> <a href="#" class="alert-link">Por favor espere <img src="img/ajax-loader.gif"></a>
			</div>
			<?php if($_SESSION['login']) {
			?>
			<div class="widget-fluid userInfo clearfix">
				  <div class="image">
				  <?php if($_SESSION['pic'] == '') { ?>
				  <a href="#" data-toggle="modal" data-target="#avatar"><img src="img/avatars/default.png" class="img-thumbnail"></a>
				  <?php } else { 
				  	echo '<a href="#" data-toggle="modal" data-target="#avatar"><img src="img/avatars/'.$class->getavatar($_SESSION['id']).'.jpg" class="img-thumbnail"></a>';
				  }
				  ?>
				  </div>              
				  <div class="name">Bienvenido, <?php echo $_SESSION['login']; ?> </div>
				  <ul class="menuList">
				  	 <?php if($_SESSION['web_admin'] >= 9) { ?>
				  	 <li><a href="index.php?s=admin"><span class="glyphicon glyphicon-cog"></span> Administración</a></li>
				     <?php } ?>
				     <li><a href="index.php?s=usercp"><span class="glyphicon glyphicon-cog"></span> Panel de Usuario</a></li>
				     <li><a href="#"><span class="glyphicon glyphicon-comment"></span> Mensajes</a> <span class="badge" style="font-size:8px;">3</span></li>
				     <li><a href="#" id="salir"><span class="glyphicon glyphicon-share-alt"></span> Salir</a></li>                        
				  </ul>
				  <div class="text">
				  	Tu ultima visita fue el: <b><?php echo $_SESSION['last_play']; ?> </b>
				  </div>
				  </div>
				 <div class="dr"><span></span></div>
			<?php  } else {?>
			<form action="" method="post" id="formlogin">
			<div class="form-group">
		  	<input placeholder="Usuario" name="username" id="cuenta" class="form-control input-sm"  type="text" required> 
			</div>
			<div class="form-group">
			<input placeholder="Contraseña"  type="password" name="contrasena" id="contrasena" class="form-control input-sm" type="text" required>
				</div>
				  <button type="button" name="entrar" id="entrar" class="btn btn-success">Entrar</button>
				  <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Registro</button>&nbsp;&nbsp;<span id="load"></span>
				</form>
				<?php } ?>
				  </div>
				</div>
				 <div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Aun no te registras?</h3>
				    </div>
				    <div class="panel-body">
				  <a href="#" data-toggle="modal" data-target="#myModal2"><img class="img-responsive" src="img/btn_signup_es_off.png"></a>
				  </div>
				</div> 
				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Descarga el cliente!</h3>
				    </div>
				    <div class="panel-body">
				      <a href=""><img class="img-responsive"  src="img/btn_freedownload_es_over.png"></a>
				  </div>
				</div>
				 <div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Trailer</h3>
				    </div>
				    <div class="panel-body">
				    <iframe class="img-responsive" width="280" height="200" src="https://www.youtube.com/embed/LR0p460lbNs" frameborder="0" allowfullscreen></iframe>
				  </div>
				</div>
                </div>
          	    </div>
          	    <?php
					$site = addslashes(htmlentities($_GET["s"]));
					if($site && $site != "") {
						switch($site) {
							case "home":
								$href = "pages/home.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "newpass":
								$href = "pages/newpass.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "contacto":
								$href = "pages/contacto.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "admin":
								$href = "pages/admin.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "descargas":
								$href = "pages/descargas.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "historial":
								$href = "pages/historial.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "logout":
								$href = "pages/logout.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "mailbox":
								$href = "pages/mailbox.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "newpass":
								$href = "pages/newpass.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "login":
								$href = "pages/login.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "ranking":
								$href = "pages/ranking.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "payment":
								$href = "pages/payment.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "usercp":
								$href = "pages/usercp.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "recargar":
								$href = "pages/recargar.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "itemshop":
								$href = "pages/itemshop.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
							case "register":
								$href = "pages/register.php";
								if(file_exists($href)) {
									include($href);
								} else {
									include("pages/404.php");
								}
								break;
								default:
								include("pages/404.php");	
								}
							} else {
								include("pages/home.php");
						}
				?>        
           		</div>
				 <div class="well">
				 	<center><p>Copyright © <a href="#">Metin2Evolution</a> 2015. All rights reserved.</p>
                
				</center>

				 </div>
		    </div>
		 </div>
</body>
</html>