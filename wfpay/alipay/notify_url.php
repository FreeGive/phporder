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
require WFPAY.'/alipay/lib/alipay_notify.class.php';

//配置信息
$alipay_config['partner']=$wfpay['alipartner'];
$alipay_config['seller_id']=$wfpay['alipartner'];
$alipay_config['key']=$wfpay['alikey'];
$alipay_config['payment_type']='1';
$alipay_config['anti_phishing_key']='';
$alipay_config['exter_invoke_ip']='';
$alipay_config['sign_type']=strtoupper('MD5');
$alipay_config['input_charset']= strtolower('utf-8');
$alipay_config['cacert']=getcwd().'\\cacert.pem';
$alipay_config['transport']='http';

//计算得出通知验证结果
$alipayNotify=new AlipayNotify($alipay_config);
$verify_result=$alipayNotify->verifyNotify();
if($verify_result){
	$wfddno=$_POST['out_trade_no'];	
	$WFordermgmt=new WFordermgmt('all');
	$ddinfo=$WFordermgmt->wfddnoss($wfddno);
    if($_POST['trade_status']=='TRADE_FINISHED'||$_POST['trade_status']=='TRADE_SUCCESS'){
		if($ddinfo[1]==$wfddno&&$ddinfo[33]!='yes'){			
			$sql="UPDATE wforderlist SET wfpaystatus='yes' WHERE wfddno='$wfddno'";			
			$WFordermgmt->wfdbcrud($sql,0);
			if($wfsms['alipayon']){				
				$wfproname=$ddinfo[3];
				$wfproduct=$ddinfo[5];
				$wfname=$ddinfo[13];
				$wfmob=$ddinfo[19];
				$wfaddress=$ddinfo[24];
				$wfsmsuserstr=preg_replace("/\{(.*?)\}/",'".$$1."',$wfsms['alipayuser']);			
				$wfsmsadminstr=preg_replace("/\{(.*?)\}/",'".$$1."',$wfsms['alipayadmin']);
				eval("\$wfsmsuser=\"$wfsmsuserstr\";");
				eval("\$wfsmsadmin=\"$wfsmsadminstr\";");
				$WFsms=new WFsms();			
				$WFsms->wfsendsms($wfmob,$wfsms['alipayobj']['u'],$wfsms['alipayobj']['a'],$wfsmsuser,$wfsmsadmin);
			}
		}
    }
	echo 'success';
}
else{
    echo 'fail';
}
?>