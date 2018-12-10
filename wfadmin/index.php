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
require '../wfpublic/WFlhead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理 - WFPHP订单系统</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wflogin_logo"><img src="./images/wflogo1.gif" alt="WFPHP订单系统"></div>
<div class="wflogin_bg">
	<div class="wflogin_wrap">
		<div class="wflogin_box">
			<div class="title">登录后台</div>
			<form id="wfform" action="?action=wflogin" method="post" name="wfform" class="layui-form">
				<div class="wfbdbox"><label class="wfuser"></label><input name="wfuser" id="wfuser" type="text" lay-verify="required" placeholder="请填写帐号" class="text"></div>
				<div class="wfbdbox"><label class="wfpassword"></label><input name="wfpassword" type="password" lay-verify="required" placeholder="请填写密码" class="text"></div>
				<input type="button" lay-submit lay-filter="wfsubmit" value="登 录" class="wfsubmit">
			</form>
			<div class="findpw"><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=1','140px')" class="g">忘记密码</a></div>
		</div>
	</div>
</div>
<div class="wfver_wrap">
	<div class="wfver">
		<div class="logo"><img src="./images/wflogo2.gif" alt="WFPHP订单系统"></div>
		<div class="copyright">Copyright &copy; 2017　<a href="http://www.wforder.com/" target="_blank">WFPHP订单系统（wforder.com）</a>　<a href="http://www.wforder.com/about/?id=3" target="_blank">使用系统前请务必查看版权声明</a></div>
	</div>
</div>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>