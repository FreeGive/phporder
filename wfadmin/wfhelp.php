<?php
error_reporting(0);
ini_set('default_charset','utf-8');
$id=$_GET['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfhelp</title>
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wfmain">
<?php
switch($id){
	case '1':		
?>
	<p class="ask">忘记后台登录密码怎么办？</p>
	<p class="answer">处于安全考虑，WFPHP订单系统暂时不开发自助找回登录密码功能，若忘记登录密码联系客服。</p>
<?php
break;
case 2:
?>
	<p class="ask">添加产品和价格的正确格式如下：</p>
	<p class="answer"><img src="./helpimg/2.gif"></p>
<?php
break;
case 3:
?>
	<p class="ask">关于本域名调用代码和跨域名调用代码的说明：</p>
	<p class="answer">您当前订单系统安装在 <?php echo $_SERVER['HTTP_HOST']; ?> 域名下，只要这个域名下的任何目录下的任何网页上调用下单页面都可以使用本域名调用代码，如果是其它域名下的网页上调用必须用跨域名调用代码。</p>
	<p class="answer red">注意：如果使用跨域名调用代码后无法看到订单提交按钮，需要手动将订单调用代码里的订单高度设置大一点，也就是wfheight的值，如：wfheight='1000'。</p>
<?php
break;
case 4:
?>
	<p class="ask">如何添加扩展模板？</p>
	<p class="answer">系统下单页面模板目录是【wforder/wftemplate】，将WF官网下载的扩展模板解压后上传到【wforder/wftemplate】目录下即可，下载地址：<a href="http://www.wforder.com/down/?id=1" class="g" target="_blank">http://www.wforder.com/down/?id=1</a></p>
<?php
break;
case 5:
?>
	<p class="ask">订单标题是什么？</p>
	<p class="answer"><img src="../wftemplate/default/images/title.png"></p>
	<p class="answer">订单页面上的这个在线快速订购就叫订单标题。</p>
	<p class="answer red">注意：default风格只能是图片，weixin风格可以是图片也可以是文字，如果没有上传自定义图片，则显示默认文字。</p>
<?php
break;
case 6:
?>
	<p class="ask">单选、下拉、多选、框选演示如下：</p>
	<p class="answer"><img src="./helpimg/6.gif"></p>
<?php
break;
case 7:
?>
	<p class="ask">付款方式折扣和排序怎么设置？</p>
	<p class="answer"><img src="./helpimg/7.gif"></p>
<?php
break;
case 8:
?>
	<p class="ask">发货通知标题是什么？</p>
	<p class="answer"><img src="./helpimg/8.gif"></p>
	<p class="answer">如上图所示“发货通知”就是订单页面上的发货通知标题。</p>
	<p class="answer red">注意：default风格只能是文字，weixin风格可以是图片也可以是文字，如果没有上传自定义图片，则显示默认文字。</p>
<?php
break;
case 9:
?>
	<p class="ask">发货通知内容中可用以下系统变量：</p>
	<p class="answer">日期1：{wfbuydate1}　日期2：{wfbuydate2}</p>
	<p class="answer">省份：{wfprovince}　姓名：{wfname}　手机：{wfmob}　订购产品：{wfproduct}</p>
	<p class="answer red">注意：日期1和日期2展示效果不同，比如：日期1 --- <span class="blue">2017-2-28</span>　日期2 --- <span class="blue">2分钟前</span></p>

<?php
break;
case 10:
?>
	<p class="ask">通用系统变量：</p>
	<p class="answer">订单号：{wfprovince}　订购日期：{wfbuydate}　订购产品：{wfproduct}　产品尺码：{wfprosize}</p>
	<p class="answer">产品颜色：{wfprocolour}　数量：{wfnums}　价格：{wfprice}　姓名：{wfname}　手机：{wfmob}</p>
	<p class="answer">地址：{wfaddress} …… 更多变量请联系客服</p>
<?php
break;
default:
}
?>
</div>
</body>
</html>