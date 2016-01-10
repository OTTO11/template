<?php
/*
 * @author: Alexander Nagnitchenko
 * @link: https://vk.com/otto_rocket
 * @version: 1
 */

$result = $tpls = array();
function view($t, $d = false, $r = 1, $u = false){
  global $tpls;
  if(!isset($tpls[$t])){
    $tpls[$t] = file_get_contents('./templates/'.$t);
  }
  $c = $tpls[$t];
  if($u !== false){
    unset($tpls[$t]);
  }
  if(is_array($d)){
    foreach($d as $k => $v){
      $c = str_replace('{'.$k.'}', $v, $c);
    }
  }
  if($r == 1){
    return $c;
  }
  global $result;
	if(isset($result[$r])){
		$result[$r] .= $c;
		return;
	}
	$result[$r] = $c;
}
