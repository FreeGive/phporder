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
require '../wfpublic/WFahead.php';
define('WFTEMPLATE',WFORDER.'/wftemplate');
require WFPUBLIC.'/WFprotemp.php';
require WFPUBLIC.'/WFpages.php';
$WFprotemp=new WFprotemp();
$id=!empty($_GET['id'])?intval($_GET['id']):'';
$wftempname=!empty($_POST['wftempname'])?$WFprotemp->wfverify($_POST['wftempname']):'';
$wftemptype=!empty($_POST['wftemptype'])?$WFprotemp->wfverify($_POST['wftemptype']):'';
$wftemptitle=!empty($_POST['wftemptitle'])?$WFprotemp->wfverify($_POST['wftemptitle']):'';
$wftemptitimg=!empty($_POST['wftemptitimg'])?$WFprotemp->wfverify($_POST['wftemptitimg']):'';
$wfproshow=!empty($_POST['wfproshow'])?$WFprotemp->wfverify($_POST['wfproshow']):'';
$wfsizeshow=!empty($_POST['wfsizeshow'])?$WFprotemp->wfverify($_POST['wfsizeshow']):'';
$wfcolourshow=!empty($_POST['wfcolourshow'])?$WFprotemp->wfverify($_POST['wfcolourshow']):'';
$wfformoptarr=!empty($_POST['wfformopt'])?$WFprotemp->wfverify($_POST['wfformopt']):'';
$wfformopt=(count($wfformoptarr)>0)?json_encode($wfformoptarr):'';
$wfpayarr=!empty($_POST['wfpay'])?$WFprotemp->wfverify($_POST['wfpay']):'';
$wfpay=(count($wfpayarr)>0)?json_encode($WFprotemp->wfurlcode2($wfpayarr,'en')):'';
$wfvcodeon=!empty($_POST['wfvcodeon'])?$WFprotemp->wfverify($_POST['wfvcodeon']):'';
$wfvcodetype=!empty($_POST['wfvcodetype'])?intval($_POST['wfvcodetype']):'';
$wfsmsvcodeon=!empty($_POST['wfsmsvcodeon'])?$WFprotemp->wfverify($_POST['wfsmsvcodeon']):'';
$wffahuoon=!empty($_POST['wffahuoon'])?$WFprotemp->wfverify($_POST['wffahuoon']):'';
$wftempfahuo=!empty($_POST['wftempfahuo'])?$WFprotemp->wfverify($_POST['wftempfahuo']):'';
$wftempfhimg=!empty($_POST['wftempfhimg'])?$WFprotemp->wfverify($_POST['wftempfhimg']):'';
$wfdiyfhcont=!empty($_POST['wfdiyfhcont'])?$WFprotemp->wfverify($_POST['wfdiyfhcont']):'';
$wfguest=!empty($_POST['wfguest'])?$WFprotemp->wfverify($_POST['wfguest']):'';
$wfpostoktype=!empty($_POST['wfpostoktype'])?$WFprotemp->wfverify($_POST['wfpostoktype']):'';
$wfpostokurl=!empty($_POST['wfpostokurl'])?$WFprotemp->wfverify($_POST['wfpostokurl']):'';
$wfpostokmsg=!empty($_POST['wfpostokmsg'])?$WFprotemp->wfverify($_POST['wfpostokmsg']):'';
$wftempstylearr=!empty($_POST['wftempstyle'])?$WFprotemp->wfverify($_POST['wftempstyle']):'';
$wftempstyle=(count($wftempstylearr)>0)?json_encode($WFprotemp->wfurlcode($wftempstylearr,'en')):'';
$nextpage=!empty($_GET['p'])?intval($_GET['p']):'1';
$startrow=($nextpage-1)*$wfbase['ptpagesize'];
switch($_GET['action']){
	case 'add':	
	$WFprotemp->wfaddtemplate($wftempname,$wftemptype,$wftemptitle,$wftemptitimg,$wfproshow,$wfsizeshow,$wfcolourshow,$wfformopt,$wfpay,$wfvcodeon,$wfvcodetype,$wfsmsvcodeon,$wffahuoon,$wftempfahuo,$wftempfhimg,$wfdiyfhcont,$wfguest,$wfpostoktype,$wfpostokurl,$wfpostokmsg,$wftempstyle);
	break;
	case 'edit':	
	$WFprotemp->wfedittemplate($id,$wftempname,$wftemptype,$wftemptitle,$wftemptitimg,$wfproshow,$wfsizeshow,$wfcolourshow,$wfformopt,$wfpay,$wfvcodeon,$wfvcodetype,$wfsmsvcodeon,$wffahuoon,$wftempfahuo,$wftempfhimg,$wfdiyfhcont,$wfguest,$wfpostoktype,$wfpostokurl,$wfpostokmsg,$wftempstyle);
	break;
	case 'del':
	$WFprotemp->wfdeldata('wftemplate',$id,0,$WFprotemp->wflang['deltrue'],'./wftemplate.php',$WFprotemp->wflang['deltemplate'].$id);
	break;
	case 'upimg':	
	$WFprotemp->wfupimg();
	break;
	case 'delimg':	
	$WFprotemp->wfdelimg('wftemplate',$_GET['field'],$id,$_GET['file']);
	break;		
	default:
	$wfrows=$WFprotemp->wfrows('wftemplate');
	$WFpages=new WFpages('wftemplate.php',$wfrows,$wfbase['ptpagesize']);
	$res=$WFprotemp->wfquerytab('wftemplate',$startrow,$wfbase['ptpagesize']);
	break;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wftemplate</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<link href="./images/wfjqcolor.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjq.js"></script>
<script type="text/javascript" src="./images/wfjqcolor.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php
	if($_GET['set']=='add'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>添加新模板</legend></fieldset>
        <form id="wfform" action="?action=add" method="post" class="layui-form">           
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>模板名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wftempname" lay-verify="required" value="" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写模板名称</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label">模板风格</label>
				<div class="layui-input-inline">
					<select name="wftemptype">
						<?php					
						$dir=opendir(WFTEMPLATE);		
						while(($file=readdir($dir))!==false){
							if($file!='.'&&$file!='..'){
								if(is_dir(WFTEMPLATE.'/'.$file)){
									if($file=='default'){
										echo '<option selected value="'.$file.'">'.$file.'（默认）</option>';
									}else{
										echo '<option value="'.$file.'">'.$file.'</option>';										
									}
								}														
							}
						}
						closedir($dir);
						?>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=4','160px')" class="g">如何添加扩展模板？</a></div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">订单标题</label>
				<div class="layui-input-block temptitle">
					<input type="text" name="wftemptitle" lay-verify="required" value="在线快速订购" class="layui-input">
					<span id="wftemptitle1" class="productimg"></span>
					<input id="wftemptitle2" name="wftemptitimg" type="hidden" value="">
					<button type="button" class="layui-btn layui-btn-primary" id="temptitimg"><i class="layui-icon">&#xe67c;</i> 上传自定义图片</button>　<i class="layui-icon orange">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=5','250px')" class="g">这是什么？</a>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">产品选择方式</label>
				<div class="layui-input-inline">
					<select name="wfproshow">
						<option value="down">单选（一行一个）</option>
						<option value="auto">单选（自动排列）</option>
						<option value="select">下拉</option>
						<option value="checkbox">多选</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">尺码显示方式</label>
				<div class="layui-input-inline">
					<select name="wfsizeshow">
						<option value="down">单选（一行一个）</option>
						<option value="auto">单选（自动排列）</option>
						<option value="select">下拉</option>
						<option value="frame">框选（仿淘宝）</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">颜色显示方式</label>
				<div class="layui-input-inline">
					<select name="wfcolourshow">
						<option value="down">单选（一行一个）</option>
						<option value="auto">单选（自动排列）</option>
						<option value="select">下拉</option>
						<option value="frame">框选（仿淘宝）</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">表单选项</label>
				<div class="layui-input-block">
					<?php
					foreach($wfformoptstr as $key=>$val){
						if($key=='wfname'||$key=='wfmob'||$key=='wfaddress'){
							echo '<input type="checkbox" checked name="wfformopt['.$key.']" title="'.$val.'">';
						}else{
							echo '<input type="checkbox" name="wfformopt['.$key.']" title="'.$val.'">';
						}
					}
					?>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">付款方式<br><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=7','310px')" class="g">折扣和排序怎么设置</a></label>
				<?php
				foreach($wfpaystr as $key=>$val){
					echo '<div class="layui-input-block pay">';
					echo '<input type="checkbox" name="wfpay['.$val['e'].'][o]" title="'.$val['z'].'"><input name="wfpay['.$val['e'].'][n]" type="hidden" value="'.$val['z'].'"><input type="text" name="wfpay['.$val['e'].'][z]" placeholder="折扣"  value="1" class="layui-input"><input type="text" name="wfpay['.$val['e'].'][x]" lay-verify="number" placeholder="排序" value="'.$key.'" class="layui-input"><input type="text" name="wfpay['.$val['e'].'][p]" placeholder="付款说明" value="'.$val['p'].'" class="layui-input payps">';
					echo '</div>';
				}
				?>				
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">验证码开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox" name="wfvcodeon" value="wfvcodediv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需显示验证码，点击开启后选择验证码风格</div>
			</div>
			<div id="wfvcodediv" class="wfshowdiv" style="display:none;">
				<div class="layui-form-item">
					<label class="layui-form-label">验证码风格</label>
					<div class="layui-input-block">
						<input type="radio" name="wfvcodetype" value="1" title="随机4个数字" checked="">
						<input type="radio" name="wfvcodetype" value="2" title="随机3个数字相加">
						<input type="radio" name="wfvcodetype" value="3" title="随机3个汉字">
						<input type="radio" name="wfvcodetype" value="4" title="前3种随机显示">
					</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">短信验证码开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox" name="wfsmsvcodeon" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后需要顾客输入手机上收到的短信验证码才能提交订单，要启用此功能，先去<a href="./wfconfig.php?set=sms" class="g">【设置短信接口】</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">发货通知开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox" name="wffahuoon" value="wffahuodiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击开启后订单界面上会显示滚动的发货信息</div>
			</div>
			<div id="wffahuodiv" class="wfshowdiv" style="display:none;">			
				<div class="layui-form-item">
					<label class="layui-form-label">发货通知标题</label>
					<div class="layui-input-block temptitle">
						<input type="text" name="wftempfahuo" lay-verify="required" value="发货通知" class="layui-input">
						<span id="wftempfahuo1" class="productimg"></span>
						<input id="wftempfahuo2" name="wftempfhimg" type="hidden" value="">
						<button type="button" class="layui-btn layui-btn-primary" id="tempfhimg"><i class="layui-icon">&#xe67c;</i> 上传自定义图片</button>　<i class="layui-icon orange">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=8','250px')" class="g">这是什么？</a>
					</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">自定义发货通知内容</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfdiyfhcont" value="{wfbuydate1} {wfprovince}的{wfname} {wfmob} 您订购的{wfproduct}已发货！" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>｛｝大括号内是系统变量，不能修改　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=9','200px')" class="g">系统变量说明</a></div>
				</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">默认留言内容</label>
				<div class="layui-input-inline" style="width:50%;">
					<input type="text" name="wfguest" value="请尽快安排发货，送货之前手机联系，谢谢！" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如果不需要显示默认留言则留空即可</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label">订单提示方式设置</label>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>在下方设置订单提交成功提示方式、跳转页面、对话框消息</div>
			</div>
			<div class="wfshowdiv">
				<div class="layui-form-item">
					<label class="layui-form-label">订单提交成功后</label>
					<div class="layui-input-block">
						<input type="radio" checked name="wfpostoktype" value="1" title="跳转到成功页面">
						<input type="radio" name="wfpostoktype" value="2" title="弹出成功对话框">
					</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">自定义跳转网址</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfpostokurl" placeholder="填写跳转网址，要加http://" value="" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如不填写则跳转到系统默认成功页面</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">自定义对话框消息</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfpostokmsg" placeholder="填写对话提示消息" value="恭喜您{wfname}，您已成功订购{wfproduct}！" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>｛｝大括号内是系统变量，不能修改　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=10','200px')" class="g">系统变量说明</a></div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">下单页面样式设置</label>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>在下方设置下单页面背景、宽度、边框、提交按钮</div>
			</div>
			<div class="wfshowdiv">			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>订单宽度</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[fw]" lay-verify="required" value="950px" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为950px，也可以填写100%，即为适应性</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>边框宽度</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[bw]" lay-verify="required" value="5px" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认边框宽度为5px，不需要边框填写0</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>边框颜色</label>
					<div class="layui-input-inline">
						<input type="text" id="wfbordercolor" name="wftempstyle[bc]" lay-verify="required" value="#5FB878" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>背景颜色</label>
					<div class="layui-input-inline">
						<input type="text" id="wfbgcolor" name="wftempstyle[bgc]" lay-verify="required" value="#FFFFFF" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>标题底色</label>
					<div class="layui-input-inline">
						<input type="text" id="wftitbgcolor" name="wftempstyle[titbg]" lay-verify="required" value="#FF9900" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>提交按钮颜色</label>					
					<div class="layui-input-inline">
						<select name="wftempstyle[btn]">
							<option value="g">深绿色</option>
							<option value="l">浅绿色</option>
							<option value="r">红色</option>
							<option value="b">蓝色</option>
							<option value="o">橙色</option>
						</select>
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>选择提交按颜色风格</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>提交按钮文字</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[btnv]" lay-verify="required" value="立即提交订单" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>自定义提交按钮文字，如：立即在线申请</div>
				</div>			
			</div>						
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe608;</i> 立即添加</button></div>            
        </form>        
    </div>
    <?php
	}elseif($_GET['set']=='edit'){		
		$wftemplateinfo=$WFaccount->wfqueinfo('wftemplate',$id);
		$wfformoptarr=json_decode($wftemplateinfo[8],true);
		$wfpayarr=json_decode($wftemplateinfo[9],true);	
		$wfpayarr=$WFprotemp->wfurlcode2($wfpayarr,'de');
		$wftempstyle=json_decode($wftemplateinfo[21],true);
		$wftempstyle=$WFprotemp->wfurlcode($wftempstyle,'de');			
	?>
    <div class="wfmain">	
		<fieldset class="layui-elem-field layui-field-title"><legend>修改模板</legend></fieldset>
        <form id="wfform" action="?action=edit&id=<?php echo $id; ?>" method="post" class="layui-form">           
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>模板名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wftempname" lay-verify="required" value="<?php echo $wftemplateinfo[1]; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写模板名称</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label">模板风格</label>
				<div class="layui-input-inline">
					<select name="wftemptype">
						<?php					
						$dir=opendir(WFTEMPLATE);		
						while(($file=readdir($dir))!==false){
							if($file!='.'&&$file!='..'){
								if(is_dir(WFTEMPLATE.'/'.$file)){
									if($wftemplateinfo[2]==$file){
										echo '<option selected value="'.$file.'">'.$file.'（当前使用）</option>';
									}else{
										echo '<option value="'.$file.'">'.$file.'</option>';										
									}
								}														
							}
						}
						closedir($dir);
						?>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=4','160px')" class="g">如何添加扩展模板？</a></div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">订单标题</label>
				<div class="layui-input-block temptitle">
					<input type="text" name="wftemptitle" lay-verify="required" value="<?php echo $wftemplateinfo[3]; ?>" class="layui-input">
					<span id="wftemptitle1" class="productimg"><?php if($wftemplateinfo[4]){echo '<img src="'.$wftemplateinfo[4].'" title="双击删除图片" ondblclick="wfdeldata(\'?action=delimg&field=wftemptitimg&id='.$id.'&file='.$wftemplateinfo[4].'\')" onerror="this.src=\'./images/nopic.gif\'">';} ?></span>
					<input id="wftemptitle2" name="wftemptitimg" type="hidden" value="<?php echo $wftemplateinfo[4]; ?>">
					<button type="button" class="layui-btn layui-btn-primary" id="temptitimg"><i class="layui-icon">&#xe67c;</i> 上传自定义图片</button>　<i class="layui-icon orange">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=5','250px')" class="g">这是什么？</a>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">产品选择方式</label>
				<div class="layui-input-inline">
					<select name="wfproshow">
						<option<?php if($wftemplateinfo[5]=='down'){echo ' selected';} ?> value="down">单选（一行一个）</option>
						<option<?php if($wftemplateinfo[5]=='auto'){echo ' selected';} ?> value="auto">单选（自动排列）</option>
						<option<?php if($wftemplateinfo[5]=='select'){echo ' selected';} ?> value="select">下拉</option>
						<option<?php if($wftemplateinfo[5]=='checkbox'){echo ' selected';} ?> value="checkbox">多选</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">尺码显示方式</label>
				<div class="layui-input-inline">
					<select name="wfsizeshow">
						<option<?php if($wftemplateinfo[6]=='down'){echo ' selected';} ?> value="down">单选（一行一个）</option>
						<option<?php if($wftemplateinfo[6]=='auto'){echo ' selected';} ?> value="auto">单选（自动排列）</option>
						<option<?php if($wftemplateinfo[6]=='select'){echo ' selected';} ?> value="select">下拉</option>
						<option<?php if($wftemplateinfo[6]=='frame'){echo ' selected';} ?> value="frame">框选（仿淘宝）</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">颜色显示方式</label>
				<div class="layui-input-inline">
					<select name="wfcolourshow">
						<option<?php if($wftemplateinfo[7]=='down'){echo ' selected';} ?> value="down">单选（一行一个）</option>
						<option<?php if($wftemplateinfo[7]=='auto'){echo ' selected';} ?> value="auto">单选（自动排列）</option>
						<option<?php if($wftemplateinfo[7]=='select'){echo ' selected';} ?> value="select">下拉</option>
						<option<?php if($wftemplateinfo[7]=='frame'){echo ' selected';} ?> value="frame">框选（仿淘宝）</option>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=6','400px')" class="g">都有什么区别，这个怎么选？</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">表单选项</label>
				<div class="layui-input-block">
					<?php
					foreach($wfformoptstr as $key=>$val){
						if($wfformoptarr[$key]=='on'){
							echo '<input type="checkbox" checked name="wfformopt['.$key.']" title="'.$val.'">';
						}else{
							echo '<input type="checkbox" name="wfformopt['.$key.']" title="'.$val.'">';
						}
					}
					?>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">付款方式<br><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=7','310px')" class="g">折扣和排序怎么设置</a></label>
				<?php
				foreach($wfpaystr as $key=>$val){
				?>
				<div class="layui-input-block pay">	
					<input type="checkbox"<?php if($wfpayarr[$val['e']]['o']=='on'){echo ' checked';} ?> name="wfpay[<?php echo $val['e']; ?>][o]" title="<?php echo $val['z']; ?>"><input name="wfpay[<?php echo $val['e']; ?>][n]" type="hidden" value="<?php echo $val['z']; ?>"><input type="text" name="wfpay[<?php echo $val['e']; ?>][z]" placeholder="折扣"  value="<?php echo $wfpayarr[$val['e']]['z']; ?>" class="layui-input"><input type="text" name="wfpay[<?php echo $val['e']; ?>][x]" lay-verify="number" placeholder="排序" value="<?php echo $wfpayarr[$val['e']]['x']; ?>" class="layui-input"><input type="text" name="wfpay[<?php echo $val['e']; ?>][p]" placeholder="付款说明" value="<?php echo $wfpayarr[$val['e']]['p']; ?>" class="layui-input payps">
				</div>				
				<?php
				}
				?>				
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">验证码开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wftemplateinfo[10]=='wfvcodediv'){echo ' checked';} ?> name="wfvcodeon" value="wfvcodediv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需显示验证码，点击开启后选择验证码风格</div>
			</div>
			<div id="wfvcodediv" class="wfshowdiv"<?php if($wftemplateinfo[10]!='wfvcodediv'){echo ' style="display:none;"';} ?>>
				<div class="layui-form-item">
					<label class="layui-form-label">验证码风格</label>
					<div class="layui-input-block">
						<input type="radio"<?php if($wftemplateinfo[11]==1){echo ' checked';} ?> name="wfvcodetype" value="1" title="随机4个数字" checked="">
						<input type="radio"<?php if($wftemplateinfo[11]==2){echo ' checked';} ?> name="wfvcodetype" value="2" title="随机3个数字相加">
						<input type="radio"<?php if($wftemplateinfo[11]==3){echo ' checked';} ?> name="wfvcodetype" value="3" title="随机3个汉字">
						<input type="radio"<?php if($wftemplateinfo[11]==4){echo ' checked';} ?> name="wfvcodetype" value="4" title="前3种随机显示">
					</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">短信验证码开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wftemplateinfo[12]=='on'){echo ' checked';} ?> name="wfsmsvcodeon" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>开启后需要顾客输入手机上收到的短信验证码才能提交订单，要启用此功能，先去<a href="./wfconfig.php?set=sms" class="g">【设置短信接口】</a></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">显示发货通知开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wftemplateinfo[13]=='wffahuodiv'){echo ' checked';} ?> name="wffahuoon" value="wffahuodiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击开启后订单界面上会显示滚动的发货信息</div>
			</div>
			<div id="wffahuodiv" class="wfshowdiv"<?php if($wftemplateinfo[13]!='wffahuodiv'){echo ' style="display:none;"';} ?>>			
				<div class="layui-form-item">
					<label class="layui-form-label">发货通知标题</label>
					<div class="layui-input-block temptitle">
						<input type="text" name="wftempfahuo" lay-verify="required" value="<?php echo $wftemplateinfo[14]; ?>" class="layui-input">
						<span id="wftempfahuo1" class="productimg"><?php if($wftemplateinfo[15]){echo '<img src="'.$wftemplateinfo[15].'" title="双击删除图片" ondblclick="wfdeldata(\'?action=delimg&field=wftempfhimg&id='.$id.'&file='.$wftemplateinfo[15].'\')" onerror="this.src=\'./images/nopic.gif\'">';} ?></span>
						<input id="wftempfahuo2" name="wftempfhimg" type="hidden" value="<?php echo $wftemplateinfo[15]; ?>">
						<button type="button" class="layui-btn layui-btn-primary" id="tempfhimg"><i class="layui-icon">&#xe67c;</i> 上传自定义图片</button>　<i class="layui-icon orange">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=8','250px')" class="g">这是什么？</a>
					</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">自定义发货通知内容</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfdiyfhcont" value="<?php echo $wftemplateinfo[16]; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>｛｝大括号内是系统变量，不能修改　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=9','200px')" class="g">系统变量说明</a></div>
				</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">默认留言内容</label>
				<div class="layui-input-inline" style="width:50%;">
					<input type="text" name="wfguest" value="<?php echo $wftemplateinfo[17]; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如果不需要显示默认留言则留空即可</div>
			</div>			
			<div class="layui-form-item">
				<label class="layui-form-label">订单提示方式设置</label>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>在下方设置订单提交成功提示方式、跳转页面、对话框消息</div>
			</div>
			<div id="wfformpostdiv" class="wfshowdiv">
				<div class="layui-form-item">
					<label class="layui-form-label">订单提示方式设置</label>
					<div class="layui-input-block" style="width:50%;">
						<input type="radio"<?php if($wftemplateinfo[18]==1){echo ' checked';} ?> name="wfpostoktype" value="1" title="跳转到成功页面">
						<input type="radio"<?php if($wftemplateinfo[18]==2){echo ' checked';} ?> name="wfpostoktype" value="2" title="弹出成功对话框">
					</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">自定义跳转网址</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfpostokurl" placeholder="填写跳转网址，要加http://" value="<?php echo $wftemplateinfo[19]; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如不填写则跳转到系统默认成功页面</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">自定义对话框消息</label>
					<div class="layui-input-inline" style="width:50%;">
						<input type="text" name="wfpostokmsg" placeholder="填写对话提示消息" value="<?php echo $wftemplateinfo[20]; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>｛｝大括号内是系统变量，不能修改　<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=10','200px')" class="g">系统变量说明</a></div>
				</div>
			</div>
			<div class="layui-form-item">				
				<label class="layui-form-label">下单页面样式设置</label>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>在下方设置下单页面背景、宽度、边框、提交按钮</div>	
			</div>
			<div id="wftempstylediv" class="wfshowdiv">			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>订单宽度</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[fw]" lay-verify="required" value="<?php echo $wftempstyle['fw']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认为100%自适应，也可固定宽度，如：950px</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>边框宽度</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[bw]" lay-verify="required" value="<?php echo $wftempstyle['bw']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>默认边框宽度为5px，不需要边框填写0</div>
				</div>		
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>边框颜色</label>
					<div class="layui-input-inline">
						<input type="text" id="wfbordercolor" name="wftempstyle[bc]" lay-verify="required" value="<?php echo $wftempstyle['bc']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>		
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>背景颜色</label>
					<div class="layui-input-inline">
						<input type="text" id="wfbgcolor" name="wftempstyle[bgc]" lay-verify="required" value="<?php echo $wftempstyle['bgc']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>标题底色</label>
					<div class="layui-input-inline">
						<input type="text" id="wftitbgcolor" name="wftempstyle[titbg]" lay-verify="required" value="<?php echo $wftempstyle['titbg']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>点击输入框选择颜色</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>提交按钮颜色</label>					
					<div class="layui-input-inline">
						<select name="wftempstyle[btn]">
							<option<?php if($wftempstyle['btn']=='g'){echo ' selected';} ?> value="g">深绿色</option>
							<option<?php if($wftempstyle['btn']=='l'){echo ' selected';} ?> value="l">浅绿色</option>
							<option<?php if($wftempstyle['btn']=='r'){echo ' selected';} ?> value="r">红色</option>
							<option<?php if($wftempstyle['btn']=='b'){echo ' selected';} ?> value="b">蓝色</option>
							<option<?php if($wftempstyle['btn']=='o'){echo ' selected';} ?> value="o">橙色</option>
						</select>
					</div>						
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>选择提交按颜色风格</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>提交按钮文字</label>
					<div class="layui-input-inline">
						<input type="text" name="wftempstyle[btnv]" lay-verify="required" value="<?php echo $wftempstyle['btnv']; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>自定义提交按钮文字，如：立即在线申请</div>
				</div>			
			</div>									
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 立即修改</button></div>            
        </form>	
    </div>
    <?php
	}else{
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>模板管理</legend></fieldset>
        <div class="wffun">
            <div class="l">
			    <?php if($WFaccount->wfpowerchk($wfpower,'addtemplate')){?><button onclick="location.href='?set=add'" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe608;</i>添加</button><?php }?>
			    <button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm" ><i class="layui-icon">&#x1002;</i>刷新</button>
            </div>
        </div>		
		<table id="imgpreview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="5%">ID</td>
                <td width="20%">模板名称</td>
                <td width="10%">模板风格</td>
                <td width="10%">验证码</td>
                <td width="10%">短信验证码</td>
                <td width="10%">发货通知</td>
                <td width="15%">添加时间</td>
                <td width="30%">操作</td>
            </tr>
            <?php			
            while($row=$res->fetch_row()){
			?>
            <tr align="center" class="trbg">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><i class="layui-icon"><?php if($row[10]){echo '&#xe605;';}else{echo '&#x1006;';} ?></i></td>
                <td><i class="layui-icon"><?php if($row[12]){echo '&#xe605;';}else{echo '&#x1006;';} ?></i></td>
                <td><i class="layui-icon"><?php if($row[13]){echo '&#xe605;';}else{echo '&#x1006;';} ?></i></td>
                <td><?php echo $row[22]; ?></td>
                <td>
					<?php if($WFaccount->wfpowerchk($wfpower,'edittemplate')){?><button onclick="location.href='?set=edit&id=<?php echo $row[0]; ?>'" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>修改</button><?php }?>
					<?php if($WFaccount->wfpowerchk($wfpower,'viewtemplate')){?><a href="../wftemplate/<?php echo $row[2]; ?>/index.php?pid=1&tid=<?php echo $row[0]; ?>" target="_blank" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe64a;</i>预览</a><?php }?>
					<?php if($WFaccount->wfpowerchk($wfpower,'deltemplate')){?><button onclick="wfdeldata('?action=del&id=<?php echo $row[0]; ?>')" class="layui-btn layui-btn-xs layui-btn-danger"<?php if($row[0]==1){echo ' style="background:#999;" disabled';} ?>><i class="layui-icon">&#xe640;</i>删除</button><?php }?>				
				</td>
		    </tr>
            <?php
            }
			?>
        </table>		
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>	
    </div>
    <?php
	}
	?>
</div>
<script type="text/javascript">
	$(function(){
		$("#wfbordercolor").bigColorpicker("wfbordercolor");
		$("#wfbgcolor").bigColorpicker("wfbgcolor");
		$("#wftitbgcolor").bigColorpicker("wftitbgcolor");
		$("#wfbtncolor").bigColorpicker("wfbtncolor");
		$("#wfbtnhcolor").bigColorpicker("wfbtnhcolor");
	});
</script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
<script type="text/javascript" src="./images/wftable.js"></script>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>