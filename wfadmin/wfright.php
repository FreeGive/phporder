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
require '../wfpublic/WFmhead.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfright</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
<script type="text/javascript" src="./images/wfnews.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <div class="wfmain">
		<fieldset class="layui-elem-field">
			<legend>欢迎使用</legend>
			<div class="layui-field-box" align="right">
				<i class="layui-icon orange">&#xe60c;</i>亲爱的用户，您在使用过程中有任何问题请随时<a href="http://www.wforder.com/about/?id=4" class="g" target="_blank">【联系我们】</a>，WFPHP官方唯一客服QQ183712356
			</div>
		</fieldset>	
		<?php if($_COOKIE['wfcopyright']=='pjcxtzsqj'){?>
		<?php if(defined('WFPHPSAC')){?>
		<blockquote class="layui-elem-quote layui-quote-nm green"><i class="layui-icon">&#x1005;</i>当前系统已激活（版本：<?php echo WFsetsys::WFVERSION; ?>） &nbsp;&nbsp;&nbsp; <span class="red" id="wfversion"></span></blockquote>		
		<fieldset class="layui-elem-field">
			<legend>系统提醒</legend>
			<div class="layui-field-box">
				<?php				
				if(basename(dirname(__FILE__))=='wfadmin'||$adminarr[2]=='02be149924f074fb2eeb'||file_exists(WFORDER.'/wfdata/EMAILERROR.txt')||file_exists(WFORDER.'/wfdata/SMSERROR.txt')){		
					if(basename(dirname(__FILE__))=='wfadmin'){
						echo "<p class=\"red\">　● 检查到当前系统后台管理地址是默认的，为安全起见请及时修改。<a href='./wfconfig.php?set=adminurl' class='g'>【更改后台管理地址】</a></p>";	
					}
					if($adminarr[2]=='02be149924f074fb2eeb'){
						echo "<p class=\"red\">　● 检查到当前系统后台管理员密码是默认的，为安全起见请及时修改。<a href='./wfconfig.php?set=adminpw' class='g'>【更改后台登陆密码】</a></p>";						
					}						
					if(file_exists(WFDATA.'/error/EMAILERROR.txt')){
						echo "<p class=\"red\">　● 邮件发送失败，请检查<a href='wfconfig.php?set=mail' class='g'>【邮件发送设置】</a> <a href='../wfdata/error/EMAILERROR.txt' class='g'>【查看错误代码】</a></p>";
					}					
					if(file_exists(WFDATA.'/error/SMSERROR.txt')){
						echo "<p class=\"red\">　● 短信发送失败，请检查<a href='wfconfig.php?set=sms' class='g'>【短信发送设置】</a> <a href='../wfdata/error/SMSERROR.txt' class='g'>【查看错误代码】</a></p>";
					}
				}
				else{
					echo '<p align="center" class="green">非常棒，暂时没有发现问题！</p>';
				}
				?>
			</div>
		</fieldset>
		<fieldset class="layui-elem-field">
			<legend>官方消息</legend>
			<div id="wfnews" class="layui-field-box"></div>
		</fieldset>
		<?php }else{?>
		<fieldset class="layui-elem-field layui-field-title"><legend>激活系统</legend></fieldset>
		<form id="wfform" action="?action=activate" method="post" class="layui-form layui-form-pane">
			<div class="layui-form-item">
				<label class="layui-form-label">系统激活码</label>
				<div class="layui-input-inline">
					<input type="text" name="wfactivationcode" lay-verify="required" placeholder="请填写激活码" class="layui-input">
				</div><button lay-submit lay-filter="wfsubmit" class="layui-btn layui-btn-normal">立即激活</button>
			</div>
		</form>
        <?php }?>
        <?php }else{?>
		<script type="text/javascript">
		layui.use('layer',function(){
			var $=layui.jquery,
			layer=layui.layer;
			layer.ready(function(){
				layer.open({
					type:1,
					title:'<?php echo $WFaccount->wflang['copyright']; ?>',
					shadeClose:true,
					shade:0.1,
					shadeClose:false,
					area:['650px','400px'],
					content:$('#wfcopyright'),
					cancel:function(){
						layer.msg('<?php echo $WFaccount->wflang['closecopyright']; ?>',{icon:5});
						return false;
					}
				}); 
			});
		});
		</script>
		<div id="wfcopyright" class="wfcopyright">
		<form id="wfform" action="?action=copyright" method="post"> 
			<p>　　<font color="#FF0000">版权声明一：</font>WFPHP订单系统版权属于WFPHP订单系统开发者WENFEI所有。WFPHP订单系统目录名为"wforder"，而且wforder目录下所有的子目录名、文件名、CSS文件里的class名、JS文件里的变量名、函数名、PHP文件里的类名、变量名、函数名都是以"wf"打头，整个系统源文件共有6629处出现"wf"字样。（声明：以下所提到的"此系统"都代表"WFPHP订单系统"）</p>
			<p>　　<font color="#FF0000">版权声明二：</font>凡是破解此系统者、二次盗卖此系统者在三日内必出车祸死于非命，五日内其父母必得绝症不治身亡，七日内老婆儿女将意外身亡，总之破解此系统者、盗卖此系统者全家都不得好死，很灵验的！地球人都信这个，不信就试试吧！</p>
			<p>　　<font color="#FF0000">版权声明三：</font>破解此系统死全家！盗卖此系统者死全家！唆使别人破解此系统者死全家！把此系统发给别人破解者死全家！人在做，天在看，相信一切皆有报应！</p>
			<p style="color:#060;">　　免责声明：用户因违反系统版权而引发的一切意外后果自负，与本系统开发者没有任何关系，特此声明！</p>
			<p style="color:#F00;margin-bottom:15px;">　　<input name="wfcopyright" type="checkbox" value="ok" style="vertical-align:middle;"> 我是此系统的使用者，我现在郑重发誓：如果我破解此系统、如果我修改此系统中的加密文件、如果我盗卖此系统、如果我违反上述版权声明，我出门就被车撞死，我全家都不得好死！</p>
			<p align="center"><button lay-submit lay-filter="wfsubmit" class="layui-btn layui-btn-sm layui-btn-danger">我自愿接受以上版权声明并同意发誓 （以后不再弹出）</button></p>
		</form> 
		</div>
        <?php }?>
	</div>
</div>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>