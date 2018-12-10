<?php
/**
  ************************************************************************
  WFPHP订单系统版权归WENFEI所有，凡是破解此系统者都会死全家，非常灵验。
  ************************************************************************
  WFPHP订单系统官方网站：http://www.wforder.com/   （盗版盗卖者死全家）
  WFPHP订单系统官方店铺：http://889889.taobao.com/ （破解系统者死全家）
  ************************************************************************
  郑重警告：凡是破解此系统者出门就被车撞死，盗卖此系统者三日内必死全家。
  ************************************************************************ 
  盗版模仿本页面样式者必死全家（包括但不限于CSS代码、JS代码、html代码）。
  ************************************************************************
 */
require '../../wfpublic/WFhhead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>管理员后台添加单</title>
<meta name="generator" content="WFPHP订单系统【高级版】">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<script type="text/javascript" src="../../wfpublic/js/wfjq.js"></script>
<script type="text/javascript" src="../../wfpublic/layui/layui.js"></script>
<link href="./images/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.wforder{max-width:100%;background:#FFF;}
.wfwrap{border:none;}
.wfform{width:600px;}
</style>
</head>
<body>
<div class="wforder">
	<div class="wfwrap">
		<form id="wfform" name="wfform" method="post" class="wfform layui-form" target="_parent">	
			<input type="hidden" name="wfpid" value="<?php echo $wfpid; ?>">
			<input type="hidden" name="wftid" value="1">
			<input type="hidden" name="WFLLURL" id="WFLLURL" value="管理员<?php echo $_SESSION['wfuser']; ?>后台添加">
			<input type="hidden" name="WFDDURL" id="WFDDURL" value="">
			<input type="hidden" name="wfproname" id="wfproname" value="<?php echo $p[1]; ?>">
			<?php if(!$p3){echo '<input type="hidden" name="wfproduct" id="wfproduct" value="'.$p[1].'">';}?>
			<input type="hidden" name="wfpayment" id="wfpayment" value="cod">
			<input type="hidden" name="wfpayzk" id="wfpayzk" value="<?php echo $wfpayzk; ?>">
			<input type="hidden" name="wfproup" id="wfproup" value="<?php echo $wfprice; ?>">
			<input type="hidden" name="wfprice" id="wfprice" value="<?php echo $wfprice; ?>">
			<input type="hidden" name="wfuprovince" id="wfuprovince" value="">
			<input type="hidden" name="wfucity" id="wfucity" value="">
			<input type="hidden" name="wfismob" id="wfismob" value="">
			<!---------- 产品套餐 ---------->
			<?php if(!empty($p3)){?>
			<div class="wfform-box">
				<label class="wfform-label">订购产品</label>
				<div class="wfform-pro">
					<select id="wfproduct" name="wfproduct" class="select" onChange="total('select')" lay-ignore>	
						<option value="">请选择订购产品</option>				
						<?php $i=1;foreach($p3 as $val){if($i==$p[4]){echo '<option selected value="'.$val[0].'" title="'.$val[1].'">'.$val[0].'</option>';}else{echo '<option value="'.$val[0].'" title="'.$val[1].'">'.$val[0].'</option>';}$i+=1;}?>
					</select>					
				</div>
			</div>
			<?php }?>
			<!---------- 产品套餐 ---------->
			<!---------- 产品尺码 ---------->
			<?php if(!empty($p5)){?>
			<div class="wfform-box">
				<label class="wfform-label">尺码</label>
				<div class="wfform-pro">
					<select name="wfprosize" class="select" lay-ignore>					
						<?php foreach($p5 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
					</select>			
				</div>
			</div>
			<?php }?>
			<!---------- 产品尺码 ---------->			
			<!---------- 产品颜色 ---------->
			<?php if(!empty($p6)){?>
			<div class="wfform-box">
				<label class="wfform-label">颜色</label>
				<div class="wfform-pro">
					<select name="wfprocolour" class="select" lay-ignore>					
						<?php foreach($p6 as $val){echo '<option value="'.$val['n'].'">'.$val['n'].'</option>';}?>
					</select>					
				</div>
			</div>
			<?php }?>
			<!---------- 产品颜色 ---------->
			<!---------- 赠送产品 ---------->
			<?php if($p[7]){?>
			<div class="showgift">
				<div class="wfform-box">
					<label class="wfform-label red">赠送产品</label>
					<div class="wfform-pro radio">
						<span class="auto"><input type="radio" checked name="wfgiftname" id="wfgiftname" value="<?php echo $p[8]; ?>" class="input-radio" lay-ignore><label for="wfgiftname"><?php echo $p[8]; ?></label></span>
					</div>
				</div>			
				<div class="wfform-box">
					<label class="wfform-label">尺码</label>
					<div class="wfform-pro">
						<select name="wfgiftsize" class="select" lay-ignore>					
							<?php foreach($p9 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
						</select>					
					</div>
				</div>			
				<div class="wfform-box">
					<label class="wfform-label">颜色</label>
					<div class="wfform-pro">
						<select name="wfgiftcolour" class="select" lay-ignore>					
							<?php foreach($p10 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
						</select>					
					</div>
				</div>
			</div>				
			<?php }?>
			<!---------- 赠送产品 ---------->
			<!---------- 表单选项 ---------->
			<div class="wfform-box">
				<label class="wfform-label">数量</label>
				<div class="wfform-opt wfnums">
					<a onclick="numdec()" title="减1" class="dec"></a>
					<input type="text" id="wfnums" name="wfnums" value="1">
					<a onclick="numlnc()" title="加1" class="lnc"></a>
					<strong><em class="rmb">&yen;</em><em id="showprice"><?php echo $wfprice; ?></em></strong>
				</div>
			</div>		
			<div class="wfform-box">
				<label class="wfform-label">姓名</label>
				<div class="wfform-opt">
					<input type="text" name="wfname" lay-verify="name" placeholder="请填写姓名" class="input-text">
				</div>
			</div>
			<div class="wfform-box">
				<label class="wfform-label">手机号码</label>
				<div class="wfform-opt">
					<input type="text" name="wfmob" lay-verify="mob" placeholder="请填写手机号码" class="input-text">
				</div>
			</div>
			<div class="wfform-box">
				<label class="wfform-label">所在地区</label>				
				<div class="wfform-opt area">
					<span class="wfprovince"><select id="wfprovince" name="wfprovince" lay-verify="province" class="select" lay-ignore><option value="">请选择省</option></select></span>
					<span class="wfcity"><select id="wfcity" name="wfcity" lay-verify="city" class="select" lay-ignore><option value="">请选择市</option></select></span>
					<span class="wfarea"><select id="wfarea" name="wfarea" class="select" lay-ignore><option value="">请选择区</option></select></span>	
				</div>
			</div>
			<div class="wfform-box">
				<label class="wfform-label">详细地址</label>
				<div class="wfform-opt">
					<input type="text" name="wfaddress" lay-verify="address" placeholder="请填写详细地址" class="input-text">
				</div>
			</div>
			<div class="wfform-box">
				<label class="wfform-label">留言</label>
				<div class="wfform-opt">
					<textarea name="wfguest" placeholder="请填写补充说明" class="textarea"></textarea>
				</div>
			</div>
			<!---------- 表单选项 ---------->
			<div class="wfform-box btnbox">
				<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="wfbtn btn-o">立即添加</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="../../wfpublic/js/wfarea.js"></script>
<script type="text/javascript" src="../../wfpublic/js/wfpost.js"></script>
</body>
</html>