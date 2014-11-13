<pre>
<?php
$f = fopen("email.txt", "r");
$i=0;
while(!feof($f)) {
    $email[$i]=fgets($f);
    $i++;
}
fclose($f);
$curl = curl_init();
for($i=0;$i<=count($email)-1;$i++){

curl_setopt($curl, CURLOPT_URL, "$email[$i]");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
/*preg_match_all( "/href\s?=\s?[\"\']?(.[^\"\']*)[\"\']/", $result, $match );
$link=$match[1];
for($j=0;$j<=count($link)-1;$j++){
    curl_setopt($curl, CURLOPT_URL, "$link[$j]");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    preg_match_all("/([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z\.]{2,4})/",$result,$matches);
    $parse_email[]=$matches[0];
    print_r($parse_email);
    
}*/
preg_match_all("/([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z\.]{2,4})/",$result,$matches);
//$parse_email[$email[$i]]=$matches[0];
$parse_email[$email[$i]]=$matches[0];
}
curl_close($curl);
print_r ($parse_email);
//print_r($parse_email);
/*for($i=0;$i<=count($parse_email)-1;$i++){
    count($parse_email[$i])==0 ? : print_r($parse_email[$i]);
}*/
?>
