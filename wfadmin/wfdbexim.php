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
header("Content-Encoding: none\r\n");
ob_start();
require '../wfpublic/WFahead.php';
require WFPUBLIC.'/WFdbexim.php';
$WFdbexim=new WFdbexim();
$action=!empty($_GET['action'])?$_GET['action']:'';
$set=!empty($_GET['set'])?$_GET['set']:'';
$sqlfile=!empty($_GET['sqlfile'])?$_GET['sqlfile']:'';
switch($action){
	case 'ex':
	$WFdbexim->wfdbexport();
	break;
	case 'im':
	$WFdbexim->wfdbimport($sqlfile);
	exit;
	break;
	case 'del':
	$WFdbexim->wfdbdelete($sqlfile);
	break;
	default:
	break;
}
ob_end_flush();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfdbexim</title>
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
    <?php if($set=='ex'){?>
    <div class="wfmain">
        <fieldset class="layui-elem-field layui-field-title"><legend>数据库备份</legend></fieldset>
        <div id="showmsg" style="text-align:center;margin-bottom:30px;"><button onClick="loadiframe('?set=ex&action=ex','400px')" class="layui-btn"> <i class="layui-icon">&#xe618;</i>点击一键备份数据库 </button></div>
		<blockquote class="layui-elem-quote"><span class="red">注意：</span>数据库要记得定期备份一下哦！</blockquote>	   
    </div>
    <?php
	}elseif($set=='im'){
	?>
    <div class="wfmain">
        <fieldset class="layui-elem-field layui-field-title"><legend>数据库恢复</legend></fieldset>
        <div class="wffun">
            <div class="l">
			    <button onclick="location.href='?set=ex'" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe608;</i>备份</button>
			    <button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm" ><i class="layui-icon">&#x1002;</i>刷新</button>
            </div>
        </div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="30%">数据库备份文件</td>
                <td width="20%">文件大小</td>
                <td width="20%">备份日期</td>
                <td width="30%">操作</td>
            </tr>
            <?php 
            if($dh=opendir(WFDATA.'/backup')){
                while(($file=readdir($dh))!==false){
                    if($file!='.'&&$file!='..'){                    
            ?>
            <tr align="center" class="trbg">
                <td><?php echo $file; ?></td>
                <td><?php echo round(filesize(WFDATA.'/backup/'.$file)/1024,2); ?> KB</td>
                <td><?php echo date("Y-m-d H:i",filemtime(WFDATA.'/backup/'.$file)); ?></td>
				<td>
					<button onClick="loadiframe('?set=im&action=im&sqlfile=<?php echo $file; ?>','400px')" class="layui-btn layui-btn-xs layui-btn-danger"><i class="layui-icon">&#xe603;</i>恢复</button>
					<button onclick="wfdeldata('?action=del&sqlfile=<?php echo $file; ?>')" class="layui-btn layui-btn-xs"><i class="layui-icon">&#xe640;</i>删除</button>
				</td>
            </tr>
            <?php
                }}}closedir($dh);
            ?>
        </table>
		<blockquote class="layui-elem-quote"><span class="red">注意：</span>恢复数据库将清空之前的数据，请慎重！</blockquote>
    </div>
    <?php
	}else{
	?>
    <div class="wfmain">
        <fieldset class="layui-elem-field layui-field-title"><legend>换服务器步骤</legend></fieldset>
		<blockquote class="layui-elem-quote layui-quote-nm">
			<p>　　第一步：在原后台备份数据库，操作方法：点击【数据备份】-【数据库备份】。</p>
			<p>　　第二步：在FTP里下载已备份订单系统，操作方法：连接FTP下载整个【wforder】目录保存到你本地电脑上。</p>
			<p>　　第三步：把第二步中下载的【wforder】目录上传到新空间里，然后再安装订单系统。</p>
			<p>　　第四步：在新后台恢复数据库，操作方法：点击【数据备份】-【数据库恢复】。</p>
			<p>　　OK！换服务器顺利完成（整个系统所有数据都完整无损）</p>
		</blockquote>
		<blockquote class="layui-elem-quote"><span class="red">注意：</span>【wfdata】目录非常重要，在换服务器前一定要把这个目录备份下，其它可以不备份。</blockquote>
    </div>
    <?php	   
	}
	?>
</div>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>