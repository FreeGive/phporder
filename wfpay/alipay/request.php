<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Loading...</title>
<style type="text/css">body{background:#141414;margin:0;padding:0;}</style>
</head>
<body>
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
require WFPAY.'/alipay/lib/alipay_submit.class.php';

//配置信息
$alipay_config['service']=$_GET['wfismob']=='wap'?'alipay.wap.create.direct.pay.by.user':'create_direct_pay_by_user';
$alipay_config['partner']=$wfpay['alipartner'];
$alipay_config['seller_id']=$wfpay['alipartner'];
$alipay_config['key']=$wfpay['alikey'];
$alipay_config['payment_type']='1';
$alipay_config['notify_url']=$dirurl.'/notify_url.php';
$alipay_config['return_url']=$dirurl.'/return_url.php';
$alipay_config['anti_phishing_key']='';
$alipay_config['exter_invoke_ip']='';
$alipay_config['sign_type']=strtoupper('MD5');
$alipay_config['input_charset']= strtolower('utf-8');
$alipay_config['cacert']=getcwd().'\\cacert.pem';
$alipay_config['transport']='http';

//请求参数
$out_trade_no=$_GET['wfddno'];
$subject=$_GET['wfproduct'];
$total_fee=$_GET['wfprice'];
$body=$_GET['wfmob'];
$show_url=$_SESSION['WFDDURL'];
$parameter=array(
	"service"=>$alipay_config['service'],
	"partner"=>$alipay_config['partner'],
	"seller_id"=>$alipay_config['seller_id'],
	"payment_type"=>$alipay_config['payment_type'],
	"notify_url"=>$alipay_config['notify_url'],
	"return_url"=>$alipay_config['return_url'],		
	"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
	"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
	"out_trade_no"=>$out_trade_no,
	"subject"=>$subject,
	"total_fee"=>$total_fee,
	"body"=>$body,
	"show_url"=>$show_url,
	"app_pay"=>'Y',
	"_input_charset"=>trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit=new AlipaySubmit($alipay_config);
$html_text=$alipaySubmit->buildRequestForm($parameter,"get",'Loading...');
if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false){
	echo '<div align="center"><img src="../../wfpublic/images/ifwx.gif"></div>';
}else{
	echo $html_text;
}
?>
</body>
</html>