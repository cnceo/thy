function IsPC(){var userAgentInfo=navigator.userAgent;var Agents=new Array("Android","iPhone","SymbianOS","Windows Phone");var flag=true;for(var v=0;v<Agents.length;v++){if(userAgentInfo.indexOf(Agents[v])>0){flag=false;break;}}
return flag;}
function UnMatchDir(){var flag=false;var MactchDirs=new Array("jiaocheng/weixin");for(var v=0;v<MactchDirs.length;v++){if(document.URL.toLocaleLowerCase().indexOf("/zhuce/index.php"+MactchDirs[v]+"")>-1){flag=true;break;}}
return flag;}
if(!IsPC()){var url=document.URL;if(!UnMatchDir()){url=url.replace("/zhuce/index.php","/zhuce/sj/index.html");}else{url="/zhuce/sj/index.html";}
location.href=url;}
var rmd_sta=0;