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
header('P3P: CP="CAO PSA OUR"');session_start();error_reporting(0);ini_set('default_charset','utf-8');require '../wfpublic/WFvcode.php';$WFvcode=new WFvcode();switch($_GET['style']){case 2:$WFvcode->countcode();break;case 3:$WFvcode->chinesecode();break;case 4:$rand=mt_rand(1,6);if($rand==1||$rand==3){$WFvcode->numbercode();}elseif($rand==2||$rand==5){$WFvcode->countcode();}else{$WFvcode->chinesecode();}break;default:$WFvcode->numbercode();break;}
?>