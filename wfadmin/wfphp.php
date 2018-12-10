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
error_reporting(0);
date_default_timezone_set('PRC');
ini_set('default_charset','utf-8');
function _GET($n){
	return isset($_GET[$n])?$_GET[$n]:NULL;
}
function _SERVER($n){
	return isset($_SERVER[$n])?$_SERVER[$n]:'[undefine]';
}
function memory_usage(){
	$memory=(!function_exists('memory_get_usage'))?'0':round(memory_get_usage()/1024/1024,2).'MB';
	return $memory;
}
function micro_time_float(){
	$mtime=microtime();
	$mtime=explode(' ',$mtime);
	return $mtime[1]+$mtime[0];
}
define('YES','<span class="green">已开启</span>');
define('NO','<span class="red">未开启</span>');
$Info=array();
$Info['php_ini_file']=function_exists('php_ini_loaded_file')?php_ini_loaded_file():'[undefine]';
$up_start=micro_time_float();
if (_GET('act')=='phpinfo'){
	if (function_exists('phpinfo'))phpinfo();
	else echo 'phpinfo禁用！';
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WFPHP探针</title>
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
.wfmain table.tz{border-right:1px solid #E2E2E2;border-bottom:1px solid #E2E2E2;}
.tit{text-align:center;font-weight:bold;color:#FFF;background:#33ADFF;}
.el{text-align:center;}
.er{text-align:right;background:#E6E6E6;}
.fl{text-align:left;background:#F2F2F2;}
.fr{text-align:right;background:#F2F2F2;}
.fc{text-align:center;background:#F2F2F2;}
</style>
</head>
<body>
<div class="wfmain">
<table width="100%" class="tz">
	<tr>
		<td colspan="2" class="tit" width="50%">服务器信息</th>
		<td colspan="2" class="tit" width="50%">PHP功能组件开启状态</th>
	</tr>
	<tr>
		<td class="er" width="12%">服务器域名/IP</td>
		<td class="fl" width="38%"><?php echo get_current_user().' / '._SERVER('SERVER_NAME'). ' / '.GetHostByName(_SERVER('SERVER_NAME')).':'._SERVER('SERVER_PORT')?></td>
		<td class="er" width="20%">MySQLi Client组件</td>
		<td class="fc" width="30%"><?php echo get_extension_funcs('mysqli')?YES:NO; ?></td>
	</tr>
	<tr>
		<td class="er" width="12%">服务器标识</td>
		<td class="fl" width="38%"><?php if($sysInfo['win_n']!=''){echo $sysInfo['win_n'];}else{echo php_uname();}?></td>
		<td class="er" width="20%">SMTP</td>
		<td class="fc" width="30%"><?php echo get_cfg_var('SMTP')?YES:NO; ?></td>
	</tr>
	<tr>
		<td class="er" width="12%">服务器操作系统</td>
		<td class="fl" width="38%"><?php $os=explode(" ",php_uname());echo $os[0];?> / 内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>
		<td class="er" width="20%">Session支持</td>
		<td class="fc" width="30%"><?php echo function_exists('session_start')?YES:NO;?></td>
	</tr>
	<tr>
		<td class="er" width="12%">服务器主机名</td>
		<td class="fl" width="38%"><?php $os=explode(" ",php_uname());if('/'==DIRECTORY_SEPARATOR){echo $os[1];}else{echo $os[2];}?></td>
		<td class="er" width="20%">Cookie支持</td>
		<td class="fc" width="30%"><?php echo isset($_COOKIE)?YES:NO;?></td>
	</tr>
	<tr>
		<td class="er">服务器端口</td>
		<td class="fl"><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
		<td class="er">cURL组件</td>
		<td class="fc"><?php echo get_extension_funcs('curl')?YES:NO; ?></td>   
	</tr>
	<tr>
		<td class="er">服务器环境</td>
		<td class="fl"><?php echo _SERVER('SERVER_SOFTWARE'); ?></td>
		<td class="er">GD库</td>
		<td class="fc"><?php if(function_exists('gd_info')){$gdarr=gd_info();echo YES.' / '.$gdarr['GD Version'];}else{echo NO;} ?></td>    
	</tr>
	<tr>
		<td class="er">PHP运行环境</td>
		<td class="fl"><?php echo PHP_SAPI.'/PHP/'.PHP_VERSION; ?></td>
		<td class="er">EXIF信息查看组件</td>
		<td class="fc"><?php echo get_extension_funcs('exif')?YES:NO; ?></td>   
	</tr>
	<tr>
		<td class="er">PHP配置文件</td>
			<td class="fl"><?php echo htmlentities($Info['php_ini_file'])?></td>
			<td class="er">OpenSSL协议组件</td>
			<td class="fc"><?php echo get_extension_funcs('openssl')?YES:NO; ?></td>   
		</tr>
	<tr>
	<td class="er">当前网站目录</td>
		<td class="fl"><?php echo htmlentities(_SERVER('DOCUMENT_ROOT')); ?></td>
		<td class="er">Mcrypt加密处理组件</td>
		<td class="fc"><?php echo get_extension_funcs('mcrypt')?YES:NO; ?></td>
	</tr>
	<tr>
		<td class="er">服务器时间</td>
		<td class="fl"><?php echo gmdate('Y-m-d H:i:s',time()+3600*8); ?></td>
		<td class="er" >IMAP电子邮件函数库</td>
		<td class="fc"><?php echo get_extension_funcs('imap')?YES:NO; ?></td>
	</tr>
	<tr>
		<td class="er">查看PHPINFO</td>
		<td class="fl"><a href="?act=phpinfo" target="_blank">PHPINFO详细信息</a></td>
		<td class="er">SendMail电子邮件支持</td>
		<td class="fc"><?php echo get_extension_funcs('standard')?YES:NO; ?></td>
	</tr>
</table>
<table width="100%" class="tz">
	<tr>
		<td colspan="3" class="tit" width="50%">PHP Zend解密组件</td>
		<td colspan="3" class="tit" width="50%">PHP 缓存优化组件</td>
	</tr>
	<tr>
		<td class="el">Zend Optimizer</td>
		<td class="el">Zend GuardLoader</td>
		<td class="el">ionCubeLoader</td>
		<td class="el">XCache</td>
		<td class="el">Zend OPcache</td>
		<td class="el">Memcache</td>
	</tr>
	<tr>
		<td class="fc"><?php echo get_extension_funcs('Zend Optimizer')?YES.'/'.OPTIMIZER_VERSION:NO; ?></td>
		<td class="fc"><?php echo get_extension_funcs('Zend Guard Loader')?YES:NO; ?></td>
		<td class="fc"><?php echo get_extension_funcs('ionCube Loader')?YES:NO; ?></td>
		<td class="fc"><?php echo get_extension_funcs('XCache')?YES:NO; ?></td>
		<td class="fc"><?php echo get_extension_funcs('Zend OPcache')?YES:NO; ?></td>
		<td class="fc"><?php echo get_extension_funcs('memcache')?YES:NO; ?></td>
	</tr>
</table>
<table width="100%" class="tz">
	<tr>
		<td colspan="6" class="tit" width="100%">PHP重要参数检测</td>
	</tr>
	<tr>
		<td class="el">Memory限制</td>
		<td class="el">Upload限制</td>
		<td class="el">POST限制</td>
		<td class="el">Execution超时</td>
		<td class="el">Input超时</td>
		<td class="el">Socket超时</td>
	</tr>
	<tr>
		<td class="fc"><?php echo ini_get('memory_limit'); ?></td>
		<td class="fc"><?php echo ini_get('upload_max_filesize'); ?></td>
		<td class="fc"><?php echo ini_get('post_max_size'); ?></td>
		<td class="fc"><?php echo ini_get('max_execution_time').'s'; ?></td>
		<td class="fc"><?php echo ini_get('max_input_time').'s'; ?></td>
		<td class="fc"><?php echo ini_get('default_socket_timeout').'s'; ?></td>
	</tr>
</table>
<table width="100%" class="tz">
	<tr>
		<td class="tit">PHP已编译模块检测</th>
	</tr>
	<tr>
		<td class="fl" style="text-align:center;"><?php $able=get_loaded_extensions();foreach($able as $key=>$value){if ($key!=0&&$key%13==0){echo '';}else{echo $value.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}}?></td>
	</tr>
</table>
<form method="post" action="<?php htmlentities($_SERVER['PHP_SELF'])?>">
<table width="100%" class="tz">
	<tr>
		<td colspan="4" class="tit">数据库连接测试</th>
	</tr>
	<tr>
		<td width="25%" class="er">数据库服务器</td>
		<td width="25%" class="fl"><input type="text" name="mysqlHost" value="localhost" /></td>
		<td width="25%" class="er">数据库数据名称</td>
		<td width="25%" class="fl"><input type="text" name="mysqlDb" value="test" /></td>
	</tr>
	<tr>
		<td class="er">数据库用户名</td>
		<td class="fl"><input type="text" name="mysqlUser" value="root" /></td>
		<td class="er">数据库用户密码</td>
		<td class="fl"><input type="text" name="mysqlPassword" /></td>
	</tr>
	<tr>
		<td colspan="4" align="center"><input type="submit" value="连接测试" name="act" style="width:200px; height:25px;line-height:25px;" /></td>
	</tr>
</table>
</form>
<?php if(isset($_POST['act'])) {?>
<table width="100%" class="tz">
	<tr>
		<td colspan="4" class="tit">数据库测试结果</th>
	</tr>
	<?php
	$link=mysqli_connect($_POST['mysqlHost'],$_POST['mysqlUser'], $_POST['mysqlPassword']);
	$errno=mysqli_connect_errno();
	if($link)$str1='<span class="green">连接正常</span>('.mysqli_get_server_info($link).')';
	else $str1='<span class="red">连接错误</span><br />'.mysqli_connect_error();
	?>
	<tr>
		<td colspan="2" class="er" width="50%"><?php echo $_POST['mysqlHost']; ?></td>
		<td colspan="2" class="fl" width="50%"><?php echo $str1; ?></td>
	</tr>
	<tr>
		<td colspan="2" class="er">数据库<?php echo $_POST['mysqlDb']?></td>
		<td colspan="2" class="fl"><?php echo (mysqli_select_db($link,$_POST['mysqlDb']))?'<span class="green">访问正常</span>':'<span class="red">访问错误</span>'?></td>
	</tr>
</table>
<?php }?>
<p>页面执行时间 <?php echo sprintf('%0.6f', micro_time_float()-$up_start); ?> 秒，消耗内存 <?php echo memory_usage();?></p>
</div>
</body>
</html>