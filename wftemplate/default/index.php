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
require '../../wfpublic/WFthead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>在线订购 - <?php echo $p[1]; ?></title>
<meta name="generator" content="WFPHP订单系统【高级版】">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<script type="text/javascript" src="../../wfpublic/js/wfjq.js"></script>
<script type="text/javascript" src="../../wfpublic/layui/layui.js"></script>
<link href="./images/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.wforder{max-width:<?php echo $t21['fw']; ?>;background:<?php echo $t21['bgc']; ?>;}
.wfwrap{border:<?php echo $t21['bw']; ?> solid <?php echo $t21['bc']; ?>;}
.wfform{<?php if($t[13]=='wffahuodiv'){echo 'width:auto;margin-right:300px;';}else{echo 'width:100%;';}?>}
@media screen and (max-width:749px){.wfform{margin-right:0;}.wffhwrap,.wfquewrap{position:static;width:100%;}}
@media screen and (max-width:449px){.wfwrap{border:none;}}
</style>
</head>
<body>
<div class="wforder">
	<div class="wfwrap">
		<form id="wfform" name="wfform" method="post" class="wfform layui-form" target="_top">			
			<input type="hidden" name="wfpid" value="<?php echo $wfpid; ?>">
			<input type="hidden" name="wftid" value="<?php echo $wftid; ?>">
			<input type="hidden" name="WFDDURL" id="WFDDURL" value="">
			<input type="hidden" name="wfproname" id="wfproname" value="<?php echo $p[1]; ?>">
			<?php if(!$p3){echo '<input type="hidden" name="wfproduct" id="wfproduct" value="'.$p[1].'">';}?>
			<?php if($p5&&$t[6]=='frame'){echo '<input type="hidden" name="wfprosize" id="wfprosize" value="'.$p5[0].'">';}?>
			<?php if($p6&&$t[7]=='frame'){echo '<input type="hidden" name="wfprocolour" id="wfprocolour" value="'.$p6[0]['n'].'">';}?>
			<input type="hidden" name="wfpayment" id="wfpayment" value="<?php echo $wfpayment; ?>">
			<input type="hidden" name="wfpayzk" id="wfpayzk" value="<?php echo $wfpayzk; ?>">
			<input type="hidden" name="wfproup" id="wfproup" value="<?php echo $wfproup; ?>">
			<?php if(empty($t8['wfnums'])){?><input type="hidden" name="wfnums" id="wfnums" value="1"><?php }?>			
			<input type="hidden" name="wfprice" id="wfprice" value="<?php echo $wfprice; ?>">
			<input type="hidden" name="wfuprovince" id="wfuprovince" value="">
			<input type="hidden" name="wfucity" id="wfucity" value="">
			<input type="hidden" name="wfismob" id="wfismob" value="">
			<div class="wftit-img"><img src="<?php if($t[4]){echo '../'.$t[4];}else{echo './images/title.png';}?>"></div>
			<!---------- 产品套餐 ---------->
			<?php if(!empty($p3)){?>
			<div class="wfform-box">
				<label class="wfform-label">订购产品</label>
				<div class="wfform-pro<?php if($t[5]!='select'){echo ' radio';} ?>">
					<?php if($t[5]=='select'){?>
					<select id="wfproduct" name="wfproduct" lay-verify="product" class="select" onChange="total('select')" lay-ignore>	
						<option value="">请选择订购产品</option>				
						<?php $i=1;foreach($p3 as $val){if($i==$p[4]){echo '<option selected value="'.$val[0].'" title="'.$val[1].'">'.$val[0].'</option>';}else{echo '<option value="'.$val[0].'" title="'.$val[1].'">'.$val[0].'</option>';}$i+=1;}?>
					</select>
					<?php }else{$i=1;foreach($p3 as $val){?><span class="<?php echo ($t[5]=='checkbox')?$t[6]:$t[5]; ?>"><input type="<?php echo ($t[5]=='auto'||$t[5]=='down')?'radio':'checkbox'; ?>" name="wfproduct<?php if($t[5]=='checkbox'){echo '[]';} ?>" id="wfproduct<?php echo $i; ?>"<?php if($i==$p[4]){echo ' checked';} ?> onclick="total('<?php echo $t[5]; ?>')" value="<?php echo $val[0]; ?>" title="<?php echo $val[1]; ?>" class="input-radio" lay-ignore><label for="wfproduct<?php echo $i; ?>"><?php echo $val[0]; ?></label></span><?php $i+=1;}}?>
				</div>
			</div>
			<?php }?>
			<!---------- 产品套餐 ---------->
			<!---------- 产品尺码 ---------->
			<?php if(!empty($p5)){?>
			<div class="wfform-box">
				<label class="wfform-label">尺码</label>
				<div class="wfform-pro<?php if($t[6]=='auto'||$t[6]=='down'){echo ' radio';}else{echo ' frame';} ?>">
					<?php if($t[6]=='select'){?>
					<select name="wfprosize" class="select" lay-ignore>					
						<?php foreach($p5 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
					</select>
					<?php }elseif($t[6]=='frame'){?>
					<ul class="size">
						<?php foreach($p5 as $key=>$val){?>
						<li><a href="javascript:void(0);" class="<?php if($key==0){echo 'cursize';} ?>" data-size="<?php echo $val; ?>"><?php echo $val; ?></a></li>
						<?php }?>				
					</ul>										
					<?php }else{foreach($p5 as $key=>$val){?>
					<span class="<?php echo $t[6]; ?>"><input type="radio"<?php if($key==0){echo ' checked';} ?> name="wfprosize" id="wfprosize<?php echo $key; ?>" value="<?php echo $val; ?>" class="input-radio" lay-ignore><label for="wfprosize<?php echo $key; ?>"><?php echo $val; ?></label></span>
					<?php }}?>					
				</div>
			</div>
			<?php }?>
			<!---------- 产品尺码 ---------->			
			<!---------- 产品颜色 ---------->
			<?php if(!empty($p6)){?>
			<div class="wfform-box">
				<label class="wfform-label">颜色</label>
				<div class="wfform-pro<?php if($t[7]=='auto'||$t[7]=='down'){echo ' radio';}else{echo ' frame';} ?>">
					<?php if($t[7]=='select'){?>
					<select name="wfprocolour" class="select" lay-ignore>					
						<?php foreach($p6 as $val){echo '<option value="'.$val['n'].'">'.$val['n'].'</option>';}?>
					</select>
					<?php }elseif($t[7]=='frame'){?>
					<ul class="colour">
						<?php foreach($p6 as $key=>$val){?>
						<li><a href="javascript:void(0);" class="<?php if($key==0){echo 'curcolour';} ?>" data-colour="<?php echo $val['n']; ?>"><?php if($val['i']){echo '<img src="../'.$val['i'].'" alt="'.$val['n'].'" title="'.$val['n'].'">';}else{echo $val['n'];}?></a></li>
						<?php }?>				
					</ul>					
					<?php }else{foreach($p6 as $key=>$val){?>
					<span class="<?php echo $t[7]; ?>"><input type="radio"<?php if($key==0){echo ' checked';} ?> name="wfprocolour" id="wfprocolour<?php echo $key; ?>" value="<?php echo $val['n']; ?>" class="input-radio" lay-ignore><label for="wfprocolour<?php echo $key; ?>"><?php echo $val['n']; ?></label></span>
					<?php }}?>
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
				<?php if(!empty($p9)){?>
				<div class="wfform-box">
					<label class="wfform-label">尺码</label>
					<div class="wfform-pro<?php if($t[6]!='select'){echo ' radio';} ?>">
						<?php if($t[6]=='select'){?>
						<select name="wfgiftsize" class="select" lay-ignore>					
							<?php foreach($p9 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
						</select>					
						<?php }else{foreach($p9 as $key=>$val){?>
						<span class="<?php echo $t[6]; ?>"><input type="radio" name="wfgiftsize" id="wfgiftsize<?php echo $key; ?>" value="<?php echo $val; ?>" class="input-radio" lay-ignore><label for="wfgiftsize<?php echo $key; ?>"><?php echo $val; ?></label></span>
						<?php }}?>
					</div>
				</div>	
				<?php }?>
				<?php if(!empty($p10)){?>		
				<div class="wfform-box">
					<label class="wfform-label">颜色</label>
					<div class="wfform-pro<?php if($t[7]!='select'){echo ' radio';} ?>">
						<?php if($t[7]=='select'){?>
						<select name="wfgiftcolour" class="select" lay-ignore>					
							<?php foreach($p10 as $val){echo '<option value="'.$val.'">'.$val.'</option>';}?>
						</select>					
						<?php }else{foreach($p10 as $key=>$val){?>
						<span class="<?php echo $t[7]; ?>"><input type="radio" name="wfgiftcolour" id="wfgiftcolour<?php echo $key; ?>" value="<?php echo $val; ?>" class="input-radio" lay-ignore><label for="wfgiftcolour<?php echo $key; ?>"><?php echo $val; ?></label></span>					
						<?php }}?>
					</div>
				</div>
				<?php }?>
			</div>					
			<?php }?>
			<!---------- 赠送产品 ---------->
			<!---------- 表单选项 ---------->
			<?php
			foreach($t8 as $key=>$val){if($key=='wfnums'){?>
			<!---------- 数量价格 ---------->
			<div class="wfform-box">
				<label class="wfform-label">数量</label>
				<div class="wfform-opt wfnums">
					<a onclick="numdec()" title="减1" class="dec"></a>
					<input type="text" id="wfnums" name="wfnums" value="1" readonly>
					<a onclick="numlnc()" title="加1" class="lnc"></a>
					<strong><em class="rmb">&yen;</em><em id="showprice"><?php echo $wfprice; ?></em></strong>
				</div>
			</div>		
			<!---------- 数量价格 ---------->
			<?php }echo $wfformopt[$key];}?>			
			<!---------- 表单选项 ---------->
			<!---------- 付款方式 ---------->
			<?php if($t9on){?>
			<div class="wfform-box">
				<label class="wfform-label">付款方式</label>
				<div class="wfform-pro radio">				
					<?php $wfpaysort=array();foreach($t9 as $val){$wfpaysort[]=$val['x'];}array_multisort($wfpaysort,SORT_ASC,$t9);foreach($t9 as $key=>$val){if($val['o']=='on'){?>
					<span class="auto"><input type="radio"<?php if($val['x']==1){echo ' checked';} ?> name="wfpayment" id="wfpayment<?php echo $val['x']; ?>" onclick="pay_total(<?php echo $val['z']; ?>);paypstab(<?php echo $val['x']; ?>)" value="<?php echo $key; ?>" class="input-radio" lay-ignore><label for="wfpayment<?php echo $val['x']; ?>"><?php if($val['z']==1){echo $val['n'];}else{echo $val['n'].'<i class="red">('.($val['z']*10).'折)</i>';}?></label></span>
					<?php }}foreach($t9 as $key=>$val){?>
					<span id="payps<?php echo $val['x']; ?>" class="payps"<?php if($val['x']!=1){echo ' style="display:none;"';}?>><?php echo $val['p']; ?></span>
					<?php }?>
				</div>
			</div>
			<?php }?>			
			<!---------- 付款方式 ---------->
			<!---------- 留言 ---------->
			<?php if($t8['wfguest']){?>
			<div class="wfform-box">
				<label class="wfform-label">留言</label>
				<div class="wfform-opt">
					<textarea name="wfguest" placeholder="请填写补充说明" class="textarea"><?php echo $t[17]; ?></textarea>
				</div>
			</div>	
			<?php }?>
			<!---------- 留言 ---------->
			<!---------- 验证码 ---------->
			<?php if($t[10]&&!$t[12]){?>
			<div class="wfform-box">
				<label class="wfform-label">验证码</label>
				<div class="wfform-opt vcode">
					<input type="text" name="wfvcode" lay-verify="required" class="input-text">
					<span><img id="wfvcode" src="../../wfhome/wfvcode.php?style=<?php echo $t[11]; ?>" alt="换一个" title="换一个" onClick="this.src=this.src+'&temp='+Math.random();"><a href='javascript:;' onclick="wfrefresh()">换一个</a></span>
				</div>
			</div>
			<?php }?>			
			<?php if($t[12]&&!$t[10]){?>
			<div class="wfform-box">
				<label class="wfform-label">验证码</label>
				<div class="wfform-opt vcode">
					<input type="text" name="wfsmsvcode" class="input-text">
					<button id="wfgetvcode" lay-submit lay-filter="wfsmsvcode" class="wfbtn btn-o">获取验证码</button>
				</div>
			</div>
			<?php }?>
			<!---------- 验证码 ---------->
			<div class="wfform-box btnbox">
				<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="wfbtn btn-<?php echo $t21['btn']; ?>"><?php echo $t21['btnv']; ?></button>
			</div>
		</form>
		<?php if($t[13]=='wffahuodiv'){?>
		<script type="text/javascript" src="../../wfpublic/js/wfscroll.js"></script>
		<script type="text/javascript">$(function(){$('.wffahuo').myScroll({speed:40,rowHeight:55});});</script>
		<div class="wffhwrap">
			<div class="wftit-text"><span><?php if($t[14]){echo $t[14];}else{echo '发货通知';}?></span></div>
			<div class="wffahuo wffhcont">
				<ul>
					<!-- 生成数量--最近几天--产品数组--发货通知模板 -->
					<?php $WFfahuo->wfshowfahuo(20,3,$p3,$t[16]);?>
				</ul>
			</div>
			<div class="h10"></div>
		</div>
		<div class="wfquewrap">
			<div class="wftit-text"><span>订单查询</span></div>
			<div class="wfquery">
				<form action="../../wfhome/wfquery.php" method="post" target="_top">
					<input type="text" name="wfquecont" lay-verify="required" placeholder="请填写姓名或手机号" class="input-text">
					<button class="wfbtn btn-o btn-que">查询</button>
				</form>
			</div>
		</div>
		<?php }?>
	</div>
</div>
<?php if($t8['wfprovince']){echo '<script type="text/javascript" src="../../wfpublic/js/wfarea.js"></script>'."\r\n";} ?>
<script type="text/javascript" src="../../wfpublic/js/wfpost.js"></script>
</body>
</html>
<?php
if($_GET['action']=='create'){
	$content=ob_get_contents(); 
	$content=str_replace('./images/','../../wftemplate/'.$t[2].'/images/',$content);
	$fp=fopen(WFDATA.'/item/'.substr(md5($wfpid.$wftid),8,16).'.html','wb');
	fwrite($fp,$content);
	fclose($fp);
	ob_end_flush();
}
?>