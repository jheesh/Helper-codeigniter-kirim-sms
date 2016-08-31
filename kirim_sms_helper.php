<?php 
/*
 *buat helper dengan nama kirim_sms_helper
 *kirim_sms_helper.php
 *simpan kirim_sms_helper.php di /application/helper
 *Author : Anton (Jhe)
 * terimakasih

*/
function kirim_sms($nohp, $message, $return = '0')
{
	$smsgatewayurl='https://reguler.zenziva.net';
	$userkey='';//user key yang anda dapat dari zenziva
	$passkey='';//passkey yang anda dapat di zenziva
	$message=urlencode($message);
	$elementapi='/apps/smsapi.php';
	$parameterapi=$elementapi.'?userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.$message;
	$smsgatewaydata=$smsgatewayurl.$parameterapi;
	$url=$smsgatewaydata;
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output=curl_exec($ch);
	if (!$output) {
		$output=file_get_contents($smsgatewaydata);
	}
	if ($return=='1') 
	{
		return $output;
	}else
	{
		echo "Berhasil Dikirimm";
	}
}
