<?php
$wfbase=array (
  'ptpagesize' => '10',
  'ddpagesize' => '10',
  'logpagesize' => '10',
  'logholdtime' => '10',
  'kdnid' => '',
  'kdnkey' => '',
  'ddlistopt' => 
  array (
    'id' => 'on',
    'wfddno' => 'on',
    'wfbuydate' => 'on',
    'wfproduct' => 'on',
    'wfname' => 'on',
    'wfmob' => 'on',
    'wfaddress' => 'on',
    'wfddsource' => 'on',
    'wfddstatus' => 'on',
  ),
  'exopt' => 
  array (
    'id' => 'on',
    'wfddno' => 'on',
    'wfbuydate' => 'on',
    'wfproduct' => 'on',
    'wfname' => 'on',
    'wfmob' => 'on',
    'wfaddress' => 'on',
    'wfddsource' => 'on',
    'wfddstatus' => 'on',
  ),
  'statusopt' => '未处理|未发货|已发货|已签收|已确认|拒收|短信确认|短信撤单|电话不通|联系不上|不要了|考虑中',
);
$wfmail=array (
  'smtphost' => 'smtp.163.com',
  'smtpport' => '25',
  'frommail' => 'test@163.com',
  'smtpuser' => 'test@163.com',
  'smtppassword' => '123456',
  'subject' => '您有新订单（{wfname}），请注意查收！',
  'tomail1' => '123456@qq.com',
);
$wfpay=array (
  'alipartner' => '2088000000000000',
  'alikey' => '00000000000000000000000000000000',
  'aliemail' => 'xxx@xxx.com',
  'wx_mchid' => '1000000000',
  'wx_appid' => 'wx0000000000000000',
  'wx_key' => '00000000000000000000000000000000',
  'wx_appsecret' => '00000000000000000000000000000000',
);
$wfsms=array (
  'uid' => 'test',
  'pwd' => '123456',
  'mob' => '13800138000',
  'coduser' => '【{wfproname}官网】您好{wfname}，您已订购{wfproduct}，确认订单请回复1，取消订单请回复0。',
  'codadmin' => '【{wfproname}官网】收到新订单（{wfname}/{wfmob}/{wfaddress}），请注意查收。',
  'autoreply' => '【{wfproname}官网】您的的订单确认成功！我们会马上为您安排发货，请耐心等候。',
  'alipayuser' => '【{wfproname}官网】您好{wfname}，您已成功订购{wfproduct}，我们会马上安排为您发货，请保持您的电话畅通。',
  'alipayadmin' => '【{wfproname}官网】收到新订单（{wfname}/{wfmob}/{wfaddress}），请注意查收。',
  'weixinuser' => '【{wfproname}官网】您好{wfname}，您已成功订购{wfproduct}，我们会马上安排为您发货，请保持您的电话畅通。',
  'weixinadmin' => '【{wfproname}官网】收到新订单（{wfname}/{wfmob}/{wfaddress}），请注意查收。',
  'ddfhuser' => '【{wfproname}官网】您好{wfname}，您订购的产品{wfproduct}已发货，{wfkuaidi}单号为：{wfkdno}，请保持您的电话畅通。',
  'codecontent' => '【{wfproname}官网】您好，您的验证码是：{wfsmsvcode}，请填写验证码提交订单。',
);
$wfsafe=array (
  'time' => '160',
  'days' => '3',
  'count' => '1',
  'banip' => '123.45.*.*',
  'msg' => '请不要恶意提交！',
);
$wfsender=array (
  'CustomerName' => '',
  'CustomerPwd' => '',
  'PayType' => '1',
  'IsNotice' => '1',
  'Name' => '文经理',
  'ProvinceName' => '北京',
  'CityName' => '北京',
  'Address' => '朝阳区科技大厦A座2002室',
  'PostCode' => '1000000',
  'Tel' => '010-12345678',
  'Mobile' => '13800138000',
  'GoodsName' => '礼品',
  'ASName' => ' ',
  'ASValue' => '',
  'ASCustomerID' => '',
);
?>