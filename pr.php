<?php

$html=file_get_contents ('http://www.popsu.net');
$url='popsu.net';
$vnut=array();
$vnech=array();
preg_match_all('~<a [^<>]*href=[\'"]([^\'"]+)[\'"][^<>]*>(((?!~si',$html, $matches);
foreach ($matches[1] as $val) {
if (!preg_match("~^[^=]+://~", $val) || preg_match("~^[^://]+://(www\.)?".$url."~i", $val)) { $vnut[]=$val; }
else $vnech[]=$val;
}
$vnut=array_unique ($vnut);
$vnech=array_unique ($vnech);
print_r ($vnut);
print_r ($vnech);

