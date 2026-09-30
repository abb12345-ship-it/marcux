<?php
$room=$_GET['room']??'';$player=$_GET['player']??'';$slot=$_GET['slot']??'';
if(!preg_match('/^\d{6}$/',$room)||!preg_match('/^[a-f0-9]{16}$/',$player)||!in_array($slot,['head','body'])){http_response_code(404);exit;}
$dir=sys_get_temp_dir().'/class-clash-'.substr(hash('sha256',__DIR__),0,16);$file=$dir.'/'.$room.'-'.$player.'-'.$slot.'.img';
$bytes=@file_get_contents($file);$info=$bytes!==false?@getimagesizefromstring($bytes):false;if(!$info){http_response_code(404);exit;}
header('Content-Type: '.$info['mime']);header('X-Content-Type-Options: nosniff');header('Cache-Control: no-cache');echo $bytes;
