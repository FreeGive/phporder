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
require '../wfpublic/WFahead.php';require WFPUBLIC.'/WFordermgmt.php';$WFordermgmt=new WFordermgmt('all');$id=$_GET['id'];$wfopt=$_GET['opt'];$wfstr=$_GET['str'];header("Content-type:application/vnd.ms-excel");header("Content-Disposition:attachment;filename=".date('YmdHi').".xls");echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';echo '<html><head><meta http-equiv="Content-type" content="text/html;charset=UTF-8" /><style id="wforder_Styles"></style></head><body><div id="wforder" align=center x:publishsource="Excel"><table x:str border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse">';echo '<tr>';$optres=$WFordermgmt->wfshowfield();while($optrow=$optres->fetch_array()){if($wfbase['exopt'][$optrow['Field']]=='on'){echo '<td nowrap><strong>'.$optrow['Comment'].'</strong></td>';}}echo '</tr>';switch($_GET['action']){case 'select':$sql="SELECT * FROM wforderlist WHERE wfisdel=0 and id in($id) ORDER BY id ASC";break;case 'date':$sql="SELECT * FROM wforderlist WHERE date_format(wfbuydate,'$wfopt')='$wfstr' and wfisdel=0 ORDER BY id ASC";break;case 'field':$sql="SELECT * FROM wforderlist WHERE $wfopt like '%$wfstr%' and wfisdel=0 ORDER BY id ASC";break;case 'xxx':break;default:$sql="SELECT * FROM wforderlist WHERE wfisdel=0 ORDER BY id ASC";}$valres=$WFordermgmt->wfdbcrud($sql,1);while($valrow=$valres->fetch_array()){echo '<tr>';foreach($wfbase['exopt'] as $key=>$exval){echo "<td nowrap>".$valrow[$key]."</td>";}echo '</tr>';}echo '</table></div></body></html>';?>