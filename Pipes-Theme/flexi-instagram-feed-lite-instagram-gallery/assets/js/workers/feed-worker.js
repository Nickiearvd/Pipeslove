/*
 *	 v1.7.2
 *
 *	Copyright (c) 2017 By WP Dancers.
 */
onmessage=function(a){a=a.data;switch(a.action){case "process-feeds":var d=flexi_add_params(a.base_path+"process-feeds",{stream:a.stream});break;case "process-feed":d=flexi_add_params(a.base_path+"process-feed",{id:a.id})}flexi_xhr(d,"GET",function(a,b){b||postMessage(a)})};function flexi_xhr(a,d,c){c=c||function(){};var b=new XMLHttpRequest;b.open(d||"GET",a,!0);b.onload=function(){200<=b.status&&400>b.status?c(b.responseText,!1):c(null,!0)};b.onerror=function(){c(null,!0)};b.send()}
function flexi_add_params(a,d){var c="",b;for(b in d)c+=b+"="+d[b]+"&";return a+(~a.indexOf("?")?"&":"?")+c.substr(0,c.length-1)};
