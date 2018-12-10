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
require WFPUBLIC.'/WFordermgmt.php';
require WFPUBLIC.'/WFfahuo.php';
$WFordermgmt=new WFordermgmt($wfadmingroupinfo[3]);
$WFfahuo=new WFfahuo();
$id=!empty($_GET['id'])?intval($_GET['id']):'';
$requrl='http://api.kdniao.cc/api/EOrderService';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfprint</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<style type="text/css" media="print">.noprint{display:none;}</style>
</head>
<body oncontextmenu="return false">
<div class="wfright">
	<div class="wfprint">
		<div class="wfprt">
			<?php echo $WFfahuo->wfprtkuaidi($id,$requrl); ?>
		</div>
		<div class="h58"></div>
		<div class="wffootbtn noprint">
			<?php if($WFordermgmt->wfprevdd($id)){?><button onclick="location.href='?set=startprint&id=<?php echo $WFordermgmt->wfprevdd($id); ?>'" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe603;</i>打印上一单</button><?php }?>
			<button onclick="location.href='./wfconfig.php?set=sender'" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe631;</i>修改电子面单设置</button>
			<button onclick="window.print();" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe64a;</i>开始打印</button>
			<button onclick="javascript:history.go(-1);" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe60a;</i>返回上一步</button>
			<button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm"><i class="layui-icon">&#x1002;</i>刷新</button>
			<?php if($WFordermgmt->wfnextdd($id)){?><button onclick="location.href='?set=startprint&id=<?php echo $WFordermgmt->wfnextdd($id); ?>'" class="layui-btn layui-btn-sm layui-btn-normal">打印下一单<i class="layui-icon" style="margin:0 0 0 6px;">&#xe602;</i></button><?php }?>
		</div>
	</div>
</div>
</body>
</html>