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
require '../../wfpublic/WFphead.php';
require WFPAY.'/weixin/lib/WxPay.Api.php';
require WFPAY.'/weixin/WxPay.NativePay.php';
require WFPAY.'/weixin/WxPay.JsApiPay.php';
require WFPAY.'/weixin/log.php';
if($_GET['wfismob']=='wap'){	
	//初始化日志
	$logHandler=new CLogFileHandler("./logs/".date('Y-m-d').'.log');
	$log=Log::Init($logHandler,15);
	$callback=$dirurl.'/callback.php?wfddno='.$_GET['wfddno'];
	
	//公共参数
	$input=new WxPayUnifiedOrder();
	$input->SetBody($_GET['wfproduct']);
	$input->SetAttach($_GET['wfmob']);
	$input->SetOut_trade_no($_GET['wfddno']);
	$input->SetTotal_fee(round($_GET['wfprice'],2)*100);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis",time()+600));
	$input->SetGoods_tag($_GET['wfproduct']);
	$input->SetNotify_url($dirurl.'/notify.php');
	//终端判断	
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false){
		//①获取用户openid
		$tools=new JsApiPay();
		$openId=$tools->GetOpenid();
		//②统一下单
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid($openId);
		$order=WxPayApi::unifiedOrder($input);
		$jsApiParameters=$tools->GetJsApiParameters($order);
		//获取共享收货地址js函数参数
		//$editAddress=$tools->GetEditAddressParameters();
	}else{
		//微信H5支付
		$input->SetTrade_type('MWEB');
		$input->SetScene_info('{"h5_info": {"type":"Wap","wap_url":'.$httptype.$_SERVER['HTTP_HOST'].',"wap_name":"WFPHP"}}');
		$order=WxPayApi::unifiedOrder($input);
		//var_dump($order);exit;
		header('Location: '.$order['mweb_url'].'&redirect_url='.urlencode($callback));
		exit;
	}
}else{	
	$notify=new NativePay();
	$url1=$notify->GetPrePayUrl("123456789"); //模式一
	$input=new WxPayUnifiedOrder();	
	$input->SetBody($_GET['wfproduct']);
	$input->SetAttach($_GET['wfmob']);
	$input->SetOut_trade_no($_GET['wfddno']);
	$input->SetTotal_fee(round($_GET['wfprice'],2)*100);	
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis",time()+600));
	$input->SetGoods_tag($_GET['wfproduct']);
	$input->SetNotify_url($dirurl.'/notify.php');
	$input->SetTrade_type("NATIVE");
	$input->SetProduct_id($_GET['wfddno']);
	$result=$notify->GetPayUrl($input);
	$url2=$result["code_url"]; //模式二
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>微信支付</title>
<link href="../../wfpublic/style/wfpay.css" rel="stylesheet" type="text/css">
</head>
<?php
if($_GET['wfismob']=='wap'){
?>
<body onLoad="callpay()">
<script type="text/javascript">
//调用微信JSapi支付
function jsApiCall(){
	WeixinJSBridge.invoke(
		'getBrandWCPayRequest',
		<?php echo $jsApiParameters; ?>,
		function(res){
			if (res.err_msg=="get_brand_wcpay_request:ok"){
				alert("支付成功");
				window.location.href="<?php echo $callback; ?>"; //付款成功后要跳转的页面
			}else if (res.err_msg=="get_brand_wcpay_request:cancel"){
				alert("您已取消支付！");
				window.location.href="<?php echo $_SESSION['WFDDURL']; ?>"; //取消支付后要跳转的页面
			}else{
				//支付失败
				alert(res.err_msg);
			}			
			//WeixinJSBridge.log(res.err_msg);
			//alert(res.err_code+res.err_desc+res.err_msg);
		}
	);
}
function callpay(){
	if (typeof WeixinJSBridge=="undefined"){
		if( document.addEventListener){
			document.addEventListener('WeixinJSBridgeReady',jsApiCall,false);
		}else if (document.attachEvent){
			document.attachEvent('WeixinJSBridgeReady',jsApiCall); 
			document.attachEvent('onWeixinJSBridgeReady',jsApiCall);
		}
	}else{
		jsApiCall();
	}
}
</script>
<?php
}else{
?>
<body>
<div class="wenxin">
    <div class="top">        
        <span class="a"><img src="../../wfpublic/images/wx.gif"> <strong>微信支付</strong></span> 
        <span class="b">亿万用户选择，更快更安全！</span>
        <span class="c">支付：<strong style="font-size:18px; color:#F60;"><?php echo $_GET['wfprice']; ?></strong> 元</span>
    </div>
    <div class="codeimg"><img src="./qrcode.php?data=<?php echo urlencode($url2);?>"></div>
    <div class="bottom"><img src="../../wfpublic/images/sm.gif"> 请用手机登陆微信，扫描上面的二维码完成付款。</div>    
</div>
<script type="text/javascript" src="../../wfpublic/js/wfjq.js"></script>
<script type="text/javascript">
	$(document).ready(function (){
		setInterval("ajaxstatus()",3000);  
	});
	function ajaxstatus(){		
		var wfddno='<?php echo $_GET['wfddno'];?>';
		if(wfddno!=''){			
			$.ajax({
				url:"./return.php?action=ifpay&wfddno="+wfddno+"&r="+Math.random(),
				type:"GET",				
				success:function(data){			
					if(data=='yes'){
						window.location.href ='./return.php?wfpaystatus=yes&wfproduct=<?php echo urlencode($_GET['wfproduct']); ?>&wfprice=<?php echo $_GET['wfprice']; ?>&wfddno='+wfddno;
					}
				},
				error:function(){
					 //alert("NoPay");
				}
			});
		}
	}
</script>
<?php
}
?>
</body>
</html>