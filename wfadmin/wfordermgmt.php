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
require WFPUBLIC.'/WFpages.php';
$WFordermgmt=new WFordermgmt($wfadmingroupinfo[3]);
$WFfahuo=new WFfahuo();
//所用到变量
$id=$WFordermgmt->wfverify($_GET['id']);
$lot=!empty($_GET['lot'])?intval($_GET['lot']):0;
$isdel=!empty($_GET['isdel'])?1:0;
$wfssopt=!empty($_GET['wfssopt'])?$WFordermgmt->wfverify($_GET['wfssopt']):'wfddno';
$wfssstr=!empty($_GET['wfssstr'])?$WFordermgmt->wfverify($_GET['wfssstr']):'';
$wfbuydate=!empty($_GET['wfddate'])?intval($_GET['wfddate']):0;
$wfddopt=$WFordermgmt->wfverify($_GET['wfddopt']);
$wfddval=$WFordermgmt->wfverify($_GET['wfddval']);
$wfddstatus=$WFordermgmt->wfverify($_GET['wfddstatus']);
$wfddno=$WFordermgmt->wfverify($_POST['wfddno']);
$wfkuaidi=$WFordermgmt->wfverify($_POST['wfkuaidi']);
$wfkdno=$WFordermgmt->wfverify($_POST['wfkdno']);
$nextpage=!empty($_GET['p'])?intval($_GET['p']):'1';
$startrow=($nextpage-1)*$wfbase['ddpagesize'];
//流程控制开始
switch($_GET['action']){
	//单条件搜索
	case 'search':
	$wfrows=$WFordermgmt->wfddrows('search',$wfbuydate,$wfssopt,$wfssstr,$wfscval,$isdel);
	$WFpages=new WFpages('wfordermgmt.php',$wfrows,$wfbase['ddpagesize']);
	$res=$WFordermgmt->wfsearch($wfssopt,$wfssstr,$wfbuydate,$startrow,$wfbase['ddpagesize']);
	break;
	//多条件搜索
	case 'vipsearch':
	$wfssvalarr=array('wfproname','wfpayment','wfpaystatus','wfddsource','wfddstatus','wfismob');
	$wfscval='id>0';
	if(!empty($_GET['wfstartdate'])){$wfscval.=" and wfbuydate>='".$_GET['wfstartdate']."' and wfbuydate<='".$_GET['wfenddate']."'";}
	foreach($wfssvalarr as $wfssval){if(!empty($_GET[$wfssval])){$wfscval.=' and '."$wfssval='".$_GET[$wfssval]."'";}}
	$wfrows=$WFordermgmt->wfddrows('vipsearch',$wfbuydate,$wfssopt,$wfssstr,$wfscval,$isdel);
	$WFpages=new WFpages('wfordermgmt.php',$wfrows,$wfbase['ddpagesize']);
	$res=$WFordermgmt->wfvipsearch($wfscval,$startrow,$wfbase['ddpagesize']);
	break;	
	//删除与恢复订单
	case 'dorr':
	$WFordermgmt->wfdelorrest($id,$lot,$isdel);
	break;
	//彻底删除订单
	case 'del':	
	$WFordermgmt->wfdeldata('wforderlist',$id,$lot,$WFordermgmt->wflang['deltrue'],'./wfordermgmt.php?set=recycle&isdel=1',$WFordermgmt->wflang['delorder'].$id);
	break;
	//编辑订单
	case 'edit':
	$WFordermgmt->wfeditorder($id,$wfddopt,$wfddval);
	break;	
	//更改订单状态
	case 'ddsource':
	$WFfahuo->wfeditddstatus($id,$wfddstatus);
	break;	
	//保存快递单号
	case 'savekdno':
	$WFordermgmt->wfsavekdno($id,$wfkuaidi,$wfkdno);
	break;
	//快递查询
	case 'quekd':
	$WFfahuo->wfquekuaidi($wfddno,$wfkuaidi,$wfkdno);
	exit;
	break;	
	//待加
	case 'xxx':	
	break;
	default:
	$wfrows=$WFordermgmt->wfddrows('all',0,0,0,0,$isdel);
	$WFpages=new WFpages('wfordermgmt.php',$wfrows,$wfbase['ddpagesize']);
	$res=$WFordermgmt->wfqueorder('wforderlist',$isdel,$startrow,$wfbase['ddpagesize']);
	break;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfordermgmt</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjq.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php
	if($_GET['set']=='add'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>添加订单</legend></fieldset>
		<form id="wfform" action="../wfhome/addorder/index.php" method="get" class="layui-form" target="_blank">
			<div class="layui-form-item">
				<label class="layui-form-label">订购产品</label>
				<div class="layui-input-inline">
					<select name="pid" lay-verify="required">
						<option value="">- 请选择产品 -</option>
						<?php
						$res=$WFordermgmt->wfqueryall('wfproduct');
						while($row=$res->fetch_row()){
						?>
						<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请选择订购产品</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit class="layui-btn">下一步<i class="layui-icon" style="margin:0 0 0 6px;">&#xe602;</i></button>
				</div>
			</div>
		</form>
	</div>
	<?php 
	}elseif($_GET['set']=='ddinfo'){
		$ddinfo=$WFordermgmt->wfqueinfo('wforderlist',$id);
	?>
	<div class="wfmain">		
		<blockquote class="layui-elem-quote"><span class="red">温馨提示：</span>在订单信息文字上双击鼠标可修改信息，修改后在空白处点击鼠标可保存修改。</blockquote>		      
        <table<?php if($WFaccount->wfpowerchk($wfpower,'editorder')){echo ' id="'.$ddinfo[0].'"';} ?> width="100%" border="0" cellspacing="0" cellpadding="0" class="ddinfo">
            <tr>
                <td class="ddl bg1" width="10%">订单号</td>
                <td class="ddr" width="40%"><?php echo $ddinfo[1]; ?></td>
                <td class="ddl bg1" width="10%">性别</td>
                <td class="wffield ddr" width="40%" id="wfsex"><?php echo $ddinfo[14]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg1" width="10%">订购时间</td>
                <td class="ddr" width="40%"><?php echo $ddinfo[2]; ?></td>
                <td class="ddl bg1" width="10%">年龄</td>
                <td class="wffield ddr" width="40%" id="wfage"><?php echo $ddinfo[15]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg1">产品名称</td>
                <td class="wffield ddr" id="wfproname"><?php echo $ddinfo[3]; ?></td>
                <td class="ddl bg1">身高</td>
                <td class="wffield ddr" id="wfheight"><?php echo $ddinfo[16]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg2">订购产品</td>
                <td class="wffield ddr" id="wfproduct"><?php echo $ddinfo[5]; ?></td>
                <td class="ddl bg1">体重</td>
                <td class="wffield ddr" id="wfweight"><?php echo $ddinfo[17]; ?></td>
            </tr>			
            <tr>
                <td class="ddl bg2">产品尺码</td>
                <td class="wffield ddr" id="wfprosize"><?php echo $ddinfo[6]; ?></td>
                <td class="ddl bg1">身份证号</td>
                <td class="wffield ddr" id="wfidcard"><?php echo $ddinfo[18]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg2">产品颜色</td>
                <td class="wffield ddr" id="wfprocolour"><?php echo $ddinfo[7]; ?></td>
                <td class="ddl bg1">电话号码</td>
                <td class="wffield ddr" id="wftel"><?php echo $ddinfo[20]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg3">赠送产品</td>
                <td class="wffield ddr" id="wfgiftname"><?php echo $ddinfo[8]; ?></td>
                <td class="ddl bg1">邮编</td>
                <td class="wffield ddr" id="wfpost"><?php echo $ddinfo[25]; ?></td>
            </tr>			
            <tr>
                <td class="ddl bg3">赠送产品尺码</td>
                <td class="wffield ddr" id="wfgiftsize"><?php echo $ddinfo[9]; ?></td>
                <td class="ddl bg1">QQ号</td>
                <td class="wffield ddr" id="wfqq"><?php echo $ddinfo[26]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg3">赠送产品颜色</td>
                <td class="wffield ddr" id="wfgiftcolour"><?php echo $ddinfo[10]; ?></td>
                <td class="ddl bg1">微信号</td>
                <td class="wffield ddr" id="wfweixin"><?php echo $ddinfo[27]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg1">订购数量</td>
                <td class="wffield ddr" id="wfnums"><?php echo $ddinfo[11]; ?></td>
                <td class="ddl bg1">邮箱</td>
                <td class="wffield ddr" id="wfemail"><?php echo $ddinfo[28]; ?></td>
            </tr>			
            <tr>
                <td class="ddl bg1">价格</td>
                <td class="wffield ddr" id="wfprice"><?php echo $ddinfo[12]; ?>元</td>
                <td class="ddl bg1">邀请码</td>
                <td class="wffield ddr" id="wfinvcode"><?php echo $ddinfo[29]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg1">姓名</td>
                <td class="wffield ddr" id="wfname"><?php echo $ddinfo[13]; ?></td>
                <td class="ddl bg1">日期</td>
                <td class="wffield ddr" id="wfdatetime"><?php echo $ddinfo[30]; ?></td>             
            </tr>			
            <tr>
                <td class="ddl bg1">手机号码</td>
                <td class="wffield ddr" id="wfmob"><?php echo $ddinfo[19]; ?></td>
                <td class="ddl bg4">IP地址</td>
                <td class="ddr"><?php echo $ddinfo[40]; ?></td>
            </tr>
            <tr>
                <td class="ddl bg1">收货地址</td>
                <td class="wffield ddr" id="wfaddress"><?php echo $ddinfo[24]; ?></td>
                <td class="ddl bg4">下单终端</td>
                <td class="ddr"><?php if($ddinfo[45]=='wap'){echo '来自手机端下单';}else{echo '来自电脑端下单';} ?></td>
            </tr>
            <tr>
                <td class="ddl bg1">付款方式</td>
                <td class="ddr"><?php $WFordermgmt->wfpaymentstr($ddinfo[32],$ddinfo[33],$wfpaystr); ?></td>
                <td class="ddl bg4">订单状态</td>
                <td class="ddr"><?php echo $ddinfo[42]; ?>
					<select id="wfddstatus<?php echo $ddinfo[0];?>" onChange="wfgetopt('?action=ddsource&id=<?php echo $ddinfo[0];?>',<?php echo $ddinfo[0];?>)"<?php if(!$WFaccount->wfpowerchk($wfpower,'chuliorder')){echo ' disabled';}?>>
						<option value="">- 请选择 -</option>
						<?php
						$wfstatusarr=(explode('|',$wfbase['statusopt']));
						foreach($wfstatusarr as $value){
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
						?>
					</select>
				</td>
            </tr>
            <tr>
                <td class="ddl bg1">顾客留言</td>
                <td class="wffield ddr" id="wfguest"><?php echo $ddinfo[35]; ?></td>
                <td rowspan="2" class="ddl bg4">快递单号</td>
                <td rowspan="2" class="ddr">
                    <form id="wfform" action="?action=savekdno&lot=0&id=<?php echo $ddinfo[0];?>" method="post" style=" width:auto;float:left;margin-right:8px;">
						<select name="wfkuaidi" class="wfkuaidi">
							<option value="">- 请选择快递 -</option>
							<?php							
							foreach($wfexpress as $key=>$value){						
							?>
							<option<?php if($ddinfo[43]==$key){echo ' selected';}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php
							}
							?>
						</select>	
                        <input type="text" name="wfkdno" value="<?php if(!empty($ddinfo[44])){echo $ddinfo[44];} ?>" placeholder="请填写单号" class="wfkdno">
                        <button lay-submit lay-filter="wfsubmit" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe610;</i>保存单号</button>
                    </form>
					<button onClick="wfquekuaidi('<?php echo $ddinfo[1];?>','<?php echo $ddinfo[43]; ?>','<?php echo $ddinfo[44]; ?>')" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon">&#xe615;</i>查询物流</button>
					<div id="wfkddata" class="wfkddata"></div>
				</td>
            </tr>
            <tr>
                <td class="ddl bg1">推广渠道</td>
                <td class="wffield ddr" id="wfddsource"><?php echo $ddinfo[36]; ?></td>
            </tr>        
		    <tr>
                <td class="ddl bg1">订单来源</td>
                <td class="ddr">
					<?php echo $ddinfo[37]?'<a href="'.$ddinfo[37].'" class="g" target="_blank">'.$ddinfo[37].'</a>':'无来路（直接输入网址或书签/收藏夹打开）'; ?>
					<?php if($ddinfo[39]){echo '<br><span class="red">搜索关键词：</span><span class="blue">'.$ddinfo[39].'</span>';} ?>
				</td>
                <td rowspan="2" class="ddl bg4">管理员备注</td>
                <td rowspan="2" class="ddr">
					<textarea id="wfadminps" name="wfadminps" class="wfadminps"><?php echo $ddinfo[41]; ?></textarea>
					<button id="wfsubmit" onClick="wfsaveadminps(<?php echo $ddinfo[0];?>)" class="layui-btn layui-btn-xs" style="vertical-align:top;"><i class="layui-icon">&#xe610;</i>保存</button>
				</td>
            </tr>
            <tr>
                <td class="ddl bg1">下单页面</td>
                <td class="ddr"><a href="<?php echo $ddinfo[38]; ?>" class="g" target="_blank"><?php echo $ddinfo[38]; ?></a></td>
            </tr>
        </table>
		<div class="h58"></div>
		<div class="wffootbtn">
			<?php if($WFordermgmt->wfprevdd($ddinfo[0])){?><button onclick="location.href='?set=ddinfo&id=<?php echo $WFordermgmt->wfprevdd($ddinfo[0]); ?>'" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe603;</i>上一单</button><?php }?>
			<button onclick="wfdeldata('?action=dorr&isdel=1&lot=0&id=<?php echo $ddinfo[0]; ?>')" class="layui-btn layui-btn-sm layui-btn-danger"><i class="layui-icon">&#xe640;</i>删除订单</button>
			<button onclick="location.href='./wfprint.php?set=startprint&id=<?php echo $ddinfo[0]; ?>'" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe64a;</i>电子面单打印</button>
			<button onclick="location.href='./wfordermgmt.php'" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe60a;</i>返回列表</button>
			<button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm"><i class="layui-icon">&#x1002;</i>刷新</button>
			<?php if($WFordermgmt->wfnextdd($ddinfo[0])){?><button onclick="location.href='?set=ddinfo&id=<?php echo $WFordermgmt->wfnextdd($ddinfo[0]); ?>'" class="layui-btn layui-btn-sm layui-btn-normal">下一单<i class="layui-icon" style="margin:0 0 0 6px;">&#xe602;</i></button><?php }?>
		</div>
	</div>
	<?php }elseif($_GET['set']=='recycle'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>订单回收站</legend></fieldset>
        <div class="wffun">
            <div class="l">
			    <?php if($WFaccount->wfpowerchk($wfpower,'addorder')){?><button onclick="wfloturlget('?action=dorr&isdel=0','请选择您要还原的订单！')" class="layui-btn layui-btn-sm"><i class="layui-icon white">&#xe610;</i>还原订单</button><?php }?>
			    <?php if($WFaccount->wfpowerchk($wfpower,'delorder')){?><button onclick="wflotdel('?action=del')" class="layui-btn layui-btn-sm layui-btn-danger"><i class="layui-icon white">&#xe640;</i>彻底删除</button><?php }?>
				<button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm"><i class="layui-icon white">&#x1002;</i>刷新</button>
            </div>
        </div>
		<div class="clear"></div>	
		<blockquote class="layui-elem-quote">
		共查询到 <em><?php echo $wfrows;?></em> 笔已删除订单。
		</blockquote>		
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="4%"><input type="checkbox" id="all"></td>
                <td width="10%">ID</td>
                <td width="11%">单号</td>
                <td width="11%">订购时间</td>
                <td width="14%">订购产品</td>
                <td width="11%">姓名</td>
                <td width="11%">手机号码</td>
                <td width="11%">详细地址</td>
                <td width="11%">订单状态</td>
                <td width="6%">操作</td>
            </tr>
            <?php while($row=$res->fetch_row()){?>
            <tr align="center" class="trbg">
                <td><input type="checkbox" name="wflist" value="<?php echo $row[0];?>"></td>
                <td><?php echo $row[0]; ?></td>
                <td style="text-decoration:line-through;"><a href="?set=ddinfo&id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></td>
                <td><?php echo $row[2]?$row[2]:'-'; ?></td>
                <td><?php echo $row[3]?$row[3]:'-'; ?></td>
                <td><?php echo $row[13]?$row[13]:'-'; ?></td>
                <td><?php echo $row[19]?$row[19]:'-'; ?></td>
                <td><?php echo $row[24]?$row[24]:'-'; ?></td>
                <td><?php echo $row[42]?$row[42]:'-'; ?></td>
                <td>
					<button onclick="wfoperate('?action=dorr&isdel=0&lot=0&id=<?php echo $row[0]; ?>')" class="layui-btn layui-btn-xs" style="margin:5px 0;"><i class="layui-icon">&#xe60a;</i>还原</button>
					<?php if($WFaccount->wfpowerchk($wfpower,'delorder')){?><button onclick="wfdeldata('?action=del&isdel=1&lot=0&id=<?php echo $row[0]; ?>')" class="layui-btn layui-btn-xs layui-btn-danger" style="margin:5px 0;"><i class="layui-icon">&#xe640;</i>删除</button><?php }?>
				</td>
            </tr>
            <?php }?>
        </table>
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>
	</div>
	<?php }else{?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>订单信息管理</legend></fieldset>
		<div class="wffun">		
            <div class="l">
				<?php if($_GET['set']=='vipss'){?>
                <form id="wfform" action="?" method="get" class="layui-form">
					<input type="hidden" name="set" value="vipss">
					<input type="hidden" name="action" value="vipsearch">
				    <span class="opt5">
					<input type="text" name="wfstartdate" id="wfstartdate" placeholder="选择开始日期" value="<?php echo $_GET['wfstartdate'];?>" class="layui-input">
					</span>
				    <span class="opt5">
					<input type="text" name="wfenddate" id="wfenddate" placeholder="选择截止日期" value="<?php echo $_GET['wfenddate'];?>" class="layui-input">
					</span>
					<span class="opt3">
					<select name="wfproname">
						<option value="">- 订购产品 -</option>
						<?php
						$pres=$WFaccount->wfqueryall('wfproduct');
						while($prow=$pres->fetch_row()){
						?>
						<option <?php if($_GET['wfproname']==$prow[1]){echo 'selected ';}?>value="<?php echo $prow[1]; ?>"><?php echo $prow[1]; ?></option>
						<?php
						}
						?>
					</select>
					</span>
					<span class="opt3">
					<input type="text" name="wfddsource" placeholder="推广渠道" value="<?php echo $_GET['wfddsource'];?>" class="layui-input">					
					</span>
				    <span class="opt2">
					<select name="wfpayment">
                        <option value="">- 付款方式 -</option>
						<option <?php if($_GET['wfpayment']=='cod'){echo 'selected ';}?>value="cod">货到付款</option>
						<option <?php if($_GET['wfpayment']=='alipay'){echo 'selected ';}?>value="alipay">支付宝付款</option>
						<option <?php if($_GET['wfpayment']=='weixin'){echo 'selected ';}?>value="weixin">微信付款</option>
						<option <?php if($_GET['wfpayment']=='ebank'){echo 'selected ';}?>value="ebank">网银付款</option>
						<option <?php if($_GET['wfpayment']=='scan'){echo 'selected ';}?>value="scan">扫码转账付款</option>
						<option <?php if($_GET['wfpayment']=='bank'){echo 'selected ';}?>value="bank">银行汇款</option>
                    </select>
					</span>
				    <span class="opt2">
					<select name="wfpaystatus">
                        <option value="">- 付款状态 -</option>
						<option <?php if($_GET['wfpaystatus']=='yes'){echo 'selected ';}?>value="yes">已支付</option>
						<option <?php if($_GET['wfpaystatus']=='no'){echo 'selected ';}?>value="no">未支付</option>
                    </select>
					</span>
				    <span class="opt2">
					<select name="wfddstatus">
                        <option value="">- 订单状态 -</option>
						<?php
						$wfstatusarr=(explode('|',$wfbase['statusopt']));
						foreach($wfstatusarr as $value){						
						?>
						<option <?php if($_GET['wfddstatus']==$value){echo 'selected ';}?>value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php
						}
						?>					
                    </select>
					</span>
				    <span class="opt2">
					<select name="wfismob">
                        <option value="">- 下单终端 -</option>
						<option <?php if($_GET['wfismob']=='wap'){echo 'selected ';}?>value="wap">手机端</option>
						<option <?php if($_GET['wfismob']=='pc'){echo 'selected ';}?>value="pc">电脑端</option>
                    </select>
					</span>	
					<span class="opt3">
					<button id="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe615;</i>搜索</button>
					</span>
                </form>
         		<?php }else{?>
                <form id="wfform" action="?" method="get" class="layui-form">
					<input type="hidden" name="action" value="search">
				    <span class="opt3">
					<select name="wfssopt">
                        <option value="">- 请选择 -</option>
                        <option<?php if($_GET['wfssopt']=='wfbuydate'){echo ' selected';}?> value="wfdate">订购时间</option>
                        <option<?php if($_GET['wfssopt']=='wfddno'){echo ' selected';}?> value="wfddno">订单号</option>
                        <option<?php if($_GET['wfssopt']=='wfproname'){echo ' selected';}?> value="wfproname">产品名称</option>
                        <option<?php if($_GET['wfssopt']=='wfproduct'){echo ' selected';}?> value="wfproduct">订购产品套餐</option>
                        <option<?php if($_GET['wfssopt']=='wfname'){echo ' selected';}?> value="wfname">姓名</option>
                        <option<?php if($_GET['wfssopt']=='wfmob'){echo ' selected';}?> value="wfmob">手机号</option>
                        <option<?php if($_GET['wfssopt']=='wfaddress'){echo ' selected';}?> value="wfaddress">收货地址</option>
                        <option<?php if($_GET['wfssopt']=='wfddstatus'){echo ' selected';}?> value="wfddstatus">订单状态</option>
                        <option<?php if($_GET['wfssopt']=='wfpayment'){echo ' selected';}?> value="wfpayment">付款方式</option>
                        <option<?php if($_GET['wfssopt']=='wfddsource'){echo ' selected';}?> value="wfddsource">推广渠道</option>
                        <option<?php if($_GET['wfssopt']=='WFLLURL'){echo ' selected';}?> value="WFLLURL">订单来源</option>
                        <option<?php if($_GET['wfssopt']=='wfipadd'){echo ' selected';}?> value="wfipadd">IP地址</option>
                        <option<?php if($_GET['wfssopt']=='wfkdno'){echo ' selected';}?> value="wfkdno">快递单号</option>						                        
                    </select>
					</span>
					<span class="opt6">
					<input type="text" name="wfssstr" value="<?php if(!empty($wfssstr)){echo $wfssstr;} ?>" placeholder="请输入关键字搜索" class="layui-input">					
					</span>
					<span class="opt1">
					<button id="wfsubmit" class="layui-btn"><i class="layui-icon white">&#xe615;</i>搜索</button>
					</span>
					<a href="?set=vipss" class="g">高级搜索 &gt;&gt;</a>
                </form>
				<?php }?>
            </div>		
            <div class="l">
			    <?php if($WFaccount->wfpowerchk($wfpower,'addorder')){?><button onclick="location.href='?set=add'" class="layui-btn layui-btn-sm"><i class="layui-icon white">&#xe608;</i>添加订单</button><?php }?>
			    <?php if($WFaccount->wfpowerchk($wfpower,'delorder')){?><button onclick="wflotdel('?action=dorr&isdel=1')" class="layui-btn layui-btn-sm layui-btn-danger"><i class="layui-icon white">&#xe640;</i>删除订单</button><?php }?>
			    <?php if($WFaccount->wfpowerchk($wfpower,'exselorder')){?><button onclick="wflotoperate('./wfexcel.php?action=select','请选择要导出的订单！')" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon white">&#xe603;</i>导出选择</button><?php }?>
			    <?php if($WFaccount->wfpowerchk($wfpower,'exallorder')){?><button onclick="location.href='./wfexcel.php?action=all'" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon white">&#xe603;</i>导出全部</button><?php }?>				
			    <?php if($WFaccount->wfpowerchk($wfpower,'chuliorder')){?><button onclick="wflotoperate('./wflotoper.php?set=ddstatus','请选择要更改状态的订单！')" class="layui-btn layui-btn-sm"><i class="layui-icon white">&#xe63f;</i>更改状态</button><?php }?>
			    <?php if($WFaccount->wfpowerchk($wfpower,'lotfahuo')){?><button onclick="wflotoperate('./wflotoper.php?set=savekdno','请选择要发货的订单！')" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon white">&#xe609;</i>批量发货</button><?php }?>			
				<button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm"><i class="layui-icon white">&#x1002;</i>刷新</button>
				<?php if($WFaccount->wfpowerchk($wfpower,'ddrecycle')){?><button onclick="location.href='?set=recycle&isdel=1'" class="layui-btn layui-btn-sm layui-btn-normal" style="float:right;"><i class="layui-icon white">&#xe640;</i>订单回收站</button><?php }?>
            </div>
        </div>
		<div class="clear"></div>	
		<blockquote class="layui-elem-quote">
		共查询到<em><?php echo $wfrows;?></em>笔订单　　
		<a href="?action=search&wfssopt=&wfssstr=&wfddate=1">【今日新订单】</a><em><?php echo $WFordermgmt->wfbuydatenum(date('Y-m-d')); ?></em>笔　　
		<a href="?action=search&wfssopt=wfddstatus&wfssstr=%E5%B7%B2%E5%8F%91%E8%B4%A7" class="b">【已发货】</a><em><?php echo $WFordermgmt->wfstatusnum('已发货'); ?></em>笔　　
		<a href="?action=search&wfssopt=wfddstatus&wfssstr=%E5%B7%B2%E7%AD%BE%E6%94%B6" class="g">【已签收】</a><em><?php echo $WFordermgmt->wfstatusnum('已签收'); ?></em>笔　　
		<a href="?action=search&wfssopt=wfddstatus&wfssstr=%E6%8B%92%E6%94%B6" class="r">【拒收】</a><em><?php echo $WFordermgmt->wfstatusnum('拒收'); ?></em>笔　　
		<a href="?action=search&wfssopt=wfddstatus&wfssstr=%E6%9C%AA%E5%A4%84%E7%90%86">【未处理】</a><em><?php echo $WFordermgmt->wfstatusnum('未处理'); ?></em>笔　　
		<a href="./wfcount.php?set=chkrpt" class="g">【重复订单检测】</a>
		</blockquote>		
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="4%"><input type="checkbox" id="all"></td>
				<?php
				$fres=$WFordermgmt->wfshowfield();			
				while($frow=$fres->fetch_array()){
					if($wfbase['ddlistopt'][$frow['Field']]){
				?>
				<td width="7%"><?php echo $frow['Comment']; ?></td>
				<?php
				}}
				?>
                <td width="6%">处理</td>
                <td width="6%">操作</td>
            </tr>
            <?php 
			while($row=$res->fetch_array()){
			?>
            <tr align="center" class="trbg<?php if(strstr($row[2],date('Y-m-d'))){echo ' today';}?>">
                <td><input type="checkbox" name="wflist" value="<?php echo $row[0];?>"></td>
				<?php
				$fres=$WFordermgmt->wfshowfield();			
				while($frow=$fres->fetch_array()){
					if($wfbase['ddlistopt'][$frow['Field']]){
				?>
				<td><?php echo $row[$frow['Field']]?$row[$frow['Field']]:'-';if($frow['Field']=='wfkdno'&&$row['wfkdno']){echo '<br><a href="javascript:;" onClick="wfquekuaidi(\''.$row['wfddno'].'\',\''.$row['wfkuaidi'].'\',\''.$row['wfkdno'].'\')" class="wfgetkd b">查询物流</a>';} ?></td>
				<?php
				}}
				?>
	            <td>   
					<select id="wfddstatus<?php echo $row[0];?>" onChange="wfgetopt('?action=ddsource&id=<?php echo $row[0];?>',<?php echo $row[0];?>)"<?php if(!$WFaccount->wfpowerchk($wfpower,'chuliorder')){echo ' disabled';}?>>
						<option value="">- 请选择 -</option>
						<?php
						$wfstatusarr=(explode('|',$wfbase['statusopt']));
						foreach($wfstatusarr as $value){
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
						?>
					</select>
                </td>
                <td>
					<?php if($WFaccount->wfpowerchk($wfpower,'showorder')){?><button onclick="location.href='?set=ddinfo&id=<?php echo $row[0]; ?>'" class="layui-btn layui-btn-xs layui-btn-normal" style="margin:5px 0;"><i class="layui-icon">&#xe60a;</i>详情</button><?php }?>
					<?php if($WFaccount->wfpowerchk($wfpower,'delorder')){?><button onclick="wfdeldata('?action=dorr&isdel=1&lot=0&id=<?php echo $row[0]; ?>')" class="layui-btn layui-btn-xs layui-btn-danger" style="margin:5px 0;"><i class="layui-icon">&#xe640;</i>删除</button><?php }?>
				</td>
            </tr>
            <?php }?>
        </table>
		<div id="wfkddata" class="wfkddata" style="display:none;"></div>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".wfgetkd").click(function(){				
				layer.open({
					type:1,
					title:'物流信息',
					shadeClose:true,
					shade:0.1,
					shadeClose:true,
					area:['650px','400px'],
					content:$('#wfkddata'),
				});		
			});			
		})
		</script>
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>	
    </div>
	<?php }?>
</div>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
<script type="text/javascript" src="./images/wftable.js"></script>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>