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
<title>wfleft</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript">$(document).ready(function(){$(".menutitle").toggle(function(){$(this).next("dd.hmenu").show();$(this).css('background','#F2FFF2 url(./images/close_icon.png) 20px 15px no-repeat');},function(){$(this).next("dd.hmenu").hide();$(this).css('background','#F2FFF2 url(./images/open_icon.png) 20px 15px no-repeat');})})</script>
<base href="wfmain">
</head>
<body oncontextmenu="return false">
<div class="wfleft">
	<?php switch($_GET['nav']){case 'p':?>
	<ul>	
		<li class="tit">产品管理</li>
		<?php if($WFaccount->wfpowerchk($wfpower,'addproduct')){?><li><a href="./wfproduct.php?set=add" target="wfright">添加新产品</a></li><?php }?>
		<?php if($WFaccount->wfpowerchk($wfpower,'cda')){?><li><a href="./wfproduct.php" target="wfright">产品管理</a></li><?php }?>
	</ul>
	<?php break;case 't':?>
	<ul>	
		<li class="tit">模板管理</li>
		<?php if($WFaccount->wfpowerchk($wfpower,'addtemplate')){?><li><a href="./wftemplate.php?set=add" target="wfright">添加新模板</a></li><?php }?>
		<?php if($WFaccount->wfpowerchk($wfpower,'cdb')){?><li><a href="./wftemplate.php" target="wfright">模板管理</a></li><?php }?>
	</ul>
	<?php break;case 'c':?>
    <ul>
        <li class="tit">系统管理</li>
        <?php if($WFaccount->wfpowerchk($wfpower,'setbase')){?><li><a href="./wfconfig.php?set=base" target="wfright">系统基础设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setmail')){?><li><a href="./wfconfig.php?set=mail" target="wfright">邮件发送设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setpay')){?><li><a href="./wfconfig.php?set=pay" target="wfright">支付接口设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setsms')){?><li><a href="./wfconfig.php?set=sms" target="wfright">短信接口设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setsafe')){?><li><a href="./wfconfig.php?set=safe" target="wfright">系统安全设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setprint')){?><li><a href="./wfconfig.php?set=sender" target="wfright">电子面单设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setadminurl')){?><li><a href="./wfconfig.php?set=adminurl" target="wfright">更改后台地址</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setadminpw')){?><li><a href="./wfconfig.php?set=adminpw" target="wfright">更改后台密码</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setuseradmin')){?><li><a href="./wfaccount.php?set=admin" target="wfright">管理员设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setadmingroup')){?><li><a href="./wfaccount.php?set=admingroup" target="wfright">权限组设置</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'setadminlog')){?><li><a href="./wfaccount.php?set=adminlog" target="wfright">管理员操作日志</a></li><?php }?>
	</ul>
	<?php break;case 'd':?>
    <ul>
        <li class="tit">数据管理</li>
        <?php if($WFaccount->wfpowerchk($wfpower,'exportdb')){?><li><a href="./wfdbexim.php?set=ex" target="wfright">数据库备份</a></li><?php }?>
        <?php if($WFaccount->wfpowerchk($wfpower,'importdb')){?><li><a href="./wfdbexim.php?set=im" target="wfright">数据库恢复</a></li><?php }?>
    </ul>
	<?php break;default:?>
    <ul>
        <li class="tit">订单管理</li>
        <?php if($WFaccount->wfpowerchk($wfpower,'cdc')){?><li><a href="wfordermgmt.php" target="wfright" class="r"><strong>查看所有订单&gt;&gt;</strong></a></li><?php }?>
    </ul>
	<?php if($WFaccount->wfpowerchk($wfpower,'countorder')){?> 
    <dl>
        <dt class="menutitle"><a href="#"><strong>按订购产品统计</strong></a></dt>
        <dd class="hmenu">
            <form action="./wfordermgmt.php" method="get" name="wfformproname" target="wfright">
                <input type="hidden" name="action" value="search">
                <input type="hidden" name="wfssopt" value="wfproname">
                <select name="wfssstr" onChange="document.wfformproname.submit()" style="height:22px;line-height:22px;max-width:98%;">
                    <option value="">--- 请选择产品 ---</option>
					<?php
					$res=$WFaccount->wfqueryall('wfproduct');
					while($row=$res->fetch_row()){
                    ?>
                    <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </form>
        </dd>
    </dl>
    <dl>
        <dt class="menutitle"><a href="#"><strong>按订购时间统计</strong></a></dt>
        <dd class="hmenu">
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=1" target="wfright">今天的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=2" target="wfright">昨天的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=3" target="wfright">最近3天的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=4" target="wfright">最近7天的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=5" target="wfright">最近30天的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=6" target="wfright">这个月的</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=&wfssstr=&wfddate=7" target="wfright">上个月的</a></p>
        </dd>
    </dl>
    <dl>
        <dt class="menutitle"><a href="#"><strong>按订单状态统计</strong></a></dt>
        <dd class="hmenu">
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E6%9C%AA%E5%A4%84%E7%90%86" target="wfright">未处理</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E5%B7%B2%E5%8F%91%E8%B4%A7" target="wfright">已发货</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E5%B7%B2%E7%AD%BE%E6%94%B6" target="wfright">已签收</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E6%8B%92%E6%94%B6" target="wfright">拒　收</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E7%9F%AD%E4%BF%A1%E7%A1%AE%E8%AE%A4" class="g" target="wfright">短信确认√</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=%E7%9F%AD%E4%BF%A1%E6%92%A4%E5%8D%95" class="r" target="wfright">短信撤单×</a></p>
        </dd>
    </dl>    
    <dl>
        <dt class="menutitle"><a href="#"><strong>按付款方式统计</strong></a></dt>
        <dd class="hmenu">
			<?php
			foreach($wfpaystr as $key=>$val){
				echo '<p><a href="./wfordermgmt.php?action=search&wfssopt=wfpayment&wfssstr='.$val['e'].'" target="wfright">'.$val['z'].'</a></p>';
			}
			?>	
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfpaystatus&wfssstr=yes" class="g" target="wfright">已支付 √</a></p>
            <p><a href="./wfordermgmt.php?action=search&wfssopt=wfpaystatus&wfssstr=no" class="r" target="wfright">未支付 ×</a></p>
        </dd>
    </dl>
    <dl>
        <dt class="menutitok"><a href="./wfcount.php?set=ddsource" class="g" target="wfright"><strong>按推广渠道统计</strong></a></dt>
    </dl>
    <dl>
        <dt class="menutitok"><a href="./wfcount.php" class="r" target="wfright"><strong>看订单综合统计</strong></a></dt>
    </dl>
	<?php }?>    
	<?php break;}?>
</div>
</body>
</html>