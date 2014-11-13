<?php
echo "<pre>";
function filewrite ($str){
   $fw = fopen("filewrite.txt", "a"); 
   fwrite($fw, $str."\n");
   fclose($fw);
}
$f = fopen("email.txt", "r");
$i=0;
while(!feof($f)) {
    $email[$i]=fgets($f);
    $i++;
}
fclose($f);
//print_r($email);
/***********CURL**********************/
for($i=0;$i<=count($email)-1;$i++){
$curl[$i] = curl_init();
echo $email[$i];
filewrite($email[$i]);
curl_setopt($curl[$i], CURLOPT_URL, $email[$i]);
curl_setopt($curl[$i], CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl[$i]);
preg_match_all("/([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z\.]{2,4})/",$result,$matches);
$mass[$i]= array_unique($matches[0]);
if(count($mass[$i])>0){
    for($j=0;$j<=count($mass[$i]);$j++){
        foreach ($mass[$i] as $val) {
            filewrite($val);
        }
    }
}
curl_close($curl[$i]);
}
//print_r($mass);
//print_r ($parse_email);