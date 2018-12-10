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
require WFPUBLIC.'/WFpages.php';
$id=!empty($_GET['id'])?$WFaccount->wfverify($_GET['id']):'';
$lot=!empty($_GET['lot'])?$WFaccount->wfverify($_GET['lot']):'';
$guser=!empty($_GET['user'])?$WFaccount->wfverify($_GET['user']):'';
$nextpage=!empty($_GET['p'])?intval($_GET['p']):'1';
$startrow=($nextpage-1)*$wfbase['logpagesize'];
if($_GET['set']=='adminlog'){ //日志
	if($_GET['user']){
		$wfrows=$WFaccount->wfuserlogrows($guser);
		$WFpages=new WFpages('wfaccount.php',$wfrows,$wfbase['logpagesize']);
		$res=$WFaccount->wfuserlogquery($guser,$startrow,$wfbase['logpagesize']);
	}else{
		$islogin=!empty($_GET['islogin'])?true:false;
		$wfrows=!empty($_GET['islogin'])?$WFaccount->wflogrows():$WFaccount->wfrows('wfadminlogs');
		$WFpages=new WFpages('wfaccount.php',$wfrows,$wfbase['logpagesize']);
		$res=$WFaccount->wflogquery($islogin,$startrow,$wfbase['logpagesize']);
	}
}elseif($_GET['set']=='admin'){ //管理员
	$wfadminuse=!empty($_POST['wfadmin'])?$WFaccount->wfverify(trim($_POST['wfadmin'])):'';
	$wfadminpwd=!empty($_POST['wfpassword'])?trim($_POST['wfpassword']):'';
	$wfadminname=!empty($_POST['wfadminname'])?$WFaccount->wfverify(trim($_POST['wfadminname'])):'';
	$wfadmingroup=!empty($_POST['wfadmingroup'])?$WFaccount->wfverify($_POST['wfadmingroup']):'';
	if($_GET['action']=='addadmin'){ //添加管理员
		$WFaccount->wfaddadmin($wfadminuse,$wfadminpwd,$wfadminname,$wfadmingroup,date('Y-m-d H:i:s'));		
	}elseif($_GET['action']=='deladmin'&&$id!=1){ //删除管理员
		$WFaccount->wfdeldata('wfadmin',$id,$lot,$WFaccount->wflang['deltrue'],'./wfaccount.php?set=admin',$WFaccount->wflang['deladmin'].$id);
	}elseif($_GET['action']=='editadmin'){ //修改管理员
		$WFaccount->wfeditadmin($id,$wfadminpwd,$wfadminname,$wfadmingroup);
	}else{
		$wfrows=$WFaccount->wfrows('wfadmin');
		$WFpages=new WFpages('wfaccount.php',$wfrows,$wfbase['logpagesize']);
		$res=$WFaccount->wfquerytab('wfadmin',$startrow,$wfbase['logpagesize']);
	}
}elseif($_GET['set']=='admingroup'){ //权限组
	$wfgroupname=!empty($_POST['wfgroupname'])?$WFaccount->wfverify(trim($_POST['wfgroupname'])):'';
	$wfgrouppower=!empty($_POST['wfgrouppower'])?$WFaccount->wfverify($_POST['wfgrouppower']):'';
	$wflicensepro=!empty($_POST['wflicensepro'])?$WFaccount->wfverify($_POST['wflicensepro']):'';
	$wfgrouppower=json_encode($wfgrouppower);
	$wflicensepro=implode(',',$wflicensepro);	
	if($_GET['action']=='addadmingroup'){ //添加权限组
		$WFaccount->wfaddadmingroup($wfgroupname,$wfgrouppower,$wflicensepro);
	}elseif($_GET['action']=='deladmingroup'){ //删除权限组
		$WFaccount->wfdeldata('wfadmingroup',$id,$lot,$WFaccount->wflang['deltrue'],'./wfaccount.php?set=admingroup',$WFaccount->wflang['deladmingroup'].$id);
	}elseif($_GET['action']=='editadmingroup'){ //修改权限组
		$wfeditadmingroupres=$WFaccount->wfeditadmingroup($id,$wfgroupname,$wfgrouppower,$wflicensepro);
	}else{
		$wfrows=$WFaccount->wfrows('wfadmingroup');
		$WFpages=new WFpages('wfaccount.php',$wfrows,$wfbase['logpagesize']);
		$res=$WFaccount->wfquerytab('wfadmingroup',$startrow,$wfbase['logpagesize']);
	}
}
?>        
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>wfaccount</title>
<meta name="generator" content="WFPHP订单系统">
<meta name="author" content="系统开发者：WENFEI QQ：183712356">
<meta name="copyright" content="WFPHP订单系统官网：WFORDER.COM">
<link href="../wfpublic/layui/css/layui.css" rel="stylesheet" type="text/css">
<link href="./images/wfstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../wfpublic/js/wfjqs.js"></script>
<script type="text/javascript" src="../wfpublic/layui/layui.js"></script>
</head>
<body oncontextmenu="return false">
<div class="wfright">
    <?php if($_GET['set']=='adminlog'){?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>管理员操作日志</legend></fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm"><i class="layui-icon orange">&#xe60b;</i>共查询到 <?php echo $wfrows;?> 条记录　　<a href='./wfaccount.php?set=adminlog&islogin=1' class="b">【只显示登录系统日志】</a></blockquote>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="10%">ID</td>
                <td width="20%">管理员</td>
                <td width="20%">时间</td>
                <td width="25%">登录IP</td>
                <td width="25%">操作</td>
            </tr>
            <?php
            while($row=$res->fetch_row()){
			?>
            <tr align="center">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
            </tr>
            <?php }?>
        </table> 
        <div style="height:48px;"></div>             
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage();?></li></ul></div>
    </div>	
    <?php
	}elseif($_GET['set']=='admin'){
		if($_GET['show']=='addadmin'){
	?>
    <div class="wfmain"> 
		<fieldset class="layui-elem-field layui-field-title"><legend>添加管理员</legend></fieldset>        
        <form id="wfform" action="?set=admin&action=addadmin" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>用户名</label>
				<div class="layui-input-inline">
					<input type="text" name="wfadmin" lay-verify="user" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写管理员登录帐号 （6~16个字母或数字）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>密码</label>
				<div class="layui-input-inline">
					<input type="password" id="wfpassword1" name="wfpassword" lay-verify="password" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请确认管理员登录密码 （6~16个任意字符）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>确认密码</label>
				<div class="layui-input-inline">
					<input type="password" name="wfpasswordtrue" lay-verify="wfpassword2" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请确认管理员登录密码 （6~16个任意字符）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>管理员姓名</label>
				<div class="layui-input-inline">
					<input type="text" name="wfadminname" lay-verify="name" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写管理员姓名 （2~6个汉字）</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>所属权限组</label>
				<div class="layui-input-inline">					
					<select name="wfadmingroup" lay-verify="required">
						<option value="">----- 请选择 -----</option>
						<?php					
						$res=$WFaccount->wfquerytab('wfadmingroup',$startrow,$wfbase['logpagesize']);                            
						while($row=$res->fetch_row()){ ?>
						<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
						<?php }?>
					</select>					
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请选择管理员权限</div>
			</div>	
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即添加</button>
				</div>
			</div>
        </form>
    </div>    
    <?php
	    }elseif($_GET['show']=='editadmin'){
			$wfadmininfo=$WFaccount->wfqueinfo('wfadmin',$id);
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>修改管理员</legend></fieldset>        
        <form id="wfform" action="?set=admin&action=editadmin&id=<?php echo $wfadmininfo[0]; ?>" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label">用户名</label>
				<div class="layui-input-inline">
					<span class="layui-text"><?php echo $wfadmininfo[1]; ?></span>
				</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">创建时间</label>
				<div class="layui-input-inline">
					<span class="layui-text"><?php echo $wfadmininfo[5]; ?></span>
				</div>
			</div>			
		    <div class="layui-form-item">
			    <label class="layui-form-label">密码</label>
				<div class="layui-input-inline">
					<input type="password" id="wfpassword1" name="wfpassword" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如不修改，请留空 （6~16个任意字符）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label">确认密码</label>
				<div class="layui-input-inline">
					<input type="password" name="wfpasswordtrue" lay-verify="wfpassword2" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>如不修改，请留空 （6~16个任意字符）</div>
			</div>
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>管理员姓名</label>
				<div class="layui-input-inline">
					<input type="text" name="wfadminname" value="<?php echo $wfadmininfo[3]; ?>" lay-verify="name" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写管理员姓名 （2~6个汉字）</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><em>*</em>所属权限组</label>
				<div class="layui-input-inline">					
					<select name="wfadmingroup" lay-verify="required">
						<option value="">----- 请选择 -----</option>
						<?php					
						$res=$WFaccount->wfquerytab('wfadmingroup',$startrow,$wfbase['logpagesize']);                            
						while($row=$res->fetch_row()){ ?>
						<option value="<?php echo $row[0]; ?>"<?php if($row[0]==$wfadmininfo[4]){echo ' selected';}?>><?php echo $row[1]; ?></option>
						<?php }?>
					</select>					
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请选择管理员权限</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即修改</button>
				</div>
			</div>
        </form>
    </div>
    <?php
	    }else{
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>管理员设置</legend></fieldset>        
        <div class="wffun">
            <div class="l">
			    <button onclick="location.href='?set=admin&show=addadmin'" class="layui-btn layui-btn-sm"><i class="layui-icon white">&#xe608;</i>添加</button>
			    <button onclick="wflotdel('?set=admin&action=deladmin')" class="layui-btn layui-btn-sm layui-btn-danger"><i class="layui-icon white">&#xe640;</i>删除</button>
			    <button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm" ><i class="layui-icon white">&#x1002;</i>刷新</button>
            </div>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="5%"><input type="checkbox" id="all"></td>
                <td width="6%">ID</td>
                <td width="12%">管理员帐号</td>
                <td width="12%">管理员姓名</td>
                <td width="13%">权限组</td>
                <td width="14%">最后登录时间</td>
                <td width="10%">登录次数</td>
                <td width="12%">最后登录IP</td>
                <td width="16%">操作</td>
            </tr>
            <?php
            while($row=$res->fetch_row()){
				$wfadmingroupinfo=$WFaccount->wfqueinfo('wfadmingroup',$row[4]);
			?>
            <tr align="center" class="trbg">
                <td><?php if($row[0]!=1){echo '<input type="checkbox" name="wflist" value="'.$row[0].'">';}?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $wfadmingroupinfo[1]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?>次</td>
                <td><?php echo $row[8]; ?></td>
                <td><button onclick="location.href='?set=adminlog&user=<?php echo $row[1]; ?>'" class="layui-btn layui-btn-xs layui-btn-normal"><i class="layui-icon white">&#xe63c;</i>操作日志</button><button onclick="<?php if($row[0]==1){echo "location.href='./wfconfig.php?set=adminpw'";}else{echo "location.href='?set=admin&show=editadmin&id=".$row[0]."'";}?>" class="layui-btn layui-btn-xs layui-btn-danger"><i class="layui-icon white">&#xe642;</i>修改</button></td>
            </tr>
            <?php
            }
			?>
        </table>
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>
    </div>		    
    <?php
	}}elseif($_GET['set']=='admingroup'){
		if($_GET['show']=='addadmingroup'){
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>添加权限组</legend></fieldset>        
        <form id="wfform" action="?set=admingroup&action=addadmingroup" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>权限组名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wfgroupname" lay-verify="required" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写权限组名称 （3~16个任意字符）</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">权限列表</label>
				<div class="layui-input-block">
					<?php					
					foreach($wffunlist as $key=>$value){
						switch($key){
							case 'p':
							echo '<div style="margin-top:6px;">产品管理</div>';
							break;
							case 't':
							echo '<div style="margin-top:6px;">模板管理</div>';
							break;
							case 'o':
							echo '<div style="margin-top:6px;">订单管理</div>';
							break;
							case 'c':
							echo '<div style="margin-top:6px;">系统管理</div>';
							break;							
							default:
							echo '<div style="margin-top:6px;">数据备份</div>';							
						}						
						foreach($value as $key2=>$value2){
					?>
					<input type="checkbox" name="wfgrouppower[<?php echo $key2; ?>]" title="<?php echo $value2; ?>">
					<?php
					}}
					?>
					<div style="margin-top:6px;">授权产品</div>			
					<?php
					$res=$WFaccount->wfqueryall('wfproduct');
					while($row=$res->fetch_row()){
					?>			
					<input type="checkbox" checked name="wflicensepro[]" title="<?php echo $row[1]; ?>" value="<?php echo $row[0]; ?>">
                    <?php
                    }
                    ?>		
				</div>
			</div>			
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即添加</button>
				</div>
			</div>
        </form>
    </div>    
    <?php
	    }elseif($_GET['show']=='editadmingroup'){
			$wfadmingroupinfo=$WFaccount->wfqueinfo('wfadmingroup',$id);
			$wfpowerarr=json_decode($wfadmingroupinfo[2],true);
	?>
    <div class="wfmain">
		<fieldset class="layui-elem-field layui-field-title"><legend>修改权限组</legend></fieldset>        
        <form id="wfform" action="?set=admingroup&action=editadmingroup&id=<?php echo $wfadmingroupinfo[0]; ?>" method="post" class="layui-form">
		    <div class="layui-form-item">
			    <label class="layui-form-label"><em>*</em>权限组名称</label>
				<div class="layui-input-inline">
					<input type="text" name="wfgroupname" lay-verify="required" value="<?php echo $wfadmingroupinfo[1]; ?>" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux"><i class="layui-icon">&#xe60b;</i>请填写权限组名称 （3~16个任意字符）</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">权限列表</label>
				<div class="layui-input-block">
					<?php					
					foreach($wffunlist as $key=>$value){
						switch($key){
							case 'p':
							echo '<div style="margin-top:6px;">产品管理</div>';
							break;
							case 't':
							echo '<div style="margin-top:6px;">模板管理</div>';
							break;
							case 'o':
							echo '<div style="margin-top:6px;">订单管理</div>';
							break;
							case 'c':
							echo '<div style="margin-top:6px;">系统管理</div>';
							break;							
							default:
							echo '<div style="margin-top:6px;">数据备份</div>';							
						}						
						foreach($value as $key2=>$value2){
					?>
					<input type="checkbox"<?php if($wfpowerarr[$key2]=='on'){echo ' checked';} ?> name="wfgrouppower[<?php echo $key2; ?>]" title="<?php echo $value2; ?>">
					<?php
					}}
					?>
					<div style="margin-top:6px;">授权产品</div>			
					<?php
					$wflparr=explode(',',$wfadmingroupinfo[3]);
					$res=$WFaccount->wfqueryall('wfproduct');
					while($row=$res->fetch_row()){	
					?>
					<input type="checkbox"<?php if(in_array($row[0],$wflparr)){echo ' checked';} ?> name="wflicensepro[]" title="<?php echo $row[1]; ?>" value="<?php echo $row[0]; ?>">
                    <?php
                    }
                    ?>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="wfsubmit" lay-submit lay-filter="wfsubmit" class="layui-btn">立即修改</button>
				</div>
			</div>
        </form>
    </div>            
    <?php
	    }else{
	?>
    <div class="wfmain">	
		<fieldset class="layui-elem-field layui-field-title"><legend>权限组设置</legend></fieldset>        
        <div class="wffun">
            <div class="l">
			    <button onclick="location.href='?set=admingroup&show=addadmingroup'" class="layui-btn layui-btn-sm"><i class="layui-icon white">&#xe608;</i>添加</button>
			    <button onclick="wflotdel('?set=admingroup&action=deladmingroup')" class="layui-btn layui-btn-sm layui-btn-danger"><i class="layui-icon white">&#xe640;</i>删除</button>
			    <button onclick="location.reload();" class="layui-btn layui-btn-sm layui-btn-warm" ><i class="layui-icon white">&#x1002;</i>刷新</button>
            </div>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="tit">
                <td width="5%"><input type="checkbox" id="all"></td>
                <td width="10%">ID</td>
                <td width="45%">权限组名称</td>
                <td width="40%">修改权限</td>
            </tr>
            <?php			
            while($row=$res->fetch_row()){
			?>
            <tr align="center" class="trbg">
                <td><?php if($row[0]!=='1'){echo '<input name="wflist" type="checkbox" value="'.$row[0].'">';}?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><button onclick="location.href='?set=admingroup&show=editadmingroup&id=<?php echo $row[0]; ?>'"<?php if($row[0]=='1'){echo ' disabled';}?> class="layui-btn layui-btn-xs layui-btn-danger"><i class="layui-icon white">&#xe642;</i>修改权限</button></td>
		    </tr>
            <?php
            }
			?>
        </table>
        <div style="height:48px;"></div>
        <div class="wfpage"><ul><li><?php echo $WFpages->wfpage(); ?></li></ul></div>
    </div>
    <?php	   
	}}
	?>
</div>
<script type="text/javascript" src="./images/wftable.js"></script>
<script type="text/javascript" src="./images/wfform.js"></script>
</body>
</html>