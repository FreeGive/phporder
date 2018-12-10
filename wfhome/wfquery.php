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
require '../wfpublic/WFqhead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>订单查询</title>
<meta name="generator" content="WFPHP订单系统【高级版】">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="../wfpublic/style/wfpay.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var ismob=navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i)?'wap':'pc';
var exp=new Date();
exp.setTime(exp.getTime()+30*24*60*60*1000);
document.cookie="wfismob="+ismob+";path=/;expires=30";
</script>
</head>
<body>
<div class="wfquery">
	<?php
	if(empty($wfquecont)){
	?>
	<div class="error">请填写姓名或手机号查询！<br><br><a href="javascript:;" onClick="javascript:window.history.go(-1)" class="g">返回重新填写 >></a></div>
	<?php
	}else{
		if($rows>0){
			echo '<div class="title">查询结果</div>';
			while($row=$res->fetch_row()){
				$wfpayurl='../wfpay/'.$row[32].'/request.php?wfproduct='.urlencode($row[5]).'&wfprice='.$row[12].'&wfmob='.$row[19].'&wfismob='.$_COOKIE['wfismob'].'&wfddno='.$row[1];
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="tdl">订单号</td>
			<td class="tdr"><?php echo $row[1]; ?></td>
		</tr>
		<tr>
			<td class="tdl">姓名</td>
			<td class="tdr"><?php echo mb_substr ($row[13],0,1,'utf-8').'**'; ?></td>
		</tr>
		<tr>
			<td class="tdl">手机号码</td>
			<td class="tdr"><?php echo substr_replace($row[19],'****',3,4); ?></td>
		</tr>
		<tr>
			<td class="tdl">付款方式</td>
			<td class="tdr">
				<?php $WFordermgmt->wfpaymentstr($row[32],$row[33],$wfpaystr); ?> &nbsp;&nbsp; 
				<?php if($row[32]!='cod'&&$row[32]!='bank'&&$row[32]!='scan'&&$row[33]!='yes'){echo '<a href="'.$wfpayurl.'" class="layui-btn layui-btn-mini layui-btn-normal" target="_blank">现在付款</a>';}?>
			</td>
		</tr>		
		<tr>
			<td class="tdl">订单状态</td>
			<td class="tdr"><?php echo $row[42]; ?></td>
		</tr>
		<?php if($row[44]){echo '<tr><td class="tdl">快递单号</td><td class="tdr">'.$row[44].'　[ '.WFfahuo::wfkuaidicn($row[43]).' ]</td></tr>';}?>            
	</table>  
	<?php }?>
	<div class="close"><a href="javascript:;" onClick="javascript:window.history.go(-1)" class="g">返回 >></a></div>          
	<?php }else{?>
	<div class="error">对不起，没有查到！<br><br><a href="javascript:;" onClick="javascript:window.history.go(-1)" class="g">返回 >></a></div>
	<?php }}?>
</div>
</body>
</html>