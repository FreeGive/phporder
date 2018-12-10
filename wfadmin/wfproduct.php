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
require WFPUBLIC.'/WFprotemp.php';
require WFPUBLIC.'/WFpages.php';
$WFprotemp=new WFprotemp();
$id=!empty($_GET['id'])?intval($_GET['id']):'';
$wfpid=!empty($_POST['wfpid'])?intval($_POST['wfpid']):'';
$wftid=!empty($_POST['wftid'])?intval($_POST['wftid']):'';
$wfproname=!empty($_POST['wfproname'])?$WFprotemp->wfverify($_POST['wfproname']):'';
$wfproductimg=!empty($_POST['wfproductimg'])?$WFprotemp->wfverify($_POST['wfproductimg']):'';
$wfproductlist=!empty($_POST['wfproduct'])?$WFprotemp->wfverify($_POST['wfproduct']):'';
$wfproduct=$WFprotemp->wftotwojson($wfproductlist);
$wfdefonpro=!empty($_POST['wfdefonpro'])?intval($_POST['wfdefonpro']):'0';
$wfprosizelist=!empty($_POST['wfprosize'])?$WFprotemp->wfverify($_POST['wfprosize']):'';
$wfprosize=$WFprotemp->wftoonejson($wfprosizelist);
$wfprocolourarr=!empty($_POST['wfprocolour'])?$WFprotemp->wfverify($_POST['wfprocolour']):'';
$wfprocolour=$WFprotemp->wfurlcode2(array_values($wfprocolourarr),'en');
$wfprocolour=!empty($wfprocolourarr[0]['n'])?json_encode($wfprocolour):'';
$wfgifton=$_POST['wfgifton'];
$wfgiftname=!empty($_POST['wfgiftname'])?$WFprotemp->wfverify($_POST['wfgiftname']):'';
$wfgiftsizelist=!empty($_POST['wfgiftsize'])?$WFprotemp->wfverify($_POST['wfgiftsize']):'';
$wfgiftsize=$WFprotemp->wftoonejson($wfgiftsizelist);
$wfgiftcolourlist=!empty($_POST['wfgiftcolour'])?$WFprotemp->wfverify($_POST['wfgiftcolour']):'';
$wfgiftcolour=$WFprotemp->wftoonejson($wfgiftcolourlist);
$wfautofhon=$_POST['wfautofhon'];
$wfautofhcont=htmlentities($_POST['wfautofhcont'],ENT_QUOTES,'UTF-8');
$nextpage=!empty($_GET['p'])?intval($_GET['p']):'1';
$startrow=($nextpage-1)*$wfbase['ptpagesize'];
switch($_GET['action']){
	case 'add':	
	$WFprotemp->wfaddproduct($wfproname,$wfproductimg,$wfproduct,$wfdefonpro,$wfprosize,$wfprocolour,$wfgifton,$wfgiftname,$wfgiftsize,$wfgiftcolour,$wfautofhon,$wfautofhcont);
	break;
	case 'edit':	
	$WFprotemp->wfeditproduct($id,$wfproname,$wfproductimg,$wfproduct,$wfdefonpro,$wfprosize,$wfprocolour,$wfgifton,$wfgiftname,$wfgiftsize,$wfgiftcolour,$wfautofhon,$wfautofhcont);
	break;
	case 'del':
	$WFprotemp->wfdeldata('wfproduct',$id,0,$WFprotemp->wflang['deltrue'],'./wfproduct.php',$WFprotemp->wflang['delproduct'].$id);
	break;
	case 'upimg':	
	$WFprotemp->wfupimg();
	break;	
	case 'delimg':	
	$WFprotemp->wfdelimg('wfproduct','wfproductimg',$id,$_GET['file']);
	break;		
	case 'create':
	$WFprotemp->wfcreatehtml($wfpid,$wftid);
	break;	
	default:
	$wfrows=$WFprotemp->wfrows('wfproduct');
	$WFpages=new WFpages('wfproduct.php',$wfrows,$wfbase['ptpagesize']);
	$res=$WFprotemp->wfquerytab('wfproduct',$startrow,$wfbase['ptpagesize']);
	break;
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfproduct</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
<script type="text/javascript" src="./images/wftable.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php
	if($_GET['set']=='add'){
	?>
    <div class="wfmain">	
		<fieldset class="layui-elem-field layui-field-title"><legend>添加新产品</legend></fieldset>
        <form id="wfform" action="?action=add" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>产品名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wfproname" lay-verify="required" value="" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写产品名称</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">产品缩略图</label>
				<div class="layui-input-inline">
					<span id="wfproductimg1" class="productimg"></span>
					<input id="wfproductimg2" name="wfproductimg" type="hidden" value="">				
					<button type="button" class="layui-btn layui-btn-primary" id="productimg"><i class="layui-icon">&#xe67c;</i> 上传产品缩略图</button>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请上传产品缩略图</div>
			</div>						
		    <div class="layui-form-item layui-form-text">
				<label class="layui-form-label">添加产品套餐和价格</label>
				<div class="layui-input-block">
					<textarea name="wfproduct" class="layui-textarea product"></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行一个，产品和价格用“|”隔开，价格不带"元"字，<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=2','310px')" class="g">查看示例</a></div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">默认选中套餐</label>
				<div class="layui-input-inline">
					<input type="text" name="wfdefonpro" lay-verify="number" value="1" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写1表示第1个套餐默认选中，填写0不选中任何套餐</div>
			</div>
		    <div class="layui-form-item layui-form-text">
				<label class="layui-form-label">添加产品尺码</label>
				<div class="layui-input-block">
					<textarea name="wfprosize" class="layui-textarea product"></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个尺码，回车换行</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">添加产品颜色</label>
				<div class="layui-input-block procolour">
					<input id="startnum" name="startnum" type="hidden" value="0">
					<input type="text" name="wfprocolour[0][n]" placeholder="请填写颜色" class="layui-input"><span id="wfprocolour01" class="colourimg"></span><input id="wfprocolour02" name="wfprocolour[0][i]" type="hidden" value=""><button type="button" class="layui-btn layui-btn-primary layui-btn-sm upcolourimg" lay-data="{elem:0}"><i class="layui-icon">&#xe67c;</i> 上传图片</button><button type="button" id="addcolour" class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon">&#xe608;</i>添加颜色</button>
				</div>
				<div id="showcolour">
				</div>
			</div>
			<!---------- 赠品开始 ---------->		
			<div class="layui-form-item">
				<label class="layui-form-label">赠品开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox" name="wfgifton" value="wfgiftdiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需填加赠品，点击开启</div>
			</div>
			<div id="wfgiftdiv" class="wfshowdiv" style="display:none;">
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>赠送产品名称</label>
					<div class="layui-input-inline">
						<input type="text" name="wfgiftname" value="" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请赠送产品名称</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">赠送产品尺码</label>
					<div class="layui-input-block">
						<textarea name="wfgiftsize" class="layui-textarea product"></textarea>
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个尺码，回车换行</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">赠送产品颜色</label>
					<div class="layui-input-block">
						<textarea name="wfgiftcolour" class="layui-textarea product"></textarea>
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个颜色，回车换行</div>
				</div>
			</div>
			<!---------- 赠品结束 ---------->
			<!---------- 自动发货开始 ---------->
			<div class="layui-form-item">
				<label class="layui-form-label">自动发货开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox" name="wfautofhon" value="wfautofhdiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需设置自动发货，点击开启（支付宝和微信付款成功后会显示下面你设置的信息）</div>
			</div>				
			<div id="wfautofhdiv" class="layui-form-item layui-form-text" style="display:none;">
				<label class="layui-form-label">自动发货内容</label>
				<div class="layui-input-block">
					<textarea name="wfautofhcont" class="layui-textarea product"></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>纯文本，不支持HTML代码</div>
			</div>						
			<!---------- 自动发货结束 ---------->
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe608;</i> 立即添加</button></div>            
        </form>
    </div>
    <?php
	//留下备用
	}elseif($_GET['set']=='xxxx'){
	?>
    <?php
	}elseif($_GET['set']=='edit'){
		$wfproductinfo=$WFaccount->wfqueinfo('wfproduct',$id);		
	?>
    <div class="wfmain">	
		<fieldset class="layui-elem-field layui-field-title"><legend>修改产品</legend></fieldset>
        <form id="wfform" action="?action=edit&id=<?php echo $id; ?>" method="post" class="layui-form">           
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>产品名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wfproname" lay-verify="required" value="<?php echo $wfproductinfo[1]; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写产品名称</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">产品缩略图</label>
				<div class="layui-input-inline">
					<span id="wfproductimg1" class="productimg"><?php if($wfproductinfo[2]){echo '<img src="'.$wfproductinfo[2].'" title="双击删除图片" ondblclick="wfdeldata(\'?action=delimg&id='.$id.'&file='.$wfproductinfo[2].'\')" onerror="this.src=\'./images/nopic.gif\'">';} ?></span>
					<input id="wfproductimg2" name="wfproductimg" type="hidden" value="<?php echo $wfproductinfo[2]; ?>">
					<button type="button" class="layui-btn layui-btn-primary" id="productimg"><i class="layui-icon">&#xe67c;</i> 上传产品缩略图</button>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请上传产品缩略图（双击图片删除）</div>
			</div>
		    <div class="layui-form-item layui-form-text">
				<label class="layui-form-label">添加产品套餐和价格</label>
				<div class="layui-input-block">
					<textarea name="wfproduct" class="layui-textarea product"><?php echo $WFprotemp->wftotwostr($wfproductinfo[3]); ?></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行一个，产品和价格用“|”隔开，价格不带"元"字，<a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=2','310px')" class="g">查看示例</a></div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">默认选中套餐</label>
				<div class="layui-input-inline">
					<input type="text" name="wfdefonpro" lay-verify="number" value="<?php echo $wfproductinfo[4]; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>填写1表示第1个套餐默认选中，填写0不选中任何套餐</div>
			</div>
		    <div class="layui-form-item layui-form-text">
				<label class="layui-form-label">添加产品尺码</label>
				<div class="layui-input-block">
					<textarea name="wfprosize" class="layui-textarea product"><?php echo $WFprotemp->wftoonestr($wfproductinfo[5]); ?></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个尺码，回车换行</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">添加产品颜色</label>									
				<?php
				if($wfproductinfo[6]){
					$wfprocolour=json_decode($wfproductinfo[6],true);
					$wfprocolour=$WFprotemp->wfurlcode2($wfprocolour,'de');				
					foreach($wfprocolour as $k=>$v){							
						if($k==0){
							echo '<div id="div_'.$k.'" class="layui-input-block procolour"><input type="text" name="wfprocolour['.$k.'][n]" placeholder="请填写颜色" value="'.$v['n'].'" class="layui-input"><input id="startnum" name="startnum" type="hidden" value="'.count($wfprocolour).'"><span id="wfprocolour'.$k.'1" class="colourimg"><img src="'.$v['i'].'" onerror="this.src=\'./images/nopic.gif\'"></span><input id="wfprocolour'.$k.'2" name="wfprocolour['.$k.'][i]" type="hidden" value="'.$v['i'].'"><button type="button" class="layui-btn layui-btn-primary layui-btn-sm upcolourimg" lay-data="{elem:'.$k.'}"><i class="layui-icon">&#xe67c;</i> 上传图片</button><button type="button" id="addcolour" class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon">&#xe608;</i>添加颜色</button></div>';
						}else{
							echo '<div id="div_'.$k.'" class="layui-input-block procolour"><input type="text" name="wfprocolour['.$k.'][n]" placeholder="请填写颜色" value="'.$v['n'].'" class="layui-input"><span id="wfprocolour'.$k.'1" class="colourimg"><img src="'.$v['i'].'" onerror="this.src=\'./images/nopic.gif\'"></span><input id="wfprocolour'.$k.'2" name="wfprocolour['.$k.'][i]" type="hidden" value="'.$v['i'].'"><button type="button" class="layui-btn layui-btn-primary layui-btn-sm upcolourimg" lay-data="{elem:'.$k.'}"><i class="layui-icon">&#xe67c;</i> 上传图片</button><button type="button" onclick="delcolour(\''.$k.'\')" class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon">&#xe640;</i>删除颜色</button></div>';
						}							
					}
				}else{
					echo '<div class="layui-input-block procolour"><input type="text" name="wfprocolour[0][n]" placeholder="请填写颜色" class="layui-input"><input id="startnum" name="startnum" type="hidden" value="0"><span id="wfprocolour01" class="colourimg"></span><input id="wfprocolour02" name="wfprocolour[0][i]" type="hidden" value=""><input type="file" name="wfprocolour0" class="layui-upload-file" lay-title="添加图片"><button type="button" id="addcolour" class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon">&#xe608;</i>添加颜色</button></div>';
				}					
				?>				
				<div id="showcolour">
				</div>
			</div>
			<!---------- 赠品开始 ---------->		
			<div class="layui-form-item">
				<label class="layui-form-label">赠品开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfproductinfo[7]=='wfgiftdiv'){echo ' checked';} ?> name="wfgifton" value="wfgiftdiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需填加赠品，点击开启</div>
			</div>
			<div id="wfgiftdiv" class="wfshowdiv"<?php if($wfproductinfo[7]!='wfgiftdiv'){echo ' style="display:none;"';} ?>>
				<div class="layui-form-item">
					<label class="layui-form-label"><em>*</em>赠送产品名称</label>
					<div class="layui-input-inline">
						<input type="text" name="wfgiftname" value="<?php echo $wfproductinfo[8]; ?>" class="layui-input">
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请赠送产品名称</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">赠送产品尺码</label>
					<div class="layui-input-block">
						<textarea name="wfgiftsize" class="layui-textarea product"><?php echo $WFprotemp->wftoonestr($wfproductinfo[9]); ?></textarea>
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个尺码，回车换行</div>
				</div>
				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">赠送产品颜色</label>
					<div class="layui-input-block">
						<textarea name="wfgiftcolour" class="layui-textarea product"><?php echo $WFprotemp->wftoonestr($wfproductinfo[10]); ?></textarea>
					</div>
					<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>一行填写一个颜色，回车换行</div>
				</div>
			</div>
			<!---------- 赠品结束 ---------->
			<!---------- 自动发货开始 ---------->
			<div class="layui-form-item">
				<label class="layui-form-label">自动发货开关</label>
				<div class="layui-input-inline" style="width:auto;">
					<input type="checkbox"<?php if($wfproductinfo[11]=='wfautofhdiv'){echo ' checked';} ?> name="wfautofhon" value="wfautofhdiv" lay-filter="showdiv" lay-skin="switch" lay-text="开启|关闭">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如需设置自动发货，点击开启（支付宝和微信付款成功后会显示下面你设置的信息）</div>
			</div>
			<div id="wfautofhdiv" class="layui-form-item layui-form-text"<?php if($wfproductinfo[11]!='wfautofhdiv'){echo ' style="display:none;"';} ?>>
				<label class="layui-form-label">自动发货内容</label>
				<div class="layui-input-block">
					<textarea name="wfautofhcont" class="layui-textarea product"><?php echo $wfproductinfo[12]; ?></textarea>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>纯文本，不支持HTML代码</div>
			</div>			
			<!---------- 自动发货结束 ---------->
            <div class="h58"></div>
            <div class="wffootbtn"><button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe618;</i> 立即修改</button></div>            
        </form>
    </div>
    <?php	
	}elseif($_GET['set']=='create'){
		$res=$WFprotemp->wfqueryall('wftemplate');
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>生成下单页面</legend></fieldset>
		<form id="wfform" action="?action=create" method="post" class="layui-form">
			<input type="hidden" name="wfpid" value="<?php echo $id; ?>">
			<div class="layui-form-item">
				<label class="layui-form-label">选择模板</label>
				<div class="layui-input-inline">
					<select name="wftid" lay-verify="required">
						<option value="">--- 请选择模板 ---</option>					
						<?php while($row=$res->fetch_row()){?>
						<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
						<?php }?>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>还没添加模板？立即<a href="./wftemplate.php?set=add" class="g">【添加模板】</a></div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn"><i class="layui-icon">&#xe603;</i>立即生成</button>
				</div>
			</div>						
		</form>		
		<fieldset class="layui-elem-field layui-field-title"><legend>订单调用代码</legend></fieldset>
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">订单页面直链网址</label>
			<div class="layui-input-block">
<textarea class="layui-textarea sms">
<?php echo $_SESSION['htmlurl']?$_SESSION['htmlurl']:'没有生成调用代码！'; ?>
</textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<a href="<?php echo $_SESSION['htmlurl']; ?>" target="_blank" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe615;</i>预览订单页面</a>
			</div>
		</div>
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">本域名调用代码<br><span class="red">提醒：点击全选代码<br>按Ctrl+C复制</span></label>
			<div class="layui-input-block">
<textarea class="layui-textarea">
<script type="text/javascript" src="<?php echo $_SESSION['jsurl']; ?>"></script>
<script type="text/javascript">
　　var wfsrc='<?php echo $_SESSION['htmlurl']; ?>';
　　document.write('<iframe src="'+wfsrc+'" width="100%" frameborder="0" scrolling="no" onload="this.height=this.contentWindow.document.documentElement.scrollHeight"></iframe>');
</script></textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i><a href="javascript:;" onClick="loadiframe('./wfhelp.php?id=3','210px')" class="g">使用本域名还是跨域名调用代码？</a></div>
			</div>
		</div>						
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">跨域名调用代码<br><span class="red">提醒：点击全选代码<br>按Ctrl+C复制</span></label>
			<div class="layui-input-block">
<textarea class="layui-textarea">
<script type="text/javascript" src="<?php echo $_SESSION['jsurl']; ?>"></script>
<script type="text/javascript">
　　var wfheight='<?php echo $_COOKIE['wfheight']; ?>'; //订单高度
　　var wfsrc='<?php echo $_SESSION['htmlurl']; ?>';
　　document.write('<iframe src="'+wfsrc+'" width="100%" height="'+wfheight+'" frameborder="0" scrolling="no"></iframe>');
</script></textarea>
			</div>
		</div>
        <script type="text/javascript">
			$('textarea').click(function(){
				$(this).focus();
				$(this).select();
			})
        </script>
    </div>
    <?php	
	}elseif($_GET['set']=='preview'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>预览下单页面</legend></fieldset>
		<iframe src="<?php echo $_SESSION['phpurl']; ?>" width="100%" height="200" allowtransparency="true" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" onload="this.height=0;var fdh=(this.Document?this.Document.body.scrollHeight:this.contentDocument.body.offsetHeight);this.height=(fdh>200?fdh:200)"></iframe>
		<div class="h58"></div>
		<div class="wffootbtn"><button onclick="javascript:history.go(-1);" class="layui-btn layui-btn-normal"><i class="layui-icon">&#xe64e;</i>获取订单调用代码</button></div>            
	</div>
    <?php
	}else{
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>产品管理</legend></fieldset>
        <div class="wffun">
            <div class="l">
			    <?php if($WFaccount->wfpowerchk($wfpower,'addproduct')){?><button onclick="location.href='?set=add'" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe608;</i>添加</button><?php }?>
			    <button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm" ><i class="layui-icon">&#x1002;</i>刷新</button>
            </div>
        </div>		
		<table id="imgpreview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="10%">ID</td>
                <td width="25%">产品名称</td>
                <td width="10%">产品缩略图</td>
                <td width="15%">添加时间</td>
                <td width="40%">操作</td>
            </tr>
            <?php			
            while($row=$res->fetch_row()){
				if($wfadmingroupinfo[3]=='all'||strpos($wfadmingroupinfo[3],$row[0])!==false){
			?>
            <tr align="center" class="trbg">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><img layer-pid="<?php echo $row[0]; ?>" layer-src="<?php echo $row[2]; ?>" src="<?php echo $row[2]; ?>" height="30" width="30" alt="点击查看大图" title="点击查看大图" onerror="this.src='./images/nopic.gif'"></td>
                <td><?php echo $row[13]; ?></td>
                <td>
					<?php if($WFaccount->wfpowerchk($wfpower,'editproduct')){?><button onclick="location.href='?set=edit&id=<?php echo $row[0]; ?>'" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>修改</button><?php }?>
					<?php if($WFaccount->wfpowerchk($wfpower,'createhtml')){?><button onclick="location.href='?set=create&id=<?php echo $row[0]; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>生成下单页面</button><?php }?>
					<?php if($WFaccount->wfpowerchk($wfpower,'delproduct')){?><button onclick="wfdeldata('?action=del&id=<?php echo $row[0]; ?>')" class="layui-btn layui-btn-xs layui-btn-danger"<?php if($row[0]==1){echo ' style="background:#999;" disabled';} ?>><i class="layui-icon">&#xe640;</i>删除</button><?php }?>				
				</td>
		    </tr>
            <?php
            }}
			?>
        </table>		
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>
    </div>
    <?php
	}
	?>
</div>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>