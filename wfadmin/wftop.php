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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wftop</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript">var oplist=new Array('cdh','cda','cdb','cdc','cdd','cde');$(document).ready(function(){$('#wftop_menu').find("a").click(function(){var id=$(this).attr('id');$.each(oplist,function(i,n){$('#'+n).attr('class','current');});$(this).parents("li").attr('class','default');});});function set_menu(url,id){window.parent.frames.wfleft.location.href=url;}</script>
</head>
<body oncontextmenu="return false">
<div class="wftop">
    <div class="wftopt">
        <div class="wfadmin_logo"></div>
        <div class="wftop_menu">
            <ul id="wftop_menu">
				<li class="default" id="cdh"><a href="./wfright.php" target="wfright" onClick="set_menu('./wfleft.php','wfright')">后台首页</a></li>
				<?php if($WFaccount->wfpowerchk($wfpower,'cda')){?><li class="current" id="cda"><a href="./wfproduct.php" target="wfright" onClick="set_menu('./wfleft.php?nav=p','wfleft')">产品管理</a></li><?php }?>
                <?php if($WFaccount->wfpowerchk($wfpower,'cdb')){?><li class="current" id="cdb"><a href="./wftemplate.php" target="wfright" onClick="set_menu('./wfleft.php?nav=t','wfleft')">模板管理</a></li><?php }?>
                <?php if($WFaccount->wfpowerchk($wfpower,'cdc')){?><li class="current" id="cdc"><a href="./wfordermgmt.php" target="wfright" onClick="set_menu('./wfleft.php','wfleft')">订单管理</a></li><?php }?>
                <?php if($WFaccount->wfpowerchk($wfpower,'cdd')){?><li class="current" id="cdd"><a href="./wfconfig.php?set=base" target="wfright" onClick="set_menu('./wfleft.php?nav=c','wfleft')">系统设置</a></li><?php }?>
                <?php if($WFaccount->wfpowerchk($wfpower,'cde')){?><li class="current" id="cde"><a href="./wfdbexim.php" target="wfright" onClick="set_menu('./wfleft.php?nav=d','wfleft')">数据备份</a></li><?php }?>
            </ul>
        </div>
    </div>
    <div class="wftopb">
        <div class="wfadmin">欢迎您 <span class="red"><?php echo $_SESSION['wfuser']; ?></span> 您当前使用的是<span class="red">WFPHP订单系统2017【高级版】官方正式版</span><span style="float:right;"><a href="./index.php?action=exit" class="g" target="_top">【安全退出】</a><?php if($WFaccount->wfpowerchk($wfpower,'setadminpw')){?><a href="./wfconfig.php?set=adminpw" class="r" target="wfright">【修改密码】</a><?php }?><a href="./wfright.php" class="b" target="wfright">【后台首页】</a><a href="http://www.wforder.com/help/" class="g" target="_blank">【帮助中心】</a></span></div>
    </div>
</div>
</body>
</html>