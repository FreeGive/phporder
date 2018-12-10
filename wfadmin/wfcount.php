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
$WFordermgmt=new WFordermgmt('all');
$yesterday=date("Y-m-d 00:00:00",strtotime("-1 day"));
$ytime=!empty($_GET['ytime'])?$_GET['ytime']:date("Y");
$mtime=!empty($_GET['mtime'])?$_GET['mtime']:date("Y-m");
$yearcount=$WFordermgmt->wfdatecount('%Y','%Y-%m','year',false);
$monthcount=$WFordermgmt->wfdatecount('%Y-%m','%Y','month',$ytime);
$daycount=$WFordermgmt->wfdatecount('%Y-%m-%d','%Y-%m','day',$mtime);
$pronamecount=$WFordermgmt->wffieldcount('wfproname');
$statuscount=$WFordermgmt->wffieldcount('wfddstatus');
$paycount=$WFordermgmt->wffieldcount('wfpayment');
$areacount=$WFordermgmt->wffieldcount('wfprovince');
$keywordcount=$WFordermgmt->wffieldcount('wfkeyword');
$ismobcount=$WFordermgmt->wffieldcount('wfismob');
$ggrefcount=$WFordermgmt->wffieldcount('wfddsource');
$rptname=$WFordermgmt->wfchkrpt('wfname');
$rptmob=$WFordermgmt->wfchkrpt('wfmob');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfcount</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false">
<div class="wfright">
	<?php if($_GET['set']=='chkrpt'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>重复订单检测</legend></fieldset>
        <div style="width:49%;height:auto;overflow:hidden;float:left;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="40%">姓名重复</td>
                    <td width="60%">订单数量</td>
                </tr>
                <?php while($namerow=$rptname->fetch_array()){?>
                <tr align="center">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfname&wfssstr=<?php echo urlencode($namerow['wfname']); ?>" class="g"><?php echo $namerow['wfname']; ?></a></td>
                    <td><em><?php echo $namerow['count(*)']; ?></em></td>
                </tr>
                <?php }?>
            </table>
        </div>     
        <div style="width:49%;height:auto;overflow:hidden;float:right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="40%">手机号重复</td>
                    <td width="60%">订单数量</td>
                </tr>
                <?php while($mobrow=$rptmob->fetch_array()){?>
                <tr align="center">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfmob&wfssstr=<?php echo $mobrow['wfmob']; ?>" class="g"><?php echo $mobrow['wfmob']; ?></a></td>
                    <td><em><?php echo $mobrow['count(*)']; ?></em></td>
                </tr>
                <?php }?>
            </table>
        </div>		
	</div>	
    <?php }elseif($_GET['set']=='ddsource'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>推广渠道统计</legend></fieldset>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="25%">推广渠道</td>
                <td width="20%">订单数量</td>
                <td width="20%">订单金额（元）</td>
                <td width="35%">统计操作</td>
            </tr>
            <?php while($grow=$ggrefcount->fetch_array()){if($grow['wfddsource']){?>
            <tr align="center" class="trbg">
                <td><a href="./wfordermgmt.php?action=search&wfssopt=wfddsource&wfssstr=<?php echo $grow['wfddsource']; ?>" class="g"><?php echo $grow['wfddsource']; ?></a></td>
                <td><em><?php echo $grow['count(*)']; ?></em></td>
                <td><em><?php echo $grow['sum(wfprice)']; ?></em></td>
                <td>
					<button onclick="location.href='./wfordermgmt.php?set=vipss&action=vipsearch&wfstartdate=<?php echo date('Y-m-d 00:00:00'); ?>&wfenddate=<?php echo date('Y-m-d H:i:s'); ?>&wfproname=&wfddsource=<?php echo $grow['wfddsource']; ?>&wfpayment=&wfpaystatus=&wfddstatus='" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe60e;</i>今天的</button>
					<button onclick="location.href='./wfordermgmt.php?set=vipss&action=vipsearch&wfstartdate=<?php echo $yesterday; ?>&wfenddate=<?php echo date('Y-m-d 00:00:00'); ?>&wfproname=&wfddsource=<?php echo $grow['wfddsource']; ?>&wfpayment=&wfpaystatus=&wfddstatus='" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe60e;</i>昨天的</button>
					<button onclick="location.href='./wfordermgmt.php?action=search&wfssopt=wfddsource&wfssstr=<?php echo $grow['wfddsource']; ?>'" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe63f;</i>所有的</button>
					<button onclick="location.href='./wfexcel.php?action=field&opt=wfddsource&str=<?php echo $grow['wfddsource']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button>
                </td>
            </tr>
            <?php }}?>
        </table>
		<blockquote class="layui-elem-quote"><span class="red">推广渠道使用方法：</span>只需在要推广的网址后跟上 <font class="red">?wfid=xxx</font> 即可（xxx就代表渠道代码）<br>
		例如：你的产品网址是http://www.test.com/，假设要在百度推广（假设渠道代码是baidu），那么推广网址就是<font class="blue">http://www.test.com/?wfid=baidu</font>，这样就能自动统计出从百度带来了多少订单。</blockquote>		
    </div>
    <?php }elseif($_GET['set']=='chkrpt'){?>
    <div class="wfmain">
        <div class="wftitle">重复订单查询</div>
        <div style="width:49%;height:auto;overflow:hidden;float:left;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="40%">姓名重复</td>
                    <td width="60%">订单数量</td>
                </tr>
                <?php while($namerow=$rptname->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfname&wfssstr=<?php echo $namerow['wfname']; ?>&wfsubmit=%E6%90%9C%E7%B4%A2" class="g"><?php echo $namerow['wfname']; ?></a></td>
                    <td><em><?php echo $namerow['count(*)']; ?></em></td>
                </tr>
                <?php }?>
            </table>
        </div>     
        <div style="width:49%;height:auto;overflow:hidden;float:right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="40%">手机号重复</td>
                    <td width="60%">订单数量</td>
                </tr>
                <?php while($mobrow=$rptmob->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfmob&wfssstr=<?php echo $mobrow['wfmob']; ?>&wfsubmit=%E6%90%9C%E7%B4%A2" class="g"><?php echo $mobrow['wfmob']; ?></a></td>
                    <td><em><?php echo $mobrow['count(*)']; ?></em></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>    
    <?php }else{?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>按日期统计</legend></fieldset>
        <div style="width:32%;height:auto;overflow:hidden;float:left;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">年统计</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($yrow=$yearcount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="?ytime=<?php echo $yrow['year']; ?>" class="g"><?php echo $yrow['year']; ?>年</a></td>
                    <td><em><?php echo $yrow['count(*)']; ?></em></td>
                    <td><em><?php echo $yrow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=date&opt=%Y&str=<?php echo $yrow['year']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>     
        <div style="width:32%;height:auto;overflow:hidden;float:left;margin-left:2%;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">月统计</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($mrow=$monthcount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="?mtime=<?php echo $mrow['month']; ?>" class="g"><?php echo $mrow['month']; ?></a></td>
                    <td><em><?php echo $mrow['count(*)']; ?></em></td>
                    <td><em><?php echo $mrow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=date&opt=%Y-%m&str=<?php echo $mrow['month']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div style="width:32%;height:auto;overflow:hidden;float:right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">日统计</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($drow=$daycount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td style="color:#BD0000;"><?php echo $drow['day']; ?></td>
                    <td><em><?php echo $drow['count(*)']; ?></em></td>
                    <td><em><?php echo $drow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=date&opt=%Y-%m-%d&str=<?php echo $drow['day']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div style="clear:both;"></div>
		<fieldset class="layui-elem-field layui-field-title"><legend>按字段统计</legend></fieldset>
        <div style="width:32%;height:auto;overflow:hidden;float:left;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">订购产品</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($prow=$pronamecount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfproname&wfssstr=<?php echo urlencode($prow['wfproname']); ?>" class="g"><?php echo $prow['wfproname']; ?></a></td>
                    <td><em><?php echo $prow['count(*)']; ?></em></td>
                    <td><em><?php echo $prow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfproname&str=<?php echo urlencode($prow['wfproname']); ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>       
        <div style="width:32%;height:auto;overflow:hidden;float:left;margin-left:2%;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">订单状态</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($srow=$statuscount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfddstatus&wfssstr=<?php echo urlencode($srow['wfddstatus']); ?>" class="g"><?php echo $srow['wfddstatus']; ?></a></td>
                    <td><em><?php echo $srow['count(*)']; ?></em></td>
                    <td><em><?php echo $srow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfddstatus&str=<?php echo urlencode($srow['wfddstatus']); ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>      
        <div style="width:32%;height:auto;overflow:hidden;float:right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">付款方式</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($frow=$paycount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfpayment&wfssstr=<?php echo $frow['wfpayment']; ?>" class="g"><?php echo $frow['wfpayment']; ?></a></td>
                    <td><em><?php echo $frow['count(*)']; ?></em></td>
                    <td><em><?php echo $frow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfpaystatus&str=<?php echo $frow['wfpayment']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div style="clear:both;"></div>
        <div style="width:32%;height:auto;overflow:hidden;float:left;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">所在地区</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($arow=$areacount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfprovince&wfssstr=<?php echo urlencode($arow['wfprovince']); ?>" class="g"><?php echo $arow['wfprovince']?$arow['wfprovince']:'未知'; ?></a></td>
                    <td><em><?php echo $arow['count(*)']; ?></em></td>
                    <td><em><?php echo $arow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfprovince&str=<?php echo urlencode($arow['wfprovince']); ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>       
        <div style="width:32%;height:auto;overflow:hidden;float:left;margin-left:2%;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">搜索关键词</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($krow=$keywordcount->fetch_array()){if($krow['wfkeyword']){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfkeyword&wfssstr=<?php echo urlencode($krow['wfkeyword']); ?>" class="g"><?php echo $krow['wfkeyword']; ?></a></td>
                    <td><em><?php echo $krow['count(*)']; ?></em></td>
                    <td><em><?php echo $krow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfkeyword&str=<?php echo urlencode($krow['wfkeyword']); ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }}?>
            </table>
        </div>      
        <div style="width:32%;height:auto;overflow:hidden;float:right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="tit">
                    <td width="30%" class="blue">下单终端</td>
                    <td width="20%">订单数量</td>
                    <td width="30%">订单金额（元）</td>
                    <td width="20%">导出</td>
                </tr>
                <?php while($crow=$ismobcount->fetch_array()){?>
                <tr align="center" class="trbg">
                    <td><a href="./wfordermgmt.php?action=search&wfssopt=wfismob&wfssstr=<?php echo $crow['wfismob']; ?>" class="g"><?php echo $crow['wfismob']=='wap'?'手机端':'电脑端'; ?></a></td>
                    <td><em><?php echo $crow['count(*)']; ?></em></td>
                    <td><em><?php echo $crow['sum(wfprice)']; ?></em></td>
                    <td><button onclick="location.href='./wfexcel.php?action=field&opt=wfismob&str=<?php echo $crow['wfismob']; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe603;</i>导出</button></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
    <?php }?>
</div>
</body>
</html>