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
require '../wfpublic/WFihead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>安装程序 - WFPHP订单系统</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="./images/style.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false">
<?php switch($wfstep){case 1:?>
<div class="wfinstall">
    <div class="wftitle">WFPHP订单系统安装程序 --- <span class="red fa">第 ① 步：环境检测</span></div>
    <form name="wfform" action="?wfstep=2" method="post">
        <div class="wfstep">
            <div class="left"><?php $WFinstall->wfchkdir();?></div>
            <div class="right"><?php $WFinstall->wfchkfun();?></div>
        </div>
        <div class="wfnext"><input name="wfsubmit" type="submit" value="下一步" class="wfsubmit"<?php if($WFinstall->wfnext==0){echo ' style="background:#999;" disabled';}?>></div>
    </form>
</div>
<?php break;case 2:?>
<script type="text/javascript">
function postcheck(){
	if(document.wfform.wfdbhost.value==""){
		alert('请填写数据库服务器！');
		document.wfform.wfdbhost.focus();
		return false;
	}
	if(document.wfform.wfdbname.value==""){
		alert('请填写数据库名！');
		document.wfform.wfdbname.focus();
		return false;
	}
	if(document.wfform.wfdbuser.value==""){
		alert('请填写数据库用户名！');
		document.wfform.wfdbuser.focus();
		return false;
	}
	if(document.wfform.wfdbpw.value==""){
		alert('请填写数据库密码！');
		document.wfform.wfdbpw.focus();
		return false;
	}
	document.wfform.wfsubmit.disabled=true;
	document.wfform.wfsubmit.value="正在安装，请稍等...";
	return true;
}
</script>
<div class="wfinstall">
    <div class="wftitle">WFPHP订单系统安装程序 --- <span class="red fa">第 ② 步：数据库配置</span></div>
    <form name="wfform" action="?wfstep=3" method="post" onsubmit="return postcheck()">
        <div class="wfstep">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="l"><em>*</em>数据库服务器</td>
                    <td class="r"><input type="text" name="wfdbhost" value="localhost" class="text"><span class="ps">请向主机服务商索取数据库链接地址</span></td>
                </tr>
                <tr>
                    <td class="l"><em>*</em>服务器端口号</td>
                    <td class="r"><input type="text" name="wfdbport" value="3306" class="text"><span class="ps">请向主机服务商索取数据库服务器端口号</span></td>
                </tr>
                <tr>
                    <td class="l"><em>*</em>数据库名</td>
                    <td class="r"><input type="text" name="wfdbname" class="text"><span class="ps">请向主机服务商索取数据库名</span></td>
                </tr>
                <tr>
                    <td class="l"><em>*</em>数据库用户名</td>
                    <td class="r"><input type="text" name="wfdbuser" class="text"><span class="ps">请向主机服务商索取数据库用户名</span></td>
                </tr>
                <tr>
                    <td class="l"><em>*</em>数据库密码</td>
                    <td class="r"><input type="text" name="wfdbpw" class="text"><span class="ps">请向主机服务商索取数据库密码</span></td>
                </tr>
            </table>
        </div>
        <div class="wfnext"><input name="wfsubmit" type="submit" value="安装数据库" class="wfsubmit"></div>
    </form>
</div>
<?php break;case 3:?>
<div class="wfinstall">
    <div class="wftitle">WFPHP订单系统安装程序</div>
    <div class="wfinsok">
        <?php $WFinstall->wfinstall($wfdbhost,$wfdbuser,$wfdbpw,$wfdbname,$wfdbport);?>
        <p><img src="./images/success.gif"></p><p class="green fa">非常棒！安装成功了！欢迎您使用WFPHP订单系统！</p>
        <p>后台登陆地址：<a href="../wfadmin/">../wfadmin/ （点击登陆）</a></p>
        <p class="green">帐号：admin　　　密码：123456</p>
        <p class="red">注意：登陆后一定要记得更改后台登陆地址和登陆密码哦！</p>
    </div>    
</div>
<?php break;default:?>
<div class="wfinstall">
    <div class="wftitle">WFPHP订单系统安装程序 --- <span class="red fa">版权声明</span></div>
    <form name="wfform" action="?wfstep=1" method="post">
        <div class="wfstep">
            <div class="wfstate">  
				<p>　　<font class="red">版权声明一：</font>WFPHP订单系统版权属于WFPHP订单系统开发者WENFEI所有。WFPHP订单系统目录名为"wforder"，而且wforder目录下所有的子目录名、文件名、CSS文件里的class名、JS文件里的变量名、函数名、PHP文件里的类名、变量名、函数名都是以"wf"打头，整个系统源文件共有6629处出现"wf"字样。（声明：以下所提到的"此系统"都代表"WFPHP订单系统"）</p>
				<p>　　<font class="red">版权声明二：</font>凡是破解此系统者、二次盗卖此系统者在三日内必出车祸死于非命，五日内其父母必得绝症不治身亡，七日内老婆儿女将意外身亡，总之破解此系统者、盗卖此系统者全家都不得好死，很灵验的！地球人都信这个，不信就试试吧！</p>
				<p>　　<font class="red">版权声明三：</font>破解此系统死全家！盗卖此系统者死全家！唆使别人破解此系统者死全家！把此系统发给别人破解者死全家！人在做，天在看，相信一切皆有报应！</p>
				<p class="red">　　免责声明：用户因违反系统版权而引发的一切意外后果自负，与本系统开发者没有任何关系，特此声明！</p>
            </div>
        </div>
        <div class="wfnext"><input name="wfsubmit" type="submit" value="我自愿并同意接受以上所有版权声明" class="wfsubmit"></div>
    </form>
</div>
<?php }?>
</body>
</html>