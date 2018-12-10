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
$wfddno=$_GET['wfddno'];
$WFordermgmt=new WFordermgmt('all');
$ddinfo=$WFordermgmt->wfddnoss($wfddno);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>微信公众号支付/H5支付 - WFPHP订单系统</title>
<link href="../../wfpublic/style/wfpay.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if($ddinfo[33]=='yes'){
	$wfproinfo=$WFordermgmt->wfqueinfo('wfproduct',$ddinfo[4]);
?>
<div class="head">
    <img src="../../wfpublic/images/paysuccess.gif">
</div>
<div class="wfok">
	<?php
	if($wfproinfo[11]&&$wfproinfo[12]){
	?>
	<ul>
		<li class="auto"><?php echo $wfproinfo[12]; ?></li>
	</ul>
	<?php
	}
	?>
    <ul>
        <li>
            <span class="l">订单号：</span>
            <span class="r"><?php echo $wfddno; ?></span>
        </li>
        <li>
            <span class="l">订购产品：</span>
            <span class="r"><?php echo $ddinfo[5]; ?></span>
        </li>
        <li>
            <span class="l">付款金额：</span>
            <span class="r">&yen; <?php echo $ddinfo[12]; ?></span>
        </li>
        <li style="border:none;">
            <span class="l">交易状态：</span>
            <span class="r">付款成功</span>
        </li>
    </ul>
</div>
<div class="foot">
    <p><a href="<?php echo $_SESSION['WFDDURL']; ?>"><img src="../../wfpublic/images/goto.gif" alt="返回"></a></p>
</div>
<?php    
}else{
?>
<div class="head">
    <img src="../../wfpublic/images/payfail.gif">
</div>
<div class="foot">
    <p><a href="<?php echo $_SESSION['WFDDURL']; ?>"><img src="../../wfpublic/images/goto.gif" alt="返回"></a></p>
</div>
<?php	
}
?>
</body>
</html>