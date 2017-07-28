<?php 

defined('IN_IA') or exit('Access Denied'); class Webyb_mpdomainModuleSite extends WeModuleSite { public function doWebIndex() { global $_W,$_GPC; if(checksubmit('submit')){ $code = trim($_GPC['auth_code']); if(empty($code)){ message('txt文件名不能为空！', '', 'error'); } $arr = explode('_', $code); if(count($arr)==1){ $auth_code = $code; }else{ $auth_code = array_pop($arr); } $fname = sprintf('MP_verify_%s.txt', $auth_code); file_put_contents(IA_ROOT.'/'.$fname, $auth_code); $dat = array( 'auth_code'=>$code, ); $this->saveSettings($dat); message('域名授权文件已经OK，可以去设置域名啦！', '', 'success'); } $auth_code = $this->module['config']['auth_code']; include $this->template('index'); } }

?>