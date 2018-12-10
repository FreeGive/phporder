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
ignore_user_abort(true);
set_time_limit(0);
require '../wfpublic/WFahead.php';
require WFPUBLIC.'/WFordermgmt.php';
require WFPUBLIC.'/WFfahuo.php';
$WFordermgmt=new WFordermgmt('all');
$WFfahuo=new WFfahuo();
$gid=$WFordermgmt->wfverify($_GET['id']);
$pid=$WFordermgmt->wfverify($_POST['pid']);
$wfddstatus=$WFordermgmt->wfverify($_POST['wfddstatus']);
$wfkuaidi=$WFordermgmt->wfverify($_POST['wfkuaidi']);
$wflotopt=$WFordermgmt->wfverify($_POST['wflotopt']);
$iffahuo=$WFordermgmt->wfverify($_POST['iffahuo']);
$ifsendsms=$WFordermgmt->wfverify($_POST['ifsendsms']);
switch($_GET['action']){
	//批量更改订单状态
	case 'ddstatus':
	$WFfahuo->wfeditlotddstatus($pid,true,$wfddstatus);
	break;	
	//批量保存单号
	case 'savekdno':
	$WFfahuo->wfsavelotkdno($pid,$wfkuaidi,$wflotopt,$iffahuo,$ifsendsms);
	break;
	//待加
	case 'xxx':	
	break;
	default:
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wflotoper</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php if($_GET['set']=='ddstatus'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>批量更改订单状态</legend></fieldset>
		<form id="wfform" action="?action=ddstatus" method="post" class="layui-form">
			<input name="pid" type="hidden" value="<?php echo $gid; ?>">
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>订单状态</label>
				<div class="layui-input-inline">					
					<select name="wfddstatus" lay-verify="required">
						<option value="">- 请选择 -</option>
						<?php
						$wfstatusarr=(explode('|',$wfbase['statusopt']));
						foreach($wfstatusarr as $value){
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
						?>
					</select>					
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请选择快递打印模板</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i>立即更改</button>
				</div>
			</div>
        </form>
    </div>
    <?php }elseif($_GET['set']=='savekdno'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>批量上传快递单号</legend></fieldset>
        <form id="wfform" action="?action=savekdno" method="post" class="layui-form">
            <input name="pid" type="hidden" value="<?php echo $_GET['id']; ?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">            
                <tr align="center">
                    <td class="l">选择快递公司</td>
                    <td class="r">
						<select name="wfkuaidi" lay-verify="required" class="wfkuaidi">
							<option value="">- 请选择快递 -</option>
							<?php
							include WFDATA.'/wfstrarr.php';
							foreach($wfexpress as $key=>$value){						
							?>
							<option<?php if($ddinfo[43]==$key){echo ' selected';}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php
							}
							?>
						</select>
                    </td>
                </tr>            
                <tr>
                    <td class="l">添加快递单号</td>
                    <td class="r">
						<table width="100%" border="0" >
							<tr align="center">
								<td width="10%">订单ID</td>
								<td width="20%">订单单号</td>
								<td width="20%">姓名</td>
								<td width="20%">手机</td>
								<td width="30%">快递单号</td>
							</tr>
							<?php
							$idarr=explode(',',$_GET['id']);							
							foreach($idarr as $value){
								$ddinfo=$WFordermgmt->wfqueinfo('wforderlist',$value);				
							?>
							<tr align="center" class="trbg">
								<input name="wflotopt[<?php echo $ddinfo[0]; ?>][id]" type="hidden" value="<?php echo $ddinfo[0]; ?>">
								<td><?php echo $ddinfo[0]; ?></td>
								<td><?php echo $ddinfo[1]; ?></td>
								<td><?php echo $ddinfo[13]; ?></td>
								<td><?php echo $ddinfo[19]; ?></td>
								<td><input name="wflotopt[<?php echo $ddinfo[0]; ?>][wfkdno]" type="text" value="<?php echo $ddinfo[44]; ?>"  style="width:90%;"></td>
							</tr>
							<?php
							}
							?>
						</table>				
					</td>
                </tr>
                <tr>
                	<td class="l">所选订单已发货</td>
                	<td class="r">
						<div style="width:auto; float:left; margin-right:15px;">
							<input type="checkbox" name="iffahuo" lay-skin="switch" lay-filter="switchTest" title="开启">
						</div>
						<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后将所选订单状态都改为已发货</div>
					</td>
				</tr>
                <tr>
                	<td class="l">发货后短信通知</td>
                	<td class="r">
						<div style="width:auto; float:left; margin-right:15px;">
							<input type="checkbox" name="ifsendsms" lay-skin="switch" lay-filter="switchTest" title="开启">
						</div>
						<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后自动发送已发货短信通知，如果要修改短信内容，请前往<a href="./wfconfig.php?set=sms" class="g">【短信接口设置】</a>——订单发货后发送短信</div>
					</td>
   				</tr>
            </table>
			<div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i>立即保存单号</button></div>
		</form> 
    </div>
	<?php }elseif($_GET['set']=='xxx'){?>    
	<?php }else{echo 'sorry!不能这样访问！';}?>
</div>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>