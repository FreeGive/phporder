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
require WFPAY.'/weixin/lib/WxPay.Notify.php';
require WFPAY.'/weixin/log.php';

//初始化日志
$logHandler=new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log=Log::Init($logHandler,15);

class PayNotifyCallBack extends WxPayNotify{
	//查询订单
	public function Queryorder($transaction_id){
		$input=new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result=WxPayApi::orderQuery($input);
		Log::DEBUG("query:".json_encode($result));
		$wfddno=$result['out_trade_no'];
		$WFordermgmt=new WFordermgmt('all');
		$ddinfo=$WFordermgmt->wfddnoss($wfddno);
		if(array_key_exists("return_code",$result)&&array_key_exists("result_code",$result)&&$result["return_code"]=="SUCCESS"&&$result["result_code"]=="SUCCESS"){
			if($ddinfo[1]==$wfddno&&$ddinfo[33]!='yes'){			
				$sql="UPDATE wforderlist SET wfpaystatus='yes' WHERE wfddno='$wfddno'";			
				$WFordermgmt->wfdbcrud($sql,0);
				include WFDATA.'/wfconfig.php';
				if($wfsms['weixinon']){						
					$wfproname=$ddinfo[3];
					$wfproduct=$ddinfo[5];
					$wfname=$ddinfo[13];
					$wfmob=$ddinfo[19];					
					$wfaddress=$ddinfo[24];
					$wfsmsuserstr=preg_replace("/\{(.*?)\}/",'".$$1."',$wfsms['weixinuser']);			
					$wfsmsadminstr=preg_replace("/\{(.*?)\}/",'".$$1."',$wfsms['weixinadmin']);
					eval("\$wfsmsuser=\"$wfsmsuserstr\";");
					eval("\$wfsmsadmin=\"$wfsmsadminstr\";");
					$WFsms=new WFsms();			
					$WFsms->wfsendsms($wfmob,$wfsms['weixinobj']['u'],$wfsms['weixinobj']['a'],$wfsmsuser,$wfsmsadmin);
				}
			}
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data,&$msg){
		Log::DEBUG("call back:".json_encode($data));
		$notfiyOutput=array();		
		if(!array_key_exists("transaction_id",$data)){
			$msg="输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg="订单查询失败";
			return false;
		}
		return true;
	}
}
Log::DEBUG("begin notify");
$notify=new PayNotifyCallBack();
$notify->Handle(false);
?>