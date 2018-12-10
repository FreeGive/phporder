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
error_reporting(0);
session_id($_GET['sid']);
session_start();
date_default_timezone_set('PRC');
ini_set('default_charset','utf-8');
if(empty($_SESSION['wfddno'])){
	exit("<script>top.location.href='".$_SESSION['WFDDURL']."';</script>");
}
if($_SESSION['wfpayment']=='scan'){	
	$filename1='../wfdata/paycode/wx'.$_SESSION['wfprice'].'.jpg';
	$filename2='../wfdata/paycode/zfb'.$_SESSION['wfprice'].'.jpg';
	if(file_exists($filename1)&&file_exists($filename2)){
		$codetype='微信或支付宝';
		$codeimg1='<img src="../wfdata/paycode/wx'.$_SESSION['wfprice'].'.jpg">';
		$codeimg2='<img src="../wfdata/paycode/zfb'.$_SESSION['wfprice'].'.jpg">';
	}elseif(file_exists($filename1)){
		$codetype='微信';
		$codeimg='<img src="../wfdata/paycode/wx'.$_SESSION['wfprice'].'.jpg">';
	}elseif(file_exists($filename2)){
		$codetype='支付宝';
		$codeimg='<img src="../wfdata/paycode/zfb'.$_SESSION['wfprice'].'.jpg">';
	}else{
		$codetype='';
		$codeimg='<div style="color:#F00;padding:30px 0;">出错啦！请上传付款二维码图片！</div>';
	}
}
$dataopt=array(
	'订单号'=>$_SESSION['wfddno'],
	'订购产品'=>is_array($_SESSION['wfproduct'])?implode('<br>',$_SESSION['wfproduct']):$_SESSION['wfproduct'],
	'产品尺码'=>$_SESSION['wfprosize'],
	'产品颜色'=>$_SESSION['wfprocolour'],
	'数量/价格'=>$_SESSION['wfnums'].' / '.$_SESSION['wfprice'],
	'姓名'=>$_SESSION['wfname'],
	'手机号'=>$_SESSION['wfmob'],
	'详细地址'=>$_SESSION['wfprovince'].$_SESSION['wfcity'].$_SESSION['wfarea'].$_SESSION['wfaddress'],
	'付款方式'=>($_SESSION['wfpayment']=='bank')?'银行汇款':'货到付款'
);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php if($_SESSION['wfpayment']=='scan'){echo '请用手机扫描二维码付款！';}else{echo '订购成功！';}?></title>
<meta name="generator" content="WFPHP订单系统【高级版】">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/style/wfpay.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var i=180;
function settime(){
	i--;time.innerHTML=i;
	if(i<=0){
		window.location="<?php echo $_SESSION['WFDDURL']; ?>";
	}
}
<?php if($_SESSION['wfpayment']!='scan'){echo 'setInterval("settime()",1000);';}?>
</script>
</head>
<body>
<?php
if($_SESSION['wfpayment']=='scan'){
?>
<div class="wenxin">
    <div class="top">        
        <span class="a"><img src="../wfpublic/images/wx.gif"> <strong><?php echo $codetype; ?>扫码支付</strong></span> 
        <span class="b">亿万用户选择，更快更安全！</span>
        <span class="c">支付：<strong style="font-size:18px;color:#F60;"><?php echo $_SESSION['wfprice']; ?></strong> 元</span>
    </div>
    <div class="codeimg"><?php if(file_exists($filename1)&&file_exists($filename2)){echo $codeimg1.$codeimg2;}else{echo $codeimg;}?></div>
    <div class="bottom">
		<p><img src="../wfpublic/images/sm.gif"> 请用手机登陆<?php echo $codetype; ?>扫描上面的二维码完成付款</p>
		<p class="red">请在扫码后添加留言填写手机号<?php echo $_SESSION['wfmob']; ?>方便我们及时核对订单信息</p>
	</div>    
</div>
<?php }else{?>
<div class="head">
    <img src="../wfpublic/images/success.gif">
</div>
<div class="wfok">
    <ul>
		<?php
		foreach($dataopt as $key=>$val){
			if($val){
		?>
        <li><span class="l"><?php echo $key; ?></span><span class="r"><?php echo $val; ?></span></li>
		<?php }}?>
    </ul>
</div>
<div class="foot">
    <p class="go">温馨提示：本页面将在 <span id="time" class="time">180</span> 秒后自动返回...</p>
    <p><a href="<?php echo $_SESSION['WFDDURL']; ?>" title="立即返回"><img src="../wfpublic/images/goto.gif" alt="返回"></a></p>
</div>
<?php }
foreach($_SESSION as $key=>$val){if($key!='wfuser'&&$key!='wfpassword'&&$key!='subtime'&&$key!='wfddsource'&&$key!='WFLLURL'&&$key!='WFDDURL'){unset($_SESSION[$key]);}}
?>
<!----- ↓↓↓此处添加统计转化代码（注意：此处添加的代码只有订单提交成功才会执行）↓↓↓ ----->

</body>
</html>