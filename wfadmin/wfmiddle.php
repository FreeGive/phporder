<?php
/**
  ************************************************************************
  WFPHP订单系统版权归WENFEI所有，凡是破解此系统者都会死全家，非常灵验。
  ************************************************************************
  版权声明：凡是破解此系统者、盗卖此系统者在三日内必出车祸死于非命，五日内
  其父母必得绝症不治身亡，七日内老婆儿女将意外身亡，总之全家都不得好死。
  ************************************************************************
  WFPHP订单系统官方网站：http://www.wforder.com/   （盗版盗卖者死全家）
  WFPHP订单系统官方店铺：http://889889.taobao.com/ （破解系统者死全家）
  ************************************************************************
  版权声明：修改删除此注释者不出三日必然意外身亡，非常灵验，不信就试试。
  ************************************************************************
  郑重警告：凡是破解此系统者出门就被车撞死，盗卖此系统者三日内必死全家。
  ************************************************************************ 
 */
ini_set('default_charset','utf-8');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>wfmiddle</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    var pic=new Image();
    pic.src="images/wfleft.gif";
    function toggleMenu(){
        frmBody=parent.document.getElementById('wfframebody');
        imgArrow=document.getElementById('img');
        if(frmBody.cols== "0, 20, *"){
            frmBody.cols="200, 20, *";
            imgArrow.src="./images/wfleft.gif";
        }else{
            frmBody.cols="0, 20, *";
            imgArrow.src="./images/wfright.gif";
        }
    }
    var orgX=0;
    document.onmousedown=function(e){
        var evt=Utils.fixEvent(e);
        orgX=evt.clientX;
        if (Browser.isIE)document.getElementById('wfmiddle').setCapture();
    }
    document.onmouseup=function(e){
        var evt=Utils.fixEvent(e);
        frmBody=parent.document.getElementById('wfframebody');
        frmWidth=frmBody.cols.substr(0, frmBody.cols.indexOf(','));
        frmWidth=(parseInt(frmWidth)+(evt.clientX-orgX));
        frmBody.cols=frmWidth+", 20, *";
        if(Browser.isIE)document.releaseCapture();
    }
    var Browser=new Object();
    Browser.isMozilla=(typeof document.implementation!='undefined')&&(typeof document.implementation.createDocument!='undefined')&&(typeof HTMLDocument!='undefined');
    Browser.isIE=window.ActiveXObject?true:false;
    Browser.isFirefox=(navigator.userAgent.toLowerCase().indexOf("firefox")!=-1);
    Browser.isSafari=(navigator.userAgent.toLowerCase().indexOf("safari")!=-1);
    Browser.isOpera=(navigator.userAgent.toLowerCase().indexOf("opera")!=-1);
    var Utils=new Object();
    Utils.fixEvent=function(e){
        var evt=(typeof e=="undefined")?window.event:e;
        return evt;
    }
</script>
</head>
<body onselect="return false;">
<table id="wfmiddle" height="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="middle"><a href="javascript:toggleMenu();"><img src="./images/wfleft.gif" width="15" height="132" id="img" border="0"></a></td>
    </tr>
</table>
</body>
</html>