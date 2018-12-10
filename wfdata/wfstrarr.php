<?php
$wffunlist=array(
	'p'=>array(
		'cda'=>'产品管理',
		'addproduct'=>'添加产品',
		'delproduct'=>'删除产品',
		'editproduct'=>'修改产品',
		'createhtml'=>'生成下单页面'
	),
	't'=>array(
		'cdb'=>'模板管理',
		'addtemplate'=>'添加模板',
		'deltemplate'=>'删除模板',
		'edittemplate'=>'修改模板',
		'viewtemplate'=>'预览模板'
	),
	'o'=>array(
		'cdc'=>'订单管理',
		'countorder'=>'订单统计',
		'showorder'=>'查看订单详情',
		'addorder'=>'添加订单',
		'delorder'=>'删除订单',
		'editorder'=>'修改订单',
		'exselorder'=>'导出选择订单',
		'exallorder'=>'导出全部订单',
		'chuliorder'=>'更改订单状态',
		'lotfahuo'=>'上传单号',
		'kuaidiprint'=>'快递打印',
		'ddrecycle'=>'订单回收站'
	),
	'c'=>array(
		'cdd'=>'系统设置',
		'setbase'=>'系统基础设置',
		'setmail'=>'邮件发送设置',
		'setpay'=>'支付接口设置',
		'setsms'=>'短信接口设置',
		'setsafe'=>'系统安全设置',
		'setprint'=>'电子面单设置',
		'setadminurl'=>'更改后台地址',
		'setadminpw'=>'更改后台密码',
		'setuseradmin'=>'管理员设置',
		'setadmingroup'=>'权限组设置',
		'setadminlog'=>'管理员操作日志'
	),
	'd'=>array(
		'cde'=>'数据备份',
		'exportdb'=>'备份数据库',
		'importdb'=>'恢复数据库',
		'deletedb'=>'删除数据库备份'
	)
);
$wfpaystr=array(
	'1'=>array(
		'e'=>'cod',
		'z'=>'货到付款',
		'p'=>'温馨提示：选择货到付款在家等快递公司送货上门，先验货后付款！'
	),
	'2'=>array(
		'e'=>'alipay',
		'z'=>'支付宝付款',
		'p'=>'温馨提示：全球领先的第三方支付平台，在线支付，安全可靠！'
	),
	'3'=>array(
		'e'=>'weixin',
		'z'=>'微信付款',
		'p'=>'温馨提示：全球领先的第三方支付平台，在线支付，安全可靠！'
	),
	'4'=>array(
		'e'=>'scan',
		'z'=>'扫码转账付款',
		'p'=>'温馨提示：提交后请用你的手机登陆支付宝或微信扫描二维码完成付款！'
	),
	'5'=>array(
		'e'=>'bank',
		'z'=>'银行汇款',
		'p'=>'温馨提示：请拨打我们网站上的免费客服电话，索要银行汇款帐号。'
	)
);
$wfexpress=array(
	'EMS'=>'邮政EMS',
	'STO'=>'申通快递',
	'YTO'=>'圆通速递',
	'ZTO'=>'中通快递',
	'YD'=>'韵达速递',
	'SF'=>'顺丰速运',
	'ZJS'=>'宅急送',
	'HTKY'=>'汇通快递',
	'UC'=>'优速快递',
	'DBL'=>'德邦物流',
	'JD'=>'京东快递',
	'KYSY'=>'跨越速运',
	'QFKD'=>'全峰快递',
	'XFEX'=>'信丰快递'
);
$wfformoptstr=array(
	'wfnums'=>'数量价格',
	'wfname'=>'姓名',
	'wfsex'=>'性别',
	'wfage'=>'年龄',
	'wfheight'=>'身高',
	'wfweight'=>'体重',
	'wfidcard'=>'身份证号',
	'wfmob'=>'手机号码',
	'wftel'=>'电话号码',
	'wfprovince'=>'地区选择',
	'wfaddress'=>'详细地址',
	'wfpost'=>'邮编',
	'wfqq'=>'QQ号',
	'wfweixin'=>'微信号',
	'wfemail'=>'邮箱',
	'wfinvcode'=>'邀请码',
	'wfdatetime'=>'日期',
	'wfguest'=>'留言'
);
$wfprovincearr=array('北京','天津','上海','重庆', '河北','河南','云南','辽宁','黑龙江','湖南','安徽','山东','新疆','江苏','浙江','江西','湖北','广西','甘肃','山西','内蒙古','陕西','吉林','福建','贵州','广东','青海','西藏','四川','宁夏','海南');
$wfnamearr=array('李**','王**','张**','刘**','陈**','杨**','赵**','黄**','周**','吴**','徐**','孙**','胡**','朱**','高**','林**','何**','郭**','马**','罗**','梁**','宋**','郑**','谢**','韩*','唐**','冯**','于**','董**','萧**','程**','曹**','袁**','邓**','许**','傅**','沉**','曾*','彭**','吕**','苏**','卢**','蒋**','蔡**','贾**','丁**','林**','薛**','叶**','阎**');
$wfmobarr=array('130','131','132','133','134','135','136','137','138','139','147','150','151','152','155','155','157','158','159','166','177','178','180','181','182','183','184','185','186','187','187','187','188','189','199');
$wfbuydatearr2=array('5秒钟前','8秒钟前','11秒钟前','15秒钟前','30秒钟前','1分钟前','2分钟前','3分钟前','10分钟前','25分钟前','半小时前','1小时前','2小时前');
$wfformopt=array(
'wfname'=>'<div class="wfform-box">
				<label class="wfform-label">姓名</label>
				<div class="wfform-opt">
					<input type="text" name="wfname" lay-verify="name" placeholder="请填写姓名" class="input-text">
				</div>
			</div>
			',
'wfsex'=>'<div class="wfform-box">
				<label class="wfform-label">性别</label>
				<div class="wfform-pro radio">
					<span class="auto"><input type="radio" checked name="wfsex" id="wfsex1" value="男" class="input-radio" lay-ignore><label for="wfsex1">男</label></span>
					<span class="auto"><input type="radio" name="wfsex" id="wfsex2" value="女" class="input-radio" lay-ignore><label for="wfsex2">女</label></span>
				</div>
			</div>
			',
'wfage'=>'<div class="wfform-box">
				<label class="wfform-label">年龄</label>
				<div class="wfform-opt">
					<input type="text" name="wfage" placeholder="请填写年龄（岁）" class="input-text">
				</div>
			</div>
			',
'wfheight'=>'<div class="wfform-box">
				<label class="wfform-label">身高</label>
				<div class="wfform-opt">
					<input type="text" name="wfheight" placeholder="请填身高（CM）" class="input-text">
				</div>
			</div>
			',
'wfweight'=>'<div class="wfform-box">
				<label class="wfform-label">体重</label>
				<div class="wfform-opt">
					<input type="text" name="wfweight" placeholder="请填写体重（KG）" class="input-text">
				</div>
			</div>
			',
'wfidcard'=>'<div class="wfform-box">
				<label class="wfform-label">身份证号</label>
				<div class="wfform-opt">
					<input type="text" name="wfidcard" placeholder="请填写身份证号码" class="input-text">
				</div>
			</div>
			',
'wfmob'=>'<div class="wfform-box">
				<label class="wfform-label">手机号码</label>
				<div class="wfform-opt">
					<input type="text" name="wfmob" id="wfmob" lay-verify="mob" placeholder="请填写手机号码" class="input-text">
				</div>
			</div>
			',
'wftel'=>'<div class="wfform-box">
				<label class="wfform-label">电话号码</label>
				<div class="wfform-opt">
					<input type="text" name="wftel" placeholder="请填写电话号码" class="input-text">
				</div>
			</div>
			',
'wfprovince'=>'<div class="wfform-box">
				<label class="wfform-label">所在地区</label>
				<div class="wfform-opt area">
					<span class="wfprovince"><select id="wfprovince" name="wfprovince" lay-verify="province" class="select" lay-ignore><option value="">请选择省</option></select></span>
					<span class="wfcity"><select id="wfcity" name="wfcity" lay-verify="city" class="select" lay-ignore><option value="">请选择市</option></select></span>
					<span class="wfarea"><select id="wfarea" name="wfarea" class="select" lay-ignore><option value="">请选择区</option></select></span>	
				</div>
			</div>',			
'wfaddress'=>'<div class="wfform-box">
				<label class="wfform-label">详细地址</label>
				<div class="wfform-opt">
					<input type="text" name="wfaddress" lay-verify="address" placeholder="请填写详细地址" class="input-text">
				</div>
			</div>
			',
'wfpost'=>'<div class="wfform-box">
				<label class="wfform-label">邮编</label>
				<div class="wfform-opt">
					<input type="text" name="wfpost" placeholder="请填写邮政编码" class="input-text">
				</div>
			</div>
			',			
'wfqq'=>'<div class="wfform-box">
				<label class="wfform-label">QQ号</label>
				<div class="wfform-opt">
					<input type="text" name="wfqq" placeholder="请填写QQ号" class="input-text">
				</div>
			</div>
			',
'wfweixin'=>'<div class="wfform-box">
				<label class="wfform-label">微信号</label>
				<div class="wfform-opt">
					<input type="text" name="wfweixin" placeholder="请填写微信号" class="input-text">
				</div>
			</div>
			',
'wfemail'=>'<div class="wfform-box">
				<label class="wfform-label">邮箱</label>
				<div class="wfform-opt">
					<input type="text" name="wfemail" placeholder="请填写邮箱" class="input-text">
				</div>
			</div>
			',	
'wfinvcode'=>'<div class="wfform-box">
				<label class="wfform-label">邀请码</label>
				<div class="wfform-opt">
					<input type="text" name="wfinvcode" placeholder="请填写邀请码" class="input-text">
				</div>
			</div>
			',
'wfdatetime'=>'<div class="wfform-box">
				<label class="wfform-label">日期</label>
				<div class="wfform-opt">
					<input type="text" name="wfdatetime" id="wfdatetime" placeholder="点击选择日期" class="input-text">
				</div>
			</div>
			'

);
?>