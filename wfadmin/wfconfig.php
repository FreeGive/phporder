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
require '../wfpublic/WFahead.php';
require WFPUBLIC.'/WFsetsys.php';
$WFsetsys=new WFsetsys(true);
$wfuser=$_SESSION['wfuser'];
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$wfoldurl=!empty($_POST['wfoldurl'])?$WFsetsys->wfwfv($_POST['wfoldurl']):'';
$wfnewurl=!empty($_POST['wfnewurl'])?$WFsetsys->wfwfv($_POST['wfnewurl']):'wfadmin';
$wfpbase=!empty($_POST['wfbase'])?$WFsetsys->wfwfv($_POST['wfbase']):$wfbase;
$wfpmail=!empty($_POST['wfmail'])?$WFsetsys->wfwfv($_POST['wfmail']):$wfmail;
$wfppay=!empty($_POST['wfpay'])?$WFsetsys->wfwfv($_POST['wfpay']):$wfpay;
$wfpsms=!empty($_POST['wfsms'])?$WFsetsys->wfwfv($_POST['wfsms']):$wfsms;
$wfpsafe=!empty($_POST['wfsafe'])?$WFsetsys->wfwfv($_POST['wfsafe']):$wfsafe;
$wfpsender=!empty($_POST['wfsender'])?$WFsetsys->wfwfv($_POST['wfsender']):$wfsender;
$wfnowset=!empty($_POST['wfnowset'])?$WFsetsys->wfwfv($_POST['wfnowset']):'setbase';
switch($_GET['action']){
	case 'setconfig':
	$WFsetsys->wfsetconfig($wfpbase,$wfpmail,$wfppay,$wfpsms,$wfpsafe,$wfpsender,$wfnowset);
	break;
	case 'setadminurl':
	$WFsetsys->setadminurl($wfoldurl,$wfnewurl);
	break;
	case 'editpassword':
	$WFsetsys->editpassword($wfuser,$oldpassword,$newpassword);
	break;
	default:break;
}
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfconfig</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php
	if($_GET['set']=='base'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>系统基础设置</legend></fieldset>
        <form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setbase">
			<div class="layui-form-item">
			    <label class="layui-form-label">产品/模板列表显示条数</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[ptpagesize]" lay-verify="number" value="<?php echo $wfbase['ptpagesize']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认显示10条</div>
			</div>		
			<div class="layui-form-item">
			    <label class="layui-form-label">订单列表显示条数</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[ddpagesize]" lay-verify="number" value="<?php echo $wfbase['ddpagesize']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认显示10条</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">系统日志列表显示条数</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[logpagesize]" lay-verify="number" value="<?php echo $wfbase['logpagesize']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认显示10条</div>
			</div>		
		    <div class="layui-form-item">
			    <label class="layui-form-label">系统操作日志保存天数</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[logholdtime]" lay-verify="number" value="<?php echo $wfbase['logholdtime']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>系统只保留最近<?php echo $wfbase['logholdtime']; ?>天的日志</div>
			</div>
			
		    <div class="layui-form-item">
			    <label class="layui-form-label green">快递鸟API接口-商户ID</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[kdnid]" placeholder="填写快递鸟商户ID" value="<?php echo $wfbase['kdnid']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>还没有注册？<a href="http://www.kdniao.com/reg" class="g" target="_blank">立即注册</a></div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label green">快递鸟API接口-KEY</label>
				<div class="layui-input-inline">
					<input type="text" name="wfbase[kdnkey]" placeholder="填写快递鸟APIkey" value="<?php echo $wfbase['kdnkey']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>商户ID和KEY都在快递鸟后台首页获取</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">订单列表选项<br><font class="red">最多可选12项</font></label>
				<div class="layui-input-block">
					<?php
					$res=$WFsetsys->wfshowfield();			
					while($row=$res->fetch_array()){
						if($row['Comment']){
					?>
					<input type="checkbox"<?php if($wfbase['ddlistopt'][$row['Field']]=='on'){echo ' checked';} ?> name="wfbase[ddlistopt][<?php echo $row['Field']; ?>]" lay-filter="ddlistopt" title="<?php echo $row['Comment']; ?>">
					<?php
					}}
					?>
				</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label">订单导出选项</label>
				<div class="layui-input-block">
					<?php
					$res=$WFsetsys->wfshowfield();			
					while($row=$res->fetch_array()){
						if($row['Comment']){
					?>
					<input type="checkbox"<?php if($wfbase['exopt'][$row['Field']]=='on'){echo ' checked';} ?> name="wfbase[exopt][<?php echo $row['Field']; ?>]" title="<?php echo $row['Comment']; ?>">
					<?php
					}}
					?>
				</div>
			</div>			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">订单状态选项</label>
				<div class="layui-input-block">
					<textarea name="wfbase[statusopt]" class="layui-textarea base" onkeyup="this.value=this.value.replace(/(^\s*)|(\s*$)/g,'')"><?php echo $wfbase['statusopt']; ?></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>用“|”隔开</div>
			</div>			
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 保存设置</button></div>            
        </form>
    </div>	
    <?php
	}elseif($_GET['set']=='mail'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>邮件提醒设置</legend></fieldset>		
        <form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setmail">
            <input type="password" name="password" style="display:none;"> 
			<div class="layui-form-item">
				<label class="layui-form-label">邮件发送开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfmail['sendon']=='on'){echo ' checked';} ?> name="wfmail[sendon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态，如需要邮件提醒功能，点击开启</div>
			</div>            
			<fieldset class="layui-elem-field layui-field-title"><legend>发件箱设置</legend></fieldset>			 
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>SMTP服务器</label>
				<div class="layui-input-inline">
					<input type="text" name="wfmail[smtphost]" lay-verify="required" onkeyup="this.value=this.value.replace(/(^\s*)|(\s*$)/g,'')" value="<?php echo $wfmail['smtphost']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>网易163邮箱：smtp.163.com</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>SMTP服务器端口</label>
				<div class="layui-input-inline">
					<input type="text" name="wfmail[smtpport]" lay-verify="smtpport" value="<?php echo $wfmail['smtpport']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为25，无需更改</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>SMTP发送邮箱</label>
				<div class="layui-input-inline">
					<input type="text" name="wfmail[frommail]" lay-verify="email" value="<?php echo $wfmail['frommail']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>推荐使用网易邮箱</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>SMTP用户名</label>
				<div class="layui-input-inline">
					<input type="text" name="wfmail[smtpuser]" lay-verify="email" autocomplete="off" value="<?php echo $wfmail['smtpuser']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>此处填写网易邮箱</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>SMTP密码</label>
				<div class="layui-input-inline">
					<input type="password" name="wfmail[smtppassword]" lay-verify="required" autocomplete="off" value="<?php echo $wfmail['smtppassword']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>此处填写网易邮箱的客户端授权密码</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>订单信息邮件标题</label>
				<div class="layui-input-inline" style="width:60%;">
					<input type="text" name="wfmail[subject]" lay-verify="required" value="<?php echo $wfmail['subject']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>此处填写邮箱里收到的订单邮件的标题</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title"><legend>收件箱设置</legend></fieldset>			 
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>收件人邮箱</label>
				<div class="layui-input-inline">
					<input type="text" name="wfmail[tomail1]" lay-verify="required" value="<?php echo $wfmail['tomail1']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>此处填写接收订单的邮箱，多个邮箱用半角英文逗号分隔</div>
			</div>
			<blockquote class="layui-elem-quote"><span class="red">注意：</span>订单邮件标题中可添加动态变量，如：单号：{wfddno}　　产品名称：{wfproname}　　产品套餐：{wfproduct}　　姓名：{wfname}　　手机：{wfmob}　　地址：{wfaddress}　……　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=10','200px')" class="g">系统变量说明</a></blockquote>		
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 保存设置</button></div>            
        </form>
    </div>
	<?php
	}elseif($_GET['set']=='pay'){
	?>
    <div class="wfmain">        
		<form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setpay">
			<fieldset class="layui-elem-field layui-field-title"><legend>支付宝支付接口设置</legend></fieldset>		
			<blockquote class="layui-elem-quote layui-quote-nm"><span class="green">温馨提示：</span>支付宝接口需要到支付宝商家中心申请：<a href="https://b.alipay.com/signing/productSet.htm" class="g" target="_blank">https://b.alipay.com/signing/productSet.htm</a></blockquote>	
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>合作伙伴身份（PID）</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[alipartner]" lay-verify="number" value="<?php echo $wfpay['alipartner']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>以2088开头的16位纯数字</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>安全校验码（KEY）</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[alikey]" lay-verify="numlet" value="<?php echo $wfpay['alikey']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>以数字和字母组成的32位MD5密钥</div>
			</div>                
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>签约支付宝</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[aliemail]" lay-verify="required" onkeyup="this.value=this.value.replace(/(^\s*)|(\s*$)/g,'')" value="<?php echo $wfpay['aliemail']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>申请了接口的支付宝帐号</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">保存设置</button>
				</div>
			</div>
			<blockquote class="layui-elem-quote"><span class="red">注意：</span>手机上使用支付宝付款，需要申请<a href="https://b.alipay.com/signing/productDetail.htm?productId=I1011000290000001001" class="g" target="_blank">手机网站支付</a>，接口申请通过后即可直接使用，再无需其它设置，PID和KEY与电脑网站支付接口通用。</blockquote>		
			<fieldset class="layui-elem-field layui-field-title"><legend>微信支付接口设置</legend></fieldset>		
			<blockquote class="layui-elem-quote layui-quote-nm"><span class="green">温馨提示：</span>微信支付接口需要到微信支付官网去申请：<a href="https://pay.weixin.qq.com/" class="g" target="_blank">https://pay.weixin.qq.com/</a>，需要申请公众号支付和扫码支付。</blockquote>	
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>MCHID</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[wx_mchid]" lay-verify="number" value="<?php echo $wfpay['wx_mchid']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>这里填写开户邮件中的商户号</div>
			</div>	 
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>APPID</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[wx_appid]" lay-verify="numlet" value="<?php echo $wfpay['wx_appid']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>这里填写开户邮件中的（公众账号APPID或者应用APPID）</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>KEY</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[wx_key]" lay-verify="numlet" value="<?php echo $wfpay['wx_key']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>这里填写您在商户平台 <a href="https://pay.weixin.qq.com/" target="_blank">http://pay.weixin.qq.com</a> 自己设置的API密钥</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>APPSECRET</label>
				<div class="layui-input-inline">
					<input type="text" name="wfpay[wx_appsecret]" lay-verify="numlet" value="<?php echo $wfpay['wx_appsecret']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>使用APPID对应的公众平台登录 <a href="https://mp.weixin.qq.com/" target="_blank">http://mp.weixin.qq.com</a> 的开发者中心获取AppSecret</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">保存设置</button>
				</div>
			</div>
		</form>		
		<fieldset class="layui-elem-field layui-field-title"><legend>扫码转帐付款设置</legend></fieldset>		
		<blockquote class="layui-elem-quote layui-quote-nm"><span class="red">（免签约）付款原理：</span>扫码转帐付款就是事先上传好你生成的收款二维码图片，顾客提交订单后通过扫码转帐付款达到在线支付目的。</blockquote>	
		<div class="layui-field-box">
			<p>　　<span class="blue">支付宝生成方法：</span>手机上登录【支付宝】→【收款】→【设置金额】→输入你产品的价格→确定，然后长按二维码图片→保存图片到相册，然后把二维码图片发到电脑上，重命名。</p>
			<p>　　<span class="blue">命名及上传方法：</span>命名格式为<font class="red">zfb价格</font>，例如：产品价格是88.00元，那么二维码图片重命名为<font class="red">zfb88.00.jpg</font>，然后上传到【wforder/wfdata/paycode】目录下即可。</p>
			<p><hr></p>
			<p>　　<span class="blue">微信生成方法：</span>手机上登录【微信】→点击屏幕右上角的加号→【收付款】→【我要收款】→【设置金额】→输入你产品的价格→确定，然后长按二维码图片→保存图片，然后把二维码图片发到电脑上，重命名。<br>
			<p>　　<span class="blue">命名及上传方法：</span>命名格式为<font class="red">wx价格</font>，例如：产品价格是88.00元，那么二维码图片重命名为<font class="red">wx88.00.jpg</font>，然后上传到【wforder/wfdata/paycode】目录下即可。</p>
		</div>
		<blockquote class="layui-elem-quote"><span class="red">注意：</span>有几个价格就上传几个二维码价格图片，支付宝与微信可以同时上传，也可以只上传其中一种，系统会自动识别。</blockquote>		
    </div>
	<?php
	}elseif($_GET['set']=='sms'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>短信接口设置</legend></fieldset>		
        <form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setsms">
            <input type="password" name="password" style="display:none;">
			<blockquote class="layui-elem-quote layui-quote-nm"><span class="green">温馨提示：</span>短信帐户到短信宝去自助申请充值：<a href="http://www.smsbao.com/reg?r=10005" class="g" target="_blank">http://wforder.smsbao.com/</a></blockquote>	
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>短信平台帐号</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsms[uid]" lay-verify="required" autocomplete="off" value="<?php echo $wfsms['uid']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>短信平台的登录帐号，还没有？ <a href="http://www.smsbao.com/reg?r=10005" class="b" target="_blank">【立即注册】</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>短信平台密码</label>
				<div class="layui-input-inline">
					<input type="password" name="wfsms[pwd]" lay-verify="required" autocomplete="off" value="<?php echo $wfsms['pwd']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>短信平台的登录密码</div>
			</div>                
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>商家手机号</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsms[mob]" lay-verify="required" value="<?php echo $wfsms['mob']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写您自己接受订单信息的手机号</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title"><legend>货到付款提交成功后发送短信</legend></fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfsms['codon']=='on'){echo ' checked';} ?> name="wfsms[codon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态</div>
			</div>		
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送对象</label>
				<div class="layui-input-block">
					<input type="checkbox"<?php if($wfsms['codobj']['u']=='on'){echo ' checked';} ?> name="wfsms[codobj][u]" title="发送给顾客">
					<input type="checkbox"<?php if($wfsms['codobj']['a']=='on'){echo ' checked';} ?> name="wfsms[codobj][a]" title="发送给商家">
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给顾客短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[coduser]" class="layui-textarea sms"><?php echo $wfsms['coduser']; ?></textarea>
				</div>
			</div>			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给商家短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[codadmin]" class="layui-textarea sms"><?php echo $wfsms['codadmin']; ?></textarea>
				</div>
			</div>			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">顾客短信确认后自动回复短信内容<font class="red">（填写0关闭回复）</font></label>
				<div class="layui-input-block">
					<textarea name="wfsms[autoreply]" class="layui-textarea sms"><?php echo $wfsms['autoreply']; ?></textarea>
				</div>
			</div>	
			<blockquote class="layui-elem-quote"><span class="red">注意：</span>短信自动回复功能需要在短信宝后台设置短信上行接收地址，具体方法在WFPHP官方QQ群共享里。</blockquote>					
			<fieldset class="layui-elem-field layui-field-title"><legend>支付宝付款成功后发送短信</legend></fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfsms['alipayon']=='on'){echo ' checked';} ?> name="wfsms[alipayon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态</div>
			</div>		
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送对象</label>
				<div class="layui-input-block">
					<input type="checkbox"<?php if($wfsms['alipayobj']['u']=='on'){echo ' checked';} ?> name="wfsms[alipayobj][u]" title="发送给顾客">
					<input type="checkbox"<?php if($wfsms['alipayobj']['a']=='on'){echo ' checked';} ?> name="wfsms[alipayobj][a]" title="发送给商家">
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给顾客短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[alipayuser]" class="layui-textarea sms"><?php echo $wfsms['alipayuser']; ?></textarea>
				</div>
			</div>			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给商家短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[alipayadmin]" class="layui-textarea sms"><?php echo $wfsms['alipayadmin']; ?></textarea>
				</div>
			</div>		
			<fieldset class="layui-elem-field layui-field-title"><legend>微信付款成功后发送短信</legend></fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfsms['weixinon']=='on'){echo ' checked';} ?> name="wfsms[weixinon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态</div>
			</div>		
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送对象</label>
				<div class="layui-input-block">
					<input type="checkbox"<?php if($wfsms['weixinobj']['u']=='on'){echo ' checked';} ?> name="wfsms[weixinobj][u]" title="发送给顾客">
					<input type="checkbox"<?php if($wfsms['weixinobj']['a']=='on'){echo ' checked';} ?> name="wfsms[weixinobj][a]" title="发送给商家">
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给顾客短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[weixinuser]" class="layui-textarea sms"><?php echo $wfsms['weixinuser']; ?></textarea>
				</div>
			</div>			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">发送给商家短信内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[weixinadmin]" class="layui-textarea sms"><?php echo $wfsms['weixinadmin']; ?></textarea>
				</div>
			</div>					
			<fieldset class="layui-elem-field layui-field-title"><legend>订单发货后发送短信</legend></fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfsms['ddfhon']=='on'){echo ' checked';} ?> name="wfsms[ddfhon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">短信发送内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[ddfhuser]" class="layui-textarea sms"><?php echo $wfsms['ddfhuser']; ?></textarea>
				</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title"><legend>手机短信验证码</legend></fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">短信验证码开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfsms['codeon']=='on'){echo ' checked';} ?> name="wfsms[codeon]" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为关闭状态</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">短信验证码内容</label>
				<div class="layui-input-block">
					<textarea name="wfsms[codecontent]" class="layui-textarea sms"><?php echo $wfsms['codecontent']; ?></textarea>
				</div>
			</div>
			<blockquote class="layui-elem-quote"><span class="red">系统常用变量：</span>单号：{wfddno}　　产品名称：{wfproname}　　产品套餐：{wfproduct}　　姓名：{wfname}　　手机：{wfmob}　　地址：{wfaddress}　……　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=10','200px')" class="g">系统变量说明</a></blockquote>		
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 保存设置</button></div>            
        </form>
    </div>	
    <?php
	}elseif($_GET['set']=='safe'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>系统安全设置</legend></fieldset>		
        <form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setsafe">
			<div class="layui-form-item">
				<label class="layui-form-label">防批量提交开关</label>
				<div class="layui-input-inline" style="width:auto;">
				    <input type="checkbox"<?php if($wfsafe['allon']=='on'){echo ' checked';} ?> name="wfsafe[allon]" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>只有开启此开关，以下设置才会生效</div>
			</div>		
			<div class="layui-form-item">
				<label class="layui-form-label">防刷策略一</label>
				<div class="layui-input-inline" style="width:auto;">
				    <input type="checkbox"<?php if($wfsafe['oneon']=='on'){echo ' checked';} ?> name="wfsafe[oneon]" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后在 <input type="text" name="wfsafe[time]" lay-verify="number" value="<?php echo $wfsafe['time']; ?>" style="width:30px;text-align:center;"> 秒之内只允许提交一次</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">防刷策略二</label>
				<div class="layui-input-inline" style="width:auto;">
				    <input type="checkbox"<?php if($wfsafe['twoon']=='on'){echo ' checked';} ?> name="wfsafe[twoon]" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后如果用户填写的收货地址中不含有IP所在城市名视为恶意提交</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">防刷策略三</label>
				<div class="layui-input-inline" style="width:auto;">
				    <input type="checkbox"<?php if($wfsafe['threeon']=='on'){echo ' checked';} ?> name="wfsafe[threeon]" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后同一个IP在 <input type="text" name="wfsafe[days]" lay-verify="number" value="<?php echo $wfsafe['days']; ?>" style="width:30px;text-align:center;"> 天内只能提交 <input type="text" name="wfsafe[count]" lay-verify="number" value="<?php echo $wfsafe['count']; ?>" style="width:30px;text-align:center;"> 次订单</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">防刷策略四</label>
				<div class="layui-input-inline" style="width:auto;">
				    <input type="checkbox"<?php if($wfsafe['fouron']=='on'){echo ' checked';} ?> name="wfsafe[fouron]" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后如果用户电脑的IP在下列IP黑白单中，则无法提交订单</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">IP与IP段黑名单</label>
				<div class="layui-input-block">
					<textarea name="wfsafe[banip]" class="layui-textarea base"><?php echo $wfsafe['banip']; ?></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>多个IP用半角逗号（,）隔开，IP段用星号代替，如：123.45.*.*</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">恶意提交警告语</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsafe[msg]" value="<?php echo $wfsafe['msg']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>顾客恶意提交后弹出的提示信息</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">保存设置</button>
				</div>
			</div>
        </form>
		<blockquote class="layui-elem-quote"><span class="red">温馨提示：</span>如果没有批量提交，请关闭所有防刷策略，开启防批量提交功能后，提交订单速度会受到一点点影响。</blockquote>		
    </div>	
	<?php
	}elseif($_GET['set']=='sender'){
	?>	
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>电子面单设置</legend></fieldset>
        <form id="wfform" action="?action=setconfig" method="post" class="layui-form">
			<input type="hidden" name="wfnowset" value="setsender">		    
		    <div class="layui-form-item">
			    <label class="layui-form-label green">电子面单账号</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[CustomerName]" value="<?php echo $wfsender['CustomerName']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写电子面单客户账号（向快递公司网点申请）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label green">电子面单密码</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[CustomerPwd]" value="<?php echo $wfsender['CustomerPwd']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写电子面单密码（快递公司网点提供）</div>
			</div>            
		    <div class="layui-form-item">
			    <label class="layui-form-label">月结编码</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[MonthCode]" value="<?php echo $wfsender['MonthCode']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写月结号或密钥串（选填）</div>
			</div>      
			<div class="layui-form-item">
				<label class="layui-form-label">邮费支付方式</label>
				<div class="layui-input-inline">
					<select name="wfsender[PayType]">
						<option value="1"<?php if($wfsender[PayType]=='1'){echo ' selected';} ?>>现付</option>
						<option value="2"<?php if($wfsender[PayType]=='2'){echo ' selected';} ?>>到付</option>
						<option value="3"<?php if($wfsender[PayType]=='3'){echo ' selected';} ?>>月结</option>
						<option value="4"<?php if($wfsender[PayType]=='4'){echo ' selected';} ?>>第三方支付</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请选择邮费支付方式</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">上门揽件</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[IsNotice]" lay-verify="required" value="<?php echo $wfsender['IsNotice']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>是否通知快递员上门揽件：0-通知　1-不通知</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">发件人</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[Name]" lay-verify="required" value="<?php echo $wfsender['Name']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人姓名或公司名称</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-省份</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[ProvinceName]" lay-verify="required" value="<?php echo $wfsender['ProvinceName']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人所在省份</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-城市</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[CityName]" lay-verify="required" value="<?php echo $wfsender['CityName']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人所在城市</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-地址</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[Address]" lay-verify="required" value="<?php echo $wfsender['Address']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人地址</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-邮编</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[PostCode]" value="<?php echo $wfsender['PostCode']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人所在城市邮编</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-电话</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[Tel]" value="<?php echo $wfsender['Tel']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人电话</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">发件人-手机</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[Mobile]" lay-verify="required" value="<?php echo $wfsender['Mobile']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写发件人手机</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">内件品名</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[GoodsName]" lay-verify="required" value="<?php echo $wfsender['GoodsName']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写快递物品名称</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label red">增值服务</label>
				<div class="layui-input-inline">
					<select name="wfsender[ASName]">
						<option value=" ">无</option>
						<option value="COD"<?php if($wfsender['ASName']=='COD'){echo ' selected';} ?>>代收货款</option>
						<option value="CODBACK"<?php if($wfsender['ASName']=='CODBACK'){echo ' selected';} ?>>货款直退</option>
						<option value="CODPAY"<?php if($wfsender['ASName']=='CODPAY'){echo ' selected';} ?>>货款垫付</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>选择增值服务</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label red">货款金额</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[ASValue]" value="<?php echo $wfsender['ASValue']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>若留空则自动调用顾客订购产品金额</div>
			</div>	
		    <div class="layui-form-item">
			    <label class="layui-form-label red">收款卡号</label>
				<div class="layui-input-inline">
					<input type="text" name="wfsender[ASCustomerID]" value="<?php echo $wfsender['ASCustomerID']; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写用于返款的银行卡号</div>
			</div>			
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 保存设置</button></div>            
        </form>
    </div>	
	<?php
	}elseif($_GET['set']=='adminurl'){
		$urlarr=explode(DIRECTORY_SEPARATOR,dirname(__FILE__));
		$wfoldurl=$urlarr[count($urlarr)-1];		
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>更改后台管理地址</legend></fieldset>
        <form id="wfform" action="?action=setadminurl" method="post" class="layui-form"> 
            <input name="wfoldurl" type="hidden" value="<?php echo $wfoldurl; ?>">
			<blockquote class="layui-elem-quote layui-quote-nm">当前后台管理目录是：<span class="green"><?php echo $wfoldurl; ?></span></blockquote>			
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>更改为</label>
				<div class="layui-input-inline">
				    <input type="text" name="wfnewurl" required lay-verify="wfnewurl" placeholder="请填写新目录名" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>字母或数字，以字母开头，最长32位，更改成功后系统会自动跳转到新地址</div>
			</div>
			
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即修改</button>
				</div>
			</div>			
        </form>
		<blockquote class="layui-elem-quote"><span class="red">注意：</span>如果后台目录修改失败，是因为你服务器上目录没有修改权限，直接登录服务器或FTP修改wfadmin目录名即可。</blockquote>
    </div> 
    <?php
	}elseif($_GET['set']=='adminpw'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>修改后台登录密码</legend></fieldset>
        <form id="wfform" action="?action=editpassword" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>旧密码</label>
				<div class="layui-input-inline">
				    <input type="password" name="oldpassword" required lay-verify="password" placeholder="请填写原密码" autocomplete="off" class="layui-input">
				</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>新密码</label>
				<div class="layui-input-inline">
				    <input type="password" id="wfpassword1" name="newpassword" required lay-verify="password" placeholder="请填写新密码" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>6~16个任意字符</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>确认密码</label>
				<div class="layui-input-inline">
				    <input type="password" name="newpasswordtrue" required lay-verify="wfpassword2" placeholder="请填写新密码" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>6~16个任意字符</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即修改</button>
				</div>
			</div>
		</form> 
    </div>
    <?php
	}
	?>
</div>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>